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
        Schema::create('emp_employment_details', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('emp_id');
            $table->string('job_title')->nullable(); // Job Title
            $table->string('department')->nullable(); // Department
            $table->string('position')->nullable(); // Position
            $table->date('date_of_joining')->nullable(); // Date of Joining
            $table->string('employment_status')->nullable(); // Employment Status
            $table->string('work_location')->nullable(); // Work Location
            $table->string('supervisor_name')->nullable(); // Supervisor/Manager Name
            $table->date('probation_start')->nullable(); // Probation Period Start Date
            $table->date('probation_end')->nullable(); // Probation Period End Date
            $table->date('date_of_confirmation')->nullable(); // Date of Confirmation
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emp_employment_details');
    }
};
