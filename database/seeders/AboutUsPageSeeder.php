<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Seeds the About Us page with structured page_data consumed by
 * resources/views/cms/page/about-us.blade.php.
 *
 * Slug "about-us" is routed to the dedicated template via
 * CmsPageController::SLUG_VIEWS (Tier B: unique layout).
 *
 * Content mirrors https://aapscm.org/about-us/ for WordPress-parity —
 * every string, image path, and link here was transcribed from the live HTML.
 */
class AboutUsPageSeeder extends Seeder
{
    public function run(): void
    {
        $cfEmail = static function (string $email): string {
            $k = random_int(1, 255);
            $hex = sprintf('%02x', $k);
            for ($i = 0, $len = strlen($email); $i < $len; $i++) {
                $hex .= sprintf('%02x', ord($email[$i]) ^ $k);
            }
            return '<a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="' . $hex . '">[email&#160;protected]</a>';
        };

        $pageData = [
            // §1 Who are We?
            'who_we_are' => [
                'heading'   => 'Who are <span class="font-semibold">We?</span>',
                'body_html' => '<p>The <strong>American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM)&reg;</strong> is a chartered non-profit organization (501c3) committed to empowering professionals and organizations to achieve excellence in procurement, supply chain, and tourism management. As a non-commercialized entity, we focus on advancing knowledge, fostering innovation, and building a collaborative community rather than profit-making endeavors. Our mission is to promote sustainable practices, enhance professional development, and provide cutting-edge resources that help individuals and organizations thrive in today\'s dynamic global economy. We deliver industry-recognized certifications, transformative training programs, and access to a robust network of professionals while focusing on serving our community\'s best interests.</p>',
                'image'     => '/storage/cms-images/2024/12/become-a-member-header-1.png',
            ],

            // §2 Why We Stand Apart
            'why_stand_apart' => [
                'heading'    => 'Why We <span class="font-semibold">Stand Apart</span>',
                'body_html'  => '<p>AAPSCM&reg; stands apart as a globally trusted, mission-driven partner dedicated to cultivating expertise and supporting workforce development. By prioritizing education and innovation, we empower professionals to master procurement strategies, optimize supply chains, lead transformative efforts in the tourism industry, and excel in the rapidly evolving field of e-commerce. Our commitment ensures that members are equipped to navigate the complexities of modern industries and drive sustainable growth and innovation. As a member-driven organization, we offer unparalleled networking opportunities, thought leadership, and skill-building, ensuring our members access the latest insights and tools. Join us in shaping the future of procurement, supply chain, and tourism management while supporting a non-profit dedicated to empowering professionals and promoting excellence without commercial bias. Together, we\'re creating a smarter, more sustainable future.</p>',
                'image_pair' => [
                    '/storage/cms-images/2024/12/11-2.png',
                    '/storage/cms-images/2024/12/22-2.png',
                ],
            ],

            // §3 About Us
            'about_us' => [
                'heading'   => 'About <strong>Us</strong>',
                'body_html' => '<p>The American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM&reg;) was officially granted a charter and accredited by the U.S. Congress in 2021. Recognized as a 501(c)(3) non-profit organization, AAPSCM&reg; is registered with the State of South Carolina and holds IRS approval to operate as a chartered non-profit entity. In addition, AAPSCM&reg; is registered in Texas as a 501(c)(3) organization, further solidifying its legal standing and commitment to professional excellence as a non-commercialized entity.</p><p>As the only organization of its kind specializing in procurement, supply chain, e-commerce, and tourism management, AAPSCM&reg; upholds its chartered mandate by establishing a strong governance framework, ensuring compliance with industry standards, and promoting professional development, ethical sourcing, and sustainable business practices. AAPSCM&reg; is a recognized qualifying entity authorized to receive U.S. government grants to support the training and professional development of U.S. college students in the fields of procurement and supply chain management. Through these grant-funded initiatives, AAPSCM&reg; aims to provide students with free access to globally accredited certification programs, practical learning opportunities, and industry-aligned competencies that prepare them for leadership roles in today\'s competitive supply chain landscape. AAPSCM&reg; responsibilities include:</p>',
            ],

            // §4 Responsibilities (+ ANSI + Chapters)
            'responsibilities' => [
                'image' => '/storage/cms-images/2024/12/1-63.png',
                'items' => [
                    'Establishing and upholding professional standards and qualifications.',
                    'Regulating Membership to ensure adherence to a strict code of ethics and defined criteria.',
                    'Awarding certifications and credentials to signify professional competence.',
                    'Enforcing disciplinary measures to ensure accountability and maintain high standards of practice.',
                ],
                'ansi_body_html' => '<p>In addition, AAPSCM&reg; is proudly recognized as a member of the American National Standards Institute (ANSI) and maintains accreditation through the ANSI National Accreditation Board (ANAB) — demonstrating its commitment to the highest standards of quality and integrity in certification and professional development.</p><p>In further pursuit of global excellence, AAPSCM&reg; is also a member of the Institute for Credentialing Excellence (I.C.E.) and an active candidate for accreditation with the National Commission for Certifying Agencies (NCCA), underscoring its dedication to advancing internationally recognized credentialing standards within the procurement, supply chain, and tourism management professions.</p><p>These affiliations validate the organization\'s credibility and enhance its authority to govern and represent the interests of its professional community. AAPSCM&reg; members have the opportunity to join one of its active regional chapters, including:</p>',
                'chapters_col_a' => [
                    ['label' => 'Columbia, SC Chapter',     'url' => '/us-charters/#sc-chapter'],
                    ['label' => 'Spartanburg, SC Chapter',  'url' => '/us-charters/#Chapters'],
                    ['label' => 'Dallas, TX Chapter',       'url' => '/us-charters/#TX-Chapters'],
                    ['label' => 'New York, NY Chapter',     'url' => '/us-charters/#NY-Chapters'],
                    ['label' => 'Rockford, IL Chapter',     'url' => '/us-charters/#IL-Chapters'],
                ],
                'chapters_col_b' => [
                    ['label' => 'Boston, MA Chapter',   'url' => '/us-charters/#MA-Chapters'],
                    ['label' => 'Chicago, IL. Chapter', 'url' => null],
                    ['label' => 'Atlanta, GA. Chapter', 'url' => null],
                    ['label' => 'Baltimore, MD Chapter', 'url' => null],
                ],
            ],

            // §5 Chapters transition heading
            'chapters_transition_heading' => 'These chapters provide members with access to networking, professional development, and collaborative opportunities that advance their careers and the industry as a whole.',

            // §6 Mission / Vision
            'mission' => [
                'icon'    => '/storage/cms-images/2025/01/mission.png',
                'heading' => 'Our Mission',
                'body'    => 'To advance the fields of procurement, supply chain, e-commerce, and tourism management by promoting excellence in education, research, and professional practice. AAPSCM is committed to fostering innovation, ethical standards, and global collaboration to empower professionals and organizations to navigate the complexities of a dynamic world.',
            ],
            'vision' => [
                'icon'    => '/storage/cms-images/2025/01/shared-vision.png',
                'heading' => 'Our Vision',
                'body'    => 'To be the leading association shaping the future of procurement, supply chain, e-commerce, and tourism management, driving innovation, sustainability, and global connectivity. AAPSCM strives to create a resilient and inclusive professional community that contributes to worldwide economic growth and societal well-being.',
            ],

            // §7/§8 Chapter Functions (7 cards, 3+3+1)
            'chapter_functions' => [
                'intro_heading' => '<span class="font-semibold">AAPSCM&reg;</span> chapters perform the following functions',
                'cards' => [
                    [
                        'icon'  => '/storage/cms-images/2024/12/networking.png',
                        'title' => 'Local Representation and Networking',
                        'body'  => 'Chapters serve as local or specialized branches of the organization, fostering closer connections and tailored support for both professional and certified members in their specific region or focus area.',
                        'cta'   => null,
                    ],
                    [
                        'icon'  => '/storage/cms-images/2024/12/implementation.png',
                        'title' => 'Program Implementation and Events',
                        'body'  => 'They organize targeted workshops, seminars, and gatherings to effectively deliver the organization\'s mission and initiatives locally.',
                        'cta'   => null,
                    ],
                    [
                        'icon'  => '/storage/cms-images/2024/12/advocacy.png',
                        'title' => 'Advocacy and Community Outreach',
                        'body'  => 'Chapters represent the organization\'s interests regionally, engaging with stakeholders to address community needs and advocate for relevant policies.',
                        'cta'   => null,
                    ],
                    [
                        'icon'  => '/storage/cms-images/2024/12/networking.png',
                        'title' => 'Membership Growth and Retention',
                        'body'  => 'They bolster membership by offering localized value through networking opportunities, professional development programs, and volunteer activities.',
                        'cta'   => null,
                    ],
                    [
                        'icon'  => '/storage/cms-images/2024/12/implementation.png',
                        'title' => 'Fundraising and Financial Support',
                        'body'  => 'Chapters raise funds through various initiatives, supporting both local projects and the broader organization\'s overall operations.',
                        'cta'   => null,
                    ],
                    [
                        'icon'  => '/storage/cms-images/2024/12/advocacy.png',
                        'title' => 'Leadership and Volunteer Development',
                        'body'  => 'Serving on chapter boards or committees provides valuable leadership and governance experience for members.',
                        'cta'   => null,
                    ],
                    [
                        'icon'  => '/storage/cms-images/2024/12/implementation.png',
                        'title' => 'Feedback and Information Sharing',
                        'body'  => 'Chapters gather local insights and experiences, relaying this information back to the parent organization to shape strategies and policies.',
                        'cta'   => null,
                    ],
                ],
            ],

            // §9 Goals (5 image-boxes, 2+2+1)
            'goals' => [
                'heading' => '<strong>AAPSCM&reg;</strong> Goals',
                'icon'    => '/storage/cms-images/2024/12/check.png',
                'items'   => [
                    [
                        'title' => 'Promote Excellence in Professional Standards',
                        'body'  => 'Elevate professional skills, ethical integrity, and innovative practices across procurement, supply chain, tourism management, and e-commerce sectors.',
                    ],
                    [
                        'title' => 'Foster Industry Growth and Adaptability',
                        'body'  => 'Drive the development of a future-ready workforce and support the adoption of emerging technologies and strategies to meet global economic demands.',
                    ],
                    [
                        'title' => 'Enhance Education and Training Opportunities',
                        'body'  => 'Provide accessible, cutting-edge certifications, training programs, and resources to advance procurement, supply chain, tourism, and e-commerce management expertise.',
                    ],
                    [
                        'title' => 'Encourage Sustainable and Ethical Practices',
                        'body'  => 'Advocate for sustainability, ethical operations, and responsible decision-making in global business environments, including digital and e-commerce platforms.',
                    ],
                    [
                        'title' => 'Facilitate Global Collaboration and Innovation',
                        'body'  => 'Build a diverse and inclusive professional network to exchange knowledge, best practices, and forward-thinking solutions for traditional and digital marketplaces.',
                    ],
                ],
            ],

            // §10 Objectives intro
            'objectives' => [
                'heading'    => 'Our <span class="font-semibold">Objectives</span>',
                'intro_html' => '<p><strong>American Association of Procurement, Supply-Chain, and Tourism Management (AAPSCM)&reg;</strong> stands as a leading authority promoting excellence, growth, and innovation within procurement, supply chain, e-commerce, and tourism management. We are committed to:</p>',
                'cards' => [
                    [
                        'icon'    => '/storage/cms-images/2024/12/service.png',
                        'title'   => 'Upholding World-Class Standards',
                        'bullets' => [
                            'Championing professional expertise, integrity, and best practices.',
                            'Elevating ethical frameworks and responsible operations across the industry.',
                        ],
                    ],
                    [
                        'icon'    => '/storage/cms-images/2024/12/global-network.png',
                        'title'   => 'Providing Globally Recognized Certifications',
                        'bullets' => [
                            'Delivering credentials that empower professionals to advance their careers.',
                            'Equipping organizations to identify skilled, results-driven talent.',
                        ],
                    ],
                    [
                        'icon'    => '/storage/cms-images/2024/12/facilitation.png',
                        'title'   => 'Facilitating Comprehensive Education and Training',
                        'bullets' => [
                            'Equipping individuals with robust skill sets to meet rapidly evolving market demands.',
                            'Fostering continuous professional development and leadership growth.',
                        ],
                    ],
                    [
                        'icon'    => '/storage/cms-images/2024/12/reserch.png',
                        'title'   => 'Advancing Philanthropy and Pioneering Research',
                        'bullets' => [
                            'Investing in initiatives that benefit society and drive sector-wide improvements.',
                            'Fueling thought leadership and evidence-based solutions through cutting-edge studies.',
                        ],
                    ],
                    [
                        'icon'    => '/storage/cms-images/2024/12/reliability.png',
                        'title'   => 'Enhancing Operational Resilience and Optimization',
                        'bullets' => [
                            'Providing strategic tools to secure the right quality, quantity, and timeliness of resources.',
                            'Strengthening supply networks by mitigating disruptions and promoting sustainability.',
                        ],
                    ],
                    [
                        'icon'    => '/storage/cms-images/2024/12/settings-1.png',
                        'title'   => 'Maintaining a Vendor-Neutral, Independent Perspective',
                        'bullets' => [
                            'Offering unbiased insights, policy frameworks, and guidelines that support sustainable growth.',
                            'Encouraging global discourse while remaining free from specific commercial interests.',
                        ],
                    ],
                    [
                        'icon'    => '/storage/cms-images/2024/12/empowerment.png',
                        'title'   => 'Empowering Global Commerce',
                        'bullets' => [
                            'Building resilient, ethically grounded ecosystems that support international trade.',
                            'Championing collaborative efforts to foster economic prosperity and innovation.',
                        ],
                    ],
                ],
            ],

            // §12 Headquartered lead-in
            'headquartered_body_html' => '<p>Headquartered in Spartanburg, South Carolina, inside the university campus, with our conference center in Dallas, Texas, AAPSCM&reg; stands at the nexus of industry expertise and forward-looking strategy, continually driving innovation and shaping the future of these vital sectors.</p>',

            // §13 Become a Member
            'become_a_member' => [
                'image'       => '/storage/cms-images/2024/12/1-62.png',
                'heading'     => 'Become a <strong>Member</strong>',
                'subheading'  => 'Elevate Your Career, Expand Your Influence',
                'body_html'   => '<p>Join AAPSCM&reg;, a premier global network dedicated to shaping the future of procurement, supply chain, and tourism management through innovation, ethics, and best practices. As an AAPSCM&reg; member, you gain access to world-class certifications, cutting-edge industry research, and exclusive professional development opportunities designed to enhance your expertise and career trajectory.</p><p>With hundreds of active members worldwide and still growing, we are committed to fostering a collaborative and knowledge-driven community that empowers professionals to drive efficiency, sustainability, and strategic transformation in their organizations. Our global reach extends through strategic international partnerships in the Kingdom of Saudi Arabia, Europe, United Arab Emirates, Lebanon, Bahamas, and Bahrain, with planned expansion into Asia and other emerging markets.</p>',
                'footer_html' => '<p>Members benefit from exclusive networking events, leadership opportunities, career resources, International conferences and access to high-impact training that equip them with the skills to navigate complex global markets and thrive in a rapidly evolving business landscape. Whether you are an experienced leader or an aspiring professional, AAPSCM&reg; membership opens doors to unparalleled growth and recognition.</p><p>Join us today and be part of the movement shaping the future of global commerce! Whether you are an experienced leader or an aspiring professional, AAPSCM&reg; membership opens doors to unparalleled growth and recognition.</p>',
                'button_label' => 'Become a Member Today',
                'button_url'   => '/checkout/?add-to-cart=4234',
            ],

            // §14 Advocacy lead-in
            'advocacy_lead_in' => '<p>Our worldwide advocacy for procurement, supply chain, and tourism management is reinforced by our globally recognized standards, certification program, extensive academic and market research programs, and professional development opportunities.</p>',

            // §15 Accreditations and Alignment (6 logos)
            'accreditations' => [
                'heading'   => 'Accreditations and <strong>Alignment</strong>',
                'body_html' => '<p>Some of the world\'s leading organizations, including the US Department of Defense, US Army, US Navy, FBI, Microsoft, IBM, and the United Nations, have trusted AAPSCM&reg; for staff training and accreditation in procurement, supply chain, e-commerce, and tourism management.</p><p>AAPSCM&reg; certifications hold significant credibility globally and are approved by the US Department of Education across multiple states, including South Carolina, Texas, New York, New Jersey, Florida, Virginia, Ohio, North Carolina, Arkansas, etc. Certification representation may vary from state to state, aligning with the approved industry certification credential lists, making AAPSCM&reg; a trusted partner in workforce development and professional excellence.</p>',
                'logos' => [
                    ['image' => '/storage/cms-images/2025/01/1-33.png',      'label' => 'Department of Defense'],
                    ['image' => '/storage/cms-images/2025/01/1-32.png',      'label' => 'ANSI National Accreditation Board'],
                    ['image' => '/storage/cms-images/2025/01/Untitled-2.jpg', 'label' => 'American Council on Education'],
                    ['image' => '/storage/cms-images/2025/01/11.png',         'label' => null],
                    ['image' => '/storage/cms-images/2025/01/1-4.jpg',        'label' => "US Department of labor's Occupational Information Network"],
                    ['image' => '/storage/cms-images/2025/01/1-5.jpg',        'label' => 'US Army Credentialing Assistance'],
                ],
            ],

            // §16 Teasers (CAREERS / BOARD MEMBERS)
            'teasers' => [
                [
                    'image'        => '/storage/cms-images/2023/10/fourth.jpg',
                    'heading'      => 'CAREERS',
                    'heading_url'  => '/career-center/',
                    'body_html'    => '<p>Are you interested in pursuing procurement, supply chain, e-commerce, or tourism opportunities in the United States? <strong>AAPSCM&reg;</strong> has been recognized for three consecutive years as one of the &ldquo;fastest-growing professional associations in the State of South Carolina,&rdquo; offering a range of quick job search and career advancement possibilities. To learn more about our current opportunities, please email <strong>' . $cfEmail('info@aapscm.org') . '</strong>. We are also expanding our global footprint by approving authorized training partners in the Middle East, India, China, and Africa. If your organization is interested in becoming an affiliate partner, we invite you to reach out at <strong>' . $cfEmail('admin@aapscm.org') . '</strong>. Join us and be part of a dynamic, rapidly growing network shaping the future of these critical industries.</p>',
                    'button_label' => 'Read More',
                    'button_url'   => '/career-center/',
                ],
                [
                    'image'        => '/storage/cms-images/2023/10/second.jpg',
                    'heading'      => 'BOARD MEMBERS',
                    'heading_url'  => '/board-of-directors/',
                    'body_html'    => '<p>Our board of directors is made up of top executives and thought-leaders working in various esteemed positions within the procurement, supply chain, tourism and technology channel. They help guide the association and the management, hospitality and tourism industry at large.</p>',
                    'button_label' => 'Council Board Executives & Administration',
                    'button_url'   => '/board-of-directors/',
                ],
            ],

            // §17 Closing
            'closing' => [
                'heading'    => 'Globally Trusted and <span class="font-semibold">Mission-Driven</span>',
                'body_html'  => '<p>AAPSCM&reg; stands apart as a globally trusted, mission-driven partner dedicated to cultivating expertise and supporting workforce development. By prioritizing education and innovation, we empower professionals to master procurement strategies, optimize supply chains, lead transformative efforts in the tourism industry, and excel in the rapidly evolving field of e-commerce. Our commitment ensures that members are equipped to navigate the complexities of modern industries and drive sustainable growth and innovation. As a member-driven organization, we offer unparalleled networking opportunities, thought leadership, and skill-building, ensuring our members access the latest insights and tools. Join us in shaping the future of procurement, supply chain, and tourism management while supporting a non-profit dedicated to empowering professionals and promoting excellence without commercial bias. Together, we\'re creating a smarter, more sustainable future.</p>',
                'image_pair' => [
                    '/storage/cms-images/2024/12/11-2.png',
                    '/storage/cms-images/2024/12/22-2.png',
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'about-us'],
            [
                'title'            => 'About us',
                'content'          => null,
                'excerpt'          => 'About the American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM)&reg;.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => 'About Us | AAPSCM',
                'meta_description' => 'The American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM)® — a chartered 501(c)(3) advancing professional standards in procurement, supply chain, e-commerce, and tourism management.',
                'show_in_nav'      => true,
            ],
        );
    }
}
