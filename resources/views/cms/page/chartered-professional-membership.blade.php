<x-layouts.cms>
    <x-cms.seo-head :page="$page" />

    @php
        $data        = $page->page_data ?? [];
        $hero        = $data['hero'] ?? [];
        $impHeading  = $data['importance_heading_html'] ?? '';
        $impItems    = $data['importance_items'] ?? [];
        $benefits    = $data['membership_benefits'] ?? [];
        $pathIntro   = $data['pathway_intro'] ?? '';
        $pathLeft    = $data['pathway_left'] ?? [];
        $pathRight   = $data['pathway_right'] ?? [];
        $examLeft    = $data['exam_left'] ?? [];
        $examRight   = $data['exam_right'] ?? [];
        $ctaButtons  = $data['cta_buttons'] ?? [];
    @endphp

    {{-- Hero --}}
    @if (! empty($hero))
    <section class="bg-white py-14">
        <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            <div>
                <h3 class="text-[26px] md:text-[34px] font-bold text-[#14166e] mb-4">{!! $hero['heading_html'] ?? '' !!}</h3>
                @if (! empty($hero['subheading']))
                <h5 class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed">{{ $hero['subheading'] }}</h5>
                @endif
            </div>
            @if (! empty($hero['image']))
            <div>
                <img src="{{ $hero['image'] }}" alt="" class="w-full h-auto rounded-md" />
            </div>
            @endif
        </div>
    </section>
    @endif

    {{-- Importance heading --}}
    @if (! empty($impHeading))
    <section class="bg-[#0B2F5E] py-10">
        <div class="max-w-[1200px] mx-auto px-4 text-center">
            <h2 class="text-[24px] md:text-[32px] font-bold text-white">{!! $impHeading !!}</h2>
        </div>
    </section>
    @endif

    {{-- Importance items grid --}}
    @if (! empty($impItems))
    <section class="bg-[#f6f8fb] py-14">
        <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-x-10 gap-y-8">
            @foreach ($impItems as $item)
            <div class="flex items-start gap-4">
                <div class="shrink-0 w-12 h-12 rounded-full bg-[#f0b323] text-[#14166e] flex items-center justify-center font-bold">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-[17px] md:text-[18px] font-bold text-[#14166e] mb-2">{{ trim($item['title']) }}</h3>
                    <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $item['text'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    {{-- Membership benefits --}}
    @if (! empty($benefits))
    <section class="bg-white py-14">
        <div class="max-w-[1100px] mx-auto px-4">
            <h3 class="text-[26px] md:text-[34px] font-bold text-[#14166e] mb-8 text-center">{!! $benefits['heading_html'] ?? '' !!}</h3>
            <div class="grid md:grid-cols-2 gap-10">
                <div>
                    <ul class="space-y-3">
                        @foreach (($benefits['left_items'] ?? []) as $li)
                        <li class="flex items-start gap-3">
                            <svg class="w-[18px] h-[18px] text-[#14166e] mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-[15px] text-gray-700 leading-relaxed">{{ trim($li) }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <ul class="space-y-3 mb-4">
                        @foreach (($benefits['right_items'] ?? []) as $li)
                        <li class="flex items-start gap-3">
                            <svg class="w-[18px] h-[18px] text-[#14166e] mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-[15px] text-gray-700 leading-relaxed">{{ trim($li) }}</span>
                        </li>
                        @endforeach
                    </ul>
                    <div class="grid grid-cols-2 gap-x-6 pl-9">
                        <ul class="space-y-2">
                            @foreach (($benefits['chapters_col_1'] ?? []) as $c)
                            <li class="flex items-start gap-2">
                                <svg class="w-[16px] h-[16px] text-[#f0b323] mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-[14px] text-gray-700">{{ trim($c) }}</span>
                            </li>
                            @endforeach
                        </ul>
                        <ul class="space-y-2">
                            @foreach (($benefits['chapters_col_2'] ?? []) as $c)
                            <li class="flex items-start gap-2">
                                <svg class="w-[16px] h-[16px] text-[#f0b323] mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-[14px] text-gray-700">{{ trim($c) }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- Pathway intro --}}
    @if (! empty($pathIntro))
    <section class="bg-white pt-4 pb-6">
        <div class="max-w-[1100px] mx-auto px-4">
            <h5 class="text-[16px] md:text-[18px] text-gray-700 leading-relaxed">{{ $pathIntro }}</h5>
        </div>
    </section>
    @endif

    {{-- Pathway: steps 1-4 --}}
    @if (! empty($pathLeft) || ! empty($pathRight))
    <section class="bg-[#f6f8fb] py-12">
        <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-start">
            <div>
                @if (! empty($pathLeft['image']))
                <img src="{{ $pathLeft['image'] }}" alt="" class="w-full h-auto rounded-md mb-6" />
                @endif
                @foreach (($pathLeft['steps'] ?? []) as $step)
                <div class="mb-6">
                    @if (! empty($step['heading']))
                    <h3 class="text-[20px] md:text-[24px] font-bold text-[#14166e] mb-2">{{ $step['heading'] }}</h3>
                    @endif
                    @if (! empty($step['text']))
                    <h5 class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-3">{{ $step['text'] }}</h5>
                    @endif
                    @if (! empty($step['items']))
                    <ul class="space-y-2.5">
                        @foreach ($step['items'] as $li)
                        <li class="flex items-start gap-3">
                            <svg class="w-[18px] h-[18px] text-[#14166e] mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-[15px] text-gray-700 leading-relaxed">{!! $li !!}</span>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                @endforeach
            </div>
            <div>
                @if (! empty($pathRight['image']))
                <img src="{{ $pathRight['image'] }}" alt="" class="w-full h-auto rounded-md mb-6" />
                @endif
                @foreach (($pathRight['steps'] ?? []) as $step)
                <div class="mb-6">
                    @if (! empty($step['heading']))
                    <h3 class="text-[20px] md:text-[24px] font-bold text-[#14166e] mb-2">{{ $step['heading'] }}</h3>
                    @endif
                    @if (! empty($step['text']))
                    <h5 class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-3">{{ $step['text'] }}</h5>
                    @endif
                    @if (! empty($step['items']))
                    <ul class="space-y-2.5">
                        @foreach ($step['items'] as $li)
                        <li class="flex items-start gap-3">
                            <svg class="w-[18px] h-[18px] text-[#14166e] mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-[15px] text-gray-700 leading-relaxed">{!! $li !!}</span>
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

    {{-- Exam details: steps 5-6 --}}
    @if (! empty($examLeft))
    <section class="bg-white py-12">
        <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-start">
            <div>
                @foreach (($examLeft['steps'] ?? []) as $step)
                <div class="mb-6">
                    @if (! empty($step['heading']))
                    <h3 class="text-[20px] md:text-[24px] font-bold text-[#14166e] mb-2">{{ $step['heading'] }}</h3>
                    @endif
                    @if (! empty($step['text']))
                    <h5 class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-3">{{ $step['text'] }}</h5>
                    @endif
                    @if (! empty($step['items']))
                    <ul class="space-y-2.5">
                        @foreach ($step['items'] as $li)
                        <li class="flex items-start gap-3">
                            <svg class="w-[18px] h-[18px] text-[#14166e] mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-[15px] text-gray-700 leading-relaxed">{!! $li !!}</span>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                @endforeach
            </div>
            <div class="space-y-6">
                @foreach (($examRight['images'] ?? []) as $img)
                <img src="{{ $img }}" alt="" class="w-full h-auto rounded-md" />
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- CTA buttons --}}
    @if (! empty($ctaButtons))
    <section class="bg-[#f6f8fb] py-10">
        <div class="max-w-[1100px] mx-auto px-4 grid grid-cols-1 sm:grid-cols-3 gap-4">
            @foreach ($ctaButtons as $btn)
            <a href="{{ $btn['url'] }}" class="inline-flex items-center justify-center gap-2 bg-[#f0b323] hover:bg-yellow-500 text-[#14166e] font-bold text-[14px] px-6 py-3 rounded transition text-center">
                <span>{{ $btn['text'] }}</span>
                <span aria-hidden="true">→</span>
            </a>
            @endforeach
        </div>
    </section>
    @endif
</x-layouts.cms>
