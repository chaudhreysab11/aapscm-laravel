<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    {{-- ----------------------------------------------------------------
         TF-02: Hero Landing
         First block is always a hero banner. Remaining blocks follow.
         No separate header bar — the hero block provides the header.
    ---------------------------------------------------------------- --}}
    <main>
        @if (!empty($page->blocks))
            <x-cms.blocks-renderer :blocks="$page->blocks" />
        @else
            {{-- Fallback hero when no blocks are configured yet --}}
            <section class="bg-gradient-to-br from-[#0B2F5E] to-[#1a4a8a] text-white py-20 sm:py-28">
                <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h1 class="text-4xl sm:text-5xl font-extrabold leading-tight mb-6">
                        {{ $page->title }}
                    </h1>
                    @if ($page->excerpt)
                        <p class="text-xl text-blue-100 leading-relaxed max-w-2xl mx-auto">
                            {{ $page->excerpt }}
                        </p>
                    @endif
                </div>
            </section>
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center text-gray-400">
                <p>Content coming soon.</p>
            </div>
        @endif
    </main>

</x-layouts.cms>
