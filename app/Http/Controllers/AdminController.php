<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Tag;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\TagRequest;

class AdminController extends Controller
{
    // metode index() -> mengembalikan view dashboard
    public function index(): View
    {
        $posts = DB::table('posts')
            ->select(DB::raw("COUNT(*) as count"), 
                DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("month_name"))
            ->orderBy('month_name', 'ASC')
            ->pluck('count', 'month_name');
        
        $labels = $posts->keys();
        
        $data = $posts->values();
        
        return view('parts.dashboard', compact('labels', 'data'));
    }
    /**
     * We want to make the tag and the category created in on form
     */
    public function create(): View
    {
        return view('parts.admin.create');
    }

    public function store(
        TagRequest $tag_request, 
        CategoryRequest $category_request
        ): RedirectResponse
    {
        $tag_request->validated();
        
        Tag::create([
            'title' => '#'.$tag_request->input('tag-title'),
            'meta_title' => $tag_request->input('meta-tag-title'),
            'slug' => $tag_request->input('tag-slug'),
        ]);
        
        $category_request->validated();
        
        Category::create([
            'title' => $category_request->input('title'),
            'meta_title' => $category_request->input('meta_title'),
            'slug' => $category_request->input('slug'),
        ]);
        
        session()->flash('success', 'Tag and Category successfully created');
        return redirect()->route('admin.index');
    }

    public function users(): View
    {
        $users = User::select('id', 'name', 
            'email', 'email_verified_at', 
            'password', 'created_at', 
            'updated_at', 'last_login_at', 
            'status', 'role'
        )->orderBy('id', 'ASC')
        ->paginate(10);

        return view('parts.admin.users', compact('users'));
    }

    public function usersCreate(): View | RedirectResponse
    {
        $userRole = Auth::user()->role;

        if ($userRole != 'super admin') {
            session()->flash("error", "You don't have permission to create new account.");
            return redirect()->route('admin.index');
        }

        return view('parts.admin.users-create');
    }

    public function usersCreateStore(UserRequest $request): RedirectResponse
    {
        $request->validated();

        User::create([
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "password" => Hash::make($request->input("password")),
            "role" => $request->input("role"),
            "email_verified_at" => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        session()->flash("success", "New admin account successfully created");
        return redirect()->route("admin.users");
    }

    public function destroyUser(string $id): RedirectResponse
    {
        $userRole = Auth::user()->role;

        if ($userRole != 'super admin') {
            session()->flash("error", "You don't have permission to remove admin account.");
            return redirect()->route('admin.index');
        }

        $user = User::findOrFail($id);
        
        if (!$user) {
            abort(404, 'User not found!');
        }

        $user->delete();

        session()->flash('success', 'User successfully removed');
        return redirect()->route('admin.users');
    }
}