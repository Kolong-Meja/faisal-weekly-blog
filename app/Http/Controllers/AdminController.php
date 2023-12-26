<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Utils\CheckRole;
use App\Http\Controllers\Utils\GreetingTime;
use App\Models\Role;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use App\Models\User;

class AdminController extends Controller
{
    private const REQUIRED_ROLE = "super admin";
    private $greetingWord;

    public function __construct()
    {
        $this->greetingWord = GreetingTime::greeting();
    }

    // metode index() -> mengembalikan view dashboard
    public function index(): View
    {
        $posts = DB::table('posts')
            ->select(DB::raw("COUNT(*) as count"), 
                DB::raw("to_char(created_at, 'Month') as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("month_name"))
            ->orderBy(DB::raw("MIN(created_at)"), 'ASC')
            ->pluck('count', 'month_name');
        
        $labels = $posts->keys();
        
        $data = $posts->values();
        
        $greetingMsg = $this->greetingWord;

        return view('dashboard', compact(
            'labels', 
            'data',
            'greetingMsg'
        ));
    }

    /**
     * Users table view page.
     */
    public function users(): View
    {
        $users = DB::table('users')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->select('users.id', 'users.username', 
                'users.email',  'users.last_login_at', 
                'users.status', 'users.updated_at',
                'roles.id AS role_id', 'roles.title AS role_title'
        )->orderBy('users.id', 'ASC')
        ->paginate(10);

        $greetingMsg = $this->greetingWord;

        return view('admin.users', compact('users', 'greetingMsg'));
    }

    /**
     * We want to make the tag and the category created in on form
     */
    public function create(): View | RedirectResponse
    {
        if (CheckRole::userRole() !== self::REQUIRED_ROLE) {
            session()->flash("error", "You don't have permission to create new admin account.");
            return redirect()->route("admin.users");
        }

        $roles = Role::select('id', 'title')->get();

        $greetingMsg = $this->greetingWord;
        
        return view('admin.create.users', compact('roles', 'greetingMsg'));
    }

    public function store(UserRequest $request): RedirectResponse
    {
        $request->validated();

        User::create([
            "role_id" => $request->input("role"),
            "name" => $request->input("name"),
            "username" => $request->input("username"),
            "email" => $request->input("email"),
            "password" => Hash::make($request->input("password")),
            "email_verified_at" => Carbon::now()->format('Y-m-d H:i:s'),
            "status" => 'offline'
        ]);
        
        session()->flash("success", "New admin account successfully created");
        return redirect()->route("admin.users");
    }

    public function destroy(string $id): RedirectResponse
    {
        if (CheckRole::userRole() !== self::REQUIRED_ROLE) {
            session()->flash("error", "You don't have permission to remove admin account.");
            return redirect()->route('admin.users');
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