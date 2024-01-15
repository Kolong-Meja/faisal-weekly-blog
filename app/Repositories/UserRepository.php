<?php

namespace App\Repositories;

use App\Enums\UserStatus;
use App\Http\Requests\User\CreateUserRequest;
use App\Interfaces\UserInterface;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Validation\Rules;

class UserRepository implements UserInterface {
    protected const MAX_PAGINATE = 10;

    public function indexView(): View
    {
        $searchRequest = request('search');

        if (!$searchRequest) {
            $users = User::with('role')->select('*')->paginate($this::MAX_PAGINATE);
        }

        if ($searchRequest) {
            $users = User::with('role')
            ->when($searchRequest, function (Builder $query) use ($searchRequest) {
                $query->where('id', 'ILIKE', '%' . $searchRequest . '%')
                ->orWhere('username', 'ILIKE', '%' . $searchRequest . '%')
                ->orWhere('name', 'ILIKE', '%' . $searchRequest . '%')
                ->orWhere('email', 'ILIKE', '%' . $searchRequest . '%')
                ->orWhere('status', 'ILIKE', '%' . $searchRequest . '%')
                ->orWhereHas('role', function (Builder $query) use ($searchRequest) {
                    $query->where('title', 'ILIKE', '%' . $searchRequest . '%');
                });
            })->paginate($this::MAX_PAGINATE);

            if ($users->isEmpty()) {
                return redirect()
                ->back()
                ->with('not found', "User with ID, username, name, email or status like {$searchRequest} was not found.");
            }
        }

        $roles = DB::table('roles')
        ->select('id', 'title', 'status')
        ->get();

        return view('admin.user.index', compact('users', 'roles'));
    }

    public function storeNewUser(CreateUserRequest $createUserRequest): RedirectResponse
    {
        $validatedData = $createUserRequest->validated();

        User::create([
            'role_id' => $createUserRequest->input('role'),
            'username' => $validatedData['username'],
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'email_verified_at' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'),
            'password' => Hash::make($validatedData['password']),
            'status' => UserStatus::OFFLINE,
        ]);

        session()->flash('success', 'User has been successfully created!');

        return redirect()->route('user.index');
    }

    public function updateRecentUser(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'id' => ['required', 'exists:users,id'],
            'username' => ['required', 'string', 'max:50', 'unique:users,username'],
            'name' => ['required', 'string', 'max:100'],
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'lowercase', 'email:rfc,dns', 'max:100', 'unique:users,email'],
            'password' => ['required', 'string', Rules\Password::defaults()],
        ]);

        $userData = User::findOrFail($validatedData['id']);
        
        $userData->update([
            'role_id' => $request->input('role'),
            'username' => $validatedData['username'],
            'name' => $validatedData['name'],
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        session()->flash('success', 'User has been successfully updated!');
        
        return redirect()->route('user.index');
    }

    public function editView(string $id): View|RedirectResponse
    {
        $user = User::findOrFail($id);

        return view('admin.user.edit', compact('user'));
    }

    public function patchRecentUser(Request $request, string $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'username' => ['required', 'string', 'max:50', 'unique:users,username'],
            'name' => ['required', 'string', 'max:100'],
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'lowercase', 'email:rfc,dns', 'max:100', 'unique:users,email'],
            'password' => ['required', 'string', Rules\Password::defaults()],
        ]);

        $userData = User::findOrFail($id);
        
        $userData->update([
            'role_id' => $request->input('role'),
            'username' => $validatedData['username'],
            'name' => $validatedData['name'],
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        session()->flash('success', 'User has been successfully updated!');
        
        return redirect()->route('user.index');
    }

    public function removeOneUserById(string $id): RedirectResponse
    {
        $userData = User::findOrFail($id);

        $userData->delete();

        session()->flash('success', 'User has been successfully removed!');
        
        return redirect()->route('user.index');
    }
}