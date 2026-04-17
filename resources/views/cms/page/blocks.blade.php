<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    {{-- Render each block by dispatching to its Blade partial --}}
    @forelse ($page->blocks ?? [] as $block)
        @php
            $type = $block['type'] ?? '';
            $data = $block['data'] ?? [];
        @endphp

        @switch($type)

            @case('hero')
                @include('components.blocks.hero', ['data' => $data])
                @break

            @case('rich_text')
                @include('components.blocks.rich-text', ['data' => $data])
                @break

            @case('text_image')
                @include('components.blocks.text-image', ['data' => $data])
                @break

            @case('cards')
                @include('components.blocks.cards', ['data' => $data])
                @break

            @case('cta_banner')
                @include('components.blocks.cta-banner', ['data' => $data])
                @break

            @case('two_columns')
                @include('components.blocks.two-columns', ['data' => $data])
                @break

            @case('accordion')
                @include('components.blocks.accordion', ['data' => $data])
                @break

            @case('html')
                @include('components.blocks.html', ['data' => $data])
                @break

            @default
                {{-- Unknown block type — silently skip --}}

        @endswitch

    @empty

        {{-- Fallback for pages saved as 'blocks' but with no blocks yet --}}
        <div class="max-w-4xl mx-auto px-4 py-16 text-center text-gray-500">
            <p>This page has no content yet. Edit it in the admin panel to add content blocks.</p>
        </div>

    @endforelse

</x-layouts.cms>
