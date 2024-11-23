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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            // Project Details
            $table->string('project_id')->unique();
            $table->string('username')->nullable();
            $table->string('project_title')->nullable();
            $table->string('project_category')->nullable();
            $table->decimal('project_budget', 15, 2)->nullable();
            $table->text('project_description')->nullable();
            $table->date('project_deadline')->nullable();
            $table->string('project_created_by')->nullable();
            $table->longText('project_image')->nullable();

            // Client Information
            $table->string('client_name')->nullable();
            $table->string('client_email')->nullable();
            $table->string('client_phone')->nullable();
            $table->text('client_requirements')->nullable();

            // Project Timeline
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('milestones')->nullable();

            // Resources
            $table->text('team_members')->nullable();
            $table->text('technologies')->nullable();
            $table->decimal('resource_budget', 15, 2)->nullable();

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
