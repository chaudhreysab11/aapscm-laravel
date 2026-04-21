<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

/**
 * Seeds the FIRST confirmed subset of real Laravel commerce products
 * derived from the WordPress -> Laravel mapping in
 * database/docs/wp-commerce-mapping/products.csv.
 *
 * Phase: Commerce Data Alignment - Task A.
 * Scope: 3 unconditional rows only. Fellow variants are deferred until
 * open question #2 in wp-commerce-mapping.md is resolved by the client.
 *
 * Idempotent: keyed on the unique `slug` column via updateOrCreate.
 * Re-running this seeder will not create duplicates.
 *
 * @see database/docs/wp-commerce-mapping.md
 */
class CommerceConfirmedProductsSeeder extends Seeder
{
    /**
     * The 3 confirmed product rows.
     *
     * @var list<array{slug: string, name: string, source_id: int, description: string}>
     */
    private array $products = [
        [
            'slug' => 'professional-membership',
            'name' => 'Professional Membership Fee',
            'source_id' => 4234, // WP post id, slug professional-membership-fee-2
            'description' => 'Annual AAPSCM Professional Membership ($150/yr plus $10 application fee).',
        ],
        [
            'slug' => 'corporate-membership',
            'name' => 'Corporate Membership Fee',
            'source_id' => 4233, // WP post id
            'description' => 'Annual AAPSCM Corporate Membership ($3,000/yr).',
        ],
        [
            'slug' => 'professional-membership-renewal',
            'name' => 'Annual Membership Renewal Fee',
            'source_id' => 37207, // WP post id, slug annual-membership-renewal-fee
            'description' => 'Annual renewal of an existing AAPSCM Professional Membership ($160/yr).',
        ],
    ];

    public function run(): void
    {
        foreach ($this->products as $row) {
            Product::updateOrCreate(
                ['slug' => $row['slug']],
                [
                    'name' => $row['name'],
                    'description' => $row['description'],
                    'type' => 'membership',
                    'is_active' => true,
                    'source_id' => $row['source_id'],
                ],
            );
        }
    }
}
