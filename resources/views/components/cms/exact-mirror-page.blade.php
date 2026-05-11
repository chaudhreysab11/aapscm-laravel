@props([
    'page',
    'wrapperClass' => 'exact-live-mirror',
])

@php
    use App\Support\Media\ImageAttributes;
    use Database\Seeders\Support\MirrorLinkReconciler;

    $data = is_array($page->page_data ?? null) ? $page->page_data : [];
    $root = $data['root'] ?? [];
    $cssFiles = $data['css_files'] ?? [];
    $externalCssFiles = $data['external_css_files'] ?? [];
    $inlineCss = is_string($data['inline_css'] ?? null) ? trim($data['inline_css']) : '';
    $bodyHtml = $data['body_html'] ?? '';
    $shortcodeReplacements = is_array($data['shortcode_replacements'] ?? null) ? $data['shortcode_replacements'] : [];
    $elementorPageId = trim((string) ($root['data_elementor_id'] ?? ''));
    $elementorPopupVideoMap = [
        '5757' => [
            'title' => 'American Certified Procurement Professional (ACPP)® Certification',
            'src' => 'https://www.youtube-nocookie.com/embed/wocEyCJFMpw?controls=1&rel=0',
        ],
        '5775' => [
            'title' => 'American Certified Supply Chain Professional Certification (ACSCP)®',
            'src' => 'https://www.youtube-nocookie.com/embed/fX0taN_vQ98?controls=1&rel=0',
        ],
        '6117' => [
            'title' => 'American Certified Tourism Manager (ACTM)® Certification',
            'src' => 'https://www.youtube-nocookie.com/embed/eGuBj-jg-x8?controls=1&rel=0',
        ],
        '5781' => [
            'title' => 'American Certified Procurement Managers Certification (ACPM)®',
            'src' => 'https://www.youtube-nocookie.com/embed/jk6E-mFoJfE?controls=1&rel=0',
        ],
        '5763' => [
            'title' => 'American Certified Supply Chain Manager (ACSCM)® Certification',
            'src' => 'https://www.youtube-nocookie.com/embed/6ZZVX2weUeY?controls=1&rel=0',
        ],
        '5769' => [
            'title' => 'The American Certified Tourism Professional (ACTP)® Certification',
            'src' => 'https://www.youtube-nocookie.com/embed/R5pz6chtpnE?controls=1&rel=0',
        ],
        '5787' => [
            'title' => 'Learning and Development Hub Video',
            'src' => 'https://www.youtube-nocookie.com/embed/XcOM0CQxK2Q?controls=1&rel=0',
        ],
    ];
    $titleHolder = data_get($page, 'page_data.title_holder');

    if (! is_array($titleHolder) && isset($data['title_holder']) && is_array($data['title_holder'])) {
        $titleHolder = $data['title_holder'];
    }

    if (! is_array($titleHolder) && $page->slug === 'exam-objectives') {
        $titleHolder = [
            'classes' => 'eltdf-centered-type eltdf-title-va-window-top eltdf-has-bg-image',
            'height' => 400,
            'background_color' => '#828282',
            'background_image' => '/storage/cms-images/2021/10/image-13.png',
            'image' => '/storage/cms-images/2021/10/image-13.png',
            'image_alt' => 'Image Alt',
            'title' => 'Our Certifications and Guiding Objectives',
            'title_color' => '#ffffff',
        ];
    }

    $titleHolder = is_array($titleHolder) ? $titleHolder : null;

    $resolveAssetUrl = static function (?string $path): ?string {
        if (! is_string($path) || trim($path) === '') {
            return null;
        }

        if (preg_match('~^https?://~i', $path) === 1) {
            return $path;
        }

        if (str_starts_with($path, '/')) {
            return url($path);
        }

        return asset($path);
    };

    $decodeCfEmail = static function (string $hex): ?string {
        if ($hex === '' || strlen($hex) < 4 || strlen($hex) % 2 !== 0 || ! ctype_xdigit($hex)) {
            return null;
        }

        $key = hexdec(substr($hex, 0, 2));
        $email = '';

        for ($index = 2, $length = strlen($hex); $index < $length; $index += 2) {
            $email .= chr(hexdec(substr($hex, $index, 2)) ^ $key);
        }

        return $email !== '' ? $email : null;
    };

    $stripCfEmailAttributes = static function (string $attributes): string {
        $attributes = preg_replace('/\s+data-cfemail=(["\"])\S*?\1/i', '', $attributes) ?? $attributes;
        $attributes = preg_replace('/\s+href=(["\"])[^"\']*\/cdn-cgi\/l\/email-protection[^"\']*\1/i', '', $attributes) ?? $attributes;

        $attributes = preg_replace_callback(
            '/\s+class=(["\"])(.*?)\1/i',
            static function (array $matches): string {
                $classes = preg_split('/\s+/', trim($matches[2])) ?: [];
                $classes = array_values(array_filter($classes, static fn (string $class): bool => $class !== '__cf_email__'));

                return $classes === [] ? '' : ' class="' . e(implode(' ', $classes)) . '"';
            },
            $attributes,
            1
        ) ?? $attributes;

        return preg_replace('/\s{2,}/', ' ', $attributes) ?? $attributes;
    };

    $repairMisnestedTrainingSections = static function (string $html): string {
        if (
            $html === ''
            || ! str_contains($html, 'elementor-top-section')
            || (! str_contains($html, 'variation-tb')
                && (! str_contains($html, 'elementor-hidden-desktop')
                    || ! str_contains($html, 'elementor-hidden-tablet')
                    || ! str_contains($html, 'elementor-hidden-mobile')))
        ) {
            return $html;
        }

        $document = new \DOMDocument('1.0', 'UTF-8');
        $previous = libxml_use_internal_errors(true);
        $loaded = $document->loadHTML(
            '<?xml encoding="utf-8" ?><div id="exact-mirror-training-root">' . $html . '</div>',
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD,
        );
        libxml_clear_errors();
        libxml_use_internal_errors($previous);

        if (! $loaded) {
            return $html;
        }

        $xpath = new \DOMXPath($document);
        $root = $xpath->query('//*[@id="exact-mirror-training-root"]')->item(0);

        if (! $root instanceof \DOMElement) {
            return $html;
        }

        $hasClass = static function (\DOMElement $element, string $class): bool {
            $classes = preg_split('/\s+/', trim($element->getAttribute('class'))) ?: [];

            return in_array($class, $classes, true);
        };

        $shouldPromoteNestedTopSections = static function (\DOMElement $section) use ($hasClass): bool {
            if ($hasClass($section, 'variation-tb')) {
                return true;
            }

            return $hasClass($section, 'elementor-hidden-mobile')
                && $hasClass($section, 'elementor-hidden-desktop')
                && $hasClass($section, 'elementor-hidden-tablet');
        };

        $promotedAny = false;

        foreach ($xpath->query(
            './/section[contains(concat(" ", normalize-space(@class), " "), " elementor-top-section ") and (contains(concat(" ", normalize-space(@class), " "), " variation-tb ") or (contains(concat(" ", normalize-space(@class), " "), " elementor-hidden-desktop ") and contains(concat(" ", normalize-space(@class), " "), " elementor-hidden-tablet ") and contains(concat(" ", normalize-space(@class), " "), " elementor-hidden-mobile ")))]'
            , $root) ?: [] as $section) {
            if (! $section instanceof \DOMElement) {
                continue;
            }

            if (! $shouldPromoteNestedTopSections($section)) {
                continue;
            }

            $nestedTopSections = [];

            foreach ($xpath->query('.//section[contains(concat(" ", normalize-space(@class), " "), " elementor-top-section ")]', $section) ?: [] as $nestedTopSection) {
                if (! $nestedTopSection instanceof \DOMElement || $nestedTopSection->isSameNode($section)) {
                    continue;
                }

                $nearestTopSection = $nestedTopSection->parentNode;

                while ($nearestTopSection instanceof \DOMElement) {
                    if (
                        strcasecmp($nearestTopSection->tagName, 'section') === 0
                        && $hasClass($nearestTopSection, 'elementor-top-section')
                    ) {
                        break;
                    }

                    $nearestTopSection = $nearestTopSection->parentNode;
                }

                if ($nearestTopSection instanceof \DOMElement && $nearestTopSection->isSameNode($section)) {
                    $nestedTopSections[] = $nestedTopSection;
                }
            }

            if ($nestedTopSections === [] || ! $section->parentNode instanceof \DOMNode) {
                continue;
            }

            $referenceNode = $section->nextSibling;

            foreach ($nestedTopSections as $nestedTopSection) {
                $section->parentNode->insertBefore($nestedTopSection, $referenceNode);
                $promotedAny = true;
            }
        }

        if (! $promotedAny) {
            return $html;
        }

        $output = '';

        foreach ($root->childNodes as $childNode) {
            $output .= $document->saveHTML($childNode) ?: '';
        }

        return $output !== '' ? $output : $html;
    };

    $adaptMirrorCartForms = static function (string $html): string {
        if (
            $html === ''
            || ! str_contains($html, '<form')
            || ! str_contains($html, 'add-to-cart')
        ) {
            return $html;
        }

        $document = new \DOMDocument('1.0', 'UTF-8');
        $previous = libxml_use_internal_errors(true);
        $loaded = $document->loadHTML(
            '<?xml encoding="utf-8" ?><div id="exact-mirror-cart-root">' . $html . '</div>',
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD,
        );
        libxml_clear_errors();
        libxml_use_internal_errors($previous);

        if (! $loaded) {
            return $html;
        }

        $xpath = new \DOMXPath($document);
        $root = $xpath->query('//*[@id="exact-mirror-cart-root"]')->item(0);

        if (! $root instanceof \DOMElement) {
            return $html;
        }

        /** @var \DOMElement $form */
        foreach ($xpath->query('//form[contains(concat(" ", normalize-space(@class), " "), " cart ")]') ?: [] as $form) {
            $submit = $xpath->query('.//*[@name="add-to-cart"]', $form)?->item(0);

            if (! $submit instanceof \DOMElement) {
                continue;
            }

            $sourceId = trim($submit->getAttribute('value'));

            if ($sourceId === '' || ! is_numeric($sourceId)) {
                continue;
            }

            $form->setAttribute('action', route('cart.add', ['product' => $sourceId]));
            $form->setAttribute('method', 'POST');
            $form->setAttribute('data-mirror-cart-form', 'true');

            if (($xpath->query('.//input[@name="_token"]', $form)?->length ?? 0) === 0) {
                $tokenInput = $document->createElement('input');
                $tokenInput->setAttribute('type', 'hidden');
                $tokenInput->setAttribute('name', '_token');
                $tokenInput->setAttribute('value', csrf_token());
                $form->insertBefore($tokenInput, $form->firstChild);
            }

            if (($xpath->query('.//input[@name="redirect_to"]', $form)?->length ?? 0) === 0) {
                $redirectInput = $document->createElement('input');
                $redirectInput->setAttribute('type', 'hidden');
                $redirectInput->setAttribute('name', 'redirect_to');
                $redirectInput->setAttribute('value', route('cart.show'));
                $form->insertBefore($redirectInput, $form->firstChild);
            }

            $quantityInputs = $xpath->query('.//input[@name="quantity"]', $form) ?: [];
            $hasQuantityInput = false;

            foreach ($quantityInputs as $quantityInput) {
                if (! $quantityInput instanceof \DOMElement) {
                    continue;
                }

                $hasQuantityInput = true;
                $quantityInput->setAttribute('type', 'hidden');
                $quantityInput->setAttribute('value', '1');
            }

            if (! $hasQuantityInput) {
                $quantityInput = $document->createElement('input');
                $quantityInput->setAttribute('type', 'hidden');
                $quantityInput->setAttribute('name', 'quantity');
                $quantityInput->setAttribute('value', '1');
                $form->appendChild($quantityInput);
            }

            foreach ($xpath->query('.//*[contains(concat(" ", normalize-space(@class), " "), " quantity ")]', $form) ?: [] as $quantityWrapper) {
                if (! $quantityWrapper instanceof \DOMElement) {
                    continue;
                }

                $quantityWrapper->setAttribute('hidden', 'hidden');
                $quantityWrapper->setAttribute('style', trim($quantityWrapper->getAttribute('style') . ';display:none !important;'));
            }
        }

        $output = '';

        foreach ($root->childNodes as $childNode) {
            $output .= $document->saveHTML($childNode) ?: '';
        }

        return $output !== '' ? $output : $html;
    };

    $adaptMirrorPublicForms = static function (string $html, string $slug): string {
        if ($html === '' || ! str_contains($html, '<form')) {
            return $html;
        }

        $formConfigs = [
            'contact-us' => [
                'query' => '//form[contains(concat(" ", normalize-space(@class), " "), " wpcf7-form ")]',
                'action' => route('contact-us.submit'),
            ],
            'how-to-apply' => [
                'query' => '//form[contains(concat(" ", normalize-space(@class), " "), " wpcf7-form ")]',
                'action' => route('how-to-apply.submit'),
                'enctype' => 'multipart/form-data',
            ],
            'aapscm-hotline' => [
                'query' => '//form[contains(concat(" ", normalize-space(@class), " "), " register ")]',
                'action' => route('aapscm-hotline.submit'),
            ],
            'corporate-membership' => [
                'query' => '//form[contains(concat(" ", normalize-space(@class), " "), " wpcf7-form ")]',
                'action' => route('corporate-membership.submit'),
            ],
            'professional-membership-renewal' => [
                'query' => '//form[contains(concat(" ", normalize-space(@class), " "), " wpcf7-form ")]',
                'action' => route('professional-membership-renewal.submit'),
            ],
        ];

        $config = $formConfigs[$slug] ?? null;

        if (! is_array($config)) {
            return $html;
        }

        $document = new \DOMDocument('1.0', 'UTF-8');
        $previous = libxml_use_internal_errors(true);
        $loaded = $document->loadHTML(
            '<?xml encoding="utf-8" ?><div id="exact-mirror-public-form-root">' . $html . '</div>',
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD,
        );
        libxml_clear_errors();
        libxml_use_internal_errors($previous);

        if (! $loaded) {
            return $html;
        }

        $xpath = new \DOMXPath($document);
        $root = $xpath->query('//*[@id="exact-mirror-public-form-root"]')->item(0);
        $form = $xpath->query($config['query'], $root instanceof \DOMNode ? $root : $document)?->item(0);

        if (! $root instanceof \DOMElement || ! $form instanceof \DOMElement) {
            return $html;
        }

        $form->setAttribute('action', $config['action']);
        $form->setAttribute('method', 'POST');
        $form->setAttribute('data-mirror-public-form', $slug);

        if (isset($config['enctype']) && is_string($config['enctype'])) {
            $form->setAttribute('enctype', $config['enctype']);
        }

        if (($xpath->query('.//input[@name="_token"]', $form)?->length ?? 0) === 0) {
            $tokenInput = $document->createElement('input');
            $tokenInput->setAttribute('type', 'hidden');
            $tokenInput->setAttribute('name', '_token');
            $tokenInput->setAttribute('value', csrf_token());
            $form->insertBefore($tokenInput, $form->firstChild);
        }

        $output = '';

        foreach ($root->childNodes as $childNode) {
            $output .= $document->saveHTML($childNode) ?: '';
        }

        return $output !== '' ? $output : $html;
    };

    $stripEmbeddedMirrorFooters = static function (string $html): string {
        if (
            $html === ''
            || ! str_contains($html, 'elementor-location-footer')
        ) {
            return $html;
        }

        $stripped = preg_replace(
            '~<footer\b[^>]*elementor-location-footer[^>]*>.*?</footer>~is',
            '',
            $html,
        );

        if (is_string($stripped) && $stripped !== $html) {
            return $stripped;
        }

        if (! str_contains($html, '<footer')) {
            return $html;
        }

        $document = new \DOMDocument('1.0', 'UTF-8');
        $previous = libxml_use_internal_errors(true);
        $loaded = $document->loadHTML(
            '<?xml encoding="utf-8" ?><div id="exact-mirror-footer-root">' . $html . '</div>',
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD,
        );
        libxml_clear_errors();
        libxml_use_internal_errors($previous);

        if (! $loaded) {
            return $html;
        }

        $xpath = new \DOMXPath($document);
        $root = $xpath->query('//*[@id="exact-mirror-footer-root"]')->item(0);

        if (! $root instanceof \DOMElement) {
            return $html;
        }

        $removedAny = false;

        foreach ($xpath->query('.//footer[contains(concat(" ", normalize-space(@class), " "), " elementor-location-footer ")]', $root) ?: [] as $footer) {
            if (! $footer instanceof \DOMElement || ! $footer->parentNode instanceof \DOMNode) {
                continue;
            }

            $footer->parentNode->removeChild($footer);
            $removedAny = true;
        }

        if (! $removedAny) {
            return $html;
        }

        $output = '';

        foreach ($root->childNodes as $childNode) {
            $output .= $document->saveHTML($childNode) ?: '';
        }

        return $output !== '' ? $output : $html;
    };

    $enhanceMirrorImages = static function (string $html): string {
        if ($html === '' || ! str_contains($html, '<img')) {
            return $html;
        }

        $document = new \DOMDocument('1.0', 'UTF-8');
        $previous = libxml_use_internal_errors(true);
        $loaded = $document->loadHTML(
            '<?xml encoding="utf-8" ?><div id="exact-mirror-image-root">' . $html . '</div>',
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD,
        );
        libxml_clear_errors();
        libxml_use_internal_errors($previous);

        if (! $loaded) {
            return $html;
        }

        $xpath = new \DOMXPath($document);
        $root = $xpath->query('//*[@id="exact-mirror-image-root"]')->item(0);

        if (! $root instanceof \DOMElement) {
            return $html;
        }

        $imageIndex = 0;

        foreach ($xpath->query('.//img[@src]', $root) ?: [] as $image) {
            if (! $image instanceof \DOMElement) {
                continue;
            }

            $src = trim($image->getAttribute('src'));
            $isPriority = $imageIndex === 0;
            $defaults = ImageAttributes::defaultAttributes($src, $isPriority);
            $optimizedSrcset = ImageAttributes::optimizedSrcset($image->getAttribute('srcset'));

            if ($optimizedSrcset !== null) {
                $image->setAttribute('srcset', $optimizedSrcset);
            }

            $optimizedSrc = ImageAttributes::optimizedUrlFor($src);

            if ($optimizedSrc !== null) {
                $image->setAttribute('src', $optimizedSrc);
            }

            foreach ($defaults as $name => $value) {
                if (! $image->hasAttribute($name)) {
                    $image->setAttribute($name, $value);
                }
            }

            $imageIndex++;
        }

        $output = '';

        foreach ($root->childNodes as $childNode) {
            $output .= $document->saveHTML($childNode) ?: '';
        }

        return $output !== '' ? $output : $html;
    };

    if (is_string($bodyHtml) && $bodyHtml !== '') {
        foreach ($shortcodeReplacements as $shortcode => $replacement) {
            if (! is_string($shortcode) || $shortcode === '' || ! is_string($replacement)) {
                continue;
            }

            $bodyHtml = str_replace($shortcode, $replacement, $bodyHtml);
        }

        $bodyHtml = $stripEmbeddedMirrorFooters($bodyHtml);

        if (str_starts_with($page->slug, 'aapscm-training-virtual-')) {
            $bodyHtml = $repairMisnestedTrainingSections($bodyHtml);
        }

        $bodyHtml = MirrorLinkReconciler::removeCourseBuyExamButtons($bodyHtml);
        $bodyHtml = $adaptMirrorCartForms($bodyHtml);
        $bodyHtml = $adaptMirrorPublicForms($bodyHtml, $page->slug);
        $bodyHtml = $enhanceMirrorImages($bodyHtml);

        $bodyHtml = preg_replace_callback(
            '/<a\b(?P<attributes>[^>]*)\bdata-cfemail=(["\"])(?P<hex>[0-9a-fA-F]+)\2(?P<tail>[^>]*)>.*?<\/a>/is',
            static function (array $matches) use ($decodeCfEmail, $stripCfEmailAttributes): string {
                $email = $decodeCfEmail($matches['hex']);

                if (! $email) {
                    return $matches[0];
                }

                $attributes = trim($stripCfEmailAttributes(($matches['attributes'] ?? '') . ($matches['tail'] ?? '')));
                $attributes = $attributes !== '' ? ' ' . ltrim($attributes) : '';

                return '<a href="mailto:' . e($email) . '"' . $attributes . '>' . e($email) . '</a>';
            },
            $bodyHtml
        ) ?? $bodyHtml;
    }
@endphp

<x-layouts.cms>
    <x-cms.seo-head :page="$page" />

    @push('body-class')
        elementor-default elementor-kit-5007 elementor-page
        @if ($elementorPageId !== '') elementor-page-{{ $elementorPageId }} @endif
    @endpush

    @push('head')
        @foreach ($externalCssFiles as $href)
            <link rel="stylesheet" href="{{ $href }}">
        @endforeach

        @foreach ($cssFiles as $cssFile)
            <link rel="stylesheet" href="{{ asset($cssFile) }}">
        @endforeach

        @if ($inlineCss !== '')
            <style>
                {!! $inlineCss !!}
            </style>
        @endif

        <style>
            .{{ $wrapperClass }} {
                position: relative;
                z-index: 0;
                isolation: isolate;
            }

            .{{ $wrapperClass }} > .eltdf-container,
            .{{ $wrapperClass }} > .eltdf-container > .eltdf-container-inner,
            .{{ $wrapperClass }} > .eltdf-container > .eltdf-container-inner > .eltdf-grid-row,
            .{{ $wrapperClass }} > .eltdf-container > .eltdf-container-inner > .eltdf-grid-row > .eltdf-page-content-holder {
                width: 100%;
                max-width: none;
            }

            .{{ $wrapperClass }} > .eltdf-container > .eltdf-container-inner,
            .{{ $wrapperClass }} > .eltdf-container > .eltdf-container-inner > .eltdf-grid-row,
            .{{ $wrapperClass }} > .eltdf-container > .eltdf-container-inner > .eltdf-grid-row > .eltdf-page-content-holder {
                overflow: visible;
            }

            .{{ $wrapperClass }} > .eltdf-container > .eltdf-container-inner {
                padding-top: 0;
                padding-bottom: 0;
            }

            .{{ $wrapperClass }} > .eltdf-container > .eltdf-container-inner > .eltdf-grid-row {
                margin-left: 0;
                margin-right: 0;
            }

            .{{ $wrapperClass }} > .eltdf-container > .eltdf-container-inner > .eltdf-grid-row > .eltdf-page-content-holder {
                padding-left: 0;
                padding-right: 0;
            }

            .{{ $wrapperClass }} .elementor-icon-list-text > a,
            .{{ $wrapperClass }} .elementor-icon-list-item a {
                color: inherit !important;
            }

            .{{ $wrapperClass }} .elementor-widget-nav-menu .menu-item-has-children {
                position: relative;
            }

            .{{ $wrapperClass }} .elementor-widget-nav-menu .menu-item-has-children > a {
                padding-right: 2.75rem;
            }

            .{{ $wrapperClass }} .elementor-widget-nav-menu .mirror-nav-toggle {
                position: absolute;
                top: 0.35rem;
                right: 0;
                width: 2rem;
                height: 2rem;
                border: 0;
                border-radius: 9999px;
                background: transparent;
                color: inherit;
                cursor: pointer;
                font-size: 1rem;
                font-weight: 700;
                line-height: 1;
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }

            .{{ $wrapperClass }} .elementor-widget-nav-menu .mirror-nav-toggle:focus-visible {
                outline: 2px solid currentColor;
                outline-offset: 2px;
            }

            .{{ $wrapperClass }} .elementor-widget-nav-menu .sub-menu.elementor-nav-menu--dropdown[hidden] {
                display: none !important;
            }

            .{{ $wrapperClass }} .elementor-accordion .elementor-tab-content,
            .{{ $wrapperClass }} .elementor-toggle .elementor-tab-content {
                display: none;
            }

            .{{ $wrapperClass }} .elementor-accordion .elementor-tab-content.elementor-active,
            .{{ $wrapperClass }} .elementor-toggle .elementor-tab-content.elementor-active {
                display: block;
            }

            .{{ $wrapperClass }} .uael-faq-accordion .uael-accordion-content {
                display: none;
            }

            .{{ $wrapperClass }} .uael-faq-accordion .uael-accordion-content.mirror-accordion-active {
                display: block;
            }

            .{{ $wrapperClass }} .uael-accordion-title[aria-expanded="true"] .uael-accordion-icon-opened {
                display: inline-flex;
            }

            .{{ $wrapperClass }} .uael-accordion-title[aria-expanded="true"] .uael-accordion-icon-closed {
                display: none;
            }

            .{{ $wrapperClass }} .uael-accordion-title[aria-expanded="false"] .uael-accordion-icon-opened {
                display: none;
            }

            .{{ $wrapperClass }} .uael-accordion-title[aria-expanded="false"] .uael-accordion-icon-closed {
                display: inline-flex;
            }

            .{{ $wrapperClass }} .custom_variation > div {
                display: flex;
                width: 100%;
                justify-content: center;
                align-items: center;
            }

            .{{ $wrapperClass }} .custom_variation .label {
                padding: 26px 17px !important;
                font-family: "Poppins", Sans-serif;
                text-align: center;
                color: #fff !important;
                background: #005b1c !important;
                width: 10%;
            }

            .{{ $wrapperClass }} .custom_variation .value {
                justify-content: center;
            }


            .{{ $wrapperClass }} .custom_variation .value select {
                width: 100%;
            }

            .{{ $wrapperClass }} .custom_variation .single_add_to_cart_button.button.alt {
                display: inline-flex;
                width: 200px;
                height: 60px;
                align-items: center;
                justify-content: center;
                min-width: 10.5rem;
                padding: 1rem 1.9rem;
                border: 0;
                border-radius: 9999px;
                background: #07186b;
                color: #fff !important;
                font-weight: 600;
                line-height: 1.2;
                text-align: center;
                white-space: nowrap;
                box-shadow: none;
                margin-left: auto;
            }

            .{{ $wrapperClass }} .custom_variation .single_add_to_cart_button.button.alt:hover,
            .{{ $wrapperClass }} .custom_variation .single_add_to_cart_button.button.alt:focus-visible {
                background: #0b2f8c;
                color: #fff !important;
            }

            .grecaptcha-badge,
            iframe[src*="recaptcha"] {
                opacity: 0 !important;
                visibility: hidden !important;
                pointer-events: none !important;
            }

            .mirror-popup-video-modal[hidden] {
                display: none !important;
            }

            .mirror-popup-video-modal {
                position: fixed;
                inset: 0;
                z-index: 12000;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 1.5rem;
                background: rgba(5, 10, 24, 0.84);
            }

            .mirror-popup-video-dialog {
                position: relative;
                width: min(960px, 100%);
                border-radius: 1rem;
                overflow: hidden;
                background: #000;
                box-shadow: 0 24px 60px rgba(0, 0, 0, 0.35);
            }

            .mirror-popup-video-frame-wrap {
                position: relative;
                width: 100%;
                padding-top: 56.25%;
                background: #000;
            }

            .mirror-popup-video-frame-wrap iframe {
                position: absolute;
                inset: 0;
                width: 100%;
                height: 100%;
                border: 0;
            }

            .mirror-popup-video-close {
                position: absolute;
                top: 0.75rem;
                right: 0.75rem;
                z-index: 1;
                width: 2.5rem;
                height: 2.5rem;
                border: 0;
                border-radius: 9999px;
                background: rgba(255, 255, 255, 0.18);
                color: #fff;
                font-size: 1.5rem;
                line-height: 1;
                cursor: pointer;
            }

            .mirror-popup-video-close:hover,
            .mirror-popup-video-close:focus-visible {
                background: rgba(255, 255, 255, 0.28);
                outline: 2px solid #fff;
                outline-offset: 2px;
            }

            body.mirror-popup-video-open {
                overflow: hidden;
            }

            @media (max-width: 767px) {
                .{{ $wrapperClass }} .custom_variation > div {
                    align-items: stretch;
                }

                .{{ $wrapperClass }} .custom_variation .value {
                    flex-basis: 100%;
                }

                .{{ $wrapperClass }} .custom_variation .single_add_to_cart_button.button.alt {
                    width: 100%;
                    margin-left: 0;
                }
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            (() => {
                const wrapperSelector = '.{{ $wrapperClass }}';
                const popupVideoMap = @json($elementorPopupVideoMap);

                const ready = (callback) => {
                    if (document.readyState === 'loading') {
                        document.addEventListener('DOMContentLoaded', callback, { once: true });

                        return;
                    }

                    callback();
                };

                const escapeSelector = (value) => {
                    if (window.CSS && typeof window.CSS.escape === 'function') {
                        return window.CSS.escape(value);
                    }

                    return value.replace(/([ #;?%&,.+*~\':"!^$\[\]()=>|\/@])/g, '\\$1');
                };

                const resolvedVisibleDisplay = (panel) => {
                    if (panel.dataset.mirrorVisibleDisplay) {
                        return panel.dataset.mirrorVisibleDisplay;
                    }

                    const computedDisplay = window.getComputedStyle(panel).display;

                    if (computedDisplay !== 'none') {
                        panel.dataset.mirrorVisibleDisplay = computedDisplay;

                        return computedDisplay;
                    }

                    if (panel.classList.contains('e-con') || panel.classList.contains('e-flex')) {
                        panel.dataset.mirrorVisibleDisplay = 'flex';

                        return 'flex';
                    }

                    panel.dataset.mirrorVisibleDisplay = 'block';

                    return 'block';
                };

                const setPanelVisibility = (panel, isActive) => {
                    panel.hidden = !isActive;
                    panel.setAttribute('aria-hidden', isActive ? 'false' : 'true');

                    if (isActive) {
                        panel.style.setProperty('display', resolvedVisibleDisplay(panel), 'important');

                        return;
                    }

                    panel.style.setProperty('display', 'none', 'important');
                };

                const activateNestedTab = (tabs, titles, titleToActivate) => {
                    titles.forEach((title) => {
                        const isActive = title === titleToActivate;
                        const panelId = title.getAttribute('aria-controls');
                        const panel = panelId ? tabs.querySelector(`#${escapeSelector(panelId)}`) : null;

                        title.classList.toggle('e-active', isActive);
                        title.setAttribute('aria-selected', isActive ? 'true' : 'false');
                        title.tabIndex = isActive ? 0 : -1;

                        if (panel) {
                            panel.classList.toggle('e-active', isActive);
                            setPanelVisibility(panel, isActive);
                        }
                    });
                };

                const initNestedTabs = (tabs) => {
                    if (tabs.dataset.mirrorTabsReady === 'true') {
                        return;
                    }

                    const titles = Array.from(tabs.querySelectorAll('.e-n-tabs-heading .e-n-tab-title[aria-controls]'));

                    if (titles.length === 0) {
                        return;
                    }

                    const focusTitle = (nextIndex) => {
                        const boundedIndex = (nextIndex + titles.length) % titles.length;
                        const nextTitle = titles[boundedIndex];

                        activateNestedTab(tabs, titles, nextTitle);
                        nextTitle.focus();
                    };

                    titles.forEach((title, index) => {
                        title.type = 'button';
                        title.addEventListener('click', (event) => {
                            event.preventDefault();
                            activateNestedTab(tabs, titles, title);
                        });

                        title.addEventListener('keydown', (event) => {
                            if (event.key === 'ArrowRight' || event.key === 'ArrowDown') {
                                event.preventDefault();
                                focusTitle(index + 1);
                            }

                            if (event.key === 'ArrowLeft' || event.key === 'ArrowUp') {
                                event.preventDefault();
                                focusTitle(index - 1);
                            }

                            if (event.key === 'Home') {
                                event.preventDefault();
                                focusTitle(0);
                            }

                            if (event.key === 'End') {
                                event.preventDefault();
                                focusTitle(titles.length - 1);
                            }

                            if (event.key === 'Enter' || event.key === ' ') {
                                event.preventDefault();
                                activateNestedTab(tabs, titles, title);
                            }
                        });
                    });

                    const initialTitle = titles.find((title) => title.classList.contains('e-active') || title.getAttribute('aria-selected') === 'true') ?? titles[0];
                    activateNestedTab(tabs, titles, initialTitle);
                    tabs.dataset.mirrorTabsReady = 'true';
                };

                const activateClassicTab = (tabs, titles, contents, titleToActivate) => {
                    const tabId = titleToActivate.dataset.tab;

                    titles.forEach((title) => {
                        const isActive = title === titleToActivate;
                        title.classList.toggle('elementor-active', isActive);
                        title.setAttribute('aria-selected', isActive ? 'true' : 'false');
                        title.tabIndex = isActive ? 0 : -1;
                    });

                    contents.forEach((content) => {
                        const isActive = content.dataset.tab === tabId;
                        content.classList.toggle('elementor-active', isActive);
                        setPanelVisibility(content, isActive);
                    });
                };

                const initClassicTabs = (tabs) => {
                    if (tabs.dataset.mirrorClassicTabsReady === 'true') {
                        return;
                    }

                    const titles = Array.from(tabs.querySelectorAll('.elementor-tab-title[data-tab]'));
                    const contents = Array.from(tabs.querySelectorAll('.elementor-tab-content[data-tab]'));

                    if (titles.length === 0 || contents.length === 0) {
                        return;
                    }

                    titles.forEach((title, index) => {
                        title.addEventListener('click', (event) => {
                            event.preventDefault();
                            activateClassicTab(tabs, titles, contents, title);
                        });

                        title.addEventListener('keydown', (event) => {
                            if (event.key !== 'Enter' && event.key !== ' ') {
                                return;
                            }

                            event.preventDefault();
                            activateClassicTab(tabs, titles, contents, title);
                        });

                        title.tabIndex = index === 0 ? 0 : -1;
                    });

                    const initialTitle = titles.find((title) => title.classList.contains('elementor-active') || title.getAttribute('aria-selected') === 'true') ?? titles[0];
                    activateClassicTab(tabs, titles, contents, initialTitle);
                    tabs.dataset.mirrorClassicTabsReady = 'true';
                };

                const syncAccordionItem = (title, panel, isActive) => {
                    title.classList.toggle('elementor-active', isActive);
                    title.setAttribute('aria-expanded', isActive ? 'true' : 'false');
                    title.tabIndex = 0;

                    if (panel) {
                        panel.classList.toggle('elementor-active', isActive);
                        setPanelVisibility(panel, isActive);
                    }
                };

                const initAccordionWidget = (widget, allowMultiple = false) => {
                    const readyFlag = allowMultiple ? 'mirrorToggleReady' : 'mirrorAccordionReady';

                    if (widget.dataset[readyFlag] === 'true') {
                        return;
                    }

                    const titles = Array.from(widget.querySelectorAll('.elementor-tab-title[data-tab]'));
                    const panelsByTab = new Map(
                        Array.from(widget.querySelectorAll('.elementor-tab-content[data-tab]')).map((panel) => [panel.dataset.tab, panel])
                    );

                    if (titles.length === 0 || panelsByTab.size === 0) {
                        return;
                    }

                    const setActiveTitle = (titleToActivate) => {
                        const shouldOpen = titleToActivate.getAttribute('aria-expanded') !== 'true'
                            || ! titleToActivate.classList.contains('elementor-active');

                        titles.forEach((title) => {
                            const panel = panelsByTab.get(title.dataset.tab || '');
                            const isTarget = title === titleToActivate;

                            if (allowMultiple) {
                                const isActive = isTarget ? shouldOpen : title.getAttribute('aria-expanded') === 'true';
                                syncAccordionItem(title, panel, isActive);

                                return;
                            }

                            syncAccordionItem(title, panel, isTarget ? shouldOpen : false);
                        });
                    };

                    titles.forEach((title) => {
                        title.setAttribute('role', title.getAttribute('role') || 'button');

                        title.addEventListener('click', (event) => {
                            event.preventDefault();
                            setActiveTitle(title);
                        });

                        title.addEventListener('keydown', (event) => {
                            if (event.key !== 'Enter' && event.key !== ' ') {
                                return;
                            }

                            event.preventDefault();
                            setActiveTitle(title);
                        });
                    });

                    let hasInitialOpenItem = false;

                    titles.forEach((title) => {
                        const panel = panelsByTab.get(title.dataset.tab || '');
                        const isInitiallyActive = title.classList.contains('elementor-active')
                            || title.getAttribute('aria-expanded') === 'true'
                            || panel?.classList.contains('elementor-active') === true;

                        hasInitialOpenItem = hasInitialOpenItem || isInitiallyActive;
                        syncAccordionItem(title, panel, isInitiallyActive);
                    });

                    if (! hasInitialOpenItem) {
                        titles.forEach((title) => {
                            syncAccordionItem(title, panelsByTab.get(title.dataset.tab || ''), false);
                        });
                    }

                    widget.dataset[readyFlag] = 'true';
                };

                const syncUaelAccordionItem = (title, panel, isActive) => {
                    title.classList.toggle('uael-accordion-active', isActive);
                    title.setAttribute('aria-expanded', isActive ? 'true' : 'false');
                    title.tabIndex = 0;

                    if (panel) {
                        panel.classList.toggle('mirror-accordion-active', isActive);
                        setPanelVisibility(panel, isActive);
                    }
                };

                const initUaelAccordion = (container) => {
                    if (container.dataset.mirrorUaelAccordionReady === 'true') {
                        return;
                    }

                    const items = Array.from(container.querySelectorAll('.uael-faq-accordion')).map((item) => ({
                        title: item.querySelector('.uael-accordion-title'),
                        panel: item.querySelector('.uael-accordion-content'),
                        label: item.querySelector('.uael-question-span'),
                    })).filter((item) => item.title && item.panel);

                    if (items.length === 0) {
                        return;
                    }

                    const activateItem = (targetItem) => {
                        const shouldOpen = targetItem.title.getAttribute('aria-expanded') !== 'true';

                        items.forEach((item) => {
                            syncUaelAccordionItem(item.title, item.panel, item === targetItem ? shouldOpen : false);
                        });
                    };

                    let hasInitiallyOpenItem = false;

                    items.forEach((item) => {
                        const isInitiallyOpen = item.title.classList.contains('uael-accordion-active')
                            || item.title.getAttribute('aria-expanded') === 'true'
                            || item.panel.classList.contains('mirror-accordion-active')
                            || window.getComputedStyle(item.panel).display !== 'none';

                        hasInitiallyOpenItem = hasInitiallyOpenItem || isInitiallyOpen;
                        syncUaelAccordionItem(item.title, item.panel, isInitiallyOpen);

                        item.title.addEventListener('click', (event) => {
                            event.preventDefault();
                            activateItem(item);
                        });

                        item.title.addEventListener('keydown', (event) => {
                            if (event.key !== 'Enter' && event.key !== ' ') {
                                return;
                            }

                            event.preventDefault();
                            activateItem(item);
                        });

                        item.label?.addEventListener('keydown', (event) => {
                            if (event.key !== 'Enter' && event.key !== ' ') {
                                return;
                            }

                            event.preventDefault();
                            activateItem(item);
                        });
                    });

                    if (! hasInitiallyOpenItem) {
                        items.forEach((item) => {
                            syncUaelAccordionItem(item.title, item.panel, false);
                        });
                    }

                    container.dataset.mirrorUaelAccordionReady = 'true';
                };

                const initNavMenus = (widget) => {
                    if (widget.dataset.mirrorNavReady === 'true') {
                        return;
                    }

                    const nav = widget.querySelector('nav.elementor-nav-menu__container');

                    if (! nav) {
                        return;
                    }

                    nav.hidden = false;
                    nav.setAttribute('aria-hidden', 'false');
                    nav.style.removeProperty('display');

                    nav.querySelectorAll('a[tabindex="-1"]').forEach((link) => {
                        link.removeAttribute('tabindex');
                    });

                    nav.querySelectorAll('li.menu-item-has-children').forEach((item, index) => {
                        const link = item.querySelector(':scope > a');
                        const submenu = item.querySelector(':scope > .sub-menu');

                        if (! link || ! submenu) {
                            return;
                        }

                        const buttonId = `mirror-nav-toggle-${index}-${Math.random().toString(36).slice(2, 8)}`;
                        const isInitiallyOpen = item.classList.contains('current-menu-item')
                            || item.classList.contains('current-menu-parent')
                            || item.classList.contains('current-menu-ancestor')
                            || item.classList.contains('current_page_item')
                            || item.classList.contains('current_page_parent');

                        let toggle = item.querySelector(':scope > .mirror-nav-toggle');

                        const applyExpandedState = (isExpanded) => {
                            item.classList.toggle('mirror-nav-open', isExpanded);
                            toggle?.setAttribute('aria-expanded', isExpanded ? 'true' : 'false');
                            toggle?.setAttribute('aria-label', `${isExpanded ? 'Collapse' : 'Expand'} ${link.textContent?.trim() || 'submenu'}`);
                            if (toggle) {
                                toggle.textContent = isExpanded ? '−' : '+';
                            }
                            setPanelVisibility(submenu, isExpanded);
                        };

                        if (! toggle) {
                            toggle = document.createElement('button');
                            toggle.type = 'button';
                            toggle.className = 'mirror-nav-toggle';
                            toggle.id = buttonId;
                            toggle.setAttribute('aria-controls', submenu.id || `${buttonId}-panel`);

                            if (! submenu.id) {
                                submenu.id = `${buttonId}-panel`;
                            }

                            link.insertAdjacentElement('afterend', toggle);

                            toggle.addEventListener('click', (event) => {
                                event.preventDefault();
                                applyExpandedState(toggle?.getAttribute('aria-expanded') !== 'true');
                            });
                        }

                        applyExpandedState(isInitiallyOpen);
                    });

                    widget.dataset.mirrorNavReady = 'true';
                };

                const removeRecaptchaArtifacts = () => {
                    document.querySelectorAll('script[src*="recaptcha"], script[id*="recaptcha"]').forEach((node) => node.remove());
                    document.querySelectorAll('script').forEach((node) => {
                        if ((node.textContent || '').includes('wpcf7_recaptcha') || (node.textContent || '').includes('grecaptcha')) {
                            node.remove();
                        }
                    });
                    document.querySelectorAll('.grecaptcha-badge, iframe[src*="recaptcha"]').forEach((node) => node.remove());
                };

                const normalizeVideoUrl = (rawUrl) => {
                    if (! rawUrl) {
                        return null;
                    }

                    try {
                        const parsed = new URL(rawUrl);
                        const hostname = parsed.hostname.replace(/^www\./, '');

                        if (hostname === 'youtu.be') {
                            const videoId = parsed.pathname.replace(/^\//, '');

                            if (! videoId) {
                                return null;
                            }

                            const embedUrl = new URL(`https://www.youtube.com/embed/${videoId}`);
                            const start = parsed.searchParams.get('t') ?? parsed.searchParams.get('start');

                            if (start) {
                                embedUrl.searchParams.set('start', start.replace(/s$/i, ''));
                            }

                            return embedUrl.toString();
                        }

                        if (hostname === 'youtube.com' || hostname === 'm.youtube.com' || hostname === 'youtube-nocookie.com') {
                            const watchId = parsed.searchParams.get('v');

                            if (watchId) {
                                const embedUrl = new URL(`https://www.youtube.com/embed/${watchId}`);
                                const start = parsed.searchParams.get('t') ?? parsed.searchParams.get('start');

                                if (start) {
                                    embedUrl.searchParams.set('start', start.replace(/s$/i, ''));
                                }

                                return embedUrl.toString();
                            }

                            if (parsed.pathname.startsWith('/embed/')) {
                                return parsed.toString();
                            }
                        }

                        if (hostname === 'vimeo.com' || hostname === 'player.vimeo.com') {
                            const videoId = parsed.pathname.split('/').filter(Boolean).pop();

                            if (! videoId) {
                                return null;
                            }

                            return `https://player.vimeo.com/video/${videoId}`;
                        }
                    } catch (error) {
                        return null;
                    }

                    return null;
                };

                const withAutoplay = (rawUrl) => {
                    const embedUrl = normalizeVideoUrl(rawUrl) ?? rawUrl;

                    if (! embedUrl) {
                        return null;
                    }

                    try {
                        const parsed = new URL(embedUrl);
                        parsed.searchParams.set('autoplay', '1');
                        parsed.searchParams.set('playsinline', '1');

                        if (/youtube(?:-nocookie)?\.com$/i.test(parsed.hostname)) {
                            parsed.searchParams.set('rel', parsed.searchParams.get('rel') || '0');
                            parsed.searchParams.set('controls', parsed.searchParams.get('controls') || '1');
                        }

                        return parsed.toString();
                    } catch (error) {
                        return embedUrl;
                    }
                };

                const videoFallbackUrl = (rawUrl) => {
                    const embedUrl = normalizeVideoUrl(rawUrl) ?? rawUrl;

                    if (! embedUrl) {
                        return null;
                    }

                    try {
                        const parsed = new URL(embedUrl);
                        const hostname = parsed.hostname.replace(/^www\./, '');

                        if (hostname === 'youtube.com' || hostname === 'youtube-nocookie.com' || hostname === 'm.youtube.com') {
                            if (parsed.pathname.startsWith('/embed/')) {
                                const videoId = parsed.pathname.split('/').filter(Boolean).pop();

                                return videoId ? `https://www.youtube.com/watch?v=${videoId}` : embedUrl;
                            }

                            return embedUrl;
                        }

                        if (hostname === 'player.vimeo.com' && parsed.pathname.startsWith('/video/')) {
                            const videoId = parsed.pathname.split('/').filter(Boolean).pop();

                            return videoId ? `https://vimeo.com/${videoId}` : embedUrl;
                        }
                    } catch (error) {
                        return embedUrl;
                    }

                    return embedUrl;
                };

                let popupVideoModal = null;
                let popupVideoFrame = null;
                let popupVideoDialog = null;
                let popupVideoLastTrigger = null;

                const closePopupVideo = () => {
                    if (! popupVideoModal || ! popupVideoFrame) {
                        return;
                    }

                    popupVideoFrame.src = 'about:blank';
                    popupVideoModal.hidden = true;
                    document.body.classList.remove('mirror-popup-video-open');

                    if (popupVideoLastTrigger instanceof HTMLElement) {
                        popupVideoLastTrigger.focus();
                    }
                };

                const ensurePopupVideoModal = () => {
                    if (popupVideoModal) {
                        return;
                    }

                    popupVideoModal = document.createElement('div');
                    popupVideoModal.className = 'mirror-popup-video-modal';
                    popupVideoModal.hidden = true;
                    popupVideoModal.innerHTML = `
                        <div class="mirror-popup-video-dialog" role="dialog" aria-modal="true">
                            <button type="button" class="mirror-popup-video-close" aria-label="Close video">&times;</button>
                            <div class="mirror-popup-video-frame-wrap">
                                <iframe allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
                            </div>
                        </div>
                    `;

                    popupVideoDialog = popupVideoModal.querySelector('.mirror-popup-video-dialog');
                    popupVideoFrame = popupVideoModal.querySelector('iframe');

                    popupVideoModal.addEventListener('click', (event) => {
                        if (event.target === popupVideoModal) {
                            closePopupVideo();
                        }
                    });

                    popupVideoModal.querySelector('.mirror-popup-video-close')?.addEventListener('click', closePopupVideo);

                    document.addEventListener('keydown', (event) => {
                        if (event.key === 'Escape' && popupVideoModal && ! popupVideoModal.hidden) {
                            closePopupVideo();
                        }
                    });

                    document.body.appendChild(popupVideoModal);
                };

                const openPopupVideo = (video, trigger) => {
                    ensurePopupVideoModal();

                    const src = withAutoplay(video?.src || '');

                    if (! popupVideoModal || ! popupVideoFrame || ! popupVideoDialog || ! src) {
                        return;
                    }

                    popupVideoLastTrigger = trigger instanceof HTMLElement ? trigger : null;
                    popupVideoDialog.setAttribute('aria-label', video?.title || 'Video player');
                    popupVideoFrame.title = video?.title || 'Video player';
                    popupVideoFrame.src = src;
                    popupVideoModal.hidden = false;
                    document.body.classList.add('mirror-popup-video-open');
                    popupVideoModal.querySelector('.mirror-popup-video-close')?.focus();
                };

                const popupIdFromHref = (href) => {
                    if (! href || ! href.includes('popup')) {
                        return null;
                    }

                    try {
                        const decoded = decodeURIComponent(href.replace(/^#/, ''));
                        const settings = decoded.split('settings=')[1];

                        if (! settings) {
                            return null;
                        }

                        const parsed = JSON.parse(window.atob(settings));

                        return parsed?.id ? String(parsed.id) : null;
                    } catch (error) {
                        return null;
                    }
                };

                const hydratePopupVideoLinks = (wrapper) => {
                    wrapper.querySelectorAll('a[href*="elementor-action"], a[href^="#elementor-action"]').forEach((link) => {
                        if (link.dataset.mirrorPopupReady === 'true') {
                            return;
                        }

                        const popupId = popupIdFromHref(link.getAttribute('href'));
                        const video = popupId ? popupVideoMap[popupId] : null;

                        if (! popupId || ! video) {
                            return;
                        }

                        const fallbackUrl = videoFallbackUrl(video.src);

                        if (fallbackUrl) {
                            link.href = fallbackUrl;
                            link.target = '_blank';
                            link.rel = 'noopener noreferrer';
                        }

                        if (! link.getAttribute('aria-label')) {
                            link.setAttribute('aria-label', `Play ${video.title}`);
                        }

                        link.addEventListener('click', (event) => {
                            event.preventDefault();
                            openPopupVideo(video, link);
                        });

                        link.dataset.mirrorPopupReady = 'true';
                    });
                };

                const hydrateVideoWidgets = (wrapper) => {
                    wrapper.querySelectorAll('.elementor-widget-video[data-settings]').forEach((widget) => {
                        const videoHost = widget.querySelector('.elementor-video');

                        if (! videoHost) {
                            return;
                        }

                        if (videoHost.tagName === 'IFRAME' || widget.querySelector('iframe.elementor-video')) {
                            return;
                        }

                        let settings = null;

                        try {
                            settings = JSON.parse(widget.dataset.settings || '{}');
                        } catch (error) {
                            return;
                        }

                        const embedUrl = normalizeVideoUrl(settings.youtube_url || settings.vimeo_url || settings.hosted_url || '');

                        if (! embedUrl) {
                            return;
                        }

                        const iframe = document.createElement('iframe');
                        iframe.className = videoHost.className || 'elementor-video';
                        iframe.src = embedUrl;
                        iframe.title = settings.title || 'Embedded video';
                        iframe.width = '640';
                        iframe.height = '360';
                        iframe.frameBorder = '0';
                        iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share';
                        iframe.referrerPolicy = 'strict-origin-when-cross-origin';
                        iframe.allowFullscreen = true;
                        iframe.loading = 'lazy';

                        videoHost.replaceWith(iframe);
                    });
                };

                const parseWidgetSettings = (node) => {
                    if (!node?.dataset?.settings) {
                        return {};
                    }

                    try {
                        return JSON.parse(node.dataset.settings);
                    } catch (error) {
                        return {};
                    }
                };

                const boolSetting = (value, fallback = false) => {
                    if (typeof value === 'boolean') {
                        return value;
                    }

                    if (typeof value === 'string') {
                        return value.toLowerCase() === 'yes' || value.toLowerCase() === 'true';
                    }

                    return fallback;
                };

                const initSlides = (widget) => {
                    if (widget.dataset.mirrorSlidesReady === 'true') {
                        return;
                    }

                    const settings = parseWidgetSettings(widget);
                    const container = widget.querySelector('.elementor-main-swiper.swiper');
                    const wrapper = widget.querySelector('.swiper-wrapper.elementor-slides');
                    const slides = Array.from(widget.querySelectorAll('.swiper-slide'));
                    const prev = widget.querySelector('.elementor-swiper-button-prev');
                    const next = widget.querySelector('.elementor-swiper-button-next');
                    const pagination = widget.querySelector('.swiper-pagination');

                    if (!container || !wrapper || slides.length === 0) {
                        return;
                    }

                    const transition = settings.transition === 'fade' ? 'fade' : 'slide';
                    const transitionSpeed = Number(settings.transition_speed || 500);
                    const autoplayEnabled = boolSetting(settings.autoplay, slides.length > 1);
                    const pauseOnHover = boolSetting(settings.pause_on_hover, true);
                    const autoplaySpeed = Number(settings.autoplay_speed || 5000);

                    let index = 0;
                    let intervalId = null;
                    let touchStartX = null;
                    let bullets = [];

                    container.style.overflow = 'hidden';

                    if (transition === 'fade') {
                        container.style.position = 'relative';
                        wrapper.style.display = 'block';
                        wrapper.style.transform = 'none';

                        slides.forEach((slide) => {
                            slide.style.position = 'absolute';
                            slide.style.inset = '0';
                            slide.style.width = '100%';
                            slide.style.transition = `opacity ${transitionSpeed}ms ease`;
                        });
                    } else {
                        wrapper.style.display = 'flex';
                        wrapper.style.transitionProperty = 'transform';
                        wrapper.style.transitionTimingFunction = 'ease';
                        wrapper.style.willChange = 'transform';

                        slides.forEach((slide) => {
                            slide.style.flex = '0 0 100%';
                            slide.style.width = '100%';
                        });
                    }

                    const render = (nextIndex) => {
                        index = (nextIndex + slides.length) % slides.length;

                        if (transition === 'fade') {
                            slides.forEach((slide, slideIndex) => {
                                const isActive = slideIndex === index;
                                slide.style.opacity = isActive ? '1' : '0';
                                slide.style.pointerEvents = isActive ? 'auto' : 'none';
                                slide.classList.toggle('swiper-slide-active', isActive);
                                slide.classList.toggle('swiper-slide-next', slideIndex === (index + 1) % slides.length);
                                slide.classList.toggle('swiper-slide-prev', slideIndex === (index - 1 + slides.length) % slides.length);
                                slide.setAttribute('aria-hidden', isActive ? 'false' : 'true');
                            });
                        } else {
                            wrapper.style.transitionDuration = `${transitionSpeed}ms`;
                            wrapper.style.transform = `translate3d(-${index * 100}%, 0, 0)`;

                            slides.forEach((slide, slideIndex) => {
                                const isActive = slideIndex === index;
                                slide.classList.toggle('swiper-slide-active', isActive);
                                slide.classList.toggle('swiper-slide-next', slideIndex === (index + 1) % slides.length);
                                slide.classList.toggle('swiper-slide-prev', slideIndex === (index - 1 + slides.length) % slides.length);
                                slide.setAttribute('aria-hidden', isActive ? 'false' : 'true');
                            });
                        }

                        bullets.forEach((bullet, bulletIndex) => {
                            const isActive = bulletIndex === index;
                            bullet.classList.toggle('swiper-pagination-bullet-active', isActive);
                            bullet.setAttribute('aria-current', isActive ? 'true' : 'false');
                        });
                    };

                    const stopAutoplay = () => {
                        if (intervalId !== null) {
                            window.clearInterval(intervalId);
                            intervalId = null;
                        }
                    };

                    const startAutoplay = () => {
                        stopAutoplay();

                        if (!autoplayEnabled || slides.length < 2) {
                            return;
                        }

                        intervalId = window.setInterval(() => {
                            render(index + 1);
                        }, autoplaySpeed);
                    };

                    const restartAutoplay = () => {
                        startAutoplay();
                    };

                    if (pagination) {
                        pagination.innerHTML = '';
                        bullets = slides.map((_, slideIndex) => {
                            const bullet = document.createElement('button');
                            bullet.type = 'button';
                            bullet.className = 'swiper-pagination-bullet';
                            bullet.setAttribute('aria-label', `Go to slide ${slideIndex + 1}`);
                            bullet.addEventListener('click', () => {
                                render(slideIndex);
                                restartAutoplay();
                            });
                            pagination.appendChild(bullet);

                            return bullet;
                        });
                    }

                    prev?.addEventListener('click', () => {
                        render(index - 1);
                        restartAutoplay();
                    });

                    next?.addEventListener('click', () => {
                        render(index + 1);
                        restartAutoplay();
                    });

                    if (pauseOnHover) {
                        widget.addEventListener('mouseenter', stopAutoplay);
                        widget.addEventListener('mouseleave', startAutoplay);
                    }

                    container.addEventListener('touchstart', (event) => {
                        touchStartX = event.changedTouches[0]?.clientX ?? null;
                    }, { passive: true });

                    container.addEventListener('touchend', (event) => {
                        const touchEndX = event.changedTouches[0]?.clientX ?? null;

                        if (touchStartX === null || touchEndX === null) {
                            return;
                        }

                        const delta = touchStartX - touchEndX;
                        touchStartX = null;

                        if (Math.abs(delta) < 30) {
                            return;
                        }

                        render(delta > 0 ? index + 1 : index - 1);
                        restartAutoplay();
                    }, { passive: true });

                    render(0);
                    startAutoplay();
                    widget.dataset.mirrorSlidesReady = 'true';
                };

                ready(() => {
                    const wrapper = document.querySelector(wrapperSelector);

                    if (! wrapper) {
                        return;
                    }

                    wrapper.querySelectorAll('.e-n-tabs').forEach(initNestedTabs);
                    wrapper.querySelectorAll('.elementor-tabs').forEach(initClassicTabs);
                    wrapper.querySelectorAll('.elementor-accordion').forEach((widget) => initAccordionWidget(widget, false));
                    wrapper.querySelectorAll('.elementor-toggle').forEach((widget) => initAccordionWidget(widget, true));
                    wrapper.querySelectorAll('.uael-faq-container[data-layout="accordion"], .uael-faq-container.uael-faq-layout-accordion').forEach(initUaelAccordion);
                    wrapper.querySelectorAll('.elementor-widget-nav-menu').forEach(initNavMenus);
                    wrapper.querySelectorAll('.elementor-widget-slides').forEach(initSlides);
                    hydratePopupVideoLinks(wrapper);
                    hydrateVideoWidgets(wrapper);
                    removeRecaptchaArtifacts();
                });
            })();
        </script>
    @endpush

    @if ($titleHolder)
        @php
            $titleHolderClasses = trim('eltdf-title-holder ' . ($titleHolder['classes'] ?? ''));
            $titleHolderHeight = isset($titleHolder['height']) ? (int) $titleHolder['height'] : 400;
            $titleHolderBackgroundColor = $titleHolder['background_color'] ?? '#828282';
            $titleHolderBackgroundImage = $resolveAssetUrl($titleHolder['background_image'] ?? null);
            $titleHolderImage = $resolveAssetUrl($titleHolder['image'] ?? null);
            $titleHolderImageAlt = $titleHolder['image_alt'] ?? '';
            $titleHolderText = $titleHolder['title'] ?? $page->title;
            $titleHolderTextColor = $titleHolder['title_color'] ?? '#ffffff';
            $titleHolderStyle = 'height: ' . $titleHolderHeight . 'px;background-color: ' . $titleHolderBackgroundColor . ';';

            if ($titleHolderBackgroundImage) {
                $titleHolderStyle .= 'background-image:url(' . e($titleHolderBackgroundImage) . ');';
            }
        @endphp

        <div class="{{ $titleHolderClasses }}" style="{{ $titleHolderStyle }}" data-height="{{ $titleHolderHeight }}">
            @if ($titleHolderImage)
                <div class="eltdf-title-image">
                    <img itemprop="image" src="{{ $titleHolderImage }}" alt="{{ $titleHolderImageAlt }}">
                </div>
            @endif
            <div class="eltdf-title-wrapper">
                <div class="eltdf-title-inner">
                    <div class="eltdf-grid">
                        <h2 class="eltdf-page-title entry-title" style="color: {{ $titleHolderTextColor }}">{{ $titleHolderText }}</h2>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="{{ $wrapperClass }}">
        @if (session('success') || session('error') || $errors->any())
            <div class="max-w-[1140px] mx-auto px-4 py-6">
                @if (session('success'))
                    <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800 @if(session('success')) mt-4 @endif">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800 @if(session('success') || session('error')) mt-4 @endif">
                        <strong>Please correct the following issues:</strong>
                        <ul class="mt-2 list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        @endif

        <div class="eltdf-container">
            <div class="eltdf-container-inner clearfix">
                <div class="eltdf-grid-row eltdf-grid-medium-gutter">
                    <div class="eltdf-page-content-holder eltdf-grid-col-12">
                        <{{ $root['tag'] ?? 'div' }}
                            class="{{ $root['class'] ?? 'elementor' }}"
                            data-elementor-type="{{ $root['data_elementor_type'] ?? 'wp-page' }}"
                            data-elementor-id="{{ $root['data_elementor_id'] ?? '' }}"
                        >
                            {!! $bodyHtml !!}
                        </{{ $root['tag'] ?? 'div' }}>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.cms>
