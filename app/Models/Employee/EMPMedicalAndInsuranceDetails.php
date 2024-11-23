<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EMPMedicalAndInsuranceDetails extends Model
{
    use HasFactory;

    // Specify the table associated with the model if it differs from the default
    protected $table = 'emp_medical_insurance_details'; // Change this if your table name is different

    // Specify the fillable attributes for mass assignment
    protected $fillable = [
        'emp_id',
        'medical_insurance',
        'nominee',
        'health_conditions',
    ];
}