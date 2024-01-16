<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminRoute
{
    protected const REQUIRED_ROLE = "Super Administrator";

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role->title === $this::REQUIRED_ROLE) {
            return $next($request);
        }

        return redirect()
            ->back()
            ->with('error', "You are not permitted to access this page.");
    }
}
