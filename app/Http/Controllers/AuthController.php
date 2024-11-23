<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
            'user_type' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Determine if the input is email or username
        $input = $request->only('username', 'password');
        $field = filter_var($input['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        
        // Attempt authentication
        if (Auth::attempt([$field => $input['username'], 'password' => $input['password']])) {
            $user = Auth::user();
            // Check role against user_type
            if ($user->hasRole($request->user_type)) {
                switch ($request->user_type) {
                    case 'admin':
                        return redirect()->route('admin.dashboard');
                    case 'client':
                        return redirect()->route('client.dashboard');
                    case 'vendor':
                        return redirect()->route('vendor.dashboard');
                    case 'employee':
                        return redirect()->route('employee.dashboard');
                    default:
                        Auth::logout();
                        return redirect()->back()->with('failed', "You are not logged in with the appropriate role.");
                }
            } else {
                Auth::logout();
                return redirect()->back()->with('failed', "You do not have the required role to access this area.");
            }
        } else {
            return redirect()->back()->with('login_failed', 'Invalid username or password.');
        }
    }

}
