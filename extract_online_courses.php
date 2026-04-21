<?php
$html = file_get_contents('D:/Personal Work/Live Pages HTML/online-courses.html');
$pageStart = strpos($html, 'data-elementor-type="wp-page"');
$footerStart = strpos($html, 'elementor-location-footer', $pageStart);
$content = substr($html, $pageStart, $footerStart - $pageStart);

// Find h2 product abbreviations
preg_match_all('/<h2[^>]*class="elementor-heading-title[^"]*"[^>]*>\s*(.*?)\s*<\/h2>/s', $content, $h2s, PREG_OFFSET_CAPTURE);

$abbrevPositions = [];
foreach ($h2s[0] as $i => $match) {
    $text = trim(strip_tags($h2s[1][$i][0]));
    if (strlen($text) < 40 && preg_match('/[A-Z]/', $text) && strpos($text, "\xc2\xae") !== false) {
        $abbrevPositions[] = ['abbrev' => $text, 'offset' => $match[1]];
    }
}

$cards = [];
for ($i = 0; $i < count($abbrevPositions); $i++) {
    $start = $abbrevPositions[$i]['offset'];
    $end = ($i + 1 < count($abbrevPositions)) ? $abbrevPositions[$i + 1]['offset'] : strlen($content);
    $section = substr($content, $start, $end - $start);
    $abbrev = $abbrevPositions[$i]['abbrev'];
    
    // Title: first <h4> or <p> with elementor-heading-title that is NOT the abbreviation
    // and NOT hidden (skip elementor-hidden-*)
    $title = '';
    // Match visible heading widgets only
    preg_match_all('/<div class="elementor-element[^"]*"(?:(?!elementor-hidden).)*?widget_type="heading\.default".*?<(?:h4|p)[^>]*class="elementor-heading-title[^"]*"[^>]*>\s*(.*?)\s*<\/(?:h4|p)>/s', $section, $headings);
    foreach ($headings[1] as $h) {
        $t = trim(preg_replace('/\s+/', ' ', strip_tags($h)));
        if ($t && $t !== $abbrev && strlen($t) > 10 && !str_contains($t, 'Authorized On-demand') && !str_contains($t, 'Self-Paced Exam Prep')) {
            $title = $t;
            break;
        }
    }
    
    // Fallback: try any heading-title that is long enough
    if (!$title) {
        preg_match_all('/<(?:h[2-6]|p)[^>]*class="elementor-heading-title[^"]*"[^>]*>\s*(.*?)\s*<\/(?:h[2-6]|p)>/s', $section, $fallbackHeadings);
        foreach ($fallbackHeadings[1] as $h) {
            $t = trim(preg_replace('/\s+/', ' ', strip_tags($h)));
            if ($t && $t !== $abbrev && strlen($t) > 15) {
                $title = $t;
                break;
            }
        }
    }
    
    // Prices
    $memberPrice = '';
    $nonMemberPrice = '';
    if (preg_match('/Members:<\/div>\s*\$([\d,.]+)/', $section, $pm)) $memberPrice = $pm[1];
    if (preg_match('/Non-Members:<\/div>\s*\$([\d,.]+)/', $section, $pnm)) $nonMemberPrice = $pnm[1];
    
    // Button links
    $memberHref = '';
    $nonMemberHref = '';
    if (preg_match_all('/<a[^>]+href="([^"]+)"[^>]*>.*?<span[^>]*class="elementor-button-text"[^>]*>(.*?)<\/span>/s', $section, $btnMatches, PREG_SET_ORDER)) {
        foreach ($btnMatches as $btn) {
            $btnText = trim(strip_tags($btn[2]));
            if ($btnText === 'Members' && !$memberHref) $memberHref = $btn[1];
            elseif ($btnText === 'Non-Members' && !$nonMemberHref) $nonMemberHref = $btn[1];
        }
    }
    
    $cards[] = [
        'abbrev' => $abbrev,
        'title' => html_entity_decode($title, ENT_QUOTES | ENT_HTML5, 'UTF-8'),
        'member_price' => $memberPrice,
        'non_member_price' => $nonMemberPrice,
        'member_href' => $memberHref,
        'non_member_href' => $nonMemberHref,
    ];
}

// Write to data file
$output = "<?php\n\n// Auto-generated from online-courses.html\n// 35 exam/course products with pricing and links.\n\nreturn " . var_export($cards, true) . ";\n";
file_put_contents('database/seeders/data/online_courses_cards.php', $output);

echo "Total: " . count($cards) . " cards\n\n";
$missing = 0;
foreach ($cards as $i => $c) {
    $flag = $c['title'] ? '' : ' *** MISSING TITLE';
    echo "$i: {$c['abbrev']} | {$c['title']}{$flag}\n";
    if (!$c['title']) $missing++;
}
echo "\nMissing titles: $missing\n";