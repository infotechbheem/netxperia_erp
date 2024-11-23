@extends('auth.admin.layouts.app')

@section('main-container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Vendor Completed Project</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.vendor-profile') }}">Vendor</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.vendor.project.current-project') }}">Project</a></li>
                        <li class="breadcrumb-item active">Vendor complated project</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <div class="card-tite">All Completed Project</div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <table id="example1" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Vendor Id</th>
                                            <th>Name</th>
                                            <th>Project Id</th>
                                            <th>Project Title</th>
                                            <th>Category</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $count = 1;
                                        @endphp
                                        @foreach ($completedProjects as $project)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $project->vendor_id }}</td>
                                            <td>{{ $project->vendor_name }}</td>
                                            <td>{{ $project->project_id }}</td>
                                            <td>{{ $project->project_title }}</td>
                                            <td>{{ $project->project_category }}</td>
                                            <td>
                                                <a href="{{ route('admin.vendor.project.view-vendor-completed-project', $project->id) }}" class="btn btn-primary">View</a>
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
    </section>
    <!-- /.content -->
</div>

@endsection
