<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class ProfessionalMembershipPageSeeder extends Seeder
{
    public function run(): void
    {
        $img = '/storage/cms-images';

        $pageData = [
            'intro' => [
                'image'   => null,
                'heading_html' => 'Professional <span style="font-weight:600">Membership Benefits</span>',
                'subheading_1' => 'You do not need to take any of the certification exams. If you’re a skilled, ethical Supply Chain, Procurement, Logistics, or Tourism professionals looking to raise your profile and your career potential, then you’re in the right place.',
                'subheading_2_html' => ' Join <b>AAPSCM® </b>as a Professional member and be part of the driving force behind today’s global Supply chain or tourism industry. Once you join our professional association <b>AAPSCM®</b>, you are instantly connected with like-minded professionals on the local and sometimes even global level. You will have access to thought leaders in your industry and potential hiring managers for your next career move.',
            ],

            'highlights' => [
                [
                    'icon_image' => null,
                    'title' => 'Professional Membership is Suitable for',
                    'description_html' => 'Anyone working in the Supply Chain, Procurement, Logistics, Artificial Intelligence, and Tourism Management',
                ],
                [
                    'icon_image' => null,
                    'title' => 'Criteria',
                    'description_html' => 'You do not need to sit for any examinations, Just send in your CV for evaluation and pay the yearly dues<br><a href="/professional-member-criteria/" style="color:#000;font-size:13px;font-weight:600">Approved Certification</a>',
                ],
                [
                    'icon_image' => null,
                    'title' => 'Cost',
                    'description_html' => '$150 per year plus $10 <br>application fee',
                ],
            ],

            'how_to_become' => [
                'image' => null,
                'heading_html' => 'How to Become a Professional  <span style="font-weight:600">Member</span>',
                'steps' => [
                    [
                        'icon_image' => null,
                        'title' => 'Online application',
                        'description' => 'Create an AAPSCM® account and complete the short online form. Once completed, you will receive a notification of acknowledgment.',
                    ],
                    [
                        'icon_image' => null,
                        'title' => 'Evidence',
                        'description' => 'Make sure your CV or LinkedIn profile is up to date and ready to submit – you’ll need to show you’re working in the supply chain, procurement, logistics, AI, or tourism fields or have a relevant qualification.',
                    ],
                ],
                'button_text' => 'Join Now',
                'button_url'  => '/checkout/?add-to-cart=4234',
            ],

            'why_become' => [
                'image' => $img.'/2025/01/slider-img.png',
                'heading_html' => 'Why become a <span style="font-weight:600">professional member</span>',
                'text_html' => "Supply chain professionals play a pivotal role in orchestrating the intricate web of activities involved in the movement of goods and services from suppliers to customers. They oversee the entire supply chain, from procurement and production to distribution and customer satisfaction. Supply chain professionals collaborate with suppliers, manufacturers, distributors, and retailers to optimize processes, streamline operations, and ensure timely delivery. They analyze data, forecast demand, and develop strategies to minimize costs, enhance efficiency, and mitigate risks. <br>,<br>\nBy becoming an AAPSCM® Professional member, you are instantly connected with like-minded professionals on the local and sometimes even global level. You will have access to thought leaders in your industry and potential hiring managers for your next career move. Within the field of logistics, professionals can pursue a specialization in such sub-sectors as wholesaling, warehousing, and postal services. Places of employment also can vary from big corporations, small businesses, not-for-profit organizations, or local or federal government entities.",
            ],

            'recognition' => [
                'eyebrow' => 'Professional Recognition',
                'heading_html' => 'Show your worth with  <span style="font-weight:600">AAPSCM® </span>Membership',
                'text' => 'Although steady employment and high pay entice many individuals to find careers in supply chain management, most choose to remain in the field because they find their work rewarding and impactful. Logistics, supply chain, and procurement are rapidly expanding fields that experienced growth even in the height of the recession. Now, the field is even more promising, with the Bureau of Labor Statistics predicting a 28 percent job growth between 2021 and 2031. Meeting the AAPSCM® gold standard involves an assessment of your approach to your work and responsibilities, as well as your breadth of supply chain, procurement, logistics, or tourism knowledge and skills.',
            ],

            'certification_process' => [
                'heading' => 'AAPSCM® Certification Process',
                'steps' => [
                    [
                        'number' => '01',
                        'title' => 'Fulfill Eligibility Criteria',
                        'text' => 'All AAPSCM® certifications require you to meet domain experience levels, educational levels or both before you apply.',
                        'button_text' => 'Read More',
                        'button_url' => '/fulfill-eligibility-criteria/',
                    ],
                    [
                        'number' => '02',
                        'title' => 'Application Review',
                        'text' => 'Once we receive your application, we’ll verify that you meet the eligibility criteria',
                        'button_text' => 'Read More',
                        'button_url' => '/application-review/',
                    ],
                    [
                        'number' => '03',
                        'title' => 'Payment',
                        'text' => 'After we notify you that your application is approved, it’s time to provide payment so you can move to the final stage.',
                        'button_text' => 'Read More',
                        'button_url' => '/payment/',
                    ],
                    [
                        'number' => '04',
                        'title' => 'Complete Application',
                        'text' => 'Once you’ve determined you meet the eligibility criteria, it’s time to apply.',
                        'button_text' => 'Read More',
                        'button_url' => '/complete-application/',
                    ],
                    [
                        'number' => '05',
                        'title' => 'Schedule Exam Appointment',
                        'text' => 'Once you’ve determined you meet the eligibility criteria, it’s time to apply. Collect the following information and then use our online certification …',
                        'button_text' => 'Read More',
                        'button_url' => '/schedule-exam-appointment/',
                    ],
                ],
            ],

            'network' => [
                'image' => null,
                'heading_html' => 'Join the professional <span style="font-weight:600">network</span>',
                'text_html' => "The AAPSCM® membership Charter/Community – is global and inclusive, experienced and knowledgeable. A friendly and professional network where you can collaborate, innovate, share knowledge and thinking, and receive guidance and support, independently of your organization.\n<br>\nConnect with like minds in similar roles within your region or come directly to our ‘Library and Conference Center’ to throw around ideas and tackle challenges affecting your sector. Or connect with people outside of your discipline to address the wider issues in the Supply Chain Industry.\n<br><br>\nWherever you are, whatever your area of interest, you’ll be able to make valuable connections and learn something new from your charter/community.",
            ],

            'save_money' => [
                'image' => null,
                'heading_html' => 'Save yourself some money as we are not <span style="font-weight:600">commercialized</span>',
                'text' => "Everyone loves saving and there are plenty to love as an AAPSCM® member. Our exclusive deals and discounts can lend you a hand at every step of your career journey with our online training.\nWe started in the US and are now expanding to Asia, the UK, the EU, the Middle East, and the Caribbean. Develop your skills with reduced fees at selected training affiliate partners across the world and the US, plus receive 25% off our entire online training to support your learning when you become our student member. Then stock up on the latest brochures and course materials directly from AAPSCM® that can be found in the member services area of our website.",
            ],

            'feature_boxes' => [
                [
                    'icon' => 'globe',
                    'title' => 'Going Global',
                    'text' => 'Our network reaches around the world with affiliate partners in Europe, North America, the Caribbean, Asia, the Middle East, Saudi Arabia, and Africa providing hubs for professional development and debate.',
                ],
                [
                    'icon' => 'bell',
                    'title' => 'Be part of our Charity Events & Volunteer',
                    'text' => 'Be part of our Charity Events & Volunteer',
                ],
            ],

            'specialized_certs' => [
                'title' => 'New Specialized Certifications',
                'items' => [
                    ['title' => '1.	American Certiﬁed Supply Chain Analyst (ACSCA)®', 'url' => '/acsca/'],
                    ['title' => '2.	Chartered Supply Chain Technology Manager (CSCT)®', 'url' => '/acsct/'],
                    ['title' => '7.	Chartered Supply Chain Artiﬁcial Intelligence Analyst (CSAI)®', 'url' => '/the-american-certified-supply-chain-artificial-intelligence-analyst-acsai/'],
                    ['title' => '8.Chartered Healthcare Procurement Solutions Manager (CHPM) ®', 'url' => '/chartered-healthcare-procurement-solutions-manager-chpm/'],
                    ['title' => '9. Chartered Healthcare Procurement Solutions Professional (CHPP)®', 'url' => '/chartered-healthcare-procurement-solutions-professional-chpp/'],
                ],
            ],

            'six_chapters' => [
                'title' => 'Six Chapter',
                'description' => 'We are Chartered in the US for combined professional areas of Procurement, Supply Chain, and Tourism Management with the following Charters:-',
                'items' => [
                    ['title' => '1. Columbia, SC Chapter',     'url' => '/us-charters/#sc-chapter'],
                    ['title' => '2. Spartanburg, SC Chapter',  'url' => '/us-charters/#Chapters'],
                    ['title' => '3. Dallas, TX Chapter',       'url' => '/us-charters/#TX-Chapters'],
                    ['title' => '4. New York, NY Chapter',     'url' => '/us-charters/#NY-Chapters'],
                    ['title' => '5. Rockford, IL Chapter',     'url' => '/us-charters/#IL-Chapters'],
                    ['title' => '6. Boston, MA Chapter',       'url' => '/us-charters/#MA-Chapters'],
                ],
            ],

            'going_global_box' => [
                'title' => 'Going Global',
                'text_html' => 'Our network reaches around the world with affiliate partners in Europe, North America, the Caribbean, Asia,the Middle East, Saudi Arabia, and Africa providing hubs for professional development and debate.<br><br>',
            ],

            'charity_box' => [
                'title' => 'Be part of our Charity Events & Volunteer',
                'text' => 'Be part of our Charity Events & Volunteer',
            ],

            'testimonial_heading' => [
                'eyebrow' => 'Testimonial',
                'heading' => 'What our members say',
            ],

            'testimonials' => [
                [
                    'text' => 'I passed the ACPP at first attempt. My career started as a sales representative leader at Adecco Ltd. in California. I managed several staffing-related to services as well as some outsourcing projects. I was interested in gettting a certification in Procurement Management. A friend at the UMES recommended AAPSCM. I spoke with a representative who set me up and within a month I got certified. The certification helped me get the store manager position at my present Walmart store in San Francisco, CA. I highly recommend this certification to people who are interested in operations management.',
                    'name' => 'Tiffany Clark',
                ],
                [
                    'text' => "I was looking for a good certification in healthcare to augment my degree in Health Informatics and found the “Chartered Healthcare Procurement Solutions Professional (CHPP)®” appealing. After contacting the association, I decided to join as a Professional member. After two months, I converted and took the test. I passed on my first attempt, and this helped with my recent promotion at work. I would recommend you start with the Professional certification tests before the manager's certifications. That way, you could get accustomed to the questions. The test itself was not that bad and easy to pass.",
                    'name' => '',
                ],
                [
                    'text' => 'I joined AAPSCM as a student member in my senior at Clemson University, SC with recommendation from my professor. I attended their inaugural conference in September virtually and took the exam that same month and passed. Since I joined the Spartanburg SC Charter, I have met many experts in Supply Chain from Africa and Bahamas and gained a lot from them. I have had opportunities to meet with many professionals who fell in love with Supply Chain management and had a great deal of experience. I recommend this certification to all who are interested.',
                    'name' => 'Jean Kelly',
                ],
                [
                    'text' => 'October 15, 2022,The skills I obtained from the American Certified Digital Marketing Experts (ACDME)® online class training AAPSCM® were phenomenal. The online training lasted five (5) days with a facilitator – Dr. Matyus. After three months off due to the COVID-19 pandemic infection, I was able to summon up the courage to take the test. It was that easy and I got my certification in January 2023. By passing the test, I also became a chartered member and the association helped in circulating my new résumé in early February. Thanks to the additional skill set gained from the training, I was able to get hired right away from my second interview with a government agency in the state of New Jersey. Thank you to all with AAPSCM® who helped make it possible… from the training to career counseling guidance to the instructors to the career placement to member services. Thank you',
                    'name' => '',
                ],
                [
                    'text' => 'My name is Cedric K Burrows, and I am currently employed as a procurement manager at AT&T.  I was made aware of AAPSCM® by my former colleague who was a professional member. After much speculation due to a situation from another professional body I previously tried to join and was unsuccessful, I decided to go in and speak with a representative. At first, the phone went to a voicemail, but they were fast with email responses. This was one of the best decisions I’ve made, as I have been exposed to the latest technology in supply chain management, and hands-on training in their classes with Dr. Matyus was great. Ienrolled in the American Certified Data Analytics Managers (ACDSM)® program and as of March 26, 2023, became certified after passing the exam. I highly recommend the training offered at AAPSCM® to anyone looking to either begin a career or increase their knowledge of Data analytics in supply chain management, and I am telling of my friends about AAPSCM®. MCP Systems Engineer Electronic Data Systems.',
                    'name' => 'Cedric K Burrows',
                ],
            ],

            'companies_carousel' => [
                'heading' => 'Companies Hiring Our Members',
                'images' => [
                    $img.'/2023/10/1-9-150x150.png',
                    $img.'/2023/10/2-6-150x150.png',
                    $img.'/2023/10/3-6-150x150.png',
                    $img.'/2023/10/4-6-150x150.png',
                    $img.'/2023/10/5-6-150x150.png',
                    $img.'/2023/10/6-6-150x150.png',
                    $img.'/2023/10/7-5-150x150.png',
                    $img.'/2023/10/8-4-150x150.png',
                    $img.'/2023/10/9-4-150x150.png',
                    $img.'/2023/10/10-3-150x150.png',
                    $img.'/2023/10/11-4-150x150.png',
                    $img.'/2023/10/12-4-150x150.png',
                ],
            ],

            'become_member_cta' => [
                'image' => $img.'/2023/10/Untitled-1-Recovered.jpg',
                'heading' => 'Become a Member today',
                'button_text' => 'Join Today',
                'button_url'  => '/checkout/?add-to-cart=4234',
                'form_heading' => 'Sign Up',
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'professional-membership'],
            [
                'title'            => 'Professional Membership',
                'template'         => '',
                'status'           => 'published',
                'is_published'     => true,
                'content'          => '',
                'excerpt'          => 'Become an AAPSCM Professional Member — connect, develop, and thrive in supply chain, procurement, logistics, and tourism.',
                'page_data'        => $pageData,
                'meta_title'       => 'Professional Membership - AAPSCM',
                'meta_description' => 'Join AAPSCM as a Professional Member. No exam required — submit your CV for evaluation. $150/year plus $10 application fee.',
                'show_in_nav'      => true,
            ],
        );
    }
}
