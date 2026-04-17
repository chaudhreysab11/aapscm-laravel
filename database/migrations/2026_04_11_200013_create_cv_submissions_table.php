<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cv_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('cv_file_path');                          // stored file
            $table->text('cover_letter')->nullable();
            $table->foreignId('job_listing_id')->nullable()->constrained()->nullOnDelete();
            $table->enum('status', ['received', 'under_review', 'shortlisted', 'rejected'])->default('received');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cv_submissions');
    }
};
