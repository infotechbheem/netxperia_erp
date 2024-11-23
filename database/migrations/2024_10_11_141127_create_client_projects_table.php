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
        Schema::create('client_projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_id')->unique();
            $table->string('client_id');
            $table->string('title'); // Project title
            $table->text('description'); // Project description
            $table->string('category'); // Project category
            $table->date('start_date'); // Start date
            $table->date('end_date')->nullable(); // End date
            $table->decimal('budget', 10, 2); // Budget
            $table->enum('priority', ['low', 'medium', 'high']); // Priority
            $table->json('documents')->nullable(); // Document uploads (stored as JSON)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_projects');
    }
};
