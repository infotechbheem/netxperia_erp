<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EMPPreviousEmploymentDetails extends Model
{
    use HasFactory;

    protected $table = 'emp_previous_employment_details'; // Change this if your table name is different

    // Specify the fillable attributes for mass assignment
    protected $fillable = [
        'emp_id',
        'previous_employer',
        'position_held',
        'start_date',
        'end_date',
        'reason_for_leaving',
        'experience_letter',
        'salary_slip',
    ];

}
