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
                </div>

                <div class="card-body">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Project Id</th>
                                    <th>Title</th>
                                    <th>Client Name</th>
                                    <th>Client Id</th>
                                    <th>View Invoice</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count = 1;
                                @endphp
                                @foreach ($invoices as $invoice)
                                <tr>
                                    <td>{{ $count ++ }}</td>
                                    <td>{{ $invoice->project_id }}</td>
                                    <td>{{ $invoice->project_title }}</td>
                                    <td>{{ $invoice->client_name }}</td>
                                    <td>{{ $invoice->client_id }}</td>
                                    <td>
                                        <a href="{{ route('admin.client.invoices.view.project-view-invoice', $invoice->id) }}" class="btn btn-primary"><i class="fas fa-eye mr-2"></i>View</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
