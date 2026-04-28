<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Mirrors https://aapscm.org/4-steps-to-verification/ for WordPress parity.
 *
 * Verbatim Elementor transcription: hero, intro band, four step blocks
 * (preserved in source DOM order 1, 3, 2, 4), and a closing "Congratulations"
 * panel. Body content lives in
 * database/seeders/data/4-steps-to-verification_data.php.
 */
class FourStepsToVerificationPageSeeder extends Seeder
{
    public function run(): void
    {
        /** @var array<string, mixed> $pageData */
        $pageData = require database_path('seeders/data/4-steps-to-verification_data.php');

        $pageData = $this->rewriteUrls($pageData);

        Page::updateOrCreate(
            ['slug' => '4-steps-to-verification'],
            [
                'title'            => '4 Steps to Verification',
                'content'          => null,
                'excerpt'          => 'A four-step path to earning your globally recognized AAPSCM® certification — choose, study, exam, certify.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => $pageData['meta']['title']       ?? '4 steps to verification - AAPSCM®',
                'meta_description' => $pageData['meta']['description'] ?? '',
                'show_in_nav'      => false,
            ],
        );
    }

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    private function rewriteUrls(array $data): array
    {
        $imageKeys = ['image'];
        $linkKeys  = ['href', 'cta_url'];

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
