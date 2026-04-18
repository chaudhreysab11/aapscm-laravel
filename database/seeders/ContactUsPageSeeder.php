<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Seeds the Contact Us page. Routed by CmsPageController::SLUG_VIEWS
 * to resources/views/cms/page/contact-us.blade.php.
 *
 * Text, images, addresses, and phone numbers transcribed from
 * https://aapscm.org/contact-us/ for WordPress parity.
 */
class ContactUsPageSeeder extends Seeder
{
    public function run(): void
    {
        $cfEmail = static function (string $email): string {
            $k = random_int(1, 255);
            $hex = sprintf('%02x', $k);
            for ($i = 0, $len = strlen($email); $i < $len; $i++) {
                $hex .= sprintf('%02x', ord($email[$i]) ^ $k);
            }

            return '<a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="' . $hex . '">[email&#160;protected]</a>';
        };

        $smsFeatures = [
            'Send and receive attachments',
            'Securely make payments (Not for International users)',
            'Continue conversation at your convenience',
        ];

        $pageData = [
            'hero_heading'    => 'COntact US',

            'intro' => [
                'image'      => '/storage/cms-images/2023/10/contact-image-1024x754.png',
                'heading'    => 'Get in touch',
                'subheading' => 'For questions regarding our association or membership, you may fill this form and someone will get back to you within 24 hours. You may also visit our website for answers to the most common questions we receive - Membership FAQs or Certifications FAQs where you will find answers to most questions',
                'cta'        => ['label' => 'Register Now', 'url' => '/membership/'],
            ],

            'support_heading' => 'Contact AAPSCM&reg; for Support and Customer Service',

            'channels' => [
                [
                    'icon'             => '/storage/cms-images/2023/10/smartphone.png',
                    'title'            => 'Call Now',
                    'lede'             => 'Available 24/7',
                    'body_html'        => '<p>Using your mobile device, text &ldquo;Hello AAPSCM<sup>&reg;</sup>&rdquo; to +1-(803)998-2189, +1-(833) 524-2846 to start the conversation. For only US contacts</p><p class="italic text-gray-500">(Message and data rates may apply.)</p>',
                    'features_heading' => 'SMS Features:',
                    'features'         => $smsFeatures,
                ],
                [
                    'icon'               => '/storage/cms-images/2023/10/open-email.png',
                    'title'              => 'Message Us',
                    'features_heading'   => 'SMS Features:',
                    'features'           => $smsFeatures,
                    'trailing_body_html' => '<p>For all international users or members, log in to our website to securely make payments.</p>',
                ],
            ],

            'form_heading' => 'Send Me Message',

            'get_in_touch' => [
                'heading'   => 'Get In Touch',
                'locations' => [
                    [
                        'name'    => 'Columbia, SC Charter & Library Center',
                        'address' => '450 Ganton CT. Blythewood, SC 29016 USA',
                        'phone'   => '+1-(803)998-2189',
                    ],
                    [
                        'name'       => 'Dallas, Texas Office and Conference Center',
                        'address'    => '2701 Little Elm Pkwy Ste 100 Little Elm, TX 75068',
                        'phone'      => '+1-469-991-5228',
                        'fax'        => 'Fax: +1-(605)608-3078',
                        'email_html' => $cfEmail('info@aapscm.org'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'contact-us'],
            [
                'title'            => 'Contact Us',
                'content'          => null,
                'excerpt'          => 'Get in touch with AAPSCM® for membership, certification, or general inquiries.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => 'Contact Us | AAPSCM',
                'meta_description' => 'Contact the American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM)® — offices, phone numbers, email, and a message form.',
                'show_in_nav'      => true,
            ],
        );
    }
}
