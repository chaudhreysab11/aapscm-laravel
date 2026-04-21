<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('free_training_applications', function (Blueprint $table): void {
            $table->id();

            // Personal information
            $table->string('full_name');
            $table->string('email');
            $table->date('date_of_birth')->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('gender', 30)->nullable();

            // Academic information
            $table->string('college_university')->nullable();
            $table->string('program_of_study')->nullable();
            $table->string('year_of_study', 30)->nullable();
            $table->date('expected_graduation')->nullable();
            $table->json('program_choices')->nullable();

            // Additional information
            $table->text('interest_reason')->nullable();
            $table->boolean('has_prior_training')->default(false);
            $table->text('prior_training_details')->nullable();
            $table->text('career_aspirations')->nullable();

            // Availability
            $table->boolean('available_all_sessions')->default(true);
            $table->text('availability_explanation')->nullable();
            $table->string('preferred_schedule', 30);
            $table->string('preferred_training_type', 100);
            $table->boolean('wants_student_membership')->default(false);

            // Declaration
            $table->string('signature_name');
            $table->date('signature_date');

            $table->string('status', 30)->default('pending');
            $table->timestamps();

            $table->index('email');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('free_training_applications');
    }
};
