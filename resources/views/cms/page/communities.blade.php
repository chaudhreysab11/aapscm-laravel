<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    {{-- ----------------------------------------------------------------
         TF-07: Communities
         page_data.filter_type:        all | regional | special_interest | industry | chapter
         page_data.communities_heading: override heading text
    ---------------------------------------------------------------- --}}
    @php
        $filterType = $page->page_data['filter_type'] ?? 'all';

        $query = \App\Models\Community::active()->ordered();
        if ($filterType !== 'all') {
            $query->byType($filterType);
        }
        $communities = $query->get();

        $heading = $page->page_data['communities_heading'] ?? 'Our Communities';
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- Intro blocks (optional) --}}
    @if (!empty($page->blocks))
        <x-cms.blocks-renderer :blocks="$page->blocks" />
    @endif

    {{-- Communities listing --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <h2 class="text-2xl font-bold text-[#14166e] mb-8">{{ $heading }}</h2>

        @if ($communities->isNotEmpty())

            @php
                $grouped = $filterType === 'all'
                    ? $communities->groupBy('community_type')
                    : collect([$filterType => $communities]);
            @endphp

            @foreach ($grouped as $type => $group)
                @if ($filterType === 'all')
                    <h3 class="text-lg font-semibold text-gray-500 uppercase tracking-wide mb-4 mt-8">
                        {{ ucfirst(str_replace('_', ' ', $type)) }}
                    </h3>
                @endif

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                    @foreach ($group as $community)
                        <article class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm hover:shadow-md transition-shadow">
                            <h4 class="text-base font-bold text-[#14166e] mb-1">{{ $community->name }}</h4>

                            @if ($community->region)
                                <p class="text-xs text-gray-500 mb-3 flex items-center gap-1">
                                    <x-heroicon-o-map-pin class="w-3 h-3" />
                                    {{ $community->region }}
                                </p>
                            @endif

                            @if ($community->community_description)
                                <p class="text-sm text-gray-600 leading-relaxed">
                                    {{ \Illuminate\Support\Str::limit($community->community_description, 160) }}
                                </p>
                            @endif
                        </article>
                    @endforeach
                </div>
            @endforeach

        @else
            <p class="text-gray-400 text-center py-12">No communities listed yet.</p>
        @endif

    </div>

</x-layouts.cms>
