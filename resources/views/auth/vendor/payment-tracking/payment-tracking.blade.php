@extends('auth.vendor.layouts.app')

@section('main-container')

<!-- Payment Tracking Page -->
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header">
            <h2 class="mt-1 text-center">Payment Tracking</h2>
        </div>
        <div class="card-body">

            <!-- Payment Summary -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card bg-light text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total Projects Completed</h5>
                            <h2 class="text-primary">{{ $totalCompletedProject }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-light text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total Amount Received</h5>
                            <h2 class="text-primary">₹ {{ $totalAmount }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-light text-center">
                        <div class="card-body">
                            <h5 class="card-title">Pending Payments</h5>
                            <h2 class="text-primary">₹ {{ $duePayment }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Tracking Table -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Project Title</th>
                            <th>Amount Received</th>
                            <th>Payment Status</th>
                            <th>Tnx Id</th>
                            <th>Sended By</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $count = 1;
                        @endphp
                        @foreach ($projectPayment as $payment)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $payment->project_title }}</td>
                            <td>{{ $payment->amount }}</td>
                            <td>{{ $payment->status }}</td>
                            <td>{{ $payment->transaction_id }}</td>
                            <td>{{ $payment->created_by }}</td>
                            <td>{{ $payment->created_at }}</td>
                            <td>
                                <a href="{{ route('vendor.payments.view-payment-details', $payment->id) }}" class="btn btn-info btn-sm">View Details</a>
                                {{-- <a href="{{ route('vendor.payments.record-activity') }}" class="btn btn-warning btn-sm">Record Activity</a> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Activity Log Section -->
            <div class="mt-5">
                <h4 class="mb-3">Recent Activity Log</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Activity</th>
                            <th>Project Name</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($payment->created_at)->format('M d, Y') }}</td>
                            <td>{{ $payment->status }}</td>
                            <td>{{ $payment->project_title }}</td>
                            <td>Payment of ₹ {{ $payment->amount }} processed by company.</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
