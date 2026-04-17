<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('company_name');
            $table->string('company_logo')->nullable();
            $table->string('location');
            $table->boolean('is_remote')->default(false);
            $table->enum('employment_type', ['full-time', 'part-time', 'contract', 'temporary', 'internship'])->default('full-time');
            $table->string('salary_range')->nullable();
            $table->longText('description');
            $table->text('requirements')->nullable();
            $table->string('application_email')->nullable();
            $table->string('application_url')->nullable();
            $table->enum('status', ['draft', 'active', 'expired', 'filled'])->default('draft');
            $table->timestamp('expires_at')->nullable();
            $table->foreignId('posted_by')->nullable()->constrained('users')->nullOnDelete();
            $table->boolean('is_featured')->default(false);
            $table->unsignedBigInteger('source_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['status', 'expires_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
