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
        Schema::create('client_hosting_renewal_details', function (Blueprint $table) {
            $table->id();
            $table->string('client_id');
            $table->date('expiry_date');
            $table->unsignedBigInteger('amount');
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_hosting_renewal_details');
    }
};
