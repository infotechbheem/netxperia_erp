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
        // Create schedules table
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();  // Auto-incrementing unsignedBigInteger by default
            $table->string('shift_name');
            $table->time('time_in');
            $table->time('time_out');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
