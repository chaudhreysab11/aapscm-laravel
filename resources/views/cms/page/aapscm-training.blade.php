@php
    $data          = $page->page_data ?? [];
    $hero          = $data['hero'] ?? [];
    $whyChoose     = $data['why_choose'] ?? [];
    $upcoming      = $data['upcoming'] ?? [];
    $saveTheDate   = $data['save_the_date'] ?? [];
    $contactCta    = $data['contact_cta'] ?? [];
    $schedHeading  = $data['schedule_heading'] ?? '';
    $cards         = $data['cards'] ?? [];
@endphp

<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    {{-- Section 1: Hero / Intro --}}
    @if (! empty($hero))
        <section class="bg-white pt-14 pb-10">
            <div class="max-w-[1100px] mx-auto px-4">
                <h2 class="text-[28px] md:text-[36px] font-semibold text-[#14166e] mb-4 leading-snug">
                    {{ $hero['heading'] ?? '' }}
                </h2>
                @if (! empty($hero['lead']))
                    <p class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed max-w-[900px]">
                        {{ $hero['lead'] }}
                    </p>
                @endif
            </div>
        </section>
    @endif

    {{-- Section 2: Why Choose + Key Features (image left, text right) --}}
    @if (! empty($whyChoose))
        <section class="bg-[#f6f8fb] py-14">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($whyChoose['image']))
                    <div>
                        <img src="{{ $whyChoose['image'] }}" alt="Why Choose AAPSCM Training"
                             class="w-full max-w-[593px] rounded-lg" loading="lazy">
                    </div>
                @endif
                <div>
                    <h2 class="text-[24px] md:text-[30px] font-semibold text-[#14166e] mb-4 leading-snug">
                        {{ $whyChoose['heading'] ?? '' }}
                    </h2>
                    @if (! empty($whyChoose['lead']))
                        <p class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed mb-6">
                            {{ $whyChoose['lead'] }}
                        </p>
                    @endif
                    @if (! empty($whyChoose['features_heading']))
                        <h3 class="text-[20px] md:text-[24px] font-semibold text-[#14166e] mb-3">
                            {{ $whyChoose['features_heading'] }}
                        </h3>
                    @endif
                    @if (! empty($whyChoose['features']))
                        <ul class="space-y-2">
                            @foreach ($whyChoose['features'] as $feature)
                                <li class="flex items-start gap-2 text-[15px] text-gray-700">
                                    <svg class="w-5 h-5 text-green-600 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- Section 3: Upcoming Opportunities --}}
    @if (! empty($upcoming))
        <section class="bg-[#14166e] text-white py-14">
            <div class="max-w-[1100px] mx-auto px-4 text-center mb-10">
                <h1 class="text-[28px] md:text-[36px] font-semibold mb-4">
                    {{ $upcoming['heading'] ?? '' }}
                </h1>
                @if (! empty($upcoming['lead']))
                    <p class="text-[15px] md:text-[17px] leading-relaxed max-w-[800px] mx-auto opacity-90">
                        {{ $upcoming['lead'] }}
                    </p>
                @endif
            </div>
            @if (! empty($upcoming['boxes']))
                <div class="max-w-[1100px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($upcoming['boxes'] as $box)
                        <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6">
                            <h2 class="text-[20px] md:text-[22px] font-semibold mb-3">
                                {{ $box['heading'] ?? '' }}
                            </h2>
                            <p class="text-[15px] leading-relaxed opacity-90">
                                {{ $box['text'] ?? '' }}
                            </p>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>
    @endif

    {{-- Section 4: Save the Date 2025/2026 (text left, image right) --}}
    @if (! empty($saveTheDate))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    <h3 class="text-[24px] md:text-[30px] font-semibold text-[#14166e] mb-4 leading-snug">
                        {{ $saveTheDate['heading'] ?? '' }}
                    </h3>
                    @if (! empty($saveTheDate['lead']))
                        <p class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed mb-6">
                            {{ $saveTheDate['lead'] }}
                        </p>
                    @endif
                    @if (! empty($saveTheDate['highlights_heading']))
                        <h3 class="text-[18px] md:text-[20px] font-semibold text-[#14166e] mb-3">
                            {{ $saveTheDate['highlights_heading'] }}
                        </h3>
                    @endif
                    @if (! empty($saveTheDate['highlights']))
                        <ul class="space-y-2">
                            @foreach ($saveTheDate['highlights'] as $hl)
                                <li class="flex items-start gap-2 text-[15px] text-gray-700">
                                    <svg class="w-5 h-5 text-green-600 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>{{ $hl }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                @if (! empty($saveTheDate['image']))
                    <div>
                        <img src="{{ $saveTheDate['image'] }}" alt="Save the Date"
                             class="w-full max-w-[730px] rounded-lg" loading="lazy">
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- Section 5: Contact CTA --}}
    @if (! empty($contactCta))
        <section class="bg-[#f6f8fb] py-10">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <p class="text-[16px] md:text-[20px] text-[#14166e] font-semibold leading-relaxed">
                    {{ $contactCta['text'] ?? '' }}
                </p>
            </div>
        </section>
    @endif

    {{-- Section 6: Schedule heading --}}
    @if ($schedHeading)
        <section class="bg-white pt-12 pb-4">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-center text-[22px] md:text-[28px] font-semibold text-[#14166e] leading-snug">
                    {{ $schedHeading }}
                </h2>
            </div>
        </section>
    @endif

    {{-- Section 7: Training schedule 2-col grid --}}
    @if (! empty($cards))
        <section class="bg-white py-10 pb-16">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($cards as $card)
                        @include('cms.partials.aapscm-training-card', ['card' => $card])
                    @endforeach
                </div>
            </div>
        </section>
    @endif

</x-layouts.cms>
