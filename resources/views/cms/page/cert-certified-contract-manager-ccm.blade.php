<x-layouts.cms>
    <x-cms.seo-head :page="$page" />
    <x-cms.eltdf-title-bar :title="$page->title" :breadcrumbs="[['label' => $page->title]]" />

    @php($d = $page->page_data ?? [])

    {{-- Pre-hero navy strip: eyebrow + subheading --}}
    @if (! empty($d['hero']['eyebrow']) || ! empty($d['hero']['subheading']))
        <section class="bg-[#0e1635] text-white py-10 md:py-14 text-center">
            <div class="max-w-[1200px] mx-auto px-4">
                @if (! empty($d['hero']['eyebrow']))
                    <h2 class="text-[22px] md:text-[30px] leading-snug mb-2">
                        <span class="font-light">Certified Contract </span><span class="font-bold">Manager (CCM)®</span>
                    </h2>
                @endif
                @if (! empty($d['hero']['subheading']))
                    <h2 class="text-[18px] md:text-[22px] font-semibold text-gray-200">{{ $d['hero']['subheading'] }}</h2>
                @endif
            </div>
        </section>
    @endif

    {{-- Hero floating card --}}
    @if (! empty($d['hero']))
        <section class="bg-white pt-12 md:pt-16 pb-16 md:pb-20">
            <div class="max-w-[920px] mx-auto px-4">
                <div class="bg-white rounded-2xl shadow-[0_8px_30px_rgba(0,0,0,0.08)] border border-gray-100 px-8 md:px-12 py-10 md:py-14 text-center">
                    @if (! empty($d['hero']['heading']))
                        <h1 class="text-[24px] md:text-[32px] font-bold text-[#14166e] leading-snug mb-4">
                            <span class="font-light">Lead Strategic </span><span class="text-[#5cb85c]">Contract Management at the Highest Level</span>
                        </h1>
                    @endif
                    @if (! empty($d['hero']['tagline']))
                        <p class="text-[15px] md:text-[16px] font-semibold text-gray-700 mb-3">{{ $d['hero']['tagline'] }}</p>
                    @endif
                    @if (! empty($d['hero']['intro']))
                        <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed mb-6 max-w-[760px] mx-auto">{{ $d['hero']['intro'] }}</p>
                    @endif
                    @if (! empty($d['hero']['badges']))
                        <ul class="flex flex-col gap-2 items-center">
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

    {{-- Certification Overview - card on left, slider-img.jpg fills section --}}
    @if (! empty($d['overview']))
        <section class="py-16 md:py-24" style="background-image: url('{{ asset('storage/cms-images/2026/03/slider-img.jpg') }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="rounded-2xl p-8 md:p-10 text-white" style="background-color: rgba(26, 39, 64, 0.85);">
                    <h2 class="text-[26px] md:text-[34px] leading-snug mb-6 text-white">
                        <span class="font-light">Certification </span><span class="font-bold">Overview</span>
                    </h2>
                    @foreach (($d['overview']['paragraphs'] ?? []) as $p)
                        <p class="text-[14px] md:text-[15px] text-gray-200 leading-relaxed mb-4">{{ $p }}</p>
                    @endforeach
                    @if (! empty($d['overview']['tech_items']))
                        <ul class="space-y-2 my-5">
                            @foreach ($d['overview']['tech_items'] as $li)
                                <li class="flex gap-2 text-[14px] md:text-[15px] text-gray-200 leading-relaxed">
                                    <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                    <span>{{ $li }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    @if (! empty($d['overview']['closing']))
                        <p class="text-[14px] md:text-[15px] text-gray-200 leading-relaxed">{{ $d['overview']['closing'] }}</p>
                    @endif
                </div>
                <div class="hidden md:block" aria-hidden="true"></div>
            </div>
        </section>
    @endif

    {{-- Learning Outcomes: image left, heading + bullets right --}}
    @if (! empty($d['outcomes']['cards'][0]))
        @php($_lo = $d['outcomes']['cards'][0])
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                @if (! empty($_lo['image']))
                    <div class="flex justify-center">
                        <img src="{{ $_lo['image'] }}" alt="" class="w-full max-w-[520px] h-auto rounded-xl shadow-md" loading="lazy">
                    </div>
                @endif
                <div>
                    <h2 class="text-[24px] md:text-[30px] font-bold text-[#14166e] leading-snug mb-4">{{ $_lo['heading'] }}</h2>
                    @if (! empty($_lo['intro']))
                        <p class="text-[14px] md:text-[15px] text-gray-700 mb-4">{{ $_lo['intro'] }}</p>
                    @endif
                    <ul class="space-y-2">
                        @foreach (($_lo['items'] ?? []) as $li)
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

    {{-- Testing Outcomes + Who Should Enroll: 2 colored cards with small icon top-left --}}
    @if (! empty($d['outcomes']['cards'][1]) || ! empty($d['outcomes']['cards'][2]))
        <section class="bg-white pb-16 md:pb-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ([$d['outcomes']['cards'][1] ?? null, $d['outcomes']['cards'][2] ?? null] as $i => $c)
                    @if ($c)
                        <div class="relative rounded-xl p-6 pt-24" style="background-color: {{ $i === 0 ? '#eaf7ee' : '#f6f8fb' }};">
                            @if (! empty($c['image']))
                                <span class="absolute -top-5 left-6 inline-flex items-center justify-center">
                                    <img src="{{ $c['image'] }}" alt="" class="w-auto max-w-[100px] h-auto object-contain" loading="lazy">
                                </span>
                            @endif
                            <h3 class="text-[18px] md:text-[22px] font-bold text-[#14166e] mb-3">{{ $c['heading'] }}</h3>
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
                    @endif
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

    {{-- Modules grid: each card uses a banner image at top --}}
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

    {{-- Modern Tools & Technologies --}}
    @if (! empty($d['tools']))
        @php($_toolColors = ['#5bc0de', '#f0ad4e', '#5cb85c', '#7b3f9c'])
        <section class="bg-[#f6f8fb] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[24px] md:text-[32px] font-bold text-[#14166e] text-center leading-snug mb-10">
                    <span class="font-light">Modern Tools & Technologies </span>You Will Master
                </h2>
                @if (! empty($d['tools']['intro']))
                    <p class="text-[14px] md:text-[15px] text-gray-700 text-center leading-relaxed mb-10 -mt-6">{{ $d['tools']['intro'] }}</p>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach (($d['tools']['groups'] ?? []) as $i => $g)
                        @php($tc = $_toolColors[$i % count($_toolColors)])
                        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                            <div class="px-5 py-3 text-white text-[14px] md:text-[15px] font-bold" style="background-color: {{ $tc }};">{{ $g['title'] }}</div>
                            <div class="p-5">
                                <ul class="space-y-2">
                                    @foreach (($g['items'] ?? []) as $li)
                                        <li class="flex gap-2 text-[13px] md:text-[14px] text-gray-700 leading-relaxed">
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

    {{-- Program Duration & Delivery Options: circular colored icons at top --}}
    @if (! empty($d['delivery']))
        @php($_delColors = ['#f0ad4e', '#5bc0de', '#d9534f', '#5cb85c'])
        @php($_delIcons = [
            '<svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 21v-2a4 4 0 014-4h10a4 4 0 014 4v2M12 3a4 4 0 100 8 4 4 0 000-8z"/></svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>',
        ])
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[24px] md:text-[32px] font-bold text-[#14166e] text-center leading-snug mb-10">
                    <span class="font-light">Program Duration & </span>Delivery Options
                </h2>
                @if (! empty($d['delivery']['intro']))
                    <p class="text-[14px] md:text-[15px] text-gray-700 text-center leading-relaxed mb-10 -mt-6">{{ $d['delivery']['intro'] }}</p>
                @endif
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach (($d['delivery']['cards'] ?? []) as $i => $c)
                        @php($dc = $_delColors[$i % count($_delColors)])
                        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 text-center">
                            <span class="inline-flex items-center justify-center w-16 h-16 rounded-full text-white mb-4" style="background-color: {{ $dc }};">
                                {!! $_delIcons[$i % count($_delIcons)] !!}
                            </span>
                            <h3 class="text-[15px] md:text-[16px] font-bold text-[#14166e] mb-3 leading-snug">{{ $c['title'] }}</h3>
                            <ul class="space-y-1">
                                @foreach (($c['items'] ?? []) as $li)
                                    <li class="text-[13px] md:text-[14px] text-gray-700 leading-relaxed">{{ $li }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Exam + Career (left column stack with small icon images) --}}
    @if (! empty($d['exam']) || ! empty($d['careers']))
        <section class="bg-white pb-16">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-2 md:grid-cols-2 gap-8">
                <div class="space-y-10">
                    @if (! empty($d['exam']))
                        <div>
                            @if (! empty($d['exam']['image']))
                                <img src="{{ $d['exam']['image'] }}" alt="" class="w-auto max-w-[100px] h-auto mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[20px] md:text-[24px] font-bold text-[#14166e] mb-4">{{ $d['exam']['heading'] }}</h3>
                            <ul class="space-y-2">
                                @foreach (($d['exam']['items'] ?? []) as $li)
                                    <li class="flex gap-2 text-[14px] md:text-[15px] text-gray-700 leading-relaxed">
                                        <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                        <span>{!! preg_replace('/^([^:]+:)/', '<strong class="text-[#14166e]">$1</strong>', e($li)) !!}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="space-y-10">
                    @if (! empty($d['careers']))
                        <div>
                            @if (! empty($d['careers']['image']))
                                <img src="{{ $d['careers']['image'] }}" alt="" class="w-auto max-w-[100px] h-auto mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[20px] md:text-[24px] font-bold text-[#14166e] mb-3">{{ $d['careers']['heading'] }}</h3>
                            @if (! empty($d['careers']['intro']))
                                <p class="text-[14px] md:text-[15px] text-gray-700 mb-4">{{ $d['careers']['intro'] }}</p>
                            @endif
                            <ul class="space-y-2">
                                @foreach (($d['careers']['items'] ?? []) as $li)
                                    <li class="flex gap-2 text-[14px] md:text-[15px] text-gray-700 leading-relaxed">
                                        <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                        <span>{{ $li }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- Employment Outlook (dark navy bg, image left edge-to-edge, text right) --}}
    @if (! empty($d['employment_outlook']))
        <section class="bg-white text-black">
            <div class="max-w-[1400px] mx-auto grid grid-cols-1 md:grid-cols-2 items-stretch">
                @if (! empty($d['employment_outlook']['image']))
                    <div class="relative min-h-[320px] md:min-h-[420px] rounded-2xl overflow-hidden">
                        <img src="{{ $d['employment_outlook']['image'] }}" alt="" class="absolute inset-0 w-full h-full object-cover" loading="lazy">
                    </div>
                @endif
                <div class="px-6 md:px-12 py-14 md:py-20">
                    <h2 class="text-[26px] md:text-[34px] font-bold leading-snug mb-6">
                        <span class="font-light">Employment Outlook </span>Delivery Options
                    </h2>
                    <p class="text-[14px] md:text-[15px] text-black leading-relaxed">{{ $d['employment_outlook']['paragraph'] }}</p>
                </div>
            </div>
        </section>
    @endif

    {{-- ISO + Eligibility (decorative bracket cards) --}}
    @if (! empty($d['iso_eligibility']['cards']))
        @php($_isoColors = ['#1f7a8c', '#c2185b'])
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16">
                @foreach ($d['iso_eligibility']['cards'] as $i => $c)
                    @php($bc = $_isoColors[$i % count($_isoColors)])
                    <div class="relative pt-2 pb-16 px-2">
                        @if (! empty($c['image']))
                            <img src="{{ $c['image'] }}" alt="" class="w-auto max-w-[100px] h-auto mb-5" loading="lazy">
                        @endif
                        <h3 class="text-[20px] md:text-[24px] font-bold text-[#14166e] mb-3">{{ $c['title'] }}</h3>
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
                        {{-- Bottom-right bracket --}}
                        <svg class="absolute bottom-0 right-0 w-24 h-24" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M100 0 L100 100 L0 100" stroke="{{ $bc }}" stroke-width="2" fill="none"/>
                            <path d="M70 100 L85 85 L100 100 Z" fill="{{ $bc }}"/>
                        </svg>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Why Choose + Benefits (decorative bracket cards) --}}
    @if (! empty($d['why_benefits']['cards']))
        @php($_whyColors = ['#8a8a3a', '#c2185b'])
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16">
                @foreach ($d['why_benefits']['cards'] as $i => $c)
                    @php($bc = $_whyColors[$i % count($_whyColors)])
                    <div class="relative pt-2 pb-16 px-2">
                        @if (! empty($c['image']))
                            <img src="{{ $c['image'] }}" alt="" class="w-auto max-w-[100px] h-auto mb-5" loading="lazy">
                        @endif
                        <h3 class="text-[20px] md:text-[24px] font-bold text-[#14166e] mb-4">{{ $c['title'] }}</h3>
                        <ul class="space-y-2">
                            @foreach (($c['items'] ?? []) as $li)
                                <li class="flex gap-2 text-[14px] md:text-[15px] text-gray-700 leading-relaxed">
                                    <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                    <span>{{ $li }}</span>
                                </li>
                            @endforeach
                        </ul>
                        {{-- Bottom-right bracket --}}
                        <svg class="absolute bottom-0 right-0 w-24 h-24" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M100 0 L100 100 L0 100" stroke="{{ $bc }}" stroke-width="2" fill="none"/>
                            <path d="M70 100 L85 85 L100 100 Z" fill="{{ $bc }}"/>
                        </svg>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Call to Action banner --}}
    @if (! empty($d['call_to_action']))
        <section class="py-12 md:py-16 bg-white">
            <div class="max-w-[1100px] mx-auto px-4">
                <div class="bg-[#0e1635] rounded-2xl text-white px-6 md:px-12 py-10 md:py-14 text-center">
                    <h2 class="text-[28px] md:text-[36px] font-bold leading-snug mb-4">
                        <span class="font-light">Call to </span><span class="text-[#f0ad4e]">Action</span>
                    </h2>
                    @if (! empty($d['call_to_action']['tagline']))
                        <p class="text-[16px] md:text-[20px] font-semibold mb-3">{{ $d['call_to_action']['tagline'] }}</p>
                    @endif
                    @if (! empty($d['call_to_action']['paragraph']))
                        <p class="text-[14px] md:text-[15px] text-gray-200 leading-relaxed mb-6 max-w-[800px] mx-auto">{{ $d['call_to_action']['paragraph'] }}</p>
                    @endif
                    @if (! empty($d['call_to_action']['items']))
                        <ul class="space-y-2 inline-block text-left">
                            @foreach ($d['call_to_action']['items'] as $li)
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

    {{-- CTA buttons --}}
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
</x-layouts.cms>
