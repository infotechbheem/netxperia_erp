@extends('auth.admin.layouts.app')

@section('main-container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Client Hosting Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.client') }}">Client</a></li>
                        <li class="breadcrumb-item active">Client Hosting </li>
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
                    <h4>Client Hosting Details</h4>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Client Name</th>
                                <th>Email</th>
                                <th>Mobile Number</th>
                                <th>Plan Name</th>
                                <th>Expiry On</th>
                                <th>Expiry Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $count = 1;
                            $today = \Carbon\Carbon::today(); // Get today's date
                            @endphp

                            @foreach ($clientHostingDetails as $details)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $details->name }}</td>
                                <td>{{ $details->email }}</td>
                                <td>{{ $details->phone_number }}</td>
                                <td>{{ $details->plan_name }}</td>
                                <td>{{ $details->plan_expiry_date }}</td>
                                <td>
                                    @php
                                    $expiryDate = \Carbon\Carbon::parse($details->plan_expiry_date);
                                    @endphp

                                    @if ($expiryDate->isPast())
                                    <span class="badge badge-danger">Expired</span>
                                    <button class="badge badge-primary" id="renewButton" data-client-id="{{ $details->client_id }}" data-plan-name="{{ $details->plan_name }}" data-expiry-date="{{ $details->plan_expiry_date }}">
                                        Renew
                                    </button>
                                    @elseif ($expiryDate->isToday())
                                    <span class="badge badge-warning">Expires Today</span>
                                    <button class="badge badge-primary" id="renewButton" data-client-id="{{ $details->client_id }}" data-plan-name="{{ $details->plan_name }}" data-expiry-date="{{ $details->plan_expiry_date }}">
                                        Renew
                                    </button>
                                    @else
                                    <span class="badge badge-success">Active</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.client.hosting.hosting-details-view', $details->client_id) }}" class="btn btn-info">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Renewal Modal -->
<div class="modal fade" id="renewModal" tabindex="-1" role="dialog" aria-labelledby="renewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="renewModalLabel">Renew Hosting Plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="renewalForm" method="POST" action="{{ route('admin.client.hosting.renew-plans') }}">
                    @csrf
                    <input type="hidden" name="client_id" id="client_id">

                    <div class="form-group">
                        <label for="plan_name">Plan Name</label>
                        <input type="text" class="form-control" id="plan_name" name="plan_name" readonly>
                    </div>

                    <div class="form-group">
                        <label for="expiry_date">Expiry Date</label>
                        <input type="date" class="form-control" id="expiry_date" name="expiry_date" required>
                    </div>

                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" required>
                    </div>

                    <div class="form-group">
                        <label for="">Remarks</label>
                        <textarea name="remarks" id="remarks" cols="30" rows="5" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Renew Plan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var renewButtons = document.querySelectorAll('#renewButton');

        renewButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var clientId = button.getAttribute('data-client-id');
                var planName = button.getAttribute('data-plan-name');

                document.getElementById('client_id').value = clientId;
                document.getElementById('plan_name').value = planName;

                var modal = new bootstrap.Modal(document.getElementById('renewModal'));
                modal.show();
            });
        });
    });

</script>

@endsection
