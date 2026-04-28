<?php declare(strict_types=1);

return [
    // Section 0 — hero (heading + intro paragraph + image right)
    'hero' => [
        'heading_html' => 'Explore AAPSCM® Global<b> Chapters</b>',
        'intro_html'   => '<p>At <strong>AAPSCM®</strong>, our regional and country-specific chapters form the backbone of our community. These <strong>member-led chapters</strong> are vital to advancing the procurement, supply chain, e-commerce, and tourism management industries while empowering members to elevate their careers and businesses. Our chapters create a powerful platform for professional growth and industry innovation by fostering collaboration, networking, and knowledge-sharing.</p>',
        'image'        => 'https://aapscm.org/wp-content/uploads/2025/01/Untitled-1.jpg',
    ],

    // Section 1 — role intro
    'role' => [
        'heading_html' => 'The Role of<b> AAPSCM®</b> Chapters',
        'intro_html'   => '<p>Each AAPSCM chapter serves as a hub for professionals in its region, providing opportunities to:</p>',
    ],

    // Section 2 — 4 feature cards (icon + bg shape + heading + description)
    'features' => [
        [
            'icon'         => 'https://aapscm.org/wp-content/uploads/2025/01/1-22.png',
            'bg'           => 'https://aapscm.org/wp-content/uploads/2024/12/Group-1.png',
            'heading_html' => 'Collaborate on Industry Initiatives',
            'desc_html'    => 'Work with peers on projects and strategies that shape the future of procurement, supply chain, and tourism management.',
        ],
        [
            'icon'         => 'https://aapscm.org/wp-content/uploads/2025/01/1-23.png',
            'bg'           => 'https://aapscm.org/wp-content/uploads/2024/12/Group-115-1.png',
            'heading_html' => 'Build Your Professional Network',
            'desc_html'    => 'Forge meaningful connections with industry leaders, peers, and potential partners.',
        ],
        [
            'icon'         => 'https://aapscm.org/wp-content/uploads/2025/01/1-24.png',
            'bg'           => 'https://aapscm.org/wp-content/uploads/2024/12/Group-116-1.png',
            'heading_html' => 'Advance Your Career',
            'desc_html'    => 'Gain insights, mentorship, and resources to drive your professional development.',
        ],
        [
            'icon'         => 'https://aapscm.org/wp-content/uploads/2025/01/1-25.png',
            'bg'           => 'https://aapscm.org/wp-content/uploads/2024/12/Group-117.png',
            'heading_html' => 'Contribute to Industry Growth',
            'desc_html'    => 'Share ideas and influence the direction of global procurement, supply chain, and tourism practices.',
        ],
    ],

    // Section 3 — ambassadors line
    'ambassadors_html' => 'Our chapters act as ambassadors for AAPSCM®’s mission, spreading awareness, fostering collaboration, and driving excellence in their local and regional communities.',

    // Section 4 — global chapter communities intro
    'global' => [
        'heading_html' => 'Global Chapter Communities<b> Chapters</b>',
        'intro_html'   => 'Membership in AAPSCM® grants you access to regional chapters and specialized communities designed to meet your unique professional needs.',
    ],

    // Section 5 — two community types (image + heading + bullet list)
    'community_types' => [
        [
            'image'        => 'https://aapscm.org/wp-content/uploads/2024/12/businessman.png',
            'heading_html' => 'Regional Communities',
            'items' => [
                ['html' => '<b>Canada, UK, Asia, Africa, and Beyond</b>: Join chapters tailored to your geographic region and connect with professionals in any of our chapters listed.'],
                ['html' => '<b>Local Networking and Events</b>: Attend chapter-hosted meetups, webinars, and conferences designed to address regional challenges and opportunities.'],
            ],
        ],
        [
            'image'        => 'https://aapscm.org/wp-content/uploads/2024/12/supply-chain-management-1.png',
            'heading_html' => 'Specialized Communities',
            'items' => [
                ['html' => '<b>Diversity and Inclusion Initiatives</b>: Participate in communities focused on breaking barriers and building a diverse procurement, supply chain, and tourism management workforce.'],
                ['html' => '<b>Emerging Leaders and Innovators</b>: Engage with like-minded professionals driving innovation and shaping the industry\'s future.'],
            ],
        ],
    ],

    // Section 6 — benefits (image + heading + intro + bullets)
    'benefits' => [
        'image'        => 'https://aapscm.org/wp-content/uploads/2025/01/1-27.png',
        'heading_html' => 'Benefits of Joining an<b> AAPSCM® </b>  Chapter',
        'intro_html'   => 'By becoming part of an AAPSCM® chapter, you gain:',
        'items' => [
            ['html' => 'Instant access to regional networks and resources.'],
            ['html' => 'Opportunities to lead and contribute to chapter initiatives.'],
            ['html' => 'Exclusive insights into regional and global trends.'],
            ['html' => 'A platform to influence the future of the industry.'],
        ],
    ],

    // Section 7 + 8 — How to Get Involved with two image-boxes
    'get_involved' => [
        'heading_html' => 'How to Get <b>Involved</b>',
        'cards' => [
            [
                'icon'      => 'https://aapscm.org/wp-content/uploads/2024/12/check.png',
                'desc_html' => '<b>Existing Members</b>: If you’re already an AAPSCM® member, your benefits include access to your regional chapter. Explore chapter activities and start connecting with your community today.',
            ],
            [
                'icon'      => 'https://aapscm.org/wp-content/uploads/2024/12/check.png',
                'desc_html' => '<b>New Members</b>: Not yet a member? Join AAPSCM® here to unlock chapter access and a world of professional opportunities.',
            ],
        ],
    ],

    // Section 9 — closing CTA
    'cta' => [
        'heading_html' => 'Shape the Future with <b>AAPSCM®</b>',
        'intro_html'   => 'AAPSCM’s global chapters are more than just networking groups—they are communities of professionals dedicated to advancing industries and driving innovation. Find the chapter that aligns with your goals and interests, and start making an impact today.',
        'buttons' => [
            ['text' => 'Find Your Chapter',                'href' => 'https://aapscm.org/us-charters/'],
            ['text' => 'Contact Us at info@aapscm.org',    'href' => 'mailto:info@aapscm.org'],
        ],
    ],

    'meta' => [
        'title'       => 'Communities',
        'description' => 'Explore AAPSCM® global chapters and communities — regional and specialized groups for procurement, supply chain, and tourism professionals.',
    ],
];
