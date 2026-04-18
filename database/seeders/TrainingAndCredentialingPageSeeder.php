<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/training-and-credentialing/ for WordPress parity.
 * Corporate upskilling landing page: why invest, three cert program tracks
 * (Procurement / Supply Chain / Tourism) each as a 3-card grid, flexible
 * learning options, why-choose grid, who-benefits list, and a final CTA.
 */
class TrainingAndCredentialingPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'subheading' => 'Upskill Your Team to Power Business Growth in Procurement, Supply Chain, and Tourism Management',
            ],

            'empower' => [
                'heading' => 'Empower Your Workforce with AAPSCM® Certified Training & Development',
                'body_1'  => 'In today\'s rapidly evolving global economy, procurement, supply chain, and tourism management professionals must stay ahead of industry trends, technological advancements, and regulatory changes. The American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®) is committed to equipping businesses and professionals with the knowledge, skills, and certifications necessary to enhance operational efficiency, drive sustainable business growth, and maintain a competitive edge.',
                'body_2'  => 'Our industry-leading training programs and certifications are designed to empower teams, optimize supply chain strategies, improve procurement operations, and elevate tourism management standards, ensuring that your organization remains resilient, agile, and future-ready.',
                'image'   => '/storage/cms-images/2025/03/1.jpg',
            ],

            'why_invest' => [
                'heading' => 'Why Invest in Upskilling Your Team?',
                'image'   => '/storage/cms-images/2025/03/1-1.jpg',
                'items'   => [
                    ['label' => 'Boost Organizational Efficiency', 'body' => ' – Equip your employees with cutting-edge procurement and supply chain strategies to enhance efficiency and reduce costs.'],
                    ['label' => 'Enhance Competitive Advantage',  'body' => ' – Develop globally recognized skills and expertise in procurement, supply chain, and tourism management.'],
                    ['label' => 'Ensure Regulatory Compliance',   'body' => ' – Stay ahead of industry regulations, trade policies, and ethical sourcing requirements.'],
                    ['label' => 'Improve Risk Management',        'body' => ' – Train your workforce in supplier risk assessment, contract negotiation, and strategic sourcing.'],
                    ['label' => 'Maximize Profitability & ROI',   'body' => ' – Streamline operations, optimize supplier relationships, and leverage data-driven decision-making for long-term business success.'],
                ],
                'example' => 'A Fortune 500 company trained its procurement team with AAPSCM® certifications and achieved a 15% reduction in procurement costs and a 25% increase in supplier performance within one year.',
            ],

            'programs_intro' => [
                'heading'    => 'AAPSCM® Certified Training & Certification Programs',
                'body'       => 'AAPSCM® offers world-class professional certifications and training programs tailored to procurement, supply chain, and tourism industry professionals. Whether you are a corporate team looking to enhance expertise or an individual seeking career growth, our courses provide practical knowledge and globally recognized credentials.',
                'subheading' => '1) AAPSCM® Certified Training & Certification Programs',
            ],

            'procurement_cards' => [
                [
                    'image' => '/storage/cms-images/2025/03/1.png',
                    'title' => 'Chartered Procurement Manager (CPM)®',
                    'body'  => 'Advanced training in strategic sourcing, contract negotiation, and supplier risk management.',
                ],
                [
                    'image' => '/storage/cms-images/2025/03/2.png',
                    'title' => 'Sustainable Procurement & Ethical Sourcing Certification',
                    'body'  => 'Best practices for eco-friendly, ethical, and socially responsible procurement.',
                ],
                [
                    'image' => '/storage/cms-images/2025/03/1-1.png',
                    'title' => 'Digital Procurement & Analytics Certification',
                    'body'  => 'Learn to use AI, blockchain, and predictive analytics for procurement optimization.',
                ],
            ],
            'procurement_ideal_for' => 'Procurement managers, sourcing specialists, contract officers, compliance officers.',

            'supply_chain_heading' => '2) Supply Chain Management Training & Certifications',
            'supply_chain_cards'   => [
                [
                    'image' => '/storage/cms-images/2025/03/1.png',
                    'title' => 'Chartered Supply Chain Manager (CSCM)®',
                    'body'  => 'A comprehensive certification covering supply chain strategy, logistics, and demand forecasting.',
                ],
                [
                    'image' => '/storage/cms-images/2025/03/1-2.png',
                    'title' => 'Supply Chain Technology & AI in Logistics',
                    'body'  => 'Learn how AI, IoT, and data analytics are revolutionizing supply chain operations.',
                ],
                [
                    'image' => '/storage/cms-images/2025/03/1-3.png',
                    'title' => 'Learn how AI, IoT, and data analytics are revolutionizing supply chain operations.',
                    'body'  => 'Strategies for waste reduction, carbon footprint management, and sustainable logistics.',
                ],
            ],
            'supply_chain_ideal_for' => 'Supply chain directors, logistics professionals, sustainability officers, warehouse managers.',

            'tourism_heading' => '3) Tourism & Hospitality Management Training & Certifications',
            'tourism_cards'   => [
                [
                    'image' => '/storage/cms-images/2025/03/1.png',
                    'title' => 'Chartered Tourism Manager (CTM)®',
                    'body'  => 'Industry-recognized certification for destination management, tourism marketing, and event planning.',
                ],
                [
                    'image' => '/storage/cms-images/2025/03/2.png',
                    'title' => 'Sustainable Tourism & Eco-Tourism Certification',
                    'body'  => 'Learn about green tourism strategies, conservation efforts, and responsible travel trends.',
                ],
                [
                    'image' => '/storage/cms-images/2025/03/1-4.png',
                    'title' => 'Hospitality Supply Chain & Procurement Strategy',
                    'body'  => 'Optimize hotel, airline, and travel service supply chains for maximum efficiency.',
                ],
            ],

            'flexible_learning' => [
                'heading' => 'Flexible Learning Options for Teams & Individuals',
                'intro'   => 'At AAPSCM®, we offer customized, flexible learning solutions that fit your organization\'s unique training needs.',
                'image'   => '/storage/cms-images/2025/03/2.jpg',
                'items'   => [
                    ['label' => 'Live Virtual Training (LVT)',         'body' => ' – Instructor-led, interactive online sessions for global teams.'],
                    ['label' => 'Self-Paced Online Training',          'body' => ' – Learn at your own pace with on-demand courses and downloadable materials.'],
                    ['label' => 'Corporate Training Solutions',        'body' => ' – Tailored training programs designed to align with your company\'s strategic goals.'],
                    ['label' => 'In-Person Workshops & Seminars',      'body' => ' – Hands-on, immersive training sessions for enhanced skill development.'],
                ],
                'example' => 'A multinational retail company partnered with AAPSCM® to train 50+ employees in supply chain resilience, resulting in a 30% increase in supply chain efficiency.',
            ],

            'why_choose' => [
                'heading' => 'Flexible Learning Options for Teams & Individuals',
                'cards'   => [
                    [
                        'image' => '/storage/cms-images/2025/03/1-5.png',
                        'title' => 'Industry-Recognized Certifications',
                        'body'  => 'Our certifications are globally accredited and recognized by industry leaders.',
                    ],
                    [
                        'image' => '/storage/cms-images/2025/03/2-2.png',
                        'title' => 'Expert-Led Training',
                        'body'  => 'Learn from top procurement, supply chain, and tourism management professionals.',
                    ],
                    [
                        'image' => '/storage/cms-images/2025/03/2-3.png',
                        'title' => 'Practical, Real-World Applications',
                        'body'  => 'Courses include case studies, hands-on exercises, and scenario-based learning.',
                    ],
                    [
                        'image' => '/storage/cms-images/2025/03/2-4.png',
                        'title' => 'Global Network & Community',
                        'body'  => 'Gain access to an exclusive professional network of AAPSCM® certified experts.',
                    ],
                    [
                        'image' => '/storage/cms-images/2025/03/2-5.png',
                        'title' => 'Competitive Pricing & Group Discounts',
                        'body'  => 'Affordable training solutions with corporate discounts for team enrollments.',
                    ],
                ],
                'example' => 'A government procurement agency upskilled its team with AAPSCM® training and enhanced compliance with global trade regulations, avoiding legal penalties and ensuring ethical sourcing.',
            ],

            'who_benefits' => [
                'heading' => 'Who Can Benefit from AAPSCM® Training?',
                'intro'   => 'AAPSCM® training programs are designed for professionals at all career levels, including:',
                'image'   => '/storage/cms-images/2025/03/1-7.png',
                'items'   => [
                    ['label' => 'Corporate Procurement & Supply Chain Teams', 'body' => ' – Optimize procurement and logistics operations for increased efficiency.'],
                    ['label' => 'Government & Public Sector Officials',       'body' => ' – Enhance policy implementation and regulatory compliance.'],
                    ['label' => 'Small Business Owners & Entrepreneurs',      'body' => ' – Build a resilient, cost-effective supply chain.'],
                    ['label' => 'Mid-Career Professionals & Job Seekers',     'body' => ' – Gain a competitive edge with industry-recognized credentials.'],
                    ['label' => 'Sustainability & CSR Teams',                 'body' => ' – Ensure ethical sourcing and environmental responsibility.'],
                ],
                'example' => 'A global logistics firm trained its employees on digital supply chain technology and achieved a 40% improvement in demand forecasting accuracy.',
            ],

            'cta' => [
                'heading' => 'Start Your Team\'s Growth Journey Today!',
                'intro'   => 'Invest in your team\'s future and power business growth through world-class procurement, supply chain, and tourism management training. With AAPSCM®, your organization can unlock new efficiencies, ensure compliance, and drive sustainable success.',
                'image'   => '/storage/cms-images/2025/03/1-14.jpg',
                'items'   => [
                    ['label' => 'Get Started Today!',       'body' => ' Contact us to learn more about corporate training solutions and certification programs.'],
                    ['label' => 'Need Custom Training?',    'body' => ' We offer tailored learning plans for businesses of all sizes.'],
                    ['label' => 'Join the AAPSCM® Network!', 'body' => ' Become part of a global professional community of industry experts.'],
                ],
                'contact' => [
                    'phone'       => '+1-(833) 524-2846',
                    'fax'         => 'Fax:+1-(605)608-3078',
                    'email_cfmail' => '543d3a323b143535242737397a3b2633',
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'training-and-credentialing'],
            [
                'title'            => 'Training & Credentialing',
                'content'          => null,
                'excerpt'          => 'AAPSCM® corporate training and certification programs across procurement, supply chain, and tourism management — flexible learning options and industry-recognized credentials.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => 'Training & Credentialing | AAPSCM',
                'meta_description' => 'Upskill your team with AAPSCM® certified training programs in procurement, supply chain, and tourism management — live virtual, self-paced, corporate, and in-person.',
                'show_in_nav'      => true,
            ],
        );
    }
}
