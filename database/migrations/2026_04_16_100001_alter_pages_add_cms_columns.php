<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table): void {
            // JSON payload for template-specific structured data (TF-04 sidebar items,
            // TF-05 person fields, TF-07 community meta, etc.)
            $table->json('page_data')->nullable()->after('blocks');

            // Optional gate – restricts page visibility to members of a given tier.
            // NULL means publicly visible.
            $table->foreignId('membership_tier_id')
                ->nullable()
                ->after('page_data')
                ->constrained('membership_tiers')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table): void {
            $table->dropForeign(['membership_tier_id']);
            $table->dropColumn(['page_data', 'membership_tier_id']);
        });
    }
};
