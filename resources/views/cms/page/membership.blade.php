<x-layouts.cms>
    <x-cms.seo-head :page="$page" />

    @php
        $data        = $page->page_data ?? [];
        $topHeading  = $data['top_heading'] ?? 'Become a Member';
        $intro       = $data['intro'] ?? [];
        $whyJoin     = $data['why_join'] ?? [];
        $whichGrade  = $data['which_grade'] ?? [];
        $tiers       = $data['tiers'] ?? [];
        $fellow      = $data['fellow'] ?? [];
    @endphp

    {{-- Top heading band --}}
    <section class="bg-[#0B2F5E] py-10">
        <div class="max-w-[1200px] mx-auto px-4 text-center">
            <h3 class="text-[26px] md:text-[34px] font-bold text-white">{{ $topHeading }}</h3>
        </div>
    </section>

    {{-- Intro: image left + heading/text/button right --}}
    @if (! empty($intro))
    <section class="bg-white py-14">
        <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            @if (! empty($intro['image']))
            <div>
                <img src="{{ $intro['image'] }}" alt="Become a Member" class="w-full h-auto rounded-md" />
            </div>
            @endif
            <div>
                <h3 class="text-[26px] md:text-[34px] font-bold text-[#14166e] mb-4">{{ $intro['heading'] ?? '' }}</h3>
                @if (! empty($intro['subheading']))
                <h5 class="text-[16px] md:text-[18px] text-gray-700 leading-relaxed mb-6">{{ $intro['subheading'] }}</h5>
                @endif
                @if (! empty($intro['button_text']))
                <a href="{{ $intro['button_url'] ?? '#' }}" class="inline-block bg-[#f0b323] hover:bg-yellow-500 text-[#14166e] font-bold text-[15px] px-7 py-3 rounded transition">
                    {{ $intro['button_text'] }}
                </a>
                @endif
            </div>
        </div>
    </section>
    @endif

    {{-- Why join AAPSCM? --}}
    @if (! empty($whyJoin))
    <section class="bg-[#f6f8fb] py-14">
        <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            <div>
                <h3 class="text-[26px] md:text-[34px] font-bold text-[#14166e] mb-2">{{ $whyJoin['heading'] ?? '' }}</h3>
                @if (! empty($whyJoin['design_image']))
                <img src="{{ $whyJoin['design_image'] }}" alt="" class="w-[280px] mb-4" />
                @endif
                <h5 class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed whitespace-pre-line">{{ $whyJoin['text'] ?? '' }}</h5>
            </div>
            @if (! empty($whyJoin['image']))
            <div>
                <img src="{{ $whyJoin['image'] }}" alt="Why join AAPSCM" class="w-full h-auto rounded-md" />
            </div>
            @endif
        </div>
    </section>
    @endif

    {{-- Which grade's for me? --}}
    @if (! empty($whichGrade))
    <section id="join-now" class="bg-white py-12">
        <div class="max-w-[1100px] mx-auto px-4 text-center">
            <h3 class="text-[26px] md:text-[34px] font-bold text-[#14166e] mb-3">{{ $whichGrade['heading'] ?? '' }}</h3>
            @if (! empty($whichGrade['subtitle']))
            <h5 class="text-[15px] md:text-[17px] text-gray-700 max-w-3xl mx-auto leading-relaxed">{{ $whichGrade['subtitle'] }}</h5>
            @endif
        </div>
    </section>
    @endif

    {{-- Tiers: alternating image left/right with price card + features --}}
    @foreach ($tiers as $tier)
    <section id="{{ $tier['id'] ?? '' }}" class="bg-white py-12 border-b border-gray-100">
        <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-start">
            {{-- Price card column --}}
            <div class="@if (($tier['image_position'] ?? 'left') === 'right') md:order-2 @endif">
                <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-100">
                    @if (! empty($tier['image']))
                    <img src="{{ $tier['image'] }}" alt="{{ $tier['title'] ?? '' }}" class="w-full h-auto" />
                    @endif
                    <div class="p-6 text-center">
                        <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] mb-1">{{ $tier['price'] ?? '' }}</h2>
                        @if (! empty($tier['fee']))
                        <p class="text-[14px] text-gray-600 mb-5">{{ $tier['fee'] }}</p>
                        @endif
                        @if (! empty($tier['button_text']))
                        <a href="{{ $tier['button_url'] ?? '#' }}" class="inline-flex items-center gap-2 bg-[#f0b323] hover:bg-yellow-500 text-[#14166e] font-bold text-[14px] px-6 py-3 rounded transition">
                            <span>{{ $tier['button_text'] }}</span>
                            <span aria-hidden="true">→</span>
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Features column --}}
            <div class="@if (($tier['image_position'] ?? 'left') === 'right') md:order-1 @endif">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] mb-4">{{ $tier['title'] ?? '' }}</h2>
                @if (! empty($tier['description']))
                <p class="text-[15px] text-gray-700 leading-relaxed mb-5 whitespace-pre-line">{{ $tier['description'] }}</p>
                @endif
                @if (! empty($tier['features']))
                <ul class="space-y-2.5">
                    @foreach ($tier['features'] as $f)
                    <li class="flex items-start gap-3">
                        <svg class="w-[18px] h-[18px] text-[#14166e] mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-[15px] text-gray-700 leading-relaxed">{{ trim($f) }}</span>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </section>
    @endforeach

    {{-- Fellow Member section --}}
    @if (! empty($fellow))
    <section id="{{ $fellow['id'] ?? 'fellow-member-section' }}" class="bg-[#f6f8fb] py-14">
        <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-start">
            {{-- Price card --}}
            <div>
                <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-100">
                    @if (! empty($fellow['image']))
                    <img src="{{ $fellow['image'] }}" alt="Fellow Member" class="w-full h-auto" />
                    @endif
                    <div class="p-6 text-center">
                        <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] mb-1">{{ $fellow['price'] ?? '' }}</h2>
                        @if (! empty($fellow['fee']))
                        <p class="text-[14px] text-gray-600 mb-5">{{ $fellow['fee'] }}</p>
                        @endif
                        @if (! empty($fellow['button_text']))
                        <a href="{{ $fellow['button_url'] ?? '#' }}" class="inline-flex items-center gap-2 bg-[#f0b323] hover:bg-yellow-500 text-[#14166e] font-bold text-[14px] px-6 py-3 rounded transition">
                            <span>{{ $fellow['button_text'] }}</span>
                            <span aria-hidden="true">→</span>
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Description + categories --}}
            <div>
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] mb-4">{{ $fellow['heading'] ?? '' }}</h2>
                @if (! empty($fellow['description']))
                <p class="text-[15px] text-gray-700 leading-relaxed mb-6">{!! $fellow['description'] !!}</p>
                @endif
                @if (! empty($fellow['categories_heading']))
                <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-4">{!! $fellow['categories_heading'] !!}</h3>
                @endif
                @if (! empty($fellow['categories']))
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    @foreach ($fellow['categories'] as $cat)
                    <a href="{{ $cat['url'] }}" class="inline-flex items-center justify-center gap-2 bg-[#f0b323] hover:bg-yellow-500 text-[#14166e] font-bold text-[13px] px-4 py-3 rounded transition text-center">
                        <span>{{ $cat['title'] }}</span>
                        <span aria-hidden="true">→</span>
                    </a>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </section>
    @endif
</x-layouts.cms>
