<x-layouts.cms>
    <x-cms.seo-head :page="$page" />
    @php
        $data              = $page->page_data ?? [];
        $intro             = $data['intro'] ?? [];
        $whatIs            = $data['what_is'] ?? [];
        $whyBecome         = $data['why_become'] ?? [];
        $eligibility       = $data['eligibility'] ?? [];
        $categoriesSection = $data['categories_section'] ?? [];
        $howToApply        = $data['how_to_apply'] ?? [];
        $cta               = $data['cta'] ?? [];
    @endphp

    {{-- Hero (uses intro heading/subheading) --}}
    <section class="relative bg-[#0B2F5E] py-16 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0B2F5E] to-[#14166e] opacity-90"></div>
        <div class="relative max-w-[1100px] mx-auto px-4 text-center">
            <h1 class="text-[28px] md:text-[40px] font-bold text-white leading-tight">
                {!! $intro['heading_html'] ?? e($page->title) !!}
            </h1>
            @if (!empty($intro['subheading']))
            <p class="text-[17px] text-blue-100 mt-4 max-w-3xl mx-auto">{{ $intro['subheading'] }}</p>
            @endif
        </div>
    </section>

    {{-- Intro image --}}
    @if (!empty($intro['image']))
    <section class="bg-white py-10">
        <div class="max-w-[1100px] mx-auto px-4 flex justify-center">
            <img src="{{ $intro['image'] }}" alt="Fellow Membership" class="rounded-xl shadow-lg max-h-[360px]" />
        </div>
    </section>
    @endif

    {{-- What is AAPSCM Fellowship? --}}
    @if (!empty($whatIs))
    <section class="bg-[#f6f8fb] py-14">
        <div class="max-w-[1100px] mx-auto px-4">
            @if (!empty($whatIs['heading_html']))
            <h2 class="text-[24px] md:text-[30px] font-semibold text-[#14166e] mb-4">{!! $whatIs['heading_html'] !!}</h2>
            @endif
            @if (!empty($whatIs['paragraph_html']))
            <p class="text-[15px] text-gray-700 leading-relaxed mb-5">{!! $whatIs['paragraph_html'] !!}</p>
            @endif
            @if (!empty($whatIs['items_html']))
            <ul class="space-y-3">
                @foreach ($whatIs['items_html'] as $h)
                <li class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-[#f0b323] mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    <span class="text-[14px] text-gray-700">{!! $h !!}</span>
                </li>
                @endforeach
            </ul>
            @endif
        </div>
    </section>
    @endif

    {{-- Why Become a Fellow --}}
    @if (!empty($whyBecome['boxes']))
    <section class="bg-white py-14">
        <div class="max-w-[1100px] mx-auto px-4">
            @if (!empty($whyBecome['heading_html']))
            <h2 class="text-[24px] md:text-[30px] font-semibold text-[#14166e] mb-8 text-center">{!! $whyBecome['heading_html'] !!}</h2>
            @endif
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($whyBecome['boxes'] as $box)
                <div class="bg-[#f6f8fb] rounded-xl p-6">
                    @if (!empty($whyBecome['icon']))
                    <img src="{{ $whyBecome['icon'] }}" alt="" class="w-10 h-10 mb-3" />
                    @endif
                    <h3 class="text-[16px] font-semibold text-[#14166e] mb-2">{{ $box['title'] ?? '' }}</h3>
                    <p class="text-[14px] text-gray-600 leading-relaxed">{{ $box['description'] ?? '' }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Eligibility --}}
    @if (!empty($eligibility['criteria']))
    <section class="bg-[#f6f8fb] py-14">
        <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-start">
            <div>
                @if (!empty($eligibility['heading_html']))
                <h2 class="text-[24px] md:text-[30px] font-semibold text-[#14166e] mb-3">{!! $eligibility['heading_html'] !!}</h2>
                @endif
                @if (!empty($eligibility['subheading']))
                <p class="text-[15px] text-gray-700 mb-6">{{ $eligibility['subheading'] }}</p>
                @endif
                <div class="space-y-5">
                    @foreach ($eligibility['criteria'] as $c)
                    <div class="bg-white rounded-xl p-5 shadow-sm">
                        <h3 class="text-[16px] font-semibold text-[#14166e] mb-2">{{ $c['title'] ?? '' }}</h3>
                        <p class="text-[14px] text-gray-600 leading-relaxed">{!! $c['description_html'] ?? '' !!}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @if (!empty($eligibility['image']))
            <div class="flex justify-center"><img src="{{ $eligibility['image'] }}" alt="Eligibility" class="rounded-xl shadow-lg max-h-[420px]" /></div>
            @endif
        </div>
    </section>
    @endif

    {{-- Fellow Categories Grid --}}
    @if (!empty($categoriesSection['categories']))
    <section class="bg-white py-14">
        <div class="max-w-[1100px] mx-auto px-4">
            @if (!empty($categoriesSection['heading_html']))
            <h2 class="text-[24px] md:text-[30px] font-semibold text-[#14166e] mb-3 text-center">{!! $categoriesSection['heading_html'] !!}</h2>
            @endif
            @if (!empty($categoriesSection['subheading']))
            <p class="text-[15px] text-gray-700 text-center mb-8 max-w-3xl mx-auto">{{ $categoriesSection['subheading'] }}</p>
            @endif
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ($categoriesSection['categories'] as $cat)
                <a href="{{ $cat['url'] ?? '#' }}" class="block bg-[#14166e] hover:bg-[#0B2F5E] text-white rounded-xl p-6 text-center text-[16px] font-semibold transition shadow-md hover:shadow-lg">
                    {{ $cat['title'] ?? '' }}
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- How to Apply --}}
    @if (!empty($howToApply))
    <section class="bg-[#f6f8fb] py-14">
        <div class="max-w-[900px] mx-auto px-4">
            @if (!empty($howToApply['heading_html']))
            <h2 class="text-[24px] md:text-[30px] font-semibold text-[#14166e] mb-3">{!! $howToApply['heading_html'] !!}</h2>
            @endif
            @if (!empty($howToApply['subheading']))
            <p class="text-[15px] text-gray-700 mb-5">{{ $howToApply['subheading'] }}</p>
            @endif
            @if (!empty($howToApply['steps_html']))
            <ol class="space-y-4">
                @foreach ($howToApply['steps_html'] as $step)
                <li class="flex items-start gap-4">
                    <span class="bg-[#f0b323] text-[#14166e] font-bold text-[14px] rounded-full w-8 h-8 flex items-center justify-center shrink-0">{{ $loop->iteration }}</span>
                    <p class="text-[15px] text-gray-700 leading-relaxed">{!! $step !!}</p>
                </li>
                @endforeach
            </ol>
            @endif
        </div>
    </section>
    @endif

    {{-- CTA --}}
    <section class="bg-[#14166e] py-12">
        <div class="max-w-[1100px] mx-auto px-4 text-center">
            @if (!empty($cta['paragraph']))
            <p class="text-[15px] md:text-[16px] text-blue-100 leading-relaxed max-w-3xl mx-auto mb-8">{{ $cta['paragraph'] }}</p>
            @endif
            @if (!empty($cta['buttons']))
            <div class="flex flex-wrap justify-center gap-4">
                @foreach ($cta['buttons'] as $i => $btn)
                <a href="{{ $btn['url'] ?? '#' }}"
                   class="inline-block font-bold text-[15px] px-8 py-3 rounded-lg transition
                          {{ $i === 0 ? 'bg-[#f0b323] hover:bg-yellow-500 text-[#14166e]' : 'border-2 border-white text-white hover:bg-white hover:text-[#14166e]' }}">
                    {{ $btn['text'] ?? '' }}
                </a>
                @endforeach
            </div>
            @endif
        </div>
    </section>
</x-layouts.cms>
