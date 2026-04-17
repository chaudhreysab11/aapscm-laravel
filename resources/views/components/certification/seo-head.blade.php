@props([
    'title',
    'description' => null,
    'canonical'   => null,
    'ogImage'     => null,
])

@push('title'){{ $title }} | @endpush

@push('head')
    @if ($description)
        <meta name="description" content="{{ $description }}">
    @endif

    <link rel="canonical" href="{{ $canonical ?? url()->current() }}">

    <meta property="og:type"        content="website">
    <meta property="og:url"         content="{{ $canonical ?? url()->current() }}">
    <meta property="og:title"       content="{{ $title }}">
    @if ($description)
        <meta property="og:description" content="{{ $description }}">
    @endif
    @if ($ogImage)
        <meta property="og:image" content="{{ $ogImage }}">
    @endif

    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="{{ $title }}">
    @if ($description)
        <meta name="twitter:description" content="{{ $description }}">
    @endif
    @if ($ogImage)
        <meta name="twitter:image" content="{{ $ogImage }}">
    @endif
@endpush
