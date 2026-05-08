<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/aapscm-training-virtual-american-certified-procurement-leadership-change-management-specialist-acplcms/
 *
 * Layout: why_cert (image + About + paragraph) → topics (Program Highlights 5 bullets + img)
 *         → modules (8 cards) → training_header → trainers (3) → schedule (43 dates ending SEPT 2028)
 */
class AapscmTrainingVirtualAmericanCertifiedProcurementLeadershipChangeManagementSpecialistAcplcmsPageSeeder extends Seeder
{
    private const TIME_LABEL  = '4-Day Training';
    private const FEES_LABEL  = '$1,200';
    private const ORG_NAME    = "American Association of Procurement, Supply Chain and Tourism Management (AAPSCM)\u{00ae}";
    private const ORG_STREET  = '2701 Little Elm Pkwy Ste 100 Little Elm, TX 75068';
    private const ORG_EMAIL   = 'info@aapscm.org';
    private const ORG_FAX     = 'Fax : +1-(605)608-3078';
    private const MODULE_ICON = 'https://aapscm.org/wp-content/uploads/2024/12/1-3.png';

    private static function info(string $phone): array
    {
        return [
            'time'    => self::TIME_LABEL,
            'fees'    => self::FEES_LABEL,
            'address' => [
                'org'    => self::ORG_NAME,
                'street' => self::ORG_STREET,
                'phone'  => $phone,
                'email'  => self::ORG_EMAIL,
                'fax'    => self::ORG_FAX,
            ],
        ];
    }

    private static function module(string $title, string $desc): array
    {
        return [
            'icon'  => UrlRewriter::image(self::MODULE_ICON),
            'title' => $title,
            'desc'  => $desc,
        ];
    }

    public function run(): void
    {
        $pageData = [
            'hero' => [
                'title' => "American Certified Procurement Leadership & Change Management Professional(AC-PLCM)\u{00ae}",
            ],
            'why_cert' => [
                'image'   => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/06/1.jpg'),
                'heading' => "About AC-PLCMS\u{00ae}",
                'body'    => 'Overview: Effective procurement requires not only strategic thinking but also strong leadership skills to navigate change and drive organizational success. The Procurement Leadership and Change Management program empowers professionals with the skills to lead teams, implement transformative procurement strategies, and manage change within procurement functions. This program is designed for professionals looking to advance into leadership roles and shape the future of procurement through vision, influence, and strategic direction.',
            ],
            'topics' => [
                'heading' => 'Program Highlights',
                'items'   => [
                    'Leadership Skills for Procurement',
                    'Strategic Decision-Making',
                    'Change Management Fundamentals',
                    'Building High-Performing Teams',
                    'Influence and Stakeholder Engagement',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/06/img.png'),
            ],
            'modules' => [
                'heading' => 'Program Structure and Modules',
                'items'   => [
                    self::module('Introduction to Leadership in Procurement',                        'Explore the role of leadership in procurement, understanding how strong leaders drive procurement success and organizational impact.'),
                    self::module('Key Leadership Skills for Procurement Professionals',              'Develop core leadership skills tailored to procurement, including communication, conflict resolution, and decision-making.'),
                    self::module('Strategic Decision-Making in Procurement',                          'Learn how to make informed, strategic decisions that support organizational goals and procurement efficiency.'),
                    self::module('Fundamentals of Change Management',                                 'Understand change management principles and learn how to lead teams through procurement changes effectively.'),
                    self::module('Building and Managing High-Performing Teams',                       'Gain skills in team building, motivation, and performance management to create a cohesive and productive procurement team.'),
                    self::module('Stakeholder Engagement and Influence',                              'Master the art of influencing and engaging stakeholders, ensuring alignment and support for procurement initiatives.'),
                    self::module('Leading Procurement Transformation Projects',                       'Learn to design and implement procurement transformation projects, from planning and communication to execution and evaluation.'),
                    self::module('Capstone Project: Developing a Leadership Strategy for Procurement Change', 'Apply your learning by creating a leadership strategy for a procurement transformation initiative, focusing on change management, team leadership, and stakeholder engagement.'),
                ],
            ],
            'training_header' => [
                'heading' => "AC-PLCMS\u{00ae} Virtual/Online Instructor-led 4-day Training",
            ],
            'trainers' => [
                [
                    'tab_label' => 'Gleb Mikulich',
                    'avatar'    => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/07/Ellipse-3.png'),
                    'name'      => "Gleb Mikulich \u{2013} AAPSCM\u{00ae} Executive Trainer | Supply Chain Strategist | Digital Transformation Leader",
                    'bio'       => 'Gleb Mikulich is a seasoned professional with over a decade of expertise in supply chain, procurement, logistics, and digital transformation. He has collaborated with globally recognized organizations, including Accenture, Procter & Gamble (P&G), Pfizer, CNH Industrial, and Mediterranean Shipping Company, delivering impactful solutions across diverse industries.',
                    'badges' => [
                        ['title' => 'Industry-leading experience in Global Supply Chain Operations',     'text' => 'Gleb has collaborated with top-tier industry leaders such as Accenture, Procter & Gamble, Pfizer, CNH, and Mediterranean Shipping Company, delivering measurable results in supply chain integration, procurement modernization, and performance optimization.'],
                        ['title' => 'Certified Supply Chain & Project Management Expert',                'text' => 'Gleb holds industry-recognized credentials, including: o SCPro Certified (Council of Supply Chain Management Professionals) o Additional certifications in Lean Six Sigma Green Belt, PMP, and PMI-ACP, showcasing his multidisciplinary expertise in process improvement, agile project leadership, and operational efficiency.'],
                        ['title' => 'Advanced Academic Credentials in Strategy & Digital Technologies', 'text' => 'Gleb earned an MBA from IE Business School, with a concentration in strategy, operations, and digital technologies, and pursued advanced supply chain management training through MITx, equipping him with cutting-edge insights into global logistics, data-driven decision-making, and tech-enabled supply chains.'],
                        ['title' => 'Recognized Leader & Emerging Talent in the Field',                  'text' => 'Gleb is the recipient of the Young Professionals Emerging Leader Award from the Council of Supply Chain Management Professionals (CSCMP), and a lifetime member of Beta Gamma Sigma, a recognition of academic excellence and leadership in business education.'],
                    ],
                    'info' => self::info('+1-469-991-5228'),
                ],
                [
                    'tab_label' => 'Dr. Jason Matyus',
                    'avatar'    => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/07/Ellipse-4.png'),
                    'name'      => "Dr. Jason Matyus \u{2013} Advisory Board Executive Director, Training, Course Development, and Examination",
                    'bio'       => "Dr. Matyus is the Advisory Board Director for Course Development, Training, and Examination. Dr. Jason Matyus\u{2019}s career spans many disciplines. Dr. Matyus started as a public school teacher. After leaving teaching he worked for 20 years as a business professional working for two Fortune 500 Companies. Within those 20 years, he had varying roles that touched Project Management, logistics and Supply Chain, Procurement, Corporate Trainer, and Leadership. After receiving his MBA in Leadership and Doctorate in Business Management, he spent the last 5 years in higher education. In addition to his work in business, he is also on the Board of Directors for Cornerstone Care and the Carmichaels Area School District Board of Education and currently serves on the Farmville Urban Development Board.",
                    'badges'    => [],
                    'info'      => self::info('+1-(833) 524-2846'),
                ],
                [
                    'tab_label' => 'James Raussen',
                    'avatar'    => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/06/Group-1.png'),
                    'name'      => "James Raussen \u{2013} AAPSCM\u{00ae} Executive Trainer, Key Speaker & Strategic Advisor",
                    'bio'       => "James Raussen is a distinguished Executive Trainer and Global Strategic Advisor with the American Association of Procurement & Supply Chain Management (AAPSCM\u{00ae}). With a dynamic career that bridges public leadership and private-sector transformation, James brings over two decades of expertise in government innovation, international consulting, fiscal strategy, and executive development.",
                    'badges' => [
                        ['title' => '$2B Budget Oversight & Operational Leadership',     'text' => 'As former Managing Deputy Comptroller for the City of Chicago, the third-largest city in the U.S., James managed over $2 billion in operational activities within a $7B municipal budget. His leadership encompassed intergovernmental initiatives, NATO Summit planning, and citywide fiscal modernization.'],
                        ['title' => 'Global Executive Consultant',                         'text' => 'James has led high-impact strategic engagements for global brands, including Unilever, Heineken, and Thales, as well as public sector clients in Vietnam, Brunei, and Saudi Arabia through SEA Solutions. His work focuses on procurement reform, policy advisory, and risk-managed expansion in international markets.'],
                        ['title' => 'Public Sector Innovator',                             'text' => "As Director of Oregon\u{2019}s $1.6B educator benefits program, James spearheaded a comprehensive overhaul of procurement, vendor management, and executive processes\u{2014}enhancing efficiency and governance for over 150,000 members."],
                        ['title' => 'Recognized U.S. Policymaker',                         'text' => "Elected as an Ohio State Representative, James served as Vice Chair of the Health & Insurance Committees. He was nationally honored as one of the \u{201C}Top 40 Under 40\u{201D} and named \u{201C}Rookie Legislator of the Year\u{201D} for his leadership in bipartisan policy reform and public accountability."],
                        ['title' => 'Executive Leadership Trainer & Cross-Cultural Coach', 'text' => "At AAPSCM\u{00ae}, James designs and delivers advanced executive training programs in leadership, procurement ethics, cross-cultural strategy, and risk management. He empowers multinational executives, procurement professionals, and SMEs to lead with clarity and resilience in complex, global environments."],
                    ],
                    'closing'   => "James Raussen continues to be a sought-after voice in public-private collaboration, policy transformation, and supply chain governance, bringing exceptional value to AAPSCM\u{2019}s global training network.",
                    'info'      => self::info('+1-(833) 524-2846'),
                ],
            ],
            'schedule' => [
                'label'        => "(AC-PLCM)\u{00ae}",
                'placeholder'  => 'Choose an option',
                'options' => [
                    'FEB 7-11, 2026 (+$1,200.00)', 'FEB 15-20, 2026 (+$1,200.00)', 'FEB 22-26, 2026 (+$1,200.00)',
                    'MAR 1-5, 2026 (+$1,200.00)', 'MAR 7-11, 2026 (+$1,200.00)', 'MAR 13-17, 2026 (+$1,200.00)', 'MAR 20-24, 2026 (+$1,200.00)',
                    'APR 1-4, 2026 (+$1,200.00)', 'APR 6-10, 2026 (+$1,200.00)', 'APR 12-16, 2026 (+$1,200.00)', 'APR 18-22, 2026 (+$1,200.00)', 'APR 25-29, 2026 (+$1,200.00)',
                    'MAY 1-4, 2026 (+$1,200.00)', 'MAY 15-19, 2026 (+$1,200.00)', 'MAY 22-26, 2026 (+$1,200.00)',
                    'JUN 1-4, 2026 (+$1,200.00)', 'JUN 7-11, 2026 (+$1,200.00)', 'JUN 15-19, 2026 (+$1,200.00)', 'JUN 22-26, 2026 (+$1,200.00)',
                    'JUL 1-4, 2026 (+$1,200.00)', 'JUL 6-11, 2026 (+$1,200.00)', 'JUL 15-19, 2026 (+$1,200.00)', 'JUL 25-29, 2026 (+$1,200.00)',
                    'AUG 1-4, 2026 (+$1,200.00)', 'AUG 6-10, 2026 (+$1,200.00)', 'AUG 15-19, 2026 (+$1,200.00)', 'AUG 25-29, 2026 (+$1,200.00)',
                    'OCT 1-4, 2026 (+$1,200.00)', 'OCT 6-10, 2026 (+$1,200.00)', 'OCT 15-19, 2026 (+$1,200.00)', 'OCT 25-29, 2026 (+$1,200.00)',
                    'NOV 1-4, 2026 (+$1,200.00)', 'NOV 6-11, 2026 (+$1,200.00)', 'NOV 15-19, 2026 (+$1,200.00)', 'NOV 25-29, 2026 (+$1,200.00)',
                    'DEC 1-4, 2026 (+$1,200.00)', 'DEC 6-11, 2026 (+$1,200.00)', 'DEC 15-19, 2026 (+$1,200.00)',
                    'JAN 15-19, 2027 (+$1,200.00)', 'JAN 21-25, 2027 (+$1,200.00)',
                    'SEPT 1-4, 2028 (+$1,200.00)', 'SEPT 6-11, 2028 (+$1,200.00)', 'SEPT 15-19, 2028 (+$1,200.00)', 'SEPT 25-29, 2028 (+$1,200.00)',
                ],
                'cta_label' => 'Schedule Training',
                'cta_href'  => UrlRewriter::local('https://aapscm.org/my-account/'),
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'aapscm-training-virtual-american-certified-procurement-leadership-change-management-specialist-acplcms'],
            [
                'title'            => "Instructor-led virtual training - American Certified Procurement Leadership & Change Management Professional(AC-PLCM)\u{00ae}",
                'content'          => null,
                'excerpt'          => "AAPSCM\u{00ae} 4-day virtual/online instructor-led training for the American Certified Procurement Leadership & Change Management Professional (AC-PLCM)\u{00ae} certification. $1,200. Lead procurement teams and drive transformative change.",
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "Instructor-led virtual training - American Certified Procurement Leadership & Change Management Professional (AC-PLCM)\u{00ae} - AAPSCM\u{00ae}",
                'meta_description' => "Enroll in the AAPSCM\u{00ae} 4-day virtual/online instructor-led AC-PLCM\u{00ae} training for $1,200. Live sessions led by industry experts; multiple 2026 / 2027 / 2028 dates available.",
                'show_in_nav'      => false,
            ],
        );
    }
}
