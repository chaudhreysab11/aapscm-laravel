<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class MembershipFaqsPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'heading' => 'Membership FAQs',
            ],
            'faqs' => [
                [
                    'question' => 'How do I access my membership benefits?',
                    'answer'   => 'To access your exclusive AAPSCM membership benefits: 1) Log in at aapscm.org with your email and password. 2) Navigate to My Account Information and select Dashboard. 3) Explore your benefits including Tools and Resources, Networking Opportunities, and Personalized Features. 4) Contact info@aapscm.org for assistance.',
                ],
                [
                    'question' => 'As part of my membership, I can access online communities, tools, templates, webinars, virtual events, and more. Where can I find those resources?',
                    'answer'   => 'All resources including online communities, tools, templates, webinars, and virtual events are available through your member dashboard. After logging in, navigate to the Resources or Member Services section.',
                ],
                [
                    'question' => 'What is the difference between Student Membership and Professional Membership?',
                    'answer'   => 'Student Membership costs $49.99 for up to two years and is for current college students. Professional Membership costs $150/year plus $10 application fee and is for working professionals. Professional members submit their CV for evaluation instead of taking exams.',
                ],
            ],
            'cta' => [
                'text' => 'Join AAPSCM today and take advantage of these valuable resources to enhance your professional development and career prospects in Procurement, Supply Chain, and Tourism Management!',
                'links' => [
                    ['label' => 'Free training for US college students', 'url' => '/procurement-management/'],
                    ['label' => 'Sign up and pay for student professional membership', 'url' => '/student-membership/'],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'membership-faqs'],
            [
                'title'            => 'Membership FAQs',
                'template'         => '',
                'status'           => 'published',
                'is_published'     => true,
                'content'          => '',
                'excerpt'          => 'Frequently asked questions about AAPSCM membership.',
                'page_data'        => $pageData,
                'meta_title'       => 'Membership FAQs - AAPSCM',
                'meta_description' => 'FAQs about AAPSCM membership benefits, resources, and the difference between student and professional membership.',
                'show_in_nav'      => false,
            ],
        );
    }
}