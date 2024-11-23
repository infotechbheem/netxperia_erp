@extends('auth.vendor.layouts.app')

@section('main-container')

<!-- View Payment Details and Activities Page -->
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header">
            <h2 class="mt-1 text-center">Payment Details for NGO Registration</h2>
            <h5 class="text-center">Client: Client A</h5>
        </div>
        <div class="card-body">
            <!-- Payment Details Section -->
            <div class="mb-4">
                <h5>Payment Summary</h5>
                <p><strong>Project Fee:</strong> ₹ {{ $paymentDetails->amount }}</p>
                <p><strong>Status:</strong> {{ $paymentDetails->status }}</p>
                <p><strong>Payment Date:</strong> {{ \Carbon\Carbon::parse($paymentDetails->created_at)->format('M d, Y') }}</p>
                <p><strong>Payment Method:</strong> {{ $paymentDetails->payment_type }}</p>
                <p><strong>Transaction ID:</strong> {{ $paymentDetails->transaction_id }}</p>
            </div>

            <!-- Activities Section -->
            <h5>Activity Log</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Activity Type</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> {{ \Carbon\Carbon::parse($paymentDetails->created_at)->format('M d, Y') }}</td>
                        <td>Payment Processed</td>
                        <td>Payment of ₹ {{ $paymentDetails->amount }} processed by the company.</td>
                    </tr>
                </tbody>
            </table>

            <!-- Buttons for Actions -->
            <div class="text-center mt-4">
                <a href="javascript:history.back()" class="btn btn-secondary">Back to Projects</a>
            </div>
        </div>
    </div>
</div>

@endsection
