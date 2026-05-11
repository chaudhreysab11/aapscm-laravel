<?php

declare(strict_types=1);

namespace App\Console\Commands;

use GdImage;
use Illuminate\Console\Command;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;

class PerformanceGenerateImageVariantsCommand extends Command
{
    protected $signature = 'performance:generate-image-variants
                            {--paths=public/storage,public/mirrors : Comma-separated public asset paths to scan}
                            {--min-kb=100 : Only generate variants for source images at least this large}
                            {--quality=82 : WebP output quality, from 1 to 100}
                            {--limit=0 : Maximum number of source images to process; 0 means no limit}
                            {--overwrite : Regenerate existing WebP variants}
                            {--dry-run : Show what would be generated without writing files}';

    protected $description = 'Generate collision-safe WebP variants for local public PNG/JPEG assets';

    public function handle(): int
    {
        if (! function_exists('imagewebp')) {
            $this->error('PHP GD WebP support is not available.');

            return self::FAILURE;
        }

        @ini_set('memory_limit', '-1');

        $paths = $this->assetPaths();
        $minBytes = max(1, (int) $this->option('min-kb')) * 1024;
        $quality = min(100, max(1, (int) $this->option('quality')));
        $limit = max(0, (int) $this->option('limit'));
        $overwrite = (bool) $this->option('overwrite');
        $dryRun = (bool) $this->option('dry-run');
        $sources = $this->collectSources($paths, $minBytes, $overwrite);

        usort($sources, static fn (SplFileInfo $a, SplFileInfo $b): int => $b->getSize() <=> $a->getSize());

        if ($limit > 0) {
            $sources = array_slice($sources, 0, $limit);
        }

        if ($sources === []) {
            $this->info('No eligible PNG/JPEG images found.');

            return self::SUCCESS;
        }

        $this->info(($dryRun ? 'Would process ' : 'Processing ') . count($sources) . ' image(s).');

        $generated = [];
        $failed = 0;
        $notSmaller = 0;
        $sourceBytes = 0;
        $variantBytes = 0;

        foreach ($sources as $source) {
            $target = $this->targetPath($source);
            $sourceBytes += $source->getSize();

            if ($dryRun) {
                $generated[] = [
                    'source' => $this->relativePath($source->getPathname()),
                    'target' => $this->relativePath($target),
                    'source_bytes' => $source->getSize(),
                    'variant_bytes' => 0,
                ];

                continue;
            }

            $result = $this->writeWebp($source, $target, $quality);

            if ($result === null) {
                $failed++;

                continue;
            }

            if ($result >= $source->getSize()) {
                @unlink($target);
                $notSmaller++;

                continue;
            }

            $variantBytes += $result;
            $generated[] = [
                'source' => $this->relativePath($source->getPathname()),
                'target' => $this->relativePath($target),
                'source_bytes' => $source->getSize(),
                'variant_bytes' => $result,
            ];
        }

        $this->newLine();
        $this->info($dryRun ? 'Dry-run summary' : 'Generation summary');
        $this->line('Eligible source size: ' . $this->formatBytes($sourceBytes));
        $this->line('Generated variants: ' . count($generated));
        $this->line('Generated variant size: ' . $this->formatBytes($variantBytes));
        $this->line('Potential/actual savings: ' . $this->formatBytes(max(0, $sourceBytes - $variantBytes)));
        $this->line('Skipped because variant was not smaller: ' . $notSmaller);
        $this->line('Failed conversions: ' . $failed);

        $rows = array_map(
            fn (array $row): array => [
                $row['source'],
                $row['target'],
                $this->formatBytes($row['source_bytes']),
                $row['variant_bytes'] > 0 ? $this->formatBytes($row['variant_bytes']) : 'n/a',
            ],
            array_slice($generated, 0, 15),
        );

        if ($rows !== []) {
            $this->newLine();
            $this->table(['Source', 'WebP variant', 'Source size', 'Variant size'], $rows);
        }

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
    private function collectSources(array $paths, int $minBytes, bool $overwrite): array
    {
        $files = [];

        foreach ($paths as $path) {
            if (! is_dir($path)) {
                $this->warn('Skipped missing asset path: ' . $this->relativePath($path));

                continue;
            }

            $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));

            foreach ($iterator as $file) {
                if (! $file instanceof SplFileInfo || ! $file->isFile() || $file->getSize() < $minBytes) {
                    continue;
                }

                $extension = strtolower($file->getExtension());

                if (! in_array($extension, ['jpeg', 'jpg', 'png'], true)) {
                    continue;
                }

                if (! $overwrite && is_file($this->targetPath($file))) {
                    continue;
                }

                $files[] = $file;
            }
        }

        return $files;
    }

    private function targetPath(SplFileInfo $source): string
    {
        return $source->getPathname() . '.webp';
    }

    private function writeWebp(SplFileInfo $source, string $target, int $quality): ?int
    {
        $extension = strtolower($source->getExtension());
        $image = match ($extension) {
            'jpg', 'jpeg' => @imagecreatefromjpeg($source->getPathname()),
            'png' => @imagecreatefrompng($source->getPathname()),
            default => false,
        };

        if (! $image instanceof GdImage) {
            $this->warn('Failed to read image: ' . $this->relativePath($source->getPathname()));

            return null;
        }

        if ($extension === 'png') {
            imagepalettetotruecolor($image);
            imagealphablending($image, true);
            imagesavealpha($image, true);
        }

        $directory = dirname($target);
        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $written = @imagewebp($image, $target, $quality);
        imagedestroy($image);

        if (! $written || ! is_file($target)) {
            $this->warn('Failed to write WebP: ' . $this->relativePath($target));

            return null;
        }

        return filesize($target) ?: null;
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
