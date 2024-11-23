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
                        <li class="breadcrumb-item"><a href="{{ route('admin.client.hosting') }}">Client Hosting</a> </li>
                        <li class="breadcrumb-item active">Client Hosting View </li>
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
                    <h3 class="card-title">Hosting Details for {{ $clientHostingDetails->name }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Client Details -->
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <h4>Client Information</h4>
                            <p><strong>Name:</strong> {{ $clientHostingDetails->client_name }}</p>
                            <p><strong>Email:</strong> {{ $clientHostingDetails->email }}</p>
                            <p><strong>Mobile Number:</strong> {{ $clientHostingDetails->phone_number }}</p>
                        </div>

                        <!-- Hosting Plan Details -->
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <h4>Hosting Plan</h4>
                            <p><strong>Plan Name:</strong> {{ $clientHostingDetails->plan_name }}</p>
                            <p><strong>Hosting Providers Name</strong> {{ $clientHostingDetails->hosting_provider }}</p>
                            <p><strong>Plan Purchased Date</strong>{{ $clientHostingDetails->plan_purchased_date }}</p>
                            <p><strong>Expiry Date:</strong> {{ $clientHostingDetails->plan_expiry_date }}</p>
                            <p><strong>Status:</strong>
                                @php
                                $expiryDate = \Carbon\Carbon::parse($clientHostingDetails->plan_expiry_date);
                                @endphp
                                @if ($expiryDate->isPast())
                                <span class="badge badge-danger">Expired</span>
                                @elseif ($expiryDate->isToday())
                                <span class="badge badge-warning">Expires Today</span>
                                @elseif($expiryDate->isYesterday())
                                <span class="badge badge-warning">Expire soon</span>
                                @else
                                <span class="badge badge-success">Active</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Additional Note :</h5>
                            <p>{{ $clientHostingDetails->additional_notes }}</p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-4">
                        <a href="javascript:history.back()" class="btn btn-secondary">Back</a>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#renewModal" data-client-id="{{ $clientHostingDetails->id }}" data-plan-name="{{ $clientHostingDetails->plan_name }}" data-expiry-date="{{ $clientHostingDetails->plan_expiry_date }}">
                            Renew Plan
                        </button>
                    </div>

                    <div class="row pt-4">
                        <h4>Renewal Log</h4>
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <table id="example1" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Plan Name</th>
                                        <th>Expiry Date</th>
                                        <th>Amount Paid</th>
                                        <th>Created At</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach ($renewallog as $log)
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $clientHostingDetails->plan_name }}</td>
                                        <td>{{ $log->expiry_date }}</td>
                                        <td>₹ {{ number_format($log->amount, 2) }}</td>
                                        <td>{{ $log->created_at }}</td>
                                        <td>{{ $log->remarks ?? "N/A" }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->


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
                        <input type="hidden" name="client_id" id="client_id" value="{{ $clientHostingDetails->client_id }}">

                        <div class="form-group">
                            <label for="plan_name">Plan Name</label>
                            <input type="text" class="form-control" id="plan_name" name="plan_name" value="{{ $clientHostingDetails->plan_name }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="expiry_date">Expiry Date</label><span class="text-danger">*</span>
                            <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="{{ $clientHostingDetails->plan_expiry_date }}">
                        </div>

                        <div class="form-group">
                            <label for="amount">Amount</label><span class="text-danger">*</span>
                            <input type="number" class="form-control" id="amount" name="amount" required>
                        </div>

                        <div class="form-group">
                            <label for="remarks">Remarks</label>
                            <textarea name="remarks" id="remakrs" cols="30" rows="5" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Renew Plan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
