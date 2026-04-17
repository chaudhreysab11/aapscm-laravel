<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    {{-- ----------------------------------------------------------------
         TF-01: Standard Content
         Hero + content blocks. Breadcrumb in the header bar.
    ---------------------------------------------------------------- --}}
    <div class="bg-[#0B2F5E] text-white py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <nav aria-label="Breadcrumb" class="text-sm text-blue-300 mb-4">
                <ol class="flex items-center gap-2">
                    <li><a href="{{ url('/') }}" class="hover:text-yellow-400 transition-colors">Home</a></li>
                    <li aria-hidden="true" class="text-blue-500">/</li>
                    <li class="text-white" aria-current="page">{{ $page->title }}</li>
                </ol>
            </nav>

            <h1 class="text-3xl sm:text-4xl font-bold leading-tight">{{ $page->title }}</h1>

            @if ($page->excerpt)
                <p class="mt-4 text-lg text-blue-100 leading-relaxed max-w-2xl">
                    {{ $page->excerpt }}
                </p>
            @endif
        </div>
    </div>

    <main>
        <x-cms.blocks-renderer :blocks="$page->blocks ?? []" />

        @if (empty($page->blocks))
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center text-gray-400">
                <p>Content coming soon.</p>
            </div>
        @endif
    </main>

</x-layouts.cms>
