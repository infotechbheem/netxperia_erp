@extends('auth.admin.layouts.app')

@section('main-container')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Employee Registration</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.employee') }}">Employee</a></li>
                        <li class="breadcrumb-item active">Employee Registration</li>
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
                            <h4>Register New Employee</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.employee.registration.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- Personal Details -->
                                <h4 class="pb-1 mb-0 text-primary" style="font-weight: bold">1. Personal Details</h4>
                                <hr class="p-0 mt-0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Full Name</label><span class="text-danger">*</span>
                                            <input type="text" name="name" id="name" class="form-control">
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Father's Name</label><span class="text-danger">*</span>
                                            <input type="text" name="fathers_name" id="fathers-name" class="form-control">
                                            @error('fathers_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Date of Birth</label><span class="text-danger">*</span>
                                            <input type="date" name="dob" id="dob" class="form-control">
                                            @error('dob')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <p class="form-label pb-1 m-0" style="font-weight: bold">Gender<span class="text-danger">*</span></p>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="gender" value="male" />
                                                <label class="form-check-label" for="">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="gender" value="female" />
                                                <label class="form-check-label" for="">Female</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="gender" value="other" />
                                                <label class="form-check-label" for="">Other</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Nationality</label>
                                            <select name="nationality" id="nationality" class="form-control">
                                                <option value="">--Select Nationality--</option>
                                                <option value="AF">Afghanistan</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                                <option value="AD">Andorra</option>
                                                <option value="AO">Angola</option>
                                                <option value="AG">Antigua and Barbuda</option>
                                                <option value="AR">Argentina</option>
                                                <option value="AM">Armenia</option>
                                                <option value="AU">Australia</option>
                                                <option value="AT">Austria</option>
                                                <option value="AZ">Azerbaijan</option>
                                                <option value="BS">Bahamas</option>
                                                <option value="BH">Bahrain</option>
                                                <option value="BD">Bangladesh</option>
                                                <option value="BB">Barbados</option>
                                                <option value="BY">Belarus</option>
                                                <option value="BE">Belgium</option>
                                                <option value="BZ">Belize</option>
                                                <option value="BJ">Benin</option>
                                                <option value="BT">Bhutan</option>
                                                <option value="BO">Bolivia</option>
                                                <option value="BA">Bosnia and Herzegovina</option>
                                                <option value="BW">Botswana</option>
                                                <option value="BR">Brazil</option>
                                                <option value="BN">Brunei</option>
                                                <option value="BG">Bulgaria</option>
                                                <option value="BF">Burkina Faso</option>
                                                <option value="BI">Burundi</option>
                                                <option value="CV">Cabo Verde</option>
                                                <option value="KH">Cambodia</option>
                                                <option value="CM">Cameroon</option>
                                                <option value="CA">Canada</option>
                                                <option value="CF">Central African Republic</option>
                                                <option value="TD">Chad</option>
                                                <option value="CL">Chile</option>
                                                <option value="CN">China</option>
                                                <option value="CO">Colombia</option>
                                                <option value="KM">Comoros</option>
                                                <option value="CG">Congo (Congo-Brazzaville)</option>
                                                <option value="CD">Congo (Congo-Kinshasa)</option>
                                                <option value="CR">Costa Rica</option>
                                                <option value="CI">Côte d’Ivoire</option>
                                                <option value="HR">Croatia</option>
                                                <option value="CU">Cuba</option>
                                                <option value="CY">Cyprus</option>
                                                <option value="CZ">Czech Republic</option>
                                                <option value="DK">Denmark</option>
                                                <option value="DJ">Djibouti</option>
                                                <option value="DM">Dominica</option>
                                                <option value="DO">Dominican Republic</option>
                                                <option value="EC">Ecuador</option>
                                                <option value="EG">Egypt</option>
                                                <option value="SV">El Salvador</option>
                                                <option value="GQ">Equatorial Guinea</option>
                                                <option value="ER">Eritrea</option>
                                                <option value="EE">Estonia</option>
                                                <option value="SZ">Eswatini</option>
                                                <option value="ET">Ethiopia</option>
                                                <option value="FJ">Fiji</option>
                                                <option value="FI">Finland</option>
                                                <option value="FR">France</option>
                                                <option value="GA">Gabon</option>
                                                <option value="GM">Gambia</option>
                                                <option value="GE">Georgia</option>
                                                <option value="DE">Germany</option>
                                                <option value="GH">Ghana</option>
                                                <option value="GR">Greece</option>
                                                <option value="GD">Grenada</option>
                                                <option value="GT">Guatemala</option>
                                                <option value="GN">Guinea</option>
                                                <option value="GW">Guinea-Bissau</option>
                                                <option value="GY">Guyana</option>
                                                <option value="HT">Haiti</option>
                                                <option value="HN">Honduras</option>
                                                <option value="HU">Hungary</option>
                                                <option value="IS">Iceland</option>
                                                <option value="IN">India</option>
                                                <option value="ID">Indonesia</option>
                                                <option value="IR">Iran</option>
                                                <option value="IQ">Iraq</option>
                                                <option value="IE">Ireland</option>
                                                <option value="IL">Israel</option>
                                                <option value="IT">Italy</option>
                                                <option value="JM">Jamaica</option>
                                                <option value="JP">Japan</option>
                                                <option value="JO">Jordan</option>
                                                <option value="KZ">Kazakhstan</option>
                                                <option value="KE">Kenya</option>
                                                <option value="KI">Kiribati</option>
                                                <option value="KW">Kuwait</option>
                                                <option value="KG">Kyrgyzstan</option>
                                                <option value="LA">Laos</option>
                                                <option value="LV">Latvia</option>
                                                <option value="LB">Lebanon</option>
                                                <option value="LS">Lesotho</option>
                                                <option value="LR">Liberia</option>
                                                <option value="LY">Libya</option>
                                                <option value="LI">Liechtenstein</option>
                                                <option value="LT">Lithuania</option>
                                                <option value="LU">Luxembourg</option>
                                                <option value="MG">Madagascar</option>
                                                <option value="MW">Malawi</option>
                                                <option value="MY">Malaysia</option>
                                                <option value="MV">Maldives</option>
                                                <option value="ML">Mali</option>
                                                <option value="MT">Malta</option>
                                                <option value="MH">Marshall Islands</option>
                                                <option value="MR">Mauritania</option>
                                                <option value="MU">Mauritius</option>
                                                <option value="MX">Mexico</option>
                                                <option value="FM">Micronesia</option>
                                                <option value="MD">Moldova</option>
                                                <option value="MC">Monaco</option>
                                                <option value="MN">Mongolia</option>
                                                <option value="ME">Montenegro</option>
                                                <option value="MA">Morocco</option>
                                                <option value="MZ">Mozambique</option>
                                                <option value="MM">Myanmar</option>
                                                <option value="NA">Namibia</option>
                                                <option value="NR">Nauru</option>
                                                <option value="NP">Nepal</option>
                                                <option value="NL">Netherlands</option>
                                                <option value="NZ">New Zealand</option>
                                                <option value="NI">Nicaragua</option>
                                                <option value="NE">Niger</option>
                                                <option value="NG">Nigeria</option>
                                                <option value="KP">North Korea</option>
                                                <option value="MK">North Macedonia</option>
                                                <option value="NO">Norway</option>
                                                <option value="OM">Oman</option>
                                                <option value="PK">Pakistan</option>
                                                <option value="PW">Palau</option>
                                                <option value="PA">Panama</option>
                                                <option value="PG">Papua New Guinea</option>
                                                <option value="PY">Paraguay</option>
                                                <option value="PE">Peru</option>
                                                <option value="PH">Philippines</option>
                                                <option value="PL">Poland</option>
                                                <option value="PT">Portugal</option>
                                                <option value="QA">Qatar</option>
                                                <option value="RO">Romania</option>
                                                <option value="RU">Russia</option>
                                                <option value="RW">Rwanda</option>
                                                <option value="KN">Saint Kitts and Nevis</option>
                                                <option value="LC">Saint Lucia</option>
                                                <option value="VC">Saint Vincent and the Grenadines</option>
                                                <option value="WS">Samoa</option>
                                                <option value="SM">San Marino</option>
                                                <option value="ST">Sao Tome and Principe</option>
                                                <option value="SA">Saudi Arabia</option>
                                                <option value="SN">Senegal</option>
                                                <option value="RS">Serbia</option>
                                                <option value="SC">Seychelles</option>
                                                <option value="SL">Sierra Leone</option>
                                                <option value="SG">Singapore</option>
                                                <option value="SK">Slovakia</option>
                                                <option value="SI">Slovenia</option>
                                                <option value="SB">Solomon Islands</option>
                                                <option value="SO">Somalia</option>
                                                <option value="ZA">South Africa</option>
                                                <option value="KR">South Korea</option>
                                                <option value="SS">South Sudan</option>
                                                <option value="ES">Spain</option>
                                                <option value="LK">Sri Lanka</option>
                                                <option value="SD">Sudan</option>
                                                <option value="SR">Suriname</option>
                                                <option value="SE">Sweden</option>
                                                <option value="CH">Switzerland</option>
                                                <option value="SY">Syria</option>
                                                <option value="TW">Taiwan</option>
                                                <option value="TJ">Tajikistan</option>
                                                <option value="TZ">Tanzania</option>
                                                <option value="TH">Thailand</option>
                                                <option value="TL">Timor-Leste</option>
                                                <option value="TG">Togo</option>
                                                <option value="TO">Tonga</option>
                                                <option value="TT">Trinidad and Tobago</option>
                                                <option value="TN">Tunisia</option>
                                                <option value="TR">Turkey</option>
                                                <option value="TM">Turkmenistan</option>
                                                <option value="TV">Tuvalu</option>
                                                <option value="UG">Uganda</option>
                                                <option value="UA">Ukraine</option>
                                                <option value="AE">United Arab Emirates</option>
                                                <option value="GB">United Kingdom</option>
                                                <option value="US">United States</option>
                                                <option value="UY">Uruguay</option>
                                                <option value="UZ">Uzbekistan</option>
                                                <option value="VU">Vanuatu</option>
                                                <option value="VE">Venezuela</option>
                                                <option value="VN">Vietnam</option>
                                                <option value="YE">Yemen</option>
                                                <option value="ZM">Zambia</option>
                                                <option value="ZW">Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Marital Status</label>
                                            <select name="marital_status" id="marital-status" class="form-control">
                                                <option value="">--Select Marital Status--</option>
                                                <option value="single">Single</option>
                                                <option value="married">Married</option>
                                                <option value="divorced">Divorced</option>
                                                <option value="widowed">Widowed</option>
                                                <option value="separated">Separated</option>
                                                <option value="engaged">Engaged</option>
                                                <option value="cohabiting">Cohabiting</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Email</label>
                                            <input type="email" name="email" id="email" class="form-control">
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Mobile Number</label>
                                            <input type="text" name="phone_number" id="phone-number" class="form-control">
                                            @error('phone_number')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Aadhar Number</label>
                                            <input type="text" name="aadhar_number" id="aadhar-number" class="form-control">
                                            @error('aadhar_number')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Current Address</label>
                                            <textarea name="current_address" id="current-address" cols="30" rows="1" class="form-control"></textarea>
                                            @error('current_address')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Permanent Address</label>
                                            <textarea name="permanent_address" id="permanent-address" cols="30" rows="1" class="form-control"></textarea>
                                            @error('permanent_address')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Upload Profile Image</label><span class="text-danger">*</span>
                                            <input type="file" name="profile_image" id="profile-image" class="form-control">
                                            @error('profile_image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Demographic Details -->
                                <h4 class="pb-1 mb-0 pt-3 text-primary" style="font-weight: bold">2. Demographic Details</h4>
                                <hr class="p-0 mt-0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ethnicity" class="form-label">Ethnicity (if relevant)</label>
                                            <select class="form-control" id="ethnicity" name="ethnicity">
                                                <option value="">--Select Ethnicity--</option>
                                                <option value="asian">Asian</option>
                                                <option value="black">Black or African American</option>
                                                <option value="hispanic">Hispanic or Latino</option>
                                                <option value="native-american">Native American</option>
                                                <option value="white">White</option>
                                                <option value="mixed">Mixed/Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="religion" class="form-label">Religion (optional)</label>
                                            <select class="form-control" id="religion" name="religion">
                                                <option value="">--Select Religion--</option>
                                                <option value="christianity">Christianity</option>
                                                <option value="islam">Islam</option>
                                                <option value="hinduism">Hinduism</option>
                                                <option value="buddhism">Buddhism</option>
                                                <option value="judaism">Judaism</option>
                                                <option value="sikhism">Sikhism</option>
                                                <option value="other">Other</option>
                                                <option value="none">Prefer not to say</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="caste-category" class="form-label">Caste Category (for reservation)</label>
                                            <select class="form-control" id="caste-category" name="caste_category">
                                                <option value="">--Select Caste Category--</option>
                                                <option value="general">General</option>
                                                <option value="obc">OBC (Other Backward Classes)</option>
                                                <option value="sc">SC (Scheduled Caste)</option>
                                                <option value="st">ST (Scheduled Tribe)</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="disability-status" class="form-label">Disability Status</label>
                                            <select class="form-control" id="disability-status" name="disability_status">
                                                <option value="">--Select Disability Status--</option>
                                                <option value="none">None</option>
                                                <option value="physical">Physical Disability</option>
                                                <option value="vision">Visual Impairment</option>
                                                <option value="hearing">Hearing Impairment</option>
                                                <option value="mental">Mental Health Conditions</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="languages-spoken" class="form-label">Languages Spoken</label>
                                            <input type="text" class="form-control" id="languages-spoken" name="languages_spoken" placeholder="Enter languages spoken (comma separated)">
                                        </div>
                                    </div>
                                </div>

                                <!-- Employeement Details -->
                                <h4 class="pb-1 mb-0 pt-3 text-primary" style="font-weight: bold">3. Employment Details</h4>
                                <hr class="p-0 mt-0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="job-title" class="form-label">Job Title</label>
                                            <input type="text" class="form-control" id="job-title" name="job_title" placeholder="Enter Job Title">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="department" class="form-label">Department</label>
                                            <select name="department" id="department" class="form-control">
                                                <option value="">--Select Department--</option>
                                                @foreach ($departments as $department)
                                                <option value="{{ $department->department }}">{{ $department->department }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="position" class="form-label">Designation</label>
                                            <select name="designation" id="designation" class="form-control">
                                                <option value="">--Select Designation--</option>
                                                @foreach ($designations as $designation)
                                                <option value="{{ $designation->designation }}">{{ $designation->designation }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="date-of-joining" class="form-label">Date of Joining</label>
                                            <input type="date" class="form-control" id="date-of-joining" name="date_of_joining">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="employment-status" class="form-label">Employment Status</label>
                                            <select class="form-control" id="employment-status" name="employment_status">
                                                <option value="">--Select Employment Status--</option>
                                                <option value="full-time">Full-time</option>
                                                <option value="part-time">Part-time</option>
                                                <option value="contract">Contract</option>
                                                <option value="intern">Intern</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="work-location" class="form-label">Work Location</label>
                                            <select class="form-control" id="work-location" name="work_location">
                                                <option value="">--Select Work Location--</option>
                                                <option value="headquarters">Headquarters</option>
                                                <option value="branch-office">Branch Office</option>
                                                <option value="remote">Remote</option>
                                                <option value="field">Field</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="supervisor-name" class="form-label">Supervisor/Manager Name</label>
                                            <input type="text" class="form-control" id="supervisor-name" name="supervisor_name" placeholder="Enter Supervisor/Manager Name">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="probation-start" class="form-label">Probation Period Start Date</label>
                                            <input type="date" class="form-control" id="probation-start" name="probation_start">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="probation-end" class="form-label">Probation Period End Date</label>
                                            <input type="date" class="form-control" id="probation-end" name="probation_end">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="date-of-confirmation" class="form-label">Date of Confirmation</label>
                                            <input type="date" class="form-control" id="date-of-confirmation" name="date_of_confirmation">
                                        </div>
                                    </div>
                                </div>

                                <!-- Salary and Payroll Details -->
                                <h4 class="pb-1 mb-0 pt-3 text-primary" style="font-weight: bold">4. Salary and Payroll Details</h4>
                                <hr class="p-0 mt-0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="base-salary" class="form-label">Base Salary</label>
                                            <input type="number" class="form-control" id="base-salary" name="base_salary" placeholder="Enter Base Salary">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bonuses-allowances" class="form-label">Bonuses/Allowances</label>
                                            <input type="number" class="form-control" id="bonuses-allowances" name="bonuses_allowances" placeholder="Enter Bonuses/Allowances">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="deductions" class="form-label">Deductions</label>
                                            <input type="number" class="form-control" id="deductions" name="deductions" placeholder="Enter Deductions (Tax, PF, etc.)">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="payroll-id" class="form-label">Payroll ID</label>
                                            <input type="text" class="form-control" id="payroll-id" name="payroll_id" placeholder="Enter Payroll ID">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bank-account-details" class="form-label">Bank Account Details</label>
                                            <input type="text" class="form-control" id="bank-account-details" name="bank_account_details" placeholder="Enter Bank Account Details">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="salary-review-period" class="form-label">Salary Review Period</label>
                                            <select class="form-control" id="salary-review-period" name="salary_review_period">
                                                <option value="">--Select Salary Review Period--</option>
                                                <option value="6-months">Every 6 Months</option>
                                                <option value="1-year">Every Year</option>
                                                <option value="2-years">Every 2 Years</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Educational and Qualificational Details -->
                                <h4 class="pb-1 mb-0 pt-3 text-primary" style="font-weight: bold">5. Educational and Qualificational Details</h4>
                                <hr class="p-0 mt-0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="highest-qualification" class="form-label">Highest Qualification</label>
                                            <input type="text" class="form-control" id="highest-qualification" name="highest_qualification" placeholder="Enter Highest Qualification">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="institution-name" class="form-label">University/Institution Name</label>
                                            <input type="text" class="form-control" id="institution-name" name="institution_name" placeholder="Enter University/Institution Name">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="year-of-passing" class="form-label">Year of Passing</label>
                                            <input type="number" class="form-control" id="year-of-passing" name="year_of_passing" placeholder="Enter Year of Passing">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="certifications" class="form-label">Certifications</label>
                                            <input type="text" class="form-control" id="certifications" name="certifications" placeholder="Enter Certifications">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="skills" class="form-label">Skills</label>
                                            <textarea class="form-control" id="skills" name="skills" rows="1" placeholder="Enter Technical and Soft Skills"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="skills" class="form-label">Upload Marksheet</label><span class="text-danger">*</span>
                                            <input type="file" class="form-control" name="qualification_document" id="qualification_document">
                                            @error('qualification_document')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Previous Employment Details -->
                                <h4 class="pb-1 mb-0 pt-3 text-primary" style="font-weight: bold">6. Previous Employment Details</h4>
                                <hr class="p-0 mt-0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="previous-employer" class="form-label">Previous Employer Name</label>
                                            <input type="text" class="form-control" id="previous-employer" name="previous_employer" placeholder="Enter Previous Employer Name">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="position-held" class="form-label">Position Held</label>
                                            <input type="text" class="form-control" id="position-held" name="position_held" placeholder="Enter Position Held">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="employment-dates" class="form-label">Start and End Date</label>
                                            <div class="input-group">
                                                <input type="date" class="form-control" id="start-date" name="start_date" placeholder="Start Date">
                                                <input type="date" class="form-control" id="end-date" name="end_date" placeholder="End Date">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="reason-for-leaving" class="form-label">Reason for Leaving</label>
                                            <input type="text" class="form-control" id="reason-for-leaving" name="reason_for_leaving" placeholder="Enter Reason for Leaving">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="experience-letter" class="form-label">Experience Letter</label>
                                            <input type="file" class="form-control" id="experience-letter" name="experience_letter">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="slary_slip" class="form-label">Salary Slip</label>
                                            <input type="file" class="form-control" id="salary-slip" name="salary_slip">
                                        </div>
                                    </div>
                                </div>

                                <!-- Taxation and Statutory Details -->
                                <h4 class="pb-1 mb-0 pt-3 text-primary" style="font-weight: bold">7. Taxation and Statutory Details</h4>
                                <hr class="p-0 mt-0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pan" class="form-label">PAN (Permanent Account Number)</label>
                                            <input type="text" class="form-control" id="pan" name="pan" placeholder="Enter PAN">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tax-id" class="form-label">Tax Identification Number</label>
                                            <input type="text" class="form-control" id="tax-id" name="tax_id" placeholder="Enter Tax Identification Number (if applicable)">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="provident-fund" class="form-label">Provident Fund Account Number</label>
                                            <input type="text" class="form-control" id="provident-fund" name="provident_fund" placeholder="Enter Provident Fund Account Number">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="esi-number" class="form-label">ESI Number</label>
                                            <input type="text" class="form-control" id="esi-number" name="esi_number" placeholder="Enter ESI Number (if applicable)">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="gratuity-details" class="form-label">Gratuity Details</label>
                                            <textarea class="form-control" id="gratuity-details" name="gratuity_details" rows="3" placeholder="Enter Gratuity Details"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Health and Insurance Information -->
                                <h4 class="pb-1 mb-0 pt-3 text-primary" style="font-weight: bold">8. Health and Insurance Information</h4>
                                <hr class="p-0 mt-0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="medical-insurance" class="form-label">Medical Insurance Details</label>
                                            <input type="text" class="form-control" id="medical-insurance" name="medical_insurance" placeholder="Enter Medical Insurance Details">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nominee" class="form-label">Nominee for Insurance</label>
                                            <input type="text" class="form-control" id="nominee" name="nominee" placeholder="Enter Nominee Name">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="health-conditions" class="form-label">Health Conditions</label>
                                            <textarea class="form-control" id="health-conditions" name="health_conditions" rows="3" placeholder="Enter Health Conditions (if any)"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Professional References -->
                                <h4 class="pb-1 mb-0 pt-3 text-primary" style="font-weight: bold">9. Professional References</h4>
                                <hr class="p-0 mt-0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="reference-name" class="form-label">Name of Reference</label>
                                            <input type="text" class="form-control" id="reference-name" name="reference_name" placeholder="Enter Name of Reference">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="reference-designation" class="form-label">Designation</label>
                                            <input type="text" class="form-control" id="reference-designation" name="reference_designation" placeholder="Enter Designation">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="reference-contact" class="form-label">Contact Information</label>
                                            <input type="text" class="form-control" id="reference-contact" name="reference_contact" placeholder="Enter Contact Information">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="relationship" class="form-label">Relationship with Employee</label>
                                            <input type="text" class="form-control" id="relationship" name="relationship" placeholder="Enter Relationship with Employee">
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
