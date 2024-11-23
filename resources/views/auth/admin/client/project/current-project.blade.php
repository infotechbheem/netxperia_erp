@extends('auth.admin.layouts.app')

@section('main-container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Client Current Project</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.client') }}">Client</a></li>
                        <li class="breadcrumb-item active">Client Project </li>
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
                    <table id="example1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>S.N.</td>
                                <td>Client Id</td>
                                <td>Client Name</td>
                                <td>Project Title</td>
                                <td>Mobile Number</td>
                                <td>Created At</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $count = 1;
                            @endphp
                            @foreach ($projects as $project)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $project->client_id }}</td>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->phone_number }}</td>
                                <td>{{ $project->created_at }}</td>
                                <td>
                                    <button class="btn btn-primary">View</button>
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
