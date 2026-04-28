@php
    $data = $page->page_data ?? [];
    $hero = $data['hero'] ?? [];
    $role = $data['role'] ?? [];
    $features = $data['features'] ?? [];
    $ambassadors = $data['ambassadors_html'] ?? '';
    $global = $data['global'] ?? [];
    $communityTypes = $data['community_types'] ?? [];
    $benefits = $data['benefits'] ?? [];
    $getInvolved = $data['get_involved'] ?? [];
    $cta = $data['cta'] ?? [];
@endphp

<x-layouts.cms :page="$page">
    <x-cms.seo-head :page="$page" />

    {{-- Hero --}}
    @if (! empty($hero))
        <section class="bg-white py-14 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                    <div>
                        <h1 class="text-[28px] md:text-[40px] font-semibold text-[#14166e] leading-tight mb-5">
                            {!! $hero['heading_html'] !!}
                        </h1>
                        <div class="w-16 h-[3px] bg-[#e74c1d] mb-5"></div>
                        <div class="text-[15.5px] md:text-[16px] text-gray-700 leading-relaxed">
                            {!! $hero['intro_html'] !!}
                        </div>
                    </div>
                    @if (! empty($hero['image']))
                        <div>
                            <img src="{{ $hero['image'] }}" alt="" class="w-full h-auto rounded-md shadow-sm" loading="lazy" />
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- Role intro --}}
    @if (! empty($role))
        <section class="bg-[#f6f8fb] py-12 md:py-14">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h2 class="text-[24px] md:text-[32px] font-semibold text-[#14166e] mb-3">
                    {!! $role['heading_html'] !!}
                </h2>
                <div class="w-14 h-[3px] bg-[#e74c1d] mx-auto mb-5"></div>
                <div class="text-[15.5px] md:text-[16px] text-gray-700 leading-relaxed max-w-[800px] mx-auto">
                    {!! $role['intro_html'] !!}
                </div>
            </div>
        </section>
    @endif

    {{-- Feature cards (4 columns) — arrow-shaped, color-coded per live page --}}
    @if (! empty($features))
        @php
            $featureColors = [
                ['outline' => '#9b51b5', 'circle' => '#e6c8ee'], // purple
                ['outline' => '#2ea7e0', 'circle' => '#bfe4f5'], // blue
                ['outline' => '#6cba3f', 'circle' => '#cfeabf'], // green
                ['outline' => '#f5a623', 'circle' => '#fde0bf'], // orange
            ];
            $arrowClip = 'polygon(0 0, calc(100% - 28px) 0, 100% 50%, calc(100% - 28px) 100%, 0 100%)';
        @endphp
        <section class="bg-[#f6f8fb] pb-12 md:pb-16">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach ($features as $i => $f)
                        @php $c = $featureColors[$i % 4]; @endphp
                        <div class="relative" style="min-height: 360px;">
                            {{-- outline (color) layer --}}
                            <div class="absolute inset-0" style="background: {{ $c['outline'] }}; clip-path: {{ $arrowClip }};"></div>
                            {{-- white inner fill, inset 2px --}}
                            <div class="absolute inset-[2px]" style="background: #ffffff; clip-path: {{ $arrowClip }};"></div>
                            {{-- content --}}
                            <div class="relative p-6 pr-10 text-center h-full flex flex-col">
                                <div class="mx-auto mb-5 w-20 h-20 rounded-full flex items-center justify-center" style="background: {{ $c['circle'] }};">
                                    @if (! empty($f['icon']))
                                        <img src="{{ $f['icon'] }}" alt="" class="w-120 h-120" loading="lazy" />
                                    @endif
                                </div>
                                <h3 class="text-[16px] md:text-[17px] font-semibold text-[#14166e] mb-3 leading-snug">
                                    {!! $f['heading_html'] !!}
                                </h3>
                                <p class="text-[14.5px] text-gray-700 leading-relaxed">
                                    {!! $f['desc_html'] !!}
                                </p>
                            </div>
                            {{-- numbered badge at arrow tip --}}
                            <div class="absolute top-1/2 -translate-y-1/2 w-7 h-7 rounded-full text-white flex items-center justify-center text-[11px] font-semibold shadow"
                                style="background: {{ $c['outline'] }}; right: -4px;">
                                {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Ambassadors line --}}
    @if (! empty($ambassadors))
        <section class="bg-white py-10 md:py-12">
            <div class="max-w-[900px] mx-auto px-4 text-center">
                <p class="text-[15.5px] md:text-[16px] text-gray-700 leading-relaxed italic">
                    {!! $ambassadors !!}
                </p>
            </div>
        </section>
    @endif

    {{-- Global chapter communities intro --}}
    @if (! empty($global))
        <section class="bg-[#f6f8fb] py-12 md:py-14">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h2 class="text-[24px] md:text-[32px] font-semibold text-[#14166e] mb-3">
                    {!! $global['heading_html'] !!}
                </h2>
                <div class="w-14 h-[3px] bg-[#e74c1d] mx-auto mb-5"></div>
                <p class="text-[15.5px] md:text-[16px] text-gray-700 leading-relaxed max-w-[800px] mx-auto">
                    {!! $global['intro_html'] !!}
                </p>
            </div>
        </section>
    @endif

    {{-- Community types: 2 columns --}}
    @if (! empty($communityTypes))
        <section class="bg-[#f6f8fb] pb-12 md:pb-16">
            <div class="max-w-[1100px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach ($communityTypes as $ct)
                        <div class="bg-white border border-gray-100 rounded-md p-6 md:p-8 shadow-sm">
                            @if (! empty($ct['image']))
                                <img src="{{ $ct['image'] }}" alt="" class="h-16 w-auto mb-4" loading="lazy" />
                            @endif
                            <h3 class="text-[20px] md:text-[22px] font-semibold text-[#14166e] mb-4">
                                {!! $ct['heading_html'] !!}
                            </h3>
                            <ul class="space-y-3">
                                @foreach ($ct['items'] ?? [] as $item)
                                    <li class="flex items-start gap-3 text-[15.5px] text-gray-700 leading-relaxed">
                                        <svg class="w-5 h-5 mt-0.5 flex-shrink-0 text-[#14166e]" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                        <span>{!! $item['html'] !!}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Benefits --}}
    @if (! empty($benefits))
        <section class="bg-white py-12 md:py-16">
            <div class="max-w-[1100px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                    @if (! empty($benefits['image']))
                        <div>
                            <img src="{{ $benefits['image'] }}" alt="" class="w-full h-auto" loading="lazy" />
                        </div>
                    @endif
                    <div>
                        <h2 class="text-[24px] md:text-[30px] font-semibold text-[#14166e] mb-3">
                            {!! $benefits['heading_html'] !!}
                        </h2>
                        <div class="w-14 h-[3px] bg-[#e74c1d] mb-5"></div>
                        @if (! empty($benefits['intro_html']))
                            <p class="text-[15.5px] md:text-[16px] text-gray-700 leading-relaxed mb-4">
                                {!! $benefits['intro_html'] !!}
                            </p>
                        @endif
                        <ul class="space-y-3">
                            @foreach ($benefits['items'] ?? [] as $item)
                                <li class="flex items-start gap-3 text-[15.5px] text-gray-700 leading-relaxed">
                                    <svg class="w-5 h-5 mt-0.5 flex-shrink-0 text-[#14166e]" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                    <span>{!! $item['html'] !!}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- How to Get Involved --}}
    @if (! empty($getInvolved))
        <section class="bg-[#f6f8fb] py-12 md:py-16">
            <div class="max-w-[1100px] mx-auto px-4">
                @if (! empty($getInvolved['heading_html']))
                    <div class="text-center mb-8">
                        <h2 class="text-[24px] md:text-[32px] font-semibold text-[#14166e] mb-3">
                            {!! $getInvolved['heading_html'] !!}
                        </h2>
                        <div class="w-14 h-[3px] bg-[#e74c1d] mx-auto"></div>
                    </div>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($getInvolved['cards'] ?? [] as $card)
                        <div class="bg-white border border-gray-100 rounded-md p-6 md:p-7 shadow-sm flex items-start gap-4">
                            @if (! empty($card['icon']))
                                <img src="{{ $card['icon'] }}" alt="" class="w-8 h-8 flex-shrink-0 mt-1" loading="lazy" />
                            @endif
                            <p class="text-[15.5px] text-gray-700 leading-relaxed">
                                {!! $card['desc_html'] !!}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Closing CTA --}}
    @if (! empty($cta))
        <section class="bg-white py-14 md:py-20">
            <div class="max-w-[900px] mx-auto px-4 text-center">
                <h2 class="text-[24px] md:text-[32px] font-semibold text-[#14166e] mb-3">
                    {!! $cta['heading_html'] !!}
                </h2>
                <div class="w-14 h-[3px] bg-[#e74c1d] mx-auto mb-5"></div>
                @if (! empty($cta['intro_html']))
                    <p class="text-[15.5px] md:text-[16px] text-gray-700 leading-relaxed mb-7">
                        {!! $cta['intro_html'] !!}
                    </p>
                @endif
                @if (! empty($cta['buttons']))
                    <div class="flex flex-wrap justify-center gap-4">
                        @foreach ($cta['buttons'] as $btn)
                            <a href="{{ $btn['href'] }}" class="inline-block px-6 py-3 rounded-md bg-[#14166e] text-white text-[14.5px] font-semibold hover:bg-[#0f1153] transition-colors">
                                {{ $btn['text'] }}
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif
</x-layouts.cms>
