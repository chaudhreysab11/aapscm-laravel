<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class CorporateMembershipPageSeeder extends Seeder
{
    public function run(): void
    {
        $img = '/storage/cms-images';

        $pageData = [
            'hero' => [
                'image_left'  => $img.'/2024/12/1-1.jpg',
                'image_right' => $img.'/2024/12/25.jpg',
                'eyebrow'     => 'Corporate Membership',
                'heading'     => 'The Importance of Becoming a Corporate Member and Earning Certifications',
                'subheading'  => 'Corporate membership in a professional organization and earning certifications offer numerous strategic benefits for organizations and their employees. Here’s why it’s a critical investment:',
                'button_text' => 'Join Today',
                'button_url'  => '#application-fm',
            ],

            'importance_icon' => $img.'/2024/12/1-3.png',

            'importance' => [
                ['title' => 'Professional Credibility and Industry Recognition', 'text' => "Becoming a corporate member demonstrates an organization's commitment to industry excellence and professional development. Certifications earned through corporate membership signify that the company and its employees meet high standards of expertise, ethics, and competency recognized globally."],
                ['title' => 'Competitive Advantage', 'text' => 'Corporate membership often provides access to exclusive tools, resources, and networks that help companies stay ahead of industry trends. Certifications equip employees with cutting-edge skills, enabling the organization to implement innovative practices and maintain a competitive edge.'],
                ['title' => 'Workforce Development and Talent Retention', 'text' => 'Corporate membership typically includes training programs, webinars, and access to certifications that enhance employee skills. This investment in professional growth not only improves productivity but also boosts employee morale and retention, as individuals feel valued and empowered.'],
                ['title' => 'Networking and Industry Collaboration', 'text' => 'Corporate members often gain access to a global network of industry professionals and experts. This fosters collaboration, partnerships, and business opportunities while allowing the organization to benchmark against best practices in the industry.'],
                ['title' => 'Access to Exclusive Resources', 'text' => 'Membership benefits may include access to research publications, templates, frameworks, and industry data that provide insights into emerging trends and opportunities. Certified professionals can leverage these tools to implement efficient strategies and solve complex challenges.'],
                ['title' => 'Enhanced Reputation and Market Positioning', 'text' => "Being part of a recognized organization and having certified employees builds trust with clients, stakeholders, and partners. It signals a commitment to excellence, quality, and staying updated with industry standards, improving the organization's reputation and market positioning."],
                ['title' => 'Global Recognition and Expansion Opportunities', 'text' => 'Certifications obtained through corporate membership are often internationally recognized, enabling companies to operate in global markets confidently. This opens doors for international partnerships and expansion into new regions.'],
                ['title' => 'Financial Benefits and Cost Savings', 'text' => 'Corporate memberships often come with discounted rates on certifications, training, and events, saving the organization money while ensuring continued access to high-quality professional development opportunities.'],
                ['title' => 'Compliance and Risk Management', 'text' => 'Earning certifications ensures that employees are trained in industry standards and compliance regulations, reducing the risk of non-compliance. This is particularly critical in industries with stringent operational or legal requirements.'],
            ],

            'conclusion' => "Conclusion\nCorporate membership and certifications are invaluable tools for organizations seeking to excel in their industries. They strengthen credibility, enhance workforce capabilities, and ensure sustained growth and competitiveness in an ever-evolving global landscape.",

            'training_eyebrow' => 'Training Opportunities',

            'advantages' => [
                'heading' => 'Advantages of Corporate Membership with Inclusive Training in Procurement and Supply Chain Management',
                'subheading' => 'Corporate membership in a professional organization, coupled with inclusive training in procurement and supply chain management, provides businesses with a comprehensive approach to improving operational efficiency, workforce expertise, and industry credibility. Here are the key advantages:',
                'items' => [
                    [
                        'number' => '01',
                        'title'  => 'Workforce Development and Expertise Enhancement',
                        'text'   => 'Inclusive training programs offered through corporate membership ensure that employees at all levels acquire advanced skills in procurement and supply chain management. This targeted development leads to:',
                        'features' => [
                            'Improved decision-making: Employees learn best practices, data-driven approaches, and innovative techniques to streamline procurement processes.',
                            '<b>Operational efficiency</b>: Training equips staff with tools and methods to optimize supply chain performance, reduce costs, and improve lead times.',
                        ],
                    ],
                    [
                        'number' => '02',
                        'title'  => 'Access to Specialized Resources and Tools',
                        'text'   => 'Corporate members receive access to a wealth of resources designed to strengthen supply chain capabilities, such as:',
                        'features' => [
                            'Procurement templates and frameworks.',
                            'Industry case studies and research publications.',
                            'Webinars, whitepapers, and tools to enhance supply chain efficiency.',
                        ],
                        'footer' => 'These resources enable companies to implement strategic initiatives with confidence and precision.',
                    ],
                    [
                        'number' => '03',
                        'title'  => 'Networking and Collaboration Opportunities',
                        'text'   => 'Corporate membership connects businesses to a global network of procurement and supply chain professionals, fostering collaboration and partnerships. Advantages include:',
                        'features' => [
                            'Benchmarking against industry leaders.',
                            'Gaining insights into innovative practices through peer discussions.',
                            'Building relationships with suppliers and industry experts to strengthen the supply chain ecosystem.',
                        ],
                    ],
                    [
                        'number' => '04',
                        'title'  => 'Cost Savings and Financial Efficiency',
                        'text'   => 'Training programs included in corporate membership packages often come at a discounted rate, ensuring cost-effective professional development. Additionally, enhanced procurement practices learned through training can lead to:',
                        'features' => [
                            'Lower supplier costs through effective negotiation techniques.',
                            'Reduced waste and improved resource allocation in the supply chain.',
                            'Minimized risks and penalties due to improved compliance with procurement regulations.',
                        ],
                    ],
                    [
                        'number' => '05',
                        'title'  => 'Strengthened Organizational Competitiveness',
                        'text'   => 'By fostering a well-trained workforce and aligning with industry standards, organizations gain a competitive edge through:',
                        'features' => [
                            '<b>Enhanced supplier relationships</b>: Strengthened partnerships ensure a reliable and cost-effective supply chain.',
                            '<b>Improved customer satisfaction</b>: Streamlined operations lead to timely delivery and superior product quality.',
                            '<b>Strategic advantage</b>: Knowledgeable employees position the organization to outpace competitors in supply chain performance.',
                        ],
                    ],
                    [
                        'number' => '06',
                        'title'  => 'Global Recognition and Market Expansion',
                        'text'   => 'Corporate members often gain international recognition, opening pathways to global markets. Training programs equip staff with knowledge of global trade regulations, supplier networks, and cross-border procurement strategies, facilitating seamless international operations.',
                        'features' => [],
                    ],
                    [
                        'number' => '07',
                        'title'  => 'Compliance and Risk Mitigation',
                        'text'   => 'Training sessions focus on key compliance areas, such as ethical procurement, anti-corruption policies, and regulatory standards. This reduces organizational risks by:',
                        'features' => [
                            'Ensuring adherence to legal and ethical procurement practices.',
                            'Minimizing disruptions caused by supply chain vulnerabilities or compliance violations.',
                        ],
                    ],
                    [
                        'number' => '08',
                        'title'  => 'Improved Employee Retention and Morale',
                        'text'   => "Inclusive training as part of corporate membership demonstrates an organization's commitment to employee growth, leading to",
                        'features' => [
                            'Increased job satisfaction and motivation.',
                            'Higher employee retention rates as staff feel valued and empowered.',
                            'A culture of continuous learning and innovation.',
                        ],
                    ],
                    [
                        'number' => '09',
                        'title'  => 'Industry Certification and Professional Credibility',
                        'text'   => 'Corporate members often have access to training that leads to certifications in procurement and supply chain management. These certifications:',
                        'features' => [
                            'Boost the professional credibility of the workforce.',
                            'Reflect the organization’s commitment to excellence and adherence to industry standards.',
                            'Enhance client trust and stakeholder confidence.',
                        ],
                    ],
                    [
                        'number' => '10',
                        'title'  => 'Long-Term Organizational Growth',
                        'text'   => 'Investing in corporate membership with inclusive training fosters long-term growth by:',
                        'features' => [
                            'Building resilient supply chains capable of handling future challenges.',
                            'Ensuring a continuous pipeline of skilled professionals to meet organizational needs.',
                            'Strengthening the organization’s ability to innovate and lead in the procurement and supply chain sector.',
                        ],
                    ],
                ],
            ],

            'corporate_intro' => [
                'heading'  => 'Corporate Membership with AAPSCM®',
                'tagline'  => 'Empower Your Team. Elevate Your Brand. Expand Your Global Reach.',
                'text'     => 'Corporate Membership with the American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®) is a strategic opportunity for forward-thinking organizations to align with a globally respected professional body dedicated to capacity-building, workforce development, and global industry standards.',
            ],

            'corporate_advantages_intro' => [
                'heading' => 'Corporate Advantages of Joining AAPSCM®',
                'text'    => "Whether you're a multinational enterprise, a regional supply chain firm, a government agency, or a growing consultancy, Corporate Membership offers exclusive benefits that empower your people, strengthen your industry presence, and contribute to global professional excellence.",
            ],

            'aapscm_advantages' => [
                [
                    'title' => 'Corporate Advantages of Joining AAPSCM®',
                    'subtitle' => 'Enjoy up to 30% discounted rates for your:',
                    'features' => [
                        'Employees',
                        '	Mid-level Managers',
                        'Senior Executives',
                        'Procurement and Supply Chain Teams',
                    ],
                    'sub_heading' => 'This includes discounts on:',
                    'sub_features' => [
                        'All AAPSCM® professional certifications',
                        'Conferences, summits, and training programs',
                        'Onsite or virtual corporate training sessions',
                    ],
                ],
                [
                    'title' => ' Propose Proprietary Programs or Courses',
                    'subtitle' => "As a Corporate Member, you can recommend specialized or proprietary training programs relevant to your industry. Upon review and approval by our academic board, your courses may be integrated into AAPSCM’s learning portfolio and co-branded with your organization.\nExamples include:",
                    'features' => [
                        'Industry-specific modules (e.g., Oil & Gas Procurement, Defense Supply Chain)',
                        'Internal capacity-building programs',
                        'Executive leadership and innovation tracks',
                    ],
                ],
                [
                    'title' => 'Priority Access to Talent and Research',
                    'features' => [
                        'First access to our global database of certified professionals',
                        'First access to our global database of certified professionals',
                        'Participation in pilot programs and new certification launches',
                    ],
                ],
                [
                    'title' => 'Brand Visibility and Recognition',
                    'features' => [
                        'Feature your logo and profile on AAPSCM’s website as a Corporate Member',
                        'Recognition at global conferences and award ceremonies',
                        'Sponsorship and co-hosting opportunities for international events',
                    ],
                ],
                [
                    'title' => 'Dedicated Corporate Liaison',
                    'features' => [
                        'Assigned relationship manager for your organization',
                        'Quarterly briefings on industry trends and workforce development insights',
                        'Customized onboarding for your staff and HR teams',
                    ],
                ],
            ],

            'fee' => [
                'heading' => 'Annual Corporate Membership Fee: $3,000 USD',
                'subtitle' => 'This yearly membership fee includes:',
                'includes' => [
                    'Unlimited access to member-only updates and briefings',
                    'Discount eligibility for your employees and executives',
                    'Proposal rights for proprietary or custom programs',
                    'Brand listing and partnership recognition',
                    'Participation in corporate-only roundtables and advisory sessions',
                ],
                'roi_note' => '🌟ROI-Driven Membership: A single training cycle can recover your membership cost through bulk staff discounts alone.',
            ],

            'who_should_join' => [
                'heading' => 'Who Should Join?',
                'subtitle' => 'AAPSCM® Corporate Membership is ideal for:',
                'items' => [
                    'Large and mid-sized corporations with procurement and logistics functions',
                    'Consulting and advisory firms serving the supply chain or tourism sectors',
                    'Technology companies offering supply chain automation or AI solutions',
                    'Government agencies and public-sector procurement divisions',
                    'Academic institutions and corporate universities',
                ],
            ],

            'cta' => [
                'heading' => 'Become an AAPSCM® Corporate Member',
                'text'    => 'Let us help you build skilled teams, enhance global reach, and lead the future of procurement and supply chain management.',
                'email'   => 'info@aapscm.org',
                'phone'   => '+1-(833) 524-2846 , +1-(803) 998-2189',
                'mena'    => 'For MENA Region Contact: Tima Chaaban, +1-469-388-4098',
            ],

            'application_form' => [
                'heading'  => 'AAPSCM® Corporate Membership Application Form',
                'subtitle' => 'Empowering Organizations Through Professional Excellence',
                'fields' => [
                    ['label' => 'Organization Name', 'name' => 'organization_name', 'type' => 'text'],
                    ['label' => 'Legal Business Name (if different)', 'name' => 'legal_business_name', 'type' => 'text'],
                    ['label' => 'Business Registration Number', 'name' => 'business_registration_number', 'type' => 'text'],
                    ['label' => 'Year Established', 'name' => 'year_established', 'type' => 'date'],
                    ['label' => 'Number of Employees', 'name' => 'number_of_employees', 'type' => 'number'],
                    ['label' => 'Company Website', 'name' => 'company_website', 'type' => 'url'],
                    ['label' => 'Head Office Address', 'name' => 'head_office_address', 'type' => 'text'],
                    ['label' => 'Country of Registration', 'name' => 'country_of_registration', 'type' => 'text'],
                    ['label' => 'Branches/Regional Offices (if any)', 'name' => 'branches', 'type' => 'text'],
                ],
                'industry_sectors' => ['Procurement', 'Supply Chain', 'Logistics', 'E-commerce', 'Tourism', 'Other'],
                'submit_label' => 'Complete Application and Form',
            ],

            'training' => [
                'heading' => 'Corporate Training Opportunities',
                'subtitle' => 'Exclusive Access to AAPSCM® Global Certification Programs for Corporate Members',
                'text' => "As a Corporate Member of the American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®), your organization enjoys priority access to a wide array of elite certifications that empower your workforce, enhance operational excellence, and promote global recognition.\n\nThese programs are available through virtual, onsite, or hybrid training formats, with flexible scheduling tailored to your corporate calendar.",
            ],

            'training_advantages' => [
                'heading' => 'Corporate Training Advantages',
                'items' => [
                    'Up to 30% discounts on all certifications for employees and executives',
                    'Free course materials and digital exams included',
                    'Virtual exam hosting rights for internal staff',
                    'Quarterly reporting on participation and performance',
                    'Opportunity to propose proprietary or co-branded courses',
                    'Access to a dedicated training coordinator from AAPSCM',
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'corporate-membership'],
            [
                'title'            => 'Corporate Membership',
                'template'         => '',
                'status'           => 'published',
                'is_published'     => true,
                'content'          => '',
                'excerpt'          => 'AAPSCM® Corporate Membership — empower your team, elevate your brand, expand your global reach.',
                'page_data'        => $pageData,
                'meta_title'       => 'Corporate Membership - AAPSCM',
                'meta_description' => 'AAPSCM® Corporate Membership for organizations. $3,000/year. Bulk discounts, proprietary programs, brand visibility, dedicated corporate liaison, and inclusive training.',
                'show_in_nav'      => false,
            ],
        );
    }
}
