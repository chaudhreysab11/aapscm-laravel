<?php

declare(strict_types=1);

/**
 * Verbatim transcription of https://aapscm.org/certification-process/
 *
 * Sourced from the live Elementor page (data-elementor-type="wp-page").
 * Hidden duplicates (sections with elementor-hidden-desktop/tablet/mobile)
 * have been omitted; everything else is preserved as-is, including the
 * preserved typo "Supply Chain Managment" in the cert-categories grid.
 */

return [
    'meta' => [
        'title'       => 'Certification Process - AAPSCM®',
        'description' => 'Certification Process with AAPSCM® A Step-by-Step Guide to Earning Your Prestigious AAPSCM® Certification The American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®) offers globally recognized certifications that validate your expertise and position you as a leader in your field. The certification process ensures that candidates meet the highest professional standards, demonstrate advanced knowledge, and […]',
    ],

    // Section 0 — hero with intro copy (left col) + side image (right col)
    'hero' => [
        'heading'         => 'Certification Process with <span style="font-weight:600">AAPSCM® </span>',
        'subheading'      => 'A Step-by-Step Guide to Earning Your Prestigious AAPSCM® Certification',
        'paragraphs'      => [
            'The American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®) offers globally recognized certifications that validate your expertise and position you as a leader in your field. The certification process ensures that candidates meet the highest professional standards, demonstrate advanced knowledge, and are equipped to tackle complex challenges in procurement, supply chain, or tourism management.',
            'Below is a comprehensive outline of the certification process with AAPSCM®, tailored to provide a seamless and rewarding experience.',
        ],
        'image'           => 'https://aapscm.org/wp-content/uploads/2025/01/1-5.png',
    ],

    'check_icon' => 'https://aapscm.org/wp-content/uploads/2024/12/check.png',

    // Section 1 — Step 1: eligibility checklist
    'step1' => [
        'heading' => 'Step 1:  <span style="font-weight:600">Determine Eligibility </span>',
        'intro'   => 'AAPSCM® certifications are open to professionals at various stages of their careers. Before applying, review the eligibility criteria for your desired certification:',
        'items'   => [
            ['bold' => 'Education:', 'text' => 'A relevant degree in supply chain, procurement, tourism, or related fields is often preferred.'],
            ['bold' => 'Experience:', 'text' => 'Many certifications require a minimum level of professional experience in your chosen domain.'],
            ['bold' => 'Skills and Competencies:', 'text' => 'Familiarity with the key principles, tools, and trends in your field is essential.'],
        ],
        'outro'   => 'If you are unsure about eligibility, AAPSCM® provides a pre-assessment consultation to guide you toward the right certification path.',
    ],

    // Section 2 — Step 2: choose the right certification (intro for the cert-categories grid below)
    'step2' => [
        'heading' => 'Step 2:   <span style="font-weight:600">Choose the Right Certification</span>',
        'intro'   => 'AAPSCM® offers a variety of certifications designed for professionals in procurement, supply chain, and tourism management. Some popular certifications include:',
        'outro'   => 'Each certification is tailored to meet industry demands, so choose one that aligns with your career goals and expertise.',
    ],

    // Section 3 — Certification categories grid (id="certificate-categories")
    // "Supply Chain Managment" typo preserved verbatim from source.
    'cert_categories' => [
        [
            'heading' => 'Procurement Management',
            'items'   => [
                ['text' => 'Chartered Procurement Manager (CPM)®', 'href' => 'https://aapscm.org/american-certified-procurement-manager-acpm/'],
                ['text' => 'American Certified Procurement Professional (ACPP)®', 'href' => 'https://aapscm.org/hyperlink-1/'],
                ['text' => 'American Certified Digital Procurement & Analytics Professional (AC-DPA)®', 'href' => 'https://aapscm.org/american-certified-digital-procurement-analytics-specialist/'],
                ['text' => 'American Certified Procurement Risk Management Professional(AC-PRM)®', 'href' => 'https://aapscm.org/american-certified-procurement-risk-management-specialist/'],
                ['text' => 'American Certified Strategic Procurement & Supplier Relationship Professional (AC-SPR)®', 'href' => 'https://aapscm.org/american-certified-strategic-procurement-supplier-relationship-specialist/'],
                ['text' => 'Chartered Strategic Procurement & Supplier Relationship Manager(CSP-SRM)®', 'href' => 'https://aapscm.org/chartered-strategic-procurement-supplier-relationship-specialist/'],
                ['text' => 'American Certified IT Procurement & Digital Transformation Professional(ACIPDT)®', 'href' => 'https://aapscm.org/american-certified-it-procurement-digital-transformation-specialist/'],
                ['text' => 'American Certified Procurement Automation & RPA Professional(AC-PARP)®', 'href' => 'https://aapscm.org/american-certified-procurement-automation-rpa-specialist-ac-paras-2/'],
                ['text' => 'American Certified Procurement Data Science & AI Professional(AC-PDS)®', 'href' => 'https://aapscm.org/american-certified-procurement-data-science-ai-specialist-ac-pdss/'],
                ['text' => 'Chartered AI-Driven Sustainable Procurement Manager (CAI-SPM)®', 'href' => 'https://aapscm.org/chartered-ai-driven-sustainable-procurement-manager-ca-ispm/'],
                ['text' => 'Chartered Healthcare Procurement Solutions Professional (CHPP)®', 'href' => 'https://aapscm.org/chartered-healthcare-procurement-solutions-professional-chpp/'],
                ['text' => 'American Certified Public Sector Procurement & Compliance Professional(AC-PSPC)®', 'href' => 'https://aapscm.org/american-certified-public-sector-procurement-compliance-specialist/'],
                ['text' => 'Sustainable Green Procurement & Ethical Sourcing Professional (AC-SGPES)®', 'href' => 'https://aapscm.org/american-certified-sustainable-procurement-ethical-sourcing-professional/'],
                ['text' => 'American Certified Global Procurement & Cross-Border Supply Professional(AC-GPCS)®', 'href' => 'https://aapscm.org/american-certified-global-procurement-cross-border-supply-specialist-ac-gpcss/'],
                ['text' => 'American Certified Procurement Leadership & Change Management Professional (AC-PLCM)®', 'href' => 'https://aapscm.org/american-certified-procurement-leadership-change-management-specialist/'],
            ],
        ],
        [
            'heading' => 'Supply Chain Managment',
            'items'   => [
                ['text' => 'Chartered Supply Chain Manager (CSCM)®', 'href' => 'https://aapscm.org/chartered-supply-chain-manager-acscm/'],
                ['text' => 'Chartered Supply Chain Technology Manager (CSCT)®', 'href' => 'https://aapscm.org/acsct/'],
                ['text' => 'American Certified Supply Chain Professional (ACSCP)®', 'href' => 'https://aapscm.org/the-american-certified-supply-chain-professional-acscp/'],
                ['text' => "Chartered Supply Chain Arti\u{fb01}cial Intelligence Professional (CSAI)®", 'href' => 'https://aapscm.org/the-american-certified-supply-chain-artificial-intelligence-analyst-acsai/'],
                ['text' => 'American Certified Sustainable and Circular Supply Chain Professional (AC-CSCSP)®', 'href' => 'https://aapscm.org/american-certified-sustainable-and-circular-supply-chain-professional-ac-cscsp/'],
                ['text' => 'Chartered Sustainable Supply Chain Manager (CSSCM)®', 'href' => 'https://aapscm.org/chartered-sustainable-supply-chain-manager-csscm/'],
                ['text' => 'American Certified Blockchain for Supply Chain Professiona (AC-BSCP)®', 'href' => 'https://aapscm.org/american-certified-blockchain-for-supply-chain-professional-ac-bscp/'],
                ['text' => 'American Certified Supply Chain Cybersecurity Professional (AC-SCCP)®', 'href' => 'https://aapscm.org/american-certified-supply-chain-cybersecurity-professional-ac-sccp/'],
                ['text' => 'Chartered Advanced Supply Chain Cybersecurity Manager (CA-SCCM)®', 'href' => 'https://aapscm.org/chartered-advanced-supply-chain-cybersecurity-manager-ca-sccm/'],
                ['text' => 'American Certified Digital Supply Chain Integration Professional (AC-DSCI)®', 'href' => 'https://aapscm.org/american-certified-digital-supply-chain-integration-professional-ac-dscip/'],
                ['text' => 'American Certified Supply Chain Digital Transformation Manager (AC-SCDTM)®', 'href' => 'https://aapscm.org/american-certified-supply-chain-digital-transformation-manager-ac-scdtm/'],
                ['text' => 'American Certified Global Supply Chain Risk and Resilience Professional(AC- GSRP)®', 'href' => 'https://aapscm.org/american-certified-global-supply-chain-risk-and-resilience-professionalac-gsrp/'],
            ],
        ],
        [
            'heading' => 'Tourism Management',
            'items'   => [
                ['text' => 'American Certified Tourism Professional (ACTP)®', 'href' => 'https://aapscm.org/american-certified-tourism-professional/'],
                ['text' => 'Chartered Tourism Manager (CTM)®', 'href' => 'https://aapscm.org/ctm/'],
                ['text' => 'Chartered Sustainable Culinary Tourism Manager (CSCTM)®', 'href' => 'https://aapscm.org/chartered-sustainable-culinary-tourism-manager-csctm/'],
            ],
        ],
        [
            'heading' => 'Combined Procurement and Supply Chain Certifications',
            'items'   => [
                ['text' => 'American Certified Global Procurement, Logistics & Supply Chain Professional (AC-GPLSCP)®', 'href' => 'https://aapscm.org/american-certified-global-procurement-logistics-amp-supply-chain-professional-ac-gplscp/'],
                ['text' => 'Chartered Strategic Procurement & Supply Chain Management (CSP-SCM)®', 'href' => 'https://aapscm.org/chartered-strategic-procurement-supply-chain-manager-csp-scm/'],
                ['text' => 'Advanced Certified Procurement, Logistics & Supply Chain Manager (AC-PLSCM)®', 'href' => 'https://aapscm.org/advanced-certified-procurement-logistics-supply-chain-manager-ac-plscm/'],
                ['text' => 'American Certified Sustainable Procurement & Green Supply Chain Professional (AC-SPGSCP)®', 'href' => 'https://aapscm.org/american-certified-sustainable-procurement-amp-green-supply-chain-professional-ac-spgscp/'],
                ['text' => 'American Certified Digital Supply Chain & Procurement Transformation Professional (AC-DSCPTP)®', 'href' => 'https://aapscm.org/american-certified-digital-supply-chain-amp-procurement-transformation-professional-ac-dscptp/'],
                ['text' => 'American Certified Procurement, Logistics & Transportation Expert (AC-PLTE)®', 'href' => 'https://aapscm.org/american-certified-procurement-logistics-transportation-expert-ac-plte/'],
                ['text' => 'American Certified Agile Procurement & Supply Chain Professional (AC-APSCP)®', 'href' => 'https://aapscm.org/american-certified-agile-procurement-amp-supply-chain-professional-ac-apscp/'],
                ['text' => 'American Certified Risk & Compliance Professional in Procurement & Supply Chain (AC-RCPPSC)®', 'href' => 'https://aapscm.org/american-certified-risk-amp-compliance-professional-in-procurement-amp-supply-chain-ac-rcppsc/'],
                ['text' => 'Executive Diploma in Procurement, Logistics & Supply Chain Leadership (EDPLSCL)®', 'href' => 'https://aapscm.org/executive-diploma-in-procurement-logistics-supply-chain-leadership-edplscl/'],
            ],
        ],
        [
            'heading' => 'E-Commerce Management & Administration',
            'items'   => [
                ['text' => 'American Certified E-Commerce Strategy and Growth Professional (AC-ESGP)®', 'href' => 'https://aapscm.org/american-certified-e-commerce-strategy-and-growth-professional-ac-esgp/'],
                ['text' => 'Chartered E-Commerce Data Analytics and AI Professional (CED-AI)®', 'href' => 'https://aapscm.org/chartered-e-commerce-data-analytics-and-ai-professional-ced-ai/'],
                ['text' => 'Chartered Global Cross-Border E-Commerce Manager (CGCBE)®', 'href' => 'https://aapscm.org/chartered-global-cross-border-e-commerce-manager-cgcbe/'],
                ['text' => 'American Certified Ethical Practices & Sustainable E-Commerce Professional (AC-SEEP)®', 'href' => 'https://aapscm.org/american-certified-ethical-practices-sustainable-e-commerce-professional-ac-seep/'],
                ['text' => 'American Certified Digital Merchandising and User Experience Professional (AC-DMUX)®', 'href' => 'https://aapscm.org/american-certified-digital-merchandising-and-user-experience-professional-ac-dmux/'],
            ],
        ],
    ],

    // Section 4 — Step 3: training options + purchase buttons
    'step3' => [
        'heading' => 'Step 3:  <span style="font-weight:600">Select Your Training or Purchase the Test</span>',
        'intro'   => 'First, you just need to choose how you’d like to prepare for your certification. AAPSCM® offers flexible options',
        'cards'   => [
            [
                'bold'      => 'Self-Paced Training, Exam Fees',
                'text'      => ': Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                'cta_label' => 'Purchase and Pay',
                'cta_url'   => 'https://aapscm.org/checkout/?add-to-cart=37874',
            ],
            [
                'bold'      => 'Instructor-Led Training',
                'text'      => ': Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                'cta_label' => 'Purchase and Pay',
                'cta_url'   => 'https://aapscm.org/checkout/?add-to-cart=37876',
            ],
        ],
        'outros'  => [
            'These training options are optional but highly recommended for a thorough preparation experience. Alternatively, if you are confident in your knowledge and skills, you may choose to purchase the certification test directly for $399.99.',
            'AAPSCM® ensures you have the freedom to tailor your learning path to meet your individual needs and schedule.',
        ],
    ],

    // Section 5 — Step 4: enrollment benefits checklist
    'step4' => [
        'heading' => 'Step 4:   <span style="font-weight:600">Enroll in the Certification Program</span>',
        'intro'   => 'Once your application is approved, enroll in the certification program to begin preparing for your exam. AAPSCM® offers:',
        'items'   => [
            ['bold' => 'Comprehensive Study Materials', 'text' => ': Access to digital guides, textbooks, and case studies.'],
            ['bold' => 'Interactive Learning Platforms', 'text' => ': Online modules, video tutorials, and practice tests.'],
            ['bold' => 'Workshops and Webinars', 'text' => ': Opportunities to learn directly from industry experts.'],
            ['bold' => 'Mentorship Support', 'text' => ': Guidance from certified professionals and faculty members.'],
        ],
    ],

    // Section 6 — Step 5: prepare for exam (icon list, no bold prefix on items)
    'step5' => [
        'heading' => 'Step 5: <span style="font-weight:600">Prepare for the Certification Exam</span>',
        'intro'   => 'AAPSCM® certification exams are designed to evaluate your knowledge, analytical skills, and problem-solving abilities in real-world scenarios. Preparing for the exam is crucial, and AAPSCM® provides:',
        'bullets' => [
            'Practice tests to familiarize you with the exam format.',
            'Mock assessments to gauge your readiness.',
            'Study groups and peer discussions to deepen understanding.',
            'Access to industry insights and trends to align your knowledge with global practices.',
        ],
    ],

    // Section 7 — Step 6: exam details (image-box list)
    'step6' => [
        'heading' => 'Step 6:   <span style="font-weight:600">Take the Certification Exam</span>',
        'intro'   => 'AAPSCM® certification exams are rigorous and comprehensive, ensuring only the most qualified candidates earn the credential. Exam details include:',
        'items'   => [
            ['bold' => 'Format', 'text' => ': Multiple-choice questions, case studies, and scenario-based problems.'],
            ['bold' => 'Delivery', 'text' => ': Exams are offered online or at approved testing centers.'],
            ['bold' => 'Duration', 'text' => ': Exams typically range from 2 to 4 hours, depending on the certification.'],
            ['bold' => 'Passing Criteria', 'text' => ': Candidates must achieve a minimum score to pass, demonstrating advanced knowledge and competency.'],
        ],
        'outro'   => 'Results are typically provided immediately upon completion, and your Diploma and Certificate with other documents will be mailed to you within 5 business days.',
    ],

    // Section 8 — Step 7: earn certification (heading + paragraph)
    'step7' => [
        'heading' => 'Step 7:   <span style="font-weight:600">Earn Your Certification</span>',
        'text'    => 'Successful candidates will receive their official certification and a digital badge from AAPSCM®. This credential can be proudly displayed on resumes, LinkedIn profiles, and professional portfolios, showcasing your achievement to employers and peers.',
    ],

    // Section 9 — Step 8: maintain certification
    'step8' => [
        'heading' => 'Step 8: <span style="font-weight:600">Maintain Your Certification</span>',
        'intro'   => 'AAPSCM® certifications require periodic renewal to ensure you stay updated on industry trends and best practices. Renewal requirements typically include:',
        'bullets' => [
            'Completing continuing education (e.g., courses, seminars, webinars).',
            'Participating in industry events or research projects.',
            'Submitting proof of professional development activities.',
        ],
        'outro'   => 'AAPSCM® provides support and resources to help you maintain your certification and continue excelling in your field.',
    ],

    // Section 10 + 11 — "Why Choose AAPSCM® for Certification?" + 4-up icon grid
    'why_choose' => [
        'heading' => 'Why Choose AAPSCM® for  <span style="font-weight:600">Certification?</span>',
        'cards'   => [
            ['icon' => 'https://aapscm.org/wp-content/uploads/2025/01/1-6.png', 'title' => 'Global Recognition',     'text' => 'AAPSCM® certifications are respected worldwide, opening doors to new career opportunities.'],
            ['icon' => 'https://aapscm.org/wp-content/uploads/2025/01/1-7.png', 'title' => 'Comprehensive Support',  'text' => 'From exam application, AAPSCM® provides the resources you need to succeed.'],
            ['icon' => 'https://aapscm.org/wp-content/uploads/2025/01/1-9.png', 'title' => 'Cutting-Edge Curriculum', 'text' => 'Programs are aligned with the latest industry standards, technologies, and trends.'],
            ['icon' => 'https://aapscm.org/wp-content/uploads/2025/01/1-8.png', 'title' => 'Elite Network',          'text' => 'Join a global community of certified professionals and industry leaders.'],
        ],
    ],

    // Section 12 — Closing CTA
    'cta' => [
        'heading'    => 'Start Your Certification <span style="font-weight:600">Journey  Today </span>',
        'paragraph'  => 'AAPSCM®’s certification process is designed to help you achieve your career goals and make a lasting impact in your industry. Whether you are advancing in your current role or preparing for new opportunities, AAPSCM® certifications equip you with the skills, knowledge, and recognition to succeed.',
        // Source uses an inline anchor "[Apply Now]" linking to /all-courses/.
        'apply_label' => '[Apply Now]',
        'apply_url'   => 'https://aapscm.org/all-courses/',
        'apply_tail'  => ' and take the first step toward becoming a certified procurement, supply chain, or tourism management leader!',
        'image'       => 'https://aapscm.org/wp-content/uploads/2025/01/1-10.png',
    ],
];
