<?php

namespace App\Http\Controllers\Auth\Admin\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmpAttendanceController extends Controller
{
    public function EmpAttendanceSchedule()
    {
        $schedules = Schedule::get();
        return view('auth.admin.employee.attendance.add-schedule', compact('schedules'));
    }

    public function scheduleStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'shift_name' => 'required|string|max:255',
            'time_in' => 'required|date_format:H:i',
            'time_out' => 'required|date_format:H:i|after:time_in',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();
            $schedule = new Schedule();
            $schedule->shift_name = $request->shift_name;
            $schedule->time_in = $request->time_in;
            $schedule->time_out = $request->time_out;
            $schedule->save();

            if ($schedule) {
                DB::commit();
                return redirect()->back()->with('success', 'Schedule added successfully!!');
            } else {
                DB::rollBack();
                return redirect()->back()->with('failed', 'Internal server error!!');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }

    public function scheduleEdit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'shift_name' => 'required|string|max:255',
            'time_in' => 'required|date_format:H:i',
            'time_out' => 'required|date_format:H:i|after:time_in',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();
            // Find the schedule and update it
            $schedule = Schedule::findOrFail($id);
            $schedule->shift_name = $request->shift_name;
            $schedule->time_in = $request->time_in;
            $schedule->time_out = $request->time_out;
            $schedule->save();

            if ($schedule) {
                DB::commit();
                return redirect()->back()->with('success', 'Schedule updated successfully.');
            } else {
                DB::rollBack();
                return redirect()->back()->with('warning', 'Somthings went wrong!!.');
            }
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('failed', $th->getMessage());
        }

    }

    public function addAttendance()
    {
        $schedule = DB::table('schedules')->get();
        $Employees = DB::table('emp_personal_details')
            ->join('emp_employment_details', 'emp_personal_details.emp_id', '=', 'emp_employment_details.emp_id')
            ->select('emp_employment_details.*', 'emp_personal_details.*')
            ->get();
        return view("auth.admin.employee.attendance.add-attendance", compact('Employees', 'schedule'));
    }
    public function storeAttendance(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'attendances' => 'required|array', // Expect an array of attendance records
            'attendances.*.emp_name' => 'required',
            'attendances.*.emp_id' => 'required',
            'attendances.*.emp_position' => 'required',
            'attendances.*.shift' => 'required',
            'attendances.*.attendance_status' => 'required',
            'attendances.*.holiday_list' => 'nullable',
        ]);
        // Check if validation fails
        if ($validator->fails()) {
            dd($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            foreach ($request->attendances as $attendance) {
                // Determine attendance status
                if ($attendance['attendance_status'] == 'holiday') {
                    $attendance_status = $attendance['holiday_list'];
                } else {
                    $attendance_status = $attendance['attendance_status'];
                }

                $time_in = DB::table('schedules')->where('shift_name', $attendance['shift'])->value('time_in');

                // Get the current time formatted as 'H:i:s'
                $current_time = now()->format('H:i:s');

                if ($current_time <= $time_in) {
                    $attendance_punctuality = "On Time";
                } else {
                    $attendance_punctuality = "Late";
                }

                // Check if attendance record already exists for the employee on the current date
                $existingAttendance = DB::table('attendances')
                    ->where('emp_id', $attendance['emp_id'])
                    ->whereDate('created_at', date('Y-m-d')) // Ensure you have a 'current_date' field
                    ->first();
                if ($existingAttendance) {
                    // Update existing record
                    DB::table('attendances')
                        ->where('id', $existingAttendance->id)
                        ->update([
                            'emp_name' => $attendance['emp_name'],
                            'position' => $attendance['emp_position'],
                            'shift' => $attendance['shift'],
                            'attendance_status' => $attendance_status,
                            'attendance_punctuality' => $attendance_punctuality,
                            'updated_at' => now(),
                        ]);
                } else {
                    // Insert new record
                    DB::table('attendances')->insert([
                        'emp_name' => $attendance['emp_name'],
                        'emp_id' => $attendance['emp_id'],
                        'position' => $attendance['emp_position'],
                        'shift' => $attendance['shift'],
                        'attendance_status' => $attendance_status,
                        'attendance_punctuality' => $attendance_punctuality,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            // Commit the transaction
            DB::commit();
            return redirect()->back()->with('success', 'Attendance updated/created successfully for all employees!');

        } catch (\Throwable $th) {
            // Rollback the transaction on error
            DB::rollBack();
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }
    public function viewAttendance()
    {
        // Get the start and end date of the current month
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        // Fetch attendance data grouped by employee for the current month
        $attendances = DB::table('attendances')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->select(
                'emp_id',
                DB::raw('MAX(emp_name) as emp_names'),
                DB::raw('MAX(position) as positions'),
                DB::raw('MAX(shift) as shifts'),
                DB::raw('GROUP_CONCAT(attendance_status ORDER BY created_at ASC) as attendance_statuses'),
                DB::raw('GROUP_CONCAT(DATE(created_at) ORDER BY created_at ASC) as attendance_dates')
            )
            ->groupBy('emp_id')
            ->get();

        return view('auth.admin.employee.attendance.view-attendance', compact('attendances'));
    }

    public function attendanceLog()
    {
        $attendances = DB::table('attendances')->whereDate('created_at', date('Y-m-d'))->get();

        return view('auth.admin.employee.attendance.attendance-log', compact('attendances'));
    }

    public function filteredAttendance(Request $request)
    {
        // Retrieve the selected month and year from the request
        $month = $request->input('month');
        $year = $request->input('year');

        // If month or year is missing, default to the current month and year
        $startOfMonth = Carbon::createFromDate($year ?? now()->year, $month ?? now()->month, 1)->startOfMonth();
        $endOfMonth = Carbon::createFromDate($year ?? now()->year, $month ?? now()->month, 1)->endOfMonth();

        // Fetch attendance data grouped by employee for the specified month
        $attendances = DB::table('attendances')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->select(
                'emp_id',
                DB::raw('MAX(emp_name) as emp_names'),
                DB::raw('MAX(position) as positions'),
                DB::raw('MAX(shift) as shifts'),
                DB::raw('GROUP_CONCAT(attendance_status ORDER BY created_at ASC) as attendance_statuses'),
                DB::raw('GROUP_CONCAT(DATE(created_at) ORDER BY created_at ASC) as attendance_dates')
            )
            ->groupBy('emp_id')
            ->get();

        return view('auth.admin.employee.attendance.view-attendance', compact('attendances'));
    }
}
