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
        Schema::create('emp_medical_insurance_details', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->string('medical_insurance')->nullable(); // Medical Insurance Details
            $table->string('nominee')->nullable(); // Nominee for Insurance
            $table->text('health_conditions')->nullable(); // Health Conditions
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emp_medical_insurance_details');
    }
};
