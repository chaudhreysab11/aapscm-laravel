<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Coupon>
 */
class CouponFactory extends Factory
{
    protected $model = Coupon::class;

    public function definition(): array
    {
        return [
            'code' => Str::upper($this->faker->unique()->bothify('SAVE##??')),
            'type' => 'fixed',
            'value' => '10.00',
            'is_active' => true,
            'expires_at' => now()->addWeek(),
            'usage_limit' => null,
            'minimum_order_amount' => null,
        ];
    }

    public function percentage(string $value = '10.00'): static
    {
        return $this->state([
            'type' => 'percentage',
            'value' => $value,
        ]);
    }

    public function expired(): static
    {
        return $this->state([
            'expires_at' => now()->subDay(),
        ]);
    }
}
