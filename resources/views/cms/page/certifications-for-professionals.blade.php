@php
    $data = $page->page_data ?? [];

    $intro           = $data['intro']              ?? [];
    $portfolioHeading= $data['portfolio_heading']  ?? null;
    $mainCards       = $data['main_cards']         ?? [];
    $aiHeading       = $data['ai_heading']         ?? null;
    $aiCards         = $data['ai_cards']           ?? [];
    $recap           = $data['recap']              ?? [];
    $stats           = $data['stats']              ?? [];
    $targetSkills    = $data['target_skills']      ?? [];
    $partners        = $data['partners']           ?? [];
@endphp

<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    {{-- Theme title band (Qode/Eltdf parity) --}}
    <x-cms.eltdf-title-bar
        title="Certifications for Professionals"
        :breadcrumbs="[['label' => 'Certifications for Professionals']]"
    />

    {{-- Intro: heading + lead + 4 icon-bullets (2-col on md+) --}}
    @if (! empty($intro))
        <section class="bg-white pt-16 pb-10">
            <div class="max-w-[1100px] mx-auto px-4">
                <h3 class="text-center text-[26px] md:text-[34px] font-semibold text-[#14166e] mb-4 leading-snug">
                    {{ $intro['heading'] ?? '' }}
                </h3>
                @if (! empty($intro['lead']))
                    <h5 class="text-center text-[15px] md:text-[17px] text-gray-700 leading-relaxed max-w-[900px] mx-auto mb-10">
                        {{ $intro['lead'] }}
                    </h5>
                @endif
                @if (! empty($intro['bullets']))
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-5 max-w-[1000px] mx-auto">
                        @foreach ($intro['bullets'] as $bullet)
                            <div class="flex items-start gap-4">
                                @if (! empty($intro['icon']))
                                    <img src="{{ $intro['icon'] }}" alt="" class="w-9 h-9 flex-shrink-0 mt-1">
                                @endif
                                <p class="text-[15px] text-gray-700 leading-relaxed">{{ $bullet }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- Portfolio heading + main cards + AI Courses sub-heading + AI cards --}}
    <section class="bg-[#f6f8fb] py-16">
        <div class="max-w-[1200px] mx-auto px-4">
            @if (! empty($portfolioHeading))
                <h3 class="text-center text-[26px] md:text-[34px] font-semibold text-[#14166e] mb-10 leading-snug">
                    {{ $portfolioHeading }}
                </h3>
            @endif

            @if (! empty($mainCards))
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach ($mainCards as $cert)
                        @include('cms.partials.certification-for-professionals-card', ['cert' => $cert])
                    @endforeach
                </div>
            @endif

            @if (! empty($aiHeading))
                <h2 class="text-center text-[28px] md:text-[36px] font-semibold text-[#14166e] mt-16 mb-10 leading-snug">
                    {{ $aiHeading }}
                </h2>
            @endif

            @if (! empty($aiCards))
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach ($aiCards as $cert)
                        @include('cms.partials.certification-for-professionals-card', ['cert' => $cert])
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- Portfolio recap --}}
    @if (! empty($recap))
        <section class="bg-white py-14">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h3 class="text-[26px] md:text-[34px] font-semibold text-[#14166e] mb-4 leading-snug">
                    {{ $recap['heading'] ?? '' }}
                </h3>
                @if (! empty($recap['lead']))
                    <h5 class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed max-w-[900px] mx-auto">
                        {{ $recap['lead'] }}
                    </h5>
                @endif
            </div>
        </section>
    @endif

    {{-- 3-column stats block --}}
    @if (! empty($stats))
        <section class="bg-white pb-16">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($stats as $stat)
                    <div class="flex flex-col gap-6">
                        <div class="bg-[#14166e] text-white rounded-lg p-8 text-center shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px]">
                            <h2 class="text-[40px] md:text-[48px] font-bold leading-none mb-2">{{ $stat['big'] ?? '' }}</h2>
                            <h5 class="text-[14px] md:text-[15px] leading-snug opacity-90">{{ $stat['small'] ?? '' }}</h5>
                        </div>
                        <div class="text-center px-2">
                            <h2 class="text-[22px] md:text-[24px] font-semibold text-[#14166e] leading-snug mb-3">
                                {{ $stat['sub_big'] ?? '' }}
                            </h2>
                            <h5 class="text-[14px] text-gray-600 leading-relaxed">{{ $stat['sub'] ?? '' }}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- "Target your Skills" 2-column section --}}
    @if (! empty($targetSkills))
        <section class="bg-[#f6f8fb] py-16">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($targetSkills['image']))
                    <div class="flex justify-center">
                        <img src="{{ $targetSkills['image'] }}" alt="{{ $targetSkills['heading'] ?? '' }}"
                             class="w-full max-w-[560px] h-auto rounded-lg shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px]">
                    </div>
                @endif
                <div>
                    <h3 class="text-[24px] md:text-[30px] font-semibold text-[#14166e] mb-4 leading-snug">
                        {{ $targetSkills['heading'] ?? '' }}
                    </h3>
                    @if (! empty($targetSkills['lead']))
                        <h5 class="text-[15px] text-gray-700 leading-relaxed mb-6">
                            {{ $targetSkills['lead'] }}
                        </h5>
                    @endif
                    <ul class="space-y-3">
                        @foreach (($targetSkills['bullets'] ?? []) as $bullet)
                            <li class="flex items-start gap-3 text-[15px] text-gray-700">
                                <svg class="w-5 h-5 text-[#1e5c38] flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span>{{ $bullet }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    @endif

    {{-- Affiliate Partners carousel --}}
    @if (! empty($partners))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-center text-[26px] md:text-[34px] font-semibold text-[#14166e] mb-10">
                    {{ $partners['heading'] ?? '' }}
                </h2>
                <div class="relative overflow-hidden" x-data="{}"
                     x-init="
                        const track = $refs.track;
                        track.innerHTML += track.innerHTML;
                     ">
                    <div x-ref="track" class="flex gap-10 items-center animate-[scroll-x_40s_linear_infinite]">
                        @foreach (($partners['logos'] ?? []) as $logo)
                            <div class="flex-shrink-0">
                                <img src="{{ $logo }}" alt="Affiliate partner"
                                     class="w-[120px] h-[120px] object-contain opacity-80 hover:opacity-100 transition-opacity">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @push('head')
            <style>
                @keyframes scroll-x {
                    0%   { transform: translateX(0); }
                    100% { transform: translateX(-50%); }
                }
            </style>
        @endpush
    @endif

</x-layouts.cms>
