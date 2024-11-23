<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EMPEmploymentDetails extends Model
{
    use HasFactory;

    protected $table = "emp_employment_details";
    protected $fillable = [
        'emp_id',
        'job_title',
        'department',
        'position',
        'date_of_joining',
        'employment_status',
        'work_location',
        'supervisor_name',
        'probation_start',
        'probation_end',
        'date_of_confirmation',
    ];
}
