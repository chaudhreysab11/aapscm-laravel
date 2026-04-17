<?php

namespace Database\Factories;

use App\Models\CertificationCatalog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<CertificationCatalog>
 */
class CertificationCatalogFactory extends Factory
{
    protected $model = CertificationCatalog::class;

    public function definition(): array
    {
        $title = $this->faker->unique()->words(3, true) . ' Certification';

        return [
            'title'                    => $title,
            'slug'                     => Str::slug($title),
            'acronym'                  => strtoupper(Str::random(4)),
            'certifying_body'          => 'AAPSCM',
            'credential_type'          => $this->faker->randomElement(['associate', 'professional', 'expert']),
            'description'              => $this->faker->paragraphs(2, true),
            'eligibility_requirements' => $this->faker->paragraph(),
            'exam_details'             => $this->faker->paragraph(),
            'pdu_credits'              => $this->faker->numberBetween(10, 60),
            'badge_image'              => null,
            'og_image'                 => null,
            'meta_title'               => null,
            'meta_description'         => null,
            'canonical_url'            => null,
            'sort_order'               => $this->faker->numberBetween(0, 100),
            'is_active'                => true,
            'source_id'                => null,
        ];
    }

    public function inactive(): static
    {
        return $this->state(['is_active' => false]);
    }
}
