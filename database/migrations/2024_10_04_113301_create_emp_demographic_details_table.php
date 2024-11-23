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
        Schema::create('emp_demographic_details', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->string('nationality')->nullable(); // Nationality
            $table->string('ethnicity')->nullable(); // Ethnicity
            $table->string('marital_status')->nullable(); // Marital Status
            $table->date('date_of_marriage')->nullable(); // Date of Marriage (if applicable)
            $table->integer('number_of_children')->nullable(); // Number of Children
            $table->text('languages_spoken')->nullable(); // Languages Spoken
            $table->text('additional_information')->nullable(); // Any additional information
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emp_demographic_details');
    }
};
