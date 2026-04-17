<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Add membership_tier_id to order_items as the PRICING CONTEXT tier.
     *
     * ─── COLUMN MEANING (approved schema §6) ───────────────────────────────────
     *
     *  order_items.membership_tier_id  =  the membership tier whose row in
     *  product_prices was used to determine the unit_price charged on this line.
     *
     *  NULL  → the non-member / public price row (membership_tier_id IS NULL in
     *          product_prices) was applied.
     *  <id>  → the member price for that specific tier was applied.
     *
     * ─── WHAT THIS COLUMN IS NOT ───────────────────────────────────────────────
     *
     *  This is NOT the membership tier granted to the customer by this purchase.
     *  The tier a customer receives when buying a 'membership' product is recorded
     *  in user_memberships, which is created after payment is confirmed.
     *  The granting tier is also derivable via:
     *    order_items.product → products.membership_tier_id
     *
     * ─── WHY A DEDICATED FK AND NOT order_items.meta ─────────────────────────
     *
     *  The pricing context tier is a first-class fact needed for:
     *   • Revenue reporting by membership tier
     *   • Pricing dispute resolution
     *   • Verifying correct member pricing was applied
     *  It warrants a proper indexed FK, not a JSON blob in meta.
     */
    public function up(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->foreignId('membership_tier_id')
                ->nullable()
                ->after('product_id')
                ->constrained('membership_tiers')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign(['membership_tier_id']);
            $table->dropColumn('membership_tier_id');
        });
    }
};
