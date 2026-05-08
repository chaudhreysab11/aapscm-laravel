@props(['page'])

{{--
    SEO meta injection component for CMS pages.
    Receives $page (App\Models\Page) — seoMeta relation must already be loaded.
--}}

@push('title'){{ $page->effective_seo_title }}@endpush

@push('head')
    {{-- Primary meta --}}
    @if ($page->effective_seo_description)
        <meta name="description" content="{{ $page->effective_seo_description }}">
    @endif

    {{-- Robots --}}
    @if ($page->seoMeta?->robots)
        <meta name="robots" content="{{ $page->seoMeta->robots }}">
    @endif

    {{-- Canonical --}}
    @if ($page->seoMeta?->canonical_url)
        <link rel="canonical" href="{{ $page->seoMeta->canonical_url }}">
    @else
        <link rel="canonical" href="{{ url()->current() }}">
    @endif

    {{-- Open Graph --}}
    <meta property="og:type"        content="website">
    <meta property="og:url"         content="{{ url()->current() }}">
    <meta property="og:title"       content="{{ $page->seoMeta?->og_title ?? $page->effective_seo_title }}">
    <meta property="og:description" content="{{ $page->seoMeta?->og_description ?? $page->effective_seo_description }}">
    @if ($page->seoMeta?->og_image)
        <meta property="og:image" content="{{ $page->seoMeta->og_image }}">
    @endif

    {{-- Twitter Card --}}
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="{{ $page->seoMeta?->og_title ?? $page->effective_seo_title }}">
    <meta name="twitter:description" content="{{ $page->seoMeta?->og_description ?? $page->effective_seo_description }}">
    @if ($page->seoMeta?->og_image)
        <meta name="twitter:image" content="{{ $page->seoMeta->og_image }}">
    @endif
@endpush
