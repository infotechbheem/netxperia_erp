@extends('auth.admin.layouts.app')

@section('main-container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Communication Messaging</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Support Tickets</li>
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
                    <h4 class="card-title">Client Support Tickets</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Ticket Id</th>
                                    <th>Client Id</th>
                                    <th>Name</th>
                                    <th>Priority</th>
                                    <th>Created At</th>
                                    <th>Ticket Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count = 1;
                                @endphp
                                @foreach ($tickets as $ticket)
                                <tr>
                                    <td>{{ $count ++ }}</td>
                                    <td>{{ $ticket->ticket_id }}</td>
                                    <td>{{ $ticket->client_id }}</td>
                                    <td>{{ $ticket->name }}</td>
                                    <td>{{ $ticket->priority }}</td>
                                    <td>{{ $ticket->created_at }}</td>
                                    <td>
                                        <span class="badge bg-{{ $ticket->ticket_status == 'Open' ? "success" : "danger" }}">{{ $ticket->ticket_status }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.client.communication.view-support-ticket', $ticket->ticket_id) }}" class="btn btn-info">View</a>
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
