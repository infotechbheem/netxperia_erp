<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class GuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
    
            // Redirect based on user role
            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->hasRole('employee')) {
                return redirect()->route('employee.dashboard');
            } elseif ($user->hasRole('client')) {
                return redirect()->route('client.dashboard');
            } elseif ($user->hasRole('vendor')) {
                return redirect()->route('vendor.dashboard');
            }
            // You can add more roles as needed
        }

        return $next($request); // Proceed to the next request if not authenticated
    }
}
