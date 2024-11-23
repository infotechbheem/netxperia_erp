<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class AuthEmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            $employee_Id = $user->username;

            $employee = DB::table('emp_personal_details')
                ->join('users', 'emp_personal_details.emp_id', '=', 'users.username')
                ->join('emp_demographic_details', 'users.username', '=', 'emp_demographic_details.emp_id')
                ->join('emp_educational_details', 'emp_demographic_details.emp_id', '=', 'emp_educational_details.emp_id')
                ->join('emp_employment_details', 'emp_educational_details.emp_id', '=', 'emp_employment_details.emp_id')
                ->join('emp_medical_insurance_details', 'emp_employment_details.emp_id', 'emp_medical_insurance_details.emp_id')
                ->join('emp_professional_references', 'emp_medical_insurance_details.emp_id', '=', 'emp_professional_references.emp_id')
                ->join('emp_salary_and_payroll_details', 'emp_professional_references.emp_id', '=', 'emp_salary_and_payroll_details.emp_id')
                ->join('emp_tax_and_provident_fund_details', 'emp_salary_and_payroll_details.emp_id', '=', 'emp_tax_and_provident_fund_details.emp_id')
                ->join('emp_previous_employment_details', 'emp_tax_and_provident_fund_details.emp_id', '=', 'emp_previous_employment_details.emp_id')
                ->where('users.username', $employee_Id)
                ->first();
            // dd($employee);
            // Check if the user has the 'admin' role
            if (!$user->hasRole('employee')) {
                Auth::logout();
                return redirect()->route('login')->with('failed', 'You do not have permission to access this area.');
            }

            View::share([
                'employee' => $employee,
            ]);
            // User is authenticated and has admin role, continue to the next request
            return $next($request);
        }

        // User is not authenticated, redirect to login
        return redirect()->route('login')->with('session_expire', 'You must be logged in to access this area.');
    }
}
