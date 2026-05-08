<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class VerifyACertificatePageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = require database_path('seeders/data/verify_a_certificate_data.php');

        $page = Page::updateOrCreate(
            ['slug' => 'verify-a-certificate'],
            [
                'title'            => 'Verify a Certificate',
                'excerpt'          => 'Verify the authenticity of an AAPSCM® certificate by certificate number, or by first or last name.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'seo_title'        => 'Verify a Certificate - AAPSCM®',
                'meta_title'       => $pageData['meta']['title']       ?? null,
                'meta_description' => $pageData['meta']['description'] ?? null,
                'show_in_nav'      => false,
            ],
        );

        $page->seoMeta()->updateOrCreate(
            ['url_path' => '/verify-a-certificate/'],
            [
                'seo_title' => 'Verify a Certificate - AAPSCM®',
                'seo_description' => $pageData['meta']['description'] ?? 'Verify the authenticity of an AAPSCM® certificate by certificate number, or by first or last name.',
                'canonical_url' => 'https://aapscm.org/verify-a-certificate/',
                'og_title' => 'Verify a Certificate - AAPSCM®',
                'og_description' => $pageData['meta']['description'] ?? 'Verify the authenticity of an AAPSCM® certificate by certificate number, or by first or last name.',
                'robots' => 'index, follow',
            ],
        );
    }
}
