<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partner_inquiries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('username')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->index();
            $table->string('role', 20)->nullable();
            $table->string('city', 20)->nullable();
            $table->string('country', 2)->nullable();
            $table->string('organization')->nullable();
            $table->string('partner_type');
            $table->text('assistance_request')->nullable();
            $table->boolean('account_created')->default(false);
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partner_inquiries');
    }
};
