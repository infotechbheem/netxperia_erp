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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_id')->unique();
            $table->string('company_name');
            $table->string('contact_person');
            $table->string('designation')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email_address')->unique();
            $table->string('website_url')->nullable();
            $table->string('business_type')->nullable();
            $table->string('registration_number')->nullable();
            $table->year('year_established')->nullable();
            $table->string('office_address')->nullable();
            $table->string('service_areas')->nullable();
            $table->text('company_profile')->nullable();
            $table->string('specialization')->nullable();
            $table->string('certifications')->nullable();
            $table->text('key_personnel')->nullable();
            $table->string('bank_account')->nullable();
            $table->decimal('annual_turnover', 15, 2)->nullable();
            $table->text('credit_references')->nullable();
            $table->string('insurance_details')->nullable();
            $table->string('compliance_certificates')->nullable();
            $table->string('tax_compliance')->nullable();
            $table->text('client_references')->nullable();
            $table->text('past_projects')->nullable();
            $table->text('payment_terms')->nullable();
            $table->text('contract_obligations')->nullable();
            $table->text('confidentiality_agreements')->nullable();
            $table->text('additional_services')->nullable();
            $table->string('availability')->nullable();
            $table->string('communication_method')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
