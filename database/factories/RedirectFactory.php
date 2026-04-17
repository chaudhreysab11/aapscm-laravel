<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Redirect;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Redirect>
 */
class RedirectFactory extends Factory
{
    protected $model = Redirect::class;

    public function definition(): array
    {
        return [
            'from_path' => '/' . fake()->unique()->slug(3) . '-old/',
            'to_path' => '/' . fake()->slug(3) . '/',
            'http_code' => 301,
            'is_active' => true,
            'notes' => 'Test redirect',
            'hit_count' => 0,
        ];
    }

    public function inactive(): static
    {
        return $this->state(['is_active' => false]);
    }
}
