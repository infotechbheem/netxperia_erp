@extends('auth.client.layouts.app')

@section('main-container')
<style>
    @import "https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap";



    body {
        font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
        -webkit-font-smoothing: antialiased;
        background-color: #dcdcdc;
        padding:
    }

    p {
        margin: 0;
    }

    .wrapper-invoice {
        display: flex;
        justify-content: center;
    }

    .wrapper-invoice .invoice {
        height: auto;
        background: #fff;
        padding: 5vh;
        margin-top: 5vh;
        max-width: 110vh;
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #dcdcdc;
    }

    .wrapper-invoice .invoice .invoice-information {
        float: right;
        text-align: right;
    }

    .wrapper-invoice .invoice .invoice-information b {
        color: "#0F172A";
    }

    .wrapper-invoice .invoice .invoice-information p {
        font-size: 2vh;
        color: gray;
    }

    .wrapper-invoice .invoice .invoice-logo-brand h2 {
        text-transform: uppercase;
        font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
        font-size: 2.9vh;
        color: "#0F172A";
    }

    .wrapper-invoice .invoice .invoice-logo-brand img {
        max-width: 100px;
        width: 100%;
        object-fit: fill;
    }

    .wrapper-invoice .invoice .invoice-head {
        display: flex;
        margin-top: 5vh;
    }

    .wrapper-invoice .invoice .invoice-head .head {
        width: 100%;
        box-sizing: border-box;
    }

    .wrapper-invoice .invoice .invoice-head .client-info {
        text-align: left;
    }

    .wrapper-invoice .invoice .invoice-head .client-info h2 {
        font-weight: 500;
        letter-spacing: 0.3px;
        font-size: 2vh;
        color: "#0F172A";
    }

    .wrapper-invoice .invoice .invoice-head .client-info p {
        font-size: 2vh;
        color: gray;
    }

    .wrapper-invoice .invoice .invoice-head .client-data {
        text-align: right;
    }

    .wrapper-invoice .invoice .invoice-head .client-data h2 {
        font-weight: 500;
        letter-spacing: 0.3px;
        font-size: 2vh;
        color: "#0F172A";
    }

    .wrapper-invoice .invoice .invoice-head .client-data p {
        font-size: 2vh;
        color: gray;
    }

    .wrapper-invoice .invoice .invoice-body {
        margin-top: 8vh;
    }

    .wrapper-invoice .invoice .invoice-body .table {
        border-collapse: collapse;
        width: 100%;
    }

    .wrapper-invoice .invoice .invoice-body .table thead tr th {
        font-size: 2vh;
        border: 1px solid #dcdcdc;
        text-align: left;
        padding: 1vh;
        background-color: #eeeeee;
    }

    .wrapper-invoice .invoice .invoice-body .table tbody tr td {
        font-size: 2vh;
        border: 1px solid #dcdcdc;
        text-align: left;
        padding: 1vh;
        background-color: #fff;
    }

    .wrapper-invoice .invoice .invoice-body .flex-table {
        display: flex;
    }

    .wrapper-invoice .invoice .invoice-body .flex-table .flex-column {
        width: 100%;
        box-sizing: border-box;
    }

    .wrapper-invoice .invoice .invoice-body .flex-table .flex-column .table-subtotal {
        border-collapse: collapse;
        box-sizing: border-box;
        width: 100%;
        margin-top: 2vh;
    }

    .wrapper-invoice .invoice .invoice-body .flex-table .flex-column .table-subtotal tbody tr td {
        font-size: 2vh;
        border-bottom: 1px solid #dcdcdc;
        text-align: left;
        padding: 1vh;
        background-color: #fff;
    }

    .wrapper-invoice .invoice .invoice-body .flex-table .flex-column .table-subtotal tbody tr td:nth-child(2) {
        text-align: right;
    }

    .wrapper-invoice .invoice .invoice-body .invoice-total-amount {
        margin-top: 1rem;
    }

    .wrapper-invoice .invoice .invoice-body .invoice-total-amount p {
        font-weight: bold;
        color: "#0F172A";
        text-align: right;
        font-size: 2vh;
    }

    .wrapper-invoice .invoice .invoice-footer {
        margin-top: 4vh;
    }

    .wrapper-invoice .invoice .invoice-footer p {
        font-size: 1.7vh;
        color: gray;
    }

    .copyright {
        margin-top: 2rem;
        text-align: center;
    }

    p {
        font-size: 2.2vh;
    }

    .copyright p {
        color: gray;
        font-size: 1.8vh;
    }

    @media print {
        .table thead tr th {
            -webkit-print-color-adjust: exact;
            background-color: #eeeeee !important;
        }

        .copyright {
            display: none;
        }
    }

    /*# sourceMappingURL=invoice.css.map */

</style>
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header">
            <h4 class="text-center">Your Invoices</h4>
        </div>
        <div class="card-body">
            <section class="wrapper-invoice">
                <!-- switch mode rtl by adding class rtl on invoice class -->
                <div class="invoice">
                    <div class="invoice-information">
                        <p><b>Invoice #</b> : {{ $invoice->invoice_id }}</p>
                        <p><b>Created Date:</b> {{ \Carbon\Carbon::parse($invoice->created_at)->format('M-d, Y') }}</p>
                    </div>
                    <!-- logo brand invoice -->
                    <div class="invoice-logo-brand">
                        <!-- <h2>Tampsh.</h2> -->
                        <img src="https://www.netxperia.com/images/newlogo.png" alt="netxperia Logo" />
                    </div>
                    <!-- invoice head -->
                    <div class="invoice-head">
                        <div class="head client-info">
                            <p>Net Xperia.</p>
                            <p>A-115, Shiv Vihar, Karala, Delhi</p>
                            <p>Email: info@netxperia.com</p>
                            <p>Phone: +91-9599619958</p>
                        </div>
                        <div class="head client-data">
                            <p>{{ $invoice->client_name }}</p>
                            <p>{{ $invoice->address ?? "Address Not Available"}}</p>
                            <p>{{ $invoice->email }}</p>
                            <p>+91-{{ $invoice->phone_number }}</p>
                        </div>
                    </div>
                    <!-- invoice body-->
                    <div class="invoice-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th style="text-align: center">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                // Decode the JSON data for services, descriptions, and amounts
                                $serviceNames = json_decode($invoice->services);
                                $descriptions = json_decode($invoice->descriptions);
                                $amounts = json_decode($invoice->amount);
                                @endphp

                                @foreach ($serviceNames as $index => $service)
                                <tr>
                                    <td>{{ $service }}</td>
                                    <td>{{ $descriptions[$index] }}</td>
                                    <td style="text-align: right">{{ number_format($amounts[$index], 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="flex-table">
                            <div class="flex-column">
                                <h6>Payment Information</h6>
                                <p>Bank Transfer to:</p>
                                <ul>
                                    <li>
                                        <p><b>Account Name:</b> Nirmala Foundation</p>
                                    </li>
                                    <li>
                                        <p><b>Bank Name:</b> XYZ Bank</p>
                                    </li>
                                    <li>
                                        <p><b>Account Number:</b> 1234567890</p>
                                    </li>
                                    <li>
                                        <p><b>IFSC Code:</b> XYZB0001234</p>
                                    </li>
                                </ul>
                                <p>OR make payments via our secure online portal.</p>
                            </div>
                            <div class="flex-column">
                                <table class="table-subtotal">
                                    <tbody>
                                        <tr>
                                            <td>Subtotal</td>
                                            <td>₹ {{ number_format(array_sum($amounts), 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Discount ({{ $invoice->discount }}%)</td>
                                            <td>₹ {{ number_format(array_sum($amounts) * ($invoice->discount / 100), 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tax ({{ $invoice->tax }}%)</td>
                                            <td>₹{{ number_format((array_sum($amounts) - (array_sum($amounts) * ($invoice->discount / 100))) * ($invoice->tax / 100), 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Amount</td>
                                            <td>₹ {{ number_format(array_sum($amounts) - (array_sum($amounts) * ($invoice->discount / 100)) + ((array_sum($amounts) - (array_sum($amounts) * ($invoice->discount / 100))) * ($invoice->tax / 100)), 2) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- invoice total  -->
                        <div class="invoice-total-amount">
                            <p>Total : ₹ {{ number_format(array_sum($amounts) - (array_sum($amounts) * ($invoice->discount / 100)) + ((array_sum($amounts) - (array_sum($amounts) * ($invoice->discount / 100))) * ($invoice->tax / 100)), 2) }}</p>
                        </div>
                    </div>
                    <!-- invoice footer -->
                    <div class="invoice-footer">
                        <p>Thank you</p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
