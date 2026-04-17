<?php

namespace Database\Factories;

use App\Models\CertificationCatalog;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->words(3, true);

        return [
            'name'                     => ucwords($name),
            'slug'                     => Str::slug($name),
            'description'              => $this->faker->paragraph(),
            'type'                     => 'digital',
            'sku'                      => strtoupper(Str::random(8)),
            'stock'                    => 0,
            'category'                 => null,
            'certification_catalog_id' => null,
            'membership_tier_id'       => null,
            'is_active'                => true,
            'image'                    => null,
            'source_id'                => null,
        ];
    }

    public function examVoucher(): static
    {
        return $this->state(['type' => 'exam_voucher']);
    }

    public function forCertification(CertificationCatalog $certification): static
    {
        return $this->state(['certification_catalog_id' => $certification->id]);
    }
}
