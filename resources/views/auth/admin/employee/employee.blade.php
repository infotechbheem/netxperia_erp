@extends('auth.admin.layouts.app')

@section('main-container')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Retgistered Employee</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Employee</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">All Registered Employee</div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Employee Id</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <th class="text-center">Profile Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $count = 1;
                        @endphp
                        @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $count ++ }}</td>
                            <td>{{ $employee->emp_id }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->department ?? "Not Available" }}</td>
                            <td>{{ $employee->designation ?? "Not Available" }}</td>
                            <td class="text-center">
                                @if(isset($employee->profile_image) && !empty($employee->profile_image))
                                <img src="data:image/jpeg;base64,{{ $employee->profile_image }}" alt="Profile Image" width="90" height="90" style="border-radius: 8px" />
                                @else
                                <p>Not available.</p>
                                @endif

                            </td>
                            <td>
                                <a href="{{ route('admin.employee.profile', $employee->encrypted_id) }}" class="btn btn-primary">
                                    <i class="fas fa-folder mr-1"></i>Profile
                                </a>
                                <a href="" class="btn btn-danger"><i class="fas fa-trash mr-1"></i>Delete</a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
