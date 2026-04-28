<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CommunitiesPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = require database_path('seeders/data/communities_data.php');

        $this->rewriteUrls($pageData);

        Page::updateOrCreate(
            ['slug' => 'communities'],
            [
                'title'            => 'Communities',
                'excerpt'          => 'AAPSCM® global chapters and specialized communities — connect, collaborate, and grow with regional and topical groups.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => $pageData['meta']['title']       ?? null,
                'meta_description' => $pageData['meta']['description'] ?? null,
                'show_in_nav'      => false,
            ],
        );
    }

    private function rewriteUrls(array &$data): void
    {
        $imageKeys = ['image', 'icon', 'src', 'bg'];
        $linkKeys  = ['href'];

        array_walk_recursive($data, function (&$value, $key) use ($imageKeys, $linkKeys) {
            if (! is_string($value) || $value === '') {
                return;
            }

            if (in_array($key, $imageKeys, true)) {
                $value = UrlRewriter::image($value);
            } elseif (in_array($key, $linkKeys, true) && ! str_starts_with($value, 'mailto:')) {
                $value = UrlRewriter::local($value);
            } elseif (str_ends_with((string) $key, '_html')) {
                $value = UrlRewriter::rewriteHtml($value);
            }
        });
    }
}
