<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('auth.admin.index');
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect()->route('login')->with('success', 'You have been logged out successfully.');
        } else {
            // If the user doesn't have the 'admin' role
            return redirect()->route('login')->with('failed', 'You do not have the required role to perform this action.');
        }
    }
}
