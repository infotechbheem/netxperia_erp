<?php

namespace App\Http\Controllers\Auth\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentTrackingController extends Controller
{
    public function index()
    {

        $vendor_id = Auth::user()->username;
        // Base query for vendor's assigned projects
        $query = DB::table('vendor_assign_project')->where('vendor_id', $vendor_id);
        // Count completed projects
        $totalCompletedProject = $query->where('status', 'Completed')->where('progress_status', 100)->count();

        $projectQuery = DB::table('vendor_payments')->where('vendor_id', $vendor_id);

        $totalAmount = $projectQuery->sum('amount');
        $duePayment = $projectQuery->sum('due_amount');

        $projectPayment = $projectQuery->get();

        return view('auth.vendor.payment-tracking.payment-tracking', compact('totalCompletedProject', 'totalAmount', 'duePayment', 'projectPayment'));
    }

    public function recordActivity()
    {
        return view('auth.vendor.payment-tracking.view-record-activity');
    }

    public function viewPaymentDetails($id)
    {
        $paymentDetails = DB::table('vendor_payments')->where('id', $id)->first();
        return view('auth.vendor.payment-tracking.view-payment-details', compact('paymentDetails'));
    }
}
