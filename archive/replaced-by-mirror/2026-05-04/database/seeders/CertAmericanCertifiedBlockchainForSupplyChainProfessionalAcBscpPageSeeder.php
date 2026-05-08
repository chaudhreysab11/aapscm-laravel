<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertAmericanCertifiedBlockchainForSupplyChainProfessionalAcBscpPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/3-10.png'),
                'heading' => 'Revolutionize Supply Chains with Blockchain Expertise!',
                'paragraphs' => [
                    'The Blockchain for Supply Chain Professional Certification (AC-BSCP) is your gateway to mastering the transformative power of blockchain technology. Designed for forward-thinking professionals and organizations, this certification equips you with the skills to enhance supply chain transparency, strengthen security, and boost efficiency. Gain expertise to tackle real-world challenges and drive innovation in global supply chain management with blockchain solutions. Elevate your career and lead the future of logistics and operations!',
                ],
            ],
            'why_choose' => [
                'heading' => 'Why Choose AC-BSCP?',
                'intro' => 'Supply chains are evolving, and blockchain is at the heart of this transformation. The AC-BSCP certification empowers you to:',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Untitled-5-1.png'),
                        'title' => 'Enhance Traceability',
                        'text' => 'Track goods from origin to delivery with immutable blockchain records.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/2-12.png'),
                        'title' => 'Improve Security',
                        'text' => 'Safeguard supply chain data from tampering and unauthorized access.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/3-8.png'),
                        'title' => 'Streamline Operations',
                        'text' => 'Automate processes using smart contracts for faster and error-free transactions.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/4-6.png'),
                        'title' => 'Boost Sustainability',
                        'text' => 'Monitor and verify eco-friendly practices across the supply chain.',
                    ],
                ],
            ],
            'what_youll_learn' => [
                'heading' => 'What You’ll Learn',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/1.png'),
                        'title' => 'Blockchain Fundamentals in Supply Chains',
                        'text' => 'Understand the core principles of blockchain technology and its unique advantages.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/12503540.png'),
                        'title' => 'Smart Contracts',
                        'text' => 'Learn to automate procurement and logistics with blockchain-based smart contracts.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/3.png'),
                        'title' => 'Data Security and Privacy',
                        'text' => 'Explore how blockchain ensures secure and transparent data sharing among stakeholders.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/4.png'),
                        'title' => 'Traceability and Authenticity',
                        'text' => 'Implement blockchain solutions to verify the origin and authenticity of goods.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-15-1.png'),
                        'title' => 'Integration with IoT and AI',
                        'text' => 'Discover how to combine blockchain with IoT devices and AI for real-time supply chain monitoring.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/5.png'),
                        'title' => 'Compliance and Regulations',
                        'text' => 'Master blockchain applications that adhere to global supply chain standards and laws.',
                    ],
                ],
            ],
            'who_enroll' => [
                'heading' => 'Who Should Enroll?',
                'intro' => 'This certification is perfect for:',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/supply-chain.png'),
                        'title' => 'Supply Chain Managers',
                        'text' => 'Seeking advanced tools to improve visibility and efficiency.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/technology-2.png'),
                        'title' => 'Tech Enthusiasts',
                        'text' => 'Wanting to specialize in blockchain applications for supply chains.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/boss-1.png'),
                        'title' => 'Business Owners',
                        'text' => 'Looking to build trust and transparency with customers and suppliers.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/graduate.png'),
                        'title' => 'Students and Graduates',
                        'text' => 'Interested in cutting-edge technologies for supply chain innovation.',
                    ],
                ],
            ],
            'program_highlights' => [
                'heading' => 'Program Highlights',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883853.png'),
                        'title' => 'Comprehensive Blockchain Training',
                        'text' => 'Deep dive into blockchain concepts, smart contracts, and supply chain applications.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883854.png'),
                        'title' => 'Hands-On Projects',
                        'text' => 'Gain practical experience by implementing blockchain solutions in real-world scenarios.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883855.png'),
                        'title' => 'Expert Guidance',
                        'text' => 'Learn from blockchain specialists and supply chain experts.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883856.png'),
                        'title' => 'Cutting-Edge Tools',
                        'text' => 'Work with platforms like Ethereum, Hyperledger, and IBM Blockchain.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883857.png'),
                        'title' => 'Flexible Learning',
                        'text' => 'Online modules that fit your schedule.',
                    ],
                ],
            ],
            'why_right' => [
                'heading' => 'Why AC-BSCP is Essential for Your Career',
                'paragraphs' => [
                    'Blockchain technology is reshaping global supply chains by ensuring transparency, enhancing trust, and automating operations. By earning the AC-BSCP certification, you’ll be at the forefront of this digital transformation, equipped with skills that are in high demand.',
                ],
                'features_heading' => 'Key Benefits',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/digital.png'),
                        'title' => 'Build Expertise',
                        'text' => 'Master blockchain tools and concepts specific to supply chains.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/data-collection.png'),
                        'title' => 'Gain Recognition',
                        'text' => 'Earn a globally respected certification to showcase your expertise.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/analysis.png'),
                        'title' => 'Future-Proof Your Skills',
                        'text' => 'Stay ahead in the evolving landscape of supply chain management.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/communication-skills.png'),
                        'title' => 'Drive Change',
                        'text' => 'Lead blockchain adoption in your organization or industry.',
                    ],
                ],
            ],
            'how_to_start' => [
                'heading' => 'How to Get Started',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/digital.png'),
                        'title' => 'Register Now',
                        'text' => 'Sign up for the AC-BSCP program with our simple enrollment process.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/data-collection.png'),
                        'title' => 'Learn from Experts',
                        'text' => 'Access interactive modules and expert-led classes.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/analysis.png'),
                        'title' => 'Certify Your Skills',
                        'text' => 'Complete the certification exam and showcase your credentials.',
                    ],
                ],
            ],
            'closing' => [
                'heading' => 'Blockchain: The Future of Supply Chains is Here',
                'paragraph' => 'Blockchain technology is more than a buzzword—it’s the foundation of the next generation of secure, transparent, and efficient supply chains. Join the movement with the Blockchain for Supply Chain Professional Certification (AC-BSCP) and transform how supply chains operate.',
                'heading2' => 'Take the First Step Today!',
                'paragraph2' => 'Register Now and become a Blockchain for Supply Chain Professional. Build trust, security, and efficiency into every step of your supply chain.',
            ],
            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes', 'value' => 'Exam (AC-BSCP)®'],
                    ['label' => 'Exam Details', 'value' => 'The AC-BSCP certification exam evaluates your expertise in leveraging blockchain technology for secure, transparent, and efficient supply chain management through a rigorous, scenario-based assessment.'],
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
                'flyer_href' => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2026/02/AC-BSCP.pdf'),
            ],
            'training_options' => [
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'options' => [
                    [
                        'text' => 'Self-Paced Training, Exam Fees : Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=23955'),
                    ],
                    [
                        'text' => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-american-certified-blockchain-for-supply-chain-professional-ac-bscp/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'american-certified-blockchain-for-supply-chain-professional-ac-bscp'],
            [
                'title' => 'American Certified Blockchain for Supply Chain Professional (AC-BSCP)®',
                'content' => null,
                'excerpt' => 'Revolutionize Supply Chains with Blockchain Expertise!',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => 'American Certified Blockchain for Supply Chain Professional (AC-BSCP) - AAPSCM®',
                'meta_description' => 'American Certified Blockchain for Supply Chain Professional (AC-BSCP)® Revolutionize Supply Chains with Blockchain Expertise!',
                'show_in_nav' => false,
            ],
        );
    }
}
