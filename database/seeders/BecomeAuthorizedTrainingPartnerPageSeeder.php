<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/become-a-authorized-training-partner/ for WP parity.
 * Sales/overview page for the AAPSCM® Authorized Training Partner program: hero with
 * brochure + apply buttons, why-join list, two partner tiers, benefits of the partnership,
 * affiliate program invitation, 5-icon advantage grid, advantages narrative + fee,
 * 9-card key benefits grid + 1 centered bottom card, ideal candidates list, CTA with contact.
 */
class BecomeAuthorizedTrainingPartnerPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'eyebrow'      => 'Gain a Competitive Edge',
                'heading'      => 'Become an AAPSCM® Authorized Training Partner',
                'body'         => 'The AAPSCM® Authorized Training Partner program equips you with the tools and resources to distinguish yourself in a competitive market. Benefits include access to AAPSCM® licensed and approved training content, high-quality instructional support, and comprehensive marketing and sales assistance. Effective January 31, 2021, the AAPSCM® Authorized Partner Program was extended to other countries and regions outside the US.',
                'image'        => '/storage/cms-images/2024/12/2-15.png',
                'brochure_url' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/05/AAPSCM-FLYER-PARTNERS-1-1.pdf'),
                'brochure_label' => 'REVIEWATP Brochure',
                'apply_url'    => UrlRewriter::local('https://aapscm.org/affiliates-partners/'),
                'apply_label'  => 'CLICK HERE TO APPLY',
            ],

            'why_join' => [
                'image'   => '/storage/cms-images/2024/12/1-65.png',
                'heading' => 'Why Join?',
                'items'   => [
                    [
                        'title' => 'Stand Out as an AAPSCM®-Approved Provider',
                        'body'  => 'Become the trusted training provider that learners seek. AAPSCM® enhances your visibility by featuring your services in our marketing channels, including AAPSCM and our searchable partner database.',
                    ],
                    [
                        'title' => 'Access to Turnkey Licensed Content',
                        'body'  => 'Receive instructor and participant guides, along with online learning assets, all meticulously maintained by AAPSCM®. You\'re free to include your own case studies, activities, or industry-specific information, and the content is suitable for both in-person and virtual, instructor-led courses.',
                    ],
                    [
                        'title' => 'Comprehensive Certification Training',
                        'body'  => 'Leverage licensed content for all our AAPSCM® certification programs, equipping you to deliver high-quality exam prep and certification instruction that meets industry standards.',
                    ],
                ],
            ],

            'tiers' => [
                'heading'    => 'Options That Fit Your Business Model',
                'subheading' => 'The AAPSCM® Authorized Training Partner program offers two distinct tiers to align with your organization\'s needs:',
                'image'      => '/storage/cms-images/2024/12/1-66.png',
                'items'      => [
                    [
                        'title'    => 'Single-Country Accredited Partner',
                        'features' => [
                            'Approval to operate and market AAPSCM® certifications within one country.',
                        ],
                    ],
                    [
                        'title'    => 'Multi-Country Accredited Partner',
                        'features' => [
                            'Approval to operate in multiple countries, including multi-language marketing for all AAPSCM® certifications.',
                            'Requires a capability of at least 60 students per month with consistent enrollment and an 80% or higher pass rate in our certification programs.',
                            'Enjoy comprehensive program benefits, including enhanced business management support and more extensive marketing and sales resources.',
                        ],
                    ],
                ],
            ],

            'deliver_trust' => [
                'heading'    => 'Deliver Training Your Students Can Trust',
                'subheading' => 'As an AAPSCM® Authorized Training Partner, you\'ll provide verified, vetted exam prep using AAPSCM®-developed course content and test bank materials—ensuring that your students receive the highest quality instruction. Your team will also benefit from the backing of AAPSCM®, which offers:',
                'items'      => [
                    'Guidance on showcasing the value of AAPSCM® authorized training to prospective students.',
                    'Clear criteria to help learners distinguish between authorized partners and non-authorized providers.',
                ],
                'closing'    => 'By partnering with AAPSCM®, you\'ll stand out in the market, uphold the highest training standards, and empower students to excel in their professional journeys.',
            ],

            'affiliate_invite' => [
                'heading'    => 'Join the Affiliate Partner Program',
                'body_pre'   => 'Become an AAPSCM® Affiliate Partner in your region and earn full accreditation for your territory. By joining now, you\'ll receive comprehensive support to build regional leadership, execute effective marketing strategies, and leverage our logo and trademarks. As part of our Spartanburg SC Charter, you can offer tailored solutions that address your customers\' unique course needs, powered by our course materials and test bank resources. If you\'re ready to begin, please email ',
                'email_cfmail' => '345550595d5a745555444757591a5b4653',
                'body_post'  => ' and we\'ll schedule a Zoom meeting to get you started.',
            ],

            'advantage_cards' => [
                [
                    'image' => '/storage/cms-images/2024/12/Group-1597883853.png',
                    'title' => 'Local Customization',
                    'body'  => 'Adapt and translate course materials to meet regional language and cultural requirements.',
                ],
                [
                    'image' => '/storage/cms-images/2024/12/Group-1597883854.png',
                    'title' => 'Expert Guidance',
                    'body'  => 'Access AAPSCM® Subject Matter Experts for support in promoting training solutions and services.',
                ],
                [
                    'image' => '/storage/cms-images/2024/12/Group-1597883855.png',
                    'title' => 'Marketing & Sales Support',
                    'body'  => 'Utilize dedicated toolkits to market and sell your offerings effectively.',
                ],
                [
                    'image' => '/storage/cms-images/2024/12/Group-1597883856.png',
                    'title' => 'Network Expansion',
                    'body'  => 'Contribute insights through the Partner Advisory Council, gain new connections, and solidify your role in our Spartanburg SC Charter.',
                ],
                [
                    'image' => '/storage/cms-images/2024/12/Group-1597883857.png',
                    'title' => 'Consulting & Training',
                    'body'  => 'As a Consulting Partner, you also become an Authorized Training Partner, broadening your services.',
                ],
            ],

            'advantages_intro' => [
                'eyebrow'    => 'Affiliate Training Partner',
                'heading'    => 'Advantages with AAPSCM®',
                'subheading' => 'Deliver Excellence. Expand Reach. Empower Professionals.',
                'body_1'     => 'Partnering with the American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®) as an Affiliate Training Partner provides your organization with the authority, resources, and international credibility to offer our globally recognized certifications, trainings, and exams directly within your institution or network.',
                'body_2'     => 'Whether you are a university, professional training firm, consulting agency, or SME, this partnership enables you to build professional capacity in your region while generating sustainable income.',
                'why_box'   => [
                    'heading' => 'Why Become an AAPSCM® Affiliate Training Partner?',
                    'body'    => 'As an Affiliate Training Partner, you gain access to exclusive tools, support, and commercial opportunities that allow you to deliver high-quality certification programs under the AAPSCM® brand.',
                ],
                'fee_box' => [
                    'heading' => 'Annual Affiliate Partner Fee: $3,050 USD',
                    'body'    => 'This annual fee includes your license to operate as a certified Affiliate Training Partner, full access to course resources, and permission to conduct training, certification preparation, and exam delivery aligned with AAPSCM\'s standards and protocols.',
                ],
            ],

            'key_benefits' => [
                'heading_pre'     => 'Key Benefits of Being an',
                'heading_accent' => 'Affiliate Training Partner',
                'cards' => [
                    ['image' => '/storage/cms-images/2025/08/1-3-1.png', 'title' => 'Right to Deliver AAPSCM® Certified Programs',         'body' => 'Offer and facilitate approved AAPSCM® certification courses across procurement, supply chain, e-commerce, and tourism management domains.'],
                    ['image' => '/storage/cms-images/2025/08/1-4-1.png', 'title' => 'Opportunity to Conduct and Proctor Virtual Tests Onsite', 'body' => 'Host and proctor AAPSCM certification exams virtually at your premises using approved guidelines, helping your candidates complete the testing process locally and conveniently.'],
                    ['image' => '/storage/cms-images/2025/08/1-5-1.png', 'title' => '20% Revenue Share on All Successful Registrations',  'body' => 'Receive commission for every student or corporate client you register for AAPSCM certifications, events, and workshops.'],
                    ['image' => '/storage/cms-images/2025/08/1-35.png',  'title' => 'Free Access to Official Course Materials',           'body' => 'All approved programs include ready-to-deliver training materials: slide decks, trainer guides, case studies, quizzes, and exam prep kits.'],
                    ['image' => '/storage/cms-images/2025/08/1-36.png',  'title' => 'Certificate of Partnership & Branding Rights',       'body' => 'Receive an official Certificate of Recognition as an AAPSCM® Affiliate Training Partner and a digital partner badge for use on your website and promotional materials.'],
                    ['image' => '/storage/cms-images/2025/08/1-34.png',  'title' => 'Marketing Toolkit and Co-Branding Opportunities',    'body' => 'Gain access to brochures, event banners, digital flyers, and social media templates branded for your partnership.'],
                    ['image' => '/storage/cms-images/2025/08/1-37.png',  'title' => 'Partner Listing on AAPSCM Website',                  'body' => 'Your organization will be listed publicly on the AAPSCM website under Authorized Training Partners, enhancing your visibility and trust.'],
                    ['image' => '/storage/cms-images/2025/08/1-38.png',  'title' => 'Support from AAPSCM Academic and Technical Team',    'body' => 'Enjoy dedicated access to academic liaisons for curriculum guidance, exam management, and technical support.'],
                    ['image' => '/storage/cms-images/2025/08/1-39.png',  'title' => 'Access to Affiliate Partner Portal',                 'body' => 'Manage registrations, download updated course materials, request certificates, and schedule exam dates from a secure digital dashboard.'],
                ],
                'bottom_card' => [
                    'image' => '/storage/cms-images/2025/08/1-40.png',
                    'title' => 'Invitation to Co-Host Events and Summits',
                    'body'  => 'Participate in AAPSCM\'s global conferences, webinars, and awards ceremonies as a co-host, speaker, or exhibitor.',
                ],
            ],

            'ideal_candidates' => [
                'eyebrow' => 'Ideal Candidates for',
                'accent'  => 'Affiliate Training Partnership',
                'image'   => '/storage/cms-images/2025/08/1-41.png',
                'items'   => [
                    'Accredited universities and colleges',
                    'Corporate training and learning academies',
                    'Business consulting and HR firms',
                    'Independent certification trainers',
                    'Institutes and Centers all over the world',
                    'International workforce development agencies',
                    'Public sector or NGO training institutions',
                ],
            ],

            'apply_cta' => [
                'eyebrow'    => 'Apply Today and Start Delivering',
                'accent'     => 'AAPSCM Certifications',
                'body'       => 'AAPSCM is committed to building strong local-global collaborations that expand access to world-class professional education. As an Affiliate Training Partner, you can unlock new business opportunities while advancing professional standards in your region.',
                'email_cfmail' => '11787f777e5170706162727c3f7e6376',
                'phones'     => '+1-469-991-5228 | +1-(803) 998-2189',
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'become-a-authorized-training-partner'],
            [
                'title'            => 'Become an Authorized Training Partner',
                'content'          => null,
                'excerpt'          => 'Become an AAPSCM® Authorized Training Partner — deliver certified programs, proctor exams, earn revenue share, and gain global branding.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => 'Become an Authorized Training Partner | AAPSCM',
                'meta_description' => 'Join the AAPSCM® Authorized Training Partner program — licensed content, revenue share, partner portal, and global recognition for universities, trainers, and firms.',
                'show_in_nav'      => true,
            ],
        );
    }
}
