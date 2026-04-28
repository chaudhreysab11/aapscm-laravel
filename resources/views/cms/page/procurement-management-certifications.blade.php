@php
    $data         = $page->page_data ?? [];
    $heroHeading  = $data['hero_heading'] ?? '';
    $intro        = $data['intro'] ?? [];
    $whyChoose    = $data['why_choose_us'] ?? [];
    $nextStep     = $data['next_step_text'] ?? '';
    $forMgrs      = $data['for_managers'] ?? [];
    $whyPerfect   = $data['why_perfect'] ?? [];
    $transform    = $data['transform_text'] ?? '';
    $startJourney = $data['start_journey_heading'] ?? '';
    $cards        = $data['cards'] ?? [];
@endphp

<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    {{-- Section 1: Hero heading banner --}}
    <section class="bg-[#14166e] text-white py-10">
        <div class="max-w-[1200px] mx-auto px-4 text-center">
            <h1 class="text-[28px] md:text-[36px] font-semibold leading-snug">
                {{ $heroHeading }}
            </h1>
            <nav class="mt-2 text-[14px] opacity-90">
                <a href="/" class="hover:underline">Home</a>
                <span class="mx-2">/</span>
                <span>{{ $heroHeading }}</span>
            </nav>
        </div>
    </section>

    {{-- Section 2: Intro — two-column with "For Professionals" text + image --}}
    @if (! empty($intro))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="text-[24px] md:text-[30px] font-semibold text-[#14166e] leading-snug">
                        {!! $intro['heading_html'] ?? '' !!}
                    </h2>
                    <div class="my-5 w-16 h-[3px] bg-[#14166e]"></div>
                    <h3 class="text-[20px] md:text-[24px] font-semibold text-[#14166e] mb-3">
                        {!! $intro['for_prof_html'] ?? '' !!}
                    </h3>
                    @if (! empty($intro['text']))
                        <p class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed">
                            {{ $intro['text'] }}
                        </p>
                    @endif
                </div>
                @if (! empty($intro['image']))
                    <div class="flex justify-center">
                        <img src="{{ $intro['image'] }}" alt="Procurement Management Certifications"
                             class="w-full max-w-[558px] rounded-lg" loading="lazy">
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- Section 3: Why Choose Us? heading + 3 feature boxes --}}
    @if (! empty($whyChoose['boxes']))
        <section class="bg-[#f6f8fb] py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                @if (! empty($whyChoose['heading_html']))
                    <h2 class="text-center text-[26px] md:text-[32px] font-semibold text-[#14166e] mb-10 leading-snug">
                        {!! $whyChoose['heading_html'] !!}
                    </h2>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($whyChoose['boxes'] as $box)
                        <div class="bg-white rounded-lg shadow-sm p-8 flex flex-col items-center text-center">
                            @if (! empty($box['image']))
                                <img src="{{ $box['image'] }}" alt=""
                                     class="w-[120px] h-auto mb-5" loading="lazy">
                            @endif
                            <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">
                                {{ $box['text'] ?? '' }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Section 4: CTA line ("Take the next step…") --}}
    @if ($nextStep)
        <section class="bg-white py-10">
            <div class="max-w-[1000px] mx-auto px-4 text-center">
                <p class="text-[18px] md:text-[22px] text-[#14166e] font-semibold leading-relaxed">
                    {{ $nextStep }}
                </p>
            </div>
        </section>
    @endif

    {{-- Section 5: For Managers — image left, heading+text right --}}
    @if (! empty($forMgrs))
        <section class="bg-[#f6f8fb] py-14">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($forMgrs['image']))
                    <div class="flex justify-center">
                        <img src="{{ $forMgrs['image'] }}" alt=""
                             class="w-full max-w-[433px] rounded-lg" loading="lazy">
                    </div>
                @endif
                <div>
                    <h2 class="text-[24px] md:text-[30px] font-semibold text-[#14166e] mb-4 leading-snug">
                        {!! $forMgrs['heading_html'] ?? '' !!}
                    </h2>
                    @if (! empty($forMgrs['text']))
                        <p class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed">
                            {{ $forMgrs['text'] }}
                        </p>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- Section 6: Why It's Perfect for Managers — heading + 3 icon+text rows --}}
    @if (! empty($whyPerfect['boxes']))
        <section class="bg-white py-14">
            <div class="max-w-[1100px] mx-auto px-4">
                @if (! empty($whyPerfect['heading_html']))
                    <h2 class="text-center text-[26px] md:text-[32px] font-semibold text-[#14166e] mb-10 leading-snug">
                        {!! $whyPerfect['heading_html'] !!}
                    </h2>
                @endif
                <ul class="space-y-4">
                    @foreach ($whyPerfect['boxes'] as $box)
                        <li class="flex items-start gap-4 bg-[#f6f8fb] rounded-lg p-5">
                            @if (! empty($box['image']))
                                <img src="{{ $box['image'] }}" alt=""
                                     class="w-12 h-12 shrink-0" loading="lazy">
                            @endif
                            <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">
                                {{ $box['text'] ?? '' }}
                            </p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif

    {{-- Section 7: Transform paragraph --}}
    @if ($transform)
        <section class="bg-[#14166e] text-white py-10">
            <div class="max-w-[1000px] mx-auto px-4 text-center">
                <p class="text-[16px] md:text-[18px] leading-relaxed">
                    {{ $transform }}
                </p>
            </div>
        </section>
    @endif

    {{-- Section 8: Start your journey heading --}}
    @if ($startJourney)
        <section class="bg-white pt-14 pb-6">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h2 class="text-[22px] md:text-[28px] font-semibold text-[#14166e] leading-snug whitespace-pre-line">
                    {{ $startJourney }}
                </h2>
            </div>
        </section>
    @endif

    {{-- Section 9: Certification cards (home-style design) --}}
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

</x-layouts.cms>
