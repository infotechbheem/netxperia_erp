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
        Schema::create('emp_previous_employment_details', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->string('previous_employer')->nullable(); // Previous Employer Name
            $table->string('position_held')->nullable(); // Position Held
            $table->date('start_date')->nullable(); // Start Date
            $table->date('end_date')->nullable(); // End Date
            $table->string('reason_for_leaving')->nullable(); // Reason for Leaving
            $table->longText('experience_letter')->nullable(); // File path for the uploaded experience letter
            $table->longText('salary_slip')->nullable(); // File path for the uploaded salary slip
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emp_previous_employment_details');
    }
};
