@extends('auth.client.layouts.app')

@section('main-container')
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="m-0">View Support Ticket</h4>
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
                    <form action="{{ route('client.communication.chat-support-ticket-store') }}" method="post">
                        @csrf
                        <input type="hidden" name="ticket_id" value="{{ $support_tickets->ticket_id }}">
                        <input type="hidden" name="client_id" value="{{ $support_tickets->client_id }}">
                        <div class="col">
                            <div class="form-group">
                                <label for="" class="form-label">Subject</label>
                                <input type="text" id="subject" name="subject" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" id="description" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary mt-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
