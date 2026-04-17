<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    {{-- ----------------------------------------------------------------
         TF-06: Membership Tier
         Blocks + optional access gate notice for gated pages.
    ---------------------------------------------------------------- --}}
    <div class="bg-[#0B2F5E] text-white py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <nav aria-label="Breadcrumb" class="text-sm text-blue-300 mb-4">
                <ol class="flex items-center gap-2">
                    <li><a href="{{ url('/') }}" class="hover:text-yellow-400 transition-colors">Home</a></li>
                    <li aria-hidden="true" class="text-blue-500">/</li>
                    @if ($page->parent)
                        <li>
                            <a href="{{ route('cms.page', $page->parent->slug) }}" class="hover:text-yellow-400 transition-colors">
                                {{ $page->parent->title }}
                            </a>
                        </li>
                        <li aria-hidden="true" class="text-blue-500">/</li>
                    @endif
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

    {{-- Access gate notice for authenticated members --}}
    @if ($page->membership_tier_id !== null && auth()->check())
        <div class="bg-green-50 border-b border-green-200 py-3">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                <p class="text-sm text-green-700 flex items-center gap-2">
                    <x-heroicon-o-check-badge class="w-4 h-4" />
                    Member content — you have access as a current member.
                </p>
            </div>
        </div>
    @endif

    <main>
        @if (!empty($page->blocks))
            <x-cms.blocks-renderer :blocks="$page->blocks" />
        @else
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center text-gray-400">
                <p>Content coming soon.</p>
            </div>
        @endif
    </main>

</x-layouts.cms>
