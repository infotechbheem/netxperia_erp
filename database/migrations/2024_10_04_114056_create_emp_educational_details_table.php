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
        Schema::create('emp_educational_details', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->string('highest_qualification')->nullable(); // Highest Qualification
            $table->string('institution_name')->nullable(); // University/Institution Name
            $table->year('year_of_passing')->nullable(); // Year of Passing
            $table->string('certifications')->nullable(); // Certifications
            $table->text('skills')->nullable(); // Skills (Technical and Soft Skills)
            $table->string('qualification_document')->nullable(); // File path for the uploaded marksheet
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emp_educational_details');
    }
};
