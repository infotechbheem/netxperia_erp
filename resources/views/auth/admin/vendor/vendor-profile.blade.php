@extends('auth.admin.layouts.app')

@section('main-container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2>Vendor Profile</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.vendor-profile') }}">Vendor</a></li>
                        <li class="breadcrumb-item active">Vendor Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Vendor Profile Card -->
            <div class="card">
                <div class="card-header bg-success">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-2">
                                @if ($vendor->profile_image)
                                <img src="data:image/jpeg;base64,{{ $vendor->profile_image }}" alt="Vendor Profile Image" width="100" height="100" style="border-radius: 10px">
                                @else
                                <img src="{{ asset('custom-asset/avatar.png') }}" alt="Default Image" height="100" width="100" style="border-radius: 10px">
                                @endif
                            </div>
                            <div class="cold-md-6 d-flex align-items-center" style="font-size: 2rem">
                                <p><strong>Vendor Name : </strong>{{ $vendor->company_name }} !!!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <table class="table table-striped table-responsive">
                                <tbody>
                                    <tr>
                                        <th>Vendor ID</th>
                                        <td>{{ $vendor->vendor_id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Company Name</th>
                                        <td>{{ $vendor->company_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Contact Person</th>
                                        <td>{{ $vendor->contact_person }}</td>
                                    </tr>
                                    <tr>
                                        <th>Designation</th>
                                        <td>{{ $vendor->designation }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number</th>
                                        <td>{{ $vendor->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email Address</th>
                                        <td>{{ $vendor->email_address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Website URL</th>
                                        <td><a href="{{ $vendor->website_url }}" target="_blank">{{ $vendor->website_url }}</a></td>
                                    </tr>
                                    <tr>
                                        <th>Business Type</th>
                                        <td>{{ $vendor->business_type }}</td>
                                    </tr>
                                    <tr>
                                        <th>Registration Number</th>
                                        <td>{{ $vendor->registration_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Year Established</th>
                                        <td>{{ $vendor->year_established }}</td>
                                    </tr>
                                    <tr>
                                        <th>Office Address</th>
                                        <td>{{ $vendor->office_address }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>Bank Account</th>
                                        <td>{{ $vendor->bank_account }}</td>
                                    </tr>
                                    <tr>
                                        <th>Annual Turnover</th>
                                        <td>{{ $vendor->annual_turnover }}</td>
                                    </tr>
                                    <tr>
                                        <th>Client References</th>
                                        <td>{{ $vendor->client_references }}</td>
                                    </tr>
                                    <tr>
                                        <th>Payment Terms</th>
                                        <td>{{ $vendor->payment_terms }}</td>
                                    </tr>
                                    <tr>
                                        <th>Service Areas</th>
                                        <td>{{ $vendor->service_areas ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Specialization</th>
                                        <td>{{ $vendor->specialization ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Certifications</th>
                                        <td>{{ $vendor->certifications ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Insurance Details</th>
                                        <td>{{ $vendor->insurance_details ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Compliance Certificates</th>
                                        <td>{{ $vendor->compliance_certificates ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tax Compliance</th>
                                        <td>{{ $vendor->tax_compliance ?? 'N/A' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <h4>Additional Information</h4>
                            <p><strong>Key Personnel:</strong> {{ $vendor->key_personnel ?? 'N/A' }}</p>
                            <p><strong>Past Projects:</strong> {{ $vendor->past_projects ?? 'N/A' }}</p>
                            <p><strong>Contract Obligations:</strong> {{ $vendor->contract_obligations ?? 'N/A' }}</p>
                            <p><strong>Confidentiality Agreements:</strong> {{ $vendor->confidentiality_agreements ?? 'N/A' }}</p>
                            <p><strong>Additional Services:</strong> {{ $vendor->additional_services ?? 'N/A' }}</p>
                            <p><strong>Availability:</strong> {{ $vendor->availability ?? 'N/A' }}</p>
                            <p><strong>Communication Method:</strong> {{ $vendor->communication_method ?? 'N/A' }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

@endsection
