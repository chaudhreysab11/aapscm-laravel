<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertCharteredSustainableSupplyChainManagerCsscmPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-50.png'),
                'heading' => 'Shape the Future with Sustainable Supply Chain Practices',
                'paragraphs' => [
                    'The Sustainable Supply Chain Management Certification (CSSCM)® empowers professionals to design and manage eco-friendly supply chains that balance profitability with environmental responsibility. In a world where sustainability is no longer optional, this certification positions you as a leader in implementing green, ethical, and circular supply chain strategies.',
                ],
            ],
            'why_choose' => [
                'heading' => 'Why Choose SSCM?',
                'intro' => 'Sustainability is now a critical component of supply chain management. The CSSCM® certification equips you to:',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1.png'),
                        'title' => 'Reduce Carbon Footprints',
                        'text' => 'Implement strategies to lower emissions in logistics and operations.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-115-1.png'),
                        'title' => 'Promote Circular Economy Practices',
                        'text' => 'Optimize resource usage through recycling, reusing, and waste reduction.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-116-1.png'),
                        'title' => 'Ensure Compliance',
                        'text' => 'Align with global sustainability regulations and standards.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-117.png'),
                        'title' => 'Drive Business Growth',
                        'text' => 'Build competitive advantage through sustainable practices that appeal to customers and stakeholders.',
                    ],
                ],
            ],
            'what_youll_learn' => [
                'heading' => 'What You’ll Learn',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/1.png'),
                        'title' => 'Sustainability Principles in Supply Chains',
                        'text' => 'Understand the fundamentals of eco-friendly and circular supply chain practices.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/2.png'),
                        'title' => 'Carbon Emission Reduction Strategies',
                        'text' => 'Master tools to measure and minimize emissions across the supply chain.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/3.png'),
                        'title' => 'Circular Economy Integration',
                        'text' => 'Learn to design supply chains that prioritize reuse, recycling, and minimal waste generation.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/4.png'),
                        'title' => 'Green Logistics',
                        'text' => 'Optimize transportation and warehousing for energy efficiency and environmental compliance.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/5.png'),
                        'title' => 'Sustainable Procurement',
                        'text' => 'Explore ethical sourcing and supplier management strategies.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/2-9.png'),
                        'title' => 'Regulatory Compliance',
                        'text' => 'Stay informed about laws and standards governing sustainable practices globally.',
                    ],
                ],
            ],
            'who_enroll' => [
                'heading' => 'Who Should Enroll?',
                'intro' => 'This certification is perfect for:',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/inflation.png'),
                        'title' => 'Reduce Carbon Footprints',
                        'text' => 'Implement strategies to lower emissions in logistics and operations.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/marketing.png'),
                        'title' => 'Promote Circular Economy Practices',
                        'text' => 'Optimize resource usage through recycling, reusing, and waste reduction.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/compliant.png'),
                        'title' => 'Ensure Compliance',
                        'text' => 'Align with global sustainability regulations and standards.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/analysis-1-1.png'),
                        'title' => 'Drive Business Growth',
                        'text' => 'Build competitive advantage through sustainable practices that appeal to customers and stakeholders.',
                    ],
                ],
            ],
            'program_highlights' => [
                'heading' => 'Program Highlights',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883853.png'),
                        'title' => 'Comprehensive Training',
                        'text' => 'Cover every aspect of sustainability, from procurement to delivery.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883854.png'),
                        'title' => 'Real-World Applications',
                        'text' => 'Work on case studies and projects to implement sustainable strategies.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883855.png'),
                        'title' => 'Expert-Led Learning',
                        'text' => 'Learn from top cybersecurity Learn from industry leaders in sustainable supply chain management.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883856.png'),
                        'title' => 'Cutting-Edge Tools',
                        'text' => 'Gain hands-on experience with carbon tracking software and sustainability assessment frameworks.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883857.png'),
                        'title' => 'Flexible Format',
                        'text' => 'Online courses tailored to fit your schedule.',
                    ],
                ],
            ],
            'why_right' => [
                'heading' => 'Why SSCM is Essential for the Future',
                'paragraphs' => [
                    'Businesses are increasingly held accountable for their environmental impact. The CSSCM® certification equips you with the skills to create supply chains that are not only efficient but also sustainable, giving you an edge in the evolving market landscape.',
                ],
                'features_heading' => 'Key Benefits',
                'items' => [
                    [
                        'title' => 'Lead Change',
                        'text' => 'Become a sustainability champion in your organization or industry.',
                    ],
                    [
                        'title' => 'Boost Your Career',
                        'text' => 'Gain a globally recognized certification that demonstrates your expertise.',
                    ],
                    [
                        'title' => 'Drive Innovation',
                        'text' => 'Learn to apply sustainable practices that enhance both profitability and environmental stewardship.',
                    ],
                    [
                        'title' => 'Make an Impact',
                        'text' => 'Contribute to a greener planet by optimizing supply chain processes.',
                    ],
                ],
            ],
            'how_to_start' => [
                'heading' => 'How to Get Started',
                'items' => [
                    [
                        'title' => 'Enroll Today',
                        'text' => 'Sign up for the CSSCM® certification program through our intuitive registration portal.',
                    ],
                    [
                        'title' => 'Learn at Your Pace',
                        'text' => 'Access online modules designed for flexibility and convenience.',
                    ],
                    [
                        'title' => 'Certify Your Expertise',
                        'text' => 'Complete the program and showcase your csscm certification to the world.',
                    ],
                ],
            ],
            'closing' => [
                'heading' => 'Transform Supply Chains. Transform the World.',
                'paragraph' => 'Sustainability is the future of supply chains. With the Sustainable Supply Chain Management Certification (CSSCM)® you’ll be equipped to lead the way in creating efficient, responsible, and profitable supply chains that make a positive impact on the environment.',
                'heading2' => 'Ready to Make a Difference?',
                'paragraph2' => 'Register Now and become a Sustainable Procurement & Supply Chain Manager Certification (CS-PSCM)®. Join the movement for a better, greener future.',
            ],
            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes', 'value' => 'Exam (CS-PSCM)®'],
                    ['label' => 'Exam Details', 'value' => 'The Sustainable Supply Chain Management Certification (CSSCM)® exam assesses your ability to design, implement, and manage eco-friendly and socially responsible procurement and supply chain strategies through practical, scenario-based evaluations.'],
                    ['label' => 'Number of Questions', 'value' => 'Maximum of 100 questions per exam'],
                    ['label' => 'Type of Questions', 'value' => 'Multiple choice'],
                    ['label' => 'Length of Test', 'value' => '120 Minutes'],
                    ['label' => 'Passing Score', 'value' => '600 (on a scale of 1000)'],
                    ['label' => 'Recommended Experience', 'value' => 'No prior experience necessary'],
                    ['label' => 'Languages', 'value' => 'English'],
                    ['label' => 'Retirement', 'value' => 'None'],
                    ['label' => 'Testing Provider', 'value' => 'Affiliate Partners Testing Centers Online Testing'],
                    ['label' => 'Price', 'value' => '$399.99 USD'],
                ],
                'flyer_label' => 'Download Flyer',
                'flyer_href' => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2026/02/CSSCM.pdf'),
            ],
            'training_options' => [
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'options' => [
                    [
                        'text' => 'Self-Paced Training, Exam Fees: Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=23957'),
                    ],
                    [
                        'text' => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-chartered-sustainable-supply-chain-manager-csscm/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'chartered-sustainable-supply-chain-manager-csscm'],
            [
                'title' => 'Chartered Sustainable Supply Chain Manager (CSSCM)®',
                'content' => null,
                'excerpt' => 'Shape the Future with Sustainable Supply Chain Practices',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => 'Chartered Sustainable Supply Chain Manager (CSSCM) - AAPSCM®',
                'meta_description' => 'The Sustainable Supply Chain Management Certification (CSSCM)® empowers professionals to design and manage eco-friendly supply chains that balance profitability with environmental responsibility.',
                'show_in_nav' => false,
            ],
        );
    }
}
