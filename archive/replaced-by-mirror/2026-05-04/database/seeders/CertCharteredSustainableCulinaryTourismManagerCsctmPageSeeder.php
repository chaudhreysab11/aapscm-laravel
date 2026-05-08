<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertCharteredSustainableCulinaryTourismManagerCsctmPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-43.png'),
                'heading' => 'Leading the Way in Sustainable Culinary Tourism(CSCTM)®',
                'paragraphs' => [
                    'Welcome to the Chartered Sustainable Culinary Tourism Manager (CSCTM)® certification program, where the art of culinary exploration meets the science of sustainability. This advanced certification is designed for professionals, entrepreneurs, and enthusiasts who aim to lead in creating innovative, ethical, and transformative culinary tourism experiences. Gain the expertise needed to bridge the gap between gastronomy, cultural heritage, and environmental stewardship, setting new standards in the dynamic field of sustainable tourism.',
                ],
            ],
            'why_pursue' => [
                'heading' => 'Why Pursue the CSCTM® Certification?',
                'intro' => 'As global travelers increasingly seek authentic and eco-conscious experiences, the demand for sustainable culinary tourism is at an all-time high. The CSCTM® certification positions you as a leader in this expanding market, equipping you with the skills to',
                'items' => [
                    'Drive Sustainable Innovation: Design tourism models that prioritize environmental responsibility and cultural preservation.',
                    'Elevate Visitor Experiences: Craft unique journeys that connect travelers to the heart of local traditions and flavors.',
                    'Champion Community Growth: Foster economic development by supporting local farmers, artisans, and businesses.',
                    'Integrate Technology and Tradition: Leverage modern tools to enhance sustainability without compromising authenticity.',
                ],
            ],
            'key_learning_areas' => [
                'heading' => 'Key Learning Areas',
                'intro' => 'The CSCTM® certification program provides an in-depth exploration of core principles, strategies, and innovations in sustainable culinary tourism:',
                'items' => [
                    ['number' => '01', 'title' => 'Foundations of Culinary Tourism', 'text' => 'Explore the history, evolution, and significance of culinary tourism in global markets.'],
                    ['number' => '02', 'title' => 'Sustainability Principles for Culinary Tourism', 'text' => 'Master sustainability principles, culinary tourism management, ethical sourcing, cultural preservation, and more.'],
                    ['number' => '03', 'title' => 'Cultural Heritage and Culinary Storytelling', 'text' => 'Develop techniques to preserve and promote local traditions, recipes, and culinary techniques.'],
                    ['number' => '04', 'title' => 'Ethical Sourcing and Local Food Systems', 'text' => 'Emphasize fair trade, farm-to-table, and sustainable sourcing practices.'],
                    ['number' => '05', 'title' => 'Technology Integration in Culinary Tourism', 'text' => 'Use digital tools such as AI, analytics, and virtual tours to enhance visitor engagement and streamline operations.'],
                    ['number' => '06', 'title' => 'Destination Management and Marketing', 'text' => 'Build compelling branding and marketing campaigns that showcase sustainability as a competitive edge.'],
                    ['number' => '07', 'title' => 'Economic Impact and Community Empowerment', 'text' => 'Learn strategies to uplift local communities through equitable profit-sharing and partnerships.'],
                    ['number' => '08', 'title' => 'Designing Immersive Culinary Experiences', 'text' => 'Plan workshops, tours, and dining events that align with sustainability goals and offer unforgettable experiences.'],
                ],
            ],
            'who_should_pursue' => [
                'heading' => 'Who Should Pursue the CSCTM® Certification?',
                'intro' => 'The CSCTM® certification is ideal for:',
                'items' => [
                    'Tourism Professionals: Hospitality managers, travel agents, and tourism operators seeking specialization in sustainable culinary tourism.',
                    'Culinary Experts: Chefs, restaurateurs, and food entrepreneurs passionate about merging sustainability with gastronomy.',
                    'Community Leaders and Policy Makers: Advocates for sustainable tourism development in their regions.',
                    'Aspiring Entrepreneurs: Individuals planning to launch eco-conscious culinary tourism ventures.',
                    'Academics and Researchers: Professionals exploring the intersection of food, culture, and sustainability.',
                ],
            ],
            'why_stands_out' => [
                'heading' => 'Why CSCTM® Stands Out',
                'items' => [
                    ['title' => 'Global Recognition', 'text' => 'Gain a credential respected worldwide, signifying your expertise in sustainable culinary tourism.'],
                    ['title' => 'Hands-on Application', 'text' => 'Develop real-world solutions for sustainable culinary tourism through case studies and interactive assignments.'],
                    ['title' => 'Cutting-Edge Content', 'text' => 'Stay ahead with the latest trends in culinary tourism, sustainability, and technology integration.'],
                    ['title' => 'Collaborative Network', 'text' => 'Join a global community of culinary tourism professionals, thought leaders, and innovators.'],
                ],
            ],
            'transform' => [
                'heading' => 'Transform Culinary Tourism— One Plate at a Time',
                'paragraphs' => [
                    'Earning your CSCTM® certification is not just about advancing your career; it’s about making a difference. Lead the charge in creating tourism experiences that honor cultural traditions, protect the environment, and empower local communities.',
                    'Enroll Today and take the first step toward becoming a global leader in sustainable culinary tourism!',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-10.jpg'),
            ],
            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes', 'value' => 'Exam (CSCTM)®'],
                    ['label' => 'Exam Details', 'value' => 'The Sustainable Culinary Tourism certification exam focuses on assessing knowledge and strategies for promoting environmentally sustainable practices, cultural preservation, and economic development within the culinary tourism industry.'],
                    ['label' => 'Number of Questions', 'value' => 'Maximum of 100 questions per exam'],
                    ['label' => 'Type of Questions', 'value' => 'Multiple choice'],
                    ['label' => 'Length of Test', 'value' => '120 Minutes'],
                    ['label' => 'Passing Score', 'value' => '600 (on a scale of 1000)'],
                    ['label' => 'Recommended Experience', 'value' => 'No prior experience necessary'],
                    ['label' => 'Languages', 'value' => 'English'],
                    ['label' => 'Retirement', 'value' => 'None'],
                    ['label' => 'Testing Provider', 'value' => 'Affiliate Partners Testing Centers Online Testing'],
                    ['label' => 'Price', 'value' => '$399.99 USD'],
                ],
                'flyer_label' => 'Download Flyer',
                'flyer_href' => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2026/02/CSCTM.pdf'),
            ],
            'training_options' => [
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'options' => [
                    [
                        'text' => 'Self-Paced Training, Exam Fees: Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=27018'),
                    ],
                    [
                        'text' => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-chartered-sustainable-culinary-tourism-manager-csctm/'),
                    ],
                ],
            ],
            'closing_line' => 'Ready to lead and transform procurement in your organization? Enroll today and start building your leadership future!',
        ];

        Page::updateOrCreate(
            ['slug' => 'chartered-sustainable-culinary-tourism-manager-csctm'],
            [
                'title' => 'Chartered Sustainable Culinary Tourism Manager (CSCTM)®',
                'content' => null,
                'excerpt' => 'Leading the Way in Sustainable Culinary Tourism(CSCTM)®',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => 'Chartered Sustainable Culinary Tourism Manager (CSCTM) - AAPSCM®',
                'meta_description' => 'Take your career in culinary tourism to the next level with the Chartered Sustainable Culinary Tourism Manager (CSCTM®) certification!',
                'show_in_nav' => false,
            ],
        );
    }
}
