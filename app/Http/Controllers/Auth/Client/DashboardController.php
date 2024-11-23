<?php

namespace App\Http\Controllers\Auth\Client;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Get the current date
        $today = Carbon::today();

        // Retrieve notices where 'flashing_start' is today or before,
        // and 'flashing_ending' is either null or after today
        $notices = Notice::whereDate('flashing_start', '<=', $today)
            ->where(function ($query) use ($today) {
                $query->whereNull('flashing_ending') // If there's no end date, notice is still active
                    ->orWhereDate('flashing_ending', '>=', $today); // End date should not have passed
            })->get();

        // Pass the retrieved notices to the view
        return view('auth.client.index', compact('notices'));
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
