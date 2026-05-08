<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('corporate_membership_applications', function (Blueprint $table) {
            $table->id();
            $table->string('organization_name')->nullable();
            $table->string('legal_business_name')->nullable();
            $table->string('business_registration_number')->nullable();
            $table->date('year_established')->nullable();
            $table->json('industry_sectors')->nullable();
            $table->unsignedInteger('employee_count')->nullable();
            $table->string('company_website')->nullable();
            $table->string('head_office_address')->nullable();
            $table->string('country_of_registration')->nullable();
            $table->string('branches_offices')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('corporate_membership_applications');
    }
};
