<?php

declare(strict_types=1);

namespace Database\Seeders\Support;

use DOMDocument;
use DOMElement;
use DOMNode;
use DOMXPath;

final class MirrorLinkReconciler
{
    /**
     * @param array<string, string> $titleToHref
     */
    public static function reconcileBodyHtml(string $bodyHtml, array $titleToHref): string
    {
        if ($bodyHtml === '' || $titleToHref === []) {
            return $bodyHtml;
        }

        $normalizedMap = [];
        foreach ($titleToHref as $title => $href) {
            if (! is_string($title) || ! is_string($href) || trim($title) === '' || trim($href) === '') {
                continue;
            }

            $normalizedTitle = self::normalizeLabel($title);
            if ($normalizedTitle === '') {
                continue;
            }

            $normalizedMap[$normalizedTitle] = $href;
        }

        if ($normalizedMap === []) {
            return $bodyHtml;
        }

        $document = new DOMDocument('1.0', 'UTF-8');
        $previous = libxml_use_internal_errors(true);
        $html = '<?xml encoding="utf-8" ?><div id="mirror-link-reconciler-root">' . $bodyHtml . '</div>';
        $document->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        libxml_use_internal_errors($previous);

        $xpath = new DOMXPath($document);
        /** @var DOMElement $anchor */
        foreach ($xpath->query('//a[@href]') ?: [] as $anchor) {
            $candidate = self::candidateLabelForAnchor($anchor, $xpath);
            if ($candidate === null) {
                continue;
            }

            $replacementHref = null;
            foreach (self::titleVariants($candidate) as $variant) {
                $normalizedVariant = self::normalizeLabel($variant);
                if ($normalizedVariant === '' || ! isset($normalizedMap[$normalizedVariant])) {
                    continue;
                }

                $replacementHref = $normalizedMap[$normalizedVariant];
                break;
            }

            if ($replacementHref === null) {
                continue;
            }

            $anchor->setAttribute('href', $replacementHref);
        }

        $root = $document->getElementById('mirror-link-reconciler-root');
        if (! $root instanceof DOMElement) {
            return $bodyHtml;
        }

        $output = '';
        foreach ($root->childNodes as $childNode) {
            $output .= $document->saveHTML($childNode) ?: '';
        }

        return $output !== '' ? $output : $bodyHtml;
    }

    public static function removeCourseBuyExamButtons(string $bodyHtml): string
    {
        if ($bodyHtml === '' || ! str_contains(mb_strtolower($bodyHtml, 'UTF-8'), 'buy exam now')) {
            return $bodyHtml;
        }

        $document = new DOMDocument('1.0', 'UTF-8');
        $previous = libxml_use_internal_errors(true);
        $html = '<?xml encoding="utf-8" ?><div id="mirror-link-reconciler-root">' . $bodyHtml . '</div>';
        $document->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        libxml_use_internal_errors($previous);

        $xpath = new DOMXPath($document);
        /** @var DOMElement $anchor */
        foreach ($xpath->query('//a[@href]') ?: [] as $anchor) {
            $href = trim($anchor->getAttribute('href'));
            if ($href === '' || ! preg_match('~(^|/)course(/|$)~i', $href)) {
                continue;
            }

            if (self::normalizeLabel($anchor->textContent) !== 'buy exam now') {
                continue;
            }

            $nodeToRemove = self::closestElementWithClassFragment($anchor, 'elementor-widget-button')
                ?? self::closestElement($anchor, 'a');

            if (! $nodeToRemove instanceof DOMNode || ! $nodeToRemove->parentNode) {
                continue;
            }

            $nodeToRemove->parentNode->removeChild($nodeToRemove);
        }

        $root = $document->getElementById('mirror-link-reconciler-root');
        if (! $root instanceof DOMElement) {
            return $bodyHtml;
        }

        $output = '';
        foreach ($root->childNodes as $childNode) {
            $output .= $document->saveHTML($childNode) ?: '';
        }

        return $output !== '' ? $output : $bodyHtml;
    }

    public static function normalizeLabel(string $label): string
    {
        $label = html_entity_decode(strip_tags($label), ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $label = str_replace(["\u{00ae}", "\u{2122}", "\u{fb01}", '&'], ['', '', 'fi', ' and '], $label);
        $label = preg_replace('/^(?:the\s+)+/iu', '', trim($label)) ?? trim($label);
        $label = preg_replace('/^(?:aapscm\s*[®]?\s*training\s*virtual\s*-\s*)+/iu', '', $label) ?? $label;
        $label = preg_replace('/^(?:instructor[\s-]*led\s+virtual\s+training\s*-\s*)+/iu', '', $label) ?? $label;
        $label = preg_replace('/[^\pL\pN]+/u', ' ', $label) ?? $label;
        $label = preg_replace('/\s+/u', ' ', trim($label)) ?? trim($label);

        return mb_strtolower($label, 'UTF-8');
    }

    /**
     * @return array<int, string>
     */
    public static function titleVariants(string $title, ?string $abbreviation = null): array
    {
        $variants = [$title];

        if ($abbreviation !== null && trim($abbreviation) !== '') {
            $variants[] = $abbreviation;
        }

        if (preg_match('/\(([^)]+)\)/u', $title, $matches) === 1 && trim($matches[1]) !== '') {
            $variants[] = $matches[1];
        }

        $deduplicated = [];
        foreach ($variants as $variant) {
            if (! is_string($variant) || trim($variant) === '') {
                continue;
            }

            if (! in_array($variant, $deduplicated, true)) {
                $deduplicated[] = $variant;
            }
        }

        return $deduplicated;
    }

    private static function candidateLabelForAnchor(DOMElement $anchor, DOMXPath $xpath): ?string
    {
        $row = self::closestElement($anchor, 'tr');
        if ($row instanceof DOMElement) {
            foreach ($xpath->query('./th|./td', $row) ?: [] as $cell) {
                if (! $cell instanceof DOMElement || $cell->contains($anchor)) {
                    continue;
                }

                $text = trim($cell->textContent);
                if ($text !== '') {
                    return $text;
                }
            }
        }

        $current = $anchor->parentNode;
        while ($current instanceof DOMElement) {
            $headings = [];
            foreach ($xpath->query('.//*[self::h1 or self::h2 or self::h3 or self::h4 or self::h5 or self::h6 or contains(@class, "elementor-image-box-title") or contains(@class, "elementor-heading-title")][normalize-space()]', $current) ?: [] as $heading) {
                if (! $heading instanceof DOMElement) {
                    continue;
                }

                $text = trim($heading->textContent);
                if ($text === '' || self::normalizeLabel($text) === 'learn more') {
                    continue;
                }

                $headings[] = $text;
            }

            if ($headings !== []) {
                return $headings[0];
            }

            $current = $current->parentNode;
        }

        return null;
    }

    private static function closestElement(DOMNode $node, string $tagName): ?DOMElement
    {
        $current = $node->parentNode;
        while ($current instanceof DOMElement) {
            if (strcasecmp($current->tagName, $tagName) === 0) {
                return $current;
            }

            $current = $current->parentNode;
        }

        return null;
    }

    private static function closestElementWithClassFragment(DOMNode $node, string $classFragment): ?DOMElement
    {
        $current = $node instanceof DOMElement ? $node : $node->parentNode;
        while ($current instanceof DOMElement) {
            $class = trim($current->getAttribute('class'));
            if ($class !== '' && str_contains($class, $classFragment)) {
                return $current;
            }

            $current = $current->parentNode;
        }

        return null;
    }
}
