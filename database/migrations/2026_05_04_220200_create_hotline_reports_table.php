<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hotline_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->boolean('anonymous_requested')->default(false);
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->index();
            $table->string('phone')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->text('incident_summary')->nullable();
            $table->text('incident_business_address')->nullable();
            $table->boolean('terms_accepted')->default(false);
            $table->boolean('account_created')->default(false);
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hotline_reports');
    }
};
