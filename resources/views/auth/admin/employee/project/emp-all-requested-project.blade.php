@extends('auth.admin.layouts.app')

@section('main-container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Requested Projects</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.employee') }}">Employee</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.employee.project') }}">Project</a></li>
                        <li class="breadcrumb-item active">Assign-Project</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="m-0">Project Assign to Employee</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Project Id</th>
                                                <th>Project Title</th>
                                                <th>Created Date</th>
                                                <th>Created By</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $count = 1;
                                            @endphp
                                            @foreach ($projects as $project)
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td>{{ $project->project_id }}</td>
                                                <td>{{ $project->project_title }}</td>
                                                <td>{{ $project->created_at }}</td>
                                                <td>{{ $project->project_created_by }}</td>
                                                <td>
                                                    <a href="{{ route('admin.employee.project.view-project', $project->encrypted_project_id) }}" class="btn btn-primary"><i class="fas fa-eye mr-2"></i>View Project</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($assignetProject as $project)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card card-success">
                        <div class="card-header">
                            <h4 class="card-title">Assign Project: {{ $project->project_title }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.employee.assign-project') }}" method="POST">
                                @csrf
                                <!-- CSRF protection -->
                                <div class="form-group">
                                    <label for="projectId">Project Name:</label>
                                    <input type="text" id="projectName" name="project_name" class="form-control" value="{{ $project->project_title }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="projectId">Project Id:</label>
                                    <input type="text" id="projectId" name="project_id" class="form-control" value="{{ $project->project_id }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="startDate">Start Date And Time:</label>
                                    <input type="datetime-local" id="startDate" name="start_date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="expectedCompletion">DeadLines:</label>
                                    <input type="datetime-local" id="expectedCompletion" name="expected_completion" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="projectCategory">Project Category:</label>
                                    <input type="text" id="projectCategory" name="project_category" class="form-control" required value="{{ $project->project_category }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="employee_id">Select Employee:</label>
                                    <select name="employee_id" id="employee_id" class="form-control" required>
                                        <option value="">Select Employee</option>
                                        <!-- Replace this with dynamic employee options -->
                                        @foreach ($employees as $employee)
                                        <option value="{{ $employee->emp_id }}">
                                            {{ $employee->name }} ({{ $employee->department ?? 'N/A' }})
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2 float-right">
                                    Assign
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
