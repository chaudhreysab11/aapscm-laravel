<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Mirrors https://aapscm.org/certification-process/ for WordPress parity.
 *
 * Verbatim Elementor transcription: hero + 8 numbered steps, certification
 * categories grid, 4-up "Why Choose AAPSCM®" feature grid, and closing CTA.
 * Body content lives in database/seeders/data/certification_process_data.php.
 */
class CertificationProcessPageSeeder extends Seeder
{
    public function run(): void
    {
        /** @var array<string, mixed> $pageData */
        $pageData = require database_path('seeders/data/certification_process_data.php');

        $pageData = $this->rewriteUrls($pageData);

        Page::updateOrCreate(
            ['slug' => 'certification-process'],
            [
                'title'            => 'Certification Process',
                'content'          => null,
                'excerpt'          => 'A step-by-step guide to earning your prestigious AAPSCM® certification — from eligibility through renewal.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => $pageData['meta']['title']       ?? 'Certification Process - AAPSCM®',
                'meta_description' => $pageData['meta']['description'] ?? '',
                'show_in_nav'      => false,
            ],
        );
    }

    /**
     * Walks the page-data array and rewrites every aapscm.org URL through
     * UrlRewriter so nothing in the DB still points at the live origin.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    private function rewriteUrls(array $data): array
    {
        $imageKeys = ['image', 'icon', 'check_icon'];
        $linkKeys  = ['href', 'cta_url', 'apply_url'];

        array_walk_recursive($data, function (&$value, $key) use ($imageKeys, $linkKeys): void {
            if (! is_string($value) || $value === '') {
                return;
            }

            if (in_array($key, $imageKeys, true)) {
                $value = UrlRewriter::image($value);

                return;
            }

            if (in_array($key, $linkKeys, true)) {
                $value = UrlRewriter::local($value);
            }
        });

        return $data;
    }
}
