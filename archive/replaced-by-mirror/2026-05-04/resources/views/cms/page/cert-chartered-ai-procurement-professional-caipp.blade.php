@php
    $data = $page->page_data ?? [];
    $root = $data['root'] ?? [];
    $cssFiles = $data['css_files'] ?? [];
    $externalCssFiles = $data['external_css_files'] ?? [];
    $bodyHtml = $data['body_html'] ?? '';
@endphp

<x-layouts.cms>
    <x-cms.seo-head :page="$page" />

    @push('head')
        @foreach ($externalCssFiles as $href)
            <link rel="stylesheet" href="{{ $href }}">
        @endforeach

        @foreach ($cssFiles as $cssFile)
            <link rel="stylesheet" href="{{ asset($cssFile) }}">
        @endforeach
    @endpush

    <div class="caipp-live-mirror">
        <{{ $root['tag'] ?? 'div' }}
            class="{{ $root['class'] ?? 'elementor elementor-102246' }}"
            data-elementor-type="{{ $root['data_elementor_type'] ?? 'wp-page' }}"
            data-elementor-id="{{ $root['data_elementor_id'] ?? '102246' }}"
        >
            {!! $bodyHtml !!}
        </{{ $root['tag'] ?? 'div' }}>
    </div>
</x-layouts.cms>
