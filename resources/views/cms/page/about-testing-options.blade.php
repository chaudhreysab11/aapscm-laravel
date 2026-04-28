@php
    $pageData = $page->page_data ?? [];
    $hero = $pageData['hero'] ?? [];
    $online = $pageData['online'] ?? [];
    $inperson = $pageData['inperson'] ?? [];
    $cta = $pageData['cta'] ?? [];
@endphp

<x-layouts.cms :page="$page">
    <x-cms.seo-head :page="$page" />

    {{-- Hero --}}
    @if (! empty($hero))
        <section class="bg-white py-14 md:py-20">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                @if (! empty($hero['heading_html']))
                    <h1 class="text-[28px] md:text-[40px] font-light text-[#14166e] leading-tight mb-5">
                        {!! $hero['heading_html'] !!}
                    </h1>
                    <div class="w-16 h-[3px] bg-[#e74c1d] mx-auto mb-6"></div>
                @endif
                @if (! empty($hero['lead_html']))
                    <h2 class="text-[18px] md:text-[20px] text-gray-700 leading-relaxed font-normal">
                        {!! $hero['lead_html'] !!}
                    </h2>
                @endif
            </div>
        </section>
    @endif

    {{-- Online Testing --}}
    @if (! empty($online))
        <section class="bg-[#f6f8fb] py-14 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
                    @if (! empty($online['image']))
                        <div>
                            <img src="{{ $online['image'] }}" alt="" class="w-full h-auto rounded" loading="lazy" />
                        </div>
                    @endif
                    <div>
                        @if (! empty($online['heading_html']))
                            <h2 class="text-[26px] md:text-[32px] font-semibold text-[#14166e] leading-tight mb-4">
                                {!! $online['heading_html'] !!}
                            </h2>
                            <div class="w-12 h-[3px] bg-[#e74c1d] mb-5"></div>
                        @endif
                        @if (! empty($online['lead_html']))
                            <div class="text-[16px] text-gray-700 leading-relaxed mb-5">
                                {!! $online['lead_html'] !!}
                            </div>
                        @endif
                        @if (! empty($online['choose_items']))
                            <ul class="space-y-3 mb-6">
                                @foreach ($online['choose_items'] as $it)
                                    <li class="flex items-start gap-3">
                                        <svg class="w-5 h-5 mt-1 text-[#14166e] shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 100 20 10 10 0 000-20zm-1 14l-5-5 1.5-1.5L11 13l5.5-5.5L18 9l-7 7z"/></svg>
                                        <span class="text-gray-800">{{ $it['text'] }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        @if (! empty($online['need_heading_html']))
                            <div class="text-[16px] text-gray-800 mb-3">
                                {!! $online['need_heading_html'] !!}
                            </div>
                        @endif
                        @if (! empty($online['need_items']))
                            <ul class="space-y-3">
                                @foreach ($online['need_items'] as $it)
                                    <li class="flex items-start gap-3">
                                        <svg class="w-5 h-5 mt-1 text-[#14166e] shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 100 20 10 10 0 000-20zm-1 14l-5-5 1.5-1.5L11 13l5.5-5.5L18 9l-7 7z"/></svg>
                                        <span class="text-gray-800">{{ $it['text'] }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- In-person Testing --}}
    @if (! empty($inperson))
        <section class="bg-white py-14 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
                    <div>
                        @if (! empty($inperson['heading_html']))
                            <h2 class="text-[26px] md:text-[32px] font-semibold text-[#14166e] leading-tight mb-4">
                                {!! $inperson['heading_html'] !!}
                            </h2>
                            <div class="w-12 h-[3px] bg-[#e74c1d] mb-5"></div>
                        @endif
                        @if (! empty($inperson['lead_html']))
                            <div class="text-[16px] text-gray-700 leading-relaxed mb-5">
                                {!! $inperson['lead_html'] !!}
                            </div>
                        @endif
                        @if (! empty($inperson['items']))
                            <ul class="space-y-3 mb-5">
                                @foreach ($inperson['items'] as $it)
                                    <li class="flex items-start gap-3">
                                        <svg class="w-5 h-5 mt-1 text-[#14166e] shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 100 20 10 10 0 000-20zm-1 14l-5-5 1.5-1.5L11 13l5.5-5.5L18 9l-7 7z"/></svg>
                                        <span class="text-gray-800">{{ $it['text'] }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        @if (! empty($inperson['accommodations_html']))
                            <div class="text-[15px] text-gray-700 leading-relaxed">
                                {!! $inperson['accommodations_html'] !!}
                            </div>
                        @endif
                    </div>
                    @if (! empty($inperson['image']))
                        <div>
                            <img src="{{ $inperson['image'] }}" alt="" class="w-full h-auto rounded" loading="lazy" />
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- CTA --}}
    @if (! empty($cta) && ! empty($cta['label']))
        <section class="bg-[#f6f8fb] py-12">
            <div class="max-w-[1200px] mx-auto px-4 text-center">
                <a href="{{ $cta['href'] ?? '#' }}"
                   class="inline-flex items-center gap-2 bg-[#14166e] hover:bg-[#0f1156] text-white font-semibold px-8 py-3 rounded-full transition-colors">
                    <span>{{ $cta['label'] }}</span>
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
            </div>
        </section>
    @endif
</x-layouts.cms>
