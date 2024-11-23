<?php

namespace App\Http\Controllers\Auth\Admin\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VendorPaymentController extends Controller
{
    public function index()
    {
        // Fetch projects and join with vendor payments to get payment status and full payment details
        $projects = DB::table('vendor_assign_project as p')
            ->leftJoin('vendor_payments as vp', 'p.project_id', '=', 'vp.project_id')
            ->select(
                'p.*', // All project details
                'vp.vendor_id as vp_vendor_id',
                'vp.project_id as vp_project_id', // Alias to distinguish from `p.project_id`
                'vp.project_title as vp_project_title',
                'vp.payment_type',
                'vp.amount',
                'vp.due_amount',
                'vp.payment_description',
                DB::raw('COALESCE(vp.status, "Not Paid") as payment_status'), // Payment status with default value if null
                'vp.transaction_id',
                'vp.payment_date',
                'vp.created_by',
                'vp.payment_slip',
                'vp.created_at as payment_created_at', // Alias to distinguish from `p.created_at`
                'vp.updated_at as payment_updated_at' // Alias to distinguish from `p.updated_at`
            )
            ->get();


        return view('auth.admin.vendor.payments.payment', compact('projects'));
    }

    public function viewPaymentDetails($id)
    {
        // Fetch the project and its payment details
        $project = DB::table('vendor_assign_project as p')
            ->leftJoin('vendor_payments as vp', 'p.project_id', '=', 'vp.project_id')
            ->select('p.*', DB::raw('COALESCE(vp.status, "Not Paid") as payment_status'),
                'vp.amount', 'vp.due_amount', 'vp.payment_type', 'vp.payment_description')
            ->where('p.project_id', $id)
            ->first();

        // Check if project exists
        if (!$project) {
            return redirect()->route('admin.vendor.payments')->with('error', 'Project not found.');
        }

        return view('auth.admin.vendor.payments.view-payment-details', compact('project'));
    }

    public function projectDetails($id)
    {
        $project = DB::table('vendor_assign_project')->where('project_id', $id)->first();
        // Assuming you may need vendor info, you can also join the vendor payments table
        $payment = DB::table('vendor_payments')->where('project_id', $id)->first();

        return response()->json([
            'project' => $project,
            'payment' => $payment,
        ]);
    }

    public function makePayment(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'vendor_id' => "required",
            'project_id' => "required",
            'project_title' => 'required|string',
            'amount' => 'required|integer',
            'payment_type' => 'required',
            'payment_description' => 'required|string',
            'transaction_id' => 'required',
            'payment_slip' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();

            $paymentData = [
                'vendor_id' => $request->vendor_id,
                'project_id' => $request->project_id,
                'project_title' => $request->project_title,
                'amount' => $request->amount,
                'due_amount' => 0,
                'payment_type' => $request->payment_type,
                'payment_description' => $request->payment_description,
                'transaction_id' => $request->transaction_id,
                'payment_date' => now(),
                'created_by' => 'Company',
                'status' => "Success",
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if ($request->hasFile('payment_slip')) {
                $paymentData['payment_slip'] = base64_encode(file_get_contents($request->file('payment_slip')->getRealPath()));
            }

            $paymentDataResponse = DB::table('vendor_payments')->insert($paymentData);

            if ($paymentDataResponse) {
                DB::commit();
                return redirect()->back()->with('success', "Payment added successfully!!");
            }

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }
}
