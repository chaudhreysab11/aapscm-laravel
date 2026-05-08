<?php

declare(strict_types=1);

namespace Database\Seeders\Support;

use App\Models\Page;
use App\Models\Redirect;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

abstract class ExactMirrorPageSeeder extends Seeder
{
    public function run(): void
    {
        /** @var array<string, mixed> $pageData */
        $pageData = $this->rewriteUrls(
            require database_path('seeders/data/' . $this->payloadFile())
        );

        if (isset($pageData['body_html']) && is_string($pageData['body_html'])) {
            $pageData['body_html'] = $this->sanitizeBodyHtml($pageData['body_html']);
        }

        $pageData = $this->transformPageData($pageData);

        $title = $this->resolveTitle($pageData);
        $excerpt = $this->resolveExcerpt($pageData);
        $metaTitle = $this->resolveMetaTitle($pageData, $title);
        $metaDescription = $this->resolveMetaDescription($pageData, $excerpt, $title);

        Page::updateOrCreate(
            ['slug' => $this->slug()],
            [
                'title' => $title,
                'content' => null,
                'excerpt' => $excerpt,
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => $metaTitle,
                'meta_description' => $metaDescription,
                'seo_title' => $metaTitle,
                'seo_description' => $metaDescription,
                'show_in_nav' => false,
            ],
        );

        $this->disableShadowingRedirects();
    }

    abstract protected function slug(): string;

    abstract protected function payloadFile(): string;

    /**
     * @param array<string, mixed> $pageData
     * @return array<string, mixed>
     */
    protected function transformPageData(array $pageData): array
    {
        return $pageData;
    }

    private function disableShadowingRedirects(): void
    {
        $paths = [
            '/' . $this->slug() . '/',
            '/' . $this->slug(),
        ];

        Redirect::query()
            ->whereIn('from_path', $paths)
            ->where('is_active', true)
            ->update(['is_active' => false]);

        Cache::forget('redirect_map');
    }

    private function sanitizeBodyHtml(string $html): string
    {
        $patterns = [
            '~<script\b[^>]*src="[^"]*(?:recaptcha|wpcf7).*?"[^>]*>\s*</script>~is',
            '~<script\b[^>]*id="[^"]*(?:recaptcha|wpcf7)[^"]*"[^>]*>.*?</script>~is',
            '~<script\b[^>]*>.*?(?:wpcf7_recaptcha|grecaptcha).*?</script>~is',
            '~<script\b[^>]*>.*?</script>~is',
            '~<link\b[^>]*rel=(["\'])stylesheet\1[^>]*>~is',
            '~<link\b[^>]*href=(["\'])[^"\']*\.css(?:\?[^"\']*)?\1[^>]*>~is',
        ];

        foreach ($patterns as $pattern) {
            $html = preg_replace($pattern, '', $html) ?? $html;
        }

        return $this->sanitizeKnownMirrorArtifacts($html);
    }

    private function sanitizeKnownMirrorArtifacts(string $html): string
    {
        return match ($this->slug()) {
            'aapscm-training-virtual-american-certified-global-supply-chain-risk-and-resilience-professionalac-gsrp',
            'aapscm-training-virtual-chartered-sustainable-supply-chain-manager-csscm' => $this->sanitizeTrainingContactArtifacts($html),
            default => $html,
        };
    }

    private function sanitizeTrainingContactArtifacts(string $html): string
    {
        $organization = 'American Association of Procurement, Supply Chain and Tourism Management (AAPSCM)®';
        $address = '2701 Little Elm Pkwy Ste 100 Little Elm, TX 75068';
        $phone = '+1-469-991-5228';

        $replacements = [
            '~<section\b[^>]*elementor-element-133a725[^>]*>.*?Customer Support.*?</section>~is' => '',
            '~Dallas,\s*Texas Charter and\s*Conference Center\s*\(AAPSCM\)®\s*<br>\s*~iu' => $organization . '<br>',
            '~Dallas,\s*Texas Charter and\s*Conference Center\s*\(AAPSCM\)®~iu' => $organization,
            '~Dallas,\s*Tx Charter~iu' => $organization,
            '~Columbia,\s*South Carolina Charter~iu' => $organization,
            '~7548\s+Preston\s+Rd\s+Ste\s+141/296\s+Frisco,\s*TX\s*75034~iu' => $address,
            '~1366\s+Gordon\s+Heights\s+Lane,\s*Frisco\s*TX\s*75033~iu' => $address,
            '~450\s+Ganton\s+C\s*T\.\s*Blythewood,\s*SC\s*29016~iu' => $address,
            '~\+1-\(833\)\s*524-2846~' => $phone,
            '~\+1-\(803\)\s*998-2189~' => $phone,
        ];

        foreach ($replacements as $pattern => $replacement) {
            $html = preg_replace($pattern, $replacement, $html) ?? $html;
        }

        return $html;
    }

    private function resolveTitle(array $pageData): string
    {
        $heading = $this->extractFirstHeading((string) ($pageData['body_html'] ?? ''));

        if ($heading !== '') {
            return $heading;
        }

        $title = $this->cleanupText((string) ($pageData['title'] ?? ''));
        $title = preg_replace('/\s*(?:-|\|)\s*AAPSCM®\s*$/u', '', $title) ?? $title;

        if ($title !== '') {
            return $title;
        }

        return Str::of($this->slug())->replace('-', ' ')->title()->value();
    }

    private function resolveMetaTitle(array $pageData, string $title): string
    {
        $payloadTitle = $this->cleanupText((string) ($pageData['title'] ?? ''));

        if ($payloadTitle !== '' && ! str_contains(Str::lower($payloadTitle), 'certification | aapscm')) {
            return $payloadTitle;
        }

        return $title . ' - AAPSCM®';
    }

    private function resolveExcerpt(array $pageData): string
    {
        $text = $this->extractBodyText((string) ($pageData['body_html'] ?? ''));

        if ($text === '') {
            return $this->resolveTitle($pageData);
        }

        return Str::limit($text, 220, '');
    }

    private function resolveMetaDescription(array $pageData, string $excerpt, string $title): string
    {
        $metaDescription = $this->cleanupText((string) ($pageData['meta_description'] ?? ''));

        if ($this->isMeaningfulMetaDescription($metaDescription)) {
            return Str::limit($metaDescription, 320, '');
        }

        $text = $this->extractBodyText((string) ($pageData['body_html'] ?? ''));

        if ($text !== '') {
            return Str::limit($text, 320, '');
        }

        if ($excerpt !== '') {
            return $excerpt;
        }

        return $title;
    }

    private function extractFirstHeading(string $html): string
    {
        if ($html === '') {
            return '';
        }

        if (! preg_match('~<h[1-3][^>]*>(.*?)</h[1-3]>~is', $html, $matches)) {
            return '';
        }

        return $this->cleanupText(strip_tags($matches[1]));
    }

    private function extractBodyText(string $html): string
    {
        return $this->cleanupText(strip_tags($html));
    }

    private function cleanupText(string $text): string
    {
        $text = str_replace("\u{00A0}", ' ', $text);
        $text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $text = preg_replace('/\[[a-z0-9_-]+(?:\s+[^[\]]*)?\]/iu', ' ', $text) ?? $text;
        $text = preg_replace('/\s+/u', ' ', trim($text)) ?? trim($text);

        return $text;
    }

    private function isMeaningfulMetaDescription(string $text): bool
    {
        if ($text === '' || mb_strlen($text) < 60) {
            return false;
        }

        if (Str::upper($text) === 'AMERICAN ASSOCIATION OF PROCUREMENT AND SUPPLY CHAIN MANAGEMENT') {
            return false;
        }

        return true;
    }

    private function rewriteUrls(mixed $value): mixed
    {
        if (is_array($value)) {
            $rewritten = [];

            foreach ($value as $key => $item) {
                $rewritten[$key] = $this->rewriteUrls($item);
            }

            return $rewritten;
        }

        if (! is_string($value)) {
            return $value;
        }

        if (str_contains($value, '<') && preg_match('~https?://(?:www\.)?aapscm\.(?:com|org)/~i', $value)) {
            return str_replace(' elementor-invisible', '', UrlRewriter::rewriteHtml($value));
        }

        if (preg_match('~^https?://(?:www\.)?aapscm\.(?:com|org)/wp-content/uploads/.+\.pdf(?:\?.*)?$~i', $value) === 1) {
            return UrlRewriter::pdf($value);
        }

        if (preg_match('~^https?://(?:www\.)?aapscm\.(?:com|org)/wp-content/uploads/~i', $value) === 1) {
            return UrlRewriter::image($value);
        }

        if (preg_match('~^https?://(?:www\.)?aapscm\.(?:com|org)/~i', $value) === 1) {
            return UrlRewriter::local($value);
        }

        return str_replace(' elementor-invisible', '', $value);
    }
}
