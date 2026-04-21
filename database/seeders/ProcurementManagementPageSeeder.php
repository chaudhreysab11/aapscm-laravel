<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Seeds https://aapscm.org/procurement-management/ for WP parity.
 *
 * Free procurement management training landing page for US college students.
 * Sections: hero, elevate intro, why-learn with reasons, curriculum modules,
 * program features, exclusive membership, and bottom CTA.
 */
class ProcurementManagementPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'heading' => 'Procurement Management',
            ],

            'elevate' => [
                'heading'    => 'Elevate Your Future!',
                'subheading' => 'Calling all US college students',
                'text'       => "Gain career-ready skills, boost your resume, and master procurement management\u{2014}all for FREE!\n\nStand out in the competitive job market with expertise that drives the global economy. Don\u{2019}t miss this exclusive opportunity!",
                'image'      => '/storage/cms-images/2024/12/1-68.png',
            ],

            'why_learn' => [
                'heading'         => 'Why Should You Learn Procurement Management?',
                'text'            => 'Procurement management is a vital business function that ensures efficient sourcing, purchasing, and management of goods and services. It\'s a high-demand skill across industries like logistics, manufacturing, retail, technology, and government.',
                'reasons_heading' => 'Top Reasons to Enroll in this Free Training:',
                'reasons'         => [
                    ['bold' => 'Gain Practical Skills:', 'text' => 'Learn supplier negotiation, contract management, and strategic sourcing.'],
                    ['bold' => 'Boost Your Resume:', 'text' => 'Stand out to employers with critical skills for growing industries.'],
                    ['bold' => 'No Cost, Big Value:', 'text' => 'Get professional-level training at zero cost.'],
                    ['bold' => 'Certificate of Completion:', 'text' => 'Showcase your achievement to future employers and LinkedIn connections.'],
                ],
                'check_icon'      => '/storage/cms-images/2024/12/check.png',
            ],

            'curriculum' => [
                'heading' => 'What Will You Learn?',
                'text'    => 'This free training is designed to provide a strong foundation in procurement management. Here\'s what you\'ll learn:',
                'modules' => [
                    ['title' => 'Foundations of Procurement Management', 'description' => 'Understand procurement basics and its critical role in business success.', 'icon' => '/storage/cms-images/2024/11/1-15.png'],
                    ['title' => 'Strategic Sourcing & Supplier Selection', 'description' => 'Learn how to identify, evaluate, and manage supplier relationships.', 'icon' => '/storage/cms-images/2024/11/Group-1000001874.png'],
                    ['title' => 'Contract Negotiation & Management', 'description' => 'Master the principles of contract creation, negotiation, and compliance.', 'icon' => '/storage/cms-images/2024/11/Group-1000001875.png'],
                    ['title' => 'Cost Optimization & Budget Control', 'description' => 'Explore modern tools like automation, analytics, and blockchain for procurement.', 'icon' => '/storage/cms-images/2024/11/Group-1000001876.png'],
                    ['title' => 'Procurement Technologies', 'description' => 'Explore modern tools like automation, analytics, and blockchain for procurement.', 'icon' => '/storage/cms-images/2024/11/5.png'],
                    ['title' => 'Sustainability in Procurement', 'description' => 'Learn how to incorporate ethical and eco-friendly practices into sourcing.', 'icon' => '/storage/cms-images/2024/11/1-16.png'],
                ],
            ],

            'features' => [
                'heading' => 'Program Features',
                'items'   => [
                    ['title' => 'Completely Free', 'description' => "No fees, no hidden charges\u{2014}this training is entirely free for US college students.", 'icon' => '/storage/cms-images/2024/12/Group-1597883853.png'],
                    ['title' => 'Flexible Learning', 'description' => 'Study online, at your own pace, from anywhere in the US.', 'icon' => '/storage/cms-images/2024/12/Group-1597883854.png'],
                    ['title' => 'Expert Instruction', 'description' => 'Learn from experienced procurement professionals.', 'icon' => '/storage/cms-images/2024/12/Group-1597883855.png'],
                    ['title' => 'Interactive Projects', 'description' => 'Apply your skills through case studies and real-world examples.', 'icon' => '/storage/cms-images/2024/12/Group-1597883856.png'],
                    ['title' => 'Certificate of Completion', 'description' => 'Earn a certificate to boost your resume and LinkedIn profile.', 'icon' => '/storage/cms-images/2024/12/Group-1597883857.png'],
                ],
            ],

            'membership' => [
                'heading'  => 'Exclusive Membership Opportunity',
                'text'     => 'Upon completing the training, you\'ll have the opportunity to join the prestigious American Association of Procurement and Supply Chain Management (AAPSCM) as a Professional Member for only $50. Membership includes:',
                'benefits' => [
                    'Access to exclusive resources and tools.',
                    'Networking opportunities with industry leaders.',
                    'Invitations to workshops, events, and webinars.',
                    'A professional edge in the procurement field.',
                ],
                'enroll_heading' => 'How to Enroll',
                'enroll_steps'   => [
                    'Click "Sign Up Now" to register for the training.',
                    'Fill out a short form with your details.',
                    'Get scheduled with either live virtual instructor-led training or self-paced training.',
                ],
            ],

            'cta' => [
                'heading'      => 'Exclusive Membership Opportunity',
                'text'         => 'This free training gives you the skills, knowledge, and tools to excel in procurement management. With a Professional Membership in AAPSCM, you\'ll gain a competitive edge to launch your career and build lasting industry connections.',
                'subheading'   => "Don\u{2019}t wait\u{2014}sign up today!",
                'signup_label' => 'Sign Up Now',
                'signup_url'   => '/application-form-for-free-training-in-procurement-management/',
                'member_label' => 'Become a Member',
                'member_url'   => '/membership/',
                'email'        => 'info@aapscm.org',
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'procurement-management'],
            [
                'title'            => 'Procurement Management',
                'template'         => '',
                'status'           => 'published',
                'is_published'     => true,
                'content'          => '',
                'excerpt'          => 'Free procurement management training for US college students.',
                'page_data'        => $pageData,
                'meta_title'       => "Procurement Management - AAPSCM\u{00ae}",
                'meta_description' => 'Free procurement management training for US college students. Learn supplier negotiation, contract management, strategic sourcing, and more.',
                'show_in_nav'      => false,
            ],
        );
    }
}