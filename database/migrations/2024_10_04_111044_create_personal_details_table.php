<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('emp_personal_details', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->string('name'); // Full Name
            $table->string('fathers_name'); // Father's Name
            $table->date('dob'); // Date of Birth
            $table->enum('gender', ['male', 'female', 'other']); // Gender
            $table->string('email')->unique(); // Email
            $table->unsignedBigInteger('phone_number'); // Mobile Number
            $table->unsignedBigInteger('aadhar_number')->nullable(); // Aadhar Number
            $table->text('current_address')->nullable(); // Current Address
            $table->text('permanent_address')->nullable(); // Permanent Address
            $table->longText('profile_image')->nullable(); // Profile Image
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emp_personal_details');
    }
};
