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

        Page::updateOrCreate(
            ['slug' => 'verify-a-certificate'],
            [
                'title'            => 'Verify a Certificate',
                'excerpt'          => 'Verify the authenticity of an AAPSCM® certificate by certificate number, or by first or last name.',
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
}
