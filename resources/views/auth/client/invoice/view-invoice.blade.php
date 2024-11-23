@extends('auth.client.layouts.app')

@section('main-container')
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header">
            <h4 class="text-center">Your Invoices</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Invoice ID</th>
                            <th>Project Id</th>
                            <th>Project Title</th>
                            <th>Amount</th>
                            <th>Issued Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $count= 1;
                        $totalAmount = 0; // Initialize total amount
                        @endphp

                        @foreach ($invoices as $invoice)
                        @php
                        // Decode and sum the amounts for each invoice
                        $invoiceAmounts = json_decode($invoice->amount);
                        $invoiceTotal = array_sum($invoiceAmounts);
                        $totalAmount += $invoiceTotal; // Add to the overall total
                        @endphp

                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $invoice->invoice_id }}</td>
                            <td>{{ $invoice->project_id }}</td>
                            <td>{{ $invoice->project_title }}</td>
                            <td>₹{{ number_format($invoiceTotal, 2) }}</td>
                            <td>{{ $invoice->created_at }}</td>
                            <td>
                                <span class="text-success">Completed</span>
                            </td>
                            <td>
                                <a href="{{ route('client.invoice.view-project-invoice', $invoice->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('client.invoice.download-invoice', $invoice->id) }}" class="btn btn-sm btn-primary">Download</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
