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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id')->unique();
            $table->string('project_id');
            $table->text('project_title')->nullable();
            $table->string('client_name');
            $table->string('client_id');
            $table->text('address')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('phone_number')->nullable();
            $table->text('services');
            $table->text('descriptions');
            $table->text('amount');
            $table->unsignedBigInteger('discount');
            $table->unsignedBigInteger('tax');
            $table->unsignedBigInteger('total_amount')->nullable();
            $table->longText('invoice_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
