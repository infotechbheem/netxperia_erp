@extends('auth.admin.layouts.app')

@section('main-container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Leave Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Leave Management</li>
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
                    <table id="example1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Employee Name</th>
                                <th>Employee Id</th>
                                <th>Department</th>
                                <th>Leave Type</th>
                                <th>Applied Time</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $count = 1;
                            @endphp
                            @foreach ($leaveRequest as $leave)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $leave->emp_name }}</td>
                                <td>{{ $leave->emp_id }}</td>
                                <td>{{ $leave->department }}</td>
                                <td>{{ $leave->leave_type }}</td>
                                <td>{{ $leave->created_at }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('admin.employee.leave-details', $leave->id) }}" role="button">View</a>
                                    <a class="btn btn-danger delete-btn" href="#" role="button">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
