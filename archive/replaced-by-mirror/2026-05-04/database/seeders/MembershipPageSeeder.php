<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class MembershipPageSeeder extends Seeder
{
    public function run(): void
    {
        $img = '/storage/cms-images';

        $pageData = [
            'top_heading' => 'Become a Member',

            'intro' => [
                'image'   => $img.'/2024/01/Untitled-3.jpg',
                'heading' => 'Become a Member',
                'subheading' => 'If you’re working or studying in Procurement, Supply Chain, Tourism Management, AAPSCM® is your professional body – here to help you connect, develop and thrive in the technology industry.',
                'button_text' => 'Join Today',
                'button_url'  => '/my-account/',
            ],

            'why_join' => [
                'heading' => 'Why join AAPSCM®?',
                'text' => "The American Association of Procurement and Supply Chain Management (AAPSCM)® is a U.S.-based professional organization for Procurement, Supply Chain, Tourism Management. Its services include issuing professional certifications programs in specific areas of Management – Procurement Management, Supply Chain Management , Tourism Management. It will be the first to recognize hospitality and tourism as a skilled workforce that requires recognition and provides certification recognition.\nAAPSCM® is known for the quality of its certifications and tests. American Association of Procurement, Supply-Chain and Tourism Management (AAPSCM)® aims to promote and develop high standards of professional and managerial skills, ability, and integrity among all those engaged in Procurement, Sustainable, supply chain, and Tourism management.",
                'design_image' => $img.'/2023/10/design.png',
                'image' => $img.'/2023/10/acpp-1.jpg',
            ],

            'which_grade' => [
                'heading' => "Which grade's for me?",
                'subtitle' => 'Wherever you are in your learning journey, there’s a AAPSCM® membership grade that’s right for you.',
            ],

            'tiers' => [
                [
                    'id'    => 'professional',
                    'image' => $img.'/2023/10/pexels-andrea-piacquadio-3769021-scaled-1-1-1024x683-2.jpg',
                    'price' => 'US$185/Year',
                    'fee'   => 'Plus one-time US$10 Application fee',
                    'button_text' => 'Join Now',
                    'button_url'  => '/checkout/?add-to-cart=4234',
                    'image_position' => 'left',
                    'title' => 'Professional Membership',
                    'features' => [
                        'You do not need to take the certification exam but your CV must be evaluated to meet qualifications',
                        'Be part of the largest Procurement/Supply Chain/Tourism Management community',
                        'Be recognized and awarded with AAPSCM®Vouchers!',
                        'Automatically registered to “Spartanburg, South Carolina Charter” and attend our conferences here in South Carolina, USA',
                        ' Get our Unique ID card',
                        'Get 50% discount for attending our conferences with your “Aapscm® unique ID” registration',
                        'Download the AAPSCM® Guide for free',
                        'Access to AAPSCM® Standards+ digital content solution',
                        'nlock several resources, brochures + tools and templates',
                        'Get 50% discount on books and brochures for only your specified certification choice',
                        'Save on career-advancing certifications with Vouchers',
                        'Find relevant jobs with the AAPSCM® Job Board',
                        'Stay up-to-date with AAPSCM® publications',
                        'Opportunity to join local chapters for educational and networking opportunities (additional annual fee)',
                    ],
                ],
                [
                    'id'    => 'chartered',
                    'image' => $img.'/2023/10/pexels-andrea-piacquadio-3769021-scaled-2-1024x683-2.jpg',
                    'price' => 'US$399.99/Year',
                    'fee'   => 'Plus one-time US$50 Application fee',
                    'button_text' => 'Join Now',
                    'button_url'  => '/checkout/?add-to-cart=19453',
                    'image_position' => 'right',
                    'title' => 'Chartered Professional Membership',
                    'features' => [
                        " Take the Certification Exam up till Manager's certification and pass",
                        'Be part of the largest Procurement/Supply Chain/Tourism Management community',
                        ' Track your certification status with ‘myAapscm®’ ',
                        ' Automatically registered to “Spartanburg, South Carolina Charter” and attend our conferences here in the USA',
                        ' Get our Unique ID card and Ring',
                        'Get 50% discount for attending our conferences with your “Aapscm® unique ID” registration',
                        'Download the AAPSCM® Guide for free',
                        'Access to AAPSCM® Standards+ digital content solution',
                        'Unlock several resources, test questions, brochures + tools and templates',
                        'Save on career-advancing certifications with Vouchers',
                        'Find relevant jobs with the AAPSCM® Job Board',
                        'Stay up-to-date with AAPSCM® publications',
                        'Digital download of several of our resources and books',
                        'Opportunity to join local chapters for educational and networking opportunities (additional annual fee)',
                    ],
                ],
                [
                    'id'    => 'corporate',
                    'image' => $img.'/2023/10/pretty-teen-girl-sitting-table-with-laptopstudying-1-1.jpg',
                    'price' => 'US$1660/Year',
                    'fee'   => 'Plus one-time US$250 Application fee',
                    'button_text' => 'Join Now',
                    'button_url'  => '/affiliate-partners/#become-partner',
                    'image_position' => 'left',
                    'title' => 'Corporate Membership',
                    'features' => [
                        'Connect with other leaders to share strategies and knowledge for driving success in Procurement, Supply Chain and Tourism Management',
                        'Become an “Authorized & Accredited Training Partner”',
                        'Create a Charter Affiliate of “Spartanburg, SC Charter” in your institution/Organization',
                        'Talent Management with Vouchers for your students or staff for Aapscm® certifications',
                        'Automatically registered to “Spartanburg, SC Charter” and attend our conferences here in the USA',
                        'Free Seminars and Workshop with representatives from the US facilitating in your institution',
                        'Get 50% discount for attending our conferences with your “Aapscm® unique ID” registration',
                        'Download the AAPSCM® Guide for free',
                        'Get 40% discount on our Course materials in all the certifications',
                        'Access to AAPSCM® Standards+ digital content solution',
                        'Unlock several resources, test questions, brochures + tools and templates',
                        'Stay up-to-date with AAPSCM® publications',
                        'Digital download of several of our resources and books',
                        'Educational and networking opportunities (additional annual fee)',
                    ],
                ],
                [
                    'id'    => 'student',
                    'image' => $img.'/2023/10/Untitled-3-1.jpg',
                    'price' => 'US$49.99/Year',
                    'fee'   => 'Plus one-time US $5 Application fee',
                    'button_text' => 'Join Now',
                    'button_url'  => '/checkout/?add-to-cart=24613',
                    'image_position' => 'right',
                    'title' => 'Student Membership',
                    'description' => "AAPSCM® Student membership provides you with the tools and resources you need to expand your expertise and start a career in Procurement, Supply Chain, & Tourism Management.\nStudent membership offers unique benefits including automatic opportunity to join any of our Charters in the US – the world’s modern library of supply chain materials. Student members also have access to leadership opportunities and scholarships to attend any of our annual conferences and charter meetings.",
                    'features' => [
                        'Pay discounted membership fee of  $74.99  and become a member',
                        'Covers global supply chain activities that involve suppliers, plants, distributors, and customers located around the world.',
                        'Membership for all students for the duration of their course, up to two years.',
                        'Bespoke online and physical events for your students with industry experts',
                        'Gain a professional distinction that sets you apart from colleagues and proves a high level of knowledge and skill.',
                        'Member access to any of our charter and the industry informed framework.',
                        'Membership connects your undergraduates with the supply chain industry...',
                        'Students can tap into experience straight from the supply chain community by matching having a wide range of tools to help them get chartered. ',
                        'Learn the latest best practices to improve your performance and take advantage of common technologies.',
                    ],
                ],
            ],

            'fellow' => [
                'id'    => 'fellow-member-section',
                'image' => $img.'/2024/01/Untitled-1.jpg',
                'price' => 'US $1,999.99/Year',
                'fee'   => 'Plus one-time US $300 Application fee',
                'button_text' => 'Join Now',
                'button_url'  => '/checkout/?add-to-cart=12326',
                'heading' => 'Become a Fellow Member',
                'description' => 'Are you a Corporate Executive, Supply Chain leader, or a college Professor, or have contributed significantly to Supply Chain or Tourism Management, you can apply to become a Fellow Member. Fellowship celebrates a diverse and inclusive community from a broad range of backgrounds. AAPSCM® Fellows are entrepreneurs, innovators, researchers, academics, business leaders, and industry professionals. What they all have in common is the level of success they’ve reached in their professional lives. You just need to submit your CV to <a href="mailto:info@aapscm.org">info@aapscm.org</a>.',
                'categories_heading' => 'Fellow Membership Categories for <span style="font-weight:600">AAPSCM®</span>',
                'categories' => [
                    ['title' => 'Grand Fellow',           'url' => '/grand-fellow-membership/'],
                    ['title' => 'Specialist Fellow',      'url' => '/specialist-fellow-membership/'],
                    ['title' => 'Professional Fellow',    'url' => '/professional-fellow-membership/'],
                    ['title' => 'Academic Fellow',        'url' => '/academic-fellow-membership/'],
                    ['title' => 'Corporate Fellow',       'url' => '/corporate-fellow-membership/'],
                    ['title' => 'Emerging Leader Fellow', 'url' => '/emerging-leader-fellow-membership/'],
                    ['title' => 'International Fellow',   'url' => '/international-fellow-membership/'],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'membership'],
            [
                'title'            => 'Membership',
                'template'         => '',
                'status'           => 'published',
                'is_published'     => true,
                'content'          => '',
                'excerpt'          => 'Join AAPSCM — Professional, Chartered, Corporate, Student, and Fellow membership tiers.',
                'page_data'        => $pageData,
                'meta_title'       => 'Membership - AAPSCM',
                'meta_description' => 'Join AAPSCM as a Professional, Chartered Professional, Corporate, Student, or Fellow member. Connect, develop, and thrive in procurement, supply chain, and tourism management.',
                'show_in_nav'      => true,
            ],
        );
    }
}
