{{--
    Shared block dispatcher.

    Usage:
        <x-cms.blocks-renderer :blocks="$page->blocks" />

    Each block must have:
        type  – maps to resources/views/components/blocks/{type}.blade.php
                (underscores are converted to dashes e.g. rich_text → rich-text)
        data  – array passed as $data to the component
--}}
@props(['blocks' => []])

@if (!empty($blocks))
    @foreach ($blocks as $block)
        @php
            $componentName = 'blocks.' . str_replace('_', '-', $block['type'] ?? '');
            $blockData     = $block['data'] ?? [];
        @endphp

        @if ($loop->index < 50)
            {{-- Safety cap: never render more than 50 blocks on a single page --}}
            <x-dynamic-component :component="$componentName" :data="$blockData" />
        @endif
    @endforeach
@endif
