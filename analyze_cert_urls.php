<?php
/**
 * Cross-page certification URL comparison analysis.
 * Reads seeder data files and generates a comparison report.
 */

// ── Load all data sources ──────────────────────────────────────────────

$base = __DIR__;

// 1. /online-courses/ — 35 cards
$onlineCourses = require "$base/database/seeders/data/online_courses_cards.php";

// 2. /all-courses/ — ~45 cards
$allCourses = require "$base/database/seeders/data/all_courses_cards.php";

// 3. /certifications-for-professionals/ — ~50 cards
$certForPro = require "$base/database/seeders/data/certifications_for_professionals_cards.php";

// 4. /aapscm-training/ — ~36 cards
$aapscmTraining = require "$base/database/seeders/data/aapscm_training_cards.php";

// 5. /home/ — certs JSON
$homeCerts = json_decode(file_get_contents("$base/database/seeders/data/home_certs.json"), true);

// ── Normalize abbreviation extraction ──────────────────────────────────

function extractAbbrev(string $title): string {
    // Try to find abbreviation in parentheses at end: "... (ACPP)®" or "(AC-DPA)®"
    if (preg_match('/\(([A-Z][A-Z0-9 -]+)\)\s*[®]*\s*$/', $title, $m)) {
        return trim(str_replace(' ', '', $m[1]));
    }
    // Try abbreviated titles like "CSAI-M®" at end
    if (preg_match('/([A-Z][A-Z0-9-]+)[®]*\s*$/', $title, $m)) {
        return trim($m[1]);
    }
    // Try to find abbreviation preceded by dash: "... – AC-SCAI®"
    if (preg_match('/[–-]\s*([A-Z][A-Z0-9-]+)[®]*\s*$/', $title, $m)) {
        return trim($m[1]);
    }
    return '';
}

function normalizeUrl(string $url): string {
    // Strip protocol and domain
    $path = preg_replace('#^https?://[^/]+#', '', $url);
    // Strip trailing encoded spaces
    $path = rtrim($path, " \t\n\r\0\x0B%20");
    // Ensure trailing slash (if no fragment)
    if (strpos($path, '#') === false && substr($path, -1) !== '/') {
        $path .= '/';
    }
    // Strip fragment for comparison
    $pathNoFrag = preg_replace('/#.*$/', '', $path);
    if (substr($pathNoFrag, -1) !== '/') $pathNoFrag .= '/';
    return $pathNoFrag;
}

// ── Build master list ──────────────────────────────────────────────────

$master = []; // abbrev => ['title' => ..., 'pages' => ['page_name' => ['url' => ..., 'url_type' => ...]]]

// online-courses
foreach ($onlineCourses as $card) {
    $abbrev = trim(str_replace(['®', ' '], '', $card['abbrev'] ?? ''));
    if (!$abbrev) continue;
    $master[$abbrev]['title'] = $card['title'] ?? '';
    $master[$abbrev]['pages']['online-courses'] = [
        'raw_url' => $card['member_href'] ?? '',
        'norm_url' => normalizeUrl($card['member_href'] ?? ''),
        'url_type' => 'cert-page (member buy link)',
    ];
}

// all-courses
foreach ($allCourses as $card) {
    $abbrev = extractAbbrev($card['title'] ?? '');
    if (!$abbrev) continue;
    if (!isset($master[$abbrev])) $master[$abbrev] = ['title' => $card['title'], 'pages' => []];
    $master[$abbrev]['pages']['all-courses'] = [
        'raw_url' => $card['href'] ?? '',
        'norm_url' => normalizeUrl($card['href'] ?? ''),
        'url_type' => 'course page (/course/...)',
    ];
}

// certifications-for-professionals
foreach ($certForPro as $card) {
    $abbrev = extractAbbrev($card['title'] ?? '');
    if (!$abbrev) continue;
    if (!isset($master[$abbrev])) $master[$abbrev] = ['title' => $card['title'], 'pages' => []];
    $master[$abbrev]['pages']['cert-for-pro'] = [
        'raw_url' => $card['href'] ?? '',
        'norm_url' => normalizeUrl($card['href'] ?? ''),
        'url_type' => 'cert detail page',
    ];
}

// aapscm-training
foreach ($aapscmTraining as $card) {
    // Extract cert name from "Instructor-led virtual training - Cert Name (ABBREV)®"
    $cleanTitle = preg_replace('/^Instructor-led virtual training\s*-?\s*/i', '', $card['title'] ?? '');
    $cleanTitle = preg_replace('/^AAPSCM® Training Virtual\s*-?\s*/i', '', $cleanTitle);
    $abbrev = extractAbbrev($cleanTitle);
    if (!$abbrev) continue;
    if (!isset($master[$abbrev])) $master[$abbrev] = ['title' => $cleanTitle, 'pages' => []];
    $master[$abbrev]['pages']['aapscm-training'] = [
        'raw_url' => $card['href'] ?? '',
        'norm_url' => normalizeUrl($card['href'] ?? ''),
        'url_type' => 'training virtual page',
    ];
}

// home
foreach ($homeCerts as $card) {
    $abbrev = extractAbbrev($card['title'] ?? '');
    if (!$abbrev) continue;
    if (!isset($master[$abbrev])) $master[$abbrev] = ['title' => $card['title'], 'pages' => []];
    $master[$abbrev]['pages']['home'] = [
        'raw_url' => $card['href'] ?? '',
        'norm_url' => normalizeUrl($card['href'] ?? ''),
        'url_type' => 'cert detail page (homepage card)',
    ];
}

ksort($master);

// ── Generate report ────────────────────────────────────────────────────

$report = "# Certification URL Cross-Page Comparison Report\n";
$report .= "Generated: " . date('Y-m-d H:i') . "\n\n";
$report .= "## Data Sources\n\n";
$report .= "| Page | Data File | Card Count |\n";
$report .= "|------|-----------|------------|\n";
$report .= "| /online-courses/ | online_courses_cards.php | " . count($onlineCourses) . " |\n";
$report .= "| /all-courses/ | all_courses_cards.php | " . count($allCourses) . " |\n";
$report .= "| /certifications-for-professionals/ | certifications_for_professionals_cards.php | " . count($certForPro) . " |\n";
$report .= "| /aapscm-training/ | aapscm_training_cards.php | " . count($aapscmTraining) . " |\n";
$report .= "| /home/ | home_certs.json | " . count($homeCerts) . " |\n\n";

$report .= "---\n\n";

// ── Summary stats ──────────────────────────────────────────────────────
$totalCerts = count($master);
$onAll5 = 0; $onAll4 = 0; $urlMismatches = 0;
$uniqueByPage = ['online-courses'=>0, 'all-courses'=>0, 'cert-for-pro'=>0, 'aapscm-training'=>0, 'home'=>0];

foreach ($master as $abbrev => $info) {
    $pageCount = count($info['pages']);
    if ($pageCount === 5) $onAll5++;
    if ($pageCount >= 4) $onAll4++;
    if ($pageCount === 1) {
        $pageKey = array_key_first($info['pages']);
        $uniqueByPage[$pageKey]++;
    }
    
    // Check URL mismatches between cert-for-pro and home (should be same cert detail pages)
    $certUrl = $info['pages']['cert-for-pro']['norm_url'] ?? null;
    $homeUrl = $info['pages']['home']['norm_url'] ?? null;
    if ($certUrl && $homeUrl && $certUrl !== $homeUrl) {
        $urlMismatches++;
    }
}

$report .= "## Summary\n\n";
$report .= "| Metric | Value |\n";
$report .= "|--------|-------|\n";
$report .= "| Total unique certifications (by abbreviation) | $totalCerts |\n";
$report .= "| Present on all 5 pages | $onAll5 |\n";
$report .= "| Present on 4+ pages | $onAll4 |\n";
$report .= "| URL mismatches (cert-for-pro vs home) | $urlMismatches |\n";
foreach ($uniqueByPage as $pg => $cnt) {
    if ($cnt > 0) $report .= "| Unique to /$pg/ only | $cnt |\n";
}
$report .= "\n---\n\n";

// ── Section 1: Presence Matrix ─────────────────────────────────────────

$report .= "## 1. Certification Presence Matrix\n\n";
$report .= "| # | Abbreviation | online-courses | all-courses | cert-for-pro | aapscm-training | home |\n";
$report .= "|---|-------------|:-:|:-:|:-:|:-:|:-:|\n";

$i = 1;
foreach ($master as $abbrev => $info) {
    $oc  = isset($info['pages']['online-courses'])    ? '✅' : '❌';
    $ac  = isset($info['pages']['all-courses'])        ? '✅' : '❌';
    $cfp = isset($info['pages']['cert-for-pro'])       ? '✅' : '❌';
    $at  = isset($info['pages']['aapscm-training'])    ? '✅' : '❌';
    $hm  = isset($info['pages']['home'])               ? '✅' : '❌';
    $report .= "| $i | $abbrev | $oc | $ac | $cfp | $at | $hm |\n";
    $i++;
}

$report .= "\n---\n\n";

// ── Section 2: URL Comparison (cert detail pages) ──────────────────────

$report .= "## 2. URL Comparison — Cert Detail Pages\n\n";
$report .= "Comparing the **cert detail page URL** used on `/certifications-for-professionals/` vs `/home/` vs `/online-courses/`.\n\n";
$report .= "These should ideally point to the same canonical cert detail page.\n\n";

$report .= "| # | Abbrev | cert-for-pro URL | home URL | online-courses URL | Match? |\n";
$report .= "|---|--------|-----------------|----------|--------------------|--------|\n";

$i = 1;
foreach ($master as $abbrev => $info) {
    $cfpUrl = $info['pages']['cert-for-pro']['norm_url'] ?? '—';
    $hmUrl  = $info['pages']['home']['norm_url'] ?? '—';
    $ocUrl  = $info['pages']['online-courses']['norm_url'] ?? '—';
    
    // Compare non-dash values
    $urls = array_filter([$cfpUrl, $hmUrl, $ocUrl], fn($u) => $u !== '—');
    if (count($urls) <= 1) {
        $match = '—';
    } else {
        $uniqueUrls = array_unique($urls);
        $match = count($uniqueUrls) === 1 ? '✅ SAME' : '⚠️ DIFFERENT';
    }
    
    $report .= "| $i | $abbrev | `$cfpUrl` | `$hmUrl` | `$ocUrl` | $match |\n";
    $i++;
}

$report .= "\n---\n\n";

// ── Section 3: all-courses URLs (course pages) ────────────────────────

$report .= "## 3. URL Comparison — /all-courses/ uses `/course/` prefix URLs\n\n";
$report .= "The `/all-courses/` page links to `/course/{slug}/` pages (WP course CPT URLs).\n";
$report .= "These are DIFFERENT from cert detail pages and may need redirects.\n\n";

$report .= "| # | Abbrev | all-courses URL (course page) | cert-for-pro URL (cert page) | Same base slug? |\n";
$report .= "|---|--------|------------------------------|------------------------------|------------------|\n";

$i = 1;
foreach ($master as $abbrev => $info) {
    $acUrl  = $info['pages']['all-courses']['norm_url'] ?? null;
    $cfpUrl = $info['pages']['cert-for-pro']['norm_url'] ?? null;
    
    if (!$acUrl) continue;
    
    $cfpDisplay = $cfpUrl ?? '—';
    
    if ($cfpUrl && $acUrl) {
        // Extract slugs
        $acSlug = trim(preg_replace('#^/course/#', '', $acUrl), '/');
        $cfpSlug = trim($cfpUrl, '/');
        $sameBase = ($acSlug === $cfpSlug) ? '✅ Yes' : '❌ No';
    } else {
        $sameBase = '—';
    }
    
    $report .= "| $i | $abbrev | `$acUrl` | `$cfpDisplay` | $sameBase |\n";
    $i++;
}

$report .= "\n---\n\n";

// ── Section 4: Broken/problematic URLs ─────────────────────────────────

$report .= "## 4. Potentially Broken or Problematic URLs\n\n";
$report .= "URLs with encoded spaces `%20`, hash-only targets, or missing trailing slashes.\n\n";

$report .= "| # | Abbrev | Page | Raw URL | Issue |\n";
$report .= "|---|--------|------|---------|-------|\n";

$i = 1;
foreach ($master as $abbrev => $info) {
    foreach ($info['pages'] as $pageName => $pageData) {
        $raw = $pageData['raw_url'];
        $issues = [];
        
        if (strpos($raw, '%20') !== false) $issues[] = 'Contains encoded spaces (%20)';
        if ($raw === '#') $issues[] = 'Placeholder URL (#)';
        if (preg_match('#/\s+$#', $raw)) $issues[] = 'Trailing whitespace in URL';
        if (preg_match('#/%20+$#', urldecode($raw))) $issues[] = 'Trailing encoded spaces';
        if (preg_match('#[®]#u', $raw)) $issues[] = 'Contains ® symbol in URL';
        
        foreach ($issues as $issue) {
            $report .= "| $i | $abbrev | $pageName | `$raw` | $issue |\n";
            $i++;
        }
    }
}

$report .= "\n---\n\n";

// ── Section 5: Unique to single page ───────────────────────────────────

$report .= "## 5. Certifications Unique to a Single Page\n\n";
$report .= "These certifications appear on only ONE of the five pages.\n\n";

$report .= "| # | Abbreviation | Title | Only On | URL |\n";
$report .= "|---|-------------|-------|---------|-----|\n";

$i = 1;
foreach ($master as $abbrev => $info) {
    if (count($info['pages']) === 1) {
        $pageName = array_key_first($info['pages']);
        $url = $info['pages'][$pageName]['raw_url'] ?? '';
        $title = $info['title'] ?? '';
        $report .= "| $i | $abbrev | $title | $pageName | `$url` |\n";
        $i++;
    }
}

$report .= "\n---\n\n";

// ── Section 6: Full URL Detail Dump ────────────────────────────────────

$report .= "## 6. Full Detail — All Certifications With All URLs\n\n";

$i = 1;
foreach ($master as $abbrev => $info) {
    $report .= "### $i. $abbrev — " . ($info['title'] ?? '') . "\n\n";
    $report .= "| Page | URL Type | Raw URL |\n";
    $report .= "|------|----------|--------|\n";
    foreach ($info['pages'] as $pageName => $pageData) {
        $report .= "| $pageName | {$pageData['url_type']} | `{$pageData['raw_url']}` |\n";
    }
    $report .= "\n";
    $i++;
}

// ── Write report ───────────────────────────────────────────────────────

$outPath = 'D:/Personal Work/Sitemap Analysis/certification-url-cross-page-comparison.md';
file_put_contents($outPath, $report);
echo "Report written to: $outPath\n";
echo "Total certifications analysed: $totalCerts\n";
echo "Report size: " . strlen($report) . " bytes\n";