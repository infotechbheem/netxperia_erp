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
        Schema::create('applied_leave_applications', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->string('emp_name');
            $table->string('department');
            $table->string('leave_type');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('reason');
            $table->longText('document')->nullable(); // For optional file upload
            $table->string('emergency_contact')->nullable();
            $table->text('comments')->nullable();
            $table->string('application_status')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applied_leave_applications');
    }
};
