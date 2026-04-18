<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $hero    = $page->page_data['hero']    ?? [];
        $schools = $page->page_data['schools'] ?? [];
        $footer  = $page->page_data['footer']  ?? [];
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- Hero headings --}}
    <section class="bg-[#fef5ef] py-14">
        <div class="max-w-[1100px] mx-auto px-4 text-center">
            <h3 class="text-[28px] md:text-[36px] font-semibold text-[#14166e] leading-tight mb-3">
                {{ $hero['heading'] ?? 'Training School Affiliated' }}
            </h3>
            @if (! empty($hero['subheading']))
                <h3 class="text-[18px] md:text-[22px] font-medium text-gray-700">
                    {{ $hero['subheading'] }}
                </h3>
            @endif
        </div>
    </section>

    {{-- Schools grid --}}
    <section class="bg-white py-14">
        <div class="max-w-[1200px] mx-auto px-4 grid sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach ($schools as $school)
                <div class="bg-white border border-gray-200 rounded-lg p-6 text-center shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px] flex flex-col items-center">
                    <div class="flex items-center justify-center h-[140px] w-full mb-4">
                        @if (! empty($school['url']))
                            <a href="{{ $school['url'] }}" target="_blank" rel="noopener">
                                <img src="{{ $school['image'] }}" alt="{{ $school['name'] }}" class="max-h-[140px] max-w-full object-contain">
                            </a>
                        @else
                            <img src="{{ $school['image'] }}" alt="{{ $school['name'] }}" class="max-h-[140px] max-w-full object-contain">
                        @endif
                    </div>
                    <h2 class="text-[18px] md:text-[20px] font-semibold text-[#14166e] leading-snug">
                        @if (! empty($school['url']))
                            <a href="{{ $school['url'] }}" target="_blank" rel="noopener" class="hover:underline">
                                {!! $school['name_html'] ?? e($school['name']) !!}
                            </a>
                        @else
                            {!! $school['name_html'] ?? e($school['name']) !!}
                        @endif
                    </h2>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Footer row: UE logo already in grid; separately render Non-Affiliate + CTA --}}
    <section class="bg-[#f6f8fb] py-14">
        <div class="max-w-[1200px] mx-auto px-4 grid sm:grid-cols-2 md:grid-cols-3 gap-8 items-center">
            <div></div>
            <div class="text-center">
                <h2 class="text-[20px] md:text-[24px] font-semibold text-[#14166e]">
                    <a href="{{ $footer['non_affiliate_url'] ?? '/my-account/' }}" class="hover:underline">
                        {{ $footer['non_affiliate_label'] ?? 'Non-Affiliate' }}
                    </a>
                </h2>
            </div>
            <div class="text-center">
                <span class="inline-flex items-center gap-2 bg-[#14166e] text-white text-[14px] font-semibold px-5 py-2 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                    {{ $footer['cta_label'] ?? 'Individual Registration' }}
                </span>
            </div>
        </div>
    </section>

</x-layouts.cms>
