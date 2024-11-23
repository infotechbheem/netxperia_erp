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
        Schema::create('vendor_payments', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_id'); // Reference to the vendor
            $table->string('project_id'); // Reference to the project
            $table->string('project_title')->nullable(); // Title of the project
            $table->string('payment_type')->nullable(); // Type of payment (e.g., salary, bonus)
            $table->decimal('amount', 10, 2); // Total payment amount
            $table->decimal('due_amount', 10, 2); // Amount still due, if applicable
            $table->text('payment_description')->nullable(); // Description of the payment
            $table->string('status')->default('Pending'); // Payment status (Pending, Completed, Failed)
            $table->string('transaction_id')->nullable(); // Transaction ID for reference
            $table->timestamp('payment_date')->nullable(); // Date when payment was made
            $table->string('created_by')->nullable(); // Admin or user who created this payment record
            $table->longText('payment_slip')->nullable();
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_payments');
    }
};
