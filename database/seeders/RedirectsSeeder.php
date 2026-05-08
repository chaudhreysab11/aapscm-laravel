<?php

namespace Database\Seeders;

use App\Models\Redirect;
use Illuminate\Database\Seeder;

class RedirectsSeeder extends Seeder
{
    /**
     * Known 301 redirects from the SEO audit (7 confirmed + 9 under review).
     * These preserve all previously live URLs after the Laravel rebuild.
     *
     * @see Sitemap Analysis/content_audit_report.md
     */
    private array $redirects = [
        // ── Confirmed duplicates (7) ─────────────────────────────────────
        ['/home',                                    '/',                        301, 'WP default home alias'],
        ['/index.php',                               '/',                        301, 'WP index.php root'],
        ['/about',                                '/about-us/',                  301, 'Slug normalisation'],
        ['/contact',                              '/contact-us/',                301, 'Slug normalisation'],
        ['/membership',                              '/membership/',             301, 'Trailing slash'],
        ['/certification',                           '/certification/',          301, 'Trailing slash (catalog root)'],
        ['/certificate-video-old',                  '/certificate-video/',       301, 'Legacy video page slug'],
        ['/certificate-video-old/',                 '/certificate-video/',       301, 'Legacy video page slug'],
        ['/blog',                                    '/blog/',                   301, 'Trailing slash'],
        // ── Under review (9) — flagged; will be updated post-audit ───────
        ['/no-access',                               '/',                        301, 'Out-of-scope WP page'],
        ['/course-resource-error',                   '/',                        301, 'Out-of-scope WP page'],
        ['/new-home',                                '/',                        301, 'Out-of-scope WP page'],
    ];

    public function run(): void
    {
        Redirect::query()
            ->whereIn('from_path', ['/certificate-video', '/certificate-video/'])
            ->delete();

        foreach ($this->redirects as [$from, $to, $code, $notes]) {
            Redirect::updateOrCreate(
                ['from_path' => $from],
                [
                    'to_path' => $to,
                    'http_code' => $code,
                    'is_active' => true,
                    'notes' => $notes,
                ]
            );
        }

        $this->command->info('  Redirects seeded: ' . count($this->redirects));
    }
}
