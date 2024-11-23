@extends('auth.admin.layouts.app')

@section('main-container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Payment Details for Project ID: {{ $project->project_id }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.vendor.payments') }}">Vendor Payments</a></li>
                        <li class="breadcrumb-item active">Project Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0">Project and Payment Details</h4>
                </div>
                <div class="card-body">
                    <h5>Project Information</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th>Project ID</th>
                            <td>{{ $project->project_id }}</td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td>{{ $project->project_title }}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{ $project->project_category }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $project->status }}</td>
                        </tr>
                        <tr>
                            <th>Progress Status</th>
                            <td>
                                <div class="progress" style="height: 20px;">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $project->progress_status }}%;" aria-valuenow="{{ $project->progress_status }}" aria-valuemin="0" aria-valuemax="100">
                                        {{ $project->progress_status }}%
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>

                    <h4 class="mt-4">Payment Information</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th>Payment Type</th>
                            <td>{{ $project->payment_type ?? 'Not Available' }}</td>
                        </tr>
                        <tr>
                            <th>Amount</th>
                            <td>₹ {{ $project->amount ?? 'Not Available' }}</td>
                        </tr>
                        <tr>
                            <th>Due Amount</th>
                            <td>₹ {{ $project->due_amount ?? 'Not Available' }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $project->payment_description ?? 'Not Available' }}</td>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            <td>{{ $project->payment_status }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
