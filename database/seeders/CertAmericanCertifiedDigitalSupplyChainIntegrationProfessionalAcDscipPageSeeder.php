<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertAmericanCertifiedDigitalSupplyChainIntegrationProfessionalAcDscipPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-37.png'),
                'heading' => 'Master the Digital Transformation of Supply Chains',
                'paragraphs' => [
                    'The American Certified Digital Supply Chain Integration Professional (AC-DSCI)® equips professionals with the expertise to transform traditional supply chains into agile, data-driven, and fully integrated systems. This program provides the skills to leverage digital technologies such as ERP systems, IoT, and AI to create seamless and highly efficient supply chains.',
                ],
            ],
            'why_choose' => [
                'heading' => 'Why Choose AC-DSCI® ?',
                'intro' => 'Digital transformation is revolutionizing supply chain management. The AC-DSCI® certification prepares you to:',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1.png'),
                        'title' => 'Optimize Operations',
                        'text' => 'Use cutting-edge tools to streamline logistics, inventory, and procurement processes.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-115-1.png'),
                        'title' => 'Enhance Real-Time Visibility',
                        'text' => 'Monitor supply chain activities using IoT devices and cloud-based platforms.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-116-1.png'),
                        'title' => 'Boost Decision-Making',
                        'text' => 'Leverage AI and data analytics for informed, real-time decision-making.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-117.png'),
                        'title' => 'Improve Collaboration',
                        'text' => 'Integrate digital platforms to enhance collaboration across suppliers, manufacturers, and distributors.',
                    ],
                ],
            ],
            'what_youll_learn' => [
                'heading' => 'What You’ll Learn',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/1.png'),
                        'title' => 'ERP Systems and Supply Chain Platforms',
                        'text' => 'Master systems like SAP, Oracle, and Microsoft Dynamics to manage end-to-end supply chain processes.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/2.png'),
                        'title' => 'IOT Integration',
                        'text' => 'Implement IoT technologies to track assets, monitor inventory, and manage transportation in real time.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/3.png'),
                        'title' => 'Digital Twin Modeling',
                        'text' => 'Create virtual replicas of supply chains for predictive analytics and scenario planning.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/4.png'),
                        'title' => 'Cloud Computing for Supply Chains',
                        'text' => 'Learn how to utilize cloud-based solutions for scalability and collaborative workflows.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/5.png'),
                        'title' => 'AI and Big Data Analytics',
                        'text' => 'Discover how to analyze supply chain data to optimize efficiency and performance.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/5.png'),
                        'title' => 'Automation in Supply Chains',
                        'text' => 'Implement robotic process automation (RPA) to eliminate repetitive tasks and enhance productivity.',
                    ],
                ],
            ],
            'who_enroll' => [
                'heading' => 'Who Should Enroll?',
                'intro' => 'The AC-DSIP® certification is ideal for:',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/businessman.png'),
                        'title' => 'Supply Chain Managers',
                        'text' => 'Looking to implement and manage digital supply chain systems.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/supply-chain-management-1.png'),
                        'title' => 'IT Professionals',
                        'text' => 'Seeking to specialize in supply chain technology integration.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/ecology.png'),
                        'title' => 'Business Owners',
                        'text' => 'Interested in digitally transforming their supply chain operations.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/graduate.png'),
                        'title' => 'Students and Graduates',
                        'text' => 'Aspiring to build a career in tech-driven supply chain management.',
                    ],
                ],
            ],
            'program_highlights' => [
                'heading' => 'Program Highlights',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883853.png'),
                        'title' => 'Comprehensive Training',
                        'text' => 'Cover all aspects of digital supply chain integration, from IoT to cloud platforms.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883854.png'),
                        'title' => 'Practical Application',
                        'text' => 'Work on real-world projects, including ERP deployment and IoT implementation.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883855.png'),
                        'title' => 'Expert Guidance',
                        'text' => 'Learn from industry leaders in digital supply chain transformation.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883856.png'),
                        'title' => 'Advanced Tools',
                        'text' => 'Gain hands-on experience with technologies like digital twins, predictive analytics, and cloud solutions.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883857.png'),
                        'title' => 'Flexible Learning Options',
                        'text' => 'Online courses designed to fit your schedule and learning style.',
                    ],
                ],
            ],
            'why_right' => [
                'heading' => 'Why AC-DSIP® is a Career Game-Changer',
                'paragraphs' => [
                    'Digital supply chain integration is no longer optional—it’s essential for staying competitive. The DSCI® certification provides the skills and credentials needed to lead digital transformation efforts, making you an invaluable asset in the modern supply chain ecosystem.',
                ],
                'features_heading' => 'Key Benefits:-',
                'items' => [
                    [
                        'title' => 'Drive Digital Innovation',
                        'text' => 'Be at the forefront of integrating advanced technologies into supply chains.',
                    ],
                    [
                        'title' => 'Gain Industry Recognition',
                        'text' => 'Earn a globally respected certification that validates your expertise in digital supply chains.',
                    ],
                    [
                        'title' => 'Future-Proof Your Career',
                        'text' => 'Stay ahead of the curve in a rapidly evolving digital landscape.',
                    ],
                    [
                        'title' => 'Enhance Collaboration',
                        'text' => 'Build interconnected, efficient supply chains using the latest digital tools.',
                    ],
                ],
            ],
            'how_to_start' => [
                'heading' => 'How to Get Started',
                'items' => [
                    [
                        'title' => 'Register Today',
                        'text' => 'Sign up for the AC-DSIS certification program via our user-friendly registration portal.',
                    ],
                    [
                        'title' => 'Learn from Experts',
                        'text' => 'Access interactive modules and cutting-edge case studies.',
                    ],
                    [
                        'title' => 'Certify Your Skills',
                        'text' => 'Complete the program and earn your AC-DSIP® credential to showcase your expertise.',
                    ],
                ],
            ],
            'closing' => [
                'heading' => 'The Future of Supply Chains is Digital. Are You Ready?',
                'paragraph' => 'Digital integration is transforming supply chains across industries, offering unprecedented efficiency and visibility. With the American Certified Digital Supply Chain Integration Professional (AC-DSCI)®, you’ll gain the expertise to lead this transformation and make a lasting impact on your organization.',
                'heading2' => 'Join the Digital Supply Chain Revolution!',
                'paragraph2' => 'Register Now and become a American Certified Digital Supply Chain Integration Professional. Unlock the full potential of digital technologies and elevate your career today.',
            ],
            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes', 'value' => 'Exam ((AC-DSCI)®'],
                    ['label' => 'Exam Details', 'value' => 'The American Certified Digital Supply Chain Integration Professional Certification (AC-DSIP)® exam evaluates your proficiency in integrating digital technologies to optimize and streamline supply chain operations through practical, scenario-based assessments.'],
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
                'flyer_href' => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2026/02/AC-DSCI.pdf'),
            ],
            'training_options' => [
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'options' => [
                    [
                        'text' => 'Self-Paced Training, Exam Fees: Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=23959'),
                    ],
                    [
                        'text' => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-american-certified-digital-supply-chain-integration-professional-ac-dscip/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'american-certified-digital-supply-chain-integration-professional-ac-dscip'],
            [
                'title' => 'American Certified Digital Supply Chain Integration Professional (AC-DSCI)®',
                'content' => null,
                'excerpt' => 'Master the Digital Transformation of Supply Chains',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => 'American Certified Digital Supply Chain Integration Professional (AC-DSCI) - AAPSCM®',
                'meta_description' => 'The American Certified Digital Supply Chain Integration Professional (AC-DSCI)® equips professionals with the expertise to transform traditional supply chains into agile, data-driven, and fully integrated systems.',
                'show_in_nav' => false,
            ],
        );
    }
}
