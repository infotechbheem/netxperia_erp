@extends('auth.admin.layouts.app')

@section('main-container')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Employee Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.employee') }}">Employee</a></li>
                        <li class="breadcrumb-item active">Employee Details </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="data:image/jpeg;base64,{{ $empDetails->profile_image }}" alt="User profile picture" width="80" height="80">
                            </div>
                            <h3 class="profile-username text-center">{{ $empDetails->name }}</h3>

                            <p class="text-muted text-center">{{ $empDetails->position ?? "N/A" }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Employee ID</b> <a class="float-right">{{ $empDetails->emp_id }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Phone Number</b> <a class="float-right">{{ $empDetails->phone_number }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Joining Date</b> <a class="float-right">{{ Carbon\Carbon::parse($empDetails->created_at)->format('d-m-Y') }}</a>
                                </li>
                            </ul>

                            <a href="#" class="btn btn-primary btn-block"><b>Print Id Card</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong class="text-primary"><i class="fas fa-book mr-1"></i> Education</strong>

                            <p class="text-muted">
                                B.S. in Computer Science from the University of Tennessee at Knoxville
                            </p>

                            <hr>

                            <strong class="text-primary"><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                            <p class="text-muted">Malibu, California</p>

                            <hr>

                            <strong class="text-primary"><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                            <p class="text-muted">
                                <span class="tag tag-danger">UI Design</span>
                                <span class="tag tag-success">Coding</span>
                                <span class="tag tag-info">Javascript</span>
                                <span class="tag tag-warning">PHP</span>
                                <span class="tag tag-primary">Node.js</span>
                            </p>

                            <hr>

                            <strong class="text-primary"><i class="far fa-file-alt mr-1"></i> Notes</strong>

                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#personalDetails" data-toggle="tab">Personal Details</a></li>
                                <li class="nav-item"><a class="nav-link" href="#demographicDetails" data-toggle="tab">Demographic Details</a></li>
                                <li class="nav-item"><a class="nav-link" href="#employmentDetails" data-toggle="tab">Employment Details</a></li>
                                <li class="nav-item"><a class="nav-link" href="#salaryAndPayroll" data-toggle="tab">Salary and Payroll Details</a></li>
                                <li class="nav-item"><a class="nav-link" href="#educationnalQualication" data-toggle="tab">Educational Qualification</a></li>
                                <li class="nav-item"><a class="nav-link" href="#previousEmployment" data-toggle="tab">Previous Employment</a></li>
                                <li class="nav-item"><a class="nav-link" href="#taxationStatutory" data-toggle="tab">Taxation and Statutory Details</a></li>
                                <li class="nav-item"><a class="nav-link" href="#healthAndInsurance" data-toggle="tab">Health and Insurance Information</a></li>
                                <li class="nav-item"><a class="nav-link" href="#references" data-toggle="tab">Professional References</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="personalDetails">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><strong class="text-primary">Name : </strong>{{ $empDetails->name }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong class="text-primary">Father's Name : </strong>{{ $empDetails->fathers_name }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Date of Birth : </strong>{{ $empDetails->dob }}</p>
                                            </div>
                                            <div class="col-md-3">
                                                <p><strong class="text-primary">Gender : </strong>{{ $empDetails->gender }}</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p><strong class="text-primary">Email Id : </strong>{{ $empDetails->email }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Mobile Number : </strong>{{ $empDetails->phone_number }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Marital Status : </strong>{{ $empDetails->marital_status }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Nationality : </strong>{{ $empDetails->nationality }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <p><strong class="text-primary">Current Address : </strong>{{ $empDetails->current_address }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <p><strong class="text-primary">Permanent Address : </strong>{{ $empDetails->permanent_address }}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="demographicDetails">
                                    <!-- The timeline -->
                                    <div class="container">
                                        <div class="row ">
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Ethnicity : </strong>{{ $empDetails->ethnicity ?? "Not Available " }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Religion : </strong>{{ $empDetails->religion ?? "Not Available "}}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Cast / Category : </strong>{{ $empDetails->caste_category ?? "Not Available "}}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Disability Status : </strong>{{ $empDetails->disability_status ?? "Not Available "}}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Languages Spoken : </strong>{{ $empDetails->languages_spoken ?? "Not Available "}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="employmentDetails">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Job Title : </strong>{{ $empDetails->job_title ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Department : </strong>{{ $empDetails->department ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Designation : </strong>{{ $empDetails->position ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Date of Joining : </strong>{{ $empDetails->date_of_joining ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Employment Status : </strong>{{ $empDetails->employment_status ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Work Location : </strong>{{ $empDetails->work_location ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Supervisor/Manager Name : </strong>{{ $empDetails->supervisor_name ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Probation Period Start Date : </strong>{{ $empDetails->probation_start ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Probation Period End Date : </strong>{{ $empDetails->probation_end ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Date of Confirmation : </strong>{{ $empDetails->date_of_confirmation ?? "Not Available" }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="salaryAndPayroll">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Base Salary : </strong>{{ $empDetails->base_salary ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Bonuses/Allowances : </strong>{{ $empDetails->bonuses_allowances ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Deductions : </strong>{{ $empDetails->deductions ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Payroll ID : </strong>{{ $empDetails->payroll_id ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Bank Account Details : </strong>{{ $empDetails->bank_account_details ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Salary Review Period : </strong>{{ $empDetails->salary_review_period ?? "Not Available" }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="educationnalQualication">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Highest Qualification : </strong>{{ $empDetails->highest_qualification ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">University/Institution Name : </strong>{{ $empDetails->institution_name ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Year of Passing : </strong>{{ $empDetails->year_of_passing ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Certifications : </strong>{{ $empDetails->certifications ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Skills : </strong>{{ $empDetails->skills ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Upload Marksheet : </strong>{{ $empDetails->qualification_document ?? "Not Available" }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="previousEmployment">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Previous Employer Name : </strong>{{ $empDetails->previous_employer ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Position Held : </strong>{{ $empDetails->position_held ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Started Date : </strong>{{ $empDetails->start_date ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Ending Date : </strong>{{ $empDetails->end_date ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Reason for Leaving : </strong>{{ $empDetails->reason_for_leaving ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Experience Letter : </strong>Click Here</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Previou month Salary Slip : </strong>Click Here</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="taxationStatutory">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">PAN (Permanent Account Number) : </strong>{{ $empDetails->pan ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Tax Identification Number : </strong>{{ $empDetails->tax_id ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Provident Fund Account Number : </strong>{{ $empDetails->provident_fund ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">ESI Number : </strong>{{ $empDetails->esi_number ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong class="text-primary">Gratuity Details : </strong>{{ $empDetails->gratuity_details ?? "Not Available" }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="healthAndInsurance">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p><strong class="text-primary">Medical Insurance Details : </strong>{{ $empDetails->medical_insurance ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <p><strong class="text-primary">Nominee for Insurance : </strong>{{ $empDetails->nominee ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <p><strong class="text-primary">Health Conditions : </strong>{{ $empDetails->health_conditions ?? "Not Available" }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="references">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p><strong class="text-primary">Name of Reference : </strong>{{ $empDetails->reference_name ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <p><strong class="text-primary"> Designation : </strong>{{ $empDetails->reference_designation ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <p><strong class="text-primary">Contact Information : </strong>{{ $empDetails->reference_contact ?? "Not Available" }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <p><strong class="text-primary">Relationship with Employee : </strong>{{ $empDetails->relationship ?? "Not Available" }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
