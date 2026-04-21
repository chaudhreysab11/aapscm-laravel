<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class ProfessionalMembershipRenewalPageSeeder extends Seeder
{
    public function run(): void
    {
        $img = '/storage/cms-images';

        $pageData = [
            'hero' => [
                'heading_html'   => '<strong>AAPSCM&reg;</strong> Professional <br>Membership Renewal',
                'subheading'     => 'Stay Connected. Stay Certified. Stay Ahead.',
                'text'           => 'Renew your American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®) membership today and continue enjoying exclusive benefits, networking opportunities, and professional development resources in procurement, supply chain, e-commerce, and tourism management.',
                'fee_html'       => '<strong>Annual Membership Renewal Fee:</strong> <strong>$160</strong>',
                'image'          => $img.'/2025/04/hero-1.png',
                'button_text'    => 'Renew Membership Now',
                'button_url'     => '/checkout/?add-to-cart=37207',
            ],

            'why_renew' => [
                'heading_html' => 'Why Renew Your <strong>AAPSCM&reg;</strong> Professional Membership?',
                'subtitle'     => 'To Continue Enjoying These Exclusive Member Benefits.',
                'button_text'  => 'Contact Us',
                'button_url'   => '/contact-us/',
                'items' => [
                    [
                        'title' => 'Global Recognition',
                        'text'  => 'Maintain your status as a member of an accredited professional body.',
                        'icon'  => $img.'/2025/04/global.gif',
                    ],
                    [
                        'title' => 'Continuous Learning',
                        'text'  => 'Access exclusive training programs, industry webinars, and certification courses.',
                        'icon'  => $img.'/2025/04/book.gif',
                    ],
                    [
                        'title' => 'Networking Opportunities',
                        'text'  => 'Stay connected with leading professionals, organizations, and experts.',
                        'icon'  => $img.'/2025/04/society.gif',
                    ],
                    [
                        'title' => 'AAPSCM® Community Engagement',
                        'text'  => 'Participate in local chapter events, mentorship programs, and professional forums.',
                        'icon'  => $img.'/2025/04/fans.gif',
                    ],
                    [
                        'title' => 'Discounted Certifications & Events',
                        'text'  => 'Receive special member-only discounts on certification exams, conferences, and industry events.',
                        'icon'  => $img.'/2025/04/sales.gif',
                    ],
                    [
                        'title' => 'Industry Insights & Updates',
                        'text'  => 'Get access to exclusive research reports, whitepapers, and newsletters to stay ahead in your profession.',
                        'icon'  => $img.'/2025/04/edit.gif',
                    ],
                ],
            ],

            'form' => [
                'heading'        => 'Membership Renewal Form',
                'subheading'     => 'Renew your membership in just a few easy steps!',
                'submit_text'    => 'Renew Membership Now',
                'checkout_url'   => '/checkout/?add-to-cart=37207',
                'checkout_text'  => 'Renew Your Membership',
                'fee_text'       => 'Annual Membership Fee: $160',
                'consent'        => 'I confirm that my details are correct, and I agree to the AAPSCM® membership terms and conditions.',
                'sections' => [
                    [
                        'title'  => 'PERSONAL INFORMATION',
                        'fields' => [
                            ['name' => 'full_name',       'label' => 'Full Name*',       'type' => 'text',  'required' => true],
                            ['name' => 'membership_id',   'label' => 'Membership ID*',   'type' => 'text',  'required' => true],
                            ['name' => 'email',           'label' => 'Email Address*',   'type' => 'email', 'required' => true],
                            ['name' => 'phone',           'label' => 'Phone Number*',    'type' => 'tel',   'required' => true],
                            ['name' => 'country',         'label' => 'Country*',         'type' => 'text',  'required' => true],
                        ],
                    ],
                    [
                        'title'  => 'PROFESSIONAL INFORMATION',
                        'fields' => [
                            ['name' => 'job_title',       'label' => 'Current Job Title*',          'type' => 'text', 'required' => true],
                            ['name' => 'company',         'label' => 'Company/Organization Name*',  'type' => 'text', 'required' => true],
                            ['name' => 'industry_sector', 'label' => 'Industry Sector*',            'type' => 'radio','required' => true,
                                'options' => ['Procurement & Supply Chain', 'E-Commerce', 'Tourism & Hospitality', 'Other:'],
                            ],
                        ],
                    ],
                    [
                        'title'  => 'MEMBERSHIP RENEWAL PAYMENT',
                        'fields' => [
                            ['name' => 'payment_method', 'label' => 'Payment Method', 'type' => 'radio', 'required' => false,
                                'options' => ['Credit/Debit Card', 'PayPal', 'Bank Transfer'],
                            ],
                        ],
                    ],
                    [
                        'title'  => 'BILLING ADDRESS',
                        'fields' => [
                            ['name' => 'street_address', 'label' => 'Street Address',  'type' => 'text', 'required' => false],
                            ['name' => 'city',           'label' => 'City',            'type' => 'text', 'required' => false],
                            ['name' => 'state',          'label' => 'State/Province',  'type' => 'text', 'required' => false],
                            ['name' => 'postal_code',    'label' => 'Postal/Zip Code', 'type' => 'text', 'required' => false],
                        ],
                    ],
                ],
            ],

            'support' => [
                'heading_html' => '<strong>Need Assistance?</strong><br>For any questions or issues with your renewal, contact us at:',
                'email'        => 'info@aapscm.org',
                'phone'        => '+1-(833) 524-2846',
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'professional-membership-renewal'],
            [
                'title'            => 'Professional Membership Renewal',
                'template'         => '',
                'status'           => 'published',
                'is_published'     => true,
                'content'          => '',
                'excerpt'          => 'Renew your AAPSCM Professional Membership and continue enjoying exclusive benefits.',
                'page_data'        => $pageData,
                'meta_title'       => 'Professional Membership Renewal - AAPSCM',
                'meta_description' => 'Renew your AAPSCM Professional Membership today and continue enjoying exclusive benefits, networking opportunities, and professional development resources.',
                'show_in_nav'      => false,
            ],
        );
    }
}
