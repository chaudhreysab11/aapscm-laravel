<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/aapscm-hotline/ for WordPress parity.
 */
class AapscmHotlinePageSeeder extends Seeder
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
            'hero_heading' => 'AAPSCM® Incidents Hotline',

            'hotline' => [
                'subheading'    => 'AAPSCM® Exam Incidents Hotline',
                'lead_body'     => 'AAPSCM® takes the security of our certification exams seriously. One of our primary goals is to ensure the highest integrity of exam content and fairness for all candidates during the delivery of AAPSCM®\'s certification exams',
                'sub_lead_body' => 'To this end, AAPSCM® is providing this form for the purposes of reporting any of the following activities:',
                'incidents'     => [
                    'Cheating and/or suspicious behavior observed at a test site during the delivery of a AAPSCM® exam.',
                    'Use of unauthorized training materials by candidates taking AAPSCM® exams.',
                    'Candidates taking photos or making copies of AAPSCM® exam questions or exam materials.',
                    'Individuals posting AAPSCM® exam content on any public Internet site or distribute printed copies at conferences or other public forums.',
                    'Misconduct by an authorized proctor or test center administrator; such as assisting candidates by providing answers or allowing candidates to engage in prohibited activities.',
                    'Concerns of impartiality or objectivity in testing.',
                ],
                'cta_body' => 'Individuals who wish to report an incident, may do so anonymously by filling out the form below.',
            ],

            'email_line_html' => '<b>Email</b>: ' . $cfEmail('info@aapscm.org'),

            'terms' => [
                'heading' => 'Hotline Reporting Terms and Conditions',
                'items'   => [
                    'AAPSCM® has no obligation to investigate the incident report submitted by you or take action with respect to any such incident unless expressly agreed elsewhere.',
                    'Incident reports that include the reporting party\'s name and contact information are more likely to be investigated by AAPSCM®.',
                    'If further information is necessary to assist in AAPSCM®\'s investigation, you agree that we may contact you and you will reasonably try to assist us in its information gathering efforts.',
                    'Please submit only one report per incident.',
                    'You warrant that, to the best of your knowledge, the information you have submitted is accurate.',
                ],
            ],

            'form' => [
                'heading'     => 'Submit an Incident Report',
                'description' => 'Use the form below to report an incident. You may report anonymously if you prefer.',
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'aapscm-hotline'],
            [
                'title'            => 'AAPSCM® Hotline',
                'content'          => null,
                'excerpt'          => 'Report exam security incidents, cheating, or misconduct to the AAPSCM® hotline.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => 'AAPSCM® Incidents Hotline | AAPSCM',
                'meta_description' => 'Report exam security incidents, suspected cheating, or misconduct confidentially through the AAPSCM® hotline.',
                'show_in_nav'      => true,
            ],
        );
    }
}
