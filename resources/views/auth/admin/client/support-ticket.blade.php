@extends('auth.admin.layouts.app')

@section('main-container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Support Ticket</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.client') }}">Client</a></li>
                        <li class="breadcrumb-item active">Support Ticket</li>
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
                    <h4 class="m-0 text-center">
                        <img src="{{ asset('custom-asset/icon/support-ticket.png') }}" width="30" alt="">
                        Support Ticket for Client</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Ticket ID</th>
                                <th>Client ID</th>
                                <th>Client Name</th>
                                <th>Creating Date & Time</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>#456235</td>
                                <td>1B21457896</td>
                                <td>Bheem Kumar Sharma</td>
                                <td>10 oct 2024 10:12:49</td>
                                <td>infotechbheem@gmail.com</td>
                                <td>
                                    <span class="badge badge-primary">Active</span>
                                </td>
                                <td>
                                    <a href="" class="btn btn-primary">View</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
