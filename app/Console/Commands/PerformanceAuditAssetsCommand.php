<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;

class PerformanceAuditAssetsCommand extends Command
{
    protected $signature = 'performance:audit-assets
                            {--paths=public/storage,public/mirrors : Comma-separated public asset paths to scan}
                            {--threshold-kb=500 : Report images larger than this size}
                            {--top=20 : Number of largest images to list}
                            {--skip-source-scan : Skip scanning source files for remote WordPress asset URLs}';

    protected $description = 'Audit public image assets for page-load performance issues';

    /** @var array<string, true> */
    private const IMAGE_EXTENSIONS = [
        'avif' => true,
        'gif' => true,
        'jpg' => true,
        'jpeg' => true,
        'png' => true,
        'svg' => true,
        'webp' => true,
    ];

    public function handle(): int
    {
        $paths = $this->assetPaths();
        $thresholdBytes = max(1, (int) $this->option('threshold-kb')) * 1024;
        $top = max(1, (int) $this->option('top'));

        $images = $this->collectImages($paths);

        if ($images === []) {
            $this->warn('No image assets found in the selected paths.');

            return self::SUCCESS;
        }

        $this->info('Public image asset summary');
        $this->table(['Extension', 'Files', 'Total size'], $this->extensionRows($images));

        $largeImages = array_values(array_filter(
            $images,
            static fn (SplFileInfo $file): bool => $file->getSize() >= $thresholdBytes,
        ));
        usort($largeImages, static fn (SplFileInfo $a, SplFileInfo $b): int => $b->getSize() <=> $a->getSize());

        $this->newLine();
        $this->info('Largest images');
        $this->table(['Path', 'Size'], array_map(
            fn (SplFileInfo $file): array => [$this->relativePath($file->getPathname()), $this->formatBytes($file->getSize())],
            array_slice($largeImages, 0, $top),
        ));

        $missingOptimized = $this->missingOptimizedVariantRows($images, $top);
        $this->newLine();
        $this->info('Largest PNG/JPEG/GIF files without a sibling WebP/AVIF variant');
        $this->table(['Path', 'Size'], $missingOptimized);

        if (! (bool) $this->option('skip-source-scan')) {
            $remoteReferences = $this->remoteWordPressAssetReferences();

            $this->newLine();
            $this->info('Remote WordPress upload references in source files: ' . count($remoteReferences));

            foreach (array_slice($remoteReferences, 0, $top) as $reference) {
                $this->line('  ' . $reference);
            }
        }

        $this->newLine();
        $this->line('Next actions: convert large PNG/JPEG/GIF assets to WebP/AVIF, add dimensions/lazy loading in renderers, and keep long cache headers on /storage, /mirrors, and /build.');

        return self::SUCCESS;
    }

    /** @return list<string> */
    private function assetPaths(): array
    {
        $paths = array_filter(array_map('trim', explode(',', (string) $this->option('paths'))));

        return array_values(array_map(
            fn (string $path): string => str_starts_with($path, '/') || preg_match('#^[A-Za-z]:[\\/]#', $path) === 1
                ? $path
                : base_path($path),
            $paths,
        ));
    }

    /** @param list<string> $paths @return list<SplFileInfo> */
    private function collectImages(array $paths): array
    {
        $files = [];

        foreach ($paths as $path) {
            if (! is_dir($path)) {
                $this->warn('Skipped missing asset path: ' . $this->relativePath($path));

                continue;
            }

            $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));

            foreach ($iterator as $file) {
                if (! $file instanceof SplFileInfo || ! $file->isFile()) {
                    continue;
                }

                $extension = strtolower($file->getExtension());

                if (isset(self::IMAGE_EXTENSIONS[$extension])) {
                    $files[] = $file;
                }
            }
        }

        return $files;
    }

    /** @param list<SplFileInfo> $images @return list<array{string, int, string}> */
    private function extensionRows(array $images): array
    {
        $summary = [];

        foreach ($images as $image) {
            $extension = strtolower($image->getExtension());
            $summary[$extension] ??= ['count' => 0, 'bytes' => 0];
            $summary[$extension]['count']++;
            $summary[$extension]['bytes'] += $image->getSize();
        }

        uasort($summary, static fn (array $a, array $b): int => $b['bytes'] <=> $a['bytes']);

        $rows = [];

        foreach ($summary as $extension => $values) {
            $rows[] = [$extension, $values['count'], $this->formatBytes($values['bytes'])];
        }

        return $rows;
    }

    /** @param list<SplFileInfo> $images @return list<array{string, string}> */
    private function missingOptimizedVariantRows(array $images, int $limit): array
    {
        $candidates = array_values(array_filter(
            $images,
            static function (SplFileInfo $file): bool {
                $extension = strtolower($file->getExtension());

                if (! in_array($extension, ['gif', 'jpeg', 'jpg', 'png'], true)) {
                    return false;
                }

                return ! is_file($file->getPathname() . '.webp') && ! is_file($file->getPathname() . '.avif');
            },
        ));

        usort($candidates, static fn (SplFileInfo $a, SplFileInfo $b): int => $b->getSize() <=> $a->getSize());

        return array_map(
            fn (SplFileInfo $file): array => [$this->relativePath($file->getPathname()), $this->formatBytes($file->getSize())],
            array_slice($candidates, 0, $limit),
        );
    }

    /** @return list<string> */
    private function remoteWordPressAssetReferences(): array
    {
        $roots = [
            base_path('resources/views'),
            base_path('database/seeders'),
            base_path('config'),
        ];
        $references = [];

        foreach ($roots as $root) {
            if (! is_dir($root)) {
                continue;
            }

            $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root));

            foreach ($iterator as $file) {
                if (! $file instanceof SplFileInfo || ! $file->isFile()) {
                    continue;
                }

                $extension = strtolower($file->getExtension());

                if (! in_array($extension, ['blade.php', 'php', 'css', 'js', 'json'], true) && ! str_ends_with($file->getFilename(), '.blade.php')) {
                    continue;
                }

                $contents = file_get_contents($file->getPathname());

                if (! is_string($contents) || ! str_contains($contents, '/wp-content/uploads/')) {
                    continue;
                }

                preg_match_all('~https?://(?:www\.)?aapscm\.(?:org|com)/wp-content/uploads/[^\s"\')]+~i', $contents, $matches);

                foreach (array_unique($matches[0]) as $url) {
                    $references[] = $this->relativePath($file->getPathname()) . ' -> ' . $url;
                }
            }
        }

        return array_values(array_unique($references));
    }

    private function relativePath(string $path): string
    {
        $path = str_replace('\\', '/', $path);
        $base = str_replace('\\', '/', base_path()) . '/';

        return str_starts_with($path, $base) ? substr($path, strlen($base)) : $path;
    }

    private function formatBytes(int $bytes): string
    {
        if ($bytes >= 1024 * 1024) {
            return number_format($bytes / 1024 / 1024, 2) . ' MB';
        }

        if ($bytes >= 1024) {
            return number_format($bytes / 1024, 1) . ' KB';
        }

        return $bytes . ' B';
    }
}
