<?php

declare(strict_types=1);

return [

    // ── CTA band ─────────────────────────────────────────────────────────────
    'cta' => [
        'heading'  => 'Advance your career with globally recognized certifications.',
        'subtext'  => 'Explore professional courses, executive diplomas, exams, membership pathways, and credentialing resources designed for modern professionals.',
        'buttons'  => [
            ['label' => 'Explore Courses',     'path' => '/all-courses',        'style' => 'primary'],
            ['label' => 'Verify Certificate',  'path' => '/verify-a-certificate', 'style' => 'outline'],
        ],
    ],

    // ── Quick Links ───────────────────────────────────────────────────────────
    'quick_links' => [
        ['label' => 'Home',                                         'path' => '/'],
        ['label' => 'About Us',                                     'path' => '/about-us'],
        ['label' => 'Contact Us',                                   'path' => '/contact-us'],
        ['label' => 'User Dashboard',                               'path' => '/dashboard'],
        ['label' => 'Non-Profit Activities, Charity &amp; Donations', 'path' => '/non-profit-activities-donation'],
        ['label' => 'Videos',                                       'path' => '/certificate-video'],
        ['label' => 'Donation',                                     'path' => '/donations'],
        ['label' => 'Certification Programs',                       'path' => '/certifications-for-professionals'],
        ['label' => 'Apply for Certification',                      'path' => '/membership'],
        ['label' => 'Become a Student Member',                      'path' => '/student-membership'],
        ['label' => 'Membership FAQs',                              'path' => '/membership-faqs'],
    ],

    // ── Organization ─────────────────────────────────────────────────────────
    'organization' => [
        ['label' => 'AAPSCM® Leadership',        'path' => '/board-of-directors'],
        ['label' => 'Affiliates/Partners',        'path' => '/affiliate-partners'],
        ['label' => 'Career Center/Job Seeker',   'path' => '/career-center'],
        ['label' => 'Privacy Policy/Legal Terms', 'path' => '/privacy-policy-legal'],
    ],

    // ── Career Center ─────────────────────────────────────────────────────────
    'career' => [
        ['label' => 'Job Listing',       'path' => '/job-listing'],
        ['label' => 'Post Resume',       'path' => '/post-resume'],
        ['label' => 'Resume Evaluation', 'path' => '/resume-evaluation'],
        ['label' => 'View Job Seekers',  'path' => '/view-job-seekers'],
        ['label' => 'Job Opportunities', 'path' => '/post-job-opportunities'],
        ['label' => 'Member Services',   'path' => '/member-services'],
    ],

    // ── Certifications ────────────────────────────────────────────────────────
    'certifications' => [
        ['label' => 'Procurement Management',  'path' => '/procurement-management-certifications'],
        ['label' => 'Supply Chain Management', 'path' => '/supply-chain-management-certifications'],
        ['label' => 'Tourism Management',      'path' => '/tourism-management-certifications'],
        ['label' => 'E-Commerce Management',   'path' => '/e-commerce-certifications'],
        ['label' => 'Combined P&amp;SC',        'path' => '/combined-procurement-logistics-and-supply-chain-certifications'],
        ['label' => 'AI Courses',              'path' => '/artificial-intelligence-ai-courses'],
        ['label' => 'Certification Process',   'path' => '/certification-process'],
        ['label' => 'Verify a Certification',  'path' => '/verify-a-certificate'],
        ['label' => 'Digital Badges',          'path' => '/digital-badges'],
    ],

    // ── Social ────────────────────────────────────────────────────────────────
    'social' => [
        [
            'label' => 'Facebook',
            'href'  => 'https://www.facebook.com/AAPSCM',
            'icon'  => 'facebook',
        ],
        [
            'label' => 'Instagram',
            'href'  => 'https://www.instagram.com/aapscmofficial/',
            'icon'  => 'instagram',
        ],
        [
            'label' => 'LinkedIn',
            'href'  => 'https://www.linkedin.com/company/american-association-of-procurement-supply-chain-and-tourism-management',
            'icon'  => 'linkedin',
        ],
        [
            'label' => 'YouTube',
            'href'  => 'https://www.youtube.com/channel/UCXKKFd2yJW-nMBxy9-RF6WQ',
            'icon'  => 'youtube',
        ],
        [
            'label' => 'TikTok',
            'href'  => 'https://www.tiktok.com/@aapscm',
            'icon'  => 'tiktok',
        ],
        [
            'label' => 'X (Twitter)',
            'href'  => 'https://twitter.com/aapscm',
            'icon'  => 'x',
        ],
    ],

    // ── Offices ───────────────────────────────────────────────────────────────
    'offices' => [
        [
            'heading'      => 'Spartanburg, SC Chapter & Center',
            'section'      => 'More Information',
            'city_summary' => 'Columbia, SC 29201 USA',
            'address'      => 'Venture X Downtown Columbia Building, 18th Floor, Columbia, SC 29201 USA',
            'mailstop'     => '450 Ganton Ct. Blythewood SC 29016',
            'phones'       => [
                ['display' => '+1-(803)998-2189', 'href' => 'tel:+18039982189'],
            ],
            'fax'          => null,
            'email'        => null,
        ],
        [
            'heading'      => 'Dallas, Texas Office and Conference Center',
            'section'      => null,
            'city_summary' => 'Dallas, TX 75229',
            'address'      => '2540 Walnut Hill Ln, Dallas, TX 75229. Building 2B (inside Parker U. Campus)',
            'mailstop'     => '2701 Little Elm Pkwy Ste 100 Little Elm, TX 75068',
            'phones'       => [
                ['display' => '+1-469-991-5228', 'href' => 'tel:+14699915228'],
            ],
            'fax'          => '+1-(605)608-3078',
            'email'        => ['display' => 'info@aapscm.org', 'href' => 'mailto:info@aapscm.org'],
        ],
    ],

    // ── Brand ─────────────────────────────────────────────────────────────────
    'brand' => [
        'logo_src'    => '/storage/cms-images/2023/04/logo.jpg',
        'logo_alt'    => 'AAPSCM® — American Association of Procurement, Supply Chain & Tourism Management',
        'description' => 'AAPSCM® provides professional certifications, training programs, membership pathways, and credentialing resources in procurement, supply chain, tourism, e-commerce, and AI-driven business disciplines.',
        'ice_badge'   => [
            'src' => '/storage/cms-images/2023/04/Image.jpg',
            'alt' => 'Proud Member of the Institute for Credentialing Excellence',
        ],
    ],

];
