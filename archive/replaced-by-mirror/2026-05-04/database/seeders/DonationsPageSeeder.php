<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/donations/ for WordPress parity.
 * Simple single-section page: banner "Donations" heading followed by a
 * centered bank-account details panel.
 */
class DonationsPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero_heading' => 'Donations',
            'panel_heading' => "For all Charity Donations to our cause\nAAPSCM® Bank Account\nAmerican Association of Procurement & Supply Chain Management Professionals",
            'bank_details' => [
                ['label' => 'Bank of America', 'value' => 'Account No. 488120408382'],
                ['label' => 'Routing',         'value' => '#111000025'],
                ['label' => 'Wires',           'value' => '026009593'],
                ['label' => 'Swift Code',      'value' => 'BOFAUS3N'],
                ['label' => 'Address is',      'value' => "Bank of America NA,\n222 Broadway, New York, New York 10038"],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'donations'],
            [
                'title'            => 'Donations',
                'content'          => null,
                'excerpt'          => 'Support AAPSCM charitable work — bank account details for wire transfers and donations.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => 'Donations | AAPSCM',
                'meta_description' => 'Donate to AAPSCM — bank account, routing, wires, SWIFT, and mailing address.',
                'show_in_nav'      => true,
            ],
        );
    }
}
