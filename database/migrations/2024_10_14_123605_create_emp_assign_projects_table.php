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
        Schema::create('emp_assign_projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_id')->nullable();
            $table->string('emp_id')->nullable();
            $table->string('project_title')->nullable();
            $table->string('project_category')->nullable();
            $table->timestamp('assign_date_time')->nullable();
            $table->timestamp('deadlines')->nullable();
            $table->string('emp_name')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('progress_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emp_assign_projects');
    }
};
