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
        Schema::table('emp_assign_projects', function (Blueprint $table) {
            $table->text('project_description')->nullable()->after('progress_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('emp_assign_projects', function (Blueprint $table) {
            $table->dropColumn('project_description');
        });
    }
};
