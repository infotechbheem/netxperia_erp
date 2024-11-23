@extends('auth.admin.layouts.app')

@section('main-container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Project Details View</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.employee.project') }}">Poject</a></li>
                        <li class="breadcrumb-item active">Project View </a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-success ">
                <div class="card-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2">
                                @if ($project->project_image)
                                <img src="data:image/jpeg;base64,{{ $project->project_image }}" alt="Project Image" width="100" style="border-radius: 5px">
                                @else
                                <h4>Not Available</h4>
                                @endif
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Project ID : </strong>{{ $project->project_id }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Title : </strong>{{ $project->project_title }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Category : </strong>{{ $project->project_category }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Budget : </strong>{{ $project->project_budget }}</p>
                                    </div>
                                    <div class="col-md-12">
                                        <p><strong>Description : </strong>{{ $project->project_description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <p><Strong>Project Created By : </Strong>{{ $project->project_created_by }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><Strong>Deadlines : </Strong>{{ $project->project_deadline }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><Strong>Project Created Date & Time : </Strong>{{ $project->created_at }}</p>
                        </div>
                    </div>
                    <hr class="m-0 bg-dark">
                    <h4 class="mt-1">Client Information</h4>
                    <div class="row pt-4">
                        <div class="col-md-4">
                            <p><strong>Client Name : </strong>{{ $project->client_name }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Client Email : </strong>{{ $project->client_email }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Mobile Number : </strong>{{ $project->client_phone }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Client Requirements : </strong>{{ $project->client_requirements }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Project Starting Date : </strong>{{ $project->start_date }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Project Ending Date : </strong>{{ $project->end_date }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Mile Stone : </strong>{{ $project->milestones }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Team Members : </strong>{{ $project->team_members }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Technology : </strong>{{ $project->technologies }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Resource Budget : </strong>{{ $project->resource_budget }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
