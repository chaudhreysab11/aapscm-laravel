<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $hero           = $page->page_data['hero']                 ?? [];
        $empower        = $page->page_data['empower']              ?? [];
        $whyInvest      = $page->page_data['why_invest']           ?? [];
        $programsIntro  = $page->page_data['programs_intro']       ?? [];
        $procCards      = $page->page_data['procurement_cards']    ?? [];
        $procIdealFor   = $page->page_data['procurement_ideal_for'] ?? '';
        $scHeading      = $page->page_data['supply_chain_heading']  ?? '';
        $scCards        = $page->page_data['supply_chain_cards']    ?? [];
        $scIdealFor     = $page->page_data['supply_chain_ideal_for'] ?? '';
        $tourismHeading = $page->page_data['tourism_heading']       ?? '';
        $tourismCards   = $page->page_data['tourism_cards']         ?? [];
        $flex           = $page->page_data['flexible_learning']    ?? [];
        $whyChoose      = $page->page_data['why_choose']           ?? [];
        $whoBenefits    = $page->page_data['who_benefits']         ?? [];
        $cta            = $page->page_data['cta']                  ?? [];
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- Hero subheading --}}
    <section class="bg-[#fef5ef] py-14">
        <div class="max-w-[1100px] mx-auto px-4 text-center">
            <h3 class="text-[22px] md:text-[28px] font-semibold text-[#14166e] leading-snug">
                {{ $hero['subheading'] ?? '' }}
            </h3>
        </div>
    </section>

    {{-- Empower (2-col) --}}
    <section class="bg-white py-16">
        <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            <div>
                <h2 class="text-[26px] md:text-[34px] font-semibold text-[#14166e] leading-tight mb-6">
                    {{ $empower['heading'] ?? '' }}
                </h2>
                @if (! empty($empower['body_1']))
                    <p class="text-[16px] text-gray-700 leading-relaxed mb-4">{{ $empower['body_1'] }}</p>
                @endif
                @if (! empty($empower['body_2']))
                    <p class="text-[16px] text-gray-700 leading-relaxed">{{ $empower['body_2'] }}</p>
                @endif
            </div>
            @if (! empty($empower['image']))
                <div class="flex justify-center">
                    <img src="{{ $empower['image'] }}" alt="" class="rounded-lg shadow-[rgba(100,100,111,0.2)_0px_7px_29px_0px] max-w-full h-auto">
                </div>
            @endif
        </div>
    </section>

    {{-- Why invest (image + checklist) --}}
    <section class="bg-[#f6f8fb] py-16">
        <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            @if (! empty($whyInvest['image']))
                <div class="flex justify-center">
                    <img src="{{ $whyInvest['image'] }}" alt="" class="rounded-lg shadow-[rgba(100,100,111,0.2)_0px_7px_29px_0px] max-w-full h-auto">
                </div>
            @endif
            <div>
                <h2 class="text-[26px] md:text-[34px] font-semibold text-[#14166e] leading-tight mb-6">
                    {{ $whyInvest['heading'] ?? '' }}
                </h2>
                <ul class="space-y-4 mb-6">
                    @foreach (($whyInvest['items'] ?? []) as $item)
                        <li class="flex gap-3 text-[16px] text-gray-700 leading-relaxed">
                            <span class="text-[#14166e] shrink-0 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            </span>
                            <span><b class="font-bold text-[#14166e]">{{ $item['label'] }}</b>{{ $item['body'] }}</span>
                        </li>
                    @endforeach
                </ul>
                @if (! empty($whyInvest['example']))
                    <p class="text-[15px] text-gray-700 leading-relaxed italic border-l-4 border-[#14166e] pl-4 bg-white/60 py-3 rounded">
                        <strong class="text-[#14166e]">Example</strong>: {{ $whyInvest['example'] }}
                    </p>
                @endif
            </div>
        </div>
    </section>

    {{-- Programs intro --}}
    <section class="bg-white py-14">
        <div class="max-w-[1000px] mx-auto px-4 text-center">
            <h2 class="text-[26px] md:text-[34px] font-semibold text-[#14166e] leading-tight mb-4">
                {{ $programsIntro['heading'] ?? '' }}
            </h2>
            @if (! empty($programsIntro['body']))
                <p class="text-[16px] text-gray-700 leading-relaxed mb-6">{{ $programsIntro['body'] }}</p>
            @endif
            @if (! empty($programsIntro['subheading']))
                <h2 class="text-[22px] md:text-[28px] font-semibold text-[#14166e] leading-tight">
                    {{ $programsIntro['subheading'] }}
                </h2>
            @endif
        </div>
    </section>

    {{-- Procurement 3-card grid --}}
    <section class="bg-white pb-10">
        <div class="max-w-[1200px] mx-auto px-4 grid sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach ($procCards as $card)
                <div class="bg-white border border-gray-200 rounded-lg p-6 text-center shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px]">
                    <img src="{{ $card['image'] }}" alt="" class="w-[120px] h-[120px] object-contain mx-auto mb-4">
                    <h3 class="text-[18px] font-semibold text-[#14166e] mb-3">{{ $card['title'] }}</h3>
                    <p class="text-[15px] text-gray-700 leading-relaxed">{{ $card['body'] }}</p>
                </div>
            @endforeach
        </div>
        @if (! empty($procIdealFor))
            <div class="max-w-[1000px] mx-auto px-4 mt-8 text-center">
                <p class="text-[16px] text-gray-700"><strong class="text-[#14166e]">Ideal for</strong>: {{ $procIdealFor }}</p>
            </div>
        @endif
    </section>

    {{-- Supply chain heading --}}
    <section class="bg-[#f6f8fb] py-10">
        <div class="max-w-[1200px] mx-auto px-4 text-center">
            <h2 class="text-[24px] md:text-[30px] font-semibold text-[#14166e]">{{ $scHeading }}</h2>
        </div>
    </section>

    {{-- Supply chain 3-card grid --}}
    <section class="bg-[#f6f8fb] pb-10">
        <div class="max-w-[1200px] mx-auto px-4 grid sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach ($scCards as $card)
                <div class="bg-white border border-gray-200 rounded-lg p-6 text-center shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px]">
                    <img src="{{ $card['image'] }}" alt="" class="w-[120px] h-[120px] object-contain mx-auto mb-4">
                    <h3 class="text-[18px] font-semibold text-[#14166e] mb-3">{{ $card['title'] }}</h3>
                    <p class="text-[15px] text-gray-700 leading-relaxed">{{ $card['body'] }}</p>
                </div>
            @endforeach
        </div>
        @if (! empty($scIdealFor))
            <div class="max-w-[1000px] mx-auto px-4 mt-8 text-center">
                <p class="text-[16px] text-gray-700"><strong class="text-[#14166e]">Ideal for</strong>: {{ $scIdealFor }}</p>
            </div>
        @endif
    </section>

    {{-- Tourism heading --}}
    <section class="bg-white py-10">
        <div class="max-w-[1200px] mx-auto px-4 text-center">
            <h2 class="text-[24px] md:text-[30px] font-semibold text-[#14166e]">{{ $tourismHeading }}</h2>
        </div>
    </section>

    {{-- Tourism 3-card grid --}}
    <section class="bg-white pb-14">
        <div class="max-w-[1200px] mx-auto px-4 grid sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach ($tourismCards as $card)
                <div class="bg-white border border-gray-200 rounded-lg p-6 text-center shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px]">
                    <img src="{{ $card['image'] }}" alt="" class="w-[120px] h-[120px] object-contain mx-auto mb-4">
                    <h3 class="text-[18px] font-semibold text-[#14166e] mb-3">{{ $card['title'] }}</h3>
                    <p class="text-[15px] text-gray-700 leading-relaxed">{{ $card['body'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Flexible learning --}}
    <section class="bg-[#fef5ef] py-16">
        <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            <div>
                <h2 class="text-[26px] md:text-[34px] font-semibold text-[#14166e] leading-tight mb-4">
                    {{ $flex['heading'] ?? '' }}
                </h2>
                @if (! empty($flex['intro']))
                    <p class="text-[16px] text-gray-700 leading-relaxed mb-6">{{ $flex['intro'] }}</p>
                @endif
                <ul class="space-y-4 mb-6">
                    @foreach (($flex['items'] ?? []) as $item)
                        <li class="flex gap-3 text-[16px] text-gray-700 leading-relaxed">
                            <span class="text-[#14166e] shrink-0 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            </span>
                            <span><b class="font-bold text-[#14166e]">{{ $item['label'] }}</b>{{ $item['body'] }}</span>
                        </li>
                    @endforeach
                </ul>
                @if (! empty($flex['example']))
                    <p class="text-[15px] text-gray-700 leading-relaxed italic border-l-4 border-[#14166e] pl-4 bg-white/60 py-3 rounded">
                        <strong class="text-[#14166e]">Example</strong>: {{ $flex['example'] }}
                    </p>
                @endif
            </div>
            @if (! empty($flex['image']))
                <div class="flex justify-center">
                    <img src="{{ $flex['image'] }}" alt="" class="rounded-lg shadow-[rgba(100,100,111,0.2)_0px_7px_29px_0px] max-w-full h-auto">
                </div>
            @endif
        </div>
    </section>

    {{-- Why choose (heading + 5 cards) --}}
    <section class="bg-white py-14">
        <div class="max-w-[1200px] mx-auto px-4 text-center mb-10">
            <h2 class="text-[26px] md:text-[34px] font-semibold text-[#14166e]">{{ $whyChoose['heading'] ?? '' }}</h2>
        </div>
        <div class="max-w-[1200px] mx-auto px-4 grid sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach (($whyChoose['cards'] ?? []) as $card)
                <div class="bg-white border border-gray-200 rounded-lg p-6 text-center shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px]">
                    <img src="{{ $card['image'] }}" alt="" class="w-[96px] h-[96px] object-contain mx-auto mb-4">
                    <h3 class="text-[18px] font-semibold text-[#14166e] mb-3">{{ $card['title'] }}</h3>
                    <p class="text-[15px] text-gray-700 leading-relaxed">{{ $card['body'] }}</p>
                </div>
            @endforeach
        </div>
        @if (! empty($whyChoose['example']))
            <div class="max-w-[1100px] mx-auto px-4 mt-10">
                <p class="text-[15px] text-gray-700 leading-relaxed italic border-l-4 border-[#14166e] pl-4 bg-[#f6f8fb] py-3 rounded">
                    <strong class="text-[#14166e]">Example</strong>: {{ $whyChoose['example'] }}
                </p>
            </div>
        @endif
    </section>

    {{-- Who can benefit --}}
    <section class="bg-[#f6f8fb] py-16">
        <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            @if (! empty($whoBenefits['image']))
                <div class="flex justify-center">
                    <img src="{{ $whoBenefits['image'] }}" alt="" class="max-w-full h-auto">
                </div>
            @endif
            <div>
                <h2 class="text-[26px] md:text-[34px] font-semibold text-[#14166e] leading-tight mb-4">
                    {{ $whoBenefits['heading'] ?? '' }}
                </h2>
                @if (! empty($whoBenefits['intro']))
                    <p class="text-[16px] text-gray-700 leading-relaxed mb-6">{{ $whoBenefits['intro'] }}</p>
                @endif
                <ul class="space-y-4 mb-6">
                    @foreach (($whoBenefits['items'] ?? []) as $item)
                        <li class="flex gap-3 text-[16px] text-gray-700 leading-relaxed">
                            <span class="text-[#14166e] shrink-0 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            </span>
                            <span><b class="font-bold text-[#14166e]">{{ $item['label'] }}</b>{{ $item['body'] }}</span>
                        </li>
                    @endforeach
                </ul>
                @if (! empty($whoBenefits['example']))
                    <p class="text-[15px] text-gray-700 leading-relaxed italic border-l-4 border-[#14166e] pl-4 bg-white/60 py-3 rounded">
                        <b class="text-[#14166e]">Example</b>: {{ $whoBenefits['example'] }}
                    </p>
                @endif
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="bg-white py-16">
        <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            <div>
                <h2 class="text-[26px] md:text-[34px] font-semibold text-[#14166e] leading-tight mb-4">
                    {{ $cta['heading'] ?? '' }}
                </h2>
                @if (! empty($cta['intro']))
                    <p class="text-[16px] text-gray-700 leading-relaxed mb-6">{{ $cta['intro'] }}</p>
                @endif
                <ul class="space-y-4 mb-6">
                    @foreach (($cta['items'] ?? []) as $item)
                        <li class="flex gap-3 text-[16px] text-gray-700 leading-relaxed">
                            <span class="text-[#14166e] shrink-0 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            </span>
                            <span><b class="font-bold text-[#14166e]">{{ $item['label'] }}</b>{{ $item['body'] }}</span>
                        </li>
                    @endforeach
                </ul>
                <p class="text-[16px] font-semibold text-[#14166e] mb-3"><strong> Contact Us</strong></p>
                @if (! empty($cta['contact']))
                    <ul class="flex flex-wrap gap-x-6 gap-y-3 text-[15px] text-gray-700">
                        <li class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" class="w-4 h-4 text-[#14166e]"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/></svg>
                            <span>{{ $cta['contact']['phone'] ?? '' }}</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" class="w-4 h-4 text-[#14166e]"><path d="M4 4h12v3H4V4zm0 5h12v7H4V9zm3 2h6v2H7v-2z"/></svg>
                            <span>{{ $cta['contact']['fax'] ?? '' }}</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" class="w-4 h-4 text-[#14166e]"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/></svg>
                            <x-cms.cf-email :cfemail="$cta['contact']['email_cfmail'] ?? ''" />
                        </li>
                    </ul>
                @endif
            </div>
            @if (! empty($cta['image']))
                <div class="flex justify-center">
                    <img src="{{ $cta['image'] }}" alt="" class="rounded-lg shadow-[rgba(100,100,111,0.2)_0px_7px_29px_0px] max-w-full h-auto">
                </div>
            @endif
        </div>
    </section>

</x-layouts.cms>
