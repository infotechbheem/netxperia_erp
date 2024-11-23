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
                        <li class="breadcrumb-item active">View Support ticket</li>
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
                    <h4 class="card-title">View Support Ticket</h4>
                </div>
            </div>
            <div class="card-body">
                <!-- Tickets Table -->
                <div class="row">
                    <div class="col-6">
                        <h6>Ticket ID: # {{ $support_tickets->ticket_id }}</h6>
                    </div>
                    <div class="col-6" style="text-align: right">
                        <h6>Ticket: <span class="badge bg-{{ $support_tickets->ticket_status == "Open" ? "success" : "danger" }}">{{ $support_tickets->ticket_status }}</span></h6>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-9 col-lg-9 col-sm-12">
                        @foreach ($supportTicketMessage as $message)
                        <div class="row" style="border: 2px solid ; border-radius:5px; margin:1rem; padding:1rem">
                            <h6>Created By: <span class="badge bg-primary">{{ $message->created_by }}</span></h6>
                            <div class="col-md-10">
                                <p><strong>Subject: </strong>{{ $message->subject }}</p>
                                <p><strong>Description: </strong>{{ $message->description }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-sm-12 col-lg-3">
                        <form action="{{ route('admin.client.communication.support-ticket-response-store') }}" method="post">
                            @csrf
                            <input type="hidden" name="ticket_id" value="{{ $support_tickets->ticket_id }}">
                            <input type="hidden" name="client_id" value="{{ $support_tickets->client_id }}">
                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="form-label">Subject</label>
                                    <input type="text" id="subject" name="subject" class="form-control" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="form-label">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="3" class="form-control" required></textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary mt-1 ml-2">Submit</button>
                        </form>
                        <form action="{{ route('admin.client.communication.change-status') }}" method="POST" class="mt-4">
                            @csrf
                            <input type="hidden" name="ticket_id" value="{{ $support_tickets->ticket_id }}">
                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="form-label">Ticket Status Change</label>
                                    <select name="ticket_status" id="ticket_status" class="form-control" required>
                                        <option value="">Select Status</option>
                                        <option value="Open">Open</option>
                                        <option value="Closed">Closed</option>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary mt-1 ml-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
