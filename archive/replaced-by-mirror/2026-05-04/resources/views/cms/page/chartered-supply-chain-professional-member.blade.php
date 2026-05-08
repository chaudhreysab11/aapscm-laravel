<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    @php
        $data            = $page->page_data ?? [];
        $hero            = $data['hero'] ?? [];
        $whyHeading      = $data['why_pursue_heading_html'] ?? '';
        $benefitsRow1    = $data['benefits_row1'] ?? [];
        $benefitsRow2    = $data['benefits_row2'] ?? [];
        $whyTest         = $data['why_test'] ?? [];
        $keyHeading      = $data['key_benefits_heading_html'] ?? '';
        $keyRow1         = $data['key_benefits_row1'] ?? [];
        $keyRow2         = $data['key_benefits_row2'] ?? [];
        $eligHeading     = $data['eligibility_heading_html'] ?? '';
        $eligItems       = $data['eligibility_items'] ?? [];
        $cta             = $data['cta'] ?? [];
        $about           = $data['about'] ?? [];
        $chapters        = $data['chapters'] ?? [];

        // Filter out empty card slots in key benefits rows.
        $keyRow1Visible = array_values(array_filter($keyRow1, fn($c) => ! empty($c['heading_html']) || ! empty($c['text_html']) || ! empty($c['image'])));
        $keyRow2Visible = array_values(array_filter($keyRow2, fn($c) => ! empty($c['heading_html']) || ! empty($c['text_html']) || ! empty($c['image'])));
    @endphp

    {{-- Hero: heading + paragraph | image --}}
    @if (! empty($hero))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                    <div>
                        @if (! empty($hero['heading_html']))
                            <h2 class="text-[28px] md:text-[34px] font-light text-[#14166e] leading-tight mb-5">
                                {!! $hero['heading_html'] !!}
                            </h2>
                        @endif

                        @if (! empty($hero['paragraph_html']))
                            <div class="prose prose-sm md:prose-base max-w-none text-gray-700 leading-relaxed">
                                {!! $hero['paragraph_html'] !!}
                            </div>
                        @endif
                    </div>

                    @if (! empty($hero['image']))
                        <div>
                            <img src="{{ $hero['image'] }}" alt="" class="w-full h-auto" />
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- "Why Pursue Chartered Status…" heading divider --}}
    @if ($whyHeading)
        <section class="bg-[#f6f8fb] py-12">
            <div class="max-w-[1200px] mx-auto px-4 text-center">
                <h2 class="text-[26px] md:text-[34px] font-light text-[#14166e]">
                    {!! $whyHeading !!}
                </h2>
            </div>
        </section>
    @endif

    {{-- Benefits row 1 (3 cards: image + heading + bulleted icon-list + button) --}}
    @if (! empty($benefitsRow1))
        <section class="bg-[#f6f8fb] pt-2 pb-10">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($benefitsRow1 as $card)
                        @include('cms.page._partials.cscp-icon-list-card', ['card' => $card])
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Benefits row 2 --}}
    @if (! empty($benefitsRow2))
        <section class="bg-[#f6f8fb] pt-0 pb-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($benefitsRow2 as $card)
                        @include('cms.page._partials.cscp-icon-list-card', ['card' => $card])
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Why the Test Matters: image | heading + paragraph + 3 image-boxes --}}
    @if (! empty($whyTest))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
                    @if (! empty($whyTest['image']))
                        <div>
                            <img src="{{ $whyTest['image'] }}" alt="" class="w-full h-auto" />
                        </div>
                    @endif

                    <div>
                        @if (! empty($whyTest['heading_html']))
                            <h3 class="text-[26px] md:text-[32px] font-light text-[#14166e] mb-4">
                                {!! $whyTest['heading_html'] !!}
                            </h3>
                        @endif

                        @if (! empty($whyTest['paragraph_html']))
                            <div class="text-[15.5px] text-gray-700 leading-relaxed mb-6">
                                {!! $whyTest['paragraph_html'] !!}
                            </div>
                        @endif

                        <div class="space-y-5">
                            @foreach ($whyTest['items'] ?? [] as $ib)
                                <div class="flex items-start gap-4">
                                    @if (! empty($ib['icon']))
                                        <img src="{{ $ib['icon'] }}" alt="" class="w-12 h-12 object-contain shrink-0" />
                                    @endif
                                    <div>
                                        @if (! empty($ib['title']))
                                            <h4 class="text-[17px] font-semibold text-[#14166e] mb-1">{{ $ib['title'] }}</h4>
                                        @endif
                                        @if (! empty($ib['desc']))
                                            <div class="text-[15px] text-gray-700 leading-relaxed">{!! $ib['desc'] !!}</div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Key Benefits heading divider --}}
    @if ($keyHeading)
        <section class="bg-[#f6f8fb] py-12">
            <div class="max-w-[1200px] mx-auto px-4 text-center">
                <h2 class="text-[26px] md:text-[34px] font-light text-[#14166e]">
                    {!! $keyHeading !!}
                </h2>
            </div>
        </section>
    @endif

    {{-- Key benefits row 1 --}}
    @if (! empty($keyRow1Visible))
        <section class="bg-[#f6f8fb] pt-2 pb-10">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($keyRow1Visible as $card)
                        @include('cms.page._partials.cscp-text-card', ['card' => $card])
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Key benefits row 2 --}}
    @if (! empty($keyRow2Visible))
        <section class="bg-[#f6f8fb] pt-0 pb-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-[820px] mx-auto">
                    @foreach ($keyRow2Visible as $card)
                        @include('cms.page._partials.cscp-text-card', ['card' => $card])
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Eligibility heading + 2-card row --}}
    @if ($eligHeading)
        <section class="bg-white py-12">
            <div class="max-w-[1200px] mx-auto px-4 text-center">
                <h2 class="text-[26px] md:text-[34px] font-light text-[#14166e]">
                    {!! $eligHeading !!}
                </h2>
            </div>
        </section>
    @endif

    @if (! empty($eligItems))
        <section class="bg-white pb-14">
            <div class="max-w-[1100px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($eligItems as $it)
                        <div class="bg-[#f6f8fb] rounded-lg p-6 md:p-8 flex items-start gap-5">
                            @if (! empty($it['icon']))
                                <img src="{{ $it['icon'] }}" alt="" class="w-14 h-12 object-contain shrink-0" />
                            @endif
                            @if (! empty($it['desc']))
                                <div class="text-[15.5px] text-gray-700 leading-relaxed">{!! $it['desc'] !!}</div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- CTA: heading + paragraphs + button | image --}}
    @if (! empty($cta))
        <section class="bg-[#f6f8fb] py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                    <div>
                        @if (! empty($cta['heading_html']))
                            <h3 class="text-[26px] md:text-[32px] font-light text-[#14166e] mb-5">
                                {!! $cta['heading_html'] !!}
                            </h3>
                        @endif

                        @foreach ($cta['paragraphs_html'] ?? [] as $p)
                            <div class="text-[15.5px] text-gray-700 leading-relaxed mb-4">{!! $p !!}</div>
                        @endforeach

                        @if (! empty($cta['btn_label']))
                            <a href="{{ $cta['btn_href'] ?? '#' }}"
                               class="inline-block bg-[#5cb85c] hover:bg-[#4cae4c] text-white font-semibold text-[15px] px-6 py-3 rounded-full transition mt-2">
                                {{ $cta['btn_label'] }}
                            </a>
                        @endif
                    </div>

                    @if (! empty($cta['image']))
                        <div>
                            <img src="{{ $cta['image'] }}" alt="" class="w-full h-auto" />
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- About AAPSCM® --}}
    @if (! empty($about))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                    @if (! empty($about['image']))
                        <div>
                            <img src="{{ $about['image'] }}" alt="" class="w-full h-auto" />
                        </div>
                    @endif

                    <div>
                        @if (! empty($about['heading_html']))
                            <h3 class="text-[26px] md:text-[32px] font-light text-[#14166e] mb-5">
                                {!! $about['heading_html'] !!}
                            </h3>
                        @endif

                        @if (! empty($about['paragraph_html']))
                            <div class="text-[15.5px] text-gray-700 leading-relaxed mb-5">
                                {!! $about['paragraph_html'] !!}
                            </div>
                        @endif

                        <ul class="space-y-3">
                            @foreach ($about['items'] ?? [] as $li)
                                <li class="flex items-start gap-3">
                                    <span class="mt-1 inline-block w-2 h-2 rounded-full bg-[#e74c1d] shrink-0"></span>
                                    <span class="text-[15px] text-gray-700 leading-relaxed">{{ $li }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Chapters --}}
    @if (! empty($chapters))
        <section class="bg-[#f6f8fb] py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                    <div>
                        @if (! empty($chapters['intro_html']))
                            <div class="text-[15.5px] text-gray-700 leading-relaxed mb-5">
                                {!! $chapters['intro_html'] !!}
                            </div>
                        @endif

                        @if (! empty($chapters['columns']))
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-2 mb-5">
                                @foreach ($chapters['columns'] as $col)
                                    <ul class="space-y-2">
                                        @foreach ($col as $li)
                                            <li class="flex items-start gap-3">
                                                <span class="mt-2 inline-block w-2 h-2 rounded-full bg-[#e74c1d] shrink-0"></span>
                                                <span class="text-[15px] text-gray-700 leading-relaxed">{{ $li }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endforeach
                            </div>
                        @endif

                        @if (! empty($chapters['outro_html']))
                            <div class="text-[15.5px] text-gray-700 leading-relaxed">
                                {!! $chapters['outro_html'] !!}
                            </div>
                        @endif
                    </div>

                    @if (! empty($chapters['image']))
                        <div>
                            <img src="{{ $chapters['image'] }}" alt="" class="w-full h-auto" />
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

</x-layouts.cms>
