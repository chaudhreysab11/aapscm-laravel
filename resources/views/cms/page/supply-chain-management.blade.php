<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $data       = $page->page_data ?? [];
        $hero       = $data['hero'] ?? [];
        $intro      = $data['intro'] ?? [];
        $whyLearn   = $data['why_learn'] ?? [];
        $curriculum = $data['curriculum'] ?? [];
        $features   = $data['features'] ?? [];
        $whoFor     = $data['who_is_this_for'] ?? [];
        $cta        = $data['cta'] ?? [];
    @endphp

    {{-- Hero banner --}}
    <section class="relative bg-[#0B2F5E] py-16 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0B2F5E] to-[#14166e] opacity-90"></div>
        <div class="relative max-w-[1100px] mx-auto px-4 text-center">
            <h1 class="text-[28px] md:text-[40px] font-bold text-white leading-tight">
                {{ $hero['heading'] ?? $page->title }}
            </h1>
        </div>
    </section>

    {{-- Intro paragraph --}}
    @if (! empty($intro['text']))
    <section class="bg-white py-14">
        <div class="max-w-[1100px] mx-auto px-4">
            <p class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed">
                {{ $intro['text'] }}
            </p>
        </div>
    </section>
    @endif

    {{-- Why Should You Learn Supply Chain Management? --}}
    @if (! empty($whyLearn))
    <section class="bg-[#f6f8fb] py-14">
        <div class="max-w-[1100px] mx-auto px-4">
            <h2 class="text-[24px] md:text-[32px] font-semibold text-[#14166e] mb-4 leading-snug">
                {{ $whyLearn['heading'] ?? '' }}
            </h2>
            <p class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed mb-6">
                {{ $whyLearn['text'] ?? '' }}
            </p>

            @if (! empty($whyLearn['reasons_heading']))
            <p class="text-[16px] font-semibold text-gray-800 mb-5">
                {{ $whyLearn['reasons_heading'] }}
            </p>
            @endif

            @if (! empty($whyLearn['reasons']))
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach ($whyLearn['reasons'] as $reason)
                <div class="flex items-start gap-3 bg-white rounded-lg p-5 shadow-sm">
                    <svg class="w-5 h-5 text-[#195b13] flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    <p class="text-[15px] text-gray-700 leading-relaxed">
                        <strong>{{ $reason['bold'] }}</strong> {{ $reason['text'] }}
                    </p>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    @endif

    {{-- What Will You Learn? (Curriculum modules) --}}
    @if (! empty($curriculum))
    <section class="bg-white py-14">
        <div class="max-w-[1100px] mx-auto px-4">
            <h2 class="text-[24px] md:text-[32px] font-semibold text-[#14166e] mb-3 leading-snug">
                {{ $curriculum['heading'] ?? '' }}
            </h2>
            <p class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed mb-8">
                {{ $curriculum['text'] ?? '' }}
            </p>

            @if (! empty($curriculum['modules']))
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($curriculum['modules'] as $module)
                <div class="bg-[#f6f8fb] rounded-xl p-6 text-center">
                    @if (! empty($module['icon']))
                    <img src="{{ $module['icon'] }}" alt="" class="w-[87px] h-[87px] mx-auto mb-4" />
                    @endif
                    <h3 class="text-[18px] font-semibold text-[#14166e] mb-2">{{ $module['title'] }}</h3>
                    <p class="text-[14px] text-gray-600 leading-relaxed">{{ $module['description'] }}</p>
                </div>
                @endforeach
            </div>
            @endif

            @if (! empty($curriculum['divider_image']))
            <div class="mt-10 text-center">
                <img src="{{ $curriculum['divider_image'] }}" alt="" class="max-w-[570px] w-full mx-auto rounded-lg" />
            </div>
            @endif
        </div>
    </section>
    @endif

    {{-- Program Features (checklist) --}}
    @if (! empty($features))
    <section class="bg-[#f6f8fb] py-14">
        <div class="max-w-[1100px] mx-auto px-4">
            <h2 class="text-[24px] md:text-[32px] font-semibold text-[#14166e] mb-8 leading-snug">
                {{ $features['heading'] ?? '' }}
            </h2>

            @if (! empty($features['items']))
            <ul class="space-y-4 max-w-[800px]">
                @foreach ($features['items'] as $item)
                <li class="flex items-start gap-3 text-[15px] md:text-[16px] text-gray-700 leading-relaxed">
                    <svg class="w-5 h-5 text-[#195b13] flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    <span><strong>{{ $item['bold'] }}</strong> {{ $item['text'] }}</span>
                </li>
                @endforeach
            </ul>
            @endif
        </div>
    </section>
    @endif

    {{-- Who Is This Program For? --}}
    @if (! empty($whoFor))
    <section class="bg-white py-14">
        <div class="max-w-[1100px] mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center gap-10 mb-12">
                <div class="md:w-1/2">
                    <p class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed">
                        {{ $whoFor['text'] ?? '' }}
                    </p>
                </div>
                @if (! empty($whoFor['image']))
                <div class="md:w-1/2">
                    <img src="{{ $whoFor['image'] }}" alt="Who is this program for" class="w-full max-w-[500px] mx-auto rounded-lg" />
                </div>
                @endif
            </div>

            @if (! empty($whoFor['heading']))
            <h2 class="text-[22px] md:text-[28px] font-semibold text-[#14166e] mb-8 text-center">
                {{ $whoFor['heading'] }}
            </h2>
            @endif

            @if (! empty($whoFor['cards']))
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($whoFor['cards'] as $card)
                <div class="bg-[#f6f8fb] rounded-xl p-6 text-center">
                    @if (! empty($card['icon']))
                    <img src="{{ $card['icon'] }}" alt="" class="w-[60px] h-[60px] mx-auto mb-4" />
                    @endif
                    <h3 class="text-[17px] font-semibold text-[#14166e] mb-2">{{ $card['title'] }}</h3>
                    <p class="text-[14px] text-gray-600 leading-relaxed">{{ $card['description'] }}</p>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    @endif

    {{-- Bottom CTA --}}
    @if (! empty($cta))
    <section class="bg-[#0B2F5E] py-14">
        <div class="max-w-[1100px] mx-auto px-4 text-center">
            <h2 class="text-[24px] md:text-[32px] font-semibold text-white mb-4 leading-snug">
                {{ $cta['heading'] ?? '' }}
            </h2>
            <p class="text-[15px] md:text-[17px] text-gray-200 leading-relaxed mb-4 max-w-[800px] mx-auto">
                {{ $cta['text'] ?? '' }}
            </p>

            @if (! empty($cta['subheading']))
            <h3 class="text-[20px] md:text-[26px] font-bold text-white mb-6">
                {{ $cta['subheading'] }}
            </h3>
            @endif

            <div class="flex justify-center mb-6">
                @if (! empty($cta['signup_url']))
                <a href="{{ $cta['signup_url'] }}" class="inline-block bg-[#195b13] hover:bg-[#14490f] text-white font-semibold px-8 py-3 rounded-lg transition-colors text-[16px]">
                    {{ $cta['signup_label'] ?? 'Sign Up Now' }}
                </a>
                @endif
            </div>

            @if (! empty($cta['email']))
            <p class="text-[14px] text-gray-300">
                For any questions or additional details, contact us at
                <a href="mailto:{{ $cta['email'] }}" class="text-white underline hover:text-gray-100">{{ $cta['email'] }}</a>.
            </p>
            @endif
        </div>
    </section>
    @endif

</x-layouts.cms>