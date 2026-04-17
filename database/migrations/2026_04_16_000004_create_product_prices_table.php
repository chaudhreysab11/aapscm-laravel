<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Create product_prices — the single source of truth for all product pricing.
     *
     * Design rules (approved schema §1 and §2):
     *
     *  1. One CURRENT row per (product_id, membership_tier_id).
     *     This table is NOT a price history ledger.
     *     When a price changes, UPDATE the existing row; do not insert a new one.
     *
     *  2. membership_tier_id = NULL means the public / non-member price.
     *     membership_tier_id = <id> means the price for members of that tier.
     *     MySQL allows multiple NULL values in a composite unique index, so
     *     uniqueness for the null-tier (non-member) row per product is enforced
     *     at the application service layer — not by the DB constraint alone.
     *     The UNIQUE index on (product_id, membership_tier_id) enforces
     *     uniqueness for all non-null tier pairings at the database level.
     *
     *  3. Historical charged prices are preserved in order_items.unit_price
     *     at the moment of purchase. Do not use this table for price history.
     *
     * Foreign key behaviour:
     *  - product deleted  → cascade delete (price rows have no meaning without product)
     *  - tier deleted     → cascade delete (price rows have no meaning without tier;
     *                       the public/NULL-tier row is unaffected by tier deletions)
     */
    public function up(): void
    {
        Schema::create('product_prices', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnDelete();

            // NULL  = non-member / public price
            // <id>  = member price for the specified tier
            // See docblock for NULL-uniqueness caveat.
            $table->foreignId('membership_tier_id')
                ->nullable()
                ->constrained('membership_tiers')
                ->cascadeOnDelete();

            $table->decimal('price', 10, 2);
            $table->char('currency', 3)->default('USD');
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            // Enforces one price per (product, tier) for non-null tiers.
            // Non-member (null-tier) uniqueness per product is enforced at service layer.
            $table->unique(['product_id', 'membership_tier_id']);

            // Standalone indexes for join performance
            $table->index('product_id');
            $table->index('membership_tier_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_prices');
    }
};
