<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/become-a-partner/ for WordPress parity.
 * Classic-WP page (sfContentBlock / bulletlist). Structured into page_data so
 * the bespoke cms.page.become-a-partner Blade template renders it with the
 * same section ordering and content as the live site.
 */
class BecomePartnerPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero_heading' => 'Become a Partner',
            'dedication'   => [
                'heading'    => 'Our Dedication to the Profession',
                'paragraphs' => [
                    'AAPSCM® is dedicated to helping procurement, supply chain and tourism professionals and managers develop talent strategies that drive inclusion, build the capability foundations to create a culture of customer centricity, innovation, collaboration quality and reliability to maximize supply chain value. AAPSCM® is a non-profit trade association advancing the global interests of technology investment to further transform supply chains toward purpose-driven goals. Pursue digital initiatives that drive quick business growth, support cost optimization and enhance supply chain agility. We are the only chartered and accredited professional association to recognize tourism management as important profession in the workforce.',
                    'We are a vendor-neutral, independent, and pioneer of a combined source of information on a wide range of management specialization topics including Procurement, Supply-Chain, and Tourism Management, which represent industry standards, best practices and policies, management development data, and workforce.  Our Certifed supercharges careers for management leaders across industries and helps organizations find people with result-oriented skills and expertise that can not only work smarter but performs better.',
                ],
            ],
            'benefits' => [
                'heading' => 'Benefits of being an AAPSCM® Partner',
                'items'   => [
                    ['lead' => 'Financial Benefits', 'body' => 'Substantial discounts on Exam Vouchers, course materials, brochures and access to our test banks for questions and answers and Content sold as part of our agreement. You will get 50% discount on all materials including the examination according to the agreement and consistent numbers of students submitted monthly'],
                    ['lead' => 'Advance Details on Certification Launches and Updates', 'body' => 'e.g. exam domains and objectives'],
                    ['lead' => 'Demand Generation', 'body' => 'Co-promotional opportunities'],
                    ['lead' => 'Express access and registration', 'body' => 'to our "Spartanburg, SC Charter" and easy access to conferences and workshops in the US.'],
                    ['lead' => 'Promotional Content', 'body' => 'Professional testimonials and case studies; Brochures and flyers tailored to different types of learners; Videos and infographics; Partner plaques and banners'],
                    ['lead' => 'Exclusive Logo Usage', 'body' => "AAPSCM®'s Corporate, Partner and Certification logos"],
                    ['lead' => 'Classroom and Instructor Resources', 'body' => ''],
                ],
            ],
            'email_cta' => [
                'lead_html'   => 'To learn more, please email us at <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e9b9889b9d878c9b9aa98888999a8a84c7869b8e">[email&#160;protected]</a> and enjoy more benefits',
                'extra_items' => [
                    '<strong>Partner Academies – Become an Affiliate Academy Partner</strong>',
                    '<strong>Express permissions to translate flyers or course materials to local languages for marketing</strong>',
                ],
            ],
            'form' => [
                'heading'     => 'Partner Registration',
                'description' => 'Complete the form below to apply as an Academic Partner or Delivery Partner. Our team will review your application and reach out with next steps.',
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'become-a-partner'],
            [
                'title'            => 'Become a Partner',
                'content'          => null,
                'excerpt'          => 'Partner with AAPSCM® as an Academic or Delivery Partner for exclusive discounts, promotional content, and co-branded opportunities.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => 'Become a Partner | AAPSCM',
                'meta_description' => 'Join AAPSCM® as an Academic or Delivery Partner. Access exam voucher discounts, course materials, co-promotional opportunities, and more.',
                'show_in_nav'      => true,
            ],
        );
    }
}
