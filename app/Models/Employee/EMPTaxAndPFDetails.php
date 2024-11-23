<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EMPTaxAndPFDetails extends Model
{
    use HasFactory;

    // Specify the table associated with the model if it differs from the default
    protected $table = 'emp_tax_and_provident_fund_details'; // Change this if your table name is different

    // Specify the fillable attributes for mass assignment
    protected $fillable = [
        'emp_id',
        'pan',
        'tax_id',
        'provident_fund',
        'esi_number',
        'gratuity_details',
    ];

}
