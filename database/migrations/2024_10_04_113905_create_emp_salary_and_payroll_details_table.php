<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('emp_salary_and_payroll_details', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->decimal('base_salary', 10, 2)->nullable(); // Base Salary
            $table->decimal('bonuses_allowances', 10, 2)->nullable(); // Bonuses/Allowances
            $table->decimal('deductions', 10, 2)->nullable(); // Deductions (Tax, PF, etc.)
            $table->string('payroll_id')->unique()->nullable(); // Payroll ID
            $table->string('bank_account_details')->nullable(); // Bank Account Details
            $table->enum('salary_review_period', ['6-months', '1-year', '2-years', 'other'])->nullable(); // Salary Review Period
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emp_salary_and_payroll_details');
    }
};
