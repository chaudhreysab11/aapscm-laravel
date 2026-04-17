<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Add SEO and display fields to certification_catalog.
     *
     * These fields are required before any Module 2 work begins:
     *
     *  acronym          — short identifier (e.g. "CSCP"). Nullable at DB level
     *                     because the seeder cannot guarantee resolution from WP
     *                     source data. All null values must be reviewed before
     *                     Design Approval. Used in meta titles, badge display,
     *                     JSON-LD, and header nav labels.
     *
     *  certifying_body  — administering organisation (typically "AAPSCM").
     *                     Required for schema.org/EducationalOccupationalCredential.
     *
     *  credential_type  — groups certifications on the listing page
     *                     (e.g. supply_chain, logistics, procurement).
     *                     Nullable; populated by migration agent mapping or
     *                     manually via Filament.
     *
     *  sort_order       — manual display order on listing page.
     *
     *  og_image         — Open Graph image (1200×630) separate from badge_image.
     *                     badge_image is a small credential badge; og_image is
     *                     used in social sharing previews.
     *
     *  meta_title       — Yoast _yoast_wpseo_title import field.
     *                     Fallback: "{title} ({acronym}) Certification | AAPSCM"
     *
     *  meta_description — Yoast _yoast_wpseo_metadesc import field.
     *                     Fallback: first 155 chars of description, stripped of HTML.
     *
     *  canonical_url    — Override canonical. If null, the canonical is generated
     *                     from route('certifications.show', slug).
     *                     Populated from Yoast _yoast_wpseo_canonical where set.
     */
    public function up(): void
    {
        Schema::table('certification_catalog', function (Blueprint $table) {
            // Display / catalog fields
            $table->string('acronym', 20)->nullable()->after('title');
            $table->string('certifying_body', 100)->nullable()->default('AAPSCM')->after('acronym');
            $table->string('credential_type', 50)->nullable()->after('certifying_body');
            $table->unsignedSmallInteger('sort_order')->default(0)->after('credential_type');

            // Second media field — OG image distinct from badge_image
            $table->string('og_image')->nullable()->after('badge_image');

            // SEO fields — populated from Yoast export during data migration
            $table->string('meta_title', 160)->nullable()->after('is_active');
            $table->string('meta_description', 320)->nullable()->after('meta_title');
            $table->string('canonical_url', 255)->nullable()->after('meta_description');

            // Indexes for admin filtering and listing queries
            $table->index('credential_type');
            $table->index('sort_order');
        });
    }

    public function down(): void
    {
        Schema::table('certification_catalog', function (Blueprint $table) {
            $table->dropIndex(['credential_type']);
            $table->dropIndex(['sort_order']);
            $table->dropColumn([
                'acronym',
                'certifying_body',
                'credential_type',
                'sort_order',
                'og_image',
                'meta_title',
                'meta_description',
                'canonical_url',
            ]);
        });
    }
};
