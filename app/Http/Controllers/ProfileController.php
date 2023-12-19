<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Utils\GreetingTime;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    private $greetingWord;

    public function __construct()
    {
        $this->greetingWord = GreetingTime::greeting();
    }
    
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $greetingMsg = $this->greetingWord;

        return view('profile.edit', [
            'user' => $request->user(),
        ], compact('greetingMsg'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Validate the request data
        $request->validate([
            'current-password' => ['required', function ($attribute, $value, $fail) use ($request) {
                if (!Auth::attempt(['email' => $request->user()->email, 'password' => $value])) {
                    $fail(__('The password is incorrect.'));
                }
            }],
        ], [
            'current-password.required' => __('The password field is required.'),
            'current-password' => __('The password is incorrect.'),
        ]);
    
        // User authentication successful, proceed with deletion
        $user = $request->user();
        
        Auth::logout();
        
        $user->delete();
    
        $request->session()->invalidate();
        
        $request->session()->regenerateToken();
    
        return Redirect::to('/');
    }
}
