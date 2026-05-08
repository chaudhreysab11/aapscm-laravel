<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('professional_membership_renewals', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('membership_id')->index();
            $table->string('email')->index();
            $table->string('phone');
            $table->string('country');
            $table->string('current_job_title');
            $table->string('company_name');
            $table->string('industry_sector');
            $table->string('payment_method');
            $table->string('street_address');
            $table->string('city');
            $table->string('state_province');
            $table->string('postal_code');
            $table->boolean('terms_accepted')->default(false);
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('professional_membership_renewals');
    }
};
