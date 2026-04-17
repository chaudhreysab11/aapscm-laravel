<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductPrice>
 */
class ProductPriceFactory extends Factory
{
    protected $model = ProductPrice::class;

    public function definition(): array
    {
        return [
            'product_id'         => Product::factory(),
            'membership_tier_id' => null,      // null = non-member / public price
            'price'              => $this->faker->randomFloat(2, 50, 999),
            'currency'           => 'USD',
            'is_active'          => true,
        ];
    }
}
