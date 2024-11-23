<?php

namespace App\Http\Controllers\Auth\Admin\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaveController extends Controller
{
    public function leaveRequest()
    {
        $leaveRequest = DB::table('applied_leave_applications')->where('application_status', null)->get();

        return view('auth.admin.employee.attendance.leave-request', compact('leaveRequest'));
    }

    public function leaveDetails($id)
    {
        $leaveDetails = DB::table('applied_leave_applications')->where('id', $id)->first();
        return view("auth.admin.employee.attendance.view-leave-details", compact('leaveDetails'));
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            $data = [
                'application_status' => $request->application_status,
                'remarks' => $request->remarks,
            ];

            $response = DB::table('applied_leave_applications')->where('id', $id)->update($data);

            if ($response) {
                return redirect()->back()->with("success", "Data has been updated successfully!!");
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }

    public function empLeave()
    {
        $empLeave = DB::table('applied_leave_applications')->whereNotNull('application_status')->get();
        return view('auth.admin.employee.attendance.emp-leave', compact('empLeave'));
    }
}
