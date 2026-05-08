<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Seeds https://aapscm.org/supply-chain-management/ for WP parity.
 *
 * Free supply chain management training landing page for US college students.
 * Sections: hero, intro, why-learn with reasons, curriculum modules,
 * program features (checklist), who-is-this-for with 4 cards, and bottom CTA.
 */
class SupplyChainManagementPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'heading' => 'FREE Supply Chain Management Training for US College Students!',
            ],

            'intro' => [
                'text' => "Are you a US college student looking to enhance your career prospects, gain valuable skills, and stand out in today\u{2019}s competitive job market? Take advantage of our Free Supply Chain Management (SCM) Training, tailored specifically for college students across the U.S. This program is your opportunity to build in-demand expertise in a vital field\u{2014}all at no cost!",
            ],

            'why_learn' => [
                'heading'         => 'Why Should You Learn Supply Chain Management?',
                'text'            => "Supply Chain Management is at the core of global commerce, ensuring products and services move efficiently from suppliers to consumers. It\u{2019}s a high-demand skill in industries like retail, logistics, manufacturing, healthcare, and more.",
                'reasons_heading' => 'Top Reasons to Enroll in this Free Training:',
                'reasons'         => [
                    ['bold' => 'Gain Real-World Skills:', 'text' => 'Learn how to manage logistics, optimize inventory, and coordinate global supply chains.'],
                    ['bold' => 'Stand Out to Employers:', 'text' => 'Develop sought-after skills for roles in logistics, procurement, and operations.'],
                    ['bold' => 'Completely Free:', 'text' => 'Access professional training without spending a penny.'],
                    ['bold' => 'Certificate of Completion:', 'text' => 'Showcase your achievement to potential employers and boost your resume.'],
                ],
            ],

            'curriculum' => [
                'heading' => 'What Will You Learn?',
                'text'    => "This free training program covers the essential knowledge and tools needed for success in Supply Chain Management. Here\u{2019}s what you\u{2019}ll gain:",
                'modules' => [
                    ['title' => 'Foundations of Supply Chain Management', 'description' => 'Understand how supply chains operate and their importance in business success.', 'icon' => '/storage/cms-images/2024/11/1-15.png'],
                    ['title' => 'Logistics & Transportation Management', 'description' => 'Learn about transportation modes, route optimization, and last-mile delivery.', 'icon' => '/storage/cms-images/2024/11/Group-1000001874.png'],
                    ['title' => 'Inventory Management & Demand Forecasting', 'description' => 'Explore strategies to optimize inventory levels and predict customer demand accurately.', 'icon' => '/storage/cms-images/2024/11/Group-1000001875.png'],
                    ['title' => 'Procurement and Supplier Relationships', 'description' => 'Discover how to source materials, manage suppliers, and build strategic partnerships.', 'icon' => '/storage/cms-images/2024/11/Group-1000001876.png'],
                    ['title' => 'Technology in Supply Chains', 'description' => 'Learn how to use tools like AI, IoT, and big data analytics to enhance supply chain efficiency.', 'icon' => '/storage/cms-images/2024/11/Group-1000001877.png'],
                    ['title' => 'Sustainability in Supply Chain Management', 'description' => 'Understand how to implement eco-friendly practices and reduce environmental impact.', 'icon' => '/storage/cms-images/2024/11/1-16.png'],
                ],
                'divider_image' => '/storage/cms-images/2024/12/Untitled-4-3.png',
            ],

            'features' => [
                'heading' => 'Program Features',
                'items'   => [
                    ['bold' => '100% Free:', 'text' => "No fees, no hidden costs\u{2014}this training is completely free for US college students."],
                    ['bold' => 'Flexible Online Learning:', 'text' => 'Study at your own pace, from anywhere, anytime.'],
                    ['bold' => 'Expert Instruction:', 'text' => 'Learn from experienced professionals in supply chain and logistics management.'],
                    ['bold' => 'Interactive Case Studies:', 'text' => 'Apply your knowledge to real-world supply chain challenges.'],
                    ['bold' => 'Certificate of Completion:', 'text' => 'Receive a certificate to add to your resume and LinkedIn profile.'],
                ],
            ],

            'who_is_this_for' => [
                'text'    => "This program is open to all U.S. college students, regardless of major or academic background. Whether you\u{2019}re studying business, engineering, IT, or any other field, supply chain management provides valuable skills that can apply to any industry.",
                'heading' => 'Why Choose This Training?',
                'image'   => '/storage/cms-images/2024/12/about-img-2.jpg',
                'cards'   => [
                    ['title' => 'Career-Ready Skills', 'description' => 'Prepare for high-demand jobs in logistics, operations, and global supply chain management.', 'icon' => '/storage/cms-images/2024/12/1-1.png'],
                    ['title' => 'Tailored for U.S. Students', 'description' => 'Focused on the needs and career pathways of college students in the United States.', 'icon' => '/storage/cms-images/2024/12/2.png'],
                    ['title' => 'Cutting-Edge Knowledge', 'description' => 'Learn about the latest trends, including sustainability, technology, and global logistics.', 'icon' => '/storage/cms-images/2024/12/3.png'],
                    ['title' => 'Networking Opportunities', 'description' => 'Connect with like-minded students and industry professionals.', 'icon' => '/storage/cms-images/2024/12/4.png'],
                ],
            ],

            'cta' => [
                'heading'      => 'Your Future in Supply Chain Management Starts Here!',
                'text'         => "Supply Chain Management is a growing field with endless career opportunities. With this Free Training Program, you\u{2019}ll develop the skills employers are looking for, from managing global logistics to optimizing operations and driving sustainability.",
                'subheading'   => "Don\u{2019}t wait\u{2014}take the first step toward an exciting career in Supply Chain Management today!",
                'signup_label' => 'Sign Up Now',
                'signup_url'   => '/application-form-for-free-training-in-procurement-management/',
                'email'        => 'info@aapscm.org',
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'supply-chain-management'],
            [
                'title'            => 'Supply Chain Management',
                'template'         => '',
                'status'           => 'published',
                'is_published'     => true,
                'content'          => '',
                'excerpt'          => 'Free supply chain management training for US college students.',
                'page_data'        => $pageData,
                'meta_title'       => "FREE Supply Chain Management Training for US College Students! - AAPSCM\u{00ae}",
                'meta_description' => 'Free supply chain management training for US college students. Learn logistics, inventory management, procurement, technology in supply chains, and more.',
                'show_in_nav'      => false,
            ],
        );
    }
}