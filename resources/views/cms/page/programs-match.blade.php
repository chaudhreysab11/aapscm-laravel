@php
    $pageData = $page->page_data ?? [];
    $heroHeading = $pageData['hero_heading_html'] ?? '';
    $intro = $pageData['intro'] ?? [];
    $feature = $pageData['feature'] ?? [];
    $tables = $pageData['tables'] ?? [];
@endphp

<x-layouts.cms :page="$page">
    <x-cms.seo-head :page="$page" />

    {{-- Hero --}}
    @if (! empty($heroHeading))
        <section class="bg-white py-14 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 text-center">
                <h1 class="text-[26px] md:text-[40px] font-light tracking-wide text-[#14166e] uppercase">
                    {!! $heroHeading !!}
                </h1>
                <div class="w-16 h-[3px] bg-[#e74c1d] mx-auto mt-5"></div>
            </div>
        </section>
    @endif

    {{-- Intro section --}}
    @if (! empty($intro['heading_html']) || ! empty($intro['text_html']))
        <section class="bg-[#f6f8fb] py-12 md:py-16">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                    <div>
                        @if (! empty($intro['heading_html']))
                            <h2 class="text-[24px] md:text-[32px] font-semibold text-[#14166e] leading-tight mb-5">
                                {!! $intro['heading_html'] !!}
                            </h2>
                        @endif
                        @if (! empty($intro['text_html']))
                            <div class="prose prose-sm md:prose-base max-w-none text-gray-700 leading-relaxed">
                                {!! $intro['text_html'] !!}
                            </div>
                        @endif
                    </div>
                    @if (! empty($intro['image']))
                        <div>
                            <img src="{{ $intro['image'] }}" alt="" class="w-full h-auto" loading="lazy" />
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- Feature: image left + text/button right --}}
    @if (! empty($feature) && (! empty($feature['paragraphs']) || ! empty($feature['image'])))
        <section class="bg-white py-12 md:py-16">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                    @if (! empty($feature['image']))
                        <div class="order-2 md:order-1">
                            <img src="{{ $feature['image'] }}" alt="" class="w-full h-auto" loading="lazy" />
                        </div>
                    @endif
                    <div class="order-1 md:order-2">
                        @foreach ($feature['paragraphs'] ?? [] as $para)
                            <div class="text-[15.5px] md:text-[16px] text-gray-700 leading-relaxed mb-4">
                                {!! $para !!}
                            </div>
                        @endforeach
                        @if (! empty($feature['button']['label']))
                            <a href="{{ $feature['button']['href'] ?? '#' }}"
                               class="inline-flex items-center gap-2 mt-4 bg-[#14166e] hover:bg-[#0f1156] text-white font-semibold px-7 py-3 rounded-full transition-colors uppercase tracking-wide text-[14px]">
                                <span>{{ $feature['button']['label'] }}</span>
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Tables --}}
    @foreach ($tables as $tIdx => $tbl)
        @if (! empty($tbl['rows']))
            <section class="bg-white py-12">
                <div class="max-w-[1200px] mx-auto px-4">
                    @if (! empty($tbl['heading_html']))
                        <h2 class="text-[24px] md:text-[30px] text-[#14166e] mb-6 leading-snug font-bold">
                            {!! $tbl['heading_html'] !!}
                        </h2>
                    @endif
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-200 text-left">
                            <thead class="bg-[#14166e] text-white text-[14px] uppercase tracking-wide">
                                <tr>
                                    <th class="px-4 py-3 w-[30%]">Certification</th>
                                    <th class="px-4 py-3">Key Focus Area</th>
                                    <th class="px-4 py-3 w-[14%] text-center">Learn More</th>
                                </tr>
                            </thead>
                            <tbody class="text-[15px] text-gray-700">
                                @foreach ($tbl['rows'] as $row)
                                    <tr class="border-t border-gray-200 align-top">
                                        <td class="px-4 py-3 font-medium text-[#14166e]">
                                            {!! $row['cert_html'] ?? '' !!}
                                        </td>
                                        <td class="px-4 py-3">
                                            {!! $row['focus_html'] ?? '' !!}
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            @if (! empty($row['learn_href']) && $row['learn_href'] !== '#')
                                                <a href="{{ $row['learn_href'] }}"
                                                   class="inline-flex items-center gap-1 text-[#14166e] font-semibold hover:underline whitespace-nowrap">
                                                    {{ $row['learn_label'] ?: 'Learn More' }}
                                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        @endif
    @endforeach
</x-layouts.cms>
