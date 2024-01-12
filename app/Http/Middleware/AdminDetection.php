<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminDetection
{
    protected const REQUIRED_ROLES = ["admin", "super admin"];
    
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response | RedirectResponse
    {
        if (Auth::check() && in_array(Auth::user()->role->title, $this::REQUIRED_ROLES, TRUE)) {
            return $next($request);
        }

        return redirect()
            ->back()
            ->with('error', "You are not permitted to access this page.");
    }
}
