<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $sidebarItems = $page->page_data['sidebar_items'] ?? [];
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    <div class="max-w-[1200px] mx-auto px-4 py-12">
        <div class="flex flex-col lg:flex-row gap-10">

            <main class="lg:w-2/3">
                @if (! empty($page->blocks))
                    <x-cms.blocks-renderer :blocks="$page->blocks" />
                @else
                    <x-cms.wp-prose :content="$page->content" maxWidth="max-w-full" />
                @endif
            </main>

            <aside class="lg:w-1/3">
                @if (! empty($sidebarItems))
                    <nav aria-label="Guide navigation"
                         class="sticky top-6 bg-[#f8f9fc] border border-gray-200 rounded-xl p-6 shadow-sm">
                        <h2 class="text-sm font-bold text-[#14166e] uppercase tracking-wider mb-4">
                            In This Section
                        </h2>
                        <ul class="space-y-2">
                            @foreach ($sidebarItems as $item)
                                <li>
                                    <a href="{{ $item['url'] ?? '#' }}"
                                       class="block text-sm text-gray-600 hover:text-[#14166e] hover:font-semibold transition-colors py-1 border-l-2 border-transparent hover:border-[#14166e] pl-3">
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
