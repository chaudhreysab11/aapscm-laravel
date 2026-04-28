<?php

declare(strict_types=1);

/**
 * Page data for /executive-diploma-in-ai-powered-supplier-risk-compliance-esg-management-ed-srceai/
 *
 * Extracted verbatim from the live WordPress page on 2026-04-27. Source typos
 * preserved as-is, including:
 *   - outcomes.intro:                 "ED-AIPST diploma" (this page references the AIPST sibling)
 *   - modules.capstone.title:         space before colon — "Capstone Project :Supplier Risk..."
 *   - assessment.options[1].items[0]: "Full dashboard + risk assessment submissionof AI Procurement Transformation Plan"
 *   - delivery.intro_blocks[1].items[3]: "Eecutive Diploma + Certification" (missing leading "x")
 *   - careers.intro:                  trailing-paragraph wrapper kept by source
 *
 * URLs are passed through Database\Seeders\Support\UrlRewriter at seed time.
 */

return [
    'hero' => [
        'heading'   => 'Executive Diploma in AI-Powered Supplier Risk, Compliance & ESG Management (ED-SRCEAI)®',
        'paragraphs' => [
            'The Executive Diploma in AI-Powered Supplier Risk, Compliance & ESG Management (ED-SRCEAI)® is an advanced professional program designed to equip supply chain, procurement, and compliance leaders with cutting-edge knowledge and tools to manage modern risk environments using Artificial Intelligence, predictive analytics, blockchain, and ESG scoring frameworks.',
            'As organizations face increasing scrutiny related to ESG performance, ethical sourcing, regulatory compliance, and supply chain transparency, this diploma trains executives to proactively identify, assess, predict, and mitigate supplier risks using next-generation digital tools. Learners gain hands-on experience with AI-driven anomaly detection, natural language processing for automated due diligence, blockchain-based traceability, and ESG analytics dashboards.',
            'This program is aligned with global standards such as ISO 20400 (Sustainable Procurement), ISO 26000 (Social Responsibility), ISO 37301 (Compliance Management Systems), ISO 31000 (Risk Management), ISO 28000 (Supply Chain Security), and ISO/IEC 42001 (Artificial Intelligence Management Systems)—ensuring participants are trained at an internationally recognized level of competence and compliance.',
        ],
        'images' => [
            'https://aapscm.org/wp-content/uploads/2026/01/1-36.png',
        ],
    ],

    'audience' => [
        'image'   => 'https://aapscm.org/wp-content/uploads/2026/01/1-38.png',
        'heading' => 'Target Audience',
        'items'   => [
            'Supplier Risk & Business Continuity',
            'Compliance, Governance, and Ethics',
            'ESG and Sustainability',
            'Internal Audit & Supply Chain Assurance',
            'Procurement, Sourcing, and Vendor Management',
            'Supply Chain & Operational Risk Management',
        ],
    ],

    'outcomes' => [
        'heading' => 'Program Learning Outcomes',
        'intro'   => 'Upon successful completion of the ED-AIPST diploma, participants will be able to:',
        'cards'   => [
            [
                'image' => 'https://aapscm.org/wp-content/uploads/2026/01/organization.png',
                'title' => 'Supplier Risk & Predictive Intelligence',
                'items' => [
                    'Build and use AI-driven supplier risk models for early detection of disruptions and vulnerabilities.',
                    'Apply ML algorithms to identify red flags, detect anomalies, and predict supplier failures.',
                ],
            ],
            [
                'image' => 'https://aapscm.org/wp-content/uploads/2026/01/practice.png',
                'title' => 'ESG Compliance & Sustainability Analytics',
                'items' => [
                    'Analyze ESG performance using global frameworks (GRI, SASB, TCFD).',
                    'Construct AI-enabled ESG scoring and reporting dashboards that accelerate investor and regulatory transparency.',
                ],
            ],
            [
                'image' => 'https://aapscm.org/wp-content/uploads/2026/01/strategic.png',
                'title' => 'Governance, Compliance & Due Diligence',
                'items' => [
                    'Apply ISO risk and compliance standards to strengthen corporate governance.',
                    'Design AI-powered automated due diligence workflows using NLP and document intelligence.',
                ],
            ],
            [
                'image' => 'https://aapscm.org/wp-content/uploads/2026/01/ai.png',
                'title' => 'Blockchain & Traceability',
                'items' => [
                    'Implement blockchain solutions for supplier traceability, auditability, and ethical sourcing.',
                    'Use smart contracts to automate compliance obligations.',
                ],
            ],
            [
                'image' => 'https://aapscm.org/wp-content/uploads/2026/01/risk-management.png',
                'title' => 'Fraud Detection, Audit & Reporting',
                'items' => [
                    'Deploy AI tools to detect fraud, corruption, collusion, contract manipulation, and procurement irregularities.',
                    'Automate compliance reporting with AI dashboards, alerts, and audit trails.',
                ],
            ],
            [
                'image' => null,
                'title' => 'Leadership & Strategic Decision-Making',
                'items' => [
                    'Lead ESG transformation initiatives within complex organizations',
                    'Build long-term supplier resilience through strategic sustainability and compliance integration.',
                ],
            ],
        ],
    ],

    'modules' => [
        'heading'    => 'Program Structure & Modules',
        'subheading' => '8 Modules + Capstone Project',
        'cards' => [
            [
                'image' => 'https://aapscm.org/wp-content/uploads/2026/01/1-15.png',
                'title' => 'Foundations of Supplier Risk Intelligence & Predictive Analytics',
                'items' => [
                    'Types of supplier risk: strategic, financial, operational, geopolitical, cybersecurity',
                    'Introduction to predictive AI risk modeling',
                    'Machine learning models for supplier risk scoring',
                    'Data sources: financial indicators, sanctions lists, compliance registries, ESG ratings',
                ],
            ],
            [
                'image' => 'https://aapscm.org/wp-content/uploads/2026/01/1-16.png',
                'title' => 'Global ESG Frameworks, Standards & Sustainability Regulations',
                'items' => [
                    'Overview of ESG and its relevance to modern procurement',
                    'ISO 20400 (Sustainable Procurement) and ISO 26000 (Social Responsibility)',
                    'Global reporting standards: GRI, SASB, TCFD, CDP, UN Global Compact',
                    'Building ESG scoring models using sustainability datasets',
                ],
            ],
            [
                'image' => 'https://aapscm.org/wp-content/uploads/2026/01/1-17.png',
                'title' => 'AI-Driven Compliance Management & Due Diligence Automation',
                'items' => [
                    'ISO 37301 (Compliance Management Systems)',
                    'NLP for contract review, compliance checks, and policy interpretation',
                    'Automated due diligence (KYV, KYS, sanctions screening)',
                    'AI tools for compliance monitoring and reporting',
                ],
            ],
            [
                'image' => 'https://aapscm.org/wp-content/uploads/2026/01/1-18.png',
                'title' => 'Blockchain, Smart Contracts & Ethical Procurement Traceability',
                'items' => [
                    'Blockchain fundamentals applied to risk and ESG',
                    'Smart contracts for automated supplier compliance',
                    'Traceability solutions for ethical sourcing (minerals, agriculture, manufacturing)',
                    'Integrating blockchain into supplier registries and audit systems',
                ],
            ],
            [
                'image' => 'https://aapscm.org/wp-content/uploads/2026/01/1-19.png',
                'title' => 'AI-Enhanced Fraud Detection, Audit Automation & Ethics Management',
                'items' => [
                    'Fraud risk models and anomaly detection',
                    'AI-driven forensic analysis of supplier transactions',
                    'Audit automation and digital compliance controls',
                    'Anti-corruption frameworks (FCPA, UK Bribery Act)',
                ],
            ],
            [
                'image' => 'https://aapscm.org/wp-content/uploads/2026/01/1-20.png',
                'title' => 'Strategic ESG & Risk Reporting Using AI Dashboards',
                'items' => [
                    'Building ESG dashboards with BI platforms',
                    'Predictive alerts, scorecards & real-time monitoring',
                    'Heat maps, risk matrices & KPI frameworks',
                    'Automated sustainability reporting',
                ],
            ],
            [
                'image' => 'https://aapscm.org/wp-content/uploads/2026/01/1-21.png',
                'title' => 'Crisis Response, Supplier Resilience & Business Continuity Planning',
                'items' => [
                    'Business continuity planning (BCP) using AI simulations',
                    'Supplier resilience modeling',
                    'Risk mitigation playbooks',
                    'Stakeholder communication strategies during disruptions',
                ],
            ],
            [
                'image' => 'https://aapscm.org/wp-content/uploads/2026/01/1-22.png',
                'title' => 'Leadership, Governance & Ethical Decision-Making in AI-Driven Sustainability',
                'items' => [
                    'Ethical considerations in AI-driven ESG assessments',
                    'Governance models for sustainability, risk, and compliance',
                    'Leading ESG transformation across global supply chains',
                    'Policies, culture, and organizational alignment',
                ],
            ],
        ],
        'capstone' => [
            'image' => 'https://aapscm.org/wp-content/uploads/2026/01/1-40.png',
            'title' => 'Capstone Project :Supplier Risk, Compliance & ESG Intelligence Dashboard',
            'intro' => 'Learners select a real or simulated organization and develop a full AI-enabled Supplier Risk & ESG Dashboard, including:',
            'items' => [
                'ESG scoring methodology',
                'Predictive risk modeling',
                'AI-enhanced due diligence system',
                'Blockchain traceability proposal',
                'Supplier risk heat map & compliance scorecard',
                'Automated reporting framework',
            ],
            'closing' => 'Each capstone is evaluated for accuracy, innovation, risk maturity, and practical implementation.',
        ],
    ],

    'duration' => [
        'heading' => 'Program Duration & Format',
        'cards'   => [
            [
                'image' => 'https://aapscm.org/wp-content/uploads/2026/01/1-25.png',
                'title' => 'Three-Month Executive Weekend Training',
                'items' => [
                    'Total Duration: 12 Weeks (3 Months)',
                    'Total Hours: 72 training hours',
                ],
            ],
            [
                'image' => 'https://aapscm.org/wp-content/uploads/2026/01/1-26.png',
                'title' => 'Schedule',
                'items' => [
                    'Fridays: 1-hour strategy session',
                    'Saturdays: 5-hour practical workshops & AI risk labs',
                ],
            ],
            [
                'image' => 'https://aapscm.org/wp-content/uploads/2026/01/1-27.png',
                'title' => 'Mode',
                'items' => [
                    'Cohort-Based Learning (group environment)',
                    'Individual Executive Track (personalized learning path)',
                ],
            ],
        ],
    ],

    'assessment' => [
        'heading' => 'Assessment Options',
        'intro'   => 'Learners may choose between two professional assessment pathways:',
        'image'   => 'https://aapscm.org/wp-content/uploads/2026/01/1-41.png',
        'options' => [
            [
                'title' => 'Option 1: Multiple-Choice Certification Examination',
                'items' => [
                    '100 MCQs',
                    '90 minutes',
                    'Passing score: 70%',
                    'Online proctored',
                    'Covers all 8 modules and ESG standards',
                ],
            ],
            [
                'title' => 'Option 2: Capstone Project Completion',
                'items' => [
                    'Full dashboard + risk assessment submissionof AI Procurement Transformation Plan',
                    'Oral defense presentation to AAPSCM academic board',
                    'Evaluated on ESG accuracy, AI integration, governance, and innovation',
                ],
            ],
        ],
        'closing' => 'Both options award the same diploma and professional certification.',
    ],

    'accreditation' => [
        'heading'      => 'Accreditation & Standards Alignment',
        'intro'        => 'This diploma aligns with the following global ISO/ANSI standards:',
        'standards'    => [
            ['image' => 'https://aapscm.org/wp-content/uploads/2026/01/iso-symbol.png',   'title' => 'ISO 20400',       'text' => 'Sustainable Procurement'],
            ['image' => 'https://aapscm.org/wp-content/uploads/2026/01/award.png',        'title' => 'ISO 26000',       'text' => 'Social Responsibility'],
            ['image' => 'https://aapscm.org/wp-content/uploads/2026/01/iso.png',          'title' => 'ISO 37301',       'text' => 'Compliance Management Systems'],
            ['image' => 'https://aapscm.org/wp-content/uploads/2026/01/iso-1.png',        'title' => 'ISO 31000',       'text' => 'Risk Management Principles'],
            ['image' => 'https://aapscm.org/wp-content/uploads/2026/01/iso-symbol-1.png', 'title' => 'ISO 28000',       'text' => 'Supply Chain Security Management'],
            ['image' => 'https://aapscm.org/wp-content/uploads/2026/01/award.png',        'title' => 'ISO/IEC 42001',   'text' => 'Artificial Intelligence Management Systems'],
            ['image' => 'https://aapscm.org/wp-content/uploads/2026/01/iso.png',          'title' => 'ANSI/ISO 17024',  'text' => 'Personnel Certification Requirements'],
        ],
    ],

    'awards' => [
        'heading' => 'Diploma & Certification Awarded',
        'intro'   => 'Upon successful completion, participants receive:',
        'cards'   => [
            [
                'image' => 'https://aapscm.org/wp-content/uploads/2026/01/1-28.png',
                'title' => 'Executive Diploma',
                'text'  => 'Executive Diploma in AI-Powered Supplier Risk, Compliance & ESG Management (ED-SRCEAI)® Recognized internationally under AAPSCM® U.S. Charter.',
            ],
            [
                'image' => 'https://aapscm.org/wp-content/uploads/2026/01/1-29.png',
                'title' => 'Professional Certification Award',
                'text'  => 'Certified Supplier Risk, Compliance & ESG Intelligence Professional (CSRCEIP™) Awarded to those who complete the exam or capstone.',
            ],
        ],
        'participants_label' => 'Participants receive',
        'participants_items' => [
            'Digital credentials + badges',
            'Hardcopy certificate',
            'Global verification registry listing',
            'Eligibility for advanced membership tiers',
        ],
    ],

    'careers' => [
        'image'   => 'https://aapscm.org/wp-content/uploads/2026/01/Untitled-3.png',
        'heading' => 'Career Pathways',
        'intro'   => 'Graduates of this program excel in roles such as:',
        'items'   => [
            'Supplier Risk Manager',
            'ESG Procurement Lead',
            'Chief Compliance Officer',
            'Sustainability & Ethical Sourcing Manager',
            'Internal Audit & Governance Director',
            'Supply Chain Transparency Analyst',
            'Risk & Resilience Program Lead',
        ],
    ],

    'fees' => [
        'heading' => 'Program Fee & Payment Options',
        'intro'   => 'The Executive Diploma Program is offered at a total program fee of $4,800, covering all instructional sessions, course materials, AI labs, assessments, and certification processing. Participants may choose from two flexible payment options designed to accommodate individual and organizational budgets.',
        'cards'   => [
            [
                'image'    => 'https://aapscm.org/wp-content/uploads/2026/01/1-32.png',
                'title'    => 'Weekly Payment Plan — $1,500',
                'subtitle' => 'Participants may enroll through a flexible weekly payment plan',
                'items'    => [
                    '$1,500 per week',
                    'Payments must be completed prior to receiving the diploma and certification',
                    'Ideal for candidates seeking short-term installment flexibility',
                ],
            ],
            [
                'image'    => 'https://aapscm.org/wp-content/uploads/2026/01/1-33.png',
                'title'    => 'Full Payment — $4,800',
                'subtitle' => 'Participants may also pay the full tuition upfront',
                'items'    => [
                    '$4,800 total program fee',
                    'One-time payment covering the full 12-week Executive Diploma',
                    'Available for Virtual or In-Seat / In-Class training formats',
                ],
            ],
        ],
    ],

    'delivery' => [
        'heading' => 'Training Delivery Locations',
        'intro_blocks' => [
            [
                'image' => 'https://aapscm.org/wp-content/uploads/2026/01/1-34.png',
                'lead'  => 'Participants may choose either',
                'items' => [
                    'Virtual Instructor-Led Training (Global Access)',
                    'In-Seat / In-Class Training at the AAPSCM® Conference & Training Center: 1901 Main Street, Floor 18, Columbia, SC 29201',
                ],
            ],
            [
                'image' => 'https://aapscm.org/wp-content/uploads/2026/01/1-35.png',
                'lead'  => 'Both formats provide full access',
                'items' => [
                    'AI Labs',
                    'Digital Learning Portals',
                    'Assessments (Exam or Capstone)',
                    'Eecutive Diploma + Certification',
                ],
            ],
        ],
    ],

    'fee_table' => [
        'headers' => ['Program Fee Structure', 'Details', 'Amount'],
        'rows'    => [
            ['Full Program Fee',                    'One-time payment covering all 12-week sessions, AI labs, materials, assessments, diploma + certification', '$4,800'],
            ['Weekly Payment Plan',                 'Flexible weekly installment plan (must be paid before issuance of diploma/certification)',                '$1,500 per week'],
            ['Training Format – Virtual',           'Live instructor-led sessions + digital resources + AI labs',                                                'Included in the fee'],
            ['Training Format – In-Seat / In-Class','Instructor-led physical classes at AAPSCM® Training & Conference Center',                                  'Included in the fee'],
            ['Training Location',                   '1901 Main Street, Floor 18, Columbia, SC 29201',                                                            'On-site option available'],
        ],
    ],

    'cta' => [
        'options' => [
            [
                'label'     => 'Weekly Payment Plan — $1,500:',
                'cta_label' => 'Purchase and Pay',
                'cta_href'  => 'https://aapscm.org/checkout/?add-to-cart=46523',
            ],
            [
                'label'     => 'Full Payment — $4,800:',
                'cta_label' => 'Purchase and Pay',
                'cta_href'  => 'https://aapscm.org/checkout/?add-to-cart=46521',
            ],
            [
                'label'     => 'Download Brochure:',
                'cta_label' => 'Download',
                'cta_href'  => '#',
            ],
        ],
    ],
];
