<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class AuthAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Check if the user has the 'admin' role
            if (!$user->hasRole('admin')) {
                Auth::logout();
                return redirect()->route('login')->with('failed', 'You do not have permission to access this area.');
            }

            View::share([
                'admin' => $user,
            ]);
            // User is authenticated and has admin role, continue to the next request
            return $next($request);
        }

        // User is not authenticated, redirect to login
        return redirect()->route('login')->with('session_expire', 'Session expire kindly login again!!.');
    }
}
