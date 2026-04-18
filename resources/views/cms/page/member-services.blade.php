<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $hero  = $page->page_data['hero']  ?? [];
        $cards = $page->page_data['cards'] ?? [];
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- Hero heading --}}
    <section class="bg-[#fef5ef] py-14">
        <div class="max-w-[1100px] mx-auto px-4 text-center">
            <h3 class="text-[32px] md:text-[44px] font-semibold text-[#14166e] leading-tight">
                {{ $hero['heading'] ?? 'Membership services' }}
            </h3>
        </div>
    </section>

    {{-- 2x2 cards grid --}}
    <section class="bg-white py-16">
        <div class="max-w-[1100px] mx-auto px-4 grid sm:grid-cols-2 gap-8">
            @foreach ($cards as $card)
                <div class="bg-[#f6f8fb] border border-gray-200 rounded-lg p-8 text-center shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px] flex flex-col items-center">
                    <img src="{{ $card['icon'] }}" alt="{{ $card['title'] }}" class="w-16 h-16 object-contain mb-4">
                    <h2 class="text-[22px] md:text-[24px] font-semibold text-[#14166e] mb-3">
                        {{ $card['title'] }}
                    </h2>
                    <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-6 flex-1">
                        {{ $card['body'] }}
                    </p>
                    <a href="{{ $card['cta_url'] }}"
                       class="inline-flex items-center gap-2 bg-[#14166e] hover:bg-[#0f1157] text-white text-[14px] font-semibold px-5 py-2.5 rounded transition-colors">
                        {{ $card['cta_label'] ?? 'Read more' }}
                    </a>
                </div>
            @endforeach
        </div>
    </section>

</x-layouts.cms>
