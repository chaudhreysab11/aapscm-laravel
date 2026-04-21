<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertCharteredHealthcareProcurementSolutionsProfessionalChppPageSeeder extends Seeder
{
    public function run(): void
    {
        $check = UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png');

        $pageData = [
            'hero' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/healthcare-1002x1024.jpg'),
                'heading' => 'CHPP® Certification',
                'tagline' => 'Leading the Future of Healthcare Procurement with Expertise and Innovation!',
                'paragraphs' => [
                    'The CHPP® Certification serves as the foundational credential for analysts and professionals specializing in healthcare procurement. It equips individuals with the essential knowledge and skills to navigate the complexities of procurement and supply chain operations in medical and healthcare settings. This certification is designed to address critical challenges, including the need for stronger clinical engagement in procurement processes.',
                    'As value-based care models continue to gain momentum, health systems are prioritizing ghostwriter seminararbeit to drive efficiency and enhance value. A critical component of these efforts is fostering better masterarbeit engagement. However, many health systems face difficulties in effectively involving clinicians in ghostwriter diplomarbeit decisions due to factors such as seminararbeit ghostwriting.',
                ],
            ],
            'challenges' => [
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1.png'),
                        'title' => 'Limited Communication Channels',
                        'text' => 'Lack of structured frameworks to facilitate dialogue between clinicians and supply chain teams.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-115-1.png'),
                        'title' => 'Diverging Priorities',
                        'text' => 'Clinicians often prioritize patient outcomes, while procurement teams focus on cost-efficiency.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-116-1.png'),
                        'title' => 'Knowledge Gaps',
                        'text' => 'Lack of structured frameworks to facilitate dialogue between clinicians and supply chain teams.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-117.png'),
                        'title' => 'Resistance to Change',
                        'text' => 'Hesitation to adopt new procurement protocols or technologies that alter clinical workflows.',
                    ],
                ],
            ],
            'solutions' => [
                'intro' => 'The CHPP® Certification addresses these barriers by providing healthcare procurement professionals with the tools and insights to bridge the gap between supply chain operations and clinical priorities. This includes:',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/6-3.png'),
                        'title' => 'Training in Value-Based Procurement',
                        'text' => 'Aligning purchasing decisions with patient care outcomes.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/5-3.png'),
                        'title' => 'Fostering Collaboration',
                        'text' => 'Building partnerships between clinicians and supply chain teams to enhance decision-making.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/7-2.png'),
                        'title' => 'Leveraging Technology',
                        'text' => 'Utilizing advanced tools such as AI, data analytics, and e-procurement platforms to streamline processes.',
                    ],
                ],
                'closing' => 'By earning the CHPP® Certification, professionals are leaders in transforming healthcare supply chains, driving value, and fostering sustainable, patient-centered procurement practices. This certification is ideal for those looking to significantly impact the evolving landscape of healthcare procurement.',
            ],
            'importance' => [
                'heading' => 'Importance of Healthcare Procurement Solutions',
                'intro' => 'Healthcare procurement solutions are specialized strategies, tools, and technologies designed to streamline the healthcare sector’s purchasing and supply chain processes. These solutions focus on efficiently acquiring medical supplies, pharmaceuticals, equipment, and services while maintaining compliance with regulatory standards and optimizing costs.',
                'features_heading' => 'Key Features of Healthcare Procurement Solutions',
                'features' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-23.png'),
                        'title' => 'Vendor Management',
                        'bullets' => [
                            'Efficient tracking and evaluation of supplier performance to ensure reliability and quality',
                            'Integration with approved vendor lists for compliance and cost-effectiveness.',
                        ],
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/2-13.png'),
                        'title' => 'e-Procurement Platforms',
                        'bullets' => [
                            'Digital systems for sourcing, purchasing, and contract management.',
                            'Automating workflows to reduce manual errors and accelerate purchasing cycles.',
                        ],
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/3-9.png'),
                        'title' => 'Inventory and Demand Management',
                        'bullets' => [
                            'Real-time inventory tracking to prevent stockouts or overstocking.',
                            'Demand forecasting using AI to ensure optimal inventory levels.',
                        ],
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/4-7.png'),
                        'title' => 'Compliance and Risk Management',
                        'bullets' => [
                            'Ensuring adherence to healthcare regulations and standards (e.g., FDA, HIPAA).for sourcing, purchasing, and contract management.',
                            'Identifying and mitigating risks in procurement processes.',
                        ],
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/5-5.png'),
                        'title' => 'Cost Optimization',
                        'bullets' => [
                            'Centralized purchasing to leverage economies of scale',
                            'Identifying cost-saving opportunities through analytics and spend analysis.',
                        ],
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/6-4.png'),
                        'title' => 'Sustainability Initiatives',
                        'bullets' => [
                            'Procuring eco-friendly medical supplies and equipment.',
                            'Reducing waste through improved supply chain efficiency.',
                        ],
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/7-3.png'),
                        'title' => 'Data-Driven Decision Making',
                        'bullets' => [
                            'Advanced analytics to monitor spending, supplier performance, and procurement efficiency.',
                            'Leveraging AI and machine learning for predictive insights.',
                        ],
                    ],
                ],
            ],
            'benefits' => [
                'heading' => 'Benefits of Healthcare Procurement Solutions',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883853.png'),
                        'title' => 'Improved Efficiency',
                        'text' => 'Automation reduces delays and administrative burdens.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883854.png'),
                        'title' => 'Enhanced Quality',
                        'text' => 'Ensures timely delivery of high-quality medical products and services.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883855.png'),
                        'title' => 'Cost Savings',
                        'text' => 'Streamlined purchasing reduces unnecessary expenses.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883856.png'),
                        'title' => 'Compliance Assurance',
                        'text' => 'Ensures adherence to regulatory requirements.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883857.png'),
                        'title' => 'Supply Chain Resilience',
                        'text' => 'Mitigates risks of disruption through better planning and vendor diversification.',
                    ],
                ],
            ],
            'technologies' => [
                'heading' => 'Examples of Technologies in Healthcare Procurement:',
                'items' => [
                    [
                        'title' => 'AI-Driven Procurement Platforms',
                        'text' => 'Automating sourcing and forecasting demand.',
                    ],
                    [
                        'title' => 'Blockchain for Transparency',
                        'text' => 'Enhancing traceability and preventing counterfeit products.',
                    ],
                    [
                        'title' => 'IoT in Inventory Management',
                        'text' => 'Real-time monitoring of medical supplies and equipment.',
                    ],
                ],
                'closing' => 'Healthcare procurement solutions are essential for ensuring that healthcare providers can deliver high-quality patient care while maintaining operational efficiency and fiscal responsibility.',
            ],
            'why_go' => [
                'heading' => 'Why Go for CHPP® Certification?',
                'paragraphs' => [
                    'The Chartered Healthcare Procurement Solutions Professional (CHPP®) certification equips managers and experienced specialists in procurement and operational management with the advanced skills needed to excel in healthcare procurement. This certification bridges critical gaps in supply chain management by addressing challenges unique to healthcare systems, such as integrating clinical and procurement processes for optimal outcomes.',
                    'Many health systems struggle with inefficiencies due to the lack of centralized data, making it difficult to assess the relationship between supply costs and quality outcomes. CHPP® certification provides professionals with the tools to establish integrated data sets that include clinicians’ supply usage, vendor preferences, and participation in supply-related initiatives. It empowers procurement professionals to foster better clinician collaboration by translating procurement data into clinically meaningful terminology and demonstrating how clinician engagement directly benefits their work and outcomes.',
                    'Moreover, CHPP® certification prepares professionals to reduce over-reliance on supplier representatives by strengthening internal collaboration between clinicians and health system leadership. By creating a unified framework for communication and decision-making, CHPP® holders ensure that supply chain strategies align with both clinical priorities and cost-efficiency goals.',
                    'This certification is essential for those looking to lead transformative changes in healthcare procurement, delivering value-based care while optimizing resource allocation and patient outcomes.',
                ],
                'cta_label' => 'Buy Exam Now',
                'cta_href' => UrlRewriter::local('https://aapscm.org/course/chartered-healthcare-procurement-solutions-professional-chpp/'),
            ],
            'about_exam' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/Untitled-2-2.jpg'),
                'heading' => 'About the exam',
                'paragraphs' => [
                    'Decisions about clinical supplies must align closely with clinicians, who are integral to patient care delivery. Without proper collaboration, suboptimal outcomes can arise. Procurement teams may push supply standardization initiatives without clinical input, leading to resistance and strained relationships. Conversely, unchecked clinician autonomy in supply choices can result in inconsistent practices, inflated costs, and inefficiencies in care delivery.',
                    'The CHPP® Certification Exam evaluates candidates on critical topics in healthcare procurement to address these challenges and ensure a collaborative approach to decision-making. The topics covered include:',
                ],
            ],
            'exam_topics' => [
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/deal.png'),
                        'title' => 'Collaborative Procurement Processes',
                        'text' => 'Aligning procurement strategies with clinical priorities for improved care outcomes.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/medical-insurance.png'),
                        'title' => 'Healthcare Supply Standardization',
                        'text' => 'Balancing cost-efficiency with clinician preferences and patient needs.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/satisfaction.png'),
                        'title' => 'Value-Based Procurement',
                        'text' => 'Understanding procurement’s role in promoting value-based care and sustainable cost savings.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/analysis-1-1.png'),
                        'title' => 'Data Integration and Analytics',
                        'text' => 'Using centralized healthcare databases to correlate supply costs with quality outcomes.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/engagement.png'),
                        'title' => 'Clinician Engagement Strategies',
                        'text' => 'Developing effective communication and collaboration frameworks with clinical teams.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/compliant.png'),
                        'title' => 'Regulatory and Compliance Requirements in Healthcare Procurement',
                        'text' => 'Navigating healthcare-specific regulations and ensuring adherence to compliance standards.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/technology.png'),
                        'title' => 'Technology in Healthcare Procurement',
                        'text' => 'Leveraging e-procurement platforms, AI, and predictive analytics to optimize supply chain efficiency.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/risk-management-1.png'),
                        'title' => 'Risk Management in Healthcare Supply Chains',
                        'text' => 'Identifying and mitigating risks related to supply disruptions and shortages.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/warehouse.png'),
                        'title' => 'Healthcare Inventory and Vendor Management',
                        'text' => 'Managing healthcare-specific inventory needs and fostering reliable supplier relationships.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/dictionary.png'),
                        'title' => 'Terminology and Categorization in Procurement Data',
                        'text' => 'Understanding and applying clinically meaningful procurement terminology for decision-making.',
                    ],
                ],
                'closing' => 'By focusing on these topics, the CHPP® certification ensures that candidates are equipped to bridge the gap between procurement and clinical teams, fostering a collaborative environment where supply chain decisions align with cost-efficiency and high-quality patient care. This certification positions healthcare procurement professionals as leaders in driving transformative change and value in their organizations.',
            ],
            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes', 'value' => 'Exam CHPP®  AC-US06'],
                    ['label' => 'Launch Date', 'value' => 'September 4, 2018September 28, 2020'],
                    ['label' => 'Exam Details', 'value' => 'The Chartered Healthcare Procurement Solutions Professional (CHPP)® exam will focus on advanced procurement strategies within the healthcare sector, emphasizing regulatory compliance, strategic sourcing, contract management, cost efficiency, supply chain optimization, risk mitigation, and fostering innovation to meet the unique demands of healthcare procurement and patient care delivery.'],
                    ['label' => 'Number of Questions', 'value' => 'Maximum of 100 questions per exam'],
                    ['label' => 'Type of Questions', 'value' => 'Multiple choice'],
                    ['label' => 'Length of Test', 'value' => '120 Minutes'],
                    ['label' => 'Passing Score', 'value' => '600 (on a scale of 1000)'],
                    ['label' => 'Recommended Experience', 'value' => 'No prior experience necessary'],
                    ['label' => 'Languages', 'value' => 'English'],
                    ['label' => 'Retirement', 'value' => 'None'],
                    ['label' => 'Testing Provider', 'value' => 'Affiliate Partner Testing CentersOnline Testing'],
                    ['label' => 'Price', 'value' => '$499.00 USD'],
                ],
            ],
            'training_options' => [
                'check_icon' => $check,
                'options' => [
                    [
                        'text' => 'Self-Paced Training, Exam Fees: Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=11905'),
                    ],
                    [
                        'text' => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-chartered-healthcare-procurement-solutions-professional-chpp/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'chartered-healthcare-procurement-solutions-professional-chpp'],
            [
                'title' => 'Chartered Healthcare Procurement Solutions Professional (CHPP)®',
                'content' => null,
                'excerpt' => 'Leading the Future of Healthcare Procurement with Expertise and Innovation!',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => 'Chartered Healthcare Procurement Solutions Professional (CHPP)® - AAPSCM®',
                'meta_description' => 'The CHPP® Certification is the foundation level for analysts or Professionals in medical.',
                'show_in_nav' => false,
            ],
        );
    }
}
