<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    {{-- ----------------------------------------------------------------
         TF-04: Sidebar Guide
         Two-column layout: main content area + right-hand sidebar nav.
         page_data.sidebar_items = [{ label, url }]
    ---------------------------------------------------------------- --}}
    @php
        $sidebarItems = $page->page_data['sidebar_items'] ?? [];
    @endphp

    <div class="bg-[#0B2F5E] text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

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

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col lg:flex-row gap-10">

            {{-- Main content --}}
            <main class="lg:w-2/3">
                @if (!empty($page->blocks))
                    <x-cms.blocks-renderer :blocks="$page->blocks" />
                @else
                    <p class="text-gray-400 text-center py-8">Content coming soon.</p>
                @endif
            </main>

            {{-- Sidebar --}}
            <aside class="lg:w-1/3">
                @if (!empty($sidebarItems))
                    <nav aria-label="Guide navigation"
                         class="sticky top-6 bg-[#f8f9fc] border border-gray-200 rounded-xl p-6 shadow-sm">
                        <h2 class="text-sm font-bold text-[#0B2F5E] uppercase tracking-wider mb-4">
                            In This Section
                        </h2>
                        <ul class="space-y-2">
                            @foreach ($sidebarItems as $item)
                                <li>
                                    <a href="{{ $item['url'] ?? '#' }}"
                                       class="block text-sm text-gray-600 hover:text-[#0B2F5E] hover:font-semibold transition-colors py-1 border-l-2 border-transparent hover:border-yellow-400 pl-3">
                                        {{ $item['label'] ?? '' }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                @endif
            </aside>

        </div>
    </div>

</x-layouts.cms>
