<?php

declare(strict_types=1);

namespace Database\Seeders\Support;

/**
 * Normalises legacy aapscm.org / aapscm.com URLs into local paths.
 *
 * Used during seeding to ensure nothing in the DB still points at the live
 * WordPress origin. Two shapes:
 *
 *  - image()     → /wp-content/uploads/YYYY/MM/file.ext  → /storage/cms-images/…
 *  - local()     → any other aapscm origin URL           → relative path with trailing slash
 *  - canonical() → builds SEO canonical from app URL + slug (trailing slash)
 *
 * Pure functions — no DB / container dependencies.
 */
final class UrlRewriter
{
    /**
     * Rewrites a wp-content/uploads URL to its local /storage/cms-images counterpart.
     * Pass-through for already-local paths and empty strings.
     */
    public static function image(string $url): string
    {
        if ($url === '') {
            return '';
        }

        return (string) preg_replace(
            '#^https?://(?:www\.)?aapscm\.(?:org|com)/wp-content/uploads/#',
            '/storage/cms-images/',
            $url,
        );
    }

    /**
     * Rewrites any aapscm.org URL to a local relative path.
     *
     *  - /wp-content/uploads/… → forwarded to image()
     *  - fragment-only (#foo), mailto:, tel:, javascript: → pass through
     *  - path URLs → return path (+ query/fragment), adding trailing slash if the
     *    path is extension-less
     *  - external (non-aapscm.org) URLs → pass through unchanged
     */
    public static function local(string $url): string
    {
        if ($url === '' || $url === '#') {
            return $url;
        }

        if (preg_match('~^(mailto:|tel:|javascript:|#)~i', $url)) {
            return $url;
        }

        if (str_contains($url, '/wp-content/uploads/')) {
            return self::image($url);
        }

        if (! preg_match('#^https?://(?:www\.)?aapscm\.(?:org|com)#i', $url)) {
            return $url;
        }

        $parts = parse_url($url);
        $path  = $parts['path']  ?? '/';
        $query = isset($parts['query']) ? '?' . $parts['query'] : '';
        $frag  = isset($parts['fragment']) ? '#' . $parts['fragment'] : '';

        // Add trailing slash for extension-less paths (matches EnforceTrailingSlash).
        $basename = basename($path);
        if ($path !== '/' && ! str_ends_with($path, '/') && ! str_contains($basename, '.')) {
            $path .= '/';
        }

        return $path . $query . $frag;
    }

    /**
     * Builds a canonical URL from the app's base URL and a slug.
     * Always ends with a slash. Pass '' for the home page.
     */
    public static function canonical(string $slug): string
    {
        $base = rtrim((string) config('app.url'), '/');
        $slug = trim($slug, '/');

        return $slug === '' ? $base . '/' : $base . '/' . $slug . '/';
    }

    /**
     * Sweeps an HTML/string blob, rewriting every aapscm.org absolute URL.
     * Handles both image URLs (wp-content/uploads) and internal page URLs.
     */
    public static function rewriteHtml(string $html): string
    {
        if ($html === '') {
            return $html;
        }

        // Images first (more specific).
        $html = (string) preg_replace(
            '#https?://(?:www\.)?aapscm\.(?:org|com)/wp-content/uploads/#',
            '/storage/cms-images/',
            $html,
        );

        // Internal page URLs. Capture full absolute URL and rewrite to path.
        $html = (string) preg_replace_callback(
            '#https?://(?:www\.)?aapscm\.(?:org|com)([^\s"\'<>)]*)#i',
            static function (array $m): string {
                $tail = $m[1] === '' ? '/' : $m[1];

                return self::local('https://aapscm.org' . $tail);
            },
            $html,
        );

        return $html;
    }

    /**
     * Rewrites a PDF URL to its local /storage/cms-pdfs counterpart.
     * Pass-through for already-local paths and empty strings.
     */

    public static function pdf(string $url): string
    {
        if ($url === '') {
            return '';
        }

        return (string) preg_replace(
            '#^https?://(?:www\.)?aapscm\.(?:org|com)/wp-content/uploads/#',
            '/storage/cms-pdfs/',
            $url,
        );
    }
}
