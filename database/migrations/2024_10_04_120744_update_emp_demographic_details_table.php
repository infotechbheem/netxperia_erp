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
        Schema::table('emp_demographic_details', function (Blueprint $table) {
            $table->dropColumn([
                'nationality',
                'marital_status',
                'date_of_marriage',
                'number_of_children',
                'additional_information',
            ]);

            $table->string('religion')->nullable()->after('ethnicity');
            $table->string('caste_category')->nullable()->after('religion');
            $table->string('disability_status')->nullable()->after('caste_category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('emp_demographic_details', function (Blueprint $table) {
            // Re-add the dropped columns
            $table->string('nationality')->nullable(); // Replace with the actual column after which it should be added
            $table->string('marital_status')->nullable()->after('nationality'); // Adjust based on the actual structure
            $table->date('date_of_marriage')->nullable()->after('marital_status');
            $table->integer('number_of_children')->nullable()->after('date_of_marriage');
            $table->text('additional_information')->nullable()->after('number_of_children');
            
            // Remove the new columns added in the up method if necessary
            $table->dropColumn(['religion', 'caste_category', 'disability_status']);
        });
    }
};
