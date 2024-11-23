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
        Schema::create('emp_tax_and_provident_fund_details', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->string('pan')->nullable(); // Permanent Account Number
            $table->string('tax_id')->nullable(); // Tax Identification Number
            $table->string('provident_fund')->nullable(); // Provident Fund Account Number
            $table->string('esi_number')->nullable(); // ESI Number
            $table->text('gratuity_details')->nullable(); // Gratuity Details
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emp_tax_and_provident_fund_details');
    }
};
