<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Represents the 356 certificates actually awarded to users
        Schema::create('certifications_awarded', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('certification_catalog_id')->constrained('certification_catalog')->onDelete('restrict');
            $table->string('certificate_number')->unique();    // e.g. "AAPSCM-2024-00356"
            $table->string('verification_token', 64)->unique(); // used in /verify-a-certificate/
            $table->timestamp('issued_at');
            $table->timestamp('expires_at')->nullable();
            $table->timestamp('revoked_at')->nullable();
            $table->string('revoke_reason')->nullable();
            $table->enum('status', ['active', 'expired', 'revoked'])->default('active');
            $table->string('badge_url')->nullable();
            $table->unsignedBigInteger('source_id')->nullable(); // WP certificate record ID
            $table->timestamps();

            $table->index(['user_id', 'status']);
            $table->index('verification_token');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certifications_awarded');
    }
};
