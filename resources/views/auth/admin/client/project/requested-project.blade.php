@extends('auth.admin.layouts.app')

@section('main-container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Client Project</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Client</a></li>
                        <li class="breadcrumb-item active">Client Project Requested</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header">
                    <h4 class="card-title">Client Requested Project</h4>
                </div>
            </div>

            <div class="card-body">
                <table id="example1" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Project Id</th>
                            <th>Client Id</th>
                            <th>Name</th>
                            <th>Mobile Number</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requestProject as $index => $project)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $project->project_id }}</td>
                            <td>{{ $project->client_id }}</td>
                            <td>{{ $project->client_name }}</td>
                            <td>{{ $project->client_phone_number }}</td>
                            <td>{{ $project->client_email }}</td>
                            <td>{{ $project->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.client.project.view-requested-project', $project->project_id) }}" class="btn btn-primary">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row">
                @foreach ($assignetProject as $project)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card card-success">
                        <div class="card-header">
                            <h5 class="card-title">Assign Project: {{ $project->title }}</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.client.assign-project') }}" method="POST">
                                @csrf
                                <input type="hidden" name="project_id" value="{{ $project->project_id }}">
                                <input type="hidden" name="project_name" value="{{ $project->title }}">
                                <input type="hidden" name="project_category" value="{{ $project->category }}">
                                <div class="form-group">
                                    <label>Project Name:</label>
                                    <input type="text" class="form-control" value="{{ $project->title }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Start Date and Time:</label>
                                    <input type="datetime-local" name="start_date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Deadline:</label>
                                    <input type="datetime-local" name="expected_completion" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Project Category:</label>
                                    <input type="text" class="form-control" value="{{ $project->category }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Select Employee:</label>
                                    <select name="employee_id" class="form-control" required>
                                        <option value="">Select Employee</option>
                                        @foreach ($employees as $employee)
                                        <option value="{{ $employee->emp_id }}">
                                            {{ $employee->name }} ({{ $employee->department ?? 'N/A' }})
                                        </option>
                                        @endforeach
                                        @foreach ($vendors as $vendor)
                                        <option value="{{ $vendor->vendor_id }}">
                                            {{ $vendor->company_name }} ({{ $vendor->designation ?? 'N/A' }})
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2 float-right">Assign</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

@endsection
