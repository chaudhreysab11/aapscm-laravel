<?php

declare(strict_types=1);

use App\Http\Controllers\CmsPageController;
use App\Models\Page;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Route;

require dirname(__DIR__) . '/vendor/autoload.php';

$app = require dirname(__DIR__) . '/bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

final class UrlInventoryBuilder
{
    private const BASE_URL = 'https://aapscm.org';

    /** @var string[] */
    private const PUBLIC_EXCLUDED_CATEGORIES = ['admin', 'auth', 'member-portal'];

    /** @var string[] */
    private const NON_MIRRORABLE_CATEGORIES = ['admin', 'auth', 'member-portal', 'commerce', 'forms'];

    private string $projectRoot;

    /** @var array<string, string> */
    private array $slugViews;

    /** @var string[] */
    private array $cmsSlugs = [
        'about-us',
        'contact-us',
        'us-charters',
        'donations',
        'aapscm-hotline',
        'book',
        'trademark',
        'privacy-policy-legal',
        'become-a-partner',
        'how-to-apply',
        'communities',
        'non-profit-activities-donation',
        'training-and-credentialing',
        'training-school-affiliated',
        'affiliate-partners',
        'learning-and-development-hub',
        'professional-development',
        'influencing-suppliers',
        'board-of-directors',
        'member-services',
        'home',
        '',
    ];

    /** @var string[] */
    private array $trainingSlugs = [
        'all-courses',
        'aapscm-training',
        'workshop-trainings',
        'online-courses',
        'training-and-credentialing',
        'training-school-affiliated',
        'learning-and-development-hub',
        'professional-development',
        'become-a-authorized-training-partner',
        'seminars-courses',
        'artificial-intelligence-ai-courses',
        'application-form-for-free-training-in-procurement-management',
    ];

    /** @var string[] */
    private array $membershipSlugs = [
        'membership',
        'professional-membership',
        'chartered-professional-membership',
        'chartered-supply-chain-professional-member',
        'corporate-membership',
        'student-membership',
        'professional-membership-renewal',
        'fellow-membership',
        'fellow-membership-form',
        'membership-faqs',
        'professional-member-criteria',
        'why-join-aapscm',
        'benefits-and-resources',
        'digital-badges',
    ];

    /** @var string[] */
    private array $careerSlugs = [
        'career-center',
        'post-resume',
        'resume-evaluation',
        'view-job-seekers',
        'job-listing',
        'post-job-opportunities',
    ];

    /** @var string[] */
    private array $commerceSlugs = [
        'cart',
        'checkout',
    ];

    /** @var string[] */
    private array $examSlugs = [
        'verify-a-certificate',
        'online-exam',
        'exam-objectives',
        'about-testing-options',
        'programs-match',
        'exam-proctoring',
        'certificate-exam-policies',
        '4-steps-to-verification',
        'request-pdes-for-certificate',
    ];

    /** @var string[] */
    private array $portalSlugs = [
        'dashboard',
        'profile',
    ];

    /** @var string[] */
    private array $authSlugs = [
        'login',
        'register',
        'forgot-password',
        'verify-email',
        'confirm-password',
    ];

    /** @var string[] */
    private array $formSlugs = [
        'application-form-for-free-training-in-procurement-management',
        'fellow-membership-form',
    ];

    /** @var string[] */
    private array $certificationIndexSlugs = [
        'certifications',
        'certifications-for-professionals',
        'certifications-faq',
        'certification-process',
        'which-certification-is-right-for-you',
        'procurement-management-certifications',
        'supply-chain-management-certifications',
        'tourism-management-certifications',
        'e-commerce-certifications',
        'combined-procurement-logistics-and-supply-chain-certifications',
        'procurement-management',
        'supply-chain-management',
    ];

    public function __construct()
    {
        $this->projectRoot = str_replace('\\', '/', dirname(__DIR__));

        /** @var array<string, string> $slugViews */
        $slugViews = (new ReflectionClass(CmsPageController::class))->getConstant('SLUG_VIEWS');
        $this->slugViews = $slugViews;
    }

    public function build(): void
    {
        $implementedRows = $this->implementedRows();
        $publicRows = array_values(array_filter(
            $implementedRows,
            fn (array $row): bool => ! in_array($row['category'], self::PUBLIC_EXCLUDED_CATEGORIES, true)
        ));

        $this->writeCsv($this->projectRoot . '/implemented_url_inventory.csv', $implementedRows);
        $this->writeCsv($this->projectRoot . '/public_url_inventory.csv', $publicRows);
        $this->writePublicCategoryCsvs($publicRows);

        $implementedCount = count($implementedRows);
        $publicCount = count($publicRows);

        echo "Implemented CSV: {$this->projectRoot}/implemented_url_inventory.csv" . PHP_EOL;
        echo "Implemented Rows: {$implementedCount}" . PHP_EOL;
        echo "Public CSV: {$this->projectRoot}/public_url_inventory.csv" . PHP_EOL;
        echo "Public Rows: {$publicCount}" . PHP_EOL;
    }

    /**
     * @return array<int, array<string, string>>
     */
    private function implementedRows(): array
    {
        $rows = [];
        $seenUrls = [];

        $pages = Page::query()
            ->published()
            ->orderBy('slug')
            ->get(['slug', 'template']);

        foreach ($pages as $page) {
            $slug = (string) $page->slug;
            $url = $this->canonicalUrl($slug);

            if (isset($seenUrls[$url])) {
                continue;
            }

            $template = $page->template !== null ? (string) $page->template : null;
            [$renderer, $mirrorStatus] = $this->pageRendererAndMirrorStatus($slug, $template);
            $category = $this->categoryFor($slug, $template);

            $rows[] = $this->row(
                slug: $this->canonicalSlug($slug),
                url: $url,
                category: $category,
                routeSource: 'cms-page',
                currentRenderer: $renderer,
                mirrorStatus: $mirrorStatus,
                mirrorCandidate: $this->mirrorCandidate($category, $mirrorStatus),
            );

            $seenUrls[$url] = true;
        }

        foreach (Route::getRoutes() as $route) {
            if (! in_array('GET', $route->methods(), true)) {
                continue;
            }

            $uri = trim($route->uri(), '/');

            if (str_contains($route->uri(), '{') || $uri === 'up') {
                continue;
            }

            $url = $this->canonicalUrl($uri);

            if (isset($seenUrls[$url])) {
                continue;
            }

            $category = $this->categoryFor($uri, null);

            $rows[] = $this->row(
                slug: $this->canonicalSlug($uri),
                url: $url,
                category: $category,
                routeSource: 'module-route',
                currentRenderer: 'route:' . $route->getActionName(),
                mirrorStatus: 'not-applicable',
                mirrorCandidate: 'no',
            );

            $seenUrls[$url] = true;
        }

        usort($rows, static fn (array $left, array $right): int => [$left['category'], $left['url']] <=> [$right['category'], $right['url']]);

        return $rows;
    }

    private function categoryFor(string $key, ?string $template): string
    {
        $key = trim($key, '/');

        if ($key === '' || $key === 'home') {
            return 'cms';
        }

        if (str_starts_with($key, 'admin')) {
            return 'admin';
        }

        if ($template !== null && in_array($template, ['membership_tier', 'fellow_tier'], true)) {
            return 'membership';
        }

        if (in_array($key, $this->portalSlugs, true)) {
            return 'member-portal';
        }

        if (in_array($key, $this->authSlugs, true)) {
            return 'auth';
        }

        if (in_array($key, $this->commerceSlugs, true)) {
            return 'commerce';
        }

        if (in_array($key, $this->formSlugs, true)) {
            return 'forms';
        }

        if (in_array($key, $this->careerSlugs, true)) {
            return 'career-center';
        }

        if (in_array($key, $this->membershipSlugs, true)) {
            return 'membership';
        }

        if (in_array($key, $this->examSlugs, true)) {
            return 'exam';
        }

        if (
            in_array($key, $this->trainingSlugs, true)
            || str_starts_with($key, 'aapscm-training-virtual-')
            || str_starts_with($key, 'apscm-training-virtual-')
            || str_starts_with($key, 'instructor-led-virtual-training-')
            || str_starts_with($key, 'executive-diploma-')
        ) {
            return 'training';
        }

        if (
            in_array($key, $this->certificationIndexSlugs, true)
            || preg_match('/^(acpp|acsct|ctm-2)$/', $key) === 1
            || preg_match('/^(the-american-certified-|american-certified-|advanced-certified-|chartered-|certified-)/', $key) === 1
        ) {
            return 'certification';
        }

        if (in_array($key, $this->cmsSlugs, true)) {
            return 'cms';
        }

        return 'cms';
    }

    /**
     * @return array{0: string, 1: string}
     */
    private function pageRendererAndMirrorStatus(string $slug, ?string $template): array
    {
        $renderer = 'template:' . (($template !== null && $template !== '') ? $template : 'default');
        $mirrorStatus = 'non-mirror';
        $viewName = $this->slugViews[$slug] ?? null;

        if ($viewName === null) {
            return [$renderer, $mirrorStatus];
        }

        $viewPath = $this->projectRoot . '/resources/views/' . str_replace('.', '/', $viewName) . '.blade.php';

        if (! is_file($viewPath)) {
            return [$renderer, $mirrorStatus];
        }

        $renderer = $this->relativePath($viewPath);
        $viewContents = file_get_contents($viewPath);

        if ($viewContents !== false && str_contains($viewContents, '<x-cms.exact-mirror-page')) {
            $mirrorStatus = 'exact-mirror';
        }

        return [$renderer, $mirrorStatus];
    }

    private function mirrorCandidate(string $category, string $mirrorStatus): string
    {
        if ($mirrorStatus !== 'non-mirror') {
            return 'no';
        }

        return in_array($category, self::NON_MIRRORABLE_CATEGORIES, true) ? 'no' : 'yes';
    }

    private function canonicalUrl(string $key): string
    {
        $key = trim($key, '/');

        if ($key === '' || $key === 'home') {
            return self::BASE_URL . '/';
        }

        return self::BASE_URL . '/' . $key . '/';
    }

    private function canonicalSlug(string $key): string
    {
        $key = trim($key, '/');

        if ($key === '' || $key === 'home') {
            return '/';
        }

        return '/' . $key . '/';
    }

    private function relativePath(string $path): string
    {
        $normalized = str_replace('\\', '/', $path);

        if (str_starts_with($normalized, $this->projectRoot . '/')) {
            return substr($normalized, strlen($this->projectRoot) + 1);
        }

        return $normalized;
    }

    /**
     * @param array<int, array<string, string>> $rows
     */
    private function writeCsv(string $path, array $rows): void
    {
        $handle = fopen($path, 'wb');

        if ($handle === false) {
            throw new RuntimeException("Failed to open {$path} for writing.");
        }

        fputcsv($handle, ['slug', 'url', 'category', 'route_source', 'current_renderer', 'mirror_status', 'mirror_candidate']);

        foreach ($rows as $row) {
            fputcsv($handle, $row);
        }

        fclose($handle);
    }

    /**
     * @param array<int, array<string, string>> $publicRows
     */
    private function writePublicCategoryCsvs(array $publicRows): void
    {
        $directory = $this->projectRoot . '/public_url_inventory_by_category';

        if (! is_dir($directory) && ! mkdir($directory, 0777, true) && ! is_dir($directory)) {
            throw new RuntimeException("Failed to create {$directory}.");
        }

        foreach (glob($directory . '/*.csv') ?: [] as $existingFile) {
            unlink($existingFile);
        }

        $grouped = [];

        foreach ($publicRows as $row) {
            $grouped[$row['category']][] = $row;
        }

        ksort($grouped);

        foreach ($grouped as $category => $rows) {
            usort($rows, static fn (array $left, array $right): int => $left['url'] <=> $right['url']);
            $this->writeCsv($directory . '/public_url_inventory_' . $category . '.csv', $rows);
        }
    }

    /**
     * @return array<string, string>
     */
    private function row(
        string $slug,
        string $url,
        string $category,
        string $routeSource,
        string $currentRenderer,
        string $mirrorStatus,
        string $mirrorCandidate,
    ): array {
        return [
            'slug' => $slug,
            'url' => $url,
            'category' => $category,
            'route_source' => $routeSource,
            'current_renderer' => $currentRenderer,
            'mirror_status' => $mirrorStatus,
            'mirror_candidate' => $mirrorCandidate,
        ];
    }
}

(new UrlInventoryBuilder())->build();