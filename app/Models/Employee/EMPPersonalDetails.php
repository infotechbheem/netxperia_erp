<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EMPPersonalDetails extends Model
{
    use HasFactory;

    protected $table = 'emp_personal_details'; // Specify the corresponding table name

    protected $fillable = [
        'emp_id', // Removed extra space
        'name',
        'fathers_name',
        'dob', // Date of birth
        'gender',
        'current_address',
        'permanent_address',
        'phone_number',
        'aadhar_number',
        'email',
        'profile_image',
    ];

    // Relationship with employment details
    public function employmentDetails()
    {
        return $this->hasMany(EMPEmploymentDetails::class, 'emp_id', 'emp_id'); // Adjust the foreign key as needed
    }

    // Relationship with demographic details
    public function demographicDetails()
    {
        return $this->hasMany(EMPDemographicDetails::class, 'emp_id', 'emp_id'); // Adjust the foreign key as needed
    }

    // Relationship with educational details
    public function educationalDetails()
    {
        return $this->hasMany(EMPEducationalDetails::class, 'emp_id', 'emp_id'); // Adjust the foreign key as needed
    }

    // Relationship with medical and insurance details
    public function medicalAndInsuranceDetails()
    {
        return $this->hasMany(EMPMedicalAndInsuranceDetails::class, 'emp_id', 'emp_id'); // Adjust the foreign key as needed
    }

    // Relationship with previous employment details
    public function previousEmployementDetails()
    {
        return $this->hasMany(EMPPreviousEmploymentDetails::class, 'emp_id', 'emp_id'); // Adjust the foreign key as needed
    }

    // Relationship with professional references
    public function professionalReference()
    {
        return $this->hasMany(EMPProfessionalReference::class, 'emp_id', 'emp_id'); // Adjust the foreign key as needed
    }

    // Relationship with salary and payroll details
    public function salaryAndPayrollDetails()
    {
        return $this->hasMany(EMPSalaryAndPayrollDetails::class, 'emp_id', 'emp_id'); // Adjust the foreign key as needed
    }

    // Relationship with tax and PF details
    public function taxAndPfDetails()
    {
        return $this->hasMany(EMPTaxAndPFDetails::class, 'emp_id', 'emp_id'); // Adjust the foreign key as needed
    }
}
