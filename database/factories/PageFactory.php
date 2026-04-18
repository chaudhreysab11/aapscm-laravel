<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Page>
 */
class PageFactory extends Factory
{
    protected $model = Page::class;

    public function definition(): array
    {
        $title = fake()->unique()->sentence(3);
        $slug = Str::slug($title);

        return [
            'title' => $title,
            'slug' => $slug,
            'content' => '<p>' . fake()->paragraphs(3, true) . '</p>',
            'excerpt' => fake()->sentence(),
            'status' => 'published',
            'template' => 'default',
            'meta_title' => $title . ' | AAPSCM',
            'meta_description' => fake()->sentence(15),
            'seo_title' => $title . ' | AAPSCM',
            'seo_description' => fake()->sentence(15),
            'seo_canonical' => UrlRewriter::canonical($slug),
            'show_in_nav' => false,
            'source_id' => null,
            'is_published' => true,
            'sort_order' => 0,
            'parent_id' => null,
        ];
    }

    public function draft(): static
    {
        return $this->state([
            'status' => 'draft',
            'is_published' => false,
        ]);
    }

    public function published(): static
    {
        return $this->state([
            'status' => 'published',
            'is_published' => true,
        ]);
    }

    public function withTemplate(string $template): static
    {
        return $this->state(['template' => $template]);
    }
}
