<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('job_listing_applications', function (Blueprint $table) {
            $table->string('cv_path')->after('expected_salary')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('job_listing_applications', function (Blueprint $table) {
            $table->dropColumn('cv_path');
        });
    }
};
