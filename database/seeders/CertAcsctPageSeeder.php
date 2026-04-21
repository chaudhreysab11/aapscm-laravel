<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertAcsctPageSeeder extends Seeder
{
    public function run(): void
    {
        $check = UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png');

        $pageData = [
            'hero' => [
                'heading' => 'Chartered Supply Chain Technology Manager (CSCT)®',
                'tagline' => 'Empowering Innovation and Technology-Driven Excellence in Supply Chain Management!',
                'paragraphs' => [
                    'The Chartered Supply Chain Technology Manager (CSCT)® certification is a globally recognized credential that distinguishes professionals and manager in the procurement and supply chain industries. It is designed for individuals who aim to excel in implementing the Digital Supply Chain Framework and driving digital transformation within their organizations. Unlike other certifications, CSCT® focuses on integrating advanced technologies, analytics, and strategic methodologies to address modern supply chain challenges and opportunities.',
                    'CSCT® holders possess expertise in leveraging analytics to supercharge supply chain initiatives, streamline operations, and solve complex problems, including risk management and real-time decision-making. They are trained to implement AI-driven solutions, blockchain technologies, IoT integration, and predictive analytics, ensuring efficient and agile supply chain operations. This certification also emphasizes the importance of sustainability, teaching professionals how to design eco-friendly and resilient supply chains.',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Untitled-1-3.png'),
            ],
            'charters' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/2-5.png'),
                'paragraphs' => [
                    'By earning the CSCT® certification, you gain global recognition as a leader with mastery over the intricate interactions between strategy, technology, processes, and organizational design. You’ll also be eligible to join one of our prestigious charters, including the Columbia, SC Charter®, Dallas, Texas Charter®, New York, NY Charter®, Spartanburg, SC Charter®, and New Jersey, NJ Charter®. These charters provide a platform for networking, leadership opportunities, and continuous learning with like-minded professionals.',
                    'The CSCT® certification validates your ability to drive innovation and excellence and positions you as an indispensable asset in an era of digital transformation reshaping the global supply chain landscape. Whether you aim to enhance your career prospects, lead digital initiatives, or contribute to building future-ready supply chains, CSCT® ensures you have the knowledge and skills to succeed.',
                ],
            ],
            'why_go' => [
                'heading' => 'Why go for CSCT® Certification?',
                'paragraphs' => [
                    'The Chartered Supply Chain Technology Manager (CSCT)® certification is the premier professional and managerial credential for recognizing expertise in emerging and advanced supply chain technologies. This certification validates your ability to integrate cutting-edge tools and strategies, ensuring that you can drive digital transformation within your organization. As technology continues to be a key source of competitive advantage, the CSCT® certification prepares you to leverage emerging innovations to enhance efficiency, improve decision-making, and optimize supply chain operations.',
                    'Today, Supply chain leaders focus on technologies that streamline traditional processes, empower human decision-making, and manage critical assets at the edge. The CSCT® certification equips you with the skills to unify an organization’s technology portfolio, modernize legacy systems, and implement solutions that align with strategic objectives. With this credential, you can bridge the gap between operational needs and technological advancements, positioning yourself as a forward-thinking leader in a rapidly evolving field.',
                    'By earning the CSCT® certification, you solidify your role as a change agent in supply chain technology, ensuring that you are prepared to lead in a world where innovation and digital transformation are paramount. Whether you aim to advance your career, modernize supply chain operations, or contribute to sustainable business practices, CSCT® provides the expertise and recognition to achieve your goals.',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/3-4.png'),
            ],
            'core_responsibilities' => [
                'heading_top' => 'Chartered Supply Chain Technology Manager',
                'intro' => 'A Chartered Supply Chain Technology Manager(CSCT)® is a key professional responsible for overseeing and optimizing technology integration within supply chain operations. This role involves leveraging advanced tools, systems, and methodologies to enhance efficiency, accuracy, and collaboration across the supply chain network.A recent Gartner survey highlighted that 61% of organizations identify technology as a competitive advantage, with 20% actively investing in robotics and other transformative solutions. The CSCT® certification evaluates candidates on their understanding and application of technologies making the biggest impact on supply chains today, including:',
                'heading' => 'Core Responsibilities',
                'items' => [
                    [
                        'number' => '01',
                        'title' => 'Technology Implementation',
                        'text' => 'Deploy and manage supply chain technologies such as enterprise resource planning (ERP) systems, warehouse management systems (WMS), and transportation management systems (TMS).',
                    ],
                    [
                        'number' => '02',
                        'title' => 'Data Integration and Analytics',
                        'text' => 'Utilize data analytics tools and platforms to monitor performance, forecast demand, and identify areas for improvement.',
                    ],
                    [
                        'number' => '03',
                        'title' => 'AI and Automation',
                        'text' => 'Implement AI-driven solutions like predictive analytics, robotic process automation (RPA), and IoT devices to streamline processes and improve decision-making.',
                    ],
                    [
                        'number' => '04',
                        'title' => 'Collaboration with Teams',
                        'text' => 'Coordinate with procurement, logistics, and operations teams to ensure seamless technology adoption and process alignment.',
                    ],
                    [
                        'number' => '05',
                        'title' => 'Risk Management',
                        'text' => 'Monitor and mitigate risks related to technology disruptions, data breaches, and system failures.',
                    ],
                    [
                        'number' => '06',
                        'title' => 'Training and Support',
                        'text' => 'Provide technical support and training for supply chain teams to maximize technology usage and efficiency.',
                    ],
                ],
            ],
            'about_exam' => [
                'heading' => 'About the exam',
                'intro' => 'The Chartered Supply Chain Technologist (CSCT®) certification provides a comprehensive assessment of skills and knowledge in advanced technologies driving modern supply chain management. This certification focuses on equipping professionals with expertise in leveraging technology to enhance supply chain visibility, efficiency, and accuracy, offering organizations a strategic competitive advantage. As technology adoption accelerates globally, CSCT® ensures you stay ahead by mastering critical innovations that are reshaping supply chains.A recent Gartner survey highlighted that 61% of organizations identify technology as a competitive advantage, with 20% actively investing in robotics and other transformative solutions. The CSCT® certification evaluates candidates on their understanding and application of technologies making the biggest impact on supply chains today, including:',
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-12.png'),
                'list_heading' => 'About the exam',
                'bullets' => [
                    'Internet of Things',
                    'Artificial Intelligence & Machine Learning',
                    'Advanced and predictive analytics',
                    'Digital supply chain twins',
                    'Robotics, driverless vehicles and drones',
                    '3D printing',
                    'Blockchain',
                    'Weighing and Shipping Technologies',
                ],
                'closing' => 'The CSCT® certification is tailored for professionals ready to lead in the rapidly evolving supply chain landscape by integrating cutting-edge technologies and methodologies. By obtaining this credential, candidates demonstrate their ability to drive innovation, improve operational efficiency, and deliver sustainable value to their organizations.',
                'topics_heading' => 'Topics evaluated in  CSCT®',
                'topics' => [
                    'Data Collection, Cost Estimation',
                    'Supply chain analytics',
                    'Industrial Organization',
                    'Foundations Of Organizational Leadership',
                    'Cloud Technology and Their Applications',
                    'Introduction To Supply Chain Management Technology',
                    'Industrial Supply Chain Management',
                    'Technology Innovation and Integration: Bar Codes To Biometrics',
                    'IT project management – Agile Methodologies',
                    'Innovative Product Development And Testing',
                    'Introduction To Statistical Quality',
                ],
            ],
            'who_benefit' => [
                'heading' => 'Who Would Benefit from CSCT® Certification?',
                'intro' => 'The Chartered Supply Chain Technology Manager (CSCT)® certification is ideal for a broad range of professionals seeking to enhance their expertise in supply chain technologies and innovation. This certification is particularly beneficial for:',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Mask-group-1-1.png'),
                        'title' => 'Supply Chain Manager and Leaders',
                        'text' => 'Professionals responsible for overseeing supply chain operations and implementing technology-driven strategies to optimize processes and improve efficiency.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Mask-group-2.png'),
                        'title' => 'Procurement and Logistics Professionals',
                        'text' => 'Individuals focused on sourcing, supplier management, transportation, and logistics who want to integrate advanced technologies such as IoT, AI, and predictive analytics into their operations. .',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Mask-group-3.png'),
                        'title' => 'IT and Technology Specialists in Supply Chains',
                        'text' => 'Experts managing supply chain technology platforms, including cloud-based systems, robotics, and digital twins, looking to deepen their understanding of supply chain-specific solutions.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Mask-group-4.png'),
                        'title' => 'Business Leaders and Entrepreneurs',
                        'text' => 'Executives and business owners aiming to transform their supply chain operations with innovative tools and strategies for improved competitiveness.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/1.png'),
                        'title' => 'Graduate Students and Academics',
                        'text' => 'Individuals pursuing advanced studies or research in supply chain technology and innovation who want a recognized credential to validate their knowledge. .',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/1.png'),
                        'title' => 'Operations and Process Analysts',
                        'text' => 'Analysts involved in identifying and implementing improvements in supply chain processes, leveraging data analytics and machine learning models.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/1.png'),
                        'title' => 'Manufacturing and Distribution Professionals',
                        'text' => 'Professionals managing production and distribution who aim to integrate automation and other emerging technologies to enhance scalability and resilience.',
                    ],
                ],
            ],
            'why_you_benefit' => [
                'heading' => 'Why Would You Benefit from CSCT® Certification?',
                'paragraphs' => [
                    'The Chartered Supply Chain Technology Manager (CSCT)® certification equips professionals with the advanced skills and knowledge needed to thrive in a rapidly evolving supply chain landscape. As emerging technologies like Artificial Intelligence (AI), the Internet of Things (IoT), and predictive analytics redefine supply chain operations, the CSCT® certification positions you to lead innovation and drive efficiency.',
                    'With supply chain technologies becoming a major source of competitive advantage, CSCT® certification ensures you can integrate these tools to optimize processes, enhance decision-making, and mitigate risks. This credential not only demonstrates your expertise in advanced supply chain technologies but also validates your ability to address real-world challenges, from improving operational resilience to enabling sustainability.',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/Untitled-1.jpg'),
            ],
            'market_share' => [
                'heading' => 'Market Share and Size',
                'paragraphs' => [
                    'The Chartered Supply Chain Technology Manager (CSCT)® certification equips professionals with the expertise to navigate and lead in the rapidly expanding supply chain technology sector. In 2023, the global supply chain management market was valued at approximately USD 23.58 billion and is projected to grow to USD 63.77 billion by 2032, exhibiting a compound annual growth rate (CAGR) of 11.7% during the forecast period.',
                    'Fortune Business Insights',
                    'Artificial Intelligence (AI) is a significant contributor to this growth. The AI in supply chain market was estimated at USD 5.05 billion in 2023 and is expected to grow at a CAGR of 38.9% from 2024 to 2030.',
                ],
            ],
            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes', 'value' => 'Exam (CSCT)®'],
                    ['label' => 'Launch Date', 'value' => 'August 2022November 2022'],
                    ['label' => 'Exam Details', 'value' => 'The new Chartered Supply Chain Technology Manager (CSCT)®certification test focuses on knowledge and skills that would equip professionals with expertise in leveraging advanced technologies, such as AI, IoT, and predictive analytics, to optimize supply chain operations and drive digital transformation.'],
                    ['label' => 'Number of Questions', 'value' => 'Maximum of 100 questions per exam'],
                    ['label' => 'Type of Questions', 'value' => 'Multiple choice'],
                    ['label' => 'Length of Test', 'value' => '120 Minutes'],
                    ['label' => 'Passing Score', 'value' => '600 (on a scale of 1000)'],
                    ['label' => 'Recommended Experience', 'value' => 'No prior experience necessary'],
                    ['label' => 'Languages', 'value' => 'English'],
                    ['label' => 'Retirement', 'value' => 'None'],
                    ['label' => 'Testing Provider', 'value' => 'Affiliate Partner Testing CentersOnline Testing'],
                    ['label' => 'Price', 'value' => '$399.99 USD'],
                ],
                'flyer_label' => 'Download Flyer',
                'flyer_href' => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2026/02/CSCT.pdf'),
            ],
            'training_options' => [
                'check_icon' => $check,
                'options' => [
                    [
                        'text' => 'Self-Paced Training, Exam Fees : Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=7774'),
                    ],
                    [
                        'text' => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-chartered-supply-chain-technology-managers-csct/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'acsct'],
            [
                'title' => 'Chartered Supply Chain Technology Manager (CSCT)®',
                'content' => null,
                'excerpt' => 'Empowering Innovation and Technology-Driven Excellence in Supply Chain Management!',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => 'Chartered Supply Chain Technology Manager (CSCT)® - AAPSCM®',
                'meta_description' => 'Chartered Supply Chain Technology Manager (CSCT)® Empowering Innovation and Technology-Driven Excellence in Supply Chain Management! The Chartered Supply Chain Technology Manager (CSCT)® certification is a globally recognized credential that distinguishes professionals and manager in the procurement and supply chain industries. It is designed for individuals who aim to excel in implementing the Digital Supply Chain Framework […]',
                'show_in_nav' => false,
            ],
        );
    }
}
