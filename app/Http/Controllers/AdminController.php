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
        
        return view('dashboard', compact('labels', 'data'));
    }

    /**
     * Users table view page.
     */
    public function users(): View
    {
        $users = User::select('id', 'name', 
            'email', 'email_verified_at', 
            'password', 'created_at', 
            'updated_at', 'last_login_at', 
            'status', 'role'
        )->orderBy('id', 'ASC')
        ->paginate(10);

        return view('admin.users', compact('users'));
    }

    /**
     * We want to make the tag and the category created in on form
     */
    public function create(): View
    {
        return view('admin.create.users');
    }

    public function store(UserRequest $request): RedirectResponse
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

    public function destroy(string $id): RedirectResponse
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