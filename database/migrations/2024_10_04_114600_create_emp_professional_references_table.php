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
        Schema::create('emp_professional_references', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->string('reference_name')->nullable(); // Name of Reference
            $table->string('reference_designation')->nullable(); // Designation
            $table->string('reference_contact')->nullable(); // Contact Information
            $table->string('relationship')->nullable(); // Relationship with Employee
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emp_professional_references');
    }
};
