@php
    $data      = $page->page_data ?? [];
    $hero      = $data['hero'] ?? [];
    $row1      = $data['intro_row1'] ?? [];
    $row2      = $data['intro_row2'] ?? [];
    $tables    = $data['tables'] ?? [];
    $cards     = $data['cards'] ?? [];
    $iconBoxes = $data['icon_boxes'] ?? [];
    $guarantee = $data['guarantee_items'] ?? [];
@endphp

<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    {{-- Section 1: Page title banner --}}
    <section class="bg-[#14166e] text-white py-10">
        <div class="max-w-[1200px] mx-auto px-4 text-left">
            <h1 class="text-[28px] md:text-[34px] font-semibold">
                {{ $page->title }}
            </h1>
            <nav class="mt-2 text-[14px] opacity-90">
                <a href="/" class="hover:underline">Home</a>
                <span class="mx-2">/</span>
                <span>{{ $hero['breadcrumb'] ?? $page->title }}</span>
            </nav>
        </div>
    </section>

    {{-- Section 2: Workshop & Trainings headline + sub-headline --}}
    <section class="bg-white pt-14 pb-6">
        <div class="max-w-[1100px] mx-auto px-4 text-center">
            <h2 class="text-[28px] md:text-[36px] font-semibold text-[#14166e] mb-2">
                {{ $hero['h3'] ?? '' }}
            </h2>
            <p class="text-[13px] md:text-[15px] tracking-widest uppercase text-gray-500">
                {{ $hero['h5'] ?? '' }}
            </p>
        </div>
    </section>

    {{-- Section 3: "What Management Careers…" (row 1) --}}
    @if (! empty($row1))
        <section class="bg-white py-12">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="text-[24px] md:text-[30px] font-semibold text-[#14166e] mb-4 leading-snug">
                        {!! $row1['heading'] ?? '' !!}
                    </h2>
                    @if (! empty($row1['text']))
                        <p class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed">
                            {{ $row1['text'] }}
                        </p>
                    @endif
                </div>
                @if (! empty($row1['image']))
                    <div class="flex justify-center">
                        <img src="{{ $row1['image'] }}" alt="{{ $row1['heading'] ?? '' }}"
                             class="w-full max-w-[636px] rounded-lg" loading="lazy">
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- Section 4: image + narrative + CTA button (row 2) --}}
    @if (! empty($row2))
        <section class="bg-[#f6f8fb] py-12">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($row2['image']))
                    <div class="flex justify-center">
                        <img src="{{ $row2['image'] }}" alt=""
                             class="w-full max-w-[663px] rounded-lg" loading="lazy">
                    </div>
                @endif
                <div>
                    @foreach ($row2['texts'] ?? [] as $p)
                        <p class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed mb-4">
                            {{ $p }}
                        </p>
                    @endforeach
                    @if (! empty($row2['button']['href']))
                        <a href="{{ $row2['button']['href'] }}"
                           class="inline-block bg-[#14166e] text-white px-6 py-3 rounded font-semibold text-[14px] tracking-wide uppercase hover:bg-[#1d2091] transition">
                            {{ $row2['button']['text'] ?? 'Learn More' }}
                        </a>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- Section 5: Five certification tables --}}
    @foreach ($tables as $tableKey => $table)
        @if (! empty($table['rows']))
            <section class="bg-white py-12">
                <div class="max-w-[1200px] mx-auto px-4">
                    <h2 class="text-[24px] md:text-[30px] text-[#14166e] mb-6 leading-snug">
                        {{ $table['heading_prefix'] ?? '' }}
                        <span class="font-bold">{{ $table['heading_bold'] ?? '' }}</span>
                    </h2>
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
                                @foreach ($table['rows'] as $row)
                                    <tr class="border-t border-gray-200 align-top">
                                        <td class="px-4 py-3 font-medium text-[#14166e]">
                                            {!! $row['certification_html'] ?? e($row['certification'] ?? '') !!}
                                        </td>
                                        <td class="px-4 py-3">
                                            {{ $row['focus'] ?? '' }}
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            @if (! empty($row['href']) && $row['href'] !== '#')
                                                <a href="{{ $row['href'] }}"
                                                   class="inline-flex items-center gap-1 text-[#14166e] font-semibold hover:underline whitespace-nowrap">
                                                    Learn More
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

    {{-- Section 6: Certification cards (home-style design) --}}
    @if (! empty($cards))
        <section class="bg-[#f6f8fb] py-16">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($cards as $card)
                    <div class="bg-white rounded-lg shadow-[rgba(100,100,111,0.12)_0px_4px_14px_0px] p-6 flex flex-col text-center hover:-translate-y-1 transition-transform">
                        @if (! empty($card['image_top']))
                            <img src="{{ $card['image_top'] }}" alt="{{ $card['title'] ?? '' }}"
                                 class="w-[200px] h-[200px] object-contain mx-auto mb-4" loading="lazy">
                        @endif
                        <h2 class="text-[35px] font-semibold text-[#14166e] leading-snug mb-3 min-h-[56px]">
                            {{ $card['title'] ?? '' }}
                        </h2>
                        @if (! empty($card['description']))
                            <p class="text-[14px] text-gray-600 leading-relaxed flex-grow mb-5">
                                {{ $card['description'] }}
                            </p>
                        @endif
                        @if (! empty($card['image_bottom']))
                            <img src="{{ $card['image_bottom'] }}" alt="{{ $card['title'] ?? '' }} badge"
                                 class="w-[130px] h-[130px] object-contain mx-auto mb-4" loading="lazy">
                        @endif
                        <a href="{{ $card['href'] ?? '#' }}"
                           class="inline-flex items-center justify-center gap-2 bg-[#14166e] hover:bg-[#1e2199] text-white font-semibold text-sm px-5 py-2.5 rounded-full transition-colors">
                            Learn More
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Section 7: Feature icon boxes --}}
    @if (! empty($iconBoxes))
        <section class="bg-white py-12">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
                @foreach ($iconBoxes as $box)
                    <div class="text-center">
                        @if (! empty($box['image']))
                            <img src="{{ $box['image'] }}" alt="{{ $box['title'] ?? '' }}"
                                 class="mx-auto w-16 h-16 mb-4" loading="lazy">
                        @endif
                        <h3 class="text-[18px] font-semibold text-[#14166e] mb-1">
                            {{ $box['title'] ?? '' }}
                        </h3>
                        <p class="text-[14px] text-gray-600 leading-relaxed">
                            {{ $box['description'] ?? '' }}
                        </p>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Section 8: Money-back guarantee bullet list --}}
    @if (! empty($guarantee))
        <section class="bg-[#f6f8fb] py-12">
            <div class="max-w-[1000px] mx-auto px-4">
                <ul class="space-y-3">
                    @foreach ($guarantee as $item)
                        <li class="flex items-start gap-3 bg-white rounded-lg p-4 shadow-sm">
                            <span class="mt-0.5 shrink-0 text-[#14166e]">
                                <i class="{{ $item['icon'] ?? 'fas fa-check-circle' }}"></i>
                            </span>
                            <span class="text-[15px] text-gray-700 leading-relaxed">
                                {{ $item['text'] ?? '' }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif

</x-layouts.cms>
