<?php
$html = file_get_contents('https://aapscm.org/about-us/', false, stream_context_create([
    'ssl' => ['verify_peer' => false, 'verify_peer_name' => false],
]));

// Find all data-elementor-type attributes
preg_match_all('/data-elementor-type="([^"]+)"/', $html, $m);
echo 'data-elementor-type values:' . PHP_EOL;
print_r(array_unique($m[1]));

// Find all data-elementor-post-type attributes
preg_match_all('/data-elementor-post-type="([^"]+)"/', $html, $m2);
echo PHP_EOL . 'data-elementor-post-type values:' . PHP_EOL;
print_r(array_unique($m2[1]));

// Find elementor divs with data-elementor-id
preg_match_all('/<div[^>]+data-elementor-id="(\d+)"[^>]*data-elementor-type="([^"]+)"/', $html, $m3);
echo PHP_EOL . 'elementor instances (id => type):' . PHP_EOL;
for ($i = 0; $i < count($m3[0]); $i++) {
    echo '  ID ' . $m3[1][$i] . ' type=' . $m3[2][$i] . PHP_EOL;
}
