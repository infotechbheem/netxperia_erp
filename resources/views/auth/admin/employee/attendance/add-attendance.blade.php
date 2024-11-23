@extends('auth.admin.layouts.app')

@section('main-container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Attendance</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Attendance</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header">
                    <h5 class="card-title">Add Attendance</h5>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <h2 class="text-center py-4" id="live-time"></h2>
                    </div>
                    <form action="{{ route('admin.employee.attendance.store') }}" id="mark_attendance" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <table class="table table-striped table-bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Employee Name</th>
                                            <th>Employee Id</th>
                                            <th>Position</th>
                                            <th>Shift</th>
                                            <th>Attendance Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Employees as $employee)
                                        <tr>
                                            <td>
                                                <input type="text" name="attendances[{{ $loop->index }}][emp_name]" class="form-control" value="{{ $employee->name }}" readonly>
                                            </td>
                                            <td>
                                                <input type="text" name="attendances[{{ $loop->index }}][emp_id]" class="form-control" value="{{ $employee->emp_id }}" readonly>
                                            </td>
                                            <td>
                                                <input type="text" name="attendances[{{ $loop->index }}][emp_position]" class="form-control" value="{{ $employee->position }}" readonly>
                                            </td>
                                            <td>
                                                <select name="attendances[{{ $loop->index }}][shift]" class="form-control">
                                                    <option value="">Select Schedule</option>
                                                    @foreach ($schedule as $shift)
                                                    <option value="{{ $shift->shift_name }}" @if ($shift->shift_name === 'Day_shift') selected @endif>
                                                        {{ $shift->shift_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="attendances[{{ $loop->index }}][attendance_status]" class="form-control" onchange="toggleHolidayList(this)">
                                                    <option value="">Select Attendance Status</option>
                                                    <option value="present" selected>Present</option>
                                                    <option value="absent">Absent</option>
                                                    <option value="leave">Leave</option>
                                                    <option value="half_day_leave">Half Day Leave</option>
                                                    <option value="holiday">Holiday</option>
                                                </select>
                                                <select name="attendances[{{ $loop->index }}][holiday_list]" class="form-control" style="display: none">
                                                    <option value="">Select Holiday</option>
                                                    <option value="diwali">Diwali</option>
                                                    <!-- Add other holidays as needed -->
                                                </select>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <button class="btn btn-primary" style="float:right;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function updateTime() {
            const now = new Date();
            const options = {
                day: 'numeric',
                month: 'short',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false // Set to true for 12-hour format
            };
            document.getElementById('live-time').textContent = now.toLocaleString('en-GB', options);
        }

        // Update time immediately and then every second
        updateTime();
        setInterval(updateTime, 1000);
    });

    function toggleHolidayList(selectElement) {
        const holidayList = selectElement.closest('tr').querySelector('select[name*="holiday_list"]');
        if (selectElement.value === 'holiday') {
            holidayList.style.display = 'block';
        } else {
            holidayList.style.display = 'none';
        }
    }
</script>
@endsection
