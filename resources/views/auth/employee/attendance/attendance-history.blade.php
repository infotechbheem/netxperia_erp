@extends('auth.employee.layouts.app')

@section('main-container')

<!-- Completed Projects -->
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header">
            <h2 class="mt-1 text-center">Employee Attendance History</h2>
        </div>
        <div class="card-body">
            {{-- Attendance History --}}
            <div class="row">
                <h4>Last 30 days attendance history</h4>
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Emp Id</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Attendance Status</th>
                                <th>Attendate Date & Time</th>
                                <th>Punctuality</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $count = 1;
                            @endphp
                            @foreach ($attendances as $attendance)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $attendance->emp_id }}</td>
                                <td>{{ $attendance->emp_name }}</td>
                                <td>{{ $attendance->position }}</td>
                                <td>{{ $attendance->attendance_status }}</td>
                                <td>{{ $attendance->created_at }}</td>
                                <td>{{ $attendance->attendance_punctuality }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
