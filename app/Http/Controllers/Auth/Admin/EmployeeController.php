<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Employee\SendRegistrationMail;
use App\Models\Employee\Department;
use App\Models\Employee\Designation;
use App\Models\Employee\EMPDemographicDetails;
use App\Models\Employee\EMPEducationalDetails;
use App\Models\Employee\EMPEmploymentDetails;
use App\Models\Employee\EMPMedicalAndInsuranceDetails;
use App\Models\Employee\EMPPersonalDetails;
use App\Models\Employee\EMPPreviousEmploymentDetails;
use App\Models\Employee\EMPProfessionalReference;
use App\Models\Employee\EMPSalaryAndPayrollDetails;
use App\Models\Employee\EMPTaxAndPFDetails;
use App\Models\Employee\Project;
use App\Models\Employee\ProjectCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class EmployeeController extends Controller
{
    public function departmentAndDesignation()
    {
        $departments = Department::get();
        $designations = Designation::get();
        return view("auth.admin.employee.emp-department-designation", compact('departments', 'designations'));
    }

    public function storeDepartment(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'department' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withError($validator)->withInput();
            }
            $department = new Department();
            $department->department = $request->input('department');
            $department->save();
            if ($department) {
                return redirect()->back()->with('success', 'Department Added Successfully!!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }
    public function storeDesignation(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'designation' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withError($validator)->withInput();
            }
            $designation = new Designation();
            $designation->designation = $request->input('designation');
            $designation->save();
            if ($designation) {
                return redirect()->back()->with('success', 'Department Added Successfully!!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }

    public function index()
    {
        // In your controller method
        $employees = DB::table('emp_personal_details')
            ->join('users', 'emp_personal_details.emp_id', '=', 'users.username')
            ->select('emp_personal_details.*', 'users.*')
            ->get()
            ->map(function ($employee) {
                // Encrypt the emp_id for the profile link
                $employee->encrypted_id = Crypt::encryptString($employee->emp_id);
                return $employee;
            });
        return view('auth.admin.employee.employee', compact('employees'));
    }

    public function empRegistration()
    {
        $departments = Department::get();
        $designations = Designation::get();
        return view('auth.admin.employee.emp-registration', compact('departments', 'designations'));
    }

    // Employee Registration
    public function storeEmpRegistration(Request $request)
    {

        try {
            DB::beginTransaction();
            // Validate the incoming request data
            $validator = Validator::make($request->all(), [

                // Emp Personal Details
                'name' => 'required|string|max:255',
                'fathers_name' => 'required|string|max:255',
                'dob' => 'required|date',
                'gender' => 'required|string|in:male,female,other', // Use enum for gender if applicable
                'nationality' => 'required|string|max:100',
                'marital_status' => 'required|string|in:single,married,divorced,widowed', // Use enum for marital status if applicable
                'email' => 'required|email|max:255',
                'phone_number' => 'required|digits_between:10,15', // Adjust based on expected phone number length
                'aadhar_number' => 'required|digits:12', // Aadhar numbers are typically 12 digits
                'current_address' => 'required|string|max:255',
                'permanent_address' => 'required|string|max:255',
                'profile_image' => 'required|file|mimes:jpeg,png,jpg|max:2048',

                // Demographic Details
                'ethnicity' => 'nullable|string|max:100',
                'religion' => 'nullable|string|max:100',
                'caste_category' => 'nullable|string|max:100',
                'disability_status' => 'nullable|string|max:100',
                'languages_spoken' => 'nullable|string|max:255',

                // Employment Details
                'job_title' => 'nullable|string|max:255',
                'department' => 'nullable|string|max:255',
                'position' => 'nullable|string|max:255',
                'date_of_joining' => 'nullable|date',
                'employment_status' => 'nullable|string|max:100',
                'work_location' => 'nullable|string|max:255',
                'supervisor_name' => 'nullable|string|max:255',
                'probation_start' => 'nullable|date',
                'probation_end' => 'nullable|date',
                'date_of_confirmation' => 'nullable|date',

                // Salary and payroll_id
                'base_salary' => 'nullable|numeric', // Assuming salary should be a number
                'bonuses_allowances' => 'nullable|numeric',
                'deductions' => 'nullable|numeric',
                'payroll_id' => 'nullable|string|max:255',
                'bank_account_details' => 'nullable|string|max:255',
                'salary_review_period' => 'nullable|string|max:255',

                // Qualification data validation
                'highest_qualification' => 'nullable|string|max:255',
                'institution_name' => 'nullable|string|max:255',
                'year_of_passing' => 'nullable|integer|digits:4', // Assuming 4 digits for the year
                'certifications' => 'nullable|string|max:255',
                'skills' => 'nullable|string|max:255',
                'qualification_document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',

                // Previous employment validation
                'previous_employer' => 'nullable|string|max:255',
                'position_held' => 'nullable|string|max:255',
                'start_date' => 'nullable|date',
                'end_date' => 'nullable|date|after_or_equal:start_date', // Ensures end date is after the start date
                'reason_for_leaving' => 'nullable|string|max:255',
                'experience_letter' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
                'salary_slip' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',

                // Additional data validation
                'pan' => 'nullable|string|size:10', // PAN is typically 10 characters
                'tax_id' => 'nullable|string|max:20',
                'provident_fund' => 'nullable|string|max:20',
                'esi_number' => 'nullable|string|max:20',
                'gratuity_details' => 'nullable|string|max:255',

                // Health and Insurance
                'medical_insurance' => 'nullable|string|max:255',
                'nominee' => 'nullable|string|max:255',
                'health_conditions' => 'nullable|string|max:255',

                // Reference data validation
                'reference_name' => 'nullable|string|max:255',
                'reference_designation' => 'nullable|string|max:255',
                'reference_contact' => 'nullable|string|max:255', // Consider changing this to a more specific validation if needed
                'relationship' => 'nullable|string|max:255',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $emp_id = generateEmployeeId($request->input('name'));

            $password = generatePassword();

            $user = new User();
            $user->name = $request->input('name');
            $user->username = $emp_id;
            $user->email = $request->input('email');
            $user->password = $password;
            $user->role = "employee";
            $user->designation = $request->input('designation');
            $user->department = $request->input('department');
            $user->save();

            // Create the role and assign it
            $role = Role::firstOrCreate(['name' => "employee"]);
            $user->assignRole($role);

            // Employee Personal Details Save
            $empPersonalDetails = new EMPPersonalDetails();
            $empPersonalDetails->emp_id = $emp_id;
            $empPersonalDetails->name = $request->input('name');
            $empPersonalDetails->fathers_name = $request->input('fathers_name');
            $empPersonalDetails->dob = $request->input('dob');
            $empPersonalDetails->gender = $request->input('gender');
            $empPersonalDetails->nationality = $request->input('nationality');
            $empPersonalDetails->marital_status = $request->input('marital_status');
            $empPersonalDetails->email = $request->input('email');
            $empPersonalDetails->phone_number = $request->input('phone_number');
            $empPersonalDetails->aadhar_number = $request->input('aadhar_number');
            $empPersonalDetails->current_address = $request->input('current_address');
            $empPersonalDetails->permanent_address = $request->input('permanent_address');
            if ($request->hasFile('profile_image')) {
                $empPersonalDetails->profile_image = base64_encode(file_get_contents($request->file('profile_image')->getRealPath()));
            }
            $empPersonalDetails->save();

            // Employee Demographic Details Save
            $empDemographicDetails = new EMPDemographicDetails();
            $empDemographicDetails->emp_id = $emp_id;
            $empDemographicDetails->ethnicity = $request->input('ethnicity', null); // Default to null if not provided
            $empDemographicDetails->religion = $request->input('religion', null);
            $empDemographicDetails->caste_category = $request->input('caste_category', null);
            $empDemographicDetails->disability_status = $request->input('disability_status', null);
            $empDemographicDetails->languages_spoken = $request->input('languages_spoken', null);
            $empDemographicDetails->save();

            // Employee Employment Details
            $empEmploymentDetails = new EMPEmploymentDetails();
            $empEmploymentDetails->emp_id = $emp_id;
            $empEmploymentDetails->job_title = $request->input('job_title', null);
            $empEmploymentDetails->department = $request->input('department', null);
            $empEmploymentDetails->position = $request->input('position', null);
            $empEmploymentDetails->date_of_joining = $request->input('date_of_joining', null);
            $empEmploymentDetails->employment_status = $request->input('employment_status', null);
            $empEmploymentDetails->work_location = $request->input('work_location', null);
            $empEmploymentDetails->supervisor_name = $request->input('supervisor_name', null);
            $empEmploymentDetails->probation_start = $request->input('probation_start', null);
            $empEmploymentDetails->probation_end = $request->input('probation_end', null);
            $empEmploymentDetails->date_of_confirmation = $request->input('date_of_confirmation', null);
            $empEmploymentDetails->save();

            // Employee Salary and Payroll Details
            $empSalaryDetails = new EMPSalaryAndPayrollDetails();
            $empSalaryDetails->emp_id = $emp_id;
            $empSalaryDetails->base_salary = $request->input('base_salary');
            $empSalaryDetails->bonuses_allowances = $request->input('bonuses_allowances');
            $empSalaryDetails->deductions = $request->input('deductions');
            $empSalaryDetails->payroll_id = $request->input('payroll_id');
            $empSalaryDetails->bank_account_details = $request->input('bank_account_details');
            $empSalaryDetails->salary_review_period = $request->input('salary_review_period');
            // Save to the database
            $empSalaryDetails->save();

            // Employee Educational Qualificcation details
            $empEducationalDetails = new EMPEducationalDetails();
            $empEducationalDetails->emp_id = $emp_id;
            $empEducationalDetails->highest_qualification = $request->input('highest_qualification');
            $empEducationalDetails->institution_name = $request->input('institution_name');
            $empEducationalDetails->year_of_passing = $request->input('year_of_passing');
            $empEducationalDetails->certifications = $request->input('certifications');
            $empEducationalDetails->skills = $request->input('skills');
            if ($request->hasFile('qualification_document')) {
                $empEducationalDetails->qualification_document = base64_encode(file_get_contents($request->file('qualification_document')->getRealPath()));
            }
            $empEducationalDetails->save();

            // Previous Employment Details
            $empPreviousEmploymentDetails = new EMPPreviousEmploymentDetails();
            $empPreviousEmploymentDetails->emp_id = $emp_id;
            $empPreviousEmploymentDetails->previous_employer = $request->input('previous_employer');
            $empPreviousEmploymentDetails->position_held = $request->input('position_held');
            $empPreviousEmploymentDetails->start_date = $request->input('start_date');
            $empPreviousEmploymentDetails->end_date = $request->input('end_date');
            $empPreviousEmploymentDetails->reason_for_leaving = $request->input('reason_for_leaving');
            if ($request->hasFile('experience_letter')) {
                $empPreviousEmploymentDetails->experience_letter = base64_encode(file_get_contents($request->file('experience_letter')->getRealPath()));
            }
            if ($request->hasFile('salary_slip')) {
                $empPreviousEmploymentDetails->salary_slip = base64_encode(file_get_contents($request->file('salary_slip')->getRealPath()));
            }
            $empPreviousEmploymentDetails->save();

            // Employee Additional Details
            $empAdditionalDetails = new EMPTaxAndPFDetails();
            $empAdditionalDetails->emp_id = $emp_id;
            $empAdditionalDetails->pan = $request->input('pan');
            $empAdditionalDetails->tax_id = $request->input('tax_id');
            $empAdditionalDetails->provident_fund = $request->input('provident_fund');
            $empAdditionalDetails->esi_number = $request->input('esi_number');
            $empAdditionalDetails->gratuity_details = $request->input('gratuity_details');
            // Save to the database
            $empAdditionalDetails->save();

            // Employee Health and Insurance
            $empHealthInsurance = new EMPMedicalAndInsuranceDetails();
            $empHealthInsurance->emp_id = $emp_id;
            $empHealthInsurance->medical_insurance = $request->input('medical_insurance');
            $empHealthInsurance->nominee = $request->input('nominee');
            $empHealthInsurance->health_conditions = $request->input('health_conditions');

            // For Save the Details into the database
            $empHealthInsurance->save();

            // Employee Professionl and References Details
            $empProfessionalReferences = new EMPProfessionalReference();
            $empProfessionalReferences->emp_id = $emp_id;
            $empProfessionalReferences->reference_name = $request->input('reference_name');
            $empProfessionalReferences->reference_designation = $request->input('reference_name');
            $empProfessionalReferences->reference_contact = $request->input('reference_contact');
            $empProfessionalReferences->relationship = $request->input('relationship');
            $empProfessionalReferences->save();

            if ($user && $empPersonalDetails && $empDemographicDetails && $empEmploymentDetails && $empSalaryDetails && $empEducationalDetails && $empPreviousEmploymentDetails && $empAdditionalDetails && $empHealthInsurance && $empProfessionalReferences) {
                try {
                    // Create For Role
                    // Send the OTP via email
                    $details = [
                        'emp_name' => $request->input('name'),
                        'emp_id' => $emp_id,
                        'emp_department' => $request->input('department'),
                        'emp_designation' => $request->input('designation'),
                        'emp_password' => $password,
                    ];
                    $mailResponse = Mail::to($request->email)->send(new SendRegistrationMail($details)); // Ensure you've set up the OtpMail Mailable

                    if ($mailResponse) {
                        DB::commit();
                        return redirect()->back()->with('success', "Employee Registration has been successfull!!");
                    }
                } catch (\Throwable $th) {
                    DB::rollBack();
                    return redirect()->back()->with('failed', $th->getMessage());
                }
            }

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('failed', "Internal Serve Error" . $th->getMessage());
        }

    }

    // Employee Profile
    public function empProfile($encryptedId)
    {
        $id = Crypt::decryptString($encryptedId);
        $empDetails = DB::table('emp_personal_details')
            ->join('emp_demographic_details', 'emp_personal_details.emp_id', '=', 'emp_demographic_details.emp_id')
            ->join('emp_employment_details', 'emp_demographic_details.emp_id', '=', 'emp_employment_details.emp_id')
            ->join('emp_salary_and_payroll_details', 'emp_employment_details.emp_id', '=', 'emp_salary_and_payroll_details.emp_id')
            ->join('emp_educational_details', 'emp_salary_and_payroll_details.emp_id', '=', 'emp_educational_details.emp_id')
            ->join('emp_previous_employment_details', 'emp_educational_details.emp_id', '=', 'emp_previous_employment_details.emp_id')
            ->join('emp_tax_and_provident_fund_details', 'emp_previous_employment_details.emp_id', '=', 'emp_tax_and_provident_fund_details.emp_id')
            ->join('emp_medical_insurance_details', 'emp_tax_and_provident_fund_details.emp_id', '=', 'emp_medical_insurance_details.emp_id') // Fixed here
            ->join('emp_professional_references', 'emp_medical_insurance_details.emp_id', '=', 'emp_professional_references.emp_id')
            ->where('emp_personal_details.emp_id', $id)
            ->first();
        return view('auth.admin.employee.emp-view', compact('empDetails'));

    }

    // Employee Performance
    public function empPerformance()
    {
        return view("auth.admin.employee.emp-performance");
    }

  
}
