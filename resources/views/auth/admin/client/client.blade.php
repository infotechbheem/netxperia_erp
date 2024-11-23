@extends('auth.admin.layouts.app')

@section('main-container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Registered Client</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Client</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-success">
                <div class="card-header">
                    <h4 class="m-0">All Registered Client</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Client ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count = 1;
                                @endphp
                                @foreach ($clients as $client)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $client->client_id }}</td>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->phone_number }}</td>
                                    <td>
                                        <a href="{{ route('admin.client.profile', $client->encrypted_client_id) }}" class="btn btn-primary">View</a>
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
