@extends('auth.admin.layouts.app')

@section('main-container')

<style>
    .progress {
        background-color: #f5f5f5;
        border-radius: 5px;
    }

    .progress-bar {
        background-color: #009c34;
        /* Bootstrap primary color */
        color: white;
        text-align: center;
        transition: width 0.6s ease;
    }

</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Make Payment to Vendor</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.vendor.payments') }}">Payments</a></li>
                        <li class="breadcrumb-item active">Make Payment</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h4 class="m-0">Payment Details</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Project Id</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Project Status</th>
                                        <th>Progress Status</th>
                                        <th>Payment Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach ($projects as $project)
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $project->project_id }}</td>
                                        <td>{{ $project->project_title }}</td>
                                        <td>{{ $project->project_category }}</td>
                                        <td>{{ $project->status }}</td>
                                        <td>
                                            <div class="progress" style="height: 20px;">
                                                <div class="progress-bar" role="progressbar" style="width: {{ $project->progress_status }}%;" aria-valuenow="{{ $project->progress_status }}" aria-valuemin="0" aria-valuemax="100">
                                                    {{ $project->progress_status }}%
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge badge-{{ $project->payment_status == "Success" ? "success" : "danger" }}">{{ $project->payment_status }}</span>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" {{ $project->payment_status == "Success" ? "disabled" : "" }} data-toggle="{{ $project->payment_status != "Success" ? "modal" : "" }}" data-target="#paymentModal" data-project-id="{{ $project->project_id }}" data-project-title="{{ $project->project_title }}">{{ $project->payment_status == "Success" ? "Paid" : "Pay Now" }}</button>
                                            <a href="{{ route('admin.vendor.payments.view-payment-details', $project->project_id) }}" class="btn btn-info">View Details</a>
                                        </td>
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
</div>

<!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Make Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="paymentForm" method="POST" action="{{ route('admin.vendor.payments.store-payments-details') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="vendor_id" id="modalVendorId" value="">
                    <input type="hidden" name="project_id" id="modalProjectId" value="">

                    <div class="form-group">
                        <label for="project_title">Project Title</label>
                        <input type="text" class="form-control" name="project_title" id="modalProjectTitle" readonly>
                    </div>

                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" class="form-control" name="amount" id="modalAmount" required>
                    </div>

                    <div class="form-group">
                        <label for="payment_type">Payment Method</label>
                        <select class="form-control" name="payment_type" required>
                            <option value="">Select Payment Method</option>
                            <option value="upi">UPI</option>
                            <option value="bank_transfer">Bank Transfer</option>
                            <option value="cheque">Cheque</option>
                            <option value="Cash">Cash</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="payment_description">Payment Description</label>
                        <textarea class="form-control" name="payment_description" rows="3" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="transaction_id">Transaction ID</label>
                        <input type="text" class="form-control" name="transaction_id">
                    </div>

                    <div class="form-group">
                        <label for="payment_slip">Payment Slip</label>
                        <input type="file" name="payment_slip" id="payment_slip" class="form-control">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Attach click event to all Pay Now buttons
        const payButtons = document.querySelectorAll('.btn-primary[data-toggle="modal"]');

        payButtons.forEach(button => {
            button.addEventListener('click', function() {
                const projectId = this.getAttribute('data-project-id'); // Get project ID


                // Clear previous data in the modal
                document.getElementById('modalProjectTitle').value = '';

                // Fetch project details using AJAX
                const xhr = new XMLHttpRequest();
                xhr.open('GET', '/auth/admin/vendor/payments/get-project-details/' + projectId, true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        const data = JSON.parse(xhr.responseText);

                        // Populate the modal fields with project data
                        document.getElementById('modalProjectTitle').value = data.project.project_title;
                        document.getElementById('modalVendorId').value = data.project.vendor_id;
                        document.getElementById('modalProjectId').value = data.project.project_id;

                        // Open the modal
                        const modal = new bootstrap.Modal(document.getElementById('paymentModal'));
                        modal.show();
                    } else if (xhr.readyState === 4) {
                        alert('Error fetching project details: ' + JSON.parse(xhr.responseText).error);
                    }
                };
                xhr.send();
            });
        });
    });

</script>

@endsection
