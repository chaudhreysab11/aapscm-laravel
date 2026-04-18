<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $hero       = $page->page_data['hero']           ?? [];
        $chapters   = $page->page_data['chapters']       ?? [];
        $benefits   = $page->page_data['benefits']       ?? [];
        $becomeMem  = $page->page_data['become_member']  ?? [];
        $tiersHead  = $page->page_data['tiers_heading']  ?? 'Join AAPSCM®';
        $tiers      = $page->page_data['tiers']          ?? [];
        $faq        = $page->page_data['faq']            ?? [];
        $affiliates = $page->page_data['affiliates']     ?? [];
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- Hero: intro + chapters list on left, hero image on right --}}
    <section class="bg-[#fef5ef] py-14">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="text-[30px] md:text-[36px] font-semibold text-[#14166e] leading-tight mb-4">
                        {{ $hero['heading'] ?? 'Why Join AAPSCM®' }}
                    </h2>
                    @if (! empty($hero['lead']))
                        <p class="text-[16px] text-gray-700 leading-relaxed mb-4">{{ $hero['lead'] }}</p>
                    @endif
                    @if (! empty($hero['subhead']))
                        <p class="text-[15px] text-gray-700 leading-relaxed mb-6">{{ $hero['subhead'] }}</p>
                    @endif

                    @if (! empty($chapters))
                        <ul class="space-y-2 mb-6">
                            @foreach ($chapters as $chap)
                                <li>
                                    @if (! empty($chap['url']))
                                        <a href="{{ $chap['url'] }}" class="text-[18px] font-semibold text-[#14166e] hover:underline">
                                            {{ $chap['label'] }}
                                        </a>
                                    @else
                                        <span class="text-[18px] font-semibold text-[#14166e]">{{ $chap['label'] }}</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    @if (! empty($hero['cta']))
                        <a href="{{ $hero['cta']['url'] ?? '#' }}"
                           class="inline-block bg-[#14166e] hover:bg-[#0f1159] text-white font-semibold text-[14px] px-6 py-2.5 rounded transition">
                            {{ $hero['cta']['label'] }}
                        </a>
                    @endif
                </div>

                @if (! empty($hero['image']))
                    <div class="flex justify-center">
                        <img src="{{ $hero['image'] }}" alt="" class="max-w-full h-auto">
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- Benefits --}}
    @if (! empty($benefits))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="text-center mb-10">
                    <h2 class="text-[26px] md:text-[32px] font-semibold text-[#14166e] leading-tight mb-4 uppercase">
                        {{ $benefits['heading'] }}
                    </h2>
                    @if (! empty($benefits['lead']))
                        <p class="text-[16px] text-gray-700 leading-relaxed max-w-[900px] mx-auto">
                            {{ $benefits['lead'] }}
                        </p>
                    @endif
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach (($benefits['items'] ?? []) as $item)
                        <div class="bg-white rounded-lg p-6 border border-gray-200 shadow-[rgba(100,100,111,0.2)_0px_7px_29px_0px] text-center">
                            <div class="flex justify-center mb-4">
                                <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-[#14166e]/10 text-[#14166e]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </span>
                            </div>
                            <h3 class="text-[18px] md:text-[20px] font-semibold text-[#14166e] mb-3">
                                {{ $item['title'] }}
                            </h3>
                            <p class="text-[15px] text-gray-700 leading-relaxed">{{ $item['body'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Become a member --}}
    @if (! empty($becomeMem))
        <section class="bg-[#f6f8fb] py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                    <div>
                        <h3 class="text-[24px] md:text-[30px] font-semibold text-[#14166e] mb-4">
                            {{ $becomeMem['heading'] ?? 'Become a member' }}
                        </h3>
                        @if (! empty($becomeMem['body_1']))
                            <p class="text-[16px] text-gray-700 leading-relaxed mb-4">{{ $becomeMem['body_1'] }}</p>
                        @endif
                        @if (! empty($becomeMem['body_2']))
                            <p class="text-[15px] text-gray-700 leading-relaxed mb-6">{{ $becomeMem['body_2'] }}</p>
                        @endif
                        @if (! empty($becomeMem['cta']))
                            <a href="{{ $becomeMem['cta']['url'] ?? '#' }}"
                               class="inline-flex items-center gap-2 bg-[#14166e] hover:bg-[#0f1159] text-white font-semibold text-[14px] px-6 py-2.5 rounded transition">
                                {{ $becomeMem['cta']['label'] }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        @endif
                    </div>
                    @if (! empty($becomeMem['image']))
                        <div class="flex justify-center">
                            <img src="{{ $becomeMem['image'] }}" alt="" class="max-w-full h-auto">
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- Membership tiers --}}
    @if (! empty($tiers))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <h3 class="text-[26px] md:text-[32px] font-semibold text-[#14166e] text-center mb-10">
                    {{ $tiersHead }}
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($tiers as $tier)
                        <div class="bg-white rounded-lg p-6 border-t-4 border-[#14166e] border border-gray-200 shadow-[rgba(100,100,111,0.2)_0px_7px_29px_0px] flex flex-col">
                            <h4 class="text-[20px] md:text-[22px] font-semibold text-[#14166e] mb-3">
                                {{ $tier['name'] }}
                            </h4>
                            @if (! empty($tier['description']))
                                <p class="text-[14px] text-gray-700 leading-relaxed mb-4">{{ $tier['description'] }}</p>
                            @elseif (! empty($tier['description_html']))
                                <p class="text-[14px] text-gray-700 leading-relaxed mb-4">{!! $tier['description_html'] !!}</p>
                            @endif

                            @if (! empty($tier['price_lines']))
                                <div class="mb-2">
                                    @foreach ($tier['price_lines'] as $line)
                                        <p class="text-[20px] font-semibold text-[#14166e]">{!! $line !!}</p>
                                    @endforeach
                                </div>
                            @elseif (! empty($tier['price']))
                                <p class="text-[28px] font-bold text-[#14166e] mb-1">{{ $tier['price'] }}</p>
                            @endif

                            @if (! empty($tier['app_fee']))
                                <p class="text-[14px] text-gray-600 mb-4">{{ $tier['app_fee'] }}</p>
                            @endif

                            <div class="mt-auto flex flex-col gap-2">
                                @foreach (($tier['buttons'] ?? []) as $btn)
                                    <a href="{{ $btn['url'] ?? '#' }}"
                                       class="inline-flex items-center justify-center gap-2 bg-[#14166e] hover:bg-[#0f1159] text-white font-semibold text-[14px] px-5 py-2.5 rounded transition">
                                        {{ $btn['label'] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- FAQ --}}
    @if (! empty($faq))
        <section class="bg-[#fef5ef] py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
                    @if (! empty($faq['image']))
                        <div class="flex justify-center">
                            <img src="{{ $faq['image'] }}" alt="" class="max-w-full h-auto rounded-lg">
                        </div>
                    @endif

                    <div>
                        <h3 class="text-[24px] md:text-[30px] font-semibold text-[#14166e] mb-6">
                            {{ $faq['heading'] ?? 'Any questions?' }}
                        </h3>

                        <div class="space-y-3" x-data="{ open: null }">
                            @foreach (($faq['items'] ?? []) as $i => $item)
                                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                                    <button type="button"
                                            @click="open === {{ $i }} ? open = null : open = {{ $i }}"
                                            class="w-full flex items-center justify-between gap-3 text-left px-5 py-3 text-[15px] md:text-[16px] font-semibold text-[#14166e] hover:bg-gray-50 transition">
                                        <span>{{ $item['q'] }}</span>
                                        <span x-show="open !== {{ $i }}" class="text-[#14166e]">+</span>
                                        <span x-show="open === {{ $i }}" class="text-[#14166e]">−</span>
                                    </button>
                                    <div x-show="open === {{ $i }}" x-cloak
                                         class="px-5 pb-4 text-[15px] text-gray-700 leading-relaxed [&_a]:text-[#14166e] [&_a]:underline [&_p]:mb-3">
                                        {!! $item['a_html'] !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @if (! empty($faq['cta']))
                            <div class="text-center mt-6">
                                <a href="{{ $faq['cta']['url'] ?? '#' }}"
                                   class="inline-flex items-center gap-2 bg-[#14166e] hover:bg-[#0f1159] text-white font-semibold text-[14px] px-6 py-2.5 rounded transition">
                                    {{ $faq['cta']['label'] }}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Affiliate partners --}}
    @if (! empty($affiliates))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                    <div>
                        <h2 class="text-[24px] md:text-[32px] font-semibold text-[#14166e] mb-4 uppercase">
                            {{ $affiliates['heading'] ?? 'Our Affiliate Partners' }}
                        </h2>
                        @if (! empty($affiliates['cta']))
                            <a href="{{ $affiliates['cta']['url'] ?? '#' }}"
                               class="inline-flex items-center gap-2 bg-[#14166e] hover:bg-[#0f1159] text-white font-semibold text-[14px] px-6 py-2.5 rounded transition">
                                {{ $affiliates['cta']['label'] }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        @endif
                    </div>

                    <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 gap-4 items-center">
                        @foreach (($affiliates['logos'] ?? []) as $logo)
                            <div class="flex items-center justify-center p-2">
                                <img src="{{ $logo }}" alt="" class="max-w-full h-auto object-contain">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

</x-layouts.cms>
