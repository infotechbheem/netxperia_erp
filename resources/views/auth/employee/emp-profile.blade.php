@extends('auth.employee.layouts.app')

@section('main-container')

<!-- Employee Profile view header section -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-xl-12 bg-primary">
            <marquee behavior="" direction="">
                <h3 class="pt-3 text-white">WELCOME TO NETXPERIA</h3>
            </marquee>
        </div>
    </div>
</div>
<!-- Employee profile view header section end -->


<!-- Employee profile view body section start -->
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-6 pt-2">
                    <h4 class="">Welcome, {{ $employee->name }} !!</h4>
                </div>
                <div class="col-md-6 pt-2" style="text-align: right">
                    <h6 class="">EMP ID : {{ $employee->emp_id }}</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <!-- Personal information area start -->
            <div class="row">
                <h5>
                    <img src="{{ asset('custom-asset/icon/profile-card.png') }}" alt="Profile Image" width="30">
                    <span> Personal Information</span>
                </h5>
            </div>
            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Full Name : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->name }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>
            <div class="row profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px; border-top:0px">
                <div class="col-md-5">
                    <strong>Father's Name : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->fathers_name }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>
            <div class="row profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px; border-top:0px">
                <div class="col-md-5">
                    <strong>Date of Birth : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->dob }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>
            <div class="row profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px; border-top:0px">
                <div class="col-md-5">
                    <strong>Gender : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->gender }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>
            <div class="row profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px; border-top:0px">
                <div class="col-md-5">
                    <strong>Email : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->email }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>
            <div class="row profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px; border-top:0px">
                <div class="col-md-5">
                    <strong>Mobile Number : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->phone_number }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>
            <div class="row profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px; border-top:0px">
                <div class="col-md-5">
                    <strong>Aadhar Number : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->aadhar_number }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>
            <div class="row profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px; border-top:0px">
                <div class="col-md-5">
                    <strong>Marital Status : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->marital_status }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>
            <div class="row profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px; border-top:0px">
                <div class="col-md-5">
                    <strong>Nationality : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->nationality }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>
            <div class="row profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px; border-top:0px">
                <div class="col-md-5">
                    <strong>Current Address : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->current_address }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>
            <div class="row profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px; border-top:0px">
                <div class="col-md-5">
                    <strong>Permanent Address : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->permanent_address }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <!-- Demographic Details area start -->
            <div class="row pt-3">
                <h5>
                    <img src="{{ asset('custom-asset/icon/demographic-details.png') }}" alt="Profile Image" width="30">
                    <span> Demographic Details</span>
                </h5>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Ethnicity : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->ethnicity ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Religion : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->religion ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Caste & Category : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->caste_category ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Disability Status : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->disability_status ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Language Spoken : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->languages_spoken ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>


            <!-- Employment Details area start -->
            <div class="row pt-3">
                <h5>
                    <img src="{{ asset('custom-asset/icon/employment-status.png') }}" alt="Profile Image" width="30">
                    <span> Employment Details</span>
                </h5>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Job Title : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->job_title ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Department : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->department ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Designation : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->designation ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong> Date of Joining : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->date_of_joining ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>
            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong> Employment Status : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->employment_status ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <!-- Salary and Payroll Details area start -->
            <div class="row pt-3">
                <h5>
                    <img src="{{ asset('custom-asset/icon/salary-details.png') }}" alt="Profile Image" width="30">
                    <span> Salary and Payroll Details</span>
                </h5>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Base Salary : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->base_salary ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Bonuses/Allowances : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->bonuses_allowances ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Deductions (Tax, PF, etc.) : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->deductions ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Payroll ID : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->payroll_id ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Bank Account Details : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->bank_account_details ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Salary Review Period : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->salary_review_period ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>


            <!-- Educational and Qualificational Details area start -->
            <div class="row pt-3">
                <h5>
                    <img src="{{ asset('custom-asset/icon/education-details.png') }}" alt="Profile Image" width="30">
                    <span> Educational and Qualificational Details</span>
                </h5>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Highest Qualification : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->highest_qualification ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>University/Institution Name : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->university_name ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Year of Passing : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->year_of_passing ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Certifications : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->certifications ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Skills (Technical and Soft) : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->skills ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Upload Marksheet : </strong>
                </div>
                <div class="col-md-4">
                    @if($employee->qualification_document)
                    <a href="{{ $employee->qualification_document }}" target="_blank">View Marksheet</a>
                    @else
                    <span>N/A</span>
                    @endif
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <!-- Previous Employment Details area start -->
            <div class="row pt-3">
                <h5>
                    <img src="{{ asset('custom-asset/icon/previous-employment.png') }}" alt="Profile Image" width="30">
                    <span> Previous Employment Details</span>
                </h5>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Previous Employer Name : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->previous_employer_name ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Position Held : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->position_held ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Start and End Date : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->start_date ? $employee->start_date->format('d-m-Y') : 'N/A' }} - {{ $employee->end_date ? $employee->end_date->format('d-m-Y') : 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Reason for Leaving : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->reason_for_leaving ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Experience Letter : </strong>
                </div>
                <div class="col-md-4">
                    @if($employee->experience_letter)
                    <a href="{{ $employee->experience_letter }}" target="_blank">View Experience Letter</a>
                    @else
                    <span>N/A</span>
                    @endif
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Salary Slip : </strong>
                </div>
                <div class="col-md-4">
                    @if($employee->salary_slip)
                    <a href="{{ $employee->salary_slip }}" target="_blank">View Salary Slip</a>
                    @else
                    <span>N/A</span>
                    @endif
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <!-- Taxation and Statutory Details area start -->
            <div class="row pt-3">
                <h5>
                    <img src="{{ asset('custom-asset/icon/taxation-details.png') }}" alt="Profile Image" width="30">
                    <span> Taxation and Statutory Details</span>
                </h5>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>PAN (Permanent Account Number) : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->pan ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Tax Identification Number : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->tax_identification_number ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Provident Fund Account Number : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->provident_fund_account_number ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>ESI Number : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->esi_number ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Gratuity Details : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->gratuity_details ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>


            <!-- Health and Insurance Information area start -->
            <div class="row pt-3">
                <h5>
                    <img src="{{ asset('custom-asset/icon/health-insurance.png') }}" alt="Health Insurance" width="30">
                    <span> Health and Insurance Information</span>
                </h5>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Medical Insurance Details : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->medical_insurance_details ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Nominee for Insurance : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->nominee_for_insurance ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Health Conditions : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->health_conditions ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <!-- Professional References area start -->
            <div class="row pt-3">
                <h5>
                    <img src="{{ asset('custom-asset/icon/professional-reference.png') }}" alt="Professional Reference" width="30">
                    <span> Professional References</span>
                </h5>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Name of Reference : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->reference_name ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Designation : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->reference_designation ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Contact Information : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->reference_contact ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

            <div class="row mt-2 profile-hover" style="border: 1px solid rgb(19, 113, 245); padding:12px 0px">
                <div class="col-md-5">
                    <strong>Relationship with Employee : </strong>
                </div>
                <div class="col-md-4">
                    <span>{{ $employee->relationship_with_reference ?? 'N/A' }}</span>
                </div>
                <div class="col-md-3" style="text-align: right">
                    <i class="fa fa-angle-right" style="margin-right: 10px"></i>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Employee Profile view body section end -->

@endsection
