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
        Schema::create('client_hosting_details', function (Blueprint $table) {
            $table->id();
            $table->string('client_id');
            $table->string('client_name')->nullable();
            $table->string('hosting_provider')->nullable();
            $table->string('plan_name');
            $table->date('plan_purchased_date');
            $table->date('plan_expiry_date');
            $table->unsignedBigInteger('amount_paid');
            $table->text('additional_notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_hosting_details');
    }
};
