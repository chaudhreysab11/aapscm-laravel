<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Architect directive (2026-04-20): board_members becomes the single source
 * of truth. Adds two columns required by the public /board-of-directors/
 * page render that previously came from pages.page_data->members JSON:
 *
 *   - affiliation        : the two-line "Title, Company / City, Country"
 *                          string shown under each member's role.
 *   - profile_page_slug  : link to the existing standalone CMS profile
 *                          page (e.g. board-of-directors-dr-sandra-grouse).
 *                          Nullable so members without a profile page work.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('board_members', function (Blueprint $table): void {
            $table->text('affiliation')->nullable()->after('role');
            $table->string('profile_page_slug', 255)->nullable()->after('linkedin_url');
            $table->index('profile_page_slug');
        });
    }

    public function down(): void
    {
        Schema::table('board_members', function (Blueprint $table): void {
            $table->dropIndex(['profile_page_slug']);
            $table->dropColumn(['affiliation', 'profile_page_slug']);
        });
    }
};
