<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Redirect;
use Illuminate\Database\Seeder;

/**
 * Seeds all WordPress old-slug 301 redirects across all modules.
 *
 * Does NOT include the 20 training-virtual → cert redirects already handled
 * by WpCmsPagesImportSeeder.
 *
 * Idempotent: uses updateOrCreate keyed on from_path.
 *
 * Verification notes (from SEO audit — 11 April 2026):
 *  - All board member pages were already using board-of-directors- prefix on WP
 *    (confirmed via valid_urls.txt) — no short-slug redirects needed for those.
 *  - /privacy-policy-legal/ is confirmed live in valid_urls.txt — no /privacy-policy/ redirect needed.
 *  - /jonathan-akisanmi/ and /dr-jason-matyus/ were never unprefixed on WP.
 *  - /become-a-authorized-training-partner/ is confirmed live as-is.
 */
class WpRedirectsSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('Seeding WordPress old-slug 301 redirects…');

        $redirects = [

            // ------------------------------------------------------------------
            // Module 1 — CMS pages: old-slug consolidations (12 redirects)
            // ------------------------------------------------------------------
            [
                'from_path' => '/about-us-old-2/',
                'to_path' => '/about-us/',
                'notes' => 'Duplicate about-us page (WP ID 9242) consolidated',
            ],
            [
                'from_path' => '/about-us-old/',
                'to_path' => '/about-us/',
                'notes' => 'Old-theme about-us page consolidated',
            ],
            [
                'from_path' => '/contact-us-old/',
                'to_path' => '/contact-us/',
                'notes' => 'Old contact-us page (WP ID 6369) consolidated',
            ],
            [
                'from_path' => '/board-of-directors-old/',
                'to_path' => '/board-of-directors/',
                'notes' => 'Old board page (WP ID 4615) consolidated',
            ],
            [
                'from_path' => '/certifications-faq-old/',
                'to_path' => '/certifications-faq/',
                'notes' => 'Old FAQ page (WP ID 4083) consolidated',
            ],
            [
                'from_path' => '/affiliates-partners-old/',
                'to_path' => '/affiliate-partners/',
                'notes' => 'Old affiliates-partners page (WP ID 3911) consolidated — note plural variant',
            ],
            [
                'from_path' => '/affiliate-partners-old/',
                'to_path' => '/affiliate-partners/',
                'notes' => 'Duplicate affiliate-partners page (WP ID 5005) consolidated',
            ],
            [
                'from_path' => '/non-profit-activities-donation-old/',
                'to_path' => '/non-profit-activities-donation/',
                'notes' => 'Old donation page (WP ID 5020) consolidated',
            ],
            [
                'from_path' => '/member-services-old/',
                'to_path' => '/member-services/',
                'notes' => 'Old member-services page (WP ID 6486) consolidated',
            ],
            [
                'from_path' => '/privacy-policy-3/',
                'to_path' => '/privacy-policy-legal/',
                'notes' => 'Duplicate privacy policy page (WP ID 4399) consolidated',
            ],
            [
                'from_path' => '/dr-sandra-grouse-old/',
                'to_path' => '/board-of-directors-dr-sandra-grouse/',
                'notes' => 'Old board member slug (WP ID 4951) redirected to prefixed path',
            ],
            [
                'from_path' => '/dr-jason-matyus-old/',
                'to_path' => '/board-of-directors-dr-jason-matyus/',
                'notes' => 'Old board member slug (WP ID 5424) redirected to prefixed path',
            ],

            // ------------------------------------------------------------------
            // Module 2 — Certifications: old-slug consolidations (3 redirects)
            // (target routes are managed by Module 2 — cert pages may not yet exist)
            // ------------------------------------------------------------------
            [
                'from_path' => '/certifications-old/',
                'to_path' => '/certifications/',
                'notes' => 'Old certifications index page (WP ID 3616) consolidated',
            ],
            [
                'from_path' => '/about-testing-options-old/',
                'to_path' => '/about-testing-options/',
                'notes' => 'Old testing-options page (WP ID 3892) consolidated',
            ],
            [
                'from_path' => '/certification-process-old1/',
                'to_path' => '/certification-process/',
                'notes' => 'Old cert-process page (WP ID 5813) consolidated',
            ],

            // ------------------------------------------------------------------
            // Module 3 — Training / LMS: old-slug consolidations (5 redirects)
            // ------------------------------------------------------------------
            [
                'from_path' => '/workshop-trainings-old/',
                'to_path' => '/workshop-trainings/',
                'notes' => 'Old workshop-trainings page (WP ID 5940) consolidated',
            ],
            [
                'from_path' => '/online-courses-old/',
                'to_path' => '/online-courses/',
                'notes' => 'Old online-courses page consolidated',
            ],
            [
                'from_path' => '/online-courses-old1/',
                'to_path' => '/online-courses/',
                'notes' => 'Old online-courses page (variant 1) consolidated',
            ],
            [
                'from_path' => '/online-courses-old3/',
                'to_path' => '/online-courses/',
                'notes' => 'Old online-courses page (variant 3) consolidated',
            ],
            [
                'from_path' => '/online-courses-old4/',
                'to_path' => '/online-courses/',
                'notes' => 'Old online-courses page (variant 4) consolidated',
            ],

            // ------------------------------------------------------------------
            // Module 4 — Membership: old-slug consolidations (4 redirects)
            // ------------------------------------------------------------------
            [
                'from_path' => '/membership-old/',
                'to_path' => '/membership/',
                'notes' => 'Old membership page (WP ID 3484) consolidated',
            ],
            [
                'from_path' => '/membership-old1/',
                'to_path' => '/membership/',
                'notes' => 'Old membership variant (WP ID 5475) consolidated',
            ],
            [
                'from_path' => '/membership-faqs-old/',
                'to_path' => '/membership-faqs/',
                'notes' => 'Old membership-faqs page (WP ID 4193) consolidated',
            ],
            [
                'from_path' => '/student-membership-old/',
                'to_path' => '/student-membership/',
                'notes' => 'Old student-membership page (WP ID 6262) consolidated',
            ],

            // ------------------------------------------------------------------
            // Module 8 — Career Center: old-slug consolidations (7 redirects)
            // ------------------------------------------------------------------
            [
                'from_path' => '/career-center-old/',
                'to_path' => '/career-center/',
                'notes' => 'Old career-center page (WP ID 6640) consolidated',
            ],
            [
                'from_path' => '/job-listing-old/',
                'to_path' => '/job-listing/',
                'notes' => 'Old job-listing page (WP ID 11183) consolidated',
            ],
            [
                'from_path' => '/post-resume-old/',
                'to_path' => '/post-resume/',
                'notes' => 'Old post-resume page (WP ID 11217) consolidated',
            ],
            [
                'from_path' => '/resume-evaluation-old/',
                'to_path' => '/resume-evaluation/',
                'notes' => 'Old resume-evaluation page (WP ID 11226) consolidated',
            ],
            [
                'from_path' => '/post-job-opportunities-old/',
                'to_path' => '/post-job-opportunities/',
                'notes' => 'Old post-job-opportunities page (WP ID 11257) consolidated',
            ],
            [
                'from_path' => '/premium-hot-jobs-old/',
                'to_path' => '/premium-hot-jobs/',
                'notes' => 'Old premium-hot-jobs page (WP ID 11284) consolidated',
            ],
            [
                'from_path' => '/employer-old/',
                'to_path' => '/employer/',
                'notes' => 'Old employer page (WP ID 11312) consolidated',
            ],

        ];

        $created = 0;
        $skipped = 0;

        foreach ($redirects as $data) {
            $existing = Redirect::where('from_path', $data['from_path'])->exists();

            if ($existing) {
                $skipped++;

                continue;
            }

            Redirect::create([
                'from_path' => $data['from_path'],
                'to_path' => $data['to_path'],
                'http_code' => 301,
                'is_active' => true,
                'notes' => $data['notes'],
                'hit_count' => 0,
            ]);

            $created++;
        }

        $this->command->info("WpRedirectsSeeder: {$created} created, {$skipped} already existed.");
    }
}
