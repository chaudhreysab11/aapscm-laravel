<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class StudentMembershipPageSeeder extends Seeder
{
    public function run(): void
    {
        $img = '/storage/cms-images';

        $pageData = [
            'hero' => [
                'heading_pre'  => 'Join AAPSCM®',
                'heading_mid'  => ' Student Membership',
                'heading_post' => ': Your Gateway to a Thriving Career',
                'subheading'   => 'The AAPSCM® Student Membership equips you with essential tools and resources to kickstart a rewarding career in Procurement, Supply Chain, and Tourism Management. By becoming a member, you gain access to unparalleled benefits designed to enhance your expertise, broaden your network, and distinguish yourself as a future leader in the field.',
                'button_text'  => 'Join Now',
                'button_url'   => '/checkout/?add-to-cart=24613',
                'image'        => $img.'/2024/12/home-banner-top.png',
            ],

            'benefits' => [
                'heading' => 'Exclusive Benefits Include:',
                'items' => [
                    [
                        'icon'  => $img.'/2024/11/1-15.png',
                        'title' => 'Access to Charters Across the U.S',
                        'text'  => 'Join any of our U.S. Charters and tap into the world’s most comprehensive library of supply chain materials.',
                    ],
                    [
                        'icon'  => $img.'/2024/11/Group-1000001874.png',
                        'title' => 'Leadership Opportunities & Scholarships',
                        'text'  => 'Qualify for scholarships and leadership roles to attend our annual conferences and charter meetings, ensuring hands-on industry exposure.',
                    ],
                    [
                        'icon'  => $img.'/2024/11/Group-1000001875.png',
                        'title' => 'Discounted Membership Fee',
                        'text'  => 'For just $49.99, you can enjoy membership for up to two years, covering the duration of your course.',
                    ],
                    [
                        'icon'  => $img.'/2024/11/Group-1000001876.png',
                        'title' => 'Global Scope',
                        'text'  => 'Gain insights into global supply chain activities that span suppliers, plants, distributors, and customers worldwide.',
                    ],
                    [
                        'icon'  => $img.'/2024/11/Group-1000001877.png',
                        'title' => 'Bespoke Events',
                        'text'  => 'Attend tailored online and in-person events led by industry experts, which offer invaluable real-world insights.',
                    ],
                    [
                        'icon'  => $img.'/2024/11/1-16.png',
                        'title' => 'Professional Distinction',
                        'text'  => 'Achieve a mark of excellence that sets you apart from peers, showcasing your advanced knowledge and skills in supply chain management.',
                    ],
                ],
            ],

            'why_join' => [
                'heading'  => 'Why Join?',
                'text'     => 'AAPSCM® Student Membership directly connects to the Procurement, Supply chain,and Tourism Communities, allowing you to learn from experienced professionals, explore best practices, and stay ahead with cutting-edge technologies. Whether through networking events, global resources, or leadership opportunities, this membership provides everything you need to excel in a competitive marketplace.',
                'cta_bold' => 'Take the First Step Today',
                'cta_text' => 'Invest in your future for just $49.99 and gain the knowledge, distinction, and connections to shape a successful career in Procurement, Supply Chain, and Tourism Management. Join AAPSCM® and start your journey toward becoming a leader in the global supply chain industry.',
            ],

            'faqs' => [
                'heading' => 'Frequently asked Questions',
                'items' => [
                    [
                        'question' => 'How do I access my membership benefits?',
                        'answer'   => '<p><strong>Access Your AAPSCM® Benefits with Ease</strong></p><p>To access your exclusive AAPSCM® membership benefits, follow these simple steps:</p><ol><li><strong>Log In to Your Account:</strong><br />Visit <a href="/">aapscm.org</a> and log in using your registered email and password.</li><li><strong>Navigate to Your Dashboard:</strong><br />After logging in, click on <strong>&#8220;My Account Information&#8221;</strong> and select the <strong>“Dashboard”</strong> link.</li><li><strong>Explore Your Benefits and Tools:</strong><br />You can access a range of benefits from your dashboard via the left-hand navigation menu or the displayed modules. These include:<ul><li><strong>Tools &amp; Resources:</strong> Access course materials, webinars, and virtual events.</li><li><strong>Networking Opportunities:</strong> Connect with peers and industry professionals through your online community.</li><li><strong>Personalized Features:</strong> Depending on your registration status, your dashboard reflects the benefits and tools aligned with your purchases or registrations.</li></ul></li><li><strong>Stay Connected:</strong><br />If you have any questions or need assistance, please contact us at <strong><a href="mailto:info@aapscm.org">info@aapscm.org</a></strong>.</li></ol><p>Take full advantage of your AAPSCM® membership to unlock resources, build your network, and enhance your professional journey!</p>',
                    ],
                    [
                        'question' => 'As part of my membership, I can access online communities, tools, templates, webinars, virtual events, and more. Where can I find those resources?',
                        'answer'   => '<p><strong>Access the AAPSCM® Global Online Community</strong></p><p>Discover a wealth of resources and opportunities through the AAPSCM® global online community. Follow these steps to make the most of your membership:</p><ol><li><strong>Explore Member-Exclusive Resources:</strong><br />Gain access to <strong>templates, member-only webinars, virtual events</strong>, and more. These resources are designed to support your professional growth and enhance your expertise.</li><li><strong>Navigate to Your Account:</strong><br />From the AAPSCM® homepage, click on <strong>&#8220;Your Account&#8221;</strong> to access the resources or social media communities you’ve registered for. The top-level navigation menu provides easy access to what you need.</li><li><strong>Connect and Engage:</strong><br />Participate in webinars, attend virtual events, and interact with peers through your registered social media community.</li><li><strong>Reach Out for Assistance:</strong><br />If you have questions or concerns:<ul><li>Email us at <strong><a href="mailto:info@aapscm.org">info@aapscm.org</a></strong> for a response within 24 hours.</li><li>Call us at <strong>+1-(803) 998-2189</strong> during <strong>Eastern Standard Time (EST)</strong> hours for immediate assistance.</li></ul></li></ol><p>Take advantage of the tools and networks available through AAPSCM® to empower your career and professional journey!</p>',
                    ],
                    [
                        'question' => 'What’s the difference between Student Membership and Professional Membership?',
                        'answer'   => '<p><strong>Exclusive Benefits for AAPSCM® Student Members</strong></p><p>As a <strong>Student Member</strong> of AAPSCM®, you enjoy nearly all the same benefits as our <strong>Professional</strong> or <strong>Manager Members</strong>, with one key distinction:</p><ul><li><strong>Digital-Only Access to Publications</strong>: Student Members receive exclusive access to publications in a <strong>digital format</strong>, ensuring you stay informed and up-to-date with the latest industry trends.</li></ul><p>To become a Student Member, you must <strong>verify your student status</strong> during purchase. This step ensures you receive the appropriate membership privileges tailored to your academic journey.</p>',
                    ],
                ],
            ],

            'free_training' => [
                'text_pre'  => 'For free training for US college students,',
                'link_text' => 'click here',
                'link_url'  => '/procurement-management/',
                'text_post' => '. This will take them to Students Free training page.',
                'signup_button_text' => 'Sign up',
                'signup_button_url'  => '/my-account/',
                'pay_button_text'    => 'pay for student professional',
                'pay_button_url'     => '/checkout/?add-to-cart=24613',
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'student-membership'],
            [
                'title'            => 'Student Membership',
                'template'         => '',
                'status'           => 'published',
                'is_published'     => true,
                'content'          => '',
                'excerpt'          => 'AAPSCM® Student Membership — your gateway to a thriving career in Procurement, Supply Chain, and Tourism Management.',
                'page_data'        => $pageData,
                'meta_title'       => 'Student Membership - AAPSCM',
                'meta_description' => 'Join AAPSCM® Student Membership for $49.99 and gain access to charters, scholarships, bespoke events, and a global supply chain community.',
                'show_in_nav'      => false,
            ],
        );
    }
}
