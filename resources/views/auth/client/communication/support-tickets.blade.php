@extends('auth.client.layouts.app')

@section('main-container')
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="m-0">Support Tickets</h4>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTicketModal">Create Ticket</button>
            </div>
        </div>
        <div class="card-body">
            <!-- Tickets Table -->
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Ticket ID</th>
                        <th>Subject</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $count = 1;
                    @endphp
                    @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $ticket->ticket_id }}</td>
                        <td>{{ $ticket->ticket_subject }}</td>
                        <td>{{ substr($ticket->description, 0, 6) . '*****' }}</td>
                        <td><span class="badge bg-{{ $ticket->ticket_status == "Open" ? "success" : "danger" }}">{{ $ticket->ticket_status }}</span></td>
                        <td>{{ $ticket->created_at }}</td>
                        <td>
                            <a href="{{ route('client.communication.view-support-ticket', $ticket->ticket_id) }}" class="btn btn-sm btn-info">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Create Ticket Modal -->
<div class="modal fade" id="createTicketModal" tabindex="-1" aria-labelledby="createTicketModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTicketModalLabel">Create Support Ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createTicketForm" action="{{ route('client.communication.support-ticket-store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="ticketSubject" class="form-label">Ticket Subject</label>
                        <input type="text" class="form-control" name="ticketSubject" id="ticketSubject" placeholder="Enter ticket subject" required>
                        @error('ticketSubject')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="ticketDescription" class="form-label">Description</label>
                        <textarea class="form-control" name="ticketDescription" id="ticketDescription" rows="4" placeholder="Describe the issue..." required></textarea>
                        @error('ticketDescription')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="ticketPriority" class="form-label">Priority</label>
                        <select class="form-select" id="ticketPriority" name="ticketPriority" required>
                            <option value="">Select Priority</option>
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                        @error('ticketPriority')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="createTicketForm" class="btn btn-primary">Submit Ticket</button>
            </div>
        </div>
    </div>
</div>

@endsection
