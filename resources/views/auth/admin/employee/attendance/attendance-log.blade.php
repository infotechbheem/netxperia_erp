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
                        <li class="breadcrumb-item active"><a href="{{ route('admin.employee.attendance.view') }}">View Attendance</a></li>
                        <li class="breadcrumb-item active">Attendance Log</li>
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
                    <h5 class="card-title">Last 30 Days Employee Attendance Log</h4>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Emp Id</th>
                                    <th>Emp Name</th>
                                    <th>Designation</th>
                                    <th>Shift</th>
                                    <th>Attendance</th>
                                    <th>Date & Time</th>
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
                                    <td>{{ $attendance->shift }}</td>
                                    <td>
                                        <span class="text-{{ $attendance->attendance_status == 'present' ? "success" : "danger" }}"> {{ ucfirst($attendance->attendance_status) }}</span>
                                    </td>

                                    <td>{{ $attendance->updated_at }}</td>
                                    <td>
                                        <span class="badge bg-{{ $attendance->attendance_punctuality == 'Late' ? "danger" : "success" }}">{{ $attendance->attendance_punctuality ?? 'N/A' }}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>


@endsection
