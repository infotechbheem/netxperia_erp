@extends('auth.client.layouts.app')

@section('main-container')
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header">
            <h4 class="text-center">Payment History</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Payment ID</th>
                        <th>Invoice ID</th>
                        <th>Amount Paid</th>
                        <th>Payment Date</th>
                        <th>Payment Method</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->payment_id }}</td>
                        <td>{{ $payment->invoice_id }}</td>
                        <td>₹{{ number_format($payment->amount_paid, 2) }}</td>
                        <td>{{ $payment->payment_date }}</td>
                        <td>{{ $payment->payment_method }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info">Receipt</a>
                        </td>
                    </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
