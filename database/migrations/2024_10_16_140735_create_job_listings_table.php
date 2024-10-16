<?php

use App\Models\JobListing;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('description');
            $table->unsignedInteger('salary');
            $table->string('company');
            $table->string('logo')->nullable();
            $table->string('location');
            $table->string('category');
            $table->enum('experience', JobListing::$experience);
            $table->enum('type', JobListing::$type);
            $table->string('tags');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('job_listings');
    }
};
