<x-layouts.cms>
    <x-cms.seo-head :page="$page" />
    <x-cms.eltdf-title-bar :title="$page->title" :breadcrumbs="[['label' => $page->title]]" />

    @php($d = $page->page_data ?? [])

    {{-- Pre-hero navy strip --}}
    @if (! empty($d['hero_strip']))
        <section class="bg-[#0e1635] text-white py-10 md:py-14 text-center">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[22px] md:text-[30px] leading-snug mb-2">
                    <span class="font-light">{{ $d['hero_strip']['line1_light'] }}</span><span class="font-bold">{{ $d['hero_strip']['line1_bold'] }}</span>
                </h2>
                <h2 class="text-[18px] md:text-[22px] font-semibold text-gray-200">{{ $d['hero_strip']['line2'] }}</h2>
            </div>
        </section>
    @endif

    {{-- Hero floating card --}}
    @if (! empty($d['hero']))
        <section class="bg-white pt-12 md:pt-16 pb-16 md:pb-20">
            <div class="max-w-[920px] mx-auto px-4">
                <div class="bg-white rounded-2xl shadow-[0_8px_30px_rgba(0,0,0,0.08)] border border-gray-100 px-8 md:px-12 py-10 md:py-14 text-center">
                    <h1 class="text-[24px] md:text-[32px] font-bold text-[#14166e] leading-snug mb-4">{{ $d['hero']['heading'] }}</h1>
                    @if (! empty($d['hero']['tagline']))
                        <p class="text-[15px] md:text-[16px] font-semibold text-gray-700 mb-3">{{ $d['hero']['tagline'] }}</p>
                    @endif
                    @foreach (($d['hero']['paragraphs'] ?? []) as $p)
                        <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed mb-4 max-w-[760px] mx-auto">{{ $p }}</p>
                    @endforeach
                    @if (! empty($d['hero']['badges']))
                        <ul class="flex flex-col gap-2 items-center mt-4">
                            @foreach ($d['hero']['badges'] as $b)
                                <li class="flex gap-2 text-[14px] md:text-[15px] text-[#14166e] font-semibold leading-relaxed">
                                    <span class="text-[#5cb85c] mt-[2px]">&#10003;</span>
                                    <span>{{ $b }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- Certification Overview --}}
    @if (! empty($d['overview']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-[26px] md:text-[34px] leading-snug mb-6 text-[#14166e]">
                        <span class="font-light">Certification </span><span class="font-bold">Overview</span>
                    </h2>
                    @foreach (($d['overview']['paragraphs'] ?? []) as $p)
                        <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed mb-4">{{ $p }}</p>
                    @endforeach
                    @if (! empty($d['overview']['items']))
                        <ul class="space-y-2 my-5">
                            @foreach ($d['overview']['items'] as $li)
                                <li class="flex gap-2 text-[14px] md:text-[15px] text-gray-700 leading-relaxed">
                                    <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                    <span>{{ $li }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    @if (! empty($d['overview']['closing']))
                        <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $d['overview']['closing'] }}</p>
                    @endif
                </div>
                @if (! empty($d['overview']['image']))
                    <div class="flex justify-center">
                        <img src="{{ $d['overview']['image'] }}" alt="" class="w-full max-w-[520px] h-auto rounded-xl shadow-md" loading="lazy">
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- Why CCMC Matters --}}
    @if (! empty($d['why_matters']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                @if (! empty($d['why_matters']['image']))
                    <div class="flex justify-center">
                        <img src="{{ $d['why_matters']['image'] }}" alt="" class="w-full max-w-[520px] h-auto rounded-xl shadow-md" loading="lazy">
                    </div>
                @endif
                <div>
                    <h2 class="text-[24px] md:text-[30px] font-bold text-[#14166e] leading-snug mb-4">{{ $d['why_matters']['heading'] }}</h2>
                    @if (! empty($d['why_matters']['intro']))
                        <p class="text-[14px] md:text-[15px] text-gray-700 mb-3">{{ $d['why_matters']['intro'] }}</p>
                    @endif
                    <ul class="space-y-2 mb-5">
                        @foreach (($d['why_matters']['items_a'] ?? []) as $li)
                            <li class="flex gap-2 text-[14px] md:text-[15px] text-gray-700 leading-relaxed">
                                <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                <span>{{ $li }}</span>
                            </li>
                        @endforeach
                    </ul>
                    @if (! empty($d['why_matters']['middle']))
                        <p class="text-[14px] md:text-[15px] text-gray-700 mb-3">{{ $d['why_matters']['middle'] }}</p>
                    @endif
                    <ul class="space-y-2">
                        @foreach (($d['why_matters']['items_b'] ?? []) as $li)
                            <li class="flex gap-2 text-[14px] md:text-[15px] text-gray-700 leading-relaxed">
                                <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                <span>{{ $li }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    @endif

    {{-- Outcomes: 3 equal columns, badge image top-left + heading + bullets --}}
    @if (! empty($d['outcomes']['cards']))
        @php($_outcomeBg = ['#eaf7ee', '#f6f8fb', '#eef0fb'])
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($d['outcomes']['cards'] as $i => $c)
                    <div class="relative rounded-xl p-6 pt-24" style="background-color: {{ $_outcomeBg[$i % count($_outcomeBg)] }};">
                        @if (! empty($c['image']))
                            <span class="absolute -top-5 left-6 inline-flex items-center justify-center">
                                <img src="{{ $c['image'] }}" alt="" class="w-auto max-w-[100px] h-auto object-contain" loading="lazy">
                            </span>
                        @endif
                        <h3 class="text-[18px] md:text-[22px] font-bold text-[#14166e] mb-1">{{ $c['heading'] }}</h3>
                        @if (! empty($c['subheading']))
                            <p class="text-[13px] md:text-[14px] font-semibold text-gray-600 mb-3">{{ $c['subheading'] }}</p>
                        @endif
                        @if (! empty($c['intro']))
                            <p class="text-[14px] md:text-[15px] text-gray-700 mb-4">{{ $c['intro'] }}</p>
                        @endif
                        <ul class="space-y-2">
                            @foreach (($c['items'] ?? []) as $li)
                                <li class="flex gap-2 text-[14px] md:text-[15px] text-gray-700 leading-relaxed">
                                    <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                    <span>{{ $li }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Certification Structure heading --}}
    @if (! empty($d['structure']))
        <section class="bg-white pb-8">
            <div class="max-w-[900px] mx-auto px-4 text-center">
                <h2 class="text-[26px] md:text-[34px] font-bold text-[#14166e] leading-snug mb-2">
                    <span class="font-light">Certification </span>Structure
                </h2>
                @if (! empty($d['structure']['subtitle']))
                    <p class="text-[14px] md:text-[15px] text-gray-600">{{ $d['structure']['subtitle'] }}</p>
                @endif
            </div>
        </section>
    @endif

    {{-- Modules grid --}}
    @if (! empty($d['modules']['cards']))
        <section class="bg-white py-12 md:py-16">
            <div class="max-w-[1100px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-10">
                    @foreach ($d['modules']['cards'] as $c)
                        <div class="bg-white">
                            @if (! empty($c['image']))
                                <img src="{{ $c['image'] }}" alt="" class="w-auto max-w-[120px] h-auto mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[16px] md:text-[18px] font-bold text-[#14166e] mb-3">{{ $c['title'] }}</h3>
                            <ul class="space-y-1.5">
                                @foreach (($c['items'] ?? []) as $li)
                                    <li class="flex gap-2 text-[13px] md:text-[14px] text-gray-700 leading-relaxed">
                                        <span class="text-[#5cb85c] mt-[2px]">&#10003;</span>
                                        <span>{{ $li }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Modern Tools & Technologies (icon image + heading + bullets, 4-col) --}}
    @if (! empty($d['tools']['cards']))
        <section class="bg-[#f6f8fb] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[24px] md:text-[32px] font-bold text-[#14166e] text-center leading-snug mb-10">{{ $d['tools']['heading'] }}</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($d['tools']['cards'] as $c)
                        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
                            @if (! empty($c['image']))
                                <img src="{{ $c['image'] }}" alt="" class="w-auto max-w-[80px] h-auto mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[15px] md:text-[16px] font-bold text-[#14166e] mb-3 leading-snug">{{ $c['title'] }}</h3>
                            <ul class="space-y-1.5">
                                @foreach (($c['items'] ?? []) as $li)
                                    <li class="flex gap-2 text-[13px] md:text-[14px] text-gray-700 leading-relaxed">
                                        <span class="text-[#5cb85c] mt-[2px]">&#10003;</span>
                                        <span>{{ $li }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Program Duration & Delivery Options --}}
    @if (! empty($d['delivery']['cards']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[24px] md:text-[32px] font-bold text-[#14166e] text-center leading-snug mb-10">{{ $d['delivery']['heading'] }}</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($d['delivery']['cards'] as $c)
                        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 text-center">
                            @if (! empty($c['image']))
                                <img src="{{ $c['image'] }}" alt="" class="w-auto max-w-[80px] h-auto mx-auto mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[15px] md:text-[16px] font-bold text-[#14166e] mb-3 leading-snug">{{ $c['title'] }}</h3>
                            @if (! empty($c['items']))
                                <ul class="space-y-1">
                                    @foreach ($c['items'] as $li)
                                        <li class="text-[13px] md:text-[14px] text-gray-700 leading-relaxed">{{ $li }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            @if (! empty($c['paragraph']))
                                <p class="text-[13px] md:text-[14px] text-gray-700 leading-relaxed">{{ $c['paragraph'] }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Certification Exam & Capstone --}}
    @if (! empty($d['exam_capstone']))
        @php($e = $d['exam_capstone'])
        <section class="bg-[#f6f8fb] py-16 md:py-20">
            <div class="max-w-[1100px] mx-auto px-4">
                <h2 class="text-[24px] md:text-[32px] font-bold text-[#14166e] text-center leading-snug mb-10">{{ $e['heading'] }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
                        <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-3">{{ $e['exam_heading'] }}</h3>
                        <ul class="space-y-2">
                            @foreach (($e['exam_items'] ?? []) as $li)
                                <li class="flex gap-2 text-[14px] md:text-[15px] text-gray-700 leading-relaxed">
                                    <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                    <span>{{ $li }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
                        <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-2">{{ $e['capstone_heading'] }}</h3>
                        @if (! empty($e['capstone_intro']))
                            <p class="text-[14px] md:text-[15px] text-gray-700 mb-3">{{ $e['capstone_intro'] }}</p>
                        @endif
                        <ul class="space-y-2">
                            @foreach (($e['capstone_items'] ?? []) as $li)
                                <li class="flex gap-2 text-[14px] md:text-[15px] text-gray-700 leading-relaxed">
                                    <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                    <span>{{ $li }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
                        <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-2">{{ $e['careers_heading'] }}</h3>
                        @if (! empty($e['careers_intro']))
                            <p class="text-[14px] md:text-[15px] text-gray-700 mb-3">{{ $e['careers_intro'] }}</p>
                        @endif
                        <ul class="space-y-2">
                            @foreach (($e['careers_items'] ?? []) as $li)
                                <li class="flex gap-2 text-[14px] md:text-[15px] text-gray-700 leading-relaxed">
                                    <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                    <span>{{ $li }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
                        <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-3">{{ $e['outlook_heading'] }}</h3>
                        <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $e['outlook_paragraph'] }}</p>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- ISO & Global Framework Alignment (single full-width card) --}}
    @if (! empty($d['iso']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1100px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($d['iso']['image']))
                    <div class="flex justify-center">
                        <img src="{{ $d['iso']['image'] }}" alt="" class="w-full max-w-[480px] h-auto rounded-xl shadow-md" loading="lazy">
                    </div>
                @endif
                <div>
                    <h2 class="text-[24px] md:text-[30px] font-bold text-[#14166e] leading-snug mb-3">{{ $d['iso']['heading'] }}</h2>
                    @if (! empty($d['iso']['intro']))
                        <p class="text-[14px] md:text-[15px] text-gray-700 mb-4">{{ $d['iso']['intro'] }}</p>
                    @endif
                    <ul class="space-y-2">
                        @foreach (($d['iso']['items'] ?? []) as $li)
                            <li class="flex gap-2 text-[14px] md:text-[15px] text-gray-700 leading-relaxed">
                                <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                <span>{{ $li }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    @endif

    {{-- Eligibility / Why Choose / Benefits — 3 cards --}}
    @if (! empty($d['eligibility_why_benefits']['cards']))
        <section class="bg-white pb-16 md:pb-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($d['eligibility_why_benefits']['cards'] as $c)
                    <div class="bg-white rounded-xl border border-gray-100 shadow-sm px-6">
                        @if (! empty($c['image']))
                            <img src="{{ $c['image'] }}" alt="" class="w-auto max-w-[180px] h-auto mb-4 mx-auto" loading="lazy">
                        @endif
                        <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-4">{{ $c['title'] }}</h3>
                        <ul class="space-y-2">
                            @foreach (($c['items'] ?? []) as $li)
                                <li class="flex gap-2 text-[14px] md:text-[15px] text-gray-700 leading-relaxed">
                                    <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                    <span>{{ $li }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Call to Action banner (Become a Leader) --}}
    @if (! empty($d['call_to_action']))
        <section class="py-12 md:py-16 bg-white">
            <div class="max-w-[1100px] mx-auto px-4">
                <div class="bg-[#0e1635] rounded-2xl text-white px-6 md:px-12 py-10 md:py-14 text-center">
                    <h2 class="text-[24px] md:text-[32px] font-bold leading-snug mb-4">{{ $d['call_to_action']['heading'] }}</h2>
                    @if (! empty($d['call_to_action']['paragraph']))
                        <p class="text-[14px] md:text-[15px] text-gray-200 leading-relaxed mb-6 max-w-[800px] mx-auto">{{ $d['call_to_action']['paragraph'] }}</p>
                    @endif
                    @if (! empty($d['call_to_action']['items']))
                        <ul class="space-y-2 inline-block text-left mb-4">
                            @foreach ($d['call_to_action']['items'] as $li)
                                <li class="flex gap-2 text-[14px] md:text-[15px] text-gray-200 leading-relaxed">
                                    <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                    <span>{{ $li }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    @if (! empty($d['call_to_action']['footer_line']))
                        <p class="text-[13px] md:text-[14px] text-gray-300 italic mt-3">{{ $d['call_to_action']['footer_line'] }}</p>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- CTA pricing cards --}}
    @if (! empty($d['cta']['options']))
        @php($_accents = ['#5cb85c', '#f0ad4e', '#5bc0de'])
        <section class="bg-white pb-16 md:pb-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($d['cta']['options'] as $i => $opt)
                        <div class="relative bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
                            <span class="block h-1.5 w-full" style="background-color: {{ $_accents[$i % count($_accents)] }};"></span>
                            <div class="p-6">
                                <div class="flex items-start gap-3 mb-5 min-h-[80px]">
                                    <span class="flex-none w-9 h-9 rounded-full bg-[#5cb85c] flex items-center justify-center text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                    </span>
                                    <p class="text-[14px] md:text-[15px] font-bold text-[#14166e] leading-snug">{{ $opt['label'] }}</p>
                                </div>
                                <a href="{{ $opt['cta_href'] }}" class="inline-flex items-center gap-2 bg-[#1f7a1f] hover:bg-[#176317] text-white font-semibold text-[14px] md:text-[15px] px-6 py-3 rounded-full transition-colors">
                                    <span>{{ $opt['cta_label'] }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Comparison Intro --}}
    @if (! empty($d['comparison_intro']))
        <section class="bg-[#f6f8fb] py-16 md:py-20">
            <div class="max-w-[1000px] mx-auto px-4 text-center">
                <h2 class="text-[24px] md:text-[32px] font-bold text-[#14166e] leading-snug mb-3">{{ $d['comparison_intro']['eyebrow_h2'] }}</h2>
                <h3 class="text-[18px] md:text-[22px] font-semibold text-gray-700 mb-4">{{ $d['comparison_intro']['eyebrow_h3'] }}</h3>
                <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $d['comparison_intro']['paragraph'] }}</p>
            </div>
        </section>
    @endif

    {{-- Comparison overview --}}
    @if (! empty($d['comparison_overview']))
        <section class="bg-white py-12 md:py-16">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h2 class="text-[22px] md:text-[28px] font-bold text-[#14166e] leading-snug mb-3">{{ $d['comparison_overview']['heading'] }}</h2>
                <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed mb-6 max-w-[820px] mx-auto">{{ $d['comparison_overview']['paragraph'] }}</p>
                @if (! empty($d['comparison_overview']['levels']))
                    <ul class="flex flex-wrap justify-center gap-3 mb-6">
                        @foreach ($d['comparison_overview']['levels'] as $lv)
                            <li class="px-4 py-2 bg-[#f6f8fb] border border-gray-200 rounded-full text-[14px] font-semibold text-[#14166e]">{{ $lv }}</li>
                        @endforeach
                    </ul>
                @endif
                @foreach (($d['comparison_overview']['closing'] ?? []) as $c)
                    <p class="text-[14px] md:text-[15px] font-semibold text-[#14166e]">{{ $c }}</p>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Quick Comparison Overview table --}}
    @if (! empty($d['quick_comparison']))
        <section class="bg-[#f6f8fb] py-12 md:py-16">
            <div class="max-w-[1100px] mx-auto px-4">
                <h2 class="text-[24px] md:text-[30px] font-bold text-[#14166e] text-center leading-snug mb-8">{{ $d['quick_comparison']['heading'] }}</h2>
                <div class="overflow-x-auto bg-white rounded-xl shadow-sm border border-gray-100">
                    <table class="min-w-full text-left text-[14px] md:text-[15px]">
                        <thead class="bg-[#14166e] text-white">
                            <tr>
                                @foreach ($d['quick_comparison']['headers'] as $h)
                                    <th class="px-4 py-3 font-bold">{{ $h }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($d['quick_comparison']['rows'] as $r)
                                <tr class="border-b border-gray-100">
                                    @foreach ($r as $j => $cell)
                                        <td class="px-4 py-3 text-gray-700 {{ $j === 0 ? 'font-semibold text-[#14166e]' : '' }}">{{ $cell }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    @endif

    {{-- Certification Positioning --}}
    @if (! empty($d['positioning']['cards']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[24px] md:text-[32px] font-bold text-[#14166e] text-center leading-snug mb-10">{{ $d['positioning']['heading'] }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach ($d['positioning']['cards'] as $c)
                        <div class="bg-[#f6f8fb] rounded-xl p-6 border border-gray-100">
                            @if (! empty($c['image']))
                                <img src="{{ $c['image'] }}" alt="" class="w-auto max-w-[500px] h-auto mb-4 mx-auto" loading="lazy">
                            @endif
                            <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-3">{{ $c['title'] }}</h3>

                            @if (! empty($c['subtitle']))
                                <p class="text-[15px] font-semibold text-gray-700 mb-2">{{ $c['subtitle'] }}</p>
                            @endif
                            @if (! empty($c['pathway']))
                                <p class="text-[15px] md:text-[16px] font-bold text-[#14166e] mb-3">{{ $c['pathway'] }}</p>
                            @endif

                            @if (! empty($c['best_for_html']))
                                <p class="text-[14px] md:text-[15px] text-gray-700 mb-3">{!! $c['best_for_html'] !!}</p>
                            @endif

                            @if (! empty($c['gain_label_html']))
                                <p class="text-[14px] md:text-[15px] text-gray-700 mb-2">{!! $c['gain_label_html'] !!}</p>
                            @endif
                            @if (! empty($c['gain_items']))
                                <ul class="space-y-1.5 mb-4">
                                    @foreach ($c['gain_items'] as $li)
                                        <li class="flex gap-2 text-[13px] md:text-[14px] text-gray-700 leading-relaxed">
                                            <span class="text-[#5cb85c] mt-[2px]">&#10003;</span>
                                            <span>{{ $li }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            @if (! empty($c['roles_label_html']))
                                <p class="text-[14px] md:text-[15px] text-gray-700 mb-2">{!! $c['roles_label_html'] !!}</p>
                            @endif
                            @if (! empty($c['roles_items']))
                                <ul class="space-y-1.5 mb-4">
                                    @foreach ($c['roles_items'] as $li)
                                        <li class="flex gap-2 text-[13px] md:text-[14px] text-gray-700 leading-relaxed">
                                            <span class="text-[#5cb85c] mt-[2px]">&#10003;</span>
                                            <span>{{ $li }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            @if (! empty($c['items']))
                                <ul class="space-y-1.5 mb-4">
                                    @foreach ($c['items'] as $li)
                                        <li class="flex gap-2 text-[13px] md:text-[14px] text-gray-700 leading-relaxed">
                                            <span class="text-[#5cb85c] mt-[2px]">&#10003;</span>
                                            <span>{{ $li }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            @if (! empty($c['closing']))
                                <p class="text-[13px] md:text-[14px] text-gray-700 leading-relaxed mb-3">{{ $c['closing'] }}</p>
                            @endif
                            @if (! empty($c['footer']))
                                <p class="text-[14px] md:text-[15px] font-semibold text-[#14166e]">{{ $c['footer'] }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Skills Progression Comparison table --}}
    @if (! empty($d['skills_table']))
        <section class="bg-[#f6f8fb] py-12 md:py-16">
            <div class="max-w-[1100px] mx-auto px-4">
                <h2 class="text-[24px] md:text-[30px] font-bold text-[#14166e] text-center leading-snug mb-8">{{ $d['skills_table']['heading'] }}</h2>
                <div class="overflow-x-auto bg-white rounded-xl shadow-sm border border-gray-100">
                    <table class="min-w-full text-left text-[14px] md:text-[15px]">
                        <thead class="bg-[#14166e] text-white">
                            <tr>
                                @foreach ($d['skills_table']['headers'] as $h)
                                    <th class="px-4 py-3 font-bold">{{ $h }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($d['skills_table']['rows'] as $r)
                                <tr class="border-b border-gray-100">
                                    @foreach ($r as $j => $cell)
                                        <td class="px-4 py-3 text-gray-700 {{ $j === 0 ? 'font-semibold text-[#14166e]' : '' }}">{{ $cell }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    @endif

    {{-- Choose-which cards (3 cols, image+heading+bullets) --}}
    @if (! empty($d['choose_cards']['cards']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                @if (! empty($d['choose_cards']['heading']))
                    <h2 class="text-[24px] md:text-[30px] font-bold text-[#14166e] text-center leading-snug mb-10">{{ $d['choose_cards']['heading'] }}</h2>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($d['choose_cards']['cards'] as $c)
                        <div class="bg-white rounded-xl rounded-tl-[2.2vw] border border-gray-100 shadow-sm overflow-hidden">
                            @if (! empty($c['image']))
                                <img src="{{ $c['image'] }}" alt="" class="w-auto max-w-[240px] h-auto mb-4" loading="lazy">
                            @endif
                            <div class="px-6 pb-6">
                            <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-3">{{ $c['title'] }}</h3>
                            <ul class="space-y-2">
                                @foreach (($c['items'] ?? []) as $li)
                                    <li class="flex gap-2 text-[14px] md:text-[15px] text-gray-700 leading-relaxed">
                                        <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                        <span>{{ $li }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Industry Demand & Value --}}
    @if (! empty($d['industry_demand']))
        <section class="bg-[#f6f8fb] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
                <div>
                    <h2 class="text-[24px] md:text-[32px] font-bold text-[#14166e] leading-snug mb-6">{{ $d['industry_demand']['heading'] }}</h2>
                    @foreach (($d['industry_demand']['paragraphs'] ?? []) as $p)
                        <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed mb-4">{{ $p }}</p>
                    @endforeach
                </div>
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 md:p-8">
                    <h3 class="text-[18px] md:text-[22px] font-bold text-[#14166e] mb-4">{{ $d['industry_demand']['why_heading'] }}</h3>
                    <ul class="space-y-2">
                        @foreach (($d['industry_demand']['why_items'] ?? []) as $li)
                            <li class="flex gap-2 text-[14px] md:text-[15px] text-gray-700 leading-relaxed">
                                <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                <span>{{ $li }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    @endif

    {{-- Final CTA banner --}}
    @if (! empty($d['final_cta']))
        <section class="py-12 md:py-16 bg-white">
            <div class="max-w-[1100px] mx-auto px-4">
                <div class="bg-[#0e1635] rounded-2xl text-white px-6 md:px-12 py-10 md:py-14 text-center">
                    @foreach (($d['final_cta']['paragraphs'] ?? []) as $i => $p)
                        <p class="{{ $i === 0 ? 'text-[24px] md:text-[30px] font-bold mb-4' : 'text-[14px] md:text-[15px] text-gray-200 leading-relaxed mb-3 max-w-[800px] mx-auto' }}">{{ $p }}</p>
                    @endforeach
                    @if (! empty($d['final_cta']['items']))
                        <ul class="space-y-2 inline-block text-left mt-4">
                            @foreach ($d['final_cta']['items'] as $li)
                                <li class="flex gap-2 text-[14px] md:text-[15px] text-gray-200 leading-relaxed">
                                    <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                    <span>{{ $li }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </section>
    @endif
</x-layouts.cms>
