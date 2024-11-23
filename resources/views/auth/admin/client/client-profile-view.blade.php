@extends('auth.admin.layouts.app')

@section('main-container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Client Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.client') }}">Client</a></li>
                        <li class="breadcrumb-item active">Client Profile </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{ asset('employee-asset/img/user.jpg') }}" width="120" style="border-radius: 10px" alt="Client Image">
                        </div>
                        <div class="col-md-10 ">
                            <div class="row align-items-center" style="height: 15vh">
                                <div class="col-md-4 pt-2">
                                    <strong>Client ID => </strong>
                                    <span>{{ $client->client_id }}</span>
                                </div>
                                <div class="col-md-4 pt-2">
                                    <strong>Client Name => </strong>
                                    <span>{{ $client->name }}</span>
                                </div>
                                <div class="col-md-4 pt-2">
                                    <strong>Email => </strong>
                                    <span>{{ $client->email }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <p><strong>Full Name:</strong> {{ $client->name }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Email Address:</strong> {{ $client->email }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Mobile Number:</strong> {{ $client->phone_number }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Company Name:</strong> {{ $client->company_name ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Client Type:</strong> {{ $client->client_type }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Country:</strong> {{ $client->country }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Address:</strong> {{ $client->address ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Preferred Language:</strong> {{ $client->preferred_language ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Referral Source:</strong> {{ $client->referral_source ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Date of Birth:</strong> {{ $client->dob ? \Carbon\Carbon::parse($client->dob)->format('d M Y') : 'N/A' }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Occupation:</strong> {{ $client->occupation ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Tax ID / Company Registration Number:</strong> {{ $client->tax_identification ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Industry:</strong> {{ $client->industry ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Communication Preferences:</strong> {{ $client->communication_preferences }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong>Marketing Opt-in:</strong> {{ $client->marketing_opt_in ? 'Yes' : 'No' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
