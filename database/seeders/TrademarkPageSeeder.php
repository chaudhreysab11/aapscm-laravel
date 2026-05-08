<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/trademark/ for WordPress parity.
 * Long-form legal page: headings, paragraphs and one bulleted list, concluding
 * with an AAPSCM support email rendered through Cloudflare email protection.
 */
class TrademarkPageSeeder extends Seeder
{
    public function run(): void
    {
        $cfEmail = static function (string $email): string {
            $k   = random_int(1, 255);
            $hex = sprintf('%02x', $k);
            for ($i = 0, $len = strlen($email); $i < $len; $i++) {
                $hex .= sprintf('%02x', ord($email[$i]) ^ $k);
            }

            return '<a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="' . $hex . '">[email&#160;protected]</a>';
        };

        $pageData = [
            'hero_heading' => 'Using AAPSCM® Trademarks',
            'intro'        => 'AAPSCM® and AAPSCM®\'s certification program names and logos are registered trademarks of the Association. To help protect the integrity of our programs, AAPSCM® asks that those who refer to our Marks (as defined below) adhere to the following guidelines:',

            'sections' => [
                [
                    'heading'    => 'Trademark Usage and Style Guide for use on the Web and in Print Materials',
                    'lead'       => 'The parameters for use of any AAPSCM® Marks are as follows:',
                    'bullets'    => [
                        'Any AAPSCM® logo must be accurately shown in proportion and orientation. Distorting or rotating the logo is not permitted.',
                        'Any AAPSCM® logo must not be incorporated into any other mark or symbol. It may not be used as a border on or around any item.',
                        'You may not use a AAPSCM® logo as part of either your name or your company\'s name.',
                        'The name of any AAPSCM® certification must not be without the word "AAPSCM®" or registered trademark. For example: ACPP, ACPM®, ACSCP®, ACSCM®, ACTP® and ACTM®.',
                        'No AAPSCM® Logo or Trademark may be used as a domain name or as a part of a domain name.',
                    ],
                ],
                [
                    'heading'    => 'Who Can Use AAPSCM® Logos',
                    'paragraphs' => [
                        'How you use any AAPSCM® logo reflects both on our association and your organization? Only authorized users can use or display an AAPSCM® logo and your use is subject to these terms.',
                    ],
                ],
                [
                    'heading'    => 'Who is an Authorized User?',
                    'paragraphs' => [
                        'To be considered an "authorized user" an individual or company must qualify under one or more of the following categories:',
                    ],
                ],
            ],

            'authorized_users' => [
                [
                    'title'   => 'AAPSCM® Corporate Members',
                    'body'    => 'A company that has met the necessary qualifications to be recognized by AAPSCM® as a corporate member in good standing. Authorized users in this category may use the AAPSCM® corporate logo for business purposes. This includes company Web site, advertisements, and letterhead.',
                ],
                [
                    'title'   => 'AAPSCM® Certified Individuals',
                    'body'    => 'An individual who has satisfied one of AAPSCM®\'s certification test objectives that were in effect at the time that he or she was tested. Authorized users in this category may use the appropriate certified logo for personalized purposes. This includes business cards, correspondence, letterhead, and resumes.',
                ],
                [
                    'title'   => 'AAPSCM® Delivery Partners',
                    'body'    => 'AAPSCM®\'s Delivery Partner Program is intended for professional training organizations that deliver training in AAPSCM® certifications. AAPSCM® provides valuable tools and resources to assist training organizations in recruiting, training, and certifying IT professionals.',
                ],
                [
                    'title'   => 'AAPSCM® Academic Partners',
                    'body'    => 'AAPSCM®\'s Academy Partner Program is intended for schools, not-for-profits, job corps centers and correctional facilities. Our program provides resources for recruiting, training, certifying, and upgrading the skills of students in IT.',
                ],
            ],

            'terms_of_use' => [
                'heading' => 'Terms of Use',
                'paragraphs' => [
                    'The authorized user only may use the Marks with respect to the activities within the scope of its qualification as an authorized user that meet all of AAPSCM®\'s applicable standards or requirements with respect to quality, service and method of operation, or otherwise only in the form and manner AAPSCM® prescribes in writing. If an authorized user qualified, they shall immediately cease using all Marks and Mark-bearing promotional materials. Thereafter, they shall no longer use in any manner whatsoever any of the Marks.',
                    'The authorized user must comply with all trademarks, trade name and service mark notice marking requirements of AAPSCM®, including, without limitation, affixing "SM," "TM," or "®," adjacent to all Marks in all uses thereof. The use of any additional words with any of the Marks must have AAPSCM®\'s prior written consent. The authorized user shall promptly cease and desist use or publication of any such materials to which AAPSCM® shall from time-to-time object.',
                    'The authorized user acknowledges, and will not contest, AAPSCM®\'s exclusive ownership of any of AAPSCM®\'s trade names, service marks and trademarks, and all logos and derivations thereof, and all names and Marks licensed to AAPSCM® ("Marks"). In addition, the authorized user acknowledges that it lacks and will not acquire any right to use the Marks other than as specifically set forth in this Agreement. All uses of the Marks by the authorized user shall automatically inure to the benefit of and become the property of AAPSCM®. The authorized user shall not register any Mark or use any Mark in its legal or trade name. Further, the authorized user acknowledges, and will not contest, AAPSCM®\'s exclusive ownership of the Marks or the Information, including, without limitation, all sales literature, certification and examination information and business processes.',
                ],
            ],

            'contact_line_html' => 'For more details, email ' . $cfEmail('info@aapscm.org'),
        ];

        $page = Page::updateOrCreate(
            ['slug' => 'trademark'],
            [
                'title'            => 'Trademark',
                'content'          => null,
                'excerpt'          => 'Guidelines for authorized use of AAPSCM® trademarks, logos, and certification marks.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'legal_full_width',
                'page_data'        => $pageData,
                'seo_title'        => 'Trademark - AAPSCM®',
                'meta_title'       => 'Trademark - AAPSCM®',
                'meta_description' => 'Guidelines for authorized use of AAPSCM® trademarks, logos, and certification marks.',
                'show_in_nav'      => true,
            ],
        );

        $page->seoMeta()->updateOrCreate([], [
            'seo_title' => 'Trademark - AAPSCM®',
        ]);
    }
}
