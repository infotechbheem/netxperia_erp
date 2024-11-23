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
        Schema::table('client_projects', function (Blueprint $table) {
            $table->boolean('projects_assigned')->default(false)->after('project_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('client_projects', function (Blueprint $table) {
            $table->dropColumn('projects_assigned');
        });
    }
};
