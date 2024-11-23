<?php

namespace App\Http\Controllers\Auth\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {

        $vendor_id = Auth::user()->username;

        // Get the current date
        $today = Carbon::today();

        // Retrieve notices where 'flashing_start' is today or before,
        // and 'flashing_ending' is either null or after today
        $notices = Notice::whereDate('flashing_start', '<=', $today)
            ->where(function ($query) use ($today) {
                $query->whereNull('flashing_ending') // If there's no end date, notice is still active
                    ->orWhereDate('flashing_ending', '>=', $today); // End date should not have passed
            })->get();


            // Base query for vendor's assigned projects
            $query = DB::table('vendor_assign_project')->where('vendor_id', $vendor_id);

            // Count total projects
            $totalProject = $query->count();

            // Count completed projects
            $totalCompletedProject = $query->where('status', 'Completed')->where('progress_status', 100)->count();

        // Count total pending projects
        $totalPendingProject = $query->where('status', 'In Progress') // Assuming this is the correct status for in-progress projects
            ->where('progress_status', '<=', 99) // Correct syntax for checking if progress_status is less than or equal to 99
            ->count();

        // Count projects received today
        $todayProjectReceived = $query->whereDate('created_at', today())->count(); // 'created_at' is the assumed timestamp column

        // You can now use these variables as needed

        return view('auth.vendor.index', compact('notices', 'totalProject', 'totalCompletedProject', 'todayProjectReceived', 'totalPendingProject'));
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
