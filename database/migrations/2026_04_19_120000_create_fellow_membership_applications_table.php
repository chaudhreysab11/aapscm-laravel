<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fellow_membership_applications', function (Blueprint $table): void {
            $table->id();

            // Membership tier selection
            $table->string('membership_tier', 50);

            // Personal information
            $table->string('full_name');
            $table->date('date_of_birth');
            $table->string('nationality', 100);

            // Contact information
            $table->string('email');
            $table->string('phone', 50);
            $table->string('address');

            // Professional information
            $table->string('current_employer');
            $table->string('job_title');
            $table->string('industry_sector', 150);
            $table->string('years_experience', 30);

            // Qualifications
            $table->string('highest_qualification', 150);
            $table->string('degree_name');
            $table->string('institution');
            $table->date('year_completed');

            // Personal statement
            $table->text('personal_statement');

            // Uploaded file paths (relative to storage/app/public)
            $table->string('cv_path');
            $table->string('identity_path');
            $table->string('supporting_documents_path')->nullable();
            $table->string('payment_proof_path');

            // Declaration
            $table->boolean('declaration_agreed')->default(false);

            $table->string('status', 30)->default('pending');
            $table->timestamps();

            $table->index('email');
            $table->index('membership_tier');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fellow_membership_applications');
    }
};
