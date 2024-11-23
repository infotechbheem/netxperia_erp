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
        Schema::create('vendor_assign_project', function (Blueprint $table) {
            $table->id();
            $table->string('project_id');
            $table->string('vendor_id');
            $table->text('project_title');
            $table->string('project_category');
            $table->timestamp('assign_date_time');
            $table->timestamp('deadlines');
            $table->string('vendor_name')->nullable();
            $table->string('status')->nullable();
            $table->bigInteger('progress_status')->nullable();
            $table->text('project_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_assign_project');
    }
};
