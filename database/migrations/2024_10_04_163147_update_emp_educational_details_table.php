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
        Schema::table('emp_educational_details', function (Blueprint $table) {
            if (Schema::hasColumn('emp_educational_details', 'qualification_document')) {
                $table->longText('qualification_document')->nullable()->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('emp_educational_details', function (Blueprint $table) {
            // Check if the column exists before altering it back
            if (Schema::hasColumn('emp_educational_details', 'qualification_document')) {
                $table->longText('qualification_document')->nullable()->change(); // Adjust based on your needs
            }
        });
    }
};
