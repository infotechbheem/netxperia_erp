@extends('auth.admin.layouts.app')

@section('main-container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Invoice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-success">
                <div class="card-header text-center">
                    <h2 class="m-0">Project Invoice</h2>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <table id="example1" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Project Id</th>
                                        <th>Title</th>
                                        <th>Client Id</th>
                                        <th>Client Name</th>
                                        <th>Category</th>
                                        <th>Created Date</th>
                                        <th>Status</th>
                                        <th>Invoice</th>
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
                                        <td>{{ $project->title }}</td>
                                        <td>{{ $project->client_id }}</td>
                                        <td>{{ $project->client_name }}</td>
                                        <td>{{ $project->category }}</td>
                                        <td>{{ \Carbon\Carbon::parse($project->created_at)->format('Y-m-d') }}</td>
                                        <td>
                                            <span class="badge bg-primary">Completed</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.client.invoices.project-invoice-generate', ['project_id' => $project->project_id, 'client_id' => $project->client_id]) }}" class="btn btn-success">Generate</a>
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
    </section>
</div>
@endsection
