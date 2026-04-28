<?php

declare(strict_types=1);

return [
    'hero' => [
        'background' => 'https://aapscm.org/wp-content/uploads/2024/12/hero-bg.png',
        'image'      => 'https://aapscm.org/wp-content/uploads/2024/12/main-img.png',
        'image_alt'  => '',
        'title'      => 'Career center',
        'job_seekers' => [
            'heading'            => 'Job Seekers',
            'description'        => 'With just one click, you can now submit your resume to procurement, supply chain, e-commerce, and tourism management-related job postings. However, please note that employers can only view your resume if you choose to make it public. Otherwise, it remains private until you decide to send it directly.',
            'membership_heading' => "Full Membership with AAPSCM\u{00ae}",
            'membership_text'    => "By becoming a full member of AAPSCM\u{00ae}, you gain access to a range of services designed to support your job search,",
            'buttons' => [
                ['text' => 'Job Board',        'href' => 'https://aapscm.org/job-listing/',  'style' => 'outline'],
                ['text' => 'Post your resume', 'href' => 'https://aapscm.org/post-resume/', 'style' => 'solid'],
            ],
        ],
    ],
    'non_members' => [
        'heading' => 'Available to Non-members:',
        'buttons' => [
            ['text' => 'Resume evaluation',        'href' => 'https://aapscm.org/resume-evaluation/', 'style' => 'outline'],
            ['text' => 'Resume building workshop', 'href' => 'https://aapscm.org/seminars-courses/',  'style' => 'solid'],
        ],
    ],
    'employers' => [
        'image'       => 'https://aapscm.org/wp-content/uploads/2024/12/about-1.png',
        'image_alt'   => '',
        'heading'     => 'Employers services',
        'description_html' => "Employers can post procurement-related job openings on this platform and also review any publicly available resumes. These services are provided as a benefit of <b>AAPSCM\u{00ae}</b>.<br><br>\n\nEmployers and procurement, supply chain, e-commerce, and tourism management recruiters can take advantage of our valuable services. Contact <b>[email\u{00a0}protected]</b>",
        'membership_heading' => "Full Membership with AAPSCM\u{00ae}",
        'membership_text'    => "By becoming a full member of AAPSCM\u{00ae}, you gain access to a range of services designed to support your job search,",
        'buttons' => [
            ['text' => 'Job Seekers',       'href' => 'https://aapscm.org/view-job-seekers/',       'style' => 'solid'],
            ['text' => 'Post job openings', 'href' => 'https://aapscm.org/post-job-opportunities/', 'style' => 'solid'],
        ],
    ],
];
