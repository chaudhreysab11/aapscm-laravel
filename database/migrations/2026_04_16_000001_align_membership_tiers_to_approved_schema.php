<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Revise membership_tiers to match the approved schema:
     *
     *  - REMOVE annual_price and monthly_price.
     *    Pricing is managed exclusively in product_prices. A membership tier
     *    defines access levels and identity, not what a member pays — that
     *    is determined by a 'membership' product and its product_prices rows.
     *
     *  - ADD permissions JSON (optional metadata only).
     *    Stores access-control hints such as restricted content flags.
     *    Do NOT build a runtime permission engine from this column; use
     *    dedicated permission tables if that need arises.
     *
     *  - ENABLE soft deletes.
     *    Tier records referenced by historical orders and user_memberships
     *    must never be hard-deleted. Soft-delete instead.
     *
     *  - ADD indexes on is_active and source_id.
     *    slug and code are already indexed via their unique constraints.
     */
    public function up(): void
    {
        Schema::table('membership_tiers', function (Blueprint $table) {
            // Remove pricing columns — pricing belongs in product_prices only
            $table->dropColumn(['annual_price', 'monthly_price']);

            // Optional JSON metadata for access hints; not a permission engine
            $table->json('permissions')->nullable()->after('benefits');

            // Soft deletes: tier records must be kept for historical references
            $table->softDeletes();

            $table->index('is_active');
            $table->index('source_id');
        });
    }

    public function down(): void
    {
        Schema::table('membership_tiers', function (Blueprint $table) {
            $table->dropIndex(['is_active']);
            $table->dropIndex(['source_id']);
            $table->dropSoftDeletes();
            $table->dropColumn('permissions');
            $table->decimal('annual_price', 10, 2)->default(0);
            $table->decimal('monthly_price', 10, 2)->nullable();
        });
    }
};
