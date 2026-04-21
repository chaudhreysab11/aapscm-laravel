<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $data       = $page->page_data ?? [];
        $hero       = $data['hero'] ?? [];
        $elevate    = $data['elevate'] ?? [];
        $whyLearn   = $data['why_learn'] ?? [];
        $curriculum = $data['curriculum'] ?? [];
        $features   = $data['features'] ?? [];
        $membership = $data['membership'] ?? [];
        $cta        = $data['cta'] ?? [];
    @endphp

    {{-- Hero banner --}}
    <section class="relative bg-[#0B2F5E] py-16 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0B2F5E] to-[#14166e] opacity-90"></div>
        <div class="relative max-w-[1100px] mx-auto px-4 text-center">
            <h1 class="text-[32px] md:text-[44px] font-bold text-white leading-tight">
                {{ $hero['heading'] ?? $page->title }}
            </h1>
        </div>
    </section>

    {{-- Elevate Your Future --}}
    @if (! empty($elevate))
    <section class="bg-white py-14">
        <div class="max-w-[1100px] mx-auto px-4 flex flex-col md:flex-row items-center gap-10">
            <div class="md:w-1/2">
                <h2 class="text-[28px] md:text-[36px] font-bold text-[#14166e] mb-2 leading-tight">
                    {{ $elevate['heading'] ?? '' }}
                </h2>
                @if (! empty($elevate['subheading']))
                <h3 class="text-[20px] md:text-[24px] font-semibold text-[#195b13] mb-4">
                    {{ $elevate['subheading'] }}
                </h3>
                @endif
                @if (! empty($elevate['text']))
                <div class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed">
                    {!! nl2br(e($elevate['text'])) !!}
                </div>
                @endif
            </div>
            @if (! empty($elevate['image']))
            <div class="md:w-1/2">
                <img src="{{ $elevate['image'] }}" alt="Procurement Management" class="w-full max-w-[537px] mx-auto rounded-lg" />
            </div>
            @endif
        </div>
    </section>
    @endif

    {{-- Why Should You Learn Procurement Management? --}}
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
                    @if (! empty($whyLearn['check_icon']))
                    <img src="{{ $whyLearn['check_icon'] }}" alt="" class="w-[40px] h-[34px] flex-shrink-0 mt-1" />
                    @endif
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
        </div>
    </section>
    @endif

    {{-- Program Features --}}
    @if (! empty($features))
    <section class="bg-[#f6f8fb] py-14">
        <div class="max-w-[1100px] mx-auto px-4">
            <h2 class="text-[24px] md:text-[32px] font-semibold text-[#14166e] mb-8 text-center leading-snug">
                {{ $features['heading'] ?? '' }}
            </h2>

            @if (! empty($features['items']))
            {{-- First row: 3 cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach (array_slice($features['items'], 0, 3) as $feature)
                <div class="bg-white rounded-xl p-6 text-center shadow-sm">
                    @if (! empty($feature['icon']))
                    <img src="{{ $feature['icon'] }}" alt="" class="w-[80px] h-[96px] mx-auto mb-4" />
                    @endif
                    <h3 class="text-[18px] font-semibold text-[#14166e] mb-2">{{ $feature['title'] }}</h3>
                    <p class="text-[14px] text-gray-600 leading-relaxed">{{ $feature['description'] }}</p>
                </div>
                @endforeach
            </div>
            {{-- Second row: 2 cards centered --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6 max-w-[740px] mx-auto">
                @foreach (array_slice($features['items'], 3) as $feature)
                <div class="bg-white rounded-xl p-6 text-center shadow-sm">
                    @if (! empty($feature['icon']))
                    <img src="{{ $feature['icon'] }}" alt="" class="w-[80px] h-[96px] mx-auto mb-4" />
                    @endif
                    <h3 class="text-[18px] font-semibold text-[#14166e] mb-2">{{ $feature['title'] }}</h3>
                    <p class="text-[14px] text-gray-600 leading-relaxed">{{ $feature['description'] }}</p>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    @endif

    {{-- Exclusive Membership Opportunity --}}
    @if (! empty($membership))
    <section class="bg-white py-14">
        <div class="max-w-[1100px] mx-auto px-4 flex flex-col md:flex-row gap-10">
            <div class="hidden md:block md:w-1/2 bg-[#f6f8fb] rounded-xl min-h-[300px]"></div>
            <div class="md:w-1/2">
                <h2 class="text-[24px] md:text-[32px] font-semibold text-[#14166e] mb-4 leading-snug">
                    {{ $membership['heading'] ?? '' }}
                </h2>
                <p class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed mb-5">
                    {{ $membership['text'] ?? '' }}
                </p>

                @if (! empty($membership['benefits']))
                <ul class="space-y-3 mb-6">
                    @foreach ($membership['benefits'] as $benefit)
                    <li class="flex items-start gap-2 text-[15px] text-gray-700">
                        <svg class="w-5 h-5 text-[#195b13] flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        {{ $benefit }}
                    </li>
                    @endforeach
                </ul>
                @endif

                @if (! empty($membership['enroll_heading']))
                <h3 class="text-[18px] font-semibold text-gray-800 mb-3">
                    {{ $membership['enroll_heading'] }}
                </h3>
                @endif

                @if (! empty($membership['enroll_steps']))
                <ol class="list-decimal list-inside space-y-2 text-[15px] text-gray-700">
                    @foreach ($membership['enroll_steps'] as $step)
                    <li>{{ $step }}</li>
                    @endforeach
                </ol>
                @endif
            </div>
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
            <h3 class="text-[22px] md:text-[28px] font-bold text-white mb-6">
                {{ $cta['subheading'] }}
            </h3>
            @endif

            <div class="flex flex-col sm:flex-row justify-center gap-4 mb-6">
                @if (! empty($cta['signup_url']))
                <a href="{{ $cta['signup_url'] }}" class="inline-block bg-[#195b13] hover:bg-[#14490f] text-white font-semibold px-8 py-3 rounded-lg transition-colors text-[16px]">
                    {{ $cta['signup_label'] ?? 'Sign Up Now' }}
                </a>
                @endif
                @if (! empty($cta['member_url']))
                <a href="{{ $cta['member_url'] }}" class="inline-block bg-white hover:bg-gray-100 text-[#14166e] font-semibold px-8 py-3 rounded-lg transition-colors text-[16px]">
                    {{ $cta['member_label'] ?? 'Become a Member' }}
                </a>
                @endif
            </div>

            @if (! empty($cta['email']))
            <p class="text-[14px] text-gray-300">
                For questions or additional details, email us at
                <a href="mailto:{{ $cta['email'] }}" class="text-white underline hover:text-gray-100">{{ $cta['email'] }}</a>.
            </p>
            @endif
        </div>
    </section>
    @endif

</x-layouts.cms>