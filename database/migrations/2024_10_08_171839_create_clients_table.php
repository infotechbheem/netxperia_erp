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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('company_name')->nullable();
            $table->enum('client_type', ['Individual', 'Company']);
            $table->string('country');
            $table->string('address')->nullable();
            $table->string('preferred_language')->nullable();
            $table->string('referral_source')->nullable();
            $table->date('dob')->nullable();
            $table->string('occupation')->nullable();
            $table->string('tax_identification')->nullable();
            $table->string('industry')->nullable();
            $table->enum('communication_preferences', ['Email', 'Phone', 'SMS'])->default('Email');
            $table->boolean('terms_conditions')->default(0);
            $table->boolean('marketing_opt_in')->default(0);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
