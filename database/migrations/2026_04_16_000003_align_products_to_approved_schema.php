<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Align products table to the approved schema:
     *
     *  - REMOVE price, member_price, non_member_price.
     *    All pricing is managed exclusively through product_prices.
     *    No price column should ever live directly on the products row.
     *
     *  - REMOVE product_type (freeform string).
     *    Replaced by a strict enum 'type' column (see values below).
     *    'donation' is included so that donation flows can be represented
     *    as first-class products with their own product_prices rows.
     *
     *  - ADD membership_tier_id (nullable FK → membership_tiers).
     *    Records the membership tier that is GRANTED to the buyer when this
     *    product is purchased. Only meaningful when type = 'membership'.
     *    NULL for all other product types.
     *    This column is NOT the pricing-context tier (see order_items for that).
     *
     *  - ADD indexes on type, is_active, source_id (required by approved schema).
     *    slug and sku are already indexed via their unique constraints.
     *
     * Two Schema::table calls are used so MySQL can resolve the column drops
     * before applying the enum add and foreign key constraint.
     */
    public function up(): void
    {
        // Step 1 — remove legacy pricing columns and the freeform type string
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['price', 'member_price', 'non_member_price', 'product_type']);
        });

        // Step 2 — add typed enum, tier FK, and required indexes
        Schema::table('products', function (Blueprint $table) {
            // Strict product type enum.
            // 'donation' is included to allow donation flows to be products.
            $table->enum('type', [
                'physical',
                'digital',
                'exam_voucher',
                'membership',
                'training',
                'bundle',
                'donation',
            ])->default('digital')->after('slug');

            // The membership tier granted upon purchase of this product.
            // Set when type = 'membership'. NULL for all other types.
            $table->foreignId('membership_tier_id')
                ->nullable()
                ->after('certification_catalog_id')
                ->constrained('membership_tiers')
                ->nullOnDelete();

            // Required indexes (approved schema §5)
            $table->index('type');
            $table->index('is_active');
            $table->index('source_id');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['membership_tier_id']);
            $table->dropIndex(['type']);
            $table->dropIndex(['is_active']);
            $table->dropIndex(['source_id']);
            $table->dropColumn(['type', 'membership_tier_id']);
        });

        Schema::table('products', function (Blueprint $table) {
            $table->decimal('price', 10, 2)->default(0);
            $table->decimal('member_price', 10, 2)->nullable();
            $table->decimal('non_member_price', 10, 2)->nullable();
            $table->string('product_type')->default('standard');
        });
    }
};
