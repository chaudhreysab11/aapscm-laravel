<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $hero         = $page->page_data['hero']               ?? [];
        $joinPaths    = $page->page_data['join_paths']         ?? [];
        $benefits     = $page->page_data['benefits']           ?? [];
        $skillsSuc    = $page->page_data['skills_success']     ?? [];
        $keepPace     = $page->page_data['keep_pace']          ?? [];
        $compliance   = $page->page_data['compliance']         ?? [];
        $solutions    = $page->page_data['solutions']          ?? [];
        $twoCol       = $page->page_data['two_col']            ?? [];
        $skillsForSuc = $page->page_data['skills_for_success'] ?? [];
        $partners     = $page->page_data['partners']           ?? [];
        $testimonials = $page->page_data['testimonials']       ?? [];
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- Hero --}}
    <section class="bg-[#fef5ef] py-14">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="text-[28px] md:text-[34px] font-semibold text-[#14166e] leading-tight mb-4 [&_b]:font-extrabold">
                        {!! $hero['heading_html'] ?? '' !!}
                    </h2>
                    @if (! empty($hero['lead']))
                        <p class="text-[16px] text-gray-700 leading-relaxed">{{ $hero['lead'] }}</p>
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

    {{-- 4-card join paths --}}
    @if (! empty($joinPaths))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <h3 class="text-[26px] md:text-[32px] font-semibold text-[#14166e] text-center mb-10 [&_b]:font-extrabold">
                    {{ $joinPaths['heading'] }}
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach (($joinPaths['items'] ?? []) as $item)
                        <div class="bg-white rounded-lg p-6 border-t-4 border-[#14166e] border border-gray-200 shadow-[rgba(100,100,111,0.2)_0px_7px_29px_0px]">
                            <h4 class="text-[20px] font-semibold text-[#14166e] mb-3">{{ $item['title'] }}</h4>
                            <p class="text-[14px] text-gray-700 leading-relaxed">{{ $item['body'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Join forces benefits (check list) --}}
    @if (! empty($benefits))
        <section class="bg-[#f6f8fb] py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <h3 class="text-[24px] md:text-[30px] font-semibold text-[#14166e] mb-8 [&_b]:font-extrabold">
                    {!! $benefits['heading_html'] ?? '' !!}
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    @foreach (($benefits['items'] ?? []) as $txt)
                        <div class="flex items-start gap-4 bg-white rounded-lg p-5 border border-gray-200">
                            <span class="flex-shrink-0 inline-flex items-center justify-center w-10 h-10 rounded-full bg-[#14166e]/10 text-[#14166e]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <p class="text-[15px] text-gray-800 leading-relaxed">{{ $txt }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Skills and Competencies for Success --}}
    @if (! empty($skillsSuc))
        <section class="bg-white py-14">
            <div class="max-w-[960px] mx-auto px-4 text-center">
                <h3 class="text-[26px] md:text-[32px] font-semibold text-[#14166e] mb-4 [&_b]:font-extrabold">
                    {!! $skillsSuc['heading_html'] ?? '' !!}
                </h3>
                <p class="text-[16px] text-gray-700 leading-relaxed">{{ $skillsSuc['body'] ?? '' }}</p>
            </div>
        </section>
    @endif

    {{-- Keep pace --}}
    @if (! empty($keepPace))
        <section class="bg-[#fef5ef] py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                    <div>
                        <h3 class="text-[24px] md:text-[30px] font-semibold text-[#14166e] mb-4">
                            {{ $keepPace['heading'] }}
                        </h3>
                        <p class="text-[16px] text-gray-700 leading-relaxed">{{ $keepPace['body'] }}</p>
                    </div>
                    @if (! empty($keepPace['image']))
                        <div class="flex justify-center">
                            <img src="{{ $keepPace['image'] }}" alt="" class="max-w-full h-auto rounded-lg">
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- Compliance / ISO --}}
    @if (! empty($compliance))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="text-center mb-10">
                    <h3 class="text-[26px] md:text-[32px] font-semibold text-[#14166e] mb-4 [&_b]:font-extrabold">
                        {!! $compliance['heading_html'] ?? '' !!}
                    </h3>
                    @if (! empty($compliance['intro']))
                        <p class="text-[16px] text-gray-700 leading-relaxed max-w-[900px] mx-auto">
                            {{ $compliance['intro'] }}
                        </p>
                    @endif
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                    @foreach (($compliance['cards'] ?? []) as $card)
                        <div class="bg-[#f6f8fb] rounded-lg p-6 border-l-4 border-[#14166e]">
                            <h4 class="text-[22px] font-bold text-[#14166e] mb-3">{{ $card['title'] }}</h4>
                            <p class="text-[15px] text-gray-700 leading-relaxed">{{ $card['body'] }}</p>
                        </div>
                    @endforeach
                </div>

                @if (! empty($compliance['other_heading']))
                    <div class="text-center">
                        <h4 class="text-[20px] md:text-[24px] font-semibold text-[#14166e] mb-4">
                            {{ $compliance['other_heading'] }}
                        </h4>
                        <div class="flex flex-wrap justify-center gap-3 mb-4">
                            @foreach (($compliance['other_items'] ?? []) as $it)
                                <span class="inline-flex items-center gap-2 bg-[#14166e] text-white text-[14px] font-semibold px-4 py-2 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                    {{ $it }}
                                </span>
                            @endforeach
                        </div>
                        @if (! empty($compliance['other_note']))
                            <p class="text-[15px] text-gray-700 italic">{{ $compliance['other_note'] }}</p>
                        @endif
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- Solutions (Mission / Instruction / Support) --}}
    @if (! empty($solutions))
        <section class="bg-[#14166e] py-14 text-white">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="text-center mb-10">
                    <h3 class="text-[26px] md:text-[32px] font-semibold mb-4 [&_b]:font-extrabold">
                        {!! $solutions['heading_html'] ?? '' !!}
                    </h3>
                    @if (! empty($solutions['intro']))
                        <p class="text-[16px] text-white/90 leading-relaxed max-w-[900px] mx-auto">
                            {{ $solutions['intro'] }}
                        </p>
                    @endif
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach (($solutions['cards'] ?? []) as $card)
                        <div class="bg-white/10 rounded-lg p-6 text-center border border-white/20 backdrop-blur">
                            @if (! empty($card['icon']))
                                <div class="flex justify-center mb-4">
                                    <img src="{{ $card['icon'] }}" alt="" class="w-16 h-16 object-contain">
                                </div>
                            @endif
                            <h4 class="text-[20px] font-semibold mb-3">{{ $card['title'] }}</h4>
                            <p class="text-[15px] text-white/90 leading-relaxed">{{ $card['body'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Two-col (Thomson Reuters / Why AAPSCM) --}}
    @if (! empty($twoCol))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    @foreach ($twoCol as $col)
                        <div>
                            <h3 class="text-[22px] md:text-[26px] font-semibold text-[#14166e] mb-4 [&_b]:font-extrabold">
                                {!! $col['heading_html'] ?? '' !!}
                            </h3>
                            <p class="text-[15px] text-gray-700 leading-relaxed">{{ $col['body'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Skills for Success --}}
    @if (! empty($skillsForSuc))
        <section class="bg-[#f6f8fb] py-14">
            <div class="max-w-[960px] mx-auto px-4 text-center">
                <h3 class="text-[24px] md:text-[30px] font-semibold text-[#14166e] mb-4">
                    {{ $skillsForSuc['heading'] }}
                </h3>
                <p class="text-[16px] text-gray-700 leading-relaxed">{{ $skillsForSuc['body'] }}</p>
            </div>
        </section>
    @endif

    {{-- Our Partners --}}
    @if (! empty($partners))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="text-center mb-10">
                    <h3 class="text-[26px] md:text-[32px] font-semibold text-[#14166e] mb-4 [&_b]:font-extrabold">
                        {!! $partners['heading_html'] ?? '' !!}
                    </h3>
                    @if (! empty($partners['intro']))
                        <p class="text-[16px] text-gray-700 leading-relaxed mb-6">{{ $partners['intro'] }}</p>
                    @endif
                    @if (! empty($partners['cta']))
                        <a href="{{ $partners['cta']['url'] ?? '#' }}"
                           class="inline-flex items-center gap-2 bg-[#14166e] hover:bg-[#0f1159] text-white font-semibold text-[14px] px-6 py-2.5 rounded transition">
                            {{ $partners['cta']['label'] }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    @endif
                </div>

                <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 gap-4 items-center">
                    @foreach (($partners['logos'] ?? []) as $logo)
                        <div class="flex items-center justify-center p-2">
                            <img src="{{ $logo }}" alt="" class="max-w-full h-auto object-contain">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Testimonials --}}
    @if (! empty($testimonials))
        <section class="bg-[#fef5ef] py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="text-center mb-10">
                    <p class="text-[#14166e] uppercase tracking-wider font-semibold mb-2">
                        {{ $testimonials['heading'] ?? 'Testimonial' }}
                    </p>
                    <h3 class="text-[26px] md:text-[32px] font-semibold text-[#14166e]">
                        {{ $testimonials['sub_heading'] ?? '' }}
                    </h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach (($testimonials['items'] ?? []) as $t)
                        <div class="bg-white rounded-lg p-6 shadow-[rgba(100,100,111,0.2)_0px_7px_29px_0px] border-l-4 border-[#14166e]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#14166e] mb-3" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M7.17 6A5 5 0 002 11v7h7v-7H5.5a2.5 2.5 0 012.5-2.5V6zm10 0a5 5 0 00-5 5v7h7v-7h-3.5a2.5 2.5 0 012.5-2.5V6z" />
                            </svg>
                            <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed mb-4">{{ $t['quote'] }}</p>
                            @if (! empty($t['name']))
                                <p class="text-[14px] font-semibold text-[#14166e]">— {{ $t['name'] }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

</x-layouts.cms>
