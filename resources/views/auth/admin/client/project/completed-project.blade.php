@extends('auth.admin.layouts.app')

@section('main-container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Client Project</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.client') }}">Client</a></li>
                        <li class="breadcrumb-item active">Client Completed Project </li>
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
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Name</th>
                                <th>Mobile Number</th>
                                <th>Project Name</th>
                                <th>Created At</th>
                                <th>Completed At</th>
                                <th>Sroject Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $count = 1;
                            @endphp
                            @foreach ($completdProject as $project)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $project->client_name }}</td>
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
