<?php

declare(strict_types=1);

final class ElementorMirrorPageGenerator
{
    private string $projectRoot;
    private string $slug;
    private string $url;
    private string $outputFile;

    /** @var string[] */
    private array $warnings = [];

    public function __construct(private readonly array $options)
    {
        $this->projectRoot = dirname(__DIR__);
        $this->slug = $this->requireOption('slug');
        $this->url = $this->requireOption('url');
        $this->outputFile = $this->resolveProjectPath($this->requireOption('output'));
    }

    public function generate(): array
    {
        $html = $this->fetch($this->url);
        $document = $this->loadDocument($html);
        $xpath = new DOMXPath($document);
        $root = $xpath->query("//div[@data-elementor-type='wp-page']")->item(0);

        if (! $root instanceof DOMElement) {
            throw new RuntimeException('Could not locate the Elementor page root.');
        }

        $this->downloadHtmlUploadsAssets($xpath, $root);

        $pageId = trim($root->getAttribute('data-elementor-id'));

        if ($pageId === '') {
            throw new RuntimeException('The Elementor page root is missing data-elementor-id.');
        }

        [$cssFiles, $externalCssFiles] = $this->downloadStylesheets($xpath, $pageId);

        $payload = [
            'title' => $this->extractTitle($xpath),
            'meta_description' => $this->extractMetaDescription($xpath),
            'root' => [
                'tag' => strtolower($root->tagName),
                'class' => trim($root->getAttribute('class')),
                'data_elementor_type' => trim($root->getAttribute('data-elementor-type')),
                'data_elementor_id' => $pageId,
            ],
            'counts' => $this->buildCounts($xpath, $root),
            'css_files' => $cssFiles,
            'external_css_files' => $externalCssFiles,
            'body_html' => $this->innerHtml($root),
        ];

        $this->writePayload($payload);

        return [
            'slug' => $this->slug,
            'url' => $this->url,
            'output' => $this->outputFile,
            'page_id' => $pageId,
            'css_files' => count($cssFiles),
            'external_css_files' => count($externalCssFiles),
            'warnings' => $this->warnings,
        ];
    }

    private function requireOption(string $name): string
    {
        $value = $this->options[$name] ?? null;

        if (! is_string($value) || trim($value) === '') {
            throw new InvalidArgumentException("Missing required option --{$name}.");
        }

        return trim($value);
    }

    private function fetch(string $url): string
    {
        $context = stream_context_create([
            'http' => [
                'follow_location' => 1,
                'ignore_errors' => true,
                'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) GitHub-Copilot-Mirror/1.0\r\n",
                'timeout' => 60,
            ],
            'ssl' => [
                'verify_peer' => true,
                'verify_peer_name' => true,
            ],
        ]);

        $contents = @file_get_contents($url, false, $context);
        $headers = is_array($http_response_header ?? null) ? $http_response_header : [];
        $statusLine = '';

        for ($index = count($headers) - 1; $index >= 0; $index--) {
            if (preg_match('~^HTTP/\S+\s+\d{3}\b~', $headers[$index]) === 1) {
                $statusLine = $headers[$index];
                break;
            }
        }

        if (! is_string($contents) || $contents === '') {
            throw new RuntimeException("Failed to download {$url}.");
        }

        if (! preg_match('~\s(2\d\d)\s~', $statusLine)) {
            throw new RuntimeException("Unexpected response while downloading {$url}: {$statusLine}");
        }

        return $contents;
    }

    private function loadDocument(string $html): DOMDocument
    {
        $document = new DOMDocument();
        libxml_use_internal_errors(true);
        $document->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();

        return $document;
    }

    private function extractTitle(DOMXPath $xpath): string
    {
        $node = $xpath->query('//head/title')->item(0);

        return trim($node?->textContent ?? '');
    }

    private function extractMetaDescription(DOMXPath $xpath): string
    {
        $node = $xpath->query("//head/meta[translate(@name, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz')='description']")->item(0);

        return trim($node?->attributes?->getNamedItem('content')?->nodeValue ?? '');
    }

    /** @return array{0: string[], 1: string[]} */
    private function downloadStylesheets(DOMXPath $xpath, string $pageId): array
    {
        $cssFiles = [];
        $externalCssFiles = [];
        $seen = [];

        foreach ($xpath->query('//head/link[contains(@rel, "stylesheet")]') ?: [] as $link) {
            if (! $link instanceof DOMElement) {
                continue;
            }

            $href = html_entity_decode(trim($link->getAttribute('href')));

            if ($href === '' || isset($seen[$href])) {
                continue;
            }

            $seen[$href] = true;

            if (! $this->isAapscmUrl($href)) {
                $externalCssFiles[] = $href;
                continue;
            }

            $cssFiles[] = $this->downloadStylesheet($href, $pageId);
        }

        return [$cssFiles, $externalCssFiles];
    }

    private function downloadStylesheet(string $url, string $pageId): string
    {
        $path = $this->urlPath($url);

        if ($path === null) {
            throw new RuntimeException("Stylesheet URL is missing a path: {$url}");
        }

        $isPageSpecific = preg_match("~/wp-content/uploads/elementor/css/post-{$pageId}\\.css$~", $path) === 1;
        $publicRelativePath = ($isPageSpecific ? "mirrors/{$this->slug}" : 'mirrors/shared') . $path;
        $destination = $this->resolveProjectPath('public/' . ltrim($publicRelativePath, '/'));

        if (! $isPageSpecific && is_file($destination)) {
            return ltrim(str_replace('\\', '/', $publicRelativePath), '/');
        }

        $css = $this->fetch($url);
        $rewritten = $this->rewriteCssUrls($css, $url, $isPageSpecific ? 'page' : 'shared');

        $this->ensureDirectory(dirname($destination));
        file_put_contents($destination, $rewritten);

        return ltrim(str_replace('\\', '/', $publicRelativePath), '/');
    }

    private function rewriteCssUrls(string $css, string $baseUrl, string $scope): string
    {
        return (string) preg_replace_callback(
            '~url\(([^)]+)\)~i',
            function (array $matches) use ($baseUrl, $scope): string {
                $raw = trim($matches[1], " \t\n\r\0\x0B\"'");

                if ($raw === '' || str_starts_with($raw, 'data:') || str_starts_with($raw, '#')) {
                    return $matches[0];
                }

                $resolved = $this->resolveUrl($baseUrl, $raw);

                if ($resolved === null) {
                    return $matches[0];
                }

                try {
                    if ($this->isUploadsUrl($resolved)) {
                        return 'url("' . $this->downloadUploadsAsset($resolved) . '")';
                    }

                    if ($this->isAapscmUrl($resolved)) {
                        return 'url("/' . $this->downloadMirrorAsset($resolved, $scope) . '")';
                    }
                } catch (Throwable $throwable) {
                    $this->warnings[] = $throwable->getMessage();

                    return 'url("' . $resolved . '")';
                }

                return 'url("' . $resolved . '")';
            },
            $css,
        );
    }

    private function downloadUploadsAsset(string $url): string
    {
        $path = $this->urlPath($url);

        if ($path === null || ! str_contains($path, '/wp-content/uploads/')) {
            throw new RuntimeException("Upload asset URL is invalid: {$url}");
        }

        $relative = ltrim(substr($path, strpos($path, '/wp-content/uploads/') + strlen('/wp-content/uploads/')), '/');
        $isPdf = preg_match('~\.pdf$~i', $relative) === 1;
        $storagePrefix = $isPdf ? 'cms-pdfs' : 'cms-images';
        $publicPrefix = $isPdf ? '/storage/cms-pdfs/' : '/storage/cms-images/';
        $destination = $this->resolveProjectPath("storage/app/public/{$storagePrefix}/{$relative}");

        if (! is_file($destination)) {
            $this->ensureDirectory(dirname($destination));

            try {
                file_put_contents($destination, $this->fetch($url));
            } catch (Throwable $throwable) {
                if (! $this->materializeUploadVariantFallback($url, $relative, $destination, $storagePrefix)) {
                    throw $throwable;
                }
            }
        }

        return $publicPrefix . str_replace('\\', '/', $relative);
    }

    private function materializeUploadVariantFallback(string $url, string $relative, string $destination, string $storagePrefix): bool
    {
        $directory = dirname($relative);
        $filename = basename($relative);

        if (! preg_match('~^(?<base>.+)-\d+x\d+(?<ext>\.[^.]+)$~', $filename, $matches)) {
            return false;
        }

        $originalRelative = ltrim(($directory === '.' ? '' : $directory . '/') . $matches['base'] . $matches['ext'], '/');
        $originalDestination = $this->resolveProjectPath("storage/app/public/{$storagePrefix}/{$originalRelative}");

        if (! is_file($originalDestination)) {
            $originalUrl = preg_replace('~-[0-9]+x[0-9]+(?=\.[^.]+$)~', '', $url);

            if (! is_string($originalUrl) || $originalUrl === $url) {
                return false;
            }

            try {
                $this->ensureDirectory(dirname($originalDestination));
                file_put_contents($originalDestination, $this->fetch($originalUrl));
            } catch (Throwable) {
                return false;
            }
        }

        return copy($originalDestination, $destination);
    }

    private function downloadHtmlUploadsAssets(DOMXPath $xpath, DOMElement $root): void
    {
        $seen = [];

        $this->downloadUploadsFromElement($root, $seen);

        foreach ($xpath->query('.//*', $root) ?: [] as $node) {
            if (! $node instanceof DOMElement) {
                continue;
            }

            $this->downloadUploadsFromElement($node, $seen);
        }
    }

    /** @param array<string, true> $seen */
    private function downloadUploadsFromElement(DOMElement $element, array &$seen): void
    {
        foreach ($element->attributes ?? [] as $attribute) {
            $value = html_entity_decode(trim($attribute->nodeValue ?? ''));

            if ($value === '') {
                continue;
            }

            foreach ($this->extractUploadsUrls($value) as $url) {
                if (isset($seen[$url])) {
                    continue;
                }

                $seen[$url] = true;

                try {
                    $this->downloadUploadsAsset($url);
                } catch (Throwable $throwable) {
                    $this->warnings[] = $throwable->getMessage();
                }
            }
        }
    }

    /** @return string[] */
    private function extractUploadsUrls(string $value): array
    {
        preg_match_all(
            '~https?://(?:www\.)?aapscm\.(?:org|com)/wp-content/uploads/[^\s"\'<>)]+~i',
            $value,
            $matches,
        );

        return array_values(array_unique($matches[0] ?? []));
    }

    private function downloadMirrorAsset(string $url, string $scope): string
    {
        $path = $this->urlPath($url);

        if ($path === null) {
            throw new RuntimeException("Mirror asset URL is invalid: {$url}");
        }

        $publicRelativePath = ($scope === 'shared' ? 'mirrors/shared' : "mirrors/{$this->slug}") . $path;
        $destination = $this->resolveProjectPath('public/' . ltrim($publicRelativePath, '/'));

        if (! is_file($destination)) {
            $this->ensureDirectory(dirname($destination));
            file_put_contents($destination, $this->fetch($url));
        }

        return ltrim(str_replace('\\', '/', $publicRelativePath), '/');
    }

    /** @return array<string, int> */
    private function buildCounts(DOMXPath $xpath, DOMElement $root): array
    {
        return [
            'sections' => $this->countQuery($xpath, './/*[self::section or contains(concat(" ", normalize-space(@class), " "), " e-con ") or contains(concat(" ", normalize-space(@class), " "), " elementor-section ")]', $root),
            'tables' => $this->countQuery($xpath, './/table', $root),
            'cards' => $this->countQuery($xpath, './/*[contains(concat(" ", normalize-space(@class), " "), " elementor-widget-image-box ") or contains(concat(" ", normalize-space(@class), " "), " elementor-widget-icon-box ")]', $root),
            'images' => $this->countQuery($xpath, './/img', $root),
            'pdfs' => $this->countQuery($xpath, './/a[contains(@href, ".pdf") or contains(@href, ".PDF")]', $root),
            'icon_lists' => $this->countQuery($xpath, './/*[contains(concat(" ", normalize-space(@class), " "), " elementor-widget-icon-list ")]', $root),
            'internal_links' => $this->countQuery($xpath, './/a[starts-with(@href, "/") or contains(@href, "aapscm.org") or contains(@href, "aapscm.com")]', $root),
        ];
    }

    private function countQuery(DOMXPath $xpath, string $query, DOMElement $root): int
    {
        return $xpath->query($query, $root)?->length ?? 0;
    }

    private function innerHtml(DOMNode $node): string
    {
        $html = '';

        foreach ($node->childNodes as $childNode) {
            $html .= $node->ownerDocument?->saveHTML($childNode) ?? '';
        }

        return $html;
    }

    private function writePayload(array $payload): void
    {
        $this->ensureDirectory(dirname($this->outputFile));

        $fileContents = "<?php\n\ndeclare(strict_types=1);\n\nreturn " . var_export($payload, true) . ";\n";
        file_put_contents($this->outputFile, $fileContents);
    }

    private function ensureDirectory(string $directory): void
    {
        if (! is_dir($directory) && ! mkdir($directory, 0777, true) && ! is_dir($directory)) {
            throw new RuntimeException("Unable to create directory {$directory}");
        }
    }

    private function resolveProjectPath(string $path): string
    {
        $normalized = str_replace('\\', '/', $path);

        if (preg_match('~^[A-Za-z]:/~', $normalized) === 1) {
            return $normalized;
        }

        return $this->projectRoot . '/' . ltrim($normalized, '/');
    }

    private function resolveUrl(string $baseUrl, string $candidate): ?string
    {
        if (preg_match('~^[a-z][a-z0-9+.-]*:~i', $candidate) === 1) {
            return $candidate;
        }

        $base = parse_url($baseUrl);

        if (! is_array($base) || ! isset($base['scheme'], $base['host'])) {
            return null;
        }

        $scheme = $base['scheme'];
        $host = $base['host'];

        if (str_starts_with($candidate, '//')) {
            return $scheme . ':' . $candidate;
        }

        if (str_starts_with($candidate, '/')) {
            return $scheme . '://' . $host . $candidate;
        }

        $basePath = $base['path'] ?? '/';
        $baseDirectory = preg_replace('~/[^/]*$~', '/', $basePath) ?: '/';
        $combined = $baseDirectory . $candidate;
        $segments = [];

        foreach (explode('/', $combined) as $segment) {
            if ($segment === '' || $segment === '.') {
                continue;
            }

            if ($segment === '..') {
                array_pop($segments);
                continue;
            }

            $segments[] = $segment;
        }

        return $scheme . '://' . $host . '/' . implode('/', $segments);
    }

    private function urlPath(string $url): ?string
    {
        $path = parse_url($url, PHP_URL_PATH);

        return is_string($path) ? $path : null;
    }

    private function isAapscmUrl(string $url): bool
    {
        return preg_match('~^https?://(?:www\.)?aapscm\.(?:org|com)/~i', $url) === 1;
    }

    private function isUploadsUrl(string $url): bool
    {
        return preg_match('~^https?://(?:www\.)?aapscm\.(?:org|com)/wp-content/uploads/~i', $url) === 1;
    }
}

/** @return array<string, string> */
function parseOptions(array $argv): array
{
    $options = [];

    foreach (array_slice($argv, 1) as $argument) {
        if (! str_starts_with($argument, '--')) {
            continue;
        }

        [$key, $value] = array_pad(explode('=', substr($argument, 2), 2), 2, '');
        $options[$key] = $value;
    }

    return $options;
}

function printUsage(): void
{
    fwrite(STDERR, "Usage: php scripts/generate_elementor_mirror_page.php --slug=<slug> --url=<url> --output=<database/seeders/data/file.php>\n");
}

try {
    $options = parseOptions($_SERVER['argv'] ?? []);

    if (! isset($options['slug'], $options['url'], $options['output'])) {
        printUsage();
        exit(1);
    }

    $generator = new ElementorMirrorPageGenerator($options);
    $result = $generator->generate();

    fwrite(STDOUT, json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);
    exit(0);
} catch (Throwable $throwable) {
    fwrite(STDERR, $throwable->getMessage() . PHP_EOL);
    exit(1);
}
