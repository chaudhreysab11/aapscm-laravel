<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $hero      = $page->page_data['hero']       ?? [];
        $badgeBand = $page->page_data['badge_band'] ?? [];
        $courses   = $page->page_data['courses']    ?? [];
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- Hero --}}
    <section class="bg-white py-14">
        <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            <div>
                @if (! empty($hero['image_left']))
                    <img src="{{ $hero['image_left'] }}" alt="" class="w-full max-w-[510px] h-auto mb-6">
                @endif
                <h2 class="text-[32px] md:text-[42px] font-semibold text-[#14166e] leading-tight mb-4">
                    {{ $hero['heading'] ?? 'Influencing Suppliers' }}
                </h2>
                @if (! empty($hero['subheading']))
                    <h4 class="text-[18px] md:text-[20px] text-gray-700 mb-6 leading-relaxed">{{ $hero['subheading'] }}</h4>
                @endif
                @if (! empty($hero['cta_label']))
                    <a href="{{ $hero['cta_url'] ?? '#' }}"
                       class="inline-flex items-center gap-2 bg-[#14166e] hover:bg-[#0f1157] text-white text-[14px] font-semibold px-5 py-2.5 rounded transition-colors">
                        {{ $hero['cta_label'] }}
                    </a>
                @endif
            </div>
            @if (! empty($hero['image_right']))
                <img src="{{ $hero['image_right'] }}" alt="" class="w-full max-w-[509px] h-auto rounded-lg shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px]">
            @endif
        </div>
    </section>

    {{-- Register band --}}
    @if (! empty($badgeBand['image']))
        <section class="bg-[#f6f8fb] py-10">
            <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-3 gap-6 items-center">
                <img src="{{ $badgeBand['image'] }}" alt="" class="w-full max-w-[280px] h-auto">
                <div></div>
                <div class="text-right">
                    <a href="{{ $badgeBand['cta_url'] ?? '#' }}"
                       class="inline-flex items-center gap-2 bg-[#14166e] hover:bg-[#0f1157] text-white text-[14px] font-semibold px-5 py-2.5 rounded transition-colors">
                        {{ $badgeBand['cta_label'] ?? 'Register Now' }}
                    </a>
                </div>
            </div>
        </section>
    @endif

    {{-- Courses --}}
    @foreach ($courses as $i => $c)
        @if ($i > 0)
            <div class="border-t border-dashed border-gray-300 max-w-[1100px] mx-auto"></div>
        @endif
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-3 gap-10 items-start">
                <div class="md:col-span-2">
                    <h2 class="text-[26px] md:text-[32px] font-semibold text-[#14166e] mb-5">{{ $c['heading'] }}</h2>
                    <ul class="space-y-3">
                        @foreach ($c['items'] ?? [] as $item)
                            <li class="flex items-start gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#14166e" viewBox="0 0 20 20" class="w-5 h-5 mt-1 flex-shrink-0"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                <span class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                    @if (! empty($c['footer_note']))
                        <h4 class="mt-6 text-[18px] md:text-[20px] text-gray-700">{{ $c['footer_note'] }}</h4>
                    @endif
                </div>
                <div class="md:col-span-1">
                    @if (! empty($c['image']))
                        <img src="{{ $c['image'] }}" alt="" class="w-full h-auto rounded-lg mb-4 shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px]">
                    @endif
                    @if (! empty($c['cta_label']))
                        <a href="{{ $c['cta_url'] ?? '#' }}"
                           class="block w-full text-center bg-[#14166e] hover:bg-[#0f1157] text-white text-[14px] font-semibold px-5 py-2.5 rounded transition-colors">
                            {{ $c['cta_label'] }}
                        </a>
                    @endif
                </div>
            </div>
        </section>
    @endforeach

</x-layouts.cms>
