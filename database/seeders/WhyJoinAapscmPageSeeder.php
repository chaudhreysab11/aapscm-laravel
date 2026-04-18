<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/why-join-aapscm/ for WordPress parity.
 * Landing page for prospective members: hero with 8 US chapters, benefits
 * grid, the 5 membership tiers with pricing, FAQ accordion, and an
 * affiliate-partners logo wall.
 */
class WhyJoinAapscmPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'heading' => 'Why Join AAPSCM®',
                'lead'    => 'If you\'re working or studying in Business Administration, Marketing, Business Analytics or specializations in Supply Chain, Purchasing and Supply, Logistics, Tourism, and Hospitality, AAPSCM® is your professional body – here to help you connect, develop, and thrive in the Procurement, Supply Chain and Tourism industry.',
                'subhead' => 'Why Join the Global Institute for Leadership, Human Resources and Project Excellence is the world\'s leading professional non-profit (501c3) association for a growing community of millions of procurement, supply chain, and tourism management professionals and changemakers worldwide. We are Chartered in the US for combined professional areas of Procurement, Supply Chain, and Tourism Management with the following Charters:-',
                'image'   => '/storage/cms-images/2023/10/Man-PNG-Free-Image.png',
                'cta'     => ['label' => 'Join Today', 'url' => '/us-charters/'],
            ],
            'chapters' => [
                ['label' => '1. Columbia, SC Chapter',     'url' => '/us-charters/#sc-chapter'],
                ['label' => '2. Spartanburg, SC Chapter',  'url' => '/us-charters/#Chapters'],
                ['label' => '3. Dallas, TX Chapter',       'url' => '/us-charters/#TX-Chapters'],
                ['label' => '4. New York, NY Chapter',     'url' => '/us-charters/#NY-Chapters'],
                ['label' => '5. Rockford, IL Chapter',     'url' => '/us-charters/#IL-Chapters'],
                ['label' => '6. Boston, MA Chapter',       'url' => '/us-charters/#MA-Chapters'],
                ['label' => '7. Atlanta, GA Chapter',      'url' => null],
                ['label' => '8. Baltimore, MD Chapter',    'url' => null],
            ],
            'benefits' => [
                'heading' => 'BECOME A STUDENT, PROFESSIONAL, OR CHARTERED MEMBER',
                'lead'    => 'Joining AAPSCM® is all about getting the recognition you deserve as a competent, ethical, and accountable supply chain or tourism professional who has the skills and competency in the larger industry and society. It\'s about developing your skills and keeping up to date with the latest digital transformation in today\'s supply chain, growing your professional network, and being respected for your place in the industry.',
                'items'   => [
                    [
                        'title' => 'Plan your career and acquire the competence',
                        'body'  => 'You may choose the level of how you want to join AAPSCM®. Plan your career goals and aspirations and have unlimited access to tools and resources to achieve your skills and competencies.',
                    ],
                    [
                        'title' => 'Enjoy Industry Recognition',
                        'body'  => 'Improve and articulate your profile with industry letters after your name, a place on a public register, and your professional integrity backed by our members\' code and industry\'s best practices',
                    ],
                    [
                        'title' => 'Connect with the Supply Chain Community',
                        'body'  => 'Join our charters and network with professionals, and have access to our digital library and conference centers, where you can share knowledge and collaborate on all things digital, from everyday procurement, supply chain, tourism, and hospitality expertise to the ethical challenges facing your sector.',
                    ],
                    [
                        'title' => 'Join a Charter of your choice',
                        'body'  => 'We currently have six (6) charters – Columbia, SC Charter, Spartanburg, SC Charter, Dallas, TX Charter, New York, NY Charter, Rockford, IL Charter and Boston, MA Charter.. Irrespective of your country or region, you have access to register and join any charter and be invited regularly for conferences and workshops with an acceptable letter of invitation from the US consulate.',
                    ],
                    [
                        'title' => 'Keep your skills up to date and be current',
                        'body'  => 'Supply Chain and Tourism management continue to evolve every day with new tools and technology improvement and you will too at AAPSCM® with practical career development tools, e-learning, and resources at your fingertips.',
                    ],
                    [
                        'title' => 'Save and enrich your Career',
                        'body'  => 'Our Professional organization is a non-profit and not commercialized. Our exam fees are affordable. Therefore, enrich your career for less with a wide range of discounts on training, hardware, publications, and workshops',
                    ],
                ],
            ],
            'become_member' => [
                'heading' => 'Become a member',
                'body_1'  => 'Our Professional organization is a non-profit and not commercialized. Our exam fees are affordable. Therefore, enrich your career for less with a wide range of discounts on training, hardware, publications, and workshops',
                'body_2'  => 'Our professional resources and research deliver value for more than 300,000 professionals working in nearly every country in the world to enhance their careers, improve organizational success, and further mature the profession. Our International Affiliate partners also represent our interests and can be found in the Kingdom of Saudi Arabia, United Arab Emirates, Lebanon, Bahamas, Iraq, and Bahrain. We are also expanding to other regions in Asia and Africa. Our worldwide advocacy for procurement, supply chain, and tourism management is reinforced by our globally recognized standards, certification program, extensive academic and market research programs, and professional development opportunities.',
                'cta'     => ['label' => 'Click here', 'url' => '/membership/'],
                'image'   => '/storage/cms-images/2023/10/buildings-clipart-10.png',
            ],
            'tiers_heading' => 'Join AAPSCM®',
            'tiers' => [
                [
                    'name'        => 'Chartered Professional Membership',
                    'description' => 'You will take any of the We offer various exams and earn a passing score of 600/1000. Purchase the whole package which includes membership registration for a year, an ID card, and an offer to join any of the charters.',
                    'price'       => '$399.99',
                    'app_fee'     => 'Plus one-time $50  Application fee',
                    'buttons'     => [
                        ['label' => 'Purchase Course Materials', 'url' => '/checkout/?add-to-cart=19453'],
                        ['label' => 'purchase for exams',        'url' => '/checkout/?add-to-cart=19453'],
                        ['label' => 'buy virtual live training', 'url' => '/aapscm-training/'],
                    ],
                ],
                [
                    'name'        => 'Professional Membership',
                    'description' => 'You do not need to take any exams in the We offer various certification programs. However, you must submit your CV for perusal and evaluation to determine your eligibility. You should also have been in the related industry with a few years of experience. You must be active in your related field',
                    'price'       => '$185',
                    'app_fee'     => 'Plus one-time $10  Application fee',
                    'buttons'     => [
                        ['label' => 'Join Now', 'url' => '/checkout/?add-to-cart=4234'],
                    ],
                ],
                [
                    'name'        => 'Corporate membership',
                    'description' => 'Enjoy our FREE \'Train the Trainer\' event with free certificates. Connect with other leaders to share strategies and knowledge for driving success in Procurement, Supply Chain, and Tourism Management. Become an "Authorized & Accredited Training Partner.',
                    'price_lines' => [
                        'Corporate Membership - USD $ <b>2,499.99</b>',
                        'Silver Membership - USD $<b> 1699</b>',
                    ],
                    'app_fee'     => 'Plus one-time $250  Application fee',
                    'buttons'     => [
                        ['label' => 'Join Now', 'url' => '/membership'],
                    ],
                ],
                [
                    'name'        => 'Student Membership',
                    'description' => 'Start your career with the AAPSCM® Guide, plus all of our other global standards, which outline the fundamentals you need to know to become a successful procurement, supply chain, and tourism professional and manager. And now, enjoy unlimited access to AAPSCM® resources, the digital solution for original, how-to videos, templates, articles and test banks questions and answers, and books on how to complete and pass your certifications.',
                    'price'       => '$49.99',
                    'app_fee'     => 'Plus one-time $10  Application fee',
                    'buttons'     => [
                        ['label' => 'Join Now', 'url' => '/checkout/?add-to-cart=24613'],
                    ],
                ],
                [
                    'name'             => 'Become a Fellow Member',
                    'description_html' => 'Are you a Corporate Executive, Supply Chain leader, or a college Professor, or have contributed significantly to Supply Chain or Tourism Management, you can apply to become a Fellow Member. Fellowship celebrates a diverse and inclusive community from a broad range of backgrounds. AAPSCM® Fellows are entrepreneurs, innovators, researchers, academics, business leaders, and industry professionals. What they all have in common is the level of success they\'ve reached in their professional lives. You just need to submit your CV to <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="70191e161f3011110003131d5e1f0217">[email&#160;protected]</a>.',
                    'price'            => '$1,999.99',
                    'app_fee'          => 'Plus one-time $300 Application fee',
                    'buttons'          => [
                        ['label' => 'Join Now', 'url' => '/membership/'],
                    ],
                ],
            ],
            'faq' => [
                'heading' => 'Any questions?',
                'image'   => '/storage/cms-images/2023/10/membership-female-smiling.webp',
                'items'   => [
                    [
                        'q'         => 'How will Joining AAPSCM® as a Professional member help my career?',
                        'a_html'    => 'As a member you can meet people across the industry, expand your network and your thinking; plus you\'ll be able to benchmark your supply chain, procurement, logistics and tourism management skills, raise your profile and discover many new routes for progression.',
                    ],
                    [
                        'q'      => 'What are the benefits of membership?',
                        'a_html' => 'Wide-ranging! They include our skills e-learning library and Supply Chain, Procurement, Logistics or Tourism competency matrix, career growth, employability tools, exclusive savings and of course interaction with the different network of charters in the US.',
                    ],
                    [
                        'q'      => 'Which type of membership should I apply for?',
                        'a_html' => 'Choose your type  of membership – Chartered Professional Membership (requires taking test), Professional Membership (Do not require any exam), Student Membership (You will receive training and membership and take test as an option) or based on where you are in your career journey, and your level of experience – whether you\'re studying, training, working, or just looking to give back to the industry, there\'s a specific type of membership for you.',
                    ],
                    [
                        'q'      => 'What do I have to do to become chartered?',
                        'a_html' => '<p>Chartered Professional is the industry\'s gold standard. Achieving Chartered membership involves evidencing your competence in test but Professional membership requires only the submission of your CV for assessor review meeting.<b><br><a href="/membership">Learn more about membership types</a></b></p>',
                    ],
                    [
                        'q'      => 'How do I upgrade to the next level of membership?',
                        'a_html' => 'Upgrading involves a short online process to update and verify your credentials. When you\'re ready to take your membership to the next level, head to your membership log in area or your account and send a message to <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0d64636b624d6c6c7d7e6e6023627f6a">[email&#160;protected]</a>',
                    ],
                ],
                'cta' => ['label' => 'READ MORE FAQS', 'url' => '/membership-faqs/'],
            ],
            'affiliates' => [
                'heading' => 'OUR AFFILIATE PARTNERS',
                'cta'     => ['label' => 'Join Now', 'url' => '/affiliate-partners/'],
                'logos'   => [
                    '/storage/cms-images/2023/10/1-1.png',
                    '/storage/cms-images/2023/10/2-1.png',
                    '/storage/cms-images/2023/10/11.png',
                    '/storage/cms-images/2023/10/3-1.png',
                    '/storage/cms-images/2023/10/5.png',
                    '/storage/cms-images/2023/10/9.png',
                    '/storage/cms-images/2023/10/10.png',
                    '/storage/cms-images/2023/10/6.png',
                    '/storage/cms-images/2023/10/7.png',
                    '/storage/cms-images/2023/10/8.png',
                    '/storage/cms-images/2025/07/5-150x150-1.png',
                    '/storage/cms-images/2025/01/1-29.png',
                    '/storage/cms-images/2025/04/1-1.png',
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'why-join-aapscm'],
            [
                'title'            => 'Why Join AAPSCM',
                'content'          => null,
                'excerpt'          => 'Why join AAPSCM® — US chapters, member benefits, the five membership tiers and pricing, FAQs, and affiliate partners.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => 'Why Join AAPSCM® | Membership Benefits & Tiers',
                'meta_description' => 'Discover why AAPSCM® is the professional body for Procurement, Supply Chain and Tourism — US chapters, benefits, and membership tier pricing from $49.99 to $2,499.99.',
                'show_in_nav'      => true,
            ],
        );
    }
}
