<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/which-certification-is-right-for-you/ for
 * WordPress parity. The live page is a lightweight decision-aid: a two-column
 * hero (image + heading + intro + Read More button) followed by a
 * "Aapscm® Credentials" section heading (whose catalogue is populated
 * dynamically on the live site). We mirror the static copy and link out to
 * /certifications-for-professionals/ where the full catalogue lives.
 */
class WhichCertificationPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'image'      => '/storage/cms-images/2025/02/1.jpg',
                'heading'    => 'Which Certification is Right for You?',
                'intro'      => 'So many different AAPSCM® certifications! All good choices, but which one makes most sense for you? What should you pursue right now, for where you are in your career and where you want to go? To help you understand your options, we\'ve put together the key facts and figures in one place. Now, you can digest all of AAPSCM® career-boosting certifications and decide which one—or ones—are best for your advancement, goals and interests.',
                'cta_label'  => 'Read More',
                'cta_url'    => '/certification-process/',
            ],
            'credentials' => [
                'heading'     => 'AAPSCM® Credentials',
                'description' => 'Explore our full catalogue of professional certifications, chartered designations, and specialist credentials across procurement, supply chain, tourism and emerging domains.',
                'browse_url'  => '/certifications-for-professionals/',
                'browse_label'=> 'Browse All Certifications',
                'tracks'      => [
                    [
                        'title'    => 'Procurement',
                        'blurb'    => 'Chartered and certified designations for procurement managers, specialists, and analysts.',
                        'examples' => ['Chartered Procurement Manager (CPM)®', 'American Certified Procurement Professional (ACPP)®', 'AC Strategic Procurement & Supplier Relationship (AC-SPR)®'],
                    ],
                    [
                        'title'    => 'Supply Chain',
                        'blurb'    => 'Credentials for supply chain leaders, cybersecurity pros, and digital transformation managers.',
                        'examples' => ['Chartered Supply Chain Manager (CSCM)®', 'American Certified Supply Chain Professional (ACSCP)®', 'Chartered Sustainable Supply Chain Manager (CSSCM)®'],
                    ],
                    [
                        'title'    => 'Tourism',
                        'blurb'    => 'Industry-recognised tourism and hospitality management certifications.',
                        'examples' => ['Chartered Tourism Manager (CTM)®', 'American Certified Tourism Professional (ACTP)®', 'Chartered Sustainable Culinary Tourism Manager (CSCTM)®'],
                    ],
                    [
                        'title'    => 'Emerging & Specialist',
                        'blurb'    => 'Next-generation credentials for AI, e-commerce, blockchain, cybersecurity, and sustainability.',
                        'examples' => ['Chartered Supply Chain AI Professional (CSAI)®', 'AC Blockchain for Supply Chain Professional (AC-BSCP)®', 'Chartered E-Commerce Data Analytics & AI (CED-AI)®'],
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'which-certification-is-right-for-you'],
            [
                'title'            => 'Which Certification is Right for You?',
                'content'          => null,
                'excerpt'          => 'Compare AAPSCM® certifications across procurement, supply chain, tourism, and emerging specialisations to pick the path that fits your career.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => 'Which Certification is Right for You? | AAPSCM',
                'meta_description' => 'Find the AAPSCM® certification that matches your career stage, industry, and goals — procurement, supply chain, tourism, or emerging specialties.',
                'show_in_nav'      => true,
            ],
        );
    }
}
