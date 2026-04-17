<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('membership_tiers', function (Blueprint $table) {
            $table->id();
            $table->string('name');                             // e.g. "Certified Member"
            $table->string('slug')->unique();                   // e.g. "certified-member"
            $table->string('code')->unique();                   // e.g. "CM" — matches WP source
            $table->text('description')->nullable();
            $table->decimal('annual_price', 10, 2)->default(0);
            $table->decimal('monthly_price', 10, 2)->nullable();
            $table->json('benefits')->nullable();               // list of benefit strings
            $table->boolean('is_active')->default(true);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->unsignedBigInteger('source_id')->nullable(); // WP tier ID for migration tracing
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('membership_tiers');
    }
};
