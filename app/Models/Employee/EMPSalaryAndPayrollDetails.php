<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EMPSalaryAndPayrollDetails extends Model
{
    use HasFactory;

    protected $table = "emp_salary_and_payroll_details";

    protected $fillable = [
        'emp_id',
        'base_salary',
        'bonuses_allowances',
        'deductions',
        'payroll_id',
        'bank_account_details',
        'salary_review_period',
    ];
}
