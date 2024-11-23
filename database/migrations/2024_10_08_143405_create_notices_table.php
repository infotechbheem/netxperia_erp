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
        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->string('notice_id')->unique(); // Unique identifier for the notice
            $table->text('title'); // Title of the notice
            $table->text('description'); // Description of the notice
            $table->string('regards_by'); // Name of the person or entity issuing the notice
            $table->date('flashing_start')->nullable(); // Date when the notice will start flashing
            $table->date('flashing_ending')->nullable(); // Date when the notice will stop flashing
            $table->enum('status', ['active', 'inactive', 'archived'])->default('active'); // Status of the notice
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notices');
    }
};
