<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $hero           = $page->page_data['hero']           ?? [];
        $intro          = $page->page_data['intro']          ?? [];
        $certifications = $page->page_data['certifications'] ?? [];
        $training       = $page->page_data['training']       ?? [];
        $testCta        = $page->page_data['test_cta']       ?? [];
        $overview       = $page->page_data['overview']       ?? [];
        $process        = $page->page_data['process']        ?? [];
        $partners       = $page->page_data['partners']       ?? [];
    @endphp

    {{-- Hero / Welcome --}}
    <section class="bg-white text-white py-20 md:py-28 flex items-center justify-center">
        <div class="bg-[#F8F8F8] max-w-[1140px] px-10 py-10 ">
            <h1 class="text-[25px] md:text-[25px] lg:text-[32px] font-bold leading-tight mb-8 text-center text-black">
                {{ $hero['heading'] ?? $page->title }}
            </h1>
            <div class="max-w-[1000px] mx-auto space-y-5 text-[15px] md:text-[17px] leading-relaxed text-black text-center">
                @foreach (($hero['paragraphs'] ?? []) as $p)
                    <p>{{ $p }}</p>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Advancing Excellence intro --}}
    @if (! empty($intro))
        <section class="bg-white py-16">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="text-[26px] md:text-[34px] font-semibold text-[#14166e] mb-6 leading-snug">
                        {{ $intro['heading'] ?? '' }}
                    </h2>
                    <div class="space-y-4 text-[15px] md:text-[16px] text-gray-700 leading-relaxed">
                        @foreach (($intro['paragraphs'] ?? []) as $p)
                            <p>{{ $p }}</p>
                        @endforeach
                    </div>
                </div>
                @if (! empty($intro['image']))
                    <div class="flex justify-center">
                        <img src="{{ $intro['image'] }}" alt="Advancing Excellence"
                             class="w-full max-w-[521px] h-auto rounded-lg shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px]">
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- 49 Certification Cards --}}
    @if (! empty($certifications))
        <section class="bg-[#f6f8fb] py-16">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                @foreach ($certifications as $cert)
                    <div class="bg-white rounded-lg shadow-[rgba(100,100,111,0.12)_0px_4px_14px_0px] p-6 flex flex-col text-center hover:-translate-y-1 transition-transform">
                        @if (! empty($cert['image']))
                            <img src="{{ $cert['image'] }}" alt="{{ $cert['title'] }}"
                                 class="w-[200px] h-[200px] object-contain mx-auto mb-4">
                        @endif
                        <h2 class="text-[35px] font-semibold text-[#14166e] leading-snug mb-3 min-h-[56px]">
                            {{ $cert['title'] }}
                        </h2>
                        <p class="text-[14px] text-gray-600 leading-relaxed flex-grow mb-5">
                            {{ $cert['desc'] }}
                        </p>
                        @if (! empty($cert['badge']))
                            <img src="{{ $cert['badge'] }}" alt="{{ $cert['title'] }} badge"
                                 class="w-[130px] h-[130px] object-contain mx-auto mb-4">
                        @endif
                        <a href="{{ $cert['href'] ?? '#' }}"
                           class="inline-flex items-center justify-center gap-2 bg-[#14166e] hover:bg-[#1e2199] text-white font-semibold text-sm px-5 py-2.5 rounded-full transition-colors">
                            Learn More
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- AAPSCM Training --}}
    @if (! empty($training))
        <section class="bg-white py-16">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-center text-[26px] md:text-[34px] font-semibold text-[#14166e] mb-10">
                    {{ $training['heading'] ?? '' }}
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach (($training['cards'] ?? []) as $card)
                        <div class="bg-[#f6f8fb] rounded-lg overflow-hidden shadow-[rgba(100,100,111,0.12)_0px_4px_14px_0px]">
                            @if (! empty($card['image']))
                                <a href="{{ $card['href'] ?? '#' }}">
                                    <img src="{{ $card['image'] }}" alt="{{ $card['title'] }}"
                                         class="w-full h-[250px] object-cover">
                                </a>
                            @endif
                            <div class="p-6">
                                <h3 class="text-[18px] md:text-[20px] font-semibold text-[#14166e] mb-4 leading-snug">
                                    <a href="{{ $card['href'] ?? '#' }}" class="hover:underline">{{ $card['title'] }}</a>
                                </h3>
                                <ul class="space-y-2">
                                    @foreach (($card['dates'] ?? []) as $d)
                                        <li class="flex items-center gap-2 text-[14px] text-gray-700">
                                            <svg class="w-4 h-4 text-[#14166e]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                                            <b>{{ $d }}</b>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if (! empty($training['cta_href']))
                    <div class="text-center mt-10">
                        <a href="{{ $training['cta_href'] }}"
                           class="inline-flex items-center gap-2 bg-[#14166e] hover:bg-[#1e2199] text-white font-semibold text-sm px-8 py-3 rounded-full transition-colors">
                            {{ $training['cta_label'] ?? 'Read More' }}
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                        </a>
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- Test Online CTA band --}}
    @if (! empty($testCta))
        <section class="bg-[#14166e] relative overflow-hidden py-16">
            @if (! empty($testCta['icon']))
                <img src="{{ $testCta['icon'] }}" alt=""
                     class="absolute top-8 left-8 w-12 h-auto opacity-40">
            @endif
            <div class="max-w-[900px] mx-auto px-4 text-center text-white">
                @if (! empty($testCta['eyebrow']))
                    <div class="inline-flex items-center gap-2 text-sm uppercase tracking-wider mb-4 text-yellow-300">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" /><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" /></svg>
                        {{ $testCta['eyebrow'] }}
                    </div>
                @endif
                <h2 class="text-[26px] md:text-[36px] font-semibold leading-tight mb-5">
                    {!! $testCta['heading'] ?? '' !!}
                </h2>
                @if (! empty($testCta['description']))
                    <p class="text-white/80 text-[15px] md:text-[16px] leading-relaxed mb-7 max-w-[720px] mx-auto">
                        {{ $testCta['description'] }}
                    </p>
                @endif
                @if (! empty($testCta['button_href']))
                    <a href="{{ $testCta['button_href'] }}"
                       class="inline-flex items-center gap-2 bg-yellow-400 hover:bg-yellow-300 text-[#14166e] font-semibold text-sm px-8 py-3 rounded-full transition-colors">
                        {{ $testCta['button_text'] ?? 'Register' }}
                    </a>
                @endif
            </div>
        </section>
    @endif

    {{-- Certifications Overview (4 cards) --}}
    @if (! empty($overview))
        <section class="bg-white py-16">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-center text-[26px] md:text-[34px] font-semibold text-[#14166e] mb-10">
                    {{ $overview['heading'] ?? '' }}
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach (($overview['cards'] ?? []) as $card)
                        <div class="bg-[#f6f8fb] rounded-lg p-6 text-center shadow-[rgba(100,100,111,0.12)_0px_4px_14px_0px] hover:-translate-y-1 transition-transform">
                            @if (! empty($card['icon']))
                                <img src="{{ $card['icon'] }}" alt="{{ $card['title'] }}"
                                     class="w-16 h-16 object-contain mx-auto mb-5">
                            @endif
                            <h2 class="text-[18px] font-semibold text-[#14166e] mb-3 leading-snug">{{ $card['title'] }}</h2>
                            <p class="text-[14px] text-gray-600 leading-relaxed mb-5 min-h-[100px]">{{ $card['text'] }}</p>
                            <a href="{{ $card['href'] ?? '#' }}"
                               class="inline-block text-[#14166e] hover:text-[#1e2199] font-semibold text-sm underline">
                                Learn More
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Certification Process (5 steps) --}}
    @if (! empty($process))
        <section class="bg-[#f6f8fb] py-16">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-center text-[26px] md:text-[34px] font-semibold text-[#14166e] mb-10">
                    {{ $process['heading'] ?? '' }}
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach (($process['steps'] ?? []) as $step)
                        <div class="bg-white rounded-lg p-6 flex gap-5 shadow-[rgba(100,100,111,0.10)_0px_4px_12px_0px]">
                            @if (! empty($step['icon']))
                                <div class="flex-shrink-0">
                                    <img src="{{ $step['icon'] }}" alt="{{ $step['title'] }}"
                                         class="w-16 h-16 object-contain">
                                </div>
                            @endif
                            <div class="flex-grow">
                                <h3 class="text-[18px] font-semibold text-[#14166e] mb-2">{{ $step['title'] }}</h3>
                                <p class="text-[14px] text-gray-600 leading-relaxed mb-3">{{ $step['text'] }}</p>
                                @if (! empty($step['href']))
                                    <a href="{{ $step['href'] }}"
                                       class="inline-flex items-center gap-2 text-[#14166e] hover:text-[#1e2199] font-semibold text-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"/><path stroke-width="2" stroke-linecap="round" d="M10 8l4 4-4 4"/></svg>
                                        Read More
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
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
