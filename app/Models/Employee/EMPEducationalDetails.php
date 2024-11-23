<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EMPEducationalDetails extends Model
{
    use HasFactory;

    protected $table = "emp_educational_details";


    // Specify the fillable attributes for mass assignment
    protected $fillable = [
        'emp_id',
        'highest_qualification',
        'institution_name',
        'year_of_passing',
        'certifications',
        'skills',
        'qualification_document',
    ];

    public function personalDetails()
    {
        return $this->belongsTo(EMPPersonalDetails::class, 'emp_id', 'emp_id');
    }
}
