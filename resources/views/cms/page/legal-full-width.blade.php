<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    {{-- ----------------------------------------------------------------
         TF-03: Legal / Full Width
         No hero. Full-width article. Rich text and accordions only.
    ---------------------------------------------------------------- --}}
    <div class="bg-gray-50 border-b border-gray-200 py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <nav aria-label="Breadcrumb" class="text-sm text-gray-500 mb-3">
                <ol class="flex items-center gap-2">
                    <li><a href="{{ url('/') }}" class="hover:text-[#0B2F5E] transition-colors">Home</a></li>
                    <li aria-hidden="true" class="text-gray-400">/</li>
                    <li class="text-gray-700" aria-current="page">{{ $page->title }}</li>
                </ol>
            </nav>

            <h1 class="text-3xl sm:text-4xl font-bold text-[#0B2F5E] leading-tight">
                {{ $page->title }}
            </h1>
            @if ($page->excerpt)
                <p class="mt-2 text-gray-600">{{ $page->excerpt }}</p>
            @endif
        </div>
    </div>

    <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @if (!empty($page->blocks))
            <x-cms.blocks-renderer :blocks="$page->blocks" />
        @else
            <p class="text-gray-400 text-center py-8">Content coming soon.</p>
        @endif
    </main>

</x-layouts.cms>
