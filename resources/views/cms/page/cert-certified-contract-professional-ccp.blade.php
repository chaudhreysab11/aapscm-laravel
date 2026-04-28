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
                        <span class="font-light">Certified Contract </span><span class="font-bold">Professional (CCP)®</span>
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
                            Become a <span class="text-[#5cb85c]">Certified Contract Professional (CCP)®</span>
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

    {{-- Certification Overview - text only, with slider-img.jpg background --}}
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
                </div>
                <div class="hidden md:block" aria-hidden="true"></div>
            </div>
        </section>
    @endif

    {{-- Employment Outlook (text+bullets left, image right) --}}
    @if (! empty($d['employment_intro']))
        @php($_eImg = $d['overview']['image'] ?? ($d['employment_intro']['image'] ?? null))
        <section class="bg-white pb-16 md:pb-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-[26px] md:text-[34px] font-bold text-[#14166e] leading-snug mb-6">
                        <span class="font-light">Employment </span>Outlook
                    </h2>
                    @foreach (($d['employment_intro']['paragraphs'] ?? []) as $p)
                        <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed mb-4">{{ $p }}</p>
                    @endforeach
                    @if (! empty($d['employment_intro']['items']))
                        <ul class="space-y-2 my-5">
                            @foreach ($d['employment_intro']['items'] as $li)
                                <li class="flex gap-2 text-[14px] md:text-[15px] text-gray-700 leading-relaxed">
                                    <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                    <span>{{ $li }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    @if (! empty($d['employment_intro']['closing']))
                        <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed font-semibold">{{ $d['employment_intro']['closing'] }}</p>
                    @endif
                </div>
                @if ($_eImg)
                    <div class="flex justify-center">
                        <img src="{{ $_eImg }}" alt="" class="w-full max-w-[520px] h-auto rounded-xl" loading="lazy">
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- Learning Outcomes: image left, heading + bullets right --}}
    @if (! empty($d['outcomes']['cards'][0]))
        @php($_lo = $d['outcomes']['cards'][0])
        <section class="bg-white pb-16 md:pb-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                @if (! empty($_lo['image']))
                    <div class="flex justify-center">
                        <img src="{{ $_lo['image'] }}" alt="" class="w-full max-w-[520px] h-auto" loading="lazy">
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

    {{-- Testing Outcomes + Who Should Enroll: 2 cards with banner image at top --}}
    @if (! empty($d['outcomes']['cards'][1]) || ! empty($d['outcomes']['cards'][2]))
        <section class="bg-white pb-16 md:pb-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ([$d['outcomes']['cards'][1] ?? null, $d['outcomes']['cards'][2] ?? null] as $c)
                    @if ($c)
                        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 md:p-8">
                            @if (! empty($c['image']))
                                <img src="{{ $c['image'] }}" alt="" class="w-full max-w-[480px] h-auto mb-5" loading="lazy">
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
                                <img src="{{ $c['image'] }}" alt="" class="w-full max-w-[330px] h-auto mb-4" loading="lazy">
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
                <h2 class="text-[24px] md:text-[32px] font-bold text-[#14166e] text-center leading-snug mb-3">
                    <span class="font-light">Modern Tools & Technologies </span>You Will Learn
                </h2>
                @if (! empty($d['tools']['intro']))
                    <p class="text-[14px] md:text-[15px] text-gray-700 text-center leading-relaxed mb-10">{{ $d['tools']['intro'] }}</p>
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

    {{-- Program Duration & Delivery Options: banner images, no chevron --}}
    @if (! empty($d['delivery']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[24px] md:text-[32px] font-bold text-[#14166e] text-center leading-snug mb-3">
                    <span class="font-light">Program Duration & </span>Delivery Options
                </h2>
                @if (! empty($d['delivery']['intro']))
                    <p class="text-[14px] md:text-[15px] text-gray-700 text-center leading-relaxed mb-12">{{ $d['delivery']['intro'] }}</p>
                @endif
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach (($d['delivery']['cards'] ?? []) as $c)
                        <div class="text-center">
                            @if (! empty($c['image']))
                                <img src="{{ $c['image'] }}" alt="" class="w-full max-w-[260px] h-auto mx-auto mb-4" loading="lazy">
                            @endif
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

    {{-- Exam + Career + Employment Outlook (left column stack, small icon images) --}}
    @if (! empty($d['exam']) || ! empty($d['careers']) || ! empty($d['employment_outlook']))
        <section class="bg-white pb-16">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-10">
                    @if (! empty($d['exam']))
                        <div>
                            @if (! empty($d['exam']['image']))
                                <img src="{{ $d['exam']['image'] }}" alt="" class="w-16 h-16 object-contain mb-3" loading="lazy">
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

                    @if (! empty($d['careers']))
                        <div>
                            @if (! empty($d['careers']['image']))
                                <img src="{{ $d['careers']['image'] }}" alt="" class="w-16 h-16 object-contain mb-3" loading="lazy">
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

                    @if (! empty($d['employment_outlook']))
                        <div>
                            <h3 class="text-[20px] md:text-[24px] font-bold text-[#14166e] mb-3">{{ $d['employment_outlook']['heading'] }}</h3>
                            <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $d['employment_outlook']['paragraph'] }}</p>
                        </div>
                    @endif
                </div>
                <div class="hidden md:block"></div>
            </div>
        </section>
    @endif

    {{-- ISO + Eligibility (small icon images, no numbered circles) --}}
    @if (! empty($d['iso_eligibility']['cards']))
        <section class="bg-[#f6f8fb] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($d['iso_eligibility']['cards'] as $c)
                    <div class="bg-white rounded-xl shadow-sm p-6 md:p-8">
                        @if (! empty($c['image']))
                            <img src="{{ $c['image'] }}" alt="" class="w-20 h-20 object-contain mb-4" loading="lazy">
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
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Why Choose + Benefits (small icon images, no numbered circles) --}}
    @if (! empty($d['why_benefits']['cards']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($d['why_benefits']['cards'] as $c)
                    <div class="bg-[#f6f8fb] rounded-xl p-6 md:p-8">
                        @if (! empty($c['image']))
                            <img src="{{ $c['image'] }}" alt="" class="w-20 h-20 object-contain mb-4" loading="lazy">
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
