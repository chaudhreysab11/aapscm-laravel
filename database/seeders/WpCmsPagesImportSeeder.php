<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use App\Models\Redirect;
use App\Models\SeoMeta;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Imports Module 1 (Public CMS) pages from WordPress source data.
 *
 * Sources:
 *  - sql_clean_pages.csv  — IDs, slugs, titles
 *  - wp_pages.csv         — content_text + SEO meta (for pages present in the API crawl)
 *
 * Rules:
 *  - Only imports static informational / org pages (Module 1 scope)
 *  - Skips cert/training/membership/career-center pages (other modules)
 *  - Skips all test_test-*, -old, and WP theme demo pages
 *  - Creates 301 redirects for every aapscm-training-virtual-* slug → canonical cert slug
 *  - Idempotent: safe to re-run (updateOrCreate keyed on source_id / url_path)
 */
class WpCmsPagesImportSeeder extends Seeder
{
    // ---------------------------------------------------------------------------
    // Entry point
    // ---------------------------------------------------------------------------

    public function run(): void
    {
        $this->command->info('Importing Module 1 CMS pages from WordPress data…');

        DB::transaction(function (): void {
            $slugToId = $this->importCmsPages();
            $this->wireParentIds($slugToId);
        });

        $this->createTrainingVirtualRedirects();

        $this->command->info('Done.');
    }

    // ---------------------------------------------------------------------------
    // Pass 1 — create / update every CMS page
    // ---------------------------------------------------------------------------

    /** @return array<string,int> slug → laravel page id */
    private function importCmsPages(): array
    {
        $slugToId = [];

        foreach ($this->definitions() as $def) {
            $def = $this->normalizeUrls($def);
            $canonical = UrlRewriter::canonical($def['slug']);

            $page = Page::updateOrCreate(
                ['source_id' => $def['source_id']],
                [
                    'title' => $def['title'],
                    'slug' => $def['slug'],
                    'content' => $def['content'] ?? '',
                    'excerpt' => $def['excerpt'] ?? '',
                    'status' => 'published',
                    'template' => $def['template'] ?? 'standard_content',
                    'page_data' => $def['page_data'] ?? null,
                    'blocks' => $def['blocks'] ?? null,
                    'meta_title' => $def['seo_title'] ?? $def['title'],
                    'meta_description' => $def['seo_description'] ?? '',
                    'seo_title' => $def['seo_title'] ?? $def['title'],
                    'seo_description' => $def['seo_description'] ?? '',
                    'seo_canonical' => $canonical,
                    'is_published' => true,
                    'show_in_nav' => $def['show_in_nav'] ?? false,
                    'sort_order' => $def['sort_order'] ?? 0,
                    'parent_id' => null, // set in pass 2
                ]
            );

            $slugToId[$def['slug']] = $page->id;

            SeoMeta::updateOrCreate(
                ['url_path' => '/' . $def['slug'] . '/'],
                [
                    'seo_title' => $def['seo_title'] ?? $def['title'],
                    'seo_description' => $def['seo_description'] ?? '',
                    'canonical_url' => $canonical,
                    'og_title' => $def['seo_title'] ?? $def['title'],
                    'og_description' => $def['seo_description'] ?? '',
                    'og_image' => $def['og_image'] ?? null,
                    'robots' => 'index, follow',
                    'seoable_id' => $page->id,
                    'seoable_type' => Page::class,
                    'source_id' => $def['source_id'],
                ]
            );
        }

        return $slugToId;
    }

    /**
     * Walks a $def array and rewrites any aapscm.org URLs it finds to local paths.
     * Applied before the page is persisted so nothing in the DB points at the live WP origin.
     *
     * @param array<string, mixed> $def
     * @return array<string, mixed>
     */
    private function normalizeUrls(array $def): array
    {
        if (isset($def['content']) && is_string($def['content'])) {
            $def['content'] = UrlRewriter::rewriteHtml($def['content']);
        }

        if (isset($def['og_image']) && is_string($def['og_image'])) {
            $def['og_image'] = UrlRewriter::image($def['og_image']);
        }

        if (isset($def['blocks']) && is_array($def['blocks'])) {
            $def['blocks'] = $this->walkAndRewrite($def['blocks']);
        }

        if (isset($def['page_data']) && is_array($def['page_data'])) {
            $def['page_data'] = $this->walkAndRewrite($def['page_data']);
        }

        return $def;
    }

    /**
     * Recursively walks an array and rewrites string leaves that contain
     * aapscm.org URLs (both image URLs and internal page URLs).
     */
    private function walkAndRewrite(mixed $value): mixed
    {
        if (is_string($value)) {
            if (str_contains($value, '/wp-content/uploads/')) {
                return UrlRewriter::image($value);
            }

            if (str_contains($value, '<') || str_contains($value, 'aapscm.org')) {
                return UrlRewriter::rewriteHtml($value);
            }

            return $value;
        }

        if (is_array($value)) {
            foreach ($value as $k => $v) {
                $value[$k] = $this->walkAndRewrite($v);
            }
        }

        return $value;
    }

    // ---------------------------------------------------------------------------
    // Pass 2 — set parent_id for child pages (board member profiles)
    // ---------------------------------------------------------------------------

    /** @param array<string,int> $slugToId */
    private function wireParentIds(array $slugToId): void
    {
        foreach ($this->definitions() as $def) {
            if (! isset($def['parent_slug'])) {
                continue;
            }

            $parentId = $slugToId[$def['parent_slug']] ?? null;

            if ($parentId === null) {
                $this->command->warn("Parent slug '{$def['parent_slug']}' not found for '{$def['slug']}' — parent_id left null.");

                continue;
            }

            Page::where('source_id', $def['source_id'])
                ->update(['parent_id' => $parentId]);
        }
    }

    // ---------------------------------------------------------------------------
    // Training-virtual redirects — read from wp_pages.csv
    // ---------------------------------------------------------------------------

    private function createTrainingVirtualRedirects(): void
    {
        $csvPath = base_path('../Sitemap Analysis/wp_pages.csv');

        if (! file_exists($csvPath)) {
            $this->command->warn("wp_pages.csv not found at {$csvPath} — skipping training-virtual redirects.");

            return;
        }

        $handle = fopen($csvPath, 'r');

        if ($handle === false) {
            $this->command->warn('Could not open wp_pages.csv — skipping training-virtual redirects.');

            return;
        }

        $header = fgetcsv($handle); // discard header row
        $created = 0;
        $skipped = 0;

        if ($header === false || $header === null) {
            fclose($handle);

            return;
        }

        while (($row = fgetcsv($handle)) !== false) {
            if (count($row) < 2) {
                continue;
            }

            $rowData = array_combine($header, $row);

            if ($rowData === false) {
                continue;
            }

            $slug = trim($rowData['slug'] ?? '');

            if (! str_starts_with($slug, 'aapscm-training-virtual-')) {
                continue;
            }

            $canonicalSlug = str_replace('aapscm-training-virtual-', '', $slug);
            $fromPath = '/' . $slug . '/';
            $toPath = '/' . $canonicalSlug . '/';

            $existing = Redirect::where('from_path', $fromPath)->first();

            if ($existing !== null) {
                $skipped++;

                continue;
            }

            Redirect::create([
                'from_path' => $fromPath,
                'to_path' => $toPath,
                'http_code' => 301,
                'is_active' => true,
                'notes' => 'WP training-virtual duplicate → canonical cert page (auto-imported)',
                'hit_count' => 0,
            ]);

            $created++;
        }

        fclose($handle);

        $this->command->info("Training-virtual redirects: {$created} created, {$skipped} already existed.");
    }

    // ---------------------------------------------------------------------------
    // Page definitions
    // ---------------------------------------------------------------------------

    /**
     * Static definition list for Module 1 CMS pages.
     *
     * source_id: WordPress post ID from sql_clean_pages.csv
     * parent_slug: resolved to parent_id in pass 2 (board member profiles only)
     * content: only provided where content_text was available from wp_pages.csv;
     *          all other pages use '' so editors can fill content via Filament CMS.
     *
     * @return array<int, array<string, mixed>>
     */
    private function definitions(): array
    {
        return [
            // ------------------------------------------------------------------
            // Core organisational pages
            // ------------------------------------------------------------------
            [
                'source_id'       => 9389,
                'slug'            => 'about-us',
                'title'           => 'About Us',
                'seo_title'       => 'About Us - AAPSCM®',
                'seo_description' => 'Learn about the American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®).',
                'canonical'       => 'https://aapscm.org/about-us/',
                'excerpt'         => 'The American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®) is a globally respected nonprofit professional body advancing the procurement, supply chain, and tourism management professions worldwide.',
                'show_in_nav'     => true,
                'sort_order'      => 10,
                'blocks'          => [
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'heading' => 'Who We Are',
                            'content' => '<p><strong>AAPSCM®</strong> (American Association of Procurement, Supply Chain, and Tourism Management) is a globally respected nonprofit professional body dedicated to certifying, educating, and advancing procurement, supply chain, logistics, and tourism management professionals worldwide.</p><p>Founded by industry leaders, AAPSCM® serves certified professionals across more than 100 countries. Our internationally recognised certifications are trusted by employers, government agencies, and academic institutions worldwide.</p>',
                        ],
                    ],
                    [
                        'type' => 'text_image',
                        'data' => [
                            'heading'        => 'Our Mission',
                            'text'           => '<p>Our mission is to advance the procurement, supply chain, and tourism management professions by providing industry-leading certifications, continuing education, and a global network connecting practitioners at every career stage.</p><ul><li>Empower professionals with internationally recognised credentials</li><li>Promote ethical standards and best practice in procurement</li><li>Connect a global community of supply chain and tourism experts</li><li>Drive innovation through AI-integrated curriculum and research</li></ul>',
                            'image_url'      => '',
                            'image_position' => 'right',
                        ],
                    ],
                    [
                        'type' => 'cards',
                        'data' => [
                            'heading' => 'What Sets AAPSCM® Apart',
                            'columns' => 3,
                            'items'   => [
                                ['data' => ['title' => '60+ Certifications',       'description' => 'A comprehensive catalogue of credentials spanning procurement, supply chain, AI procurement, tourism management, and logistics.']],
                                ['data' => ['title' => '100+ Countries',           'description' => 'Our certified professionals are recognised and respected by leading employers and government agencies across the globe.']],
                                ['data' => ['title' => 'Nonprofit & Independent',  'description' => 'As a nonprofit, our sole focus is advancing the profession. Every programme is designed for practitioner impact.']],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading'          => 'Ready to Advance Your Career?',
                            'text'             => 'Explore our certification catalogue and find the credential that matches your career goals.',
                            'primary_label'    => 'View Certifications',
                            'primary_url'      => '/certifications/',
                            'secondary_label'  => 'Become a Member',
                            'secondary_url'    => '/membership/',
                            'background_color' => 'blue',
                        ],
                    ],
                ],
            ],
            [
                'source_id'       => 10754,
                'slug'            => 'contact-us',
                'title'           => 'Contact Us',
                'seo_title'       => 'Contact Us - AAPSCM®',
                'seo_description' => 'Get in touch with the AAPSCM® team. We are here to answer your questions and support your certification journey.',
                'canonical'       => 'https://aapscm.org/contact-us/',
                'excerpt'         => 'Get in touch with the AAPSCM® team. We are here to answer your questions and support your certification journey.',
                'show_in_nav'     => true,
                'sort_order'      => 90,
                'blocks'          => [
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'heading' => 'Get in Touch',
                            'content' => '<p>We would love to hear from you. Whether you have questions about certifications, membership, training programmes, or partnership opportunities, our team is here to help.</p><h3>Contact Details</h3><ul><li><strong>Email:</strong> <a href="mailto:info@aapscm.org">info@aapscm.org</a></li><li><strong>Website:</strong> <a href="https://aapscm.org">www.aapscm.org</a></li></ul><h3>Office Hours</h3><p>Monday – Friday: 9:00 AM – 5:00 PM (EST)</p>',
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading'          => 'Have a Specific Enquiry?',
                            'text'             => 'For membership enquiries, certification support, or partnership discussions, please e-mail us directly.',
                            'primary_label'    => 'Email Us',
                            'primary_url'      => 'mailto:info@aapscm.org',
                            'background_color' => 'gray',
                            'alignment'        => 'center',
                        ],
                    ],
                ],
            ],
            [
                'source_id'       => 9433,
                'slug'            => 'why-join-aapscm',
                'title'           => 'Why Join AAPSCM®',
                'seo_title'       => 'Why Join AAPSCM® - Member Benefits',
                'seo_description' => 'Discover why professionals worldwide choose AAPSCM® for their procurement and supply chain certifications.',
                'canonical'       => 'https://aapscm.org/why-join-aapscm/',
                'excerpt'         => 'Discover why thousands of professionals worldwide choose AAPSCM® for internationally recognised certifications and career-defining professional development.',
                'show_in_nav'     => false,
                'sort_order'      => 20,
                'blocks'          => [
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'heading' => 'Your Competitive Edge Starts Here',
                            'content' => '<p>In today\'s competitive global marketplace, employers seek professionals who can demonstrate verified expertise. AAPSCM® certifications signal to employers that you have met rigorous international standards in procurement, supply chain, or tourism management.</p>',
                        ],
                    ],
                    [
                        'type' => 'cards',
                        'data' => [
                            'heading' => 'Member Benefits',
                            'columns' => 2,
                            'items'   => [
                                ['data' => ['title' => 'Globally Recognised Credentials', 'description' => 'Our certifications are recognised by employers, government agencies, and academic institutions across more than 100 countries.']],
                                ['data' => ['title' => 'Study Materials & Resources',     'description' => 'Members gain access to exclusive study guides, practice exams, and professional development resources.']],
                                ['data' => ['title' => 'Professional Networking',         'description' => 'Connect with a global community of procurement and supply chain professionals through our chapters and online communities.']],
                                ['data' => ['title' => 'Career Advancement',              'description' => 'AAPSCM® certified professionals report higher salaries, faster promotions, and greater employer confidence.']],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading'          => 'Join Thousands of Certified Professionals',
                            'text'             => 'Select your certification level and start your journey towards a globally recognised credential.',
                            'primary_label'    => 'Explore Certifications',
                            'primary_url'      => '/certifications/',
                            'secondary_label'  => 'Membership Options',
                            'secondary_url'    => '/membership/',
                            'background_color' => 'blue',
                        ],
                    ],
                ],
            ],
            [
                'source_id'       => 4397,
                'slug'            => 'trademark',
                'title'           => 'Trademark',
                'seo_title'       => 'Trademark Policy - AAPSCM®',
                'seo_description' => 'Learn about the AAPSCM® trademark and intellectual property rights protecting our certifications and brand identity.',
                'canonical'       => 'https://aapscm.org/trademark/',
                'template'        => 'legal_full_width',
                'show_in_nav'     => false,
                'sort_order'      => 80,
                'blocks'          => [
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'content' => '<h2>AAPSCM® Trademark Policy</h2><p>The name "AAPSCM®", the associated logo, and all certification designation marks (including but not limited to all credential acronyms offered by AAPSCM®) are trademarks and service marks of the American Association of Procurement, Supply Chain, and Tourism Management.</p><h3>Permitted Use</h3><p>Certified members in good standing are permitted to use their specific earned designation mark after their name (e.g., "John Smith, CPPM") in professional communications, business cards, and résumés. Use of the AAPSCM® name or logo for any other purpose requires prior written consent.</p><h3>Prohibited Uses</h3><ul><li>Use of AAPSCM® marks to imply organisational endorsement without authorisation</li><li>Reproduction of the AAPSCM® logo in any marketing or promotional material without a current authorised training partner agreement</li><li>Use of designation marks by individuals whose certification has lapsed or been revoked</li><li>Modification or alteration of any AAPSCM® trademark</li></ul><h3>Enforcement</h3><p>AAPSCM® actively monitors and enforces its trademark rights. Unauthorised use may result in legal action. To report an infringement or request permission, contact <a href="mailto:legal@aapscm.org">legal@aapscm.org</a>.</p>',
                            'width'   => 'normal',
                        ],
                    ],
                ],
            ],
            [
                'source_id'       => 20854,
                'slug'            => 'privacy-policy-legal',
                'title'           => 'Privacy Policy',
                'seo_title'       => 'Privacy Policy - AAPSCM®',
                'seo_description' => 'Review the AAPSCM® privacy policy, terms of use, and legal notices governing the use of this website and its services.',
                'canonical'       => 'https://aapscm.org/privacy-policy-legal/',
                'template'        => 'legal_full_width',
                'show_in_nav'     => false,
                'sort_order'      => 85,
                'blocks'          => [
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'content' => '<p><em>Last updated: April 2026</em></p><h2>1. Introduction</h2><p>The American Association of Procurement, Supply Chain, and Tourism Management ("AAPSCM®", "we", "us", or "our") is committed to protecting your personal information and your right to privacy. This Privacy Policy explains how we collect, use, and protect data when you visit our website or use our services.</p><h2>2. Information We Collect</h2><p>We collect information you voluntarily provide when you register for certifications, purchase products, apply for membership, or contact us. This may include your name, email address, postal address, telephone number, educational background, and payment information.</p><p>We also collect certain technical information automatically, including IP address, browser type, pages visited, and time spent on site via cookies and similar technologies.</p><h2>3. How We Use Your Information</h2><ul><li>To process certification applications and issue credentials</li><li>To manage your membership account and send renewal reminders</li><li>To process payments securely via our payment partners</li><li>To communicate news, updates, and professional development opportunities</li><li>To improve website functionality and user experience</li><li>To comply with legal and regulatory obligations</li></ul><h2>4. Sharing of Information</h2><p>We do not sell or rent your personal data. We may share data with trusted service providers who assist us in operating our website and delivering services (including payment processors and email service providers), subject to confidentiality obligations. We may disclose information if required by law.</p><h2>5. Cookies</h2><p>Our website uses cookies to remember your preferences and improve your experience. You can control cookie settings through your browser. Disabling cookies may affect some website functionality.</p><h2>6. Data Retention</h2><p>We retain personal data for as long as necessary to provide services and comply with legal obligations. Certification records are retained indefinitely to support credential verification.</p><h2>7. Your Rights</h2><p>Depending on your jurisdiction, you may have the right to access, correct, or delete your personal information. To exercise these rights, contact us at <a href="mailto:privacy@aapscm.org">privacy@aapscm.org</a>.</p><h2>8. Security</h2><p>We implement industry-standard technical and organisational measures to protect your data from unauthorised access, disclosure, or loss.</p><h2>9. Contact</h2><p>For privacy-related enquiries, contact our Data Privacy Officer at <a href="mailto:privacy@aapscm.org">privacy@aapscm.org</a>.</p>',
                            'width'   => 'normal',
                        ],
                    ],
                ],
            ],

            // ------------------------------------------------------------------
            // Membership & partner pages
            // ------------------------------------------------------------------
            [
                'source_id'       => 9687,
                'slug'            => 'affiliate-partners',
                'title'           => 'Affiliate Partners',
                'seo_title'       => 'Affiliate Partners - AAPSCM®',
                'seo_description' => 'Explore AAPSCM® affiliate partnerships, international training network collaborations, and partner opportunities worldwide.',
                'canonical'       => 'https://aapscm.org/affiliate-partners/',
                'excerpt'         => 'AAPSCM® partners with leading training providers, academic institutions, and professional bodies worldwide to deliver internationally recognised credentials.',
                'show_in_nav'     => false,
                'sort_order'      => 60,
                'blocks'          => [
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'heading' => 'Our Global Partner Network',
                            'content' => '<p>AAPSCM® collaborates with a growing network of affiliate partners — training institutions, academic bodies, and professional organisations — to deliver internationally recognised procurement, supply chain, and tourism management credentials worldwide.</p><p>Our affiliate partners share our commitment to professional excellence and help extend the reach of AAPSCM® certifications to professionals in every region and industry sector.</p>',
                        ],
                    ],
                    [
                        'type' => 'cards',
                        'data' => [
                            'heading' => 'Types of Affiliate Partners',
                            'columns' => 3,
                            'items'   => [
                                ['data' => ['title' => 'Authorised Training Providers', 'description' => 'Licensed organisations delivering AAPSCM® accredited courses in classroom, virtual, or hybrid formats.']],
                                ['data' => ['title' => 'Academic Affiliates',           'description' => 'Universities and colleges integrating AAPSCM® curriculum into degree programmes and executive education.']],
                                ['data' => ['title' => 'Professional Associations',     'description' => 'Industry bodies and procurement associations that recognise AAPSCM® credentials for continuing education credit.']],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading'          => 'Interested in Becoming an Affiliate Partner?',
                            'text'             => 'Join our partner network and help advance procurement and supply chain excellence in your region.',
                            'primary_label'    => 'Become a Partner',
                            'primary_url'      => '/become-a-partner/',
                            'background_color' => 'blue',
                        ],
                    ],
                ],
            ],
            [
                'source_id'       => 3915,
                'slug'            => 'become-a-partner',
                'title'           => 'Become a Partner',
                'seo_title'       => 'Become a Partner - AAPSCM®',
                'seo_description' => 'Partner with AAPSCM® to offer internationally recognised certifications.',
                'canonical'       => 'https://aapscm.org/become-a-partner/',
                'excerpt'         => 'Join the AAPSCM® global partner network and deliver world-class procurement and supply chain credentials in your region.',
                'show_in_nav'     => false,
                'sort_order'      => 65,
                'blocks'          => [
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'heading' => 'Partner With AAPSCM®',
                            'content' => '<p>Partnering with AAPSCM® gives your organisation access to a world-class portfolio of procurement, supply chain, and tourism management certifications. Our partner programme is designed for training providers, academic institutions, and professional bodies who want to deliver globally recognised credentials.</p>',
                        ],
                    ],
                    [
                        'type' => 'cards',
                        'data' => [
                            'heading' => 'Partnership Opportunities',
                            'columns' => 3,
                            'items'   => [
                                ['data' => ['title' => 'Authorised Training Partner', 'description' => 'Deliver AAPSCM® accredited training programmes in your market under an authorised licence.',              'link_url' => '/become-a-authorized-training-partner/', 'link_label' => 'Learn More']],
                                ['data' => ['title' => 'Academic Affiliate',          'description' => 'Integrate AAPSCM® curriculum into your degree or executive education offerings with dual-credentialing.']],
                                ['data' => ['title' => 'Corporate Partner',           'description' => 'Offer AAPSCM® certifications as a staff development benefit with preferential pricing and group enrolment.']],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading'          => 'Ready to Partner With Us?',
                            'text'             => 'Contact our partnerships team to discuss the best partnership model for your organisation.',
                            'primary_label'    => 'Contact Us',
                            'primary_url'      => '/contact-us/',
                            'background_color' => 'blue',
                        ],
                    ],
                ],
            ],
            [
                'source_id'       => 11058,
                'slug'            => 'become-a-authorized-training-partner',
                'title'           => 'Become an Authorized Training Partner',
                'seo_title'       => 'Authorized Training Partner - AAPSCM®',
                'seo_description' => 'Become an AAPSCM® Authorized Training Partner and deliver globally recognised procurement and supply chain certifications.',
                'canonical'       => 'https://aapscm.org/become-a-authorized-training-partner/',
                'excerpt'         => 'Become an AAPSCM® Authorized Training Partner (ATP) and deliver internationally recognised procurement, supply chain, and tourism certifications in your market.',
                'show_in_nav'     => false,
                'sort_order'      => 66,
                'blocks'          => [
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'heading' => 'AAPSCM® Authorized Training Partner Programme',
                            'content' => '<p>The AAPSCM® Authorized Training Partner (ATP) programme enables qualified training organisations to deliver our accredited certification programmes to candidates in their region. As an ATP, you gain the right to market AAPSCM® credentials under your brand, with full curriculum and assessment support from our team.</p>',
                        ],
                    ],
                    [
                        'type' => 'accordion',
                        'data' => [
                            'heading' => 'ATP Requirements & Benefits',
                            'items'   => [
                                ['data' => ['question' => 'What are the eligibility requirements?',          'answer' => '<p>Applicants must be a registered legal entity with a demonstrable track record in professional training or education. Organisations must have qualified instructors with relevant procurement or supply chain credentials and appropriate training facilities (physical or virtual).</p>']],
                                ['data' => ['question' => 'What licences and rights does an ATP receive?',   'answer' => '<p>Authorised Training Partners receive a licence to use AAPSCM® branding, marketing materials, and official curriculum for the programmes specified in their agreement. ATPs may market, promote, and deliver AAPSCM® accredited courses to candidates in their licensed territory.</p>']],
                                ['data' => ['question' => 'What support does AAPSCM® provide?',              'answer' => '<ul><li>Full official curriculum and instructor materials</li><li>Candidate registration and examination support</li><li>Co-branded marketing toolkit</li><li>Dedicated partner liaison contact</li><li>Access to the ATP online portal</li></ul>']],
                                ['data' => ['question' => 'What are the annual fees and commitments?',       'answer' => '<p>ATP agreements are annual and subject to a minimum candidate enrolment commitment. Fees vary by programme scope and territory. Contact our partnerships team for a tailored proposal.</p>']],
                                ['data' => ['question' => 'How do I apply?',                                 'answer' => '<p>Submit your expression of interest via the contact form. Our partnerships team will respond within 5 business days with an application pack and next steps.</p>']],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading'          => 'Apply to Become an Authorized Training Partner',
                            'text'             => 'Our partnerships team will guide you through the application process.',
                            'primary_label'    => 'Contact Our Team',
                            'primary_url'      => '/contact-us/',
                            'background_color' => 'blue',
                        ],
                    ],
                ],
            ],
            [
                'source_id'       => 10179,
                'slug'            => 'communities',
                'title'           => 'Global Chapters & Communities',
                'seo_title'       => 'Global Chapters & Communities - AAPSCM®',
                'seo_description' => 'Connect with AAPSCM® global chapters and communities of procurement and supply chain professionals worldwide.',
                'canonical'       => 'https://aapscm.org/communities/',
                'template'        => 'communities',
                'excerpt'         => 'Connect with AAPSCM® chapters and communities of procurement, supply chain, and tourism professionals across the globe.',
                'show_in_nav'     => false,
                'sort_order'      => 55,
                'page_data'       => [
                    'filter_type'         => 'all',
                    'communities_heading' => 'Our Global Chapters & Communities',
                ],
            ],
            [
                'source_id'       => 9733,
                'slug'            => 'us-charters',
                'title'           => 'US Charters',
                'seo_title'       => 'US Charters - AAPSCM®',
                'seo_description' => 'Find AAPSCM® chartered regional chapters across the United States for local networking and professional development.',
                'canonical'       => 'https://aapscm.org/us-charters/',
                'template'        => 'communities',
                'excerpt'         => 'Find your local AAPSCM® chapter across the United States and connect with procurement and supply chain professionals in your region.',
                'show_in_nav'     => false,
                'sort_order'      => 56,
                'page_data'       => [
                    'filter_type'         => 'chapter',
                    'communities_heading' => 'AAPSCM® US Chapters',
                ],
            ],
            [
                'source_id'       => 9670,
                'slug'            => 'member-services',
                'title'           => 'Member Services',
                'seo_title'       => 'Member Services - AAPSCM®',
                'seo_description' => 'Access exclusive AAPSCM® member services including certification support, resources, and professional development tools.',
                'canonical'       => 'https://aapscm.org/member-services/',
                'excerpt'         => 'AAPSCM® members enjoy a comprehensive suite of services designed to support your certification journey, career growth, and professional network.',
                'show_in_nav'     => false,
                'sort_order'      => 40,
                'blocks'          => [
                    [
                        'type' => 'cards',
                        'data' => [
                            'heading' => 'Services Available to Members',
                            'columns' => 2,
                            'items'   => [
                                ['data' => ['title' => 'Certification Support',       'description' => 'Guidance and resources to help you prepare for and succeed in your AAPSCM® certification exams, including study materials and practice tools.']],
                                ['data' => ['title' => 'Digital Badges & Credentials', 'description' => 'Receive and share verifiable digital badges upon certification to showcase your achievements on LinkedIn and professional profiles.']],
                                ['data' => ['title' => 'Networking & Communities',    'description' => 'Access global chapters, online communities, and events connecting you with thousands of procurement and supply chain professionals.']],
                                ['data' => ['title' => 'Member Discounts',            'description' => 'Enjoy preferential pricing on re-certification, additional certifications, events, and partner training programmes.']],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading'          => 'Not Yet a Member?',
                            'text'             => 'Join AAPSCM® today and unlock the full range of member services and certification benefits.',
                            'primary_label'    => 'Explore Membership',
                            'primary_url'      => '/membership/',
                            'background_color' => 'blue',
                        ],
                    ],
                ],
            ],
            [
                'source_id'       => 12690,
                'slug'            => 'benefits-and-resources',
                'title'           => 'Benefits and Resources',
                'seo_title'       => 'Member Benefits & Resources - AAPSCM®',
                'seo_description' => 'Unlock AAPSCM® member benefits and resources: study materials, industry content, and professional networking opportunities.',
                'canonical'       => 'https://aapscm.org/benefits-and-resources/',
                'excerpt'         => 'AAPSCM® membership unlocks a wide range of benefits and resources to support your certification, career development, and professional network.',
                'show_in_nav'     => false,
                'sort_order'      => 45,
                'blocks'          => [
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'heading' => 'Member Benefits & Resources',
                            'content' => '<p>AAPSCM® membership is more than a credential — it\'s a gateway to a comprehensive ecosystem of resources, recognition, and professional community. Below are the key benefits available to members at all tiers.</p>',
                        ],
                    ],
                    [
                        'type' => 'cards',
                        'data' => [
                            'heading' => 'Key Benefits',
                            'columns' => 3,
                            'items'   => [
                                ['data' => ['title' => 'Study Materials',          'description' => 'Access official study guides, exam prep resources, and reference materials for all AAPSCM® certifications.']],
                                ['data' => ['title' => 'Professional Network',     'description' => 'Connect with a global community of certified procurement, supply chain, and tourism professionals.']],
                                ['data' => ['title' => 'Digital Credentials',      'description' => 'Issue shareable digital badges to verify and display your AAPSCM® credentials on LinkedIn and digital CVs.']],
                                ['data' => ['title' => 'Career Resources',         'description' => 'Access the AAPSCM® Career Center for job listings, employer connections, and CV submission tools.']],
                                ['data' => ['title' => 'Events & Conferences',     'description' => 'Receive preferential access and pricing for AAPSCM® events, webinars, and annual conferences.']],
                                ['data' => ['title' => 'PDEs & Continuing Ed.',    'description' => 'Maintain your certification and track continuing education through the Professional Development Education (PDE) programme.']],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading'          => 'Unlock Your Member Benefits Today',
                            'text'             => 'Choose the membership tier that\'s right for you and start benefiting from the full AAPSCM® ecosystem.',
                            'primary_label'    => 'View Membership Tiers',
                            'primary_url'      => '/membership/',
                            'background_color' => 'blue',
                        ],
                    ],
                ],
            ],
            [
                'source_id'       => 11127,
                'slug'            => 'professional-member-criteria',
                'title'           => 'Professional Member Criteria',
                'seo_title'       => 'Professional Member Criteria - AAPSCM®',
                'seo_description' => 'Review the criteria and requirements to qualify for AAPSCM® professional membership and access exclusive member benefits.',
                'canonical'       => 'https://aapscm.org/professional-member-criteria/',
                'excerpt'         => 'Review the eligibility requirements and application criteria for AAPSCM® professional membership.',
                'show_in_nav'     => false,
                'sort_order'      => 42,
                'blocks'          => [
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'heading' => 'Who Qualifies for Professional Membership?',
                            'content' => '<p>AAPSCM® Professional Membership is open to individuals working in or studying procurement, supply chain management, logistics, purchasing, materials management, or tourism management. Multiple membership tiers are available to reflect different career stages and levels of professional achievement.</p>',
                        ],
                    ],
                    [
                        'type' => 'accordion',
                        'data' => [
                            'heading' => 'Eligibility Criteria by Membership Tier',
                            'items'   => [
                                ['data' => ['question' => 'Student Member',          'answer' => '<p>Available to individuals currently enrolled in a degree or diploma programme in procurement, supply chain, business, or a related discipline. Proof of enrolment required.</p>']],
                                ['data' => ['question' => 'Associate Member',        'answer' => '<p>Available to individuals working in procurement, supply chain, or logistics with up to 3 years of professional experience. No formal certification is required to join at this level.</p>']],
                                ['data' => ['question' => 'Professional Member',     'answer' => '<p>Requires holding at least one active AAPSCM® certification or equivalent recognised credential, plus a minimum of 3 years of relevant professional experience.</p>']],
                                ['data' => ['question' => 'Senior Professional Member', 'answer' => '<p>Requires an advanced AAPSCM® certification and a minimum of 7 years of senior-level experience in procurement or supply chain management.</p>']],
                                ['data' => ['question' => 'Fellow',                  'answer' => '<p>The highest membership honour, awarded to individuals who have made an exceptional contribution to the profession. Fellowship is by nomination and approval of the AAPSCM® Board.</p>']],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading'          => 'Ready to Apply for Membership?',
                            'text'             => 'Select your membership tier and begin your application today.',
                            'primary_label'    => 'Apply for Membership',
                            'primary_url'      => '/membership/',
                            'background_color' => 'blue',
                        ],
                    ],
                ],
            ],

            // ------------------------------------------------------------------
            // Non-profit & hotline
            // ------------------------------------------------------------------
            [
                'source_id'       => 9863,
                'slug'            => 'aapscm-hotline',
                'title'           => 'AAPSCM® Incidents Hotline',
                'seo_title'       => 'AAPSCM® Incidents Hotline',
                'seo_description' => 'Report unethical conduct or incidents through the confidential AAPSCM® hotline, available to members and the public.',
                'canonical'       => 'https://aapscm.org/aapscm-hotline/',
                'excerpt'         => 'The AAPSCM® confidential incidents hotline provides a safe channel for reporting unethical conduct, certification fraud, and professional misconduct.',
                'show_in_nav'     => false,
                'sort_order'      => 95,
                'blocks'          => [
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'heading' => 'About the AAPSCM® Incidents Hotline',
                            'content' => '<p>The AAPSCM® Incidents Hotline provides a confidential and secure channel for members, candidates, and the public to report suspected unethical conduct, certification fraud, examination irregularities, and professional misconduct by AAPSCM® credential holders.</p><p>All reports are reviewed by the AAPSCM® Ethics Committee. Reports can be made anonymously.</p>',
                        ],
                    ],
                    [
                        'type' => 'accordion',
                        'data' => [
                            'heading' => 'What You Can Report & How',
                            'items'   => [
                                ['data' => ['question' => 'What types of incidents can be reported?', 'answer' => '<ul><li>Fraudulent use of AAPSCM® credentials or designations</li><li>Examination misconduct (cheating, impersonation)</li><li>Misrepresentation of certification status to employers</li><li>Conduct that violates AAPSCM® professional ethics standards</li><li>Suspected misuse of AAPSCM® trademarks or branding</li></ul>']],
                                ['data' => ['question' => 'How do I submit a report?',                'answer' => '<p>Reports can be submitted by email to <a href="mailto:ethics@aapscm.org">ethics@aapscm.org</a>. Please include as much detail as possible, including dates, names, and any supporting documentation. You may choose to remain anonymous.</p>']],
                                ['data' => ['question' => 'What happens after I submit a report?',    'answer' => '<p>All reports are acknowledged within 5 business days. The Ethics Committee conducts a confidential review and may contact you for additional information. Outcomes of investigations are not disclosed to reporters unless they are directly involved as a party.</p>']],
                            ],
                        ],
                    ],
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'heading' => 'Confidentiality Notice',
                            'content' => '<p>AAPSCM® is committed to protecting the identity of all reporters. Information provided through the hotline is handled with strict confidentiality and is only shared on a need-to-know basis with the Ethics Committee.</p><p>AAPSCM® prohibits any form of retaliation against individuals who report concerns in good faith.</p>',
                            'width'   => 'narrow',
                        ],
                    ],
                ],
            ],
            [
                'source_id'       => 10697,
                'slug'            => 'non-profit-activities-donation',
                'title'           => 'Non-Profit Activities & Donation',
                'seo_title'       => 'Non-Profit Activities & Donation - AAPSCM®',
                'seo_description' => 'Support AAPSCM® non-profit activities and help advance procurement education and professional development worldwide.',
                'canonical'       => 'https://aapscm.org/non-profit-activities-donation/',
                'excerpt'         => 'AAPSCM® is a nonprofit organisation committed to advancing procurement education, professional development, and workforce excellence worldwide.',
                'show_in_nav'     => false,
                'sort_order'      => 70,
                'blocks'          => [
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'heading' => 'Our Nonprofit Mission',
                            'content' => '<p>As a registered nonprofit professional body, AAPSCM® is committed to advancing procurement and supply chain education, managing competency standards, and creating pathways for professionals regardless of their economic background. All revenues are reinvested into our programmes, certifications, and community initiatives.</p>',
                        ],
                    ],
                    [
                        'type' => 'cards',
                        'data' => [
                            'heading' => 'Our Nonprofit Activities',
                            'columns' => 3,
                            'items'   => [
                                ['data' => ['title' => 'Scholarship Programme',        'description' => 'We award annual scholarships to deserving candidates who demonstrate professional promise but face financial barriers to certification.']],
                                ['data' => ['title' => 'Free Webinars & Education',    'description' => 'AAPSCM® regularly delivers free professional development webinars, white papers, and educational resources open to the public.']],
                                ['data' => ['title' => 'Workforce Development',        'description' => 'We partner with governments and NGOs to deliver procurement capacity-building programmes in developing economies.']],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading'          => 'Support Our Mission',
                            'text'             => 'Your donation helps fund scholarships, free education programmes, and workforce development initiatives.',
                            'primary_label'    => 'Make a Donation',
                            'primary_url'      => '/donations/',
                            'background_color' => 'blue',
                        ],
                    ],
                ],
            ],
            [
                'source_id'       => 13672,
                'slug'            => 'donations',
                'title'           => 'Donations',
                'seo_title'       => 'Donations - AAPSCM®',
                'seo_description' => 'Make a donation to AAPSCM® and support scholarships, non-profit initiatives, and global supply chain education programs.',
                'canonical'       => 'https://aapscm.org/donations/',
                'excerpt'         => 'Your donation supports AAPSCM® scholarships, free education programmes, and global workforce development initiatives.',
                'show_in_nav'     => false,
                'sort_order'      => 71,
                'blocks'          => [
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'heading' => 'Why Your Donation Matters',
                            'content' => '<p>AAPSCM® is a nonprofit organisation and every donation goes directly to funding scholarships for deserving candidates, developing free educational resources, and supporting workforce development programmes in underserved communities.</p><p>Your contribution helps ensure that procurement and supply chain excellence remains accessible to professionals at every career stage and from every background.</p>',
                        ],
                    ],
                    [
                        'type' => 'cards',
                        'data' => [
                            'heading' => 'Where Your Donation Goes',
                            'columns' => 3,
                            'items'   => [
                                ['data' => ['title' => 'Certification Scholarships',   'description' => 'Funding certification fees for candidates who demonstrate merit and financial need.']],
                                ['data' => ['title' => 'Free Educational Resources',   'description' => 'Producing webinars, white papers, and open-access learning materials for the global procurement community.']],
                                ['data' => ['title' => 'Emerging Market Programmes',   'description' => 'Supporting procurement capacity-building initiatives in developing economies in partnership with government agencies.']],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading'          => 'Make a Donation Today',
                            'text'             => 'Contributions of any size make a difference. Thank you for supporting the AAPSCM® mission.',
                            'primary_label'    => 'Donate via PayPal',
                            'primary_url'      => '/checkout/?type=donation',
                            'secondary_label'  => 'Other Ways to Give',
                            'secondary_url'    => '/contact-us/',
                            'background_color' => 'blue',
                        ],
                    ],
                ],
            ],

            // ------------------------------------------------------------------
            // Informational / resource pages
            // ------------------------------------------------------------------
            [
                'source_id'       => 6629,
                'slug'            => 'professional-development',
                'title'           => 'Professional Development',
                'seo_title'       => 'Professional Development - AAPSCM®',
                'seo_description' => 'Advance your career with AAPSCM® professional development programs, workshops, and continuing education opportunities.',
                'canonical'       => 'https://aapscm.org/professional-development/',
                'excerpt'         => 'AAPSCM® professional development programmes help procurement and supply chain professionals at every career stage continuously grow their skills and credentials.',
                'show_in_nav'     => false,
                'sort_order'      => 30,
                'blocks'          => [
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'heading' => 'Invest in Your Professional Future',
                            'content' => '<p>AAPSCM® offers a comprehensive suite of professional development opportunities designed to support procurement and supply chain professionals at every stage of their career. From foundational certifications to advanced leadership programmes, we have a pathway for you.</p>',
                        ],
                    ],
                    [
                        'type' => 'cards',
                        'data' => [
                            'heading' => 'Development Pathways',
                            'columns' => 3,
                            'items'   => [
                                ['data' => ['title' => 'Certifications',            'description' => 'Earn internationally recognised credentials across procurement, supply chain, AI procurement, logistics, and tourism management.', 'link_url' => '/certifications/', 'link_label' => 'View Certifications']],
                                ['data' => ['title' => 'Training Programmes',       'description' => 'Structured instructor-led and self-paced training to prepare for certification exams and build practical expertise.', 'link_url' => '/training-and-credentialing/', 'link_label' => 'Explore Training']],
                                ['data' => ['title' => 'Continuing Education (PDEs)', 'description' => 'Maintain and renew your certifications through Professional Development Education (PDE) credits and approved activities.', 'link_url' => '/request-pdes-for-certificate/', 'link_label' => 'Learn About PDEs']],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading'          => 'Start Your Development Journey',
                            'text'             => 'Explore our certification catalogue and find the right programme for your career goals.',
                            'primary_label'    => 'Explore Certifications',
                            'primary_url'      => '/certifications/',
                            'background_color' => 'blue',
                        ],
                    ],
                ],
            ],
            [
                'source_id'       => 6804,
                'slug'            => 'influencing-suppliers',
                'title'           => 'Influencing Suppliers',
                'seo_title'       => 'Influencing Suppliers - AAPSCM®',
                'seo_description' => 'Develop skills to influence and manage suppliers effectively with AAPSCM® procurement and supply chain training programs.',
                'canonical'       => 'https://aapscm.org/influencing-suppliers/',
                'excerpt'         => 'Learn how to lead, negotiate, and build strategic relationships with suppliers through AAPSCM® procurement training and certifications.',
                'show_in_nav'     => false,
                'sort_order'      => 31,
                'blocks'          => [
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'heading' => 'Mastering Supplier Relationships',
                            'content' => '<p>Effective supplier management is one of the most critical competencies in modern procurement. The ability to influence, negotiate, and build strategic partnerships with suppliers directly impacts cost efficiency, quality, supply security, and corporate reputation.</p><p>AAPSCM® certifications and training programmes develop the skills needed to move beyond transactional buying towards strategic supplier relationship management — encompassing negotiation, performance measurement, risk management, and supplier development.</p>',
                        ],
                    ],
                    [
                        'type' => 'cards',
                        'data' => [
                            'heading' => 'Key Skills Developed',
                            'columns' => 3,
                            'items'   => [
                                ['data' => ['title' => 'Strategic Negotiation',          'description' => 'Techniques for achieving optimal outcomes in supplier negotiations at every level of complexity.']],
                                ['data' => ['title' => 'Supplier Performance Management', 'description' => 'KPI frameworks, SLA management, and corrective action processes for supplier performance improvement.']],
                                ['data' => ['title' => 'Risk & Resilience',              'description' => 'Identifying, assessing, and mitigating supply chain risks through proactive supplier relationship strategies.']],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading'          => 'Build Your Supplier Management Expertise',
                            'text'             => 'Explore AAPSCM® certifications covering supplier relationship management and strategic procurement.',
                            'primary_label'    => 'View Certifications',
                            'primary_url'      => '/certifications/',
                            'background_color' => 'blue',
                        ],
                    ],
                ],
            ],
            [
                'source_id'       => 26764,
                'slug'            => 'how-to-apply',
                'title'           => 'How to Apply',
                'seo_title'       => 'How to Apply for AAPSCM® Certification',
                'seo_description' => 'Step-by-step guide to applying for AAPSCM® professional certifications in procurement and supply chain management.',
                'canonical'       => 'https://aapscm.org/how-to-apply/',
                'excerpt'         => 'Follow this step-by-step guide to apply for your AAPSCM® certification and start your journey towards a globally recognised credential.',
                'template'        => 'sidebar_guide',
                'show_in_nav'     => false,
                'sort_order'      => 32,
                'page_data'       => [
                    'sidebar_items' => [
                        ['label' => 'Step 1: Choose Your Certification', 'url' => '#step-1'],
                        ['label' => 'Step 2: Create Your Account',       'url' => '#step-2'],
                        ['label' => 'Step 3: Submit Your Application',   'url' => '#step-3'],
                        ['label' => 'Step 4: Make Payment',              'url' => '#step-4'],
                        ['label' => 'Step 5: Schedule Your Exam',        'url' => '#step-5'],
                    ],
                ],
                'blocks'          => [
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'heading' => 'Step 1: Choose Your Certification',
                            'content' => '<p id="step-1">Browse the <a href="/certifications/">AAPSCM® Certification Catalogue</a> to find the credential that best matches your career stage, area of expertise, and professional goals.</p><p>Not sure which certification is right for you? Visit our <a href="/which-certification-is-right-for-you/">Certification Selector Guide</a> or review the <a href="/certifications-faq/">Certifications FAQ</a> for detailed guidance.</p>',
                        ],
                    ],
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'heading' => 'Step 2: Create Your Account',
                            'content' => '<p id="step-2">Register for a free AAPSCM® account at <a href="/register/">aapscm.org/register</a>. You will use this account to manage your application, track your certification status, access study materials, and download your digital credentials.</p>',
                        ],
                    ],
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'heading' => 'Step 3: Submit Your Application',
                            'content' => '<p id="step-3">Log in to your member portal and navigate to the certification you wish to apply for. Complete the application form with your educational background and relevant work experience. Ensure all information is accurate — false declarations may lead to disqualification.</p>',
                        ],
                    ],
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'heading' => 'Step 4: Make Payment',
                            'content' => '<p id="step-4">Once your application is submitted, you will be directed to the secure payment page. Examination fees can be paid online via credit/debit card (Stripe) or PayPal. Member pricing applies automatically if you are logged in to an active membership account.</p>',
                        ],
                    ],
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'heading' => 'Step 5: Schedule Your Exam',
                            'content' => '<p id="step-5">After payment is confirmed, you will receive an email with instructions to schedule your online examination through the AAPSCM® Exam Portal. Exams are available 24/7 and are proctored online. You will have access to your results immediately upon completion.</p><p>Upon passing, your certification will be issued within 3–5 business days and a digital badge will be sent to the email address on your account.</p>',
                        ],
                    ],
                ],
            ],
            [
                'source_id'       => 36414,
                'slug'            => 'which-certification-is-right-for-you',
                'title'           => 'Which Certification is Right for You?',
                'seo_title'       => 'Which Certification is Right for You? - AAPSCM®',
                'seo_description' => 'Compare AAPSCM® certifications to find the right credential for your procurement and supply chain career goals.',
                'canonical'       => 'https://aapscm.org/which-certification-is-right-for-you/',
                'excerpt'         => 'Not sure which AAPSCM® certification to pursue? Use this guide to find the right credential for your career stage and professional goals.',
                'show_in_nav'     => false,
                'sort_order'      => 33,
                'blocks'          => [
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'heading' => 'Find the Right Certification for You',
                            'content' => '<p>AAPSCM® offers more than 60 certifications spanning procurement, supply chain management, logistics, AI-enabled procurement, and tourism management. This guide will help you identify the credential that best aligns with your career stage, specialisation, and goals.</p>',
                        ],
                    ],
                    [
                        'type' => 'cards',
                        'data' => [
                            'heading' => 'Certification Pathways by Discipline',
                            'columns' => 2,
                            'items'   => [
                                ['data' => ['title' => 'Procurement & Purchasing',  'description' => 'For procurement officers, purchasing managers, and contract specialists. Credentials covering sourcing, contract management, supplier relationships, and strategic procurement.', 'link_url' => '/certifications/', 'link_label' => 'View Procurement Certs']],
                                ['data' => ['title' => 'Supply Chain Management',   'description' => 'For supply chain analysts, operations managers, and logistics professionals. Credentials covering end-to-end supply chain, inventory, warehousing, and distribution.', 'link_url' => '/certifications/', 'link_label' => 'View Supply Chain Certs']],
                                ['data' => ['title' => 'AI & Digital Procurement',  'description' => 'For professionals integrating AI, automation, and digital tools into procurement and supply chain operations. Cutting-edge credentials in AI procurement and RPA.', 'link_url' => '/certifications/', 'link_label' => 'View AI Procurement Certs']],
                                ['data' => ['title' => 'Tourism & Hospitality',     'description' => 'For tourism professionals, hospitality managers, and travel industry specialists. Credentials covering tourism procurement, destination management, and experience design.', 'link_url' => '/certifications/', 'link_label' => 'View Tourism Certs']],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading'          => 'Still Not Sure? We\'re Here to Help.',
                            'text'             => 'Contact our certifications team and we will help you identify the right pathway for your goals.',
                            'primary_label'    => 'Browse All Certifications',
                            'primary_url'      => '/certifications/',
                            'secondary_label'  => 'Contact Us',
                            'secondary_url'    => '/contact-us/',
                            'background_color' => 'blue',
                        ],
                    ],
                ],
            ],
            [
                'source_id'       => 9590,
                'slug'            => 'certifications-faq',
                'title'           => 'Certifications FAQs',
                'seo_title'       => 'Certifications FAQs - AAPSCM®',
                'seo_description' => 'Frequently asked questions about AAPSCM® certifications, exams, and credentials.',
                'canonical'       => 'https://aapscm.org/certifications-faq/',
                'excerpt'         => 'Find answers to the most common questions about AAPSCM® certifications, examinations, payment, and credential maintenance.',
                'template'        => 'sidebar_guide',
                'show_in_nav'     => false,
                'sort_order'      => 35,
                'page_data'       => [
                    'sidebar_items' => [
                        ['label' => 'General Questions',      'url' => '#general'],
                        ['label' => 'Exam & Testing',         'url' => '#exams'],
                        ['label' => 'Payment & Fees',         'url' => '#payment'],
                        ['label' => 'Certification Renewal',  'url' => '#renewal'],
                        ['label' => 'PDEs & Continuing Ed.',  'url' => '#pdes'],
                    ],
                ],
                'blocks'          => [
                    [
                        'type' => 'accordion',
                        'data' => [
                            'heading' => 'General Questions',
                            'items'   => [
                                ['data' => ['question' => 'Are AAPSCM® certifications internationally recognised?', 'answer' => '<p>Yes. AAPSCM® certifications are recognised by employers, government agencies, and professional bodies across more than 100 countries. Many organisations specify AAPSCM® credentials in job requirements and internal capability frameworks.</p>']],
                                ['data' => ['question' => 'How long does it take to complete a certification?',     'answer' => '<p>This varies by certification level and your prior experience. Entry-level certifications can typically be completed in 4–8 weeks of self-study. Advanced certifications may require 3–6 months of preparation. Exam scheduling is flexible and available 24/7.</p>']],
                                ['data' => ['question' => 'Do I need a degree to apply?',                           'answer' => '<p>No degree is required for most AAPSCM® entry-level certifications. Some advanced credentials require documented work experience in procurement, supply chain, or a related field. Specific requirements are listed on each certification\'s detail page.</p>']],
                                ['data' => ['question' => 'Can I hold multiple AAPSCM® certifications?',            'answer' => '<p>Yes. Many professionals hold multiple AAPSCM® credentials to demonstrate expertise across different areas. Member pricing applies to additional certifications for active AAPSCM® members.</p>']],
                            ],
                        ],
                    ],
                    [
                        'type' => 'accordion',
                        'data' => [
                            'heading' => 'Exam & Testing',
                            'items'   => [
                                ['data' => ['question' => 'How are AAPSCM® exams delivered?',                                'answer' => '<p>Exams are delivered online through the AAPSCM® Exam Portal and are proctored remotely. You can schedule your exam at any time from anywhere. A stable internet connection and a webcam are required.</p>']],
                                ['data' => ['question' => 'What is the pass mark?',                                          'answer' => '<p>The pass mark is 70% for most AAPSCM® certifications. Your result is available immediately upon exam completion.</p>']],
                                ['data' => ['question' => 'What happens if I fail?',                                         'answer' => '<p>If you do not pass on your first attempt, you may retake the exam after a 7-day waiting period. Retake fees apply. Full details are available in our Examination Policy.</p>']],
                                ['data' => ['question' => 'Are accommodations available for candidates with disabilities?',  'answer' => '<p>Yes. AAPSCM® provides reasonable accommodations for candidates with documented disabilities. Contact our Certification Support team at least 14 days before your scheduled exam to request accommodations.</p>']],
                            ],
                        ],
                    ],
                    [
                        'type' => 'accordion',
                        'data' => [
                            'heading' => 'Payment & Fees',
                            'items'   => [
                                ['data' => ['question' => 'What payment methods are accepted?',          'answer' => '<p>We accept all major credit and debit cards via Stripe, and PayPal. All transactions are processed securely. Invoicing is available for corporate group purchases — contact us for details.</p>']],
                                ['data' => ['question' => 'Is there a discount for AAPSCM® members?',   'answer' => '<p>Yes. Active AAPSCM® members receive discounted certification fees. Member pricing is applied automatically when you are logged in to your member account during checkout.</p>']],
                                ['data' => ['question' => 'What is the refund policy?',                 'answer' => '<p>Examination fees are non-refundable once an exam attempt has been scheduled. If you need to reschedule before your scheduled exam time, a rescheduling fee may apply. Please review the full Refund Policy for details.</p>']],
                            ],
                        ],
                    ],
                    [
                        'type' => 'accordion',
                        'data' => [
                            'heading' => 'Certification Renewal',
                            'items'   => [
                                ['data' => ['question' => 'How long is an AAPSCM® certification valid?', 'answer' => '<p>Most AAPSCM® certifications are valid for 3 years from the date of issue. An active membership and sufficient PDE credits are required for renewal.</p>']],
                                ['data' => ['question' => 'How do I renew my certification?',            'answer' => '<p>Log in to your member portal and navigate to "My Certifications". You will see the renewal date and required PDE credits. Once requirements are met, you can apply for renewal and pay the renewal fee online.</p>']],
                                ['data' => ['question' => 'What happens if my certification expires?',  'answer' => '<p>If your certification lapses, you may no longer use the designation mark after your name. You must retake the examination to reinstate the credential. We recommend maintaining an active membership to receive early renewal reminders.</p>']],
                            ],
                        ],
                    ],
                    [
                        'type' => 'accordion',
                        'data' => [
                            'heading' => 'PDEs & Continuing Education',
                            'items'   => [
                                ['data' => ['question' => 'What are Professional Development Education (PDE) credits?', 'answer' => '<p>PDEs are the continuing education credits required to maintain and renew your AAPSCM® certification. They can be earned through approved AAPSCM® events, courses, webinars, and other professional development activities.</p>']],
                                ['data' => ['question' => 'How many PDE credits do I need?',                           'answer' => '<p>Most AAPSCM® certifications require 30 PDE credits over the 3-year certification cycle. The specific requirement is stated on each certification\'s detail page.</p>']],
                                ['data' => ['question' => 'How do I request PDEs for my certificate?',                 'answer' => '<p>Visit the <a href="/request-pdes-for-certificate/">Request PDEs for Certificate</a> page and follow the instructions to submit your PDE request with supporting documentation.</p>']],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'source_id'       => 36630,
                'slug'            => 'digital-badges',
                'title'           => 'Digital Badges',
                'seo_title'       => 'Digital Badges - AAPSCM®',
                'seo_description' => 'Earn and share your AAPSCM® digital badges to showcase your professional achievements.',
                'canonical'       => 'https://aapscm.org/digital-badges/',
                'excerpt'         => 'AAPSCM® digital badges let you instantly verify and share your certification achievements on LinkedIn, email signatures, and digital portfolios.',
                'show_in_nav'     => false,
                'sort_order'      => 50,
                'blocks'          => [
                    [
                        'type' => 'text_image',
                        'data' => [
                            'heading'        => 'What is a Digital Badge?',
                            'text'           => '<p>An AAPSCM® digital badge is a verifiable digital credential issued upon earning an AAPSCM® certification. Each badge contains embedded metadata that includes the certification name, issuing date, expiry date, and a unique verification link — allowing employers and colleagues to verify your credential instantly.</p><p>AAPSCM® digital badges are issued through Credly, the world\'s leading digital credential platform, and can be shared on LinkedIn, email signatures, digital CVs, and professional websites.</p>',
                            'image_url'      => '',
                            'image_position' => 'right',
                        ],
                    ],
                    [
                        'type' => 'accordion',
                        'data' => [
                            'heading' => 'How to Claim and Share Your Badge',
                            'items'   => [
                                ['data' => ['question' => 'When will I receive my badge?',                    'answer' => '<p>Your digital badge will be emailed to you within 3–5 business days of passing your certification exam. You will receive an email from Credly with instructions to claim your badge.</p>']],
                                ['data' => ['question' => 'How do I claim my badge?',                         'answer' => '<p>Open the email from Credly and click "Accept Your Badge". You will be prompted to create a free Credly account (or log in if you already have one). Once accepted, your badge will appear on your Credly profile and you can share it immediately.</p>']],
                                ['data' => ['question' => 'How do I add my badge to LinkedIn?',               'answer' => '<p>From your Credly profile, click "Share" on your badge and select "LinkedIn". You can add it to your Licenses &amp; Certifications section in one click, allowing profile visitors to verify your credential directly.</p>']],
                                ['data' => ['question' => 'Can I verify someone else\'s AAPSCM® credential?', 'answer' => '<p>Yes. Every AAPSCM® digital badge contains a unique verification link. Visit the <a href="/verify-a-certificate/">Certificate Verification</a> page or click the badge link to instantly confirm the validity of a credential.</p>']],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading'          => 'Earn Your Digital Badge Today',
                            'text'             => 'Explore our certifications and take the first step towards a globally recognised credential.',
                            'primary_label'    => 'Browse Certifications',
                            'primary_url'      => '/certifications/',
                            'background_color' => 'blue',
                        ],
                    ],
                ],
            ],
            [
                'source_id'       => 36377,
                'slug'            => 'request-pdes-for-certificate',
                'title'           => 'Request PDEs for Certificate',
                'seo_title'       => 'Request PDEs for Certificate - AAPSCM®',
                'seo_description' => 'Request AAPSCM® Professional Development Education (PDE) credits for your certification or recertification requirements.',
                'canonical'       => 'https://aapscm.org/request-pdes-for-certificate/',
                'excerpt'         => 'Submit a PDE request to have approved professional development activities recognised towards your AAPSCM® certification renewal.',
                'show_in_nav'     => false,
                'sort_order'      => 51,
                'blocks'          => [
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'heading' => 'Professional Development Education (PDE) Credits',
                            'content' => '<p>Professional Development Education (PDE) credits are the continuing education units required to maintain and renew your AAPSCM® certification. PDEs ensure that certified professionals remain current with best practice, industry developments, and emerging technologies in procurement and supply chain management.</p><p>Most AAPSCM® certifications require <strong>30 PDE credits</strong> over the 3-year certification cycle. PDEs can be earned through approved AAPSCM® events, courses, webinars, and other relevant professional development.</p>',
                        ],
                    ],
                    [
                        'type' => 'accordion',
                        'data' => [
                            'heading' => 'Eligibility & Request Process',
                            'items'   => [
                                ['data' => ['question' => 'What activities qualify for PDE credits?', 'answer' => '<ul><li>AAPSCM® accredited courses and workshops</li><li>AAPSCM® and affiliate webinars</li><li>Attending recognised industry conferences</li><li>Relevant university or college courses</li><li>Published articles in recognised professional journals</li><li>Speaking at industry conferences</li><li>Mentoring or teaching in an AAPSCM®-approved context</li></ul>']],
                                ['data' => ['question' => 'How do I submit a PDE request?',           'answer' => '<p>Log in to your member portal and navigate to <strong>My Certifications → Request PDEs</strong>. Complete the form providing the activity name, provider, dates, duration, and a brief description. Upload supporting documentation and submit. Our team will review your submission within 10 business days.</p>']],
                                ['data' => ['question' => 'How many PDE credits per activity?',       'answer' => '<p>1 PDE credit is awarded for each hour of approved learning or professional activity, up to the maximum limits set for each category. Category limits are detailed in your member portal.</p>']],
                                ['data' => ['question' => 'What if my PDE request is rejected?',      'answer' => '<p>If your submission does not meet our criteria, you will receive a detailed explanation and guidance on what additional documentation is required. You may resubmit after addressing the feedback.</p>']],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading'          => 'Ready to Submit Your PDE Request?',
                            'text'             => 'Log in to your member portal to track your PDE credits and submit new requests.',
                            'primary_label'    => 'Go to Member Portal',
                            'primary_url'      => '/dashboard/',
                            'background_color' => 'blue',
                        ],
                    ],
                ],
            ],
            [
                'source_id'       => 13020,
                'slug'            => 'training-school-affiliated',
                'title'           => 'Training School Affiliated',
                'seo_title'       => 'Training School Affiliated - AAPSCM®',
                'seo_description' => 'Find AAPSCM®-affiliated training schools offering accredited procurement and supply chain management courses worldwide.',
                'canonical'       => 'https://aapscm.org/training-school-affiliated/',
                'excerpt'         => 'AAPSCM®-affiliated training schools deliver accredited certification preparation programmes in procurement, supply chain, and tourism management worldwide.',
                'show_in_nav'     => false,
                'sort_order'      => 67,
                'blocks'          => [
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'heading' => 'AAPSCM® Affiliated Training Schools',
                            'content' => '<p>AAPSCM®-affiliated training schools are accredited organisations that deliver preparation programmes for AAPSCM® certification examinations. All affiliated schools have met AAPSCM®\'s quality standards for faculty, curriculum, and learning outcomes, ensuring high-quality instruction that maximises your exam readiness.</p><p>Affiliated training providers operate across multiple countries, offering classroom, virtual, and blended delivery options. Completing a programme at an affiliated school prepares you to pass the certification examination.</p>',
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading'          => 'Looking to Become an Affiliated Training School?',
                            'text'             => 'Explore our Authorized Training Partner programme and start the application process today.',
                            'primary_label'    => 'Become a Training Partner',
                            'primary_url'      => '/become-a-authorized-training-partner/',
                            'secondary_label'  => 'Contact Us',
                            'secondary_url'    => '/contact-us/',
                            'background_color' => 'blue',
                        ],
                    ],
                ],
            ],
            [
                'source_id'       => 36859,
                'slug'            => 'training-and-credentialing',
                'title'           => 'Training and Credentialing',
                'seo_title'       => 'Training and Credentialing - AAPSCM®',
                'seo_description' => 'Explore AAPSCM® training programs and credentialing pathways for procurement, supply chain, and logistics professionals.',
                'canonical'       => 'https://aapscm.org/training-and-credentialing/',
                'excerpt'         => 'Explore AAPSCM® training programmes and credentialing pathways available in self-paced, instructor-led, and exam-only formats.',
                'show_in_nav'     => false,
                'sort_order'      => 28,
                'blocks'          => [
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'heading' => 'Training & Credentialing with AAPSCM®',
                            'content' => '<p>AAPSCM® certifications are available in multiple study formats to accommodate different learning styles, schedules, and budgets. Whether you prefer to study at your own pace, learn in a structured classroom environment, or go straight to examination, we have a pathway for you.</p>',
                        ],
                    ],
                    [
                        'type' => 'cards',
                        'data' => [
                            'heading' => 'Available Study Formats',
                            'columns' => 3,
                            'items'   => [
                                ['data' => ['title' => 'Self-Paced Online',        'description' => 'Study in your own time using AAPSCM® official study materials, practice exams, and online resources. Ideal for busy professionals.']],
                                ['data' => ['title' => 'Instructor-Led Training', 'description' => 'Structured courses delivered by AAPSCM® Authorized Training Partners in virtual or classroom formats. Includes guided instruction and group interaction.']],
                                ['data' => ['title' => 'Exam Only',               'description' => 'Already have the knowledge? Apply directly to sit the examination without completing a training programme. Experience-based eligibility may apply.']],
                            ],
                        ],
                    ],
                    [
                        'type' => 'cta_banner',
                        'data' => [
                            'heading'          => 'Ready to Start Your Certification Journey?',
                            'text'             => 'Explore our full certification catalogue and choose the study format that works for you.',
                            'primary_label'    => 'Browse Certifications',
                            'primary_url'      => '/certifications/',
                            'secondary_label'  => 'Find a Training Provider',
                            'secondary_url'    => '/training-school-affiliated/',
                            'background_color' => 'blue',
                        ],
                    ],
                ],
            ],

            // ------------------------------------------------------------------
            // Board of Directors (parent page, then individual profiles)
            // ------------------------------------------------------------------
            [
                'source_id'       => 9412,
                'slug'            => 'board-of-directors',
                'title'           => 'Board of Directors',
                'seo_title'       => 'Board of Directors - AAPSCM®',
                'seo_description' => 'Meet the AAPSCM® Board of Directors and executive leadership team.',
                'canonical'       => 'https://aapscm.org/board-of-directors/',
                'excerpt'         => 'The AAPSCM® Board of Directors provides strategic leadership, governance, and professional oversight to advance the association\'s global mission.',
                'show_in_nav'     => false,
                'sort_order'      => 15,
                'blocks'          => [
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'heading' => 'Our Leadership',
                            'content' => '<p>The AAPSCM® Board of Directors is composed of distinguished professionals from procurement, supply chain, academia, and business. The Board provides strategic governance and ensures AAPSCM® remains at the forefront of professional credentialing globally.</p>',
                        ],
                    ],
                    [
                        'type' => 'cards',
                        'data' => [
                            'heading' => 'Board Members',
                            'columns' => 3,
                            'items'   => [
                                ['data' => ['title' => 'Dr. Sandra Grouse',     'description' => 'Board Member', 'link_url' => '/board-of-directors-dr-sandra-grouse/',     'link_label' => 'View Profile']],
                                ['data' => ['title' => 'Tracy McKinnis',        'description' => 'Board Member', 'link_url' => '/board-of-directors-tracy-mckinnis/',        'link_label' => 'View Profile']],
                                ['data' => ['title' => 'Dr. Richmond Adebiaye', 'description' => 'Board Member', 'link_url' => '/board-of-directors-dr-richmond-adebiaye/',  'link_label' => 'View Profile']],
                                ['data' => ['title' => 'Dr. Mark Pieffer',      'description' => 'Board Member', 'link_url' => '/board-of-directors-dr-mark-pieffer/',       'link_label' => 'View Profile']],
                                ['data' => ['title' => 'Dr. Theophilus Owusu',  'description' => 'Board Member', 'link_url' => '/board-of-directors-dr-theophilus-owusu/',   'link_label' => 'View Profile']],
                                ['data' => ['title' => 'Dr. Ronald Kisega',     'description' => 'Board Member', 'link_url' => '/board-of-directors-dr-ronald-kisega/',      'link_label' => 'View Profile']],
                                ['data' => ['title' => 'Dr. Haroun Alryalat',   'description' => 'Board Member', 'link_url' => '/board-of-directors-dr-haroun-alrylat/',     'link_label' => 'View Profile']],
                                ['data' => ['title' => 'Dr. Jason Matyus',      'description' => 'Board Member', 'link_url' => '/board-of-directors-dr-jason-matyus/',       'link_label' => 'View Profile']],
                                ['data' => ['title' => 'Jonathan Akisanmi',     'description' => 'Board Member', 'link_url' => '/board-of-directors-jonathan-akisanmi/',     'link_label' => 'View Profile']],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'source_id' => 10413,
                'slug' => 'board-of-directors-dr-sandra-grouse',
                'title' => 'Dr. Sandra Grouse',
                'seo_title' => 'Dr. Sandra Grouse - AAPSCM® Board Member',
                'seo_description' => 'Dr. Sandra Grouse serves on the AAPSCM® Board of Directors, providing strategic leadership and governance for the association.',
                'canonical' => 'https://aapscm.org/board-of-directors-dr-sandra-grouse/',
                'parent_slug' => 'board-of-directors',
                'template' => 'person_profile',
                'page_data' => [
                    'person_name'  => 'Dr. Sandra Grouse',
                    'role'         => '',
                    'bio'          => '',
                    'linkedin_url' => null,
                    'avatar_image' => null,
                ],
                'show_in_nav' => false,
                'sort_order' => 1,
            ],
            [
                'source_id' => 10443,
                'slug' => 'board-of-directors-tracy-mckinnis',
                'title' => 'Tracy McKinnis',
                'seo_title' => 'Tracy McKinnis - AAPSCM® Board Member',
                'seo_description' => 'Tracy McKinnis serves on the AAPSCM® Board of Directors, guiding organisational strategy and supporting membership development.',
                'canonical' => 'https://aapscm.org/board-of-directors-tracy-mckinnis/',
                'parent_slug' => 'board-of-directors',
                'template' => 'person_profile',
                'page_data' => [
                    'person_name'  => 'Tracy McKinnis',
                    'role'         => '',
                    'bio'          => '',
                    'linkedin_url' => null,
                    'avatar_image' => null,
                ],
                'show_in_nav' => false,
                'sort_order' => 2,
            ],
            [
                'source_id' => 10456,
                'slug' => 'board-of-directors-dr-richmond-adebiaye',
                'title' => 'Dr. Richmond Adebiaye',
                'seo_title' => 'Dr. Richmond Adebiaye - AAPSCM® Board Member',
                'seo_description' => 'Dr. Richmond Adebiaye serves on the AAPSCM® Board of Directors, contributing expertise in supply chain governance.',
                'canonical' => 'https://aapscm.org/board-of-directors-dr-richmond-adebiaye/',
                'parent_slug' => 'board-of-directors',
                'template' => 'person_profile',
                'page_data' => [
                    'person_name'  => 'Dr. Richmond Adebiaye',
                    'role'         => '',
                    'bio'          => '',
                    'linkedin_url' => null,
                    'avatar_image' => null,
                ],
                'show_in_nav' => false,
                'sort_order' => 3,
            ],
            [
                'source_id' => 10469,
                'slug' => 'board-of-directors-dr-mark-pieffer',
                'title' => 'Dr. Mark Pieffer',
                'seo_title' => 'Dr. Mark Pieffer - AAPSCM® Board Member',
                'seo_description' => 'Dr. Mark Pieffer serves on the AAPSCM® Board of Directors, supporting strategic planning and academic partnerships.',
                'canonical' => 'https://aapscm.org/board-of-directors-dr-mark-pieffer/',
                'parent_slug' => 'board-of-directors',
                'template' => 'person_profile',
                'page_data' => [
                    'person_name'  => 'Dr. Mark Pieffer',
                    'role'         => '',
                    'bio'          => '',
                    'linkedin_url' => null,
                    'avatar_image' => null,
                ],
                'show_in_nav' => false,
                'sort_order' => 4,
            ],
            [
                'source_id' => 10475,
                'slug' => 'board-of-directors-dr-theophilus-owusu',
                'title' => 'Dr. Theophilus Owusu',
                'seo_title' => 'Dr. Theophilus Owusu - AAPSCM® Board Member',
                'seo_description' => 'Dr. Theophilus Owusu serves on the AAPSCM® Board of Directors, advancing global certification and education standards.',
                'canonical' => 'https://aapscm.org/board-of-directors-dr-theophilus-owusu/',
                'parent_slug' => 'board-of-directors',
                'template' => 'person_profile',
                'page_data' => [
                    'person_name'  => 'Dr. Theophilus Owusu',
                    'role'         => '',
                    'bio'          => '',
                    'linkedin_url' => null,
                    'avatar_image' => null,
                ],
                'show_in_nav' => false,
                'sort_order' => 5,
            ],
            [
                'source_id' => 10495,
                'slug' => 'board-of-directors-dr-ronald-kisega',
                'title' => 'Dr. Ronald Kisega',
                'seo_title' => 'Dr. Ronald Kisega - AAPSCM® Board Member',
                'seo_description' => 'Dr. Ronald Kisega serves on the AAPSCM® Board of Directors, bringing expertise in procurement, logistics, and trade.',
                'canonical' => 'https://aapscm.org/board-of-directors-dr-ronald-kisega/',
                'parent_slug' => 'board-of-directors',
                'template' => 'person_profile',
                'page_data' => [
                    'person_name'  => 'Dr. Ronald Kisega',
                    'role'         => '',
                    'bio'          => '',
                    'linkedin_url' => null,
                    'avatar_image' => null,
                ],
                'show_in_nav' => false,
                'sort_order' => 6,
            ],
            [
                'source_id' => 10508,
                'slug' => 'board-of-directors-dr-haroun-alrylat',
                'title' => 'Dr. Haroun Alryalat',
                'seo_title' => 'Dr. Haroun Alryalat - AAPSCM® Board Member',
                'seo_description' => 'Dr. Haroun Alryalat serves on the AAPSCM® Board of Directors, contributing international business and strategic leadership.',
                'canonical' => 'https://aapscm.org/board-of-directors-dr-haroun-alrylat/',
                'parent_slug' => 'board-of-directors',
                'template' => 'person_profile',
                'page_data' => [
                    'person_name'  => 'Dr. Haroun Alryalat',
                    'role'         => '',
                    'bio'          => '',
                    'linkedin_url' => null,
                    'avatar_image' => null,
                ],
                'show_in_nav' => false,
                'sort_order' => 7,
            ],
            [
                'source_id' => 10520,
                'slug' => 'board-of-directors-dr-jason-matyus',
                'title' => 'Dr. Jason Matyus',
                'seo_title' => 'Dr. Jason Matyus - AAPSCM® Board Member',
                'seo_description' => 'Dr. Jason Matyus serves on the AAPSCM® Board of Directors, providing leadership in supply chain education and research.',
                'canonical' => 'https://aapscm.org/board-of-directors-dr-jason-matyus/',
                'parent_slug' => 'board-of-directors',
                'template' => 'person_profile',
                'page_data' => [
                    'person_name'  => 'Dr. Jason Matyus',
                    'role'         => '',
                    'bio'          => '',
                    'linkedin_url' => null,
                    'avatar_image' => null,
                ],
                'show_in_nav' => false,
                'sort_order' => 8,
            ],
            [
                'source_id' => 10535,
                'slug' => 'board-of-directors-jonathan-akisanmi',
                'title' => 'Jonathan Akisanmi',
                'seo_title' => 'Jonathan Akisanmi - AAPSCM® Board Member',
                'seo_description' => 'Jonathan Akisanmi serves on the AAPSCM® Board of Directors, contributing expertise in procurement and global business.',
                'canonical' => 'https://aapscm.org/board-of-directors-jonathan-akisanmi/',
                'parent_slug' => 'board-of-directors',
                'template' => 'person_profile',
                'page_data' => [
                    'person_name'  => 'Jonathan Akisanmi',
                    'role'         => '',
                    'bio'          => '',
                    'linkedin_url' => null,
                    'avatar_image' => null,
                ],
                'show_in_nav' => false,
                'sort_order' => 9,
            ],

            // ------------------------------------------------------------------
            // Staff / executive profiles
            // ------------------------------------------------------------------
            [
                'source_id' => 24597,
                'slug' => 'gleb-mikulich',
                'title' => 'Gleb Mikulich',
                'seo_title' => 'Gleb Mikulich - AAPSCM®',
                'seo_description' => 'Gleb Mikulich is a member of the AAPSCM® executive team, contributing to the association\'s global strategy and operations.',
                'canonical' => 'https://aapscm.org/gleb-mikulich/',
                'template' => 'person_profile',
                'page_data' => [
                    'person_name'  => 'Gleb Mikulich',
                    'role'         => '',
                    'bio'          => '',
                    'linkedin_url' => null,
                    'avatar_image' => null,
                ],
                'show_in_nav' => false,
                'sort_order' => 0,
            ],
            [
                'source_id' => 42206,
                'slug' => 'james-raussen',
                'title' => 'James Raussen',
                'seo_title' => 'James Raussen - AAPSCM®',
                'seo_description' => 'James Raussen contributes to AAPSCM® operations, supporting the growth of the association\'s global procurement and supply chain programs.',
                'canonical' => 'https://aapscm.org/james-raussen/',
                'template' => 'person_profile',
                'page_data' => [
                    'person_name'  => 'James Raussen',
                    'role'         => '',
                    'bio'          => '',
                    'linkedin_url' => null,
                    'avatar_image' => null,
                ],
                'show_in_nav' => false,
                'sort_order' => 0,
            ],
            [
                'source_id' => 101736,
                'slug' => 'mohamed-aboelela',
                'title' => 'Mohamed Aboelela',
                'seo_title' => 'Mohamed Aboelela - AAPSCM®',
                'seo_description' => 'Mohamed Aboelela, Director of Strategic Operations – MENA at AAPSCM®.',
                'canonical' => 'https://aapscm.org/mohamed-aboelela/',
                'og_image' => 'https://aapscm.org/wp-content/uploads/2026/04/31f9d6eb-c108-439c-8097-cdb3149edab6.jpeg',
                'template' => 'person_profile',
                'page_data' => [
                    'person_name'  => 'Mohamed Aboelela',
                    'role'         => 'Director of Strategic Operations – MENA',
                    'avatar_image' => 'https://aapscm.org/wp-content/uploads/2026/04/31f9d6eb-c108-439c-8097-cdb3149edab6.jpeg',
                    'linkedin_url' => null,
                    'bio'          => "<p><strong>Mohamed Aboelela</strong> serves as Director of Strategic Operations \u2013 MENA at AAPSCM\u00ae, where he is responsible for leading regional strategy, partnerships, and the deployment of internationally accredited certification ecosystems.</p>\n<p>A seasoned executive with over 25 years of experience, Mohamed has a proven track record in driving large-scale training and consultancy initiatives across the Middle East, particularly within government entities and strategic sectors. His expertise spans procurement, supply chain management, AI-driven transformation, and workforce development aligned with global standards and accreditation frameworks.</p>\n<p>Through his leadership, Mohamed contributes to advancing professional excellence, institutional capacity building, and sustainable talent development across the region.</p>",
                ],
                'show_in_nav' => false,
                'sort_order' => 0,
            ],
            [
                'source_id' => 102895,
                'slug' => 'mohammed-zul-jamal',
                'title' => 'Mohammed Zul Jamal',
                'seo_title' => 'Mohammed Zul Jamal - AAPSCM®',
                'seo_description' => 'Mohammed Zul Jamal, Regional PR Manager (MENA Region) at AAPSCM®.',
                'canonical' => 'https://aapscm.org/mohammed-zul-jamal/',
                'og_image' => 'https://aapscm.org/wp-content/uploads/2026/04/WhatsApp-Image-2026-04-16-at-22.13.01.jpeg',
                'template' => 'person_profile',
                'page_data' => [
                    'person_name' => 'Mohammed Zul Jamal',
                    'role' => 'REGIONAL PR MANAGER (MENA Region)',
                    'avatar_image' => 'https://aapscm.org/wp-content/uploads/2026/04/WhatsApp-Image-2026-04-16-at-22.13.01.jpeg',
                    'linkedin_url' => null,
                    'bio' => "<p>Mohammed Zul Jamal serves as a Regional PR Manager (MENA Region), where he is responsible for Business development, client relationship management, and stakeholder engagement.</p>\n<p>Jamal brings a proven record of accomplishment in driving growth, innovation, and operational excellence across the education, training, procurement, and supply chain sectors.</p>",
                ],
                'show_in_nav' => false,
                'sort_order' => 0,
            ],
        ];
    }
}
