@extends('auth.employee.layouts.app')

@section('main-container')

<!-- Completed Projects -->
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header">
            <h2 class="mt-1 text-center">Employee Attendance</h2>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <h2 class="text-center py-1" id="live-time"></h2>
            </div>

            {{-- Mark Attendance --}}
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <form action="{{ route('employee.attendance.store') }}" method="post">
                        @csrf
                        <div class="row justify-content-center align-items-center">

                            <input type="hidden" name="employee_details" id="employee_details" value="{{ json_encode($employee) }}">
                            <div class="col-md-3 col-sm-12 p-2">
                                <div class="input-group">
                                    <select name="shift" id="shift" class="form-control">
                                        <option value="">Select Shift</option>
                                        @foreach ($schedule as $shift)
                                        <option value="{{ $shift->shift_name }}">{{ $shift->shift_name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 p-2">
                                <div class="btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-primary">
                                        <input type="checkbox" name="isAttendance"> Add Attendance to check the checkbox
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-12 p-2">
                                <button class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row pt-4 mt-4">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <h5 style="border-bottom: 2px solid; width:max-content;">Recent Attendance Log</h5>
                    <table class="table table-striped">
                        <tr>
                            <td>S.N.</td>
                            <td>Emp Id</td>
                            <td>Name</td>
                            <td>Attendance Status</td>
                            <td>Attendance Time</td>
                            <td>Attendance Punctuality</td>
                        </tr>
                        <tr>
                            <td>1.</td>
                            <td>{{ $attendance->emp_id ?? 'N/A' }}</td>
                            <td>{{ $attendance->emp_name ?? 'N/A' }}</td>
                            <td>{{ $attendance->attendance_status ?? 'N/A' }}</td>
                            <td>{{ $attendance->created_at ?? 'N/A' }}</td>
                            <td class="text-{{ isset($attendance->attendance_punctuality) ? 'primary' : 'danger' }}">{{ isset($attendance->attendance_punctuality) ? $attendance->attendance_punctuality : 'N/A' }}</td>

                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function updateTime() {
            const now = new Date();
            const options = {
                day: 'numeric'
                , month: 'short'
                , year: 'numeric'
                , hour: '2-digit'
                , minute: '2-digit'
                , second: '2-digit'
                , hour12: false // Set to true for 12-hour format
            };
            document.getElementById('live-time').textContent = now.toLocaleString('en-GB', options);
        }

        // Update time immediately and then every second
        updateTime();
        setInterval(updateTime, 1000);
    });

</script>
@endsection
