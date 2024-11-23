<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EMPDemographicDetails extends Model
{
    use HasFactory;

    protected $table = 'emp_demographic_details'; // Specify the corresponding table name

    protected $fillable = [
        'emp_id',
        'ethnicity',
        'religion', // Date of birth
        'caste_category',
        'disability_status',
        'languages_spoken',
    ];
}
