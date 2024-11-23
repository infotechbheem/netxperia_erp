@extends('auth.admin.layouts.app')

@section('main-container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Client Registration</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.client') }}">Client</a></li>
                        <li class="breadcrumb-item active">Client Registration</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-success">
                <div class="card-header">
                    <h4 class="m-0 text-center">Client Registation</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.client.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <!-- Full Name Field (First Name, Last Name) -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name" class="form-label">First Name</label><span class="text-danger">*</span>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Email Address Field -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email" class="form-label">Email Address</label><span class="text-danger">*</span>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Phone Number Field -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phone_number" class="form-label">Phone Number</label><span class="text-danger">*</span>
                                <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number') }}">
                                @error('phone_number')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="password" class="form-label">Password</label><span class="text-danger">*</span>
                                <input type="password" name="password" id="password" class="form-control">
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="password_confirmation" class="form-label">Confirm Password</label><span class="text-danger">*</span>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Company Name Field (If applicable) -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="company_name" class="form-label">Company Name (Optional)</label>
                                <input type="text" name="company_name" id="company_name" class="form-control" value="{{ old('company_name') }}">
                            </div>
                        </div>

                        <!-- Client Type (Individual or Company) -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="client_type" class="form-label">Client Type</label><span class="text-danger">*</span>
                                <select name="client_type" id="client_type" class="form-control">
                                    <option value="Individual" {{ old('client_type') == 'Individual' ? 'selected' : '' }}>Individual</option>
                                    <option value="Company" {{ old('client_type') == 'Company' ? 'selected' : '' }}>Company</option>
                                </select>
                                @error('client_type')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Country Field -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="country" class="form-label">Country</label><span class="text-danger">*</span>
                                <input type="text" name="country" id="country" class="form-control" value="{{ old('country') }}">
                                @error('country')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Address Field (Optional) -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="address" class="form-label">Address (Optional)</label>
                                <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
                            </div>
                        </div>

                        <!-- Preferred Language Field (Optional) -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="preferred_language" class="form-label">Preferred Language (Optional)</label>
                                <input type="text" name="preferred_language" id="preferred_language" class="form-control" value="{{ old('preferred_language') }}">
                            </div>
                        </div>

                        <!-- Referral Source Field -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="referral_source" class="form-label">Referral Source</label>
                                <input type="text" name="referral_source" id="referral_source" class="form-control" value="{{ old('referral_source') }}">
                            </div>
                        </div>

                        <!-- Date of Birth Field (Optional) -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dob" class="form-label">Date of Birth (Optional)</label>
                                <input type="date" name="dob" id="dob" class="form-control" value="{{ old('dob') }}">
                            </div>
                        </div>

                        <!-- Occupation Field (Optional) -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="occupation" class="form-label">Occupation (Optional)</label>
                                <input type="text" name="occupation" id="occupation" class="form-control" value="{{ old('occupation') }}">
                            </div>
                        </div>

                        <!-- Tax Identification Number / Company Registration Number (Optional) -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tax_identification" class="form-label">Tax Identification Number / Company Registration Number (Optional)</label>
                                <input type="text" name="tax_identification" id="tax_identification" class="form-control" value="{{ old('tax_identification') }}">
                            </div>
                        </div>

                        <!-- Industry Field (Optional) -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="industry" class="form-label">Industry (Optional)</label>
                                <input type="text" name="industry" id="industry" class="form-control" value="{{ old('industry') }}">
                            </div>
                        </div>

                        <!-- Communication Preferences Field -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="communication_preferences" class="form-label">Communication Preferences</label>
                                <select name="communication_preferences" id="communication_preferences" class="form-control">
                                    <option value="Email" {{ old('communication_preferences') == 'Email' ? 'selected' : '' }}>Email</option>
                                    <option value="Phone" {{ old('communication_preferences') == 'Phone' ? 'selected' : '' }}>Phone</option>
                                    <option value="SMS" {{ old('communication_preferences') == 'SMS' ? 'selected' : '' }}>SMS</option>
                                </select>
                            </div>
                        </div>

                        <!-- Terms and Conditions Field -->
                        <div class="col-md-4">
                            <div class="form-group" style="margin: 0; margin-top:33px">
                                <input type="checkbox" name="terms_conditions" id="terms_conditions" {{ old('terms_conditions') ? 'checked' : '' }}>
                                <label for="terms_conditions">I agree to the Terms and Conditions</label><span class="text-danger">*</span>
                            </div>
                            @error('terms_conditions')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Marketing Opt-in Checkbox (Optional) -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="checkbox" name="marketing_opt_in" id="marketing_opt_in" {{ old('marketing_opt_in') ? 'checked' : '' }}>
                                <label for="marketing_opt_in">Subscribe to marketing emails</label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
