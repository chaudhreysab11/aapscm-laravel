<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/benefits-and-resources/ for WordPress
 * parity. Marketing page: hero + the 4 join paths, benefit bullets,
 * ISO compliance cards, corporate training solutions (Mission /
 * Instruction / Support), partner/affiliate logo walls, and a
 * testimonial carousel.
 */
class BenefitsAndResourcesPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'heading_html' => 'Your Supply Chain, Tourism, Healthcare Skills and Competencies <b>Partner</b>',
                'lead'         => 'AAPSCM® creates a wealth of content that not only follows Supply Chain, Tourism, Healthcare, and AI trends but helps shape the future as well. We are committed to defining and developing the future of Procurement (including Healthcare/Medical  Procurement) and Supply Chain (including Supply Chain AI), by supporting the work of professionals and managers through research, teaching, and education programs. Explore our knowledge to stay informed and stay ahead. Join and become a member today and be part of the voice in the field by networking for updates and browsing tools for professionals, managers, researchers',
                'image'        => '/storage/cms-images/2025/01/1-34.png',
            ],
            'join_paths' => [
                'heading' => 'Transform every part of your Organization',
                'items'   => [
                    [
                        'title' => 'Be Chartered',
                        'body'  => 'Take any of our tests and be a Certified Professional or Manager in Supply Chain Management. (AAPSCM)® certification is designed for career starters, professionals, and managers to differentiate their skills and demonstrate job readiness to employers.',
                    ],
                    [
                        'title' => 'Be a Professional Member',
                        'body'  => 'You do not need to take any of the exams or tests to become a Professional member. Just send us your CV and our evaluators will determine your eligibility. You also gain by having access to all our resources and can join any of our Chapters. Chapter members have access to our library and conference centers.',
                    ],
                    [
                        'title' => 'Become a student member',
                        'body'  => 'Most Universities/Colleges accept our certifications and grant credits for related programs. Help your students succeed as supply chain professionals by giving them the career tools, exam discounts, and networks to connect their ambitions to impact. Free faculty membership is included. (For degree-granting programs only.)',
                    ],
                    [
                        'title' => 'Become a Fellow',
                        'body'  => 'AAPSCM® Fellowship is home to the most influential professionals in the supply chain industry. Connect with the leaders who share your passion for procurement, supply chain, logistics, business and transformation expertise, business acumen, ethics, and social responsibilities. Send us your CV for evaluation and you will become part of the industry\'s standard voice',
                    ],
                ],
            ],
            'benefits' => [
                'heading_html' => 'Join forces with <b>AAPSCM® </b>',
                'items'        => [
                    'Raise your professional profile, and awareness of your role and position in the workplace',
                    'Enjoy letters after your name in recognition of your ability',
                    'Evidence your knowledge and skills against independent industry standards',
                    'Demonstrate your capability and integrity to employers, clients and colleagues',
                ],
            ],
            'skills_success' => [
                'heading_html' => 'Skills and Competencies for <b>Success</b>',
                'body'         => 'AAPSCM®\'s combination of industry expertise, training solutions and mission to unlock potential are unmatched. When you partner with us, you hold the key. Let us guide you on the most direct, efficient, and dependable path to the training outcomes you and your employees need. Our free train-the-trainer program puts your trainers at ease. Our simple testing program allows quick assimilation of our curriculum.',
            ],
            'keep_pace' => [
                'heading' => 'Keep pace with a changing Supply Chain Industry and transformation landscape',
                'body'    => 'Ensure your students, candidates, and trainers have the skills, competencies, and certifications required to keep pace with business needs and advance in their careers. Expand employee skill sets and improve their skills in supply chain transformation or digitalization with our professional and managerial course options. Help employees and students build their careers and enhance productivity by building adjacent skills in Healthcare or Medical Procurement, Supply Chain data analytics, and AI. Help Improve retention and morale as a certified and chartered professional.',
                'image'   => '/storage/cms-images/2025/01/1-6-1024x682.jpg',
            ],
            'compliance' => [
                'heading_html' => 'Ensure Compliance with Government <b>Directives</b>',
                'intro'        => 'Our certifications are updated regularly and aligned to ISO standards in Supply Chain Management. The International Organization for Standardization (ISO) has several standards that apply to supply chain management, including:',
                'cards'        => [
                    [
                        'title' => 'ISO 9001',
                        'body'  => 'Ensures that companies provide high-quality products and services by implementing a Quality Management System (QMS). It also helps address internal risk factors that affect the supply chain.',
                    ],
                    [
                        'title' => 'ISO 14001',
                        'body'  => 'A commonly adopted standard certification that applies to supply chain practices.',
                    ],
                    [
                        'title' => 'ISO 28000',
                        'body'  => 'Specifies requirements for a security management system, including aspects relevant to the supply chain. The 2022 version can be used throughout all aspects of the security of the organization.',
                    ],
                ],
                'other_heading' => 'Other ISO standards that apply to supply chain management include:',
                'other_items'   => [
                    'Governance, risk, and compliance',
                    'Privacy and data protection',
                    'Digital transformation',
                ],
                'other_note'    => 'ISO standards help logistics businesses manage their operations and resources to deliver orders efficiently.',
            ],
            'solutions' => [
                'heading_html' => 'Solutions Designed Around Your Training or Goals<b> Corporate </b>',
                'intro'        => 'Our solutions are not one-size-fits-all-all. We\'ll design a program based on your needs in three areas:',
                'cards'        => [
                    [
                        'icon'  => '/storage/cms-images/2025/01/mission-1.png',
                        'title' => 'Mission',
                        'body'  => 'Who are your learners and what are the outcomes you\'re seeking for them? For your organization?',
                    ],
                    [
                        'icon'  => '/storage/cms-images/2025/01/instructions.png',
                        'title' => 'Instruction',
                        'body'  => 'What do they need to learn? Where, when, and how should learning take place to achieve your mission?',
                    ],
                    [
                        'icon'  => '/storage/cms-images/2025/01/customer-service.png',
                        'title' => 'Support',
                        'body'  => 'What additional services would help you ensure the success of your training program?',
                    ],
                ],
            ],
            'two_col' => [
                [
                    'heading_html' => 'Investing in Employee Skills to Improve the Customer Experience at Thomson <b>Reuters</b>',
                    'body'         => 'Grow Your Own Supply Chain Talent – Upskill current staff who are ready and able to take on new roles in Supply Chain and Tourism Management. Skilling solutions for beginners without management backgrounds. Upskilling solutions to promote those in entry-level roles to mid-level roles at an accelerated pace. Screening services to help identify good candidates for training',
                ],
                [
                    'heading_html' => 'Why AAPSCM®, The American Association of Procurement, Supply Chain and Tourism Management <b>Professionals ?</b>',
                    'body'         => 'We are non-commercialized. Your performance in the supply chain and tourism industry places you at the very heart of our US charter. You\'re actively driving up standards of professional competence, conduct, and ethical practice in the industry, for the benefit of society. Our commitment to you, as an AAPSCM® member with professional registration, is to feed your enthusiasm, support your progression and celebrate your achievements. Licenses and regulations: As the regulatory body for Supply Chain standards, AAPSCM® licenses and regulates the professional Register for Procurement, Supply Chain and Tourism Professionals and Chartered Managers standard.',
                ],
            ],
            'skills_for_success' => [
                'heading' => 'Skills for Success',
                'body'    => 'We thrive on the diversity of our members. Demonstrate your competence as a trusted supply chain and tourism professional and commitment to the highest standards in your work. Be part of our membership and discover some of the incredible individuals who make up our community of members.',
            ],
            'partners' => [
                'heading_html' => 'Our<b> Partners </b>',
                'intro'        => 'Tech teams work with us in every sector',
                'cta'          => ['label' => 'Join Now', 'url' => '/chartered-supply-chain-professional-member/'],
                'logos'        => [
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
                    '/storage/cms-images/2025/01/1-30.png',
                ],
            ],
            'testimonials' => [
                'heading'     => 'Testimonial',
                'sub_heading' => 'What people say about partnering with AAPSCM®',
                'items'       => [
                    [
                        'quote' => 'I passed the ACPP at first attempt. My career started as a sales representative leader at Adecco Ltd. in California. I managed several staffing-related to services as well as some outsourcing projects. I was interested in gettting a certification in Procurement Management. A friend at the UMES recommended AAPSCM. I spoke with a representative who set me up and within a month I got certified. The certification helped me get the store manager position at my present Walmart store in San Francisco, CA. I highly recommend this certification to people who are interested in operations management.',
                        'name'  => 'Tiffany Clark',
                    ],
                    [
                        'quote' => 'I joined AAPSCM as a student member in my senior at Clemson University, SC with recommendation from my professor. I attended their inaugural conference in September virtually and took the exam that same month and passed. Since I joined the Spartanburg SC Charter, I have met many experts in Supply Chain from Africa and Bahamas and gained a lot from them. I have had opportunities to meet with many professionals who fell in love with Supply Chain management and had a great deal of experience. I recommend this certification to all who are interested.',
                        'name'  => 'Jean Kelly',
                    ],
                    [
                        'quote' => 'My name is Cedric K Burrows, and I am currently employed as a procurement manager at AT&T. I was made aware of AAPSCM® by my former colleague who was a professional member. After much speculation due to a situation from another professional body I previously tried to join and was unsuccessful, I decided to go in and speak with a representative. At first, the phone went to a voicemail, but they were fast with email responses. This was one of the best decisions I\'ve made, as I have been exposed to the latest technology in supply chain management, and hands-on training in their classes with Dr. Matyus was great. Ienrolled in the American Certified Data Analytics Managers (ACDSM)® program and as of March 26, 2023, became certified after passing the exam. I highly recommend the training offered at AAPSCM® to anyone looking to either begin a career or increase their knowledge of Data analytics in supply chain management, and I am telling of my friends about AAPSCM®. MCP Systems Engineer Electronic Data Systems.',
                        'name'  => 'Cedric K Burrows',
                    ],
                    [
                        'quote' => 'I was looking for a good certification in healthcare to augment my degree in Health Informatics and found the "Chartered Healthcare Procurement Solutions Professional (CHPP)®" appealing. After contacting the association, I decided to join as a Professional member. After two months, I converted and took the test. I passed on my first attempt, and this helped with my recent promotion at work. I would recommend you start with the Professional certification tests before the manager\'s certifications. That way, you could get accustomed to the questions. The test itself was not that bad and easy to pass.',
                        'name'  => '',
                    ],
                    [
                        'quote' => 'October 15, 2022, The skills I obtained from the American Certified Digital Marketing Experts (ACDME)® online class training AAPSCM® were phenomenal. The online training lasted five (5) days with a facilitator – Dr. Matyus. After three months off due to the COVID-19 pandemic infection, I was able to summon up the courage to take the test. It was that easy and I got my certification in January 2023. By passing the test, I also became a chartered member and the association helped in circulating my new résumé in early February. Thanks to the additional skill set gained from the training, I was able to get hired right away from my second interview with a government agency in the state of New Jersey. Thank you to all with AAPSCM® who helped make it possible… from the training to career counseling guidance to the instructors to the career placement to member services. Thank you',
                        'name'  => '',
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'benefits-and-resources'],
            [
                'title'            => 'Benefits and Resources',
                'content'          => null,
                'excerpt'          => 'Why partner with AAPSCM® — membership tracks, ISO-aligned certifications, corporate training solutions, and testimonials.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => 'Benefits and Resources | AAPSCM',
                'meta_description' => 'Partner with AAPSCM® for supply chain, tourism, healthcare and AI training — chartered memberships, ISO-aligned certifications, and tailored corporate programs.',
                'show_in_nav'      => true,
            ],
        );
    }
}
