<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\SeoMeta;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SeoMeta>
 */
class SeoMetaFactory extends Factory
{
    protected $model = SeoMeta::class;

    public function definition(): array
    {
        $slug = fake()->unique()->slug(3);

        return [
            'url_path' => '/' . $slug . '/',
            'seo_title' => fake()->sentence(4) . ' | AAPSCM',
            'seo_description' => fake()->sentence(15),
            'canonical_url' => UrlRewriter::canonical($slug),
            'og_title' => fake()->sentence(4) . ' | AAPSCM',
            'og_description' => fake()->sentence(15),
            'og_image' => null,
            'robots' => 'index, follow',
            'seoable_id' => null,
            'seoable_type' => null,
            'source_id' => null,
        ];
    }

    public function forUrlPath(string $urlPath): static
    {
        return $this->state([
            'url_path' => $urlPath,
            'canonical_url' => UrlRewriter::canonical(trim($urlPath, '/')),
        ]);
    }
}
