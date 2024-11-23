@extends('auth.admin.layouts.app')

@section('main-container')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Invoice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-success">
                <div class="card-header text-center">
                    <h2 class="m-0">Project Invoice</h2>
                    <p class="m-0"><strong>Invoice ID: </strong>{{ $invoice->invoice_id }}</p>
                </div>

                <div class="card-body">
                    <!-- Main Invoice Table -->
                    <table class="table table-borderless">
                        <!-- Header Section -->
                        <tr>
                            <td>
                                <h5>From:</h5>
                                <p><strong>Net Xperia</strong></p>
                                <p>A-115, Shiv Vihar, Karala</p>
                                <p>North-West Delhi, Delhi, 110081</p>
                                <p>Email: info@netxperia.com</p>
                                <p>Phone: +91-9599619958</p>
                            </td>
                            <td class="text-right">
                                <h5>To:</h5>
                                <p><strong>{{ $invoice->client_name }}</strong></p>
                                <p>Client Id: {{ $invoice->client_id }}</p>
                                <p>{{ $invoice->address ?? "Address Not Available" }}</p>
                                <p>Email: {{ $invoice->email }}</p>
                                <p>Phone: +91-{{ $invoice->phone_number }}</p>
                            </td>
                        </tr>

                        <!-- Invoice Information -->
                        <tr>
                            <td>
                                <p><strong>Project Name:</strong> {{ $invoice->project_title }}</p>
                            </td>
                            <td class="text-right">
                                <p><strong>Invoice Date:</strong> {{ date('d-m-Y') }}</p>
                            </td>
                        </tr>
                    </table>

                    <!-- Table of Services Rendered -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width: 20%">Service</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-right" style="width: 10%">Total (₹)</th>
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
                                    <td class="text-right">{{ number_format($amounts[$index], 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" class="text-right"><strong>Subtotal</strong></td>
                                    <td class="text-right">{{ number_format(array_sum($amounts), 2) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-right"><strong>Discount ({{ $invoice->discount }}%)</strong></td>
                                    <td class="text-right">{{ number_format(array_sum($amounts) * ($invoice->discount / 100), 2) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-right"><strong>Tax ({{ $invoice->tax }}%)</strong></td>
                                    <td class="text-right">{{ number_format((array_sum($amounts) - (array_sum($amounts) * ($invoice->discount / 100))) * ($invoice->tax / 100), 2) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-right"><strong>Total Amount</strong></td>
                                    <td class="text-right"><strong>{{ number_format(array_sum($amounts) - (array_sum($amounts) * ($invoice->discount / 100)) + ((array_sum($amounts) - (array_sum($amounts) * ($invoice->discount / 100))) * ($invoice->tax / 100)), 2) }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>


                    <!-- Payment Information -->
                    <table class="table table-borderless mt-4">
                        <tr>
                            <td>
                                <h5>Payment Information</h5>
                                <p>Bank Transfer to:</p>
                                <ul>
                                    <li><strong>Account Name:</strong> Nirmala Foundation</li>
                                    <li><strong>Bank Name:</strong> XYZ Bank</li>
                                    <li><strong>Account Number:</strong> 1234567890</li>
                                    <li><strong>IFSC Code:</strong> XYZB0001234</li>
                                </ul>
                                <p>OR make payments via our secure online portal.</p>
                            </td>
                        </tr>
                    </table>

                    <!-- Terms and Conditions -->
                    <table class="table table-borderless mt-4">
                        <tr>
                            <td>
                                <h5>Terms and Conditions</h5>
                                <p><strong>Payment Due:</strong> Please make the payment by the due date to avoid any late fees or service disruptions.</p>
                                <p><strong>Late Fees:</strong> A late fee of 2% will apply to invoices overdue by more than 15 days.</p>
                                <p><strong>Refunds:</strong> Services rendered are non-refundable. Please review the invoice details carefully.</p>
                            </td>
                        </tr>
                    </table>

                    <!-- Notes Section -->
                    <table class="table table-borderless mt-4">
                        <tr>
                            <td>
                                <h5>Additional Notes</h5>
                                <p>Thank you for choosing Nirmala Foundation. We value your business and are here to provide support if you have any questions regarding this invoice or need further assistance.</p>
                            </td>
                        </tr>
                    </table>

                    <!-- Footer Actions -->
                    <div class="row mt-4">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-primary" onclick="window.print()"><i class="fas fa-print"></i> Print Invoice</button>
                            <button class="btn btn-success"><i class="fas fa-envelope"></i> Send Invoice</button>
                            <button id="download-pdf-btn" class="btn btn-info"><i class="fas fa-download"></i> Download PDF</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
    document.getElementById("download-pdf-btn").addEventListener("click", function() {
        const {
            jsPDF
        } = window.jspdf;

        html2canvas(document.querySelector(".content-wrapper")).then(canvas => {
            const pdf = new jsPDF('p', 'mm', 'a4');
            const imgData = canvas.toDataURL("image/png");
            const imgWidth = 210; // A4 width in mm
            const pageHeight = 297; // A4 height in mm
            const imgHeight = canvas.height * imgWidth / canvas.width;
            let heightLeft = imgHeight;
            let position = 0;

            pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
            heightLeft -= pageHeight;

            while (heightLeft >= 0) {
                position = heightLeft - imgHeight;
                pdf.addPage();
                pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;
            }

            pdf.save("invoice.pdf");
        });
    });
</script>
@endsection
