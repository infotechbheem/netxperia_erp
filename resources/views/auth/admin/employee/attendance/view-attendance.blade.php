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
                        <li class="breadcrumb-item active">View Attendance</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header">
                    <h5 class="card-title">View Attendance</h5>
                </div>
                
                <div class="card-body">
                    <!-- Attendance Filter Form -->
                    <form action="{{ route('admin.employee.attendance.filteredAttendance') }}" method="GET">
                        @csrf
                        <div class="row justify-content-center mb-4">
                            <!-- Month Selection -->
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <label for="month" class="form-label">Select Month</label>
                                <select name="month" id="month" class="form-control">
                                    <option value="">Select month</option>
                                    @foreach(range(1, 12) as $month)
                                        <option value="{{ $month }}" {{ $month == now()->month ? 'selected' : '' }}>
                                            {{ date('F', mktime(0, 0, 0, $month, 1)) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <!-- Year Selection -->
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <label for="year" class="form-label">Select Year</label>
                                <select name="year" id="year" class="form-control">
                                    <option value="">Select Year</option>
                                    @foreach(range(now()->year - 1, now()->year + 1) as $year)
                                        <option value="{{ $year }}" {{ $year == now()->year ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-sm-12 col-md-4 col-lg-4" style="margin-top: 2rem;">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>

                    <!-- Attendance Table -->
                    <div class="row">
                        <div class="col-md-12">
                            <div style="overflow-x: auto;">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Emp Name</th>
                                            <th>Position</th>
                                            @php
                                                $year = request('year') ?? now()->year;
                                                $month = request('month') ?? now()->month;
                                                $daysInMonth = Carbon\Carbon::createFromDate($year, $month, 1)->daysInMonth;
                                            @endphp
                                            @for ($day = 1; $day <= $daysInMonth; $day++)
                                                <th>{{ $day }}</th>
                                            @endfor
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $count = 1; @endphp
                                        @foreach ($attendances as $attendance)
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td>{{ $attendance->emp_names }}</td>
                                                <td>{{ $attendance->positions }}</td>
                                                
                                                <!-- Loop through days to display attendance status -->
                                                @for ($day = 1; $day <= $daysInMonth; $day++)
                                                    @php
                                                        $dateString = Carbon\Carbon::createFromDate(request('year'), request('month'), $day)->format('Y-m-d');
                                                        $statusIndex = array_search($dateString, explode(',', $attendance->attendance_dates));
                                                        $isSunday = Carbon\Carbon::parse($dateString)->isSunday();
                                                        $status = $statusIndex !== false ? explode(',', $attendance->attendance_statuses)[$statusIndex] : ($isSunday ? 'Sunday' : null);
                                                        $bgColor = match($status) {
                                                            'present' => 'lightgreen',
                                                            'absent' => 'lightcoral',
                                                            'half_day_leave' => 'lightyellow',
                                                            'leave' => 'lightblue',
                                                            'holiday' => 'goldenrod',
                                                            'Sunday' => 'lightcoral',
                                                            default => '',
                                                        };
                                                    @endphp
                                                    <td style="text-align: center; background-color: {{ $bgColor }};">
                                                        @if ($status)
                                                            <span class="badge rounded-pill {{ match($status) {
                                                                'present' => 'bg-primary',
                                                                'absent' => 'bg-danger',
                                                                'half_day_leave' => 'bg-info',
                                                                'leave' => 'bg-success',
                                                                'holiday' => 'bg-warning',
                                                                'Sunday' => 'bg-primary text-white',
                                                                default => 'bg-warning text-white',
                                                            }
                                                            }}">{{ ucfirst($status) }}</span>
                                                        @endif
                                                    </td>
                                                @endfor
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Total Attendance Record Table -->
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-center">Total Attendance Record</h4>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Emp ID</th>
                                        <th>Emp Name</th>
                                        <th>Designation</th>
                                        <th>Present</th>
                                        <th>Absent</th>
                                        <th>Leave</th>
                                        <th>Half Day Leave</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                        $totals = ['present' => 0, 'absent' => 0, 'leave' => 0, 'half_day_leave' => 0];
                                    @endphp
                                    @foreach ($attendances as $attendance)
                                        @php
                                            $statusCounts = collect(explode(',', $attendance->attendance_statuses))->countBy();
                                            $totals['present'] += $statusCounts->get('present', 0);
                                            $totals['absent'] += $statusCounts->get('absent', 0);
                                            $totals['leave'] += $statusCounts->get('leave', 0);
                                            $totals['half_day_leave'] += $statusCounts->get('half_day_leave', 0);
                                        @endphp
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $attendance->emp_id }}</td>
                                            <td>{{ $attendance->emp_names }}</td>
                                            <td>{{ $attendance->positions }}</td>
                                            <td>{{ $statusCounts->get('present', 0) }}</td>
                                            <td>{{ $statusCounts->get('absent', 0) }}</td>
                                            <td>{{ $statusCounts->get('leave', 0) }}</td>
                                            <td>{{ $statusCounts->get('half_day_leave', 0) }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="4" class="text-right"><strong>Total:</strong></td>
                                        <td><strong>{{ $totals['present'] }}</strong></td>
                                        <td><strong>{{ $totals['absent'] }}</strong></td>
                                        <td><strong>{{ $totals['leave'] }}</strong></td>
                                        <td><strong>{{ $totals['half_day_leave'] }}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

@endsection
