<?php

return [

    /* ─── Utility bar links ────────────────────────────────────────────── */
    'utility' => [
        ['label' => 'Home',                'path' => '/'],
        ['label' => 'About Us',            'path' => '/about-us'],
        ['label' => 'Affiliate Partners',  'path' => '/affiliate-partners'],
        ['label' => 'USA Chapters',        'path' => '/us-charters'],
        ['label' => 'Verify Certificate',  'path' => '/verify-a-certificate'],
        ['label' => 'AAPSCM® Training',    'path' => '/aapscm-training'],
    ],

    /* ─── Free Student Training sub-dropdown (utility bar) ────────────── */
    'free_training' => [
        ['label' => 'Procurement Management', 'path' => '/procurement-management'],
        ['label' => 'Supply Chain Management','path' => '/supply-chain-management'],
    ],

    /* ─── Certifications overview sidebar (mega menu left panel) ───────── */
    'cert_overview' => [
        ['label' => 'Certification Process',    'path' => '/certification-process'],
        ['label' => 'Certification FAQs',       'path' => '/certifications-faq'],
        ['label' => 'Benefits & Resources',     'path' => '/benefits-and-resources'],
        ['label' => '4 Steps to Certification', 'path' => '/4-steps-to-verification'],
        ['label' => 'Workshop / Training',      'path' => '/workshop-trainings'],
        ['label' => 'All Certifications',       'path' => '/certifications-for-professionals'],
    ],

    /* ─── Certification category cards ─────────────────────────────────── */
    'cert_categories' => [
        [
            'label'       => 'Procurement Management',
            'path'        => '/procurement-management-certifications',
            'description' => 'Strategic procurement, sourcing, risk & AI-powered programs',
            'featured'    => [
                ['ACPP®',    '/acpp'],
                ['ACPM®',    '/american-certified-procurement-manager-acpm'],
                ['CAIPP®',   '/chartered-ai-procurement-professional-caipp'],
                ['AC-PRM®',  '/american-certified-procurement-risk-management-specialist'],
            ],
        ],
        [
            'label'       => 'Supply Chain Management',
            'path'        => '/supply-chain-management-certifications',
            'description' => 'End-to-end supply chain, logistics, cybersecurity & resilience',
            'featured'    => [
                ['ACSCP®',   '/the-american-certified-supply-chain-professional-acscp'],
                ['ACSCM®',   '/chartered-supply-chain-manager-acscm'],
                ['CCP®',     '/certified-contract-professional-ccp'],
                ['CA-SCCM®', '/chartered-advanced-supply-chain-cybersecurity-manager-ca-sccm'],
            ],
        ],
        [
            'label'       => 'Tourism Management',
            'path'        => '/tourism-management-certifications',
            'description' => 'Hospitality, digital tourism, sustainable travel & AI-powered experiences',
            'featured'    => [
                ['CTM®',   '/ctm-2'],
                ['ACTP®',  '/american-certified-tourism-professional'],
                ['CSHI®',  '/certified-sustainable-hospitality-innovator-cshi'],
                ['CDTEP®', '/certified-digital-tourism-experience-professional-cdtep'],
            ],
        ],
        [
            'label'       => 'E-Commerce',
            'path'        => '/e-commerce-certifications',
            'description' => 'Digital commerce strategy, UX, AI analytics & cross-border trade',
            'featured'    => [
                ['AC-ESGP®', '/american-certified-e-commerce-strategy-and-growth-professional-ac-esgp'],
                ['AC-DMUX®', '/american-certified-digital-merchandising-and-user-experience-professional-ac-dmux'],
                ['CED-AI®',  '/chartered-e-commerce-data-analytics-and-ai-professional-ced-ai'],
                ['CGCBE®',   '/chartered-global-cross-border-e-commerce-manager-cgcbe'],
            ],
        ],
        [
            'label'       => 'Combined Procurement & SC',
            'path'        => '/combined-procurement-logistics-and-supply-chain-certifications',
            'description' => 'Integrated procurement, logistics, transportation & supply chain credentials',
            'featured'    => [
                ['AC-GPLSCP', '/american-certified-global-procurement-logistics-amp-supply-chain-professional-ac-gplscp'],
                ['CSP-SCM®',  '/chartered-strategic-procurement-supply-chain-manager-csp-scm'],
                ['AC-PLSCM®', '/advanced-certified-procurement-logistics-supply-chain-manager-ac-plscm'],
                ['AC-APSCP®', '/american-certified-agile-procurement-amp-supply-chain-professional-ac-apscp'],
            ],
        ],
        [
            'label'       => 'AI & Digital',
            'path'        => '/artificial-intelligence-ai-courses',
            'description' => 'Artificial intelligence, RPA, blockchain & digital transformation credentials',
            'badge'       => 'Hot',
            'featured'    => [
                ['AC-SCAI®', '/american-certified-supply-chain-artificial-intelligence-ai-professional-ac-scai'],
                ['CAIPP®',   '/chartered-ai-procurement-professional-caipp'],
                ['CAIRPP®',  '/certified-ai-amp-rpa-procurement-professional-cairpp'],
                ['CSAI-M®',  '/chartered-supply-chain-artificial-intelligence-manager-csai-m'],
            ],
        ],
    ],

    /* ─── AI Courses dropdown ───────────────────────────────────────────── */
    'ai_courses' => [
        ['label' => 'All AI Courses Overview',          'path' => '/artificial-intelligence-ai-courses'],
        ['label' => 'AI Procurement Certifications',    'path' => '/chartered-ai-procurement-professional-caipp'],
        ['label' => 'AI Supply Chain Certifications',   'path' => '/american-certified-supply-chain-artificial-intelligence-ai-professional-ac-scai'],
        ['label' => 'AI / RPA Procurement Programs',   'path' => '/certified-ai-amp-rpa-procurement-professional-cairpp'],
        ['label' => 'Chartered AI Procurement Manager','path' => '/chartered-ai-procurement-manager-caipm'],
        ['label' => 'AI Supply Chain Analyst',          'path' => '/chartered-ai-supply-chain-analyst-caisca'],
    ],

    /* ─── Executive Diploma Programs ────────────────────────────────────── */
    'executive_diplomas' => [
        [
            'code'  => 'ED-AIPST®',
            'label' => 'AI-Driven Procurement Strategy & Transformation',
            'path'  => '/executive-diploma-in-ai-driven-procurement-strategy-transformation-ed-aipst',
        ],
        [
            'code'  => 'ED-SRCEAI®',
            'label' => 'AI-Powered Supplier Risk, Compliance & ESG Management',
            'path'  => '/executive-diploma-in-ai-powered-supplier-risk-compliance-esg-management-ed-srceai',
        ],
        [
            'code'  => 'ED-CMAAI®',
            'label' => 'AI-Integrated Contract Management & Automation',
            'path'  => '/executive-diploma-in-ai-integrated-contract-management-automation-ed-cmaai',
        ],
        [
            'code'  => 'ED-SSNI-AI®',
            'label' => 'AI-Based Strategic Sourcing & Negotiation Intelligence',
            'path'  => '/executive-diploma-in-ai-based-strategic-sourcing-negotiation-intelligence-ed-ssni-ai',
        ],
        [
            'code'  => 'ED-POAAI®',
            'label' => 'AI-Driven Procurement Operations & Automation',
            'path'  => '/executive-diploma-in-ai-driven-procurement-operations-automation-ed-poaai',
        ],
    ],

    /* ─── Exams & Learning ──────────────────────────────────────────────── */
    'exams_learning' => [
        'testing' => [
            ['label' => 'About Testing Options',        'path' => '/about-testing-options'],
            ['label' => 'Online Exams',                 'path' => '/online-exam'],
            ['label' => 'Certification / Program Match','path' => '/programs-match'],
            ['label' => 'In-Person Exam Proctoring',    'path' => '/exam-proctoring'],
        ],
        'policies' => [
            ['label' => 'About Exam Policies',  'path' => '/certificate-exam-policies'],
            ['label' => 'Exam Support Hotline', 'path' => '/aapscm-hotline'],
        ],
    ],

    /* ─── Membership ────────────────────────────────────────────────────── */
    'membership' => [
        'types' => [
            ['label' => 'Professional Membership',  'path' => '/professional-membership'],
            ['label' => 'Corporate Membership',     'path' => '/corporate-membership'],
            ['label' => 'Chartered Membership',     'path' => '/chartered-professional-membership'],
            ['label' => 'Student Membership',       'path' => '/student-membership'],
            ['label' => 'Fellow Membership',        'path' => '/fellow-membership'],
        ],
        'overview' => [
            ['label' => 'Become a Member',               'path' => '/membership'],
            ['label' => 'Why Join AAPSCM®',              'path' => '/why-join-aapscm'],
            ['label' => 'Membership FAQs',               'path' => '/membership-faqs'],
            ['label' => 'Benefits & Resources',          'path' => '/benefits-and-resources'],
            ['label' => 'Renew Professional Membership', 'path' => '/professional-membership-renewal'],
            ['label' => 'Become a Chartered Professional','path'=> '/chartered-supply-chain-professional-member'],
        ],
    ],

    /* ─── For Business ──────────────────────────────────────────────────── */
    'for_business' => [
        'programs' => [
            ['label' => 'Corporate Membership',               'path' => '/corporate-membership'],
            ['label' => 'Become Authorized Training Partner', 'path' => '/become-a-authorized-training-partner'],
            ['label' => 'Affiliate Partners',                 'path' => '/affiliate-partners'],
            ['label' => 'USA Chapters',                       'path' => '/us-charters'],
        ],
        'training' => [
            ['label' => 'Corporate Training',      'path' => '/workshop-trainings'],
            ['label' => 'Bulk Certification Seats','path' => '/online-courses'],
            ['label' => 'Benefits & Resources',    'path' => '/benefits-and-resources'],
        ],
    ],

    /* ─── Resources ─────────────────────────────────────────────────────── */
    'resources' => [
        'quick' => [
            ['label' => 'Benefits & Resources',       'path' => '/benefits-and-resources'],
            ['label' => 'Online Store',               'path' => '/online-courses'],
            ['label' => 'Exam FAQs',                  'path' => '/certifications-faq'],
            ['label' => 'Verify a Certificate',       'path' => '/verify-a-certificate'],
            ['label' => 'Purchase Brochures & Books', 'path' => '/online-courses'],
            ['label' => 'Digital Badges',             'path' => '/digital-badges'],
        ],
        'tools' => [
            ['label' => 'Program Match',        'path' => '/programs-match'],
            ['label' => 'AAPSCM® Community',   'path' => '/communities'],
            ['label' => 'USA Chapters',         'path' => '/us-charters'],
            ['label' => 'Renew a Certification','path' => '/request-pdes-for-certificate'],
            ['label' => 'Digital Badges',       'path' => '/digital-badges'],
        ],
    ],

    /* ─── Mobile accordion sections ─────────────────────────────────────── */
    'mobile_sections' => [
        [
            'key'   => 'certifications',
            'label' => 'Certifications',
            'links' => [
                ['label' => 'All Certifications',            'path' => '/certifications-for-professionals'],
                ['label' => 'Certification Process',         'path' => '/certification-process'],
                ['label' => 'Procurement Management',        'path' => '/procurement-management-certifications'],
                ['label' => 'Supply Chain Management',       'path' => '/supply-chain-management-certifications'],
                ['label' => 'Tourism Management',            'path' => '/tourism-management-certifications'],
                ['label' => 'E-Commerce Certifications',     'path' => '/e-commerce-certifications'],
                ['label' => 'Combined Procurement & SC',     'path' => '/combined-procurement-logistics-and-supply-chain-certifications'],
                ['label' => 'AI & Digital Certifications',  'path' => '/artificial-intelligence-ai-courses'],
                ['label' => 'Certification FAQs',            'path' => '/certifications-faq'],
            ],
        ],
        [
            'key'   => 'ai',
            'label' => 'AI Courses',
            'links' => [
                ['label' => 'All AI Courses',                'path' => '/artificial-intelligence-ai-courses'],
                ['label' => 'AI Procurement Certifications', 'path' => '/chartered-ai-procurement-professional-caipp'],
                ['label' => 'AI Supply Chain Certifications','path' => '/american-certified-supply-chain-artificial-intelligence-ai-professional-ac-scai'],
                ['label' => 'AI / RPA Programs',            'path' => '/certified-ai-amp-rpa-procurement-professional-cairpp'],
            ],
        ],
        [
            'key'   => 'diploma',
            'label' => 'Executive Diplomas',
            'links' => [
                ['label' => 'ED-AIPST® — AI-Driven Procurement Strategy',        'path' => '/executive-diploma-in-ai-driven-procurement-strategy-transformation-ed-aipst'],
                ['label' => 'ED-SRCEAI® — AI-Powered Supplier Risk & ESG',       'path' => '/executive-diploma-in-ai-powered-supplier-risk-compliance-esg-management-ed-srceai'],
                ['label' => 'ED-CMAAI® — AI-Integrated Contract Management',     'path' => '/executive-diploma-in-ai-integrated-contract-management-automation-ed-cmaai'],
                ['label' => 'ED-SSNI-AI® — Strategic Sourcing & Negotiation',    'path' => '/executive-diploma-in-ai-based-strategic-sourcing-negotiation-intelligence-ed-ssni-ai'],
                ['label' => 'ED-POAAI® — Procurement Operations & Automation',   'path' => '/executive-diploma-in-ai-driven-procurement-operations-automation-ed-poaai'],
            ],
        ],
        [
            'key'   => 'exams',
            'label' => 'Exams & Learning',
            'links' => [
                ['label' => 'About Testing Options',        'path' => '/about-testing-options'],
                ['label' => 'Online Exams',                 'path' => '/online-exam'],
                ['label' => 'Certification / Program Match','path' => '/programs-match'],
                ['label' => 'In-Person Exam Proctoring',    'path' => '/exam-proctoring'],
                ['label' => 'About Exam Policies',          'path' => '/certificate-exam-policies'],
                ['label' => 'Exam Support Hotline',         'path' => '/aapscm-hotline'],
            ],
        ],
        [
            'key'   => 'membership',
            'label' => 'Membership',
            'links' => [
                ['label' => 'Become a Member',               'path' => '/membership'],
                ['label' => 'Professional Membership',       'path' => '/professional-membership'],
                ['label' => 'Corporate Membership',          'path' => '/corporate-membership'],
                ['label' => 'Chartered Membership',          'path' => '/chartered-professional-membership'],
                ['label' => 'Student Membership',            'path' => '/student-membership'],
                ['label' => 'Fellow Membership',             'path' => '/fellow-membership'],
                ['label' => 'Why Join AAPSCM®',              'path' => '/why-join-aapscm'],
                ['label' => 'Membership FAQs',               'path' => '/membership-faqs'],
                ['label' => 'Benefits & Resources',          'path' => '/benefits-and-resources'],
                ['label' => 'Renew Professional Membership', 'path' => '/professional-membership-renewal'],
            ],
        ],
        [
            'key'   => 'business',
            'label' => 'For Business',
            'links' => [
                ['label' => 'Corporate Membership',               'path' => '/corporate-membership'],
                ['label' => 'Become Authorized Training Partner', 'path' => '/become-a-authorized-training-partner'],
                ['label' => 'Affiliate Partners',                 'path' => '/affiliate-partners'],
                ['label' => 'USA Chapters',                       'path' => '/us-charters'],
                ['label' => 'Corporate Training',                 'path' => '/workshop-trainings'],
                ['label' => 'Bulk Certification Seats',           'path' => '/online-courses'],
            ],
        ],
        [
            'key'   => 'resources',
            'label' => 'Resources',
            'links' => [
                ['label' => 'Benefits & Resources',       'path' => '/benefits-and-resources'],
                ['label' => 'Online Store',               'path' => '/online-courses'],
                ['label' => 'Verify a Certificate',       'path' => '/verify-a-certificate'],
                ['label' => 'Program Match',              'path' => '/programs-match'],
                ['label' => 'AAPSCM® Community',         'path' => '/communities'],
                ['label' => 'USA Chapters',               'path' => '/us-charters'],
                ['label' => 'Digital Badges',             'path' => '/digital-badges'],
                ['label' => 'Renew a Certification',      'path' => '/request-pdes-for-certificate'],
                ['label' => 'Purchase Brochures & Books', 'path' => '/online-courses'],
            ],
        ],
    ],
];
