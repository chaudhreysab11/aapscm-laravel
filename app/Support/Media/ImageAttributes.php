<?php

declare(strict_types=1);

namespace App\Support\Media;

final class ImageAttributes
{
    /** @var array<string, array{width: int, height: int}|null> */
    private static array $dimensionsCache = [];

    /** @var array<string, string|null> */
    private static array $optimizedUrlCache = [];

    /** @return array{width: int, height: int}|null */
    public static function dimensionsForUrl(?string $url): ?array
    {
        $path = self::publicPathForUrl($url);

        if ($path === null) {
            return null;
        }

        if (array_key_exists($path, self::$dimensionsCache)) {
            return self::$dimensionsCache[$path];
        }

        $size = @getimagesize($path);

        if ($size === false || ! isset($size[0], $size[1])) {
            self::$dimensionsCache[$path] = null;

            return null;
        }

        return self::$dimensionsCache[$path] = [
            'width' => (int) $size[0],
            'height' => (int) $size[1],
        ];
    }

    /** @return array<string, string> */
    public static function defaultAttributes(?string $url, bool $priority = false): array
    {
        $attributes = [
            'decoding' => 'async',
            'loading' => $priority ? 'eager' : 'lazy',
        ];

        if ($priority) {
            $attributes['fetchpriority'] = 'high';
        }

        $dimensions = self::dimensionsForUrl($url);

        if ($dimensions !== null) {
            $attributes['width'] = (string) $dimensions['width'];
            $attributes['height'] = (string) $dimensions['height'];
        }

        return $attributes;
    }

    public static function publicPathForUrl(?string $url): ?string
    {
        $url = trim((string) $url);

        if ($url === '' || str_starts_with($url, 'data:')) {
            return null;
        }

        $path = parse_url($url, PHP_URL_PATH);

        if (! is_string($path) || trim($path) === '') {
            return null;
        }

        $path = rawurldecode($path);
        $path = str_replace('\\', '/', $path);

        if (! str_starts_with($path, '/')) {
            $path = '/' . $path;
        }

        if (! self::isPublicAssetPath($path)) {
            return null;
        }

        $candidate = public_path(ltrim($path, '/'));

        return is_file($candidate) ? $candidate : null;
    }

    public static function optimizedUrlFor(?string $url): ?string
    {
        $url = trim((string) $url);

        if ($url === '') {
            return null;
        }

        if (array_key_exists($url, self::$optimizedUrlCache)) {
            return self::$optimizedUrlCache[$url];
        }

        $path = self::publicPathForUrl($url);

        if ($path === null) {
            return self::$optimizedUrlCache[$url] = null;
        }

        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

        if (! in_array($extension, ['jpg', 'jpeg', 'png'], true)) {
            return self::$optimizedUrlCache[$url] = null;
        }

        $candidate = $path . '.webp';

        if (! is_file($candidate) || filesize($candidate) === 0) {
            return self::$optimizedUrlCache[$url] = null;
        }

        $sourceDimensions = self::dimensionsForUrl($url);
        $candidateDimensions = @getimagesize($candidate);

        if (
            $sourceDimensions === null
            || $candidateDimensions === false
            || ! isset($candidateDimensions[0], $candidateDimensions[1])
            || $sourceDimensions['width'] !== (int) $candidateDimensions[0]
            || $sourceDimensions['height'] !== (int) $candidateDimensions[1]
            || filesize($candidate) >= filesize($path)
        ) {
            return self::$optimizedUrlCache[$url] = null;
        }

        return self::$optimizedUrlCache[$url] = self::publicUrlForPath($candidate);
    }

    public static function optimizedSrcset(?string $srcset): ?string
    {
        $srcset = trim((string) $srcset);

        if ($srcset === '') {
            return null;
        }

        $candidates = array_filter(array_map('trim', explode(',', $srcset)));

        if ($candidates === []) {
            return null;
        }

        $changed = false;
        $rewritten = [];

        foreach ($candidates as $candidate) {
            $parts = preg_split('/\s+/', $candidate) ?: [];
            $source = $parts[0] ?? '';

            if ($source === '') {
                $rewritten[] = $candidate;

                continue;
            }

            $optimized = self::optimizedUrlFor($source);

            if ($optimized === null) {
                $rewritten[] = $candidate;

                continue;
            }

            $parts[0] = $optimized;
            $rewritten[] = implode(' ', $parts);
            $changed = true;
        }

        return $changed ? implode(', ', $rewritten) : null;
    }

    private static function publicUrlForPath(string $path): string
    {
        $path = str_replace('\\', '/', $path);
        $publicPath = str_replace('\\', '/', public_path()) . '/';

        if (! str_starts_with($path, $publicPath)) {
            return $path;
        }

        return '/' . ltrim(substr($path, strlen($publicPath)), '/');
    }

    private static function isPublicAssetPath(string $path): bool
    {
        return str_starts_with($path, '/storage/')
            || str_starts_with($path, '/mirrors/')
            || str_starts_with($path, '/build/');
    }
}
