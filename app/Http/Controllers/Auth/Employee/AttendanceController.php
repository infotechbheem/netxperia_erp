<?php

namespace App\Http\Controllers\Auth\Employee;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    public function markAttendance()
    {
        $employee = Auth::user();
        $attendance = DB::table('attendances')->where('emp_id', $employee->username)
            ->whereDate('created_at', now()->toDateString())
            ->first();
        $schedule = DB::table('schedules')->get();

        // Caluculate On Time And Late Over Attendance
        return view('auth.employee.attendance.mark-attendance', compact('schedule', 'attendance'));
    }

    public function attendanceStore(Request $request)
    {
        $employee_details = json_decode($request->employee_details);

        $validator = Validator::make($request->all(), [
            'employee_details' => 'required|json',
            'shift' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $time_in = DB::table('schedules')->where('shift_name', $request->shift)->value('time_in');

        // Parse both times as Carbon instances to compare accurately
        $current_time = Carbon::now();
        $schedule_time_in = Carbon::createFromFormat('H:i:s', $time_in);

        if ($current_time->lessThanOrEqualTo($schedule_time_in)) {
            $attendance_punctuality = "On Time";
        } else {
            $attendance_punctuality = "Late";
        }

        // Check if attendance for the employee has already been marked for today
        $attendanceExists = DB::table('attendances')
            ->where('emp_id', $employee_details->emp_id)
            ->whereDate('created_at', now()->toDateString()) // Ensure the date matches today's date
            ->exists();

        if ($attendanceExists) {
            return redirect()->back()->with('failed', 'Attendance is already marked for today.');
        }

        try {
            DB::beginTransaction();
            $data = [
                'emp_name' => $employee_details->name,
                'emp_id' => $employee_details->emp_id,
                'position' => $employee_details->designation,
                'shift' => $request->shift,
                'attendance_status' => $request->isAttendance == 'on' ? 'present' : 'absent',
                'attendance_punctuality' => $attendance_punctuality,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $attendance_response = DB::table('attendances')->insert($data);

            if ($attendance_response) {
                DB::commit();
                return redirect()->back()->with('success', 'Attendance marked successfully.');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }

    public function attendanceHistory()
    {
        $employee = Auth::user();

        // Get the date 30 days ago
        $thirtyDaysAgo = Carbon::now()->subDays(30);

        // Fetch attendance records for the past 30 days
        $attendances = DB::table('attendances')
            ->where('emp_id', $employee->username)
            ->whereDate('created_at', '>=', $thirtyDaysAgo)
            ->get();
        return view('auth.employee.attendance.attendance-history', compact('attendances'));
    }

    public function empLeave()
    {
        $employee = Auth::user();
        $applicationRecord = DB::table('applied_leave_applications')->where('emp_id', $employee->username)->get();
        return view('auth.employee.attendance.leave', compact('applicationRecord'));
    }

    public function applyLeaveForm()
    {
        return view('auth.employee.attendance.apply-leave');
    }

    public function storedLeaveApplicationForm(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'emp_id' => 'required|string|max:50',
            'emp_name' => 'required|string|max:100',
            'department' => 'required|string|max:100',
            'leave_type' => 'required|string|in:sick,casual,vacation,emergency',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string|min:10',
            'document' => 'nullable|file|mimes:jpeg,png,pdf|max:2048', // Optional, max size 2MB
            'emergency_contact' => 'required|string|',
            'comments' => 'nullable|string|max:500', // Optional field
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {

            DB::beginTransaction();
            if ($request->hasFile('document')) {
                $document = base64_encode(file_get_contents($request->file('document')->getRealPath()));
            }
            $applicationData = [
                'emp_id' => $request->emp_id,
                'emp_name' => $request->emp_name,
                'department' => $request->department,
                'leave_type' => $request->leave_type,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'reason' => $request->reason,
                'emergency_contact' => $request->emergency_contact,
                'comments' => $request->comments,
                'document' => $document ?? "NULL",
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $applicationResponse = DB::table('applied_leave_applications')->insert($applicationData);

            if ($applicationResponse) {
                DB::commit();
                return redirect()->back()->with('success', 'Leave application successfully applied!!');
            }

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('failed', $th->getMessage());
        }

    }

    public function trackApplication(){
        $employee = Auth::user();
        $appliedApplication = DB::table('applied_leave_applications')->where('emp_id', $employee->username)->whereDate('created_at', now()->toDateString())->get();
         return view('auth.employee.attendance.track-leave-application', compact('appliedApplication'));
    }

}
