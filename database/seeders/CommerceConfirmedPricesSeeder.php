<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Database\Seeder;
use RuntimeException;

/**
 * Seeds the public (non-member / NULL-tier) price for each product
 * created by CommerceConfirmedProductsSeeder.
 *
 * Phase: Commerce Data Alignment - Task A.
 * Scope: NULL-tier rows only. Member-tier-specific pricing is deferred
 * until open question #7 (member vs non-member collapse rule) is
 * resolved by the client.
 *
 * Idempotent: keyed on (product_id, membership_tier_id IS NULL)
 * via updateOrCreate. Re-running will not create duplicates.
 *
 * Currency: USD across the board (open question #5).
 *
 * @see database/docs/wp-commerce-mapping.md
 */
class CommerceConfirmedPricesSeeder extends Seeder
{
    /**
     * Public (NULL-tier) price per product slug, in USD.
     *
     * @var array<string, string>
     */
    private array $prices = [
        'professional-membership' => '150.00',
        'corporate-membership' => '3000.00',
        'professional-membership-renewal' => '160.00',
    ];

    public function run(): void
    {
        foreach ($this->prices as $slug => $price) {
            $product = Product::where('slug', $slug)->first();

            if ($product === null) {
                throw new RuntimeException(
                    "CommerceConfirmedPricesSeeder: product '{$slug}' not found. "
                    . 'Run CommerceConfirmedProductsSeeder first.'
                );
            }

            ProductPrice::updateOrCreate(
                [
                    'product_id' => $product->id,
                    'membership_tier_id' => null,
                ],
                [
                    'price' => $price,
                    'currency' => 'USD',
                    'is_active' => true,
                ],
            );
        }
    }
}
