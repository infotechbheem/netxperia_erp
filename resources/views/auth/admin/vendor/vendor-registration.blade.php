@extends('auth.admin.layouts.app')

@section('main-container')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Vendor Registration</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.vendor-profile') }}">Vendor</a></li>
                        <li class="breadcrumb-item active">Vendor Registration </li>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Registration New Vendor</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.vendor.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- Vendor Information -->
                                <h4 class="pb-1 mb-0 text-primary" style="font-weight: bold">1. Vendor Information</h4>
                                <hr class="p-0 mt-0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company-name" class="form-label">Company Name</label><span class="text-danger">*</span>
                                            <input type="text" name="company_name" id="company-name" class="form-control" value="{{ old('company_name') }}" required>
                                            @error('company_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="contact-person" class="form-label">Contact Person</label><span class="text-danger">*</span>
                                            <input type="text" name="contact_person" id="contact-person" class="form-control" value="{{ old('contact_person') }}" required>
                                            @error('contact_person')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="designation" class="form-label">Designation</label><span class="text-danger">*</span>
                                            <input type="text" name="designation" id="designation" class="form-control" value="{{ old('designation') }}" required>
                                            @error('designation')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="phone-number" class="form-label">Phone Number</label><span class="text-danger">*</span>
                                            <input type="text" name="phone_number" id="phone-number" class="form-control" value="{{ old('phone_number') }}" required>
                                            @error('phone_number')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email-address" class="form-label">Email Address</label><span class="text-danger">*</span>
                                            <input type="email" name="email_address" id="email-address" class="form-control" value="{{ old('email_address') }}" required>
                                            @error('email_address')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="website-url" class="form-label">Website URL</label><span class="text-muted">(optional)</span>
                                            <input type="url" name="website_url" id="website-url" class="form-control" value="{{ old('website_url') }}">
                                            @error('website_url')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="profile-image" class="form-label">Upload Vendor Profile Image</label><span class="text-danger">*</span>
                                            <input type="file" name="profile_image" id="profile-image" class="form-control" value="{{ old('profile_image') }}">
                                            @error('profile_image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <p class="mr-1 text-danger">
                                                <span>Image must be in jpeg/jpg format</span>
                                                <br>
                                                <span>Size is lesser than 2MB</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <!-- Business Details -->
                                <h4 class="pb-1 mb-0 pt-3 text-primary" style="font-weight: bold">2. Business Details</h4>
                                <hr class="p-0 mt-0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="business-type" class="form-label">Business Type</label><span class="text-danger">*</span>
                                            <input type="text" name="business_type" id="business-type" class="form-control" value="{{ old('business_type') }}" required>
                                            @error('business_type')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="registration-number" class="form-label">Registration Number (GST/PAN)</label><span class="text-danger">*</span>
                                            <input type="text" name="registration_number" id="registration-number" class="form-control" value="{{ old('registration_number') }}" required>
                                            @error('registration_number')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="year-established" class="form-label">Year Established</label><span class="text-danger">*</span>
                                            <input type="number" name="year_established" id="year-established" class="form-control" value="{{ old('year_established') }}" required>
                                            @error('year_established')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="office-address" class="form-label">Location/Office Address</label><span class="text-danger">*</span>
                                            <input type="text" name="office_address" id="office-address" class="form-control" value="{{ old('office_address') }}" required>
                                            @error('office_address')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="service-areas" class="form-label">Service Areas</label><span class="text-muted">(optional)</span>
                                            <input type="text" name="service_areas" id="service-areas" class="form-control" value="{{ old('service_areas') }}">
                                            @error('service_areas')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <!-- Experience and Expertise -->
                                <h4 class="pb-1 mb-0 pt-3 text-primary" style="font-weight: bold">3. Experience and Expertise</h4>
                                <hr class="p-0 mt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="company-profile" class="form-label">Brief Company Profile</label><span class="text-muted">(optional)</span>
                                            <textarea name="company_profile" id="company-profile" class="form-control" rows="3" placeholder="Enter brief company profile...">{{ old('company_profile') }}</textarea>
                                            @error('company_profile')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="specialization" class="form-label">Areas of Specialization</label><span class="text-muted">(optional)</span>
                                            <input type="text" name="specialization" id="specialization" class="form-control" placeholder="e.g., tax, audit, consultancy" value="{{ old('specialization') }}">
                                            @error('specialization')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="certifications" class="form-label">Relevant Certifications</label><span class="text-muted">(optional)</span>
                                            <input type="text" name="certifications" id="certifications" class="form-control" placeholder="e.g., CA certification" value="{{ old('certifications') }}">
                                            @error('certifications')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="key-personnel" class="form-label">Key Personnel and Qualifications</label><span class="text-muted">(optional)</span>
                                            <input type="text" name="key_personnel" id="key-personnel" class="form-control" placeholder="Describe key personnel..." value="{{ old('key_personnel') }}">
                                            @error('key_personnel')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <!-- Financial Information -->
                                <h4 class="pb-1 mb-0 pt-3 text-primary" style="font-weight: bold">4. Financial Information</h4>
                                <hr class="p-0 mt-0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bank-account" class="form-label">Bank Account Details</label><span class="text-danger">*</span>
                                            <input type="text" name="bank_account" id="bank-account" class="form-control" required value="{{ old('bank_account') }}">
                                            @error('bank_account')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="annual-turnover" class="form-label">Annual Turnover (last 3 years)</label><span class="text-danger">*</span>
                                            <input type="number" name="annual_turnover" id="annual-turnover" class="form-control" required value="{{ old('annual_turnover') }}">
                                            @error('annual_turnover')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="credit-references" class="form-label">Credit References</label><span class="text-muted">(optional)</span>
                                            <input type="text" name="credit_references" id="credit-references" class="form-control" value="{{ old('credit_references') }}">
                                            @error('credit_references')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <!-- Compliance and Legal -->
                                <h4 class="pb-1 mb-0 pt-3 text-primary" style="font-weight: bold">5. Compliance and Legal</h4>
                                <hr class="p-0 mt-0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurance-details" class="form-label">Insurance Details</label><span class="text-muted">(optional)</span>
                                            <input type="text" name="insurance_details" id="insurance-details" class="form-control" value="{{ old('insurance_details') }}">
                                            @error('insurance_details')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="compliance-certificates" class="form-label">Compliance Certificates</label><span class="text-muted">(optional)</span>
                                            <input type="text" name="compliance_certificates" id="compliance-certificates" class="form-control" value="{{ old('compliance_certificates') }}">
                                            @error('compliance_certificates')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tax-compliance" class="form-label">Tax Compliance Status</label><span class="text-muted">(optional)</span>
                                            <input type="text" name="tax_compliance" id="tax-compliance" class="form-control" value="{{ old('tax_compliance') }}">
                                            @error('tax_compliance')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <!-- References -->
                                <h4 class="pb-1 mb-0 pt-3 text-primary" style="font-weight: bold">6. References</h4>
                                <hr class="p-0 mt-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client-references" class="form-label">Client References (at least 2-3)</label><span class="text-danger">*</span>
                                            <textarea name="client_references" id="client-references" class="form-control" rows="3" required placeholder="Enter client references...">{{ old('client_references') }}</textarea>
                                            @error('client_references')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="past-projects" class="form-label">Past Projects or Case Studies</label><span class="text-muted">(optional)</span>
                                            <textarea name="past_projects" id="past-projects" class="form-control" rows="3" placeholder="Describe past projects...">{{ old('past_projects') }}</textarea>
                                            @error('past_projects')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <!-- Terms and Conditions -->
                                <h4 class="pb-1 mb-0 pt-3 text-primary" style="font-weight: bold">7. Terms and Conditions</h4>
                                <hr class="p-0 mt-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="payment-terms" class="form-label">Payment Terms</label><span class="text-danger">*</span>
                                            <textarea name="payment_terms" id="payment-terms" class="form-control" rows="3" required placeholder="Describe payment terms...">{{ old('payment_terms') }}</textarea>
                                            @error('payment_terms')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contract-obligations" class="form-label">Contractual Obligations</label><span class="text-muted">(optional)</span>
                                            <textarea name="contract_obligations" id="contract-obligations" class="form-control" rows="3" placeholder="Describe contractual obligations...">{{ old('contract_obligations') }}</textarea>
                                            @error('contract_obligations')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="confidentiality-agreements" class="form-label">Confidentiality Agreements</label><span class="text-muted">(optional)</span>
                                            <textarea name="confidentiality_agreements" id="confidentiality-agreements" class="form-control" rows="3" placeholder="Describe confidentiality agreements...">{{ old('confidentiality_agreements') }}</textarea>
                                            @error('confidentiality_agreements')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <!-- Additional Information -->
                                <h4 class="pb-1 mb-0 pt-3 text-primary" style="font-weight: bold">8. Additional Information</h4>
                                <hr class="p-0 mt-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="additional-services" class="form-label">Any Additional Services Offered</label><span class="text-muted">(optional)</span>
                                            <textarea name="additional_services" id="additional-services" class="form-control" rows="3" placeholder="Describe additional services...">{{ old('additional_services') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="availability" class="form-label">Availability for Consultation</label><span class="text-muted">(optional)</span>
                                            <input type="text" name="availability" id="availability" class="form-control" placeholder="e.g., weekdays, weekends" value="{{ old('availability') }}">
                                            @error('availability')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="communication-method" class="form-label">Method of Communication</label><span class="text-muted">(optional)</span>
                                            <input type="text" name="communication_method" id="communication-method" class="form-control" placeholder="e.g., email, phone" value="{{ old('communication_method') }}">
                                            @error('communication_method')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <button class="btn btn-primary m-4">Register</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
