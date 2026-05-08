<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $data            = $page->page_data ?? [];
        $hero            = $data['hero']            ?? [];
        $checkIcon       = $data['check_icon']      ?? '';
        $step1           = $data['step1']           ?? [];
        $step2           = $data['step2']           ?? [];
        $certCategories  = $data['cert_categories'] ?? [];
        $step3           = $data['step3']           ?? [];
        $step4           = $data['step4']           ?? [];
        $step5           = $data['step5']           ?? [];
        $step6           = $data['step6']           ?? [];
        $step7           = $data['step7']           ?? [];
        $step8           = $data['step8']           ?? [];
        $whyChoose       = $data['why_choose']      ?? [];
        $cta             = $data['cta']             ?? [];
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- Hero: intro copy + side image --}}
    <section class="bg-white py-14">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    @if (! empty($hero['heading']))
                        <h2 class="text-[28px] md:text-[34px] font-light text-[#14166e] leading-tight mb-3">
                            {!! $hero['heading'] !!}
                        </h2>
                    @endif

                    @if (! empty($hero['subheading']))
                        <h3 class="text-[20px] md:text-[24px] font-semibold text-[#14166e] leading-snug mb-5">
                            {{ $hero['subheading'] }}
                        </h3>
                    @endif

                    @foreach ($hero['paragraphs'] ?? [] as $para)
                        <p class="text-[16px] text-gray-700 leading-relaxed mb-4">{{ $para }}</p>
                    @endforeach
                </div>

                @if (! empty($hero['image']))
                    <div>
                        <img src="{{ $hero['image'] }}" alt="" class="w-full h-auto" />
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- Step 1 --}}
    @if (! empty($step1))
        <section class="bg-[#f6f8fb] py-12">
            <div class="max-w-[1080px] mx-auto px-4">
                <h3 class="text-[24px] md:text-[30px] font-light text-[#14166e] mb-4">
                    {!! $step1['heading'] !!}
                </h3>

                @if (! empty($step1['intro']))
                    <p class="text-[16px] text-gray-700 leading-relaxed mb-6">{{ $step1['intro'] }}</p>
                @endif

                <ul class="space-y-3 mb-6">
                    @foreach ($step1['items'] ?? [] as $item)
                        <li class="flex items-start gap-3">
                            @if ($checkIcon)
                                <img src="{{ $checkIcon }}" alt="" class="w-5 h-5 mt-1 flex-shrink-0" />
                            @endif
                            <span class="text-[16px] text-gray-800 leading-relaxed">
                                <strong class="text-[#14166e]">{{ $item['bold'] }}</strong> {{ $item['text'] }}
                            </span>
                        </li>
                    @endforeach
                </ul>

                @if (! empty($step1['outro']))
                    <p class="text-[16px] text-gray-700 leading-relaxed">{{ $step1['outro'] }}</p>
                @endif
            </div>
        </section>
    @endif

    {{-- Step 2 intro --}}
    @if (! empty($step2))
        <section class="bg-white py-12">
            <div class="max-w-[1080px] mx-auto px-4">
                <h3 class="text-[24px] md:text-[30px] font-light text-[#14166e] mb-4">
                    {!! $step2['heading'] !!}
                </h3>

                @if (! empty($step2['intro']))
                    <p class="text-[16px] text-gray-700 leading-relaxed mb-4">{{ $step2['intro'] }}</p>
                @endif

                @if (! empty($step2['outro']))
                    <p class="text-[16px] text-gray-700 leading-relaxed">{{ $step2['outro'] }}</p>
                @endif
            </div>
        </section>
    @endif

    {{-- Certification categories grid --}}
    @if (! empty($certCategories))
        @php
            // Identify the "Combined Procurement and Supply Chain Certifications" group
            // and render it nested under the Tourism Management column so the layout
            // stays at four columns total.
            $combinedIdx = null;
            $tourismIdx  = null;
            foreach ($certCategories as $i => $c) {
                $h = strtolower($c['heading'] ?? '');
                if ($combinedIdx === null && str_contains($h, 'combined')) {
                    $combinedIdx = $i;
                }
                if ($tourismIdx === null && str_contains($h, 'tourism')) {
                    $tourismIdx = $i;
                }
            }
            $combined = $combinedIdx !== null ? $certCategories[$combinedIdx] : null;
            $mainCategories = $certCategories;
            if ($combinedIdx !== null) {
                unset($mainCategories[$combinedIdx]);
                $mainCategories = array_values($mainCategories);
            }
        @endphp

        <section id="certificate-categories" class="bg-white py-12">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-6">
                    @foreach ($mainCategories as $cat)
                        <div>
                            <h4 class="text-[16px] md:text-[17px] font-bold text-[#14166e] mb-4 leading-snug">
                                {{ $cat['heading'] }}
                            </h4>

                            <ul class="space-y-3">
                                @foreach ($cat['items'] ?? [] as $item)
                                    <li>
                                        <a href="{{ $item['href'] }}"
                                           class="group flex items-center gap-3 bg-white rounded-full pl-3 pr-5 py-2.5 shadow-[rgba(100,100,111,0.18)_0px_2px_10px_0px] hover:shadow-[rgba(100,100,111,0.28)_0px_4px_14px_0px] transition">
                                            <span class="flex-shrink-0 w-7 h-7 rounded-full bg-[#e74c1d] text-white flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                            <span class="text-[13.5px] md:text-[14px] text-gray-700 leading-snug group-hover:text-[#14166e]">
                                                {{ $item['text'] }}
                                            </span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                            @if ($combined && str_contains(strtolower($cat['heading'] ?? ''), 'tourism'))
                                <h4 class="text-[16px] md:text-[17px] font-bold text-[#14166e] mt-8 mb-4 leading-snug">
                                    {{ $combined['heading'] }}
                                </h4>

                                <ul class="space-y-3">
                                    @foreach ($combined['items'] ?? [] as $item)
                                        <li>
                                            <a href="{{ $item['href'] }}"
                                               class="group flex items-center gap-3 bg-white rounded-full pl-3 pr-5 py-2.5 shadow-[rgba(100,100,111,0.18)_0px_2px_10px_0px] hover:shadow-[rgba(100,100,111,0.28)_0px_4px_14px_0px] transition">
                                                <span class="flex-shrink-0 w-7 h-7 rounded-full bg-[#e74c1d] text-white flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                                <span class="text-[13.5px] md:text-[14px] text-gray-700 leading-snug group-hover:text-[#14166e]">
                                                    {{ $item['text'] }}
                                                </span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Step 3: training + purchase cards --}}
    @if (! empty($step3))
        <section class="bg-[#f5f7fa] py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <h3 class="text-[24px] md:text-[30px] font-light text-[#14166e] mb-4">
                    {!! $step3['heading'] !!}
                </h3>

                @if (! empty($step3['intro']))
                    <p class="text-[16px] text-gray-700 leading-relaxed mb-8">{{ $step3['intro'] }}</p>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    @foreach ($step3['cards'] ?? [] as $card)
                        <div class="bg-white rounded-lg p-6 md:p-8 shadow-[rgba(100,100,111,0.12)_0px_4px_14px_0px] flex flex-col">
                            <div class="flex items-start gap-4 mb-6">
                                @if ($checkIcon)
                                    <img src="{{ $checkIcon }}" alt="" class="w-10 h-10 object-contain flex-shrink-0">
                                @endif
                                <p class="flex-1 text-[15px] md:text-[16px] text-gray-700 leading-relaxed">
                                    <strong class="text-[#14166e]">{{ $card['bold'] }}</strong>{{ $card['text'] }}
                                </p>
                            </div>
                            <div class="mt-auto">
                                <a href="{{ $card['cta_url'] ?? '#' }}"
                                   class="inline-block bg-[#5cb85c] hover:bg-[#4cae4c] text-white font-semibold text-[15px] px-6 py-3 rounded-full transition">
                                    {{ $card['cta_label'] ?? 'Purchase and Pay' }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                @foreach ($step3['outros'] ?? [] as $para)
                    <p class="text-[16px] text-gray-700 leading-relaxed mb-4">{{ $para }}</p>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Step 4 --}}
    @if (! empty($step4))
        <section class="bg-[#f6f8fb] py-12">
            <div class="max-w-[1080px] mx-auto px-4">
                <h3 class="text-[24px] md:text-[30px] font-light text-[#14166e] mb-4">
                    {!! $step4['heading'] !!}
                </h3>

                @if (! empty($step4['intro']))
                    <p class="text-[16px] text-gray-700 leading-relaxed mb-6">{{ $step4['intro'] }}</p>
                @endif

                <ul class="space-y-3">
                    @foreach ($step4['items'] ?? [] as $item)
                        <li class="flex items-start gap-3">
                            @if ($checkIcon)
                                <img src="{{ $checkIcon }}" alt="" class="w-5 h-5 mt-1 flex-shrink-0" />
                            @endif
                            <span class="text-[16px] text-gray-800 leading-relaxed">
                                <strong class="text-[#14166e]">{{ $item['bold'] }}</strong>{{ $item['text'] }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif

    {{-- Step 5 --}}
    @if (! empty($step5))
        <section class="bg-white py-12">
            <div class="max-w-[1080px] mx-auto px-4">
                <h3 class="text-[24px] md:text-[30px] font-light text-[#14166e] mb-4">
                    {!! $step5['heading'] !!}
                </h3>

                @if (! empty($step5['intro']))
                    <p class="text-[16px] text-gray-700 leading-relaxed mb-6">{{ $step5['intro'] }}</p>
                @endif

                <ul class="space-y-3">
                    @foreach ($step5['bullets'] ?? [] as $bullet)
                        <li class="flex items-start gap-3">
                            @if ($checkIcon)
                                <img src="{{ $checkIcon }}" alt="" class="w-5 h-5 mt-1 flex-shrink-0" />
                            @endif
                            <span class="text-[16px] text-gray-800 leading-relaxed">{{ $bullet }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif

    {{-- Step 6 --}}
    @if (! empty($step6))
        <section class="bg-[#f6f8fb] py-12">
            <div class="max-w-[1080px] mx-auto px-4">
                <h3 class="text-[24px] md:text-[30px] font-light text-[#14166e] mb-4">
                    {!! $step6['heading'] !!}
                </h3>

                @if (! empty($step6['intro']))
                    <p class="text-[16px] text-gray-700 leading-relaxed mb-6">{{ $step6['intro'] }}</p>
                @endif

                <ul class="space-y-3 mb-6">
                    @foreach ($step6['items'] ?? [] as $item)
                        <li class="flex items-start gap-3">
                            @if ($checkIcon)
                                <img src="{{ $checkIcon }}" alt="" class="w-5 h-5 mt-1 flex-shrink-0" />
                            @endif
                            <span class="text-[16px] text-gray-800 leading-relaxed">
                                <strong class="text-[#14166e]">{{ $item['bold'] }}</strong>{{ $item['text'] }}
                            </span>
                        </li>
                    @endforeach
                </ul>

                @if (! empty($step6['outro']))
                    <p class="text-[16px] text-gray-700 leading-relaxed">{{ $step6['outro'] }}</p>
                @endif
            </div>
        </section>
    @endif

    {{-- Step 7 --}}
    @if (! empty($step7))
        <section class="bg-white py-12">
            <div class="max-w-[1080px] mx-auto px-4">
                <h3 class="text-[24px] md:text-[30px] font-light text-[#14166e] mb-4">
                    {!! $step7['heading'] !!}
                </h3>

                @if (! empty($step7['text']))
                    <p class="text-[16px] text-gray-700 leading-relaxed">{{ $step7['text'] }}</p>
                @endif
            </div>
        </section>
    @endif

    {{-- Step 8 --}}
    @if (! empty($step8))
        <section class="bg-[#f6f8fb] py-12">
            <div class="max-w-[1080px] mx-auto px-4">
                <h3 class="text-[24px] md:text-[30px] font-light text-[#14166e] mb-4">
                    {!! $step8['heading'] !!}
                </h3>

                @if (! empty($step8['intro']))
                    <p class="text-[16px] text-gray-700 leading-relaxed mb-6">{{ $step8['intro'] }}</p>
                @endif

                <ul class="space-y-3 mb-6">
                    @foreach ($step8['bullets'] ?? [] as $bullet)
                        <li class="flex items-start gap-3">
                            @if ($checkIcon)
                                <img src="{{ $checkIcon }}" alt="" class="w-5 h-5 mt-1 flex-shrink-0" />
                            @endif
                            <span class="text-[16px] text-gray-800 leading-relaxed">{{ $bullet }}</span>
                        </li>
                    @endforeach
                </ul>

                @if (! empty($step8['outro']))
                    <p class="text-[16px] text-gray-700 leading-relaxed">{{ $step8['outro'] }}</p>
                @endif
            </div>
        </section>
    @endif

    {{-- Why Choose AAPSCM® for Certification? --}}
    @if (! empty($whyChoose))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <h3 class="text-[26px] md:text-[34px] font-light text-[#14166e] text-center mb-10">
                    {!! $whyChoose['heading'] !!}
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($whyChoose['cards'] ?? [] as $card)
                        <div class="text-center bg-[#f6f8fb] rounded p-6 border border-gray-100">
                            @if (! empty($card['icon']))
                                <img src="{{ $card['icon'] }}" alt=""
                                     class="w-16 h-16 mx-auto mb-4" />
                            @endif
                            <h4 class="text-[18px] font-semibold text-[#14166e] mb-3">
                                {{ $card['title'] }}
                            </h4>
                            <p class="text-[14.5px] text-gray-700 leading-relaxed">
                                {{ $card['text'] }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Closing CTA --}}
    @if (! empty($cta))
        <section class="bg-[#f6f8fb] py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                    <div>
                        <h3 class="text-[26px] md:text-[32px] font-light text-[#14166e] mb-5">
                            {!! $cta['heading'] !!}
                        </h3>

                        @if (! empty($cta['paragraph']))
                            <p class="text-[16px] text-gray-700 leading-relaxed mb-5">
                                {{ $cta['paragraph'] }}
                            </p>
                        @endif

                        <p class="text-[16px] text-gray-700 leading-relaxed">
                            <a href="{{ $cta['apply_url'] ?? '#' }}"
                               style="color:#005b1c"
                               class="font-semibold hover:underline">{{ $cta['apply_label'] ?? '[Apply Now]' }}</a>{{ $cta['apply_tail'] ?? '' }}
                        </p>
                    </div>

                    @if (! empty($cta['image']))
                        <div>
                            <img src="{{ $cta['image'] }}" alt="" class="w-full h-auto" />
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

</x-layouts.cms>
