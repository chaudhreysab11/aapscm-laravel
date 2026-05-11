<?php

declare(strict_types=1);

namespace App\Support\Migration;

use SplFileObject;

class WordPressProductSlugReviewer
{
    /**
     * @return array{
     *     slug_map_rows: int,
     *     newly_approved_count: int,
     *     approved_count: int,
     *     still_needs_review_count: int,
     *     suspicious_rows_count: int,
     *     blank_slug_rows_count: int,
     *     skipped_reasons: array<string, int>,
     *     suspicious_rows: list<array<string, mixed>>,
     *     blank_slug_rows: list<array<string, mixed>>
     * }
     */
    public function review(string $productsPath, string $slugMapPath, string $reviewPath, bool $writeSlugMap = true): array
    {
        $productsPath = $this->resolvePath($productsPath);
        $slugMapPath = $this->resolvePath($slugMapPath);
        $reviewPath = $this->resolvePath($reviewPath);

        $productRows = $this->readCsv($productsPath);
        $slugMapRows = $this->readCsv($slugMapPath);
        $productsBySourceId = [];

        foreach ($productRows['rows'] as $row) {
            $sourceId = $this->sourceId($row['ID'] ?? null);

            if ($sourceId !== 0) {
                $productsBySourceId[$sourceId] = $row;
            }
        }

        $slugCounts = $this->slugCounts($slugMapRows['rows']);
        $newlyApproved = 0;
        $suspiciousRows = [];
        $blankSlugRows = [];
        $skippedReasons = [];

        foreach ($slugMapRows['rows'] as &$row) {
            $status = strtolower(trim((string) ($row['status'] ?? '')));

            if ($status !== 'needs_review') {
                continue;
            }

            $sourceId = $this->sourceId($row['wp_product_id'] ?? null);
            $slug = trim((string) ($row['proposed_slug'] ?? ''));
            $reasons = $this->reviewReasons($row, $productsBySourceId[$sourceId] ?? null, $slugCounts);

            if ($slug === '') {
                $blankSlugRows[] = $this->reviewRow($row, $reasons);
            }

            if ($reasons === []) {
                $row['status'] = 'approved';
                $row['notes'] = 'Auto-approved by final controlled product review; no suspicious slug signals detected.';
                $newlyApproved++;

                continue;
            }

            $suspiciousRows[] = $this->reviewRow($row, $reasons);

            foreach ($reasons as $reason) {
                $skippedReasons[$reason] = ($skippedReasons[$reason] ?? 0) + 1;
            }
        }
        unset($row);

        if ($writeSlugMap) {
            $this->writeCsv($slugMapPath, $slugMapRows['headers'], $slugMapRows['rows']);
        }

        $approvedCount = collect($slugMapRows['rows'])
            ->filter(fn (array $row): bool => in_array(strtolower(trim((string) ($row['status'] ?? ''))), ['approved', 'confirmed'], true))
            ->count();
        $stillNeedsReviewCount = collect($slugMapRows['rows'])
            ->filter(fn (array $row): bool => strtolower(trim((string) ($row['status'] ?? ''))) === 'needs_review')
            ->count();

        ksort($skippedReasons);

        $summary = [
            'slug_map_rows' => count($slugMapRows['rows']),
            'newly_approved_count' => $newlyApproved,
            'approved_count' => $approvedCount,
            'still_needs_review_count' => $stillNeedsReviewCount,
            'suspicious_rows_count' => count($suspiciousRows),
            'blank_slug_rows_count' => count($blankSlugRows),
            'skipped_reasons' => $skippedReasons,
            'suspicious_rows' => $suspiciousRows,
            'blank_slug_rows' => $blankSlugRows,
        ];

        $this->writeReviewDocument($reviewPath, $summary);

        return $summary;
    }

    /** @param array<string, mixed> $mapRow @param array<string, mixed>|null $productRow @param array<string, int> $slugCounts @return list<string> */
    private function reviewReasons(array $mapRow, ?array $productRow, array $slugCounts): array
    {
        $reasons = [];
        $slug = trim((string) ($mapRow['proposed_slug'] ?? ''));
        $name = trim((string) ($productRow['Name'] ?? $mapRow['wp_product_name'] ?? ''));
        $slugLower = strtolower($slug);
        $nameLower = strtolower($name);

        if ($slug === '') {
            $reasons[] = 'missing_slug';

            return $reasons;
        }

        if (preg_match('/%[0-9a-f]{2}|%|&[a-z]+;|\+|_/i', $slug) === 1) {
            $reasons[] = 'encoded_or_noncanonical_slug';
        }

        if (! preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $slug)) {
            $reasons[] = 'invalid_slug_format';
        }

        if (($slugCounts[$slug] ?? 0) > 1) {
            $reasons[] = 'duplicate_proposed_slug';
        }

        if (preg_match('/\b(copy|duplicate)\b/i', $name . ' ' . $slug) === 1) {
            $reasons[] = 'copy_or_duplicate_name';
        }

        if (preg_match('/^(sale|new)-|\b(sale!|new!)\b/i', $slugLower . ' ' . $nameLower) === 1) {
            $reasons[] = 'promotional_sale_or_new_prefix';
        }

        if (preg_match('/\b(non[- ]?members?|members)\b/i', $name . ' ' . $slug) === 1) {
            $reasons[] = 'member_nonmember_variant';
        }

        if (preg_match('/\b(jan|feb|mar|apr|may|jun|jul|july|aug|sep|sept|oct|nov|dec)\b|\b20\d{2}\b|\b\d{1,2}\s*-\s*\d{1,2}\b/i', $name) === 1) {
            $reasons[] = 'dated_session_or_cohort_product';
        }

        if (preg_match('/\bchapter\b|\bjoin a charter\b/i', $nameLower . ' ' . $slugLower) === 1) {
            $reasons[] = 'ambiguous_chapter_or_charter_product';
        }

        if ($productRow !== null && preg_match('/\b(variable|grouped|external)\b/i', (string) ($productRow['Type'] ?? '')) === 1) {
            $reasons[] = 'ambiguous_woocommerce_product_type';
        }

        if (str_contains($nameLower, 'chartered') && str_starts_with($slugLower, 'american-certified')) {
            $reasons[] = 'credential_family_mismatch';
        }

        if (str_contains($nameLower, 'american certified') && str_starts_with($slugLower, 'chartered')) {
            $reasons[] = 'credential_family_mismatch';
        }

        if ($this->hasWeakNameSlugOverlap($name, $slug)) {
            $reasons[] = 'weak_name_slug_overlap';
        }

        return array_values(array_unique($reasons));
    }

    private function hasWeakNameSlugOverlap(string $name, string $slug): bool
    {
        $nameTokens = $this->meaningfulTokens($name);
        $slugTokens = $this->meaningfulTokens(str_replace('-', ' ', $slug));

        if (count($nameTokens) < 2 || count($slugTokens) < 2) {
            return false;
        }

        $overlap = count(array_intersect($nameTokens, $slugTokens));

        return $overlap === 0;
    }

    /** @return list<string> */
    private function meaningfulTokens(string $value): array
    {
        $normalized = strtolower((string) preg_replace('/[^a-z0-9]+/i', ' ', $value));
        $tokens = array_filter(explode(' ', $normalized), fn (string $token): bool => strlen($token) > 2);
        $stopWords = array_flip([
            'aapscm', 'the', 'and', 'for', 'with', 'fee', 'fees', 'exam', 'prep', 'authorized', 'online',
            'self', 'paced', 'training', 'virtual', 'members', 'member', 'non', 'professional', 'certified',
            'chartered', 'american', 'course', 'courses', 'payment', 'full', 'weekly', 'instructor', 'led',
        ]);

        return array_values(array_unique(array_filter(
            $tokens,
            fn (string $token): bool => ! isset($stopWords[$token]),
        )));
    }

    /** @param list<array<string, mixed>> $rows @return array<string, int> */
    private function slugCounts(array $rows): array
    {
        $counts = [];

        foreach ($rows as $row) {
            $slug = trim((string) ($row['proposed_slug'] ?? ''));

            if ($slug !== '') {
                $counts[$slug] = ($counts[$slug] ?? 0) + 1;
            }
        }

        return $counts;
    }

    /** @param array<string, mixed> $row @param list<string> $reasons @return array<string, mixed> */
    private function reviewRow(array $row, array $reasons): array
    {
        return [
            'wp_product_id' => (string) ($row['wp_product_id'] ?? ''),
            'wp_product_name' => (string) ($row['wp_product_name'] ?? ''),
            'proposed_slug' => (string) ($row['proposed_slug'] ?? ''),
            'reasons' => $reasons,
        ];
    }

    /** @param array<string, mixed> $summary */
    private function writeReviewDocument(string $path, array $summary): void
    {
        $directory = dirname($path);

        if (! is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        $lines = [
            '# WordPress Product Final Review',
            '',
            'Generated by `wp:review-product-slugs`.',
            '',
            '## Summary',
            '',
            '- Slug map rows: ' . $summary['slug_map_rows'],
            '- Newly approved rows: ' . $summary['newly_approved_count'],
            '- Approved or confirmed rows: ' . $summary['approved_count'],
            '- Still needs review: ' . $summary['still_needs_review_count'],
            '- Suspicious rows: ' . $summary['suspicious_rows_count'],
            '- Blank slug rows: ' . $summary['blank_slug_rows_count'],
            '',
            '## Reasons For Skipped Rows',
            '',
        ];

        if ($summary['skipped_reasons'] === []) {
            $lines[] = '- None';
        } else {
            foreach ($summary['skipped_reasons'] as $reason => $count) {
                $lines[] = "- {$reason}: {$count}";
            }
        }

        $lines = array_merge($lines, ['', '## Suspicious Rows', '']);

        if ($summary['suspicious_rows'] === []) {
            $lines[] = '- None';
        } else {
            foreach ($summary['suspicious_rows'] as $row) {
                $lines[] = '- WP ' . $row['wp_product_id'] . ' | ' . $row['wp_product_name'] . ' | `' . $row['proposed_slug'] . '` | ' . implode(', ', $row['reasons']);
            }
        }

        $lines = array_merge($lines, ['', '## Blank Slug Rows', '']);

        if ($summary['blank_slug_rows'] === []) {
            $lines[] = '- None';
        } else {
            foreach ($summary['blank_slug_rows'] as $row) {
                $lines[] = '- WP ' . $row['wp_product_id'] . ' | ' . $row['wp_product_name'] . ' | ' . implode(', ', $row['reasons']);
            }
        }

        file_put_contents($path, implode(PHP_EOL, $lines) . PHP_EOL);
    }

    /** @return array{headers: list<string>, rows: list<array<string, mixed>>} */
    private function readCsv(string $path): array
    {
        if (! is_file($path)) {
            return ['headers' => [], 'rows' => []];
        }

        $file = new SplFileObject($path, 'r');
        $file->setFlags(SplFileObject::READ_CSV | SplFileObject::SKIP_EMPTY);
        $headers = [];
        $rows = [];

        foreach ($file as $index => $row) {
            if (! is_array($row) || $row === [null]) {
                continue;
            }

            $values = array_map(fn (mixed $value): string => trim((string) $value), $row);

            if ($headers === []) {
                if (isset($values[0])) {
                    $values[0] = preg_replace('/^\xEF\xBB\xBF/', '', $values[0]) ?? $values[0];
                }

                $headers = $values;

                continue;
            }

            $values = array_pad($values, count($headers), '');
            $combined = array_combine($headers, array_slice($values, 0, count($headers)));

            if ($combined === false) {
                continue;
            }

            $combined['_source_row_number'] = $index + 1;
            $rows[] = $combined;
        }

        return ['headers' => $headers, 'rows' => $rows];
    }

    /** @param list<string> $headers @param list<array<string, mixed>> $rows */
    private function writeCsv(string $path, array $headers, array $rows): void
    {
        $handle = fopen($path, 'w');

        if ($handle === false) {
            throw new \RuntimeException("Unable to write slug map CSV at {$path}.");
        }

        fputcsv($handle, $headers);

        foreach ($rows as $row) {
            fputcsv($handle, array_map(
                fn (string $header): string => (string) ($row[$header] ?? ''),
                $headers,
            ));
        }

        fclose($handle);
    }

    private function sourceId(mixed $value): int
    {
        $value = trim((string) $value);

        return ctype_digit($value) ? (int) $value : 0;
    }

    private function resolvePath(string $path): string
    {
        if (str_starts_with($path, '/') || preg_match('#^[A-Za-z]:[\\/]#', $path) === 1) {
            return $path;
        }

        return base_path($path);
    }
}
