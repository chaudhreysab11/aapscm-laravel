<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $sliderSlides   = $page->page_data['slider']         ?? [];
        $hero           = $page->page_data['hero']           ?? [];
        $intro          = $page->page_data['intro']          ?? [];
        $certifications = $page->page_data['certifications'] ?? [];
        $training       = $page->page_data['training']       ?? [];
        $testCta        = $page->page_data['test_cta']       ?? [];
        $overview       = $page->page_data['overview']       ?? [];
        $process        = $page->page_data['process']        ?? [];
        $partners       = $page->page_data['partners']       ?? [];
    @endphp

    {{-- Live homepage slider parity --}}
    @if (! empty($sliderSlides))
        <section
            class="relative isolate overflow-hidden bg-[#101010]"
            x-data="{
                slides: @js($sliderSlides),
                active: 0,
                timer: null,
                start() {
                    this.stop();
                    if (this.slides.length < 2) return;
                    this.timer = window.setInterval(() => this.next(), 5600);
                },
                stop() {
                    if (this.timer !== null) {
                        window.clearInterval(this.timer);
                        this.timer = null;
                    }
                },
                next() {
                    this.active = (this.active + 1) % this.slides.length;
                },
                prev() {
                    this.active = (this.active - 1 + this.slides.length) % this.slides.length;
                },
                go(index) {
                    this.active = index;
                },
                init() {
                    this.start();
                }
            }"
            @mouseenter="stop()"
            @mouseleave="start()">
            <div class="relative h-[450px] md:h-[550px] xl:h-[650px]">
                @foreach ($sliderSlides as $slide)
                    <article
                        class="home-hero-slide absolute inset-0"
                        style="display: {{ $loop->first ? 'block' : 'none' }};"
                        x-show="active === {{ $loop->index }}"
                        x-transition:enter="transition ease-out duration-[950ms]"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-[700ms]"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        :aria-hidden="active === {{ $loop->index }} ? 'false' : 'true'">
                        <img
                            src="{{ $slide['image'] }}"
                            alt="{{ $slide['title'] }}"
                            class="home-hero-slide-image absolute inset-0 h-full w-full object-cover"
                        >
                        <div class="relative z-10 flex h-full items-center">
                            <div class="mx-auto w-full max-w-[1240px] px-5 sm:px-8 lg:px-10">
                                <div class="max-w-[920px] text-white">
                                    <h1
                                        class="home-hero-copy max-w-[1000px] font-['Poppins'] text-[48px] font-bold leading-[0.98] tracking-[-0.03em] text-white drop-shadow-[0_6px_30px_rgba(0,0,0,0.35)] sm:text-[72px] lg:text-[60px]"
                                        style="opacity: {{ $loop->first ? '1' : '0' }}; transform: translate3d({{ $loop->first ? '0' : '4.25rem' }}, {{ $loop->first ? '0' : '1rem' }}, 0) scale({{ $loop->first ? '1' : '0.97' }}); filter: blur({{ $loop->first ? '0' : '8px' }});"
                                        :style="active === {{ $loop->index }} ? 'opacity: 1; transform: translate3d(0, 0, 0) scale(1); filter: blur(0);' : 'opacity: 0; transform: translate3d(4.25rem, 1rem, 0) scale(0.97); filter: blur(8px);'"
                                    >
                                        {{ $slide['title'] }}
                                    </h1>

                                    <div
                                        class="home-hero-copy home-hero-copy-body mt-8 max-w-[470px] font-['Poppins'] text-[18px] font-light leading-[1.58] text-white/95 sm:text-[19px]"
                                        style="opacity: {{ $loop->first ? '1' : '0' }}; transform: translate3d({{ $loop->first ? '0' : '3rem' }}, {{ $loop->first ? '0' : '0.85rem' }}, 0); filter: blur({{ $loop->first ? '0' : '6px' }});"
                                        :style="active === {{ $loop->index }} ? 'opacity: 1; transform: translate3d(0, 0, 0); filter: blur(0);' : 'opacity: 0; transform: translate3d(3rem, 0.85rem, 0); filter: blur(6px);'"
                                    >
                                        {!! $slide['body_html'] !!}
                                    </div>

                                    <div
                                        class="home-hero-copy home-hero-copy-cta mt-8"
                                        style="opacity: {{ $loop->first ? '1' : '0' }}; transform: translate3d({{ $loop->first ? '0' : '2rem' }}, {{ $loop->first ? '0' : '0.75rem' }}, 0) scale({{ $loop->first ? '1' : '0.96' }}); filter: blur({{ $loop->first ? '0' : '5px' }});"
                                        :style="active === {{ $loop->index }} ? 'opacity: 1; transform: translate3d(0, 0, 0) scale(1); filter: blur(0);' : 'opacity: 0; transform: translate3d(2rem, 0.75rem, 0) scale(0.96); filter: blur(5px);'"
                                    >
                                        <a
                                            href="{{ $slide['cta_href'] }}"
                                            class="home-hero-cta inline-flex items-center gap-3 rounded-sm bg-[#ff1949] px-8 py-4 font-['Poppins'] text-[15px] font-semibold uppercase tracking-[0.08em] text-black shadow-[0_18px_45px_rgba(0,0,0,0.22)] transition duration-300 ease-out hover:-translate-y-0.5 hover:bg-[#ff315e] hover:shadow-[0_22px_52px_rgba(255,25,73,0.28)] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-white"
                                        >
                                            <span class="text-white">{{ $slide['cta_label'] }}</span>
                                            {{-- <span aria-hidden="true" class="text-lg leading-none">$</span> --}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <button
                type="button"
                class="home-hero-arrow absolute left-5 top-1/2 z-20 hidden h-16 w-16 -translate-y-1/2 items-center justify-center bg-black/38 text-white transition-colors duration-300 hover:bg-black/54 lg:inline-flex"
                @click="prev(); start()"
                aria-label="Previous slide">
                <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m15 18-6-6 6-6" /></svg>
            </button>

            <button
                type="button"
                class="home-hero-arrow absolute right-5 top-1/2 z-20 hidden h-16 w-16 -translate-y-1/2 items-center justify-center bg-black/38 text-white transition-colors duration-300 hover:bg-black/54 lg:inline-flex"
                @click="next(); start()"
                aria-label="Next slide">
                <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" /></svg>
            </button>

            <div class="absolute bottom-6 left-1/2 z-20 flex -translate-x-1/2 items-center gap-2 lg:hidden">
                @foreach ($sliderSlides as $slide)
                    <button
                        type="button"
                        class="h-2.5 rounded-full bg-white/35 transition-all duration-300"
                        :class="active === {{ $loop->index }} ? 'w-9 bg-white' : 'w-2.5'"
                        @click="go({{ $loop->index }}); start()"
                        aria-label="Go to slide {{ $loop->iteration }}"></button>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Hero / Welcome fallback --}}
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
                        <p class="text-[18px] text-gray-600 leading-relaxed flex-grow mb-5">
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
            <div class="max-w-[1100px] mx-auto px-4">
                <h2 class="text-center text-[26px] md:text-[34px] font-semibold text-[#14166e] mb-10">
                    {{ $training['heading'] ?? '' }}
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach (($training['cards'] ?? []) as $card)
                        <div class="bg-white rounded-lg p-5 shadow-[rgba(100,100,111,0.12)_0px_4px_14px_0px] transition-transform hover:-translate-y-1">
                            @if (! empty($card['image']))
                                <a href="{{ $card['href'] ?? '#' }}"
                                   class="block rounded-lg">
                                    <img src="{{ $card['image'] }}" alt="{{ $card['title'] }}"
                                         class="w-full h-[250px] object-cover rounded-md">
                                </a>
                            @endif
                            <div class="px-1 pt-5 text-center">
                                <h3 class="text-[18px] md:text-[20px] font-semibold text-[#14166e] leading-snug">
                                    <a href="{{ $card['href'] ?? '#' }}" class="hover:underline">{{ $card['title'] }}</a>
                                </h3>
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
        <section class="bg-[#14166e] relative isolate overflow-hidden py-16">
            @if (! empty($testCta['icon2']))
                <img src="{{ $testCta['icon2'] }}" alt="" aria-hidden="true"
                     class="pointer-events-none absolute top-0 left-0 z-0 w-full h-full object-cover opacity-20 select-none">
            @endif
            @if (! empty($testCta['icon']))
                <img src="{{ $testCta['icon'] }}" alt="" aria-hidden="true"
                     class="pointer-events-none absolute top-8 left-8 z-0 w-12 h-auto opacity-40 select-none">
            @endif
            <div class="relative z-10 max-w-[900px] mx-auto px-4 text-center text-white">
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
                        <div class="flex h-full flex-col bg-[#f6f8fb] rounded-lg p-6 text-center shadow-[rgba(100,100,111,0.12)_0px_4px_14px_0px] hover:-translate-y-1 transition-transform">
                            <div class="flex flex-1 flex-col">
                                @if (! empty($card['icon']))
                                    <img src="{{ $card['icon'] }}" alt="{{ $card['title'] }}"
                                        class="w-16 h-16 object-contain mx-auto mb-5">
                                @endif
                                <h2 class="text-[18px] font-semibold text-[#14166e] mb-3 leading-snug">{{ $card['title'] }}</h2>
                                <p class="text-[16px] text-gray-600 leading-relaxed">{{ $card['text'] }}</p>
                            </div>
                            <div class="mt-6">
                                <a href="{{ $card['href'] ?? '#' }}"
                                   class="inline-flex items-center gap-2 bg-[#14166e] hover:bg-[#1e2199] text-white font-semibold text-sm px-8 py-3 rounded-full transition-colors">
                                    Learn More
                                </a>
                            </div>
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
                                <p class="text-[16px] text-gray-600 leading-relaxed mb-3">{{ $step['text'] }}</p>
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

    @push('head')
        <style>
            .home-hero-slide {
                overflow: hidden;
            }

            .home-hero-slide-image {
                opacity: 0.86;
                transform: scale(1.015) translate3d(-1.25rem, 0, 0);
                transform-origin: center;
                transition:
                    transform 5600ms cubic-bezier(0.16, 1, 0.3, 1),
                    opacity 900ms ease,
                    filter 1200ms ease;
                will-change: transform, opacity, filter;
            }

            .home-hero-slide[aria-hidden="false"] .home-hero-slide-image {
                opacity: 1;
                transform: scale(1.09) translate3d(0, 0, 0);
                filter: saturate(1.06) contrast(1.04);
            }

            .home-hero-overlay {
                transition: opacity 900ms ease;
            }

            .home-hero-slide[aria-hidden="false"] .home-hero-overlay {
                opacity: 1;
            }

            .home-hero-copy {
                transition:
                    opacity 920ms cubic-bezier(0.16, 1, 0.3, 1),
                    transform 920ms cubic-bezier(0.16, 1, 0.3, 1),
                    filter 920ms cubic-bezier(0.16, 1, 0.3, 1);
                will-change: opacity, transform, filter;
            }

            .home-hero-copy-body {
                transition-delay: 180ms;
            }

            .home-hero-copy-cta {
                transition-delay: 340ms;
            }

            .home-hero-arrow {
                backdrop-filter: blur(2px);
            }

            .home-hero-cta {
                min-width: 178px;
                justify-content: center;
                position: relative;
                overflow: hidden;
            }

            .home-hero-cta::before {
                content: '';
                position: absolute;
                inset: 0;
                background: linear-gradient(120deg, transparent 0%, rgba(255,255,255,0.34) 42%, transparent 72%);
                transform: translateX(-130%);
                transition: transform 680ms ease;
            }

            .home-hero-cta:hover::before,
            .home-hero-cta:focus-visible::before {
                transform: translateX(130%);
            }

            .home-hero-cta > span {
                position: relative;
                z-index: 1;
            }

            @media (max-width: 1023px) {
                .home-hero-cta {
                    min-width: 0;
                    padding-inline: 1.4rem;
                }
            }

            @media (prefers-reduced-motion: reduce) {
                .home-hero-slide-image,
                .home-hero-copy,
                .home-hero-cta,
                .home-hero-cta::before {
                    transition-duration: 1ms !important;
                    transition-delay: 0ms !important;
                    animation-duration: 1ms !important;
                }

                .home-hero-slide[aria-hidden="false"] .home-hero-slide-image,
                .home-hero-slide-image {
                    transform: none;
                }
            }
        </style>
    @endpush

</x-layouts.cms>
