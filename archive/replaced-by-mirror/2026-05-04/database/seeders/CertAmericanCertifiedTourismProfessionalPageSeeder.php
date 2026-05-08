<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertAmericanCertifiedTourismProfessionalPageSeeder extends Seeder
{
    public function run(): void
    {
        $check = UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png');

        $pageData = [
            'hero' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-56.png'),
                'heading' => 'Why Choose the ACTP® Certification?',
                'paragraphs' => [
                    'The American Certified Tourism Professional (ACTP®) certification is a premier credential designed to empower individuals aspiring to thrive in the dynamic Hospitality and Tourism Industry. It provides professionals with a comprehensive foundation in tourism management, blending essential theoretical knowledge with practical, industry-relevant skills. This certification is a recognized mark of distinction, showcasing your expertise and commitment to excellence in tourism management and positioning you as a credible, highly qualified professional in this competitive field.',
                ],
                'image_bottom' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-57.png'),
                'paragraph_bottom' => 'Earning the ACTP® certification sets you apart by validating your ability to navigate the complexities of the tourism industry and contribute effectively to its growth. Whether you’re just starting your career or seeking to enhance your credentials, the ACTP® certification equips you with the tools to stand out among peers and excel in future opportunities. By completing this certification, you signal to employers and industry leaders that you possess the practical expertise and strategic knowledge necessary to drive innovation, foster sustainability, and deliver exceptional value within the hospitality and tourism sectors.',
            ],
            'why_different' => [
                'heading' => 'WHY IS IT DIFFERENT?',
                'intro' => 'The American Certified Tourism Professional (ACTP®) certification stands out from other credentials because it combines foundational tourism knowledge with practical, real-world applications directly aligned with industry demands. This certification is not just about theory—it emphasizes actionable skills and insights professionals need to succeed in today’s dynamic and evolving Hospitality and Tourism Industry.',
                'intro2' => 'Here’s what makes it unique:',
                'items' => [
                    [
                        'icon' => $check,
                        'title' => 'Holistic Approach',
                        'text' => 'ACTP® goes beyond traditional tourism education by integrating critical topics such as sustainable tourism practices, economic development strategies, and community well-being. It addresses the environmental, social, and economic factors that shape the tourism landscape.',
                    ],
                    [
                        'icon' => $check,
                        'title' => 'Industry-Relevant Focus',
                        'text' => 'Developed in consultation with industry experts, the ACTP® certification aligns with current market trends, ensuring that you gain timely and practical knowledge and skills. The program emphasizes real-world applications, preparing you to make an immediate impact in your career.',
                    ],
                    [
                        'icon' => $check,
                        'title' => 'Pathway to Advanced Certifications',
                        'text' => 'Unlike many other certifications, ACTP® serves as a foundational stepping stone to the CTM® (Chartered Tourism Manager) certification, recognized as the gold standard for managerial excellence in the tourism field.',
                    ],
                    [
                        'icon' => $check,
                        'title' => 'Professional Recognition',
                        'text' => 'Employers recognize ACTP® as a credential that signifies a deep understanding of tourism management principles, a commitment to sustainability, and the ability to navigate industry challenges.',
                    ],
                    [
                        'icon' => $check,
                        'title' => 'Practical Skill Development',
                        'text' => 'With a focus on hands-on learning, the certification equips you to handle real-world scenarios such as promoting sustainable tourism, managing resources, and fostering economic growth through innovative tourism strategies.',
                    ],
                ],
                'closing' => 'By choosing ACTP® you are investing in a certification that not only validates your knowledge but also distinguishes you as a forward-thinking professional ready to address the complexities and opportunities of modern tourism management.',
            ],
            'about_exam' => [
                'heading' => 'About the ACTP® Certification Exam/Test',
                'paragraph' => 'The American Certified Tourism Professional (ACTP®) certification exam is designed to validate your foundational knowledge and practical expertise in Tourism Management, setting you apart as a skilled professional in the hospitality and tourism industry. The exam focuses on equipping candidates with the ability to address real-world challenges, create sustainable tourism solutions, and drive economic and community growth through innovative practices.',
                'format_heading' => 'Exam Format and Structure',
                'format_bullets' => [
                    '<b>Exam Type</b>: Multiple-choice questions with scenario-based case studies.',
                    '<b>Duration</b>: 2 hours.',
                    '<b>Passing Score</b>: 70% or higher.',
                    '<b>Delivery</b>:The exam is available online or at certified testing centers.',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-58.png'),
            ],
            'foundational_topics' => [
                'heading' => 'Foundational Topics Covered',
                'intro' => 'The ACTP® exam covers a wide range of foundational and applied topics to ensure candidates are well-rounded in their knowledge and skills.',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-59.png'),
                        'title' => 'Introduction to Tourism and Hospitality',
                        'bullets' => [
                            '<b>Exam Type</b>: Multiple-choice questions with scenario-based case studies.',
                            '<b>Duration</b>: 2 hours.',
                            '<b>Passing Score</b>: 70% or higher.',
                            '<b>Delivery</b>:The exam is available online or at certified testing centers.',
                        ],
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/2-14.png'),
                        'title' => 'Sustainable Tourism Practices',
                        'bullets' => [
                            'Principles of sustainability in tourism.',
                            'Developing eco-friendly travel experiences.',
                            'Balancing economic growth with environmental preservation.',
                        ],
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/3-11.png'),
                        'title' => 'Tourism Marketing and Promotion',
                        'bullets' => [
                            'Crafting effective tourism campaigns.',
                            'Digital marketing strategies for tourism businesses.',
                            'Understanding traveler behavior and preferences.',
                        ],
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/4-8.png'),
                        'title' => 'Tourism Economics and Policy',
                        'bullets' => [
                            'The role of tourism in economic development.',
                            'Understanding tourism policies and their implications.',
                            'Community engagement and participation in tourism planning.',
                        ],
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/5-7.png'),
                        'title' => 'Recreation and Leisure Management',
                        'bullets' => [
                            'Creating recreational opportunities to meet traveler needs.',
                            'Promoting activities that support physical, mental, and emotional well-being.',
                            'Managing cultural and heritage tourism experiences.',
                        ],
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/6-5.png'),
                        'title' => 'Tourism Operations Management',
                        'bullets' => [
                            'Fundamentals of managing tourism services and experiences.',
                            'Resource allocation and cost management in tourism.',
                            'Quality assurance and customer satisfaction.',
                        ],
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/7-4.png'),
                        'title' => 'Global Tourism Trends',
                        'bullets' => [
                            'Emerging trends in tourism, including technology and innovation.',
                            'Adapting to changing traveler demands and preferences.',
                            'Understanding the impact of global events on tourism.',
                        ],
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/7-4.png'),
                        'title' => 'Ethics and Legal Considerations in Tourism',
                        'bullets' => [
                            'Ethical tourism practices and their impact.',
                            'Legal frameworks guiding tourism operations.',
                            'Addressing challenges like over-tourism and cultural sensitivity.',
                        ],
                    ],
                ],
            ],
            'prep_resources' => [
                'heading' => 'Preparation and Study Resources',
                'intro' => 'To ensure success in the ACTP® certification exam, candidates are encouraged to:',
                'check_icon' => $check,
                'items' => [
                    'Review the ACTP® study guide/course materials, which includes detailed content on all foundational topics. – requires payment',
                    'Practice using sample questions and case studies to familiarize yourself with the exam format.',
                    'Participate in online prep courses or workshops offered by authorized training partners.',
                    'Engage with industry literature and reports to gain insights into real-world applications of tourism management concepts.',
                ],
            ],
            'why_take_exam' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/Untitled-2.jpg'),
                'heading' => 'Why Take the Exam?',
                'intro' => 'Earning the ACTP® certification validates your ability to:',
                'bullets' => [
                    'Apply tourism management principles effectively in a professional setting.',
                    'Understand and address the challenges and opportunities in today’s tourism landscape.',
                    'Contribute to the development of sustainable and impactful tourism experiences.',
                ],
                'closing' => 'By passing the ACTP® exam, you are taking a significant step toward advancing your career in the hospitality and tourism industry and positioning yourself as a leader ready to make a meaningful difference.',
            ],
            'certification_journey' => 'Start Your Certification Journey Today!Prepare for the ACTP® certification exam and take the first step toward becoming a recognized expert in tourism management. For more information on exam registration and preparation materials, visit [AAPSCM website link to purchase all the three]',
            'who_benefit' => [
                'eyebrow' => 'WHAT SKILLS WILL YOU LEARN?',
                'heading' => 'Who would benefit from ACTP® Certification?',
                'intro' => 'The American Certified Tourism Professional (ACTP®) certification is designed for individuals and professionals who aim to excel in the dynamic and fast-growing hospitality and tourism industry. Whether you are starting your career, seeking to advance in your current role, or looking to enhance your skills for leadership opportunities, the ACTP® certification equips you with the foundational knowledge and practical expertise needed to thrive.',
                'subheading' => 'Key Beneficiaries of ACTP® Certification',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/10464441-1.png'),
                        'title' => 'Aspiring Tourism Professionals',
                        'text' => 'If you are entering the tourism industry and want to establish a strong foundation, ACTP® is the perfect starting point. It provides essential knowledge and practical insights into tourism management, giving you the edge needed to compete in a highly competitive market.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/wholesale.png'),
                        'title' => 'Current Hospitality and Tourism Workers',
                        'text' => 'Professionals working in roles such as travel consultants, tour operators, event coordinators, and hospitality staff can benefit from ACTP® by enhancing their understanding of tourism management principles, sustainability practices, and customer-focused strategies.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/14106283.png'),
                        'title' => 'Managers and Supervisors',
                        'text' => 'If you are in a managerial role within the tourism or hospitality sector, ACTP® certification helps you build on your expertise, preparing you for more strategic responsibilities. It also serves as a prerequisite for the ACTM® (American Certified Tourism Manager) certification, which is essential for advanced leadership roles.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/6808956.png'),
                        'title' => 'Entrepreneurs and Business Owners',
                        'text' => 'Business owners and entrepreneurs in the tourism sector, including hotel operators, travel agencies, and recreational facility managers, can use the ACTP® certification to stay ahead of industry trends, adopt sustainable practices, and attract more customers with innovative tourism strategies.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/11813377.png'),
                        'title' => 'Government and Policy Makers',
                        'text' => 'For individuals involved in shaping tourism policies or overseeing tourism initiatives, ACTP® offers insights into how tourism impacts local economies and communities, enabling them to make informed, impactful decisions.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/9375697.png'),
                        'title' => 'Educators and Trainers',
                        'text' => 'Instructors teaching hospitality and tourism courses can benefit by aligning their knowledge with the latest industry standards, ensuring their students receive up-to-date and relevant education.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/15774686.png'),
                        'title' => 'Sustainability Advocates',
                        'text' => 'Professionals passionate about promoting eco-friendly and sustainable tourism practices can leverage ACTP® to drive meaningful change in the industry while fostering economic and community well-being.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/11204808.png'),
                        'title' => 'Career Changers',
                        'text' => 'Individuals from other industries looking to transition into tourism and hospitality will find ACTP® an excellent way to gain the essential knowledge and credentials to make a successful career shift.',
                    ],
                ],
            ],
            'why_right_for_you' => [
                'heading' => 'Why ACTP® Certification Is Right for You',
                'paragraphs' => [
                    'The ACTP® certification is ideal for anyone looking to make a meaningful impact in the tourism industry. It empowers professionals at every level with tools to enhance customer satisfaction, promote sustainable tourism practices, and contribute to the growth and innovation of the global tourism sector.',
                    'If you’re ready to unlock new opportunities and position yourself as a leader in this dynamic field, the ACTP® certification is your next step.',
                ],
            ],
            'why_benefit' => [
                'heading' => 'Why would you benefit from ACTP® Certification?',
                'intro' => 'The American Certified Tourism Professional (ACTP®) certification offers significant advantages for individuals pursuing careers in the hospitality and tourism industry. This sector is experiencing substantial growth, with the U.S. Bureau of Labor Statistics projecting the addition of 1.9 million jobs in leisure and hospitality from 2021 to 2031, accounting for 23.1% of all new jobs during that period.',
                'sources' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883853.png'),
                        'title' => 'Bureau of Labor Statistics',
                        'text' => 'Earning the ACTP® certification positions you to capitalize on this expanding job market by equipping you with essential skills and knowledge sought by employers. The certification covers key areas such as sustainable tourism practices, marketing strategies, and operations management, ensuring you are well-prepared to meet industry demands. Additionally, the global travel and tourism industry’s contribution to GDP is expected to reach $11.1 trillion in 2024, underscoring the sector’s economic significance and the opportunities available for certified professionals.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883854.png'),
                        'title' => 'Reuters',
                        'text' => 'By obtaining the ACTP® certification, you enhance your employability and demonstrate a commitment to excellence in a thriving industry, positioning yourself for a successful and rewarding career.',
                    ],
                ],
            ],
            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes', 'value' => 'Exam (ACTP)®'],
                    ['label' => 'Launch Date', 'value' => 'September 4, 2020'],
                    ['label' => 'Exam Details', 'value' => 'The American Certified Tourism Professional (ACTP®) exam focuses on the knowledge and skills required to identify and explain the basics of  Hospitality, tourism management and marketing, Destination marketing and management, Sustainable tourism, Tourism and environment, Tourism planning and regional development, Entrepreneurship in Tourism and Hospitality.'],
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
                'flyer_href' => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2026/02/ACTP.pdf'),
            ],
            'training_options' => [
                'check_icon' => $check,
                'options' => [
                    [
                        'text' => 'Self-Paced Training, Exam Fees: Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=5595'),
                    ],
                    [
                        'text' => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-american-certified-tourism-professional-actp/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'american-certified-tourism-professional'],
            [
                'title' => 'The American Certified Tourism Professional (ACTP)®',
                'content' => null,
                'excerpt' => 'The American Certified Tourism Professional (ACTP®) certification is a premier credential designed to empower individuals aspiring to thrive in the dynamic Hospitality and Tourism Industry.',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => 'The American Certified Tourism Professional (ACTP)® - AAPSCM®',
                'meta_description' => 'Why Choose the ACTP® Certification? The American Certified Tourism Professional (ACTP®) certification is a premier credential designed to empower individuals aspiring to thrive in the dynamic Hospitality and Tourism Industry. It provides professionals with a comprehensive foundation in tourism management, blending essential theoretical knowledge with practical, industry-relevant skills. This certification is a recognized mark of distinction, […]',
                'show_in_nav' => false,
            ],
        );
    }
}
