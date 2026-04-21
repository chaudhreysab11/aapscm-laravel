<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes
 * https://aapscm.org/american-certified-sustainable-procurement-ethical-sourcing-professional/
 * for WP parity (Sustainable Green Procurement & Ethical Sourcing Professional, AC-SGPES).
 *
 * Mirrors visible Elementor sections in source order. The trailing hidden
 * section (elementor-hidden) is skipped.
 */
class CertAmericanCertifiedSustainableProcurementEthicalSourcingProfessionalPageSeeder extends Seeder
{
    public function run(): void
    {
        $check = UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png');

        $pageData = [
            'intro' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-51.png'),
                'heading'    => "Sustainable Green Procurement & Ethical Sourcing Professional (AC-SGPES)\u{00ae}",
                'paragraphs' => [
                    'Overview: With an increasing focus on sustainability, this program would educate professionals on green procurement practices, sourcing ethically, and managing suppliers who follow environmental and social governance (ESG) criteria.',
                    'Key Topics: The program covers green procurement, ethical sourcing, supplier sustainability assessments, ESG standards, and circular economy strategies.',
                    'Ideal For Professionals looking to implement sustainable practices within procurement to align with and further their corporate responsibility goals.',
                ],
            ],
            'lead' => [
                'paragraph' => "The future of procurement lies in sustainable practices and ethical sourcing. Organizations are increasingly expected to adopt responsible procurement methods, ensuring their operations align with environmental, social, and governance (ESG) principles. The Sustainable Procurement and Ethical Sourcing program equips professionals with the knowledge to implement sustainable procurement strategies, establish ethical supplier relationships, and contribute to their organization\u{2019}s ESG objectives.",
            ],
            'who_should_enroll' => [
                'heading' => 'Who Should Enroll?',
                'intro'   => 'This program is ideal for:',
                'items' => [
                    ['icon' => $check, 'text' => 'Procurement and supply chain professionals focused on sustainability.'],
                    ['icon' => $check, 'text' => 'Managers looking to integrate ESG principles into their procurement strategies.'],
                    ['icon' => $check, 'text' => 'Corporate social responsibility (CSR) officers aiming to align procurement practices with ethical standards.'],
                    ['icon' => $check, 'text' => 'Professionals preparing for roles that require sustainable and responsible sourcing expertise.'],
                ],
            ],
            'program_highlights' => [
                'heading' => 'Program Highlights',
                'cards' => [
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883853.png'),
                        'title' => 'Green Procurement Practices',
                        'text'  => 'Learn the essentials of environmentally friendly procurement and how to source products that minimize ecological impact.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883854.png'),
                        'title' => 'Ethical Sourcing Standards',
                        'text'  => 'Understand the importance of fair labor, ethical treatment, and the social responsibility involved in procurement.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883855.png'),
                        'title' => 'Environmental, Social, and Governance (ESG)',
                        'text'  => 'ain insights into ESG standards and how to apply them within the procurement function.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883856.png'),
                        'title' => 'Supplier Sustainability Assessments',
                        'text'  => 'Learn to evaluate suppliers based on their environmental impact, ethical practices, and compliance with sustainability standards.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883857.png'),
                        'title' => 'Circular Economy Strategies',
                        'text'  => 'Explore how to integrate circular economy principles by sourcing products that can be reused, recycled, or sustainably disposed of.',
                    ],
                ],
            ],
            'learning_outcomes' => [
                'heading' => 'Key Learning Outcomes',
                'intro'   => 'By the end of this program, participants will be able to:',
                'items' => [
                    ['icon' => $check, 'text' => "Develop and implement sustainable procurement policies aligned with their organization\u{2019}s ESG goals."],
                    ['icon' => $check, 'text' => 'Conduct supplier sustainability assessments to ensure they meet ethical and environmental standards.'],
                    ['icon' => $check, 'text' => 'Integrate green procurement practices to minimize the environmental impact of purchasing activities.'],
                    ['icon' => $check, 'text' => 'Establish ethical sourcing standards, ensuring fair labor and responsible supplier practices.'],
                    ['icon' => $check, 'text' => 'Foster a circular economy approach within the supply chain to reduce waste and maximize resource efficiency.'],
                ],
            ],
            'modules' => [
                'heading' => 'Program Structure and Modules',
                'cards' => [
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/procurement-1.png'),
                        'title' => 'Introduction to Sustainable Procurement',
                        'text'  => 'An overview of sustainable procurement concepts, current trends, and the importance of ethical sourcing in modern organizations.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/Untitled-6.png'),
                        'title' => 'Environmental Impact and Green Procurement',
                        'text'  => 'Understand the environmental impacts of procurement and strategies to reduce carbon footprint through responsible sourcing. .',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/compliance.png'),
                        'title' => 'ESG and Ethical Standards in Sourcing',
                        'text'  => 'Learn the essentials of ESG principles and how to apply ethical standards in supplier selection, including fair labor practices and anti-corruption measures.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/wholesale.png'),
                        'title' => 'Supplier Sustainability Assessments',
                        'text'  => 'Develop skills to evaluate suppliers based on sustainability criteria, including environmental performance and ethical compliance.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/circular-economy.png'),
                        'title' => 'Circular Economy in Procurement',
                        'text'  => 'Discover how to create a circular supply chain by sourcing materials and products contributing to sustainability and resource efficiency.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/2117688.png'),
                        'title' => 'Risk Management in Sustainable Procurement',
                        'text'  => 'Identify and manage risks related to ethical sourcing, such as compliance risks, supply chain transparency, and environmental impact.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/4862413.png'),
                        'title' => 'Sustainable Procurement Tools and Technologies',
                        'text'  => 'Gain hands-on experience with tools and platforms for sustainable procurement, such as EcoVadis, SAP Ariba, and Source Intelligence.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/5956597-1.png'),
                        'title' => 'Capstone Project',
                        'text'  => 'Apply your knowledge in a real-world project, creating a sustainable procurement strategy that addresses ethical sourcing and ESG requirements for a sample company.',
                    ],
                ],
            ],
            'certification_pathway' => [
                'image'     => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/1-3-1024x585.jpg'),
                'heading'   => 'Certification and Career Pathways',
                'paragraph' => "Successful candidates of this program will receive the Sustainable Green Procurement & Ethical Sourcing Professional (AC-SGPES)\u{00ae}. This credential will certify that you have skills and competence as professionals for roles such as:",
                'roles' => [
                    'Sustainable Procurement Manager',
                    'ESG Procurement Analyst',
                    'Social Responsibility (CSR) Officer',
                    'Supply Chain Sustainability Specialist',
                ],
                'cta_label' => 'Enroll Now',
                'cta_href'  => UrlRewriter::local('https://aapscm.org/course/american-certified-sustainable-procurement-ethical-sourcing-professional-ac-spesp/'),
            ],
            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes',             'value' => "Exam (AC-SGPES)\u{00ae}"],
                    ['label' => 'Exam Details',           'value' => 'The Sustainable Green Procurement & Ethical Sourcing certification exam focuses on integrating sustainability principles and ethical practices into procurement processes to achieve environmental, social, cybersecurity and governance (ESG) goals while fostering responsible supply chain management.'],
                    ['label' => 'Number of Questions',    'value' => 'Maximum of 100 questions per exam'],
                    ['label' => 'Type of Questions',      'value' => 'Multiple choice'],
                    ['label' => 'Length of Test',         'value' => '120 Minutes'],
                    ['label' => 'Passing Score',          'value' => '600 (on a scale of 1000)'],
                    ['label' => 'Recommended Experience', 'value' => 'No prior experience necessary'],
                    ['label' => 'Languages',              'value' => 'English'],
                    ['label' => 'Retirement',             'value' => 'None'],
                    ['label' => 'Testing Provider',       'value' => 'Affiliate Partners Testing Centers Online Testing'],
                    ['label' => 'Price',                  'value' => '$399.99 USD'],
                ],
            ],
            'training_options' => [
                'check_icon' => $check,
                'options' => [
                    [
                        'text'      => 'Self-Paced Training, Exam Fees: Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=22217'),
                    ],
                    [
                        'text'      => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-american-certified-sustainable-procurement-ethical-sourcing-professional-acspesp/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'american-certified-sustainable-procurement-ethical-sourcing-professional'],
            [
                'title'            => "Sustainable Green Procurement & Ethical Sourcing Professional (AC-SGPES)\u{00ae}",
                'content'          => null,
                'excerpt'          => 'With an increasing focus on sustainability, this program would educate professionals on green procurement practices, sourcing ethically, and managing suppliers who follow environmental and social governance (ESG) criteria.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "American Certified Sustainable Procurement & Ethical Sourcing Professional (AC-SPESP)\u{00ae} - AAPSCM\u{00ae}",
                'meta_description' => "Sustainable Green Procurement & Ethical Sourcing Professional (AC-SGPES)\u{00ae} \u{2014} Overview: With an increasing focus on sustainability, this program would educate professionals on green procurement practices, sourcing ethically, and managing suppliers who follow environmental and social governance (ESG) criteria. Key Topics: The program covers green procurement, ethical sourcing, supplier sustainability assessments, ESG standards, and circular economy strategies.",
                'show_in_nav'      => false,
            ],
        );
    }
}
