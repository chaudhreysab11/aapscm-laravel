<x-layouts.cms>
    <x-cms.seo-head :page="$page" />
    <x-cms.eltdf-title-bar :title="$page->title" :breadcrumbs="[['label' => $page->title]]" />

    @php($d = $page->page_data ?? [])

    {{-- Hero --}}
    @if (! empty($d['hero']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                <div>
                    @if (! empty($d['hero']['heading']))
                        <h1 class="text-[24px] md:text-[32px] font-bold text-[#14166e] leading-snug mb-6">{{ $d['hero']['heading'] }}</h1>
                    @endif
                    @foreach (($d['hero']['paragraphs'] ?? []) as $p)
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-4">{{ $p }}</p>
                    @endforeach
                </div>
                @if (! empty($d['hero']['images']))
                    <div class="space-y-6">
                        @foreach ($d['hero']['images'] as $img)
                            <img src="{{ $img }}" alt="" class="w-full h-auto rounded-md" loading="lazy">
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- Target Audience --}}
    @if (! empty($d['audience']))
        <section class="bg-[#f6f8fb] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                @if (! empty($d['audience']['image']))
                    <div><img src="{{ $d['audience']['image'] }}" alt="" class="w-full h-auto rounded-md" loading="lazy"></div>
                @endif
                <div>
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug mb-6">{{ $d['audience']['heading'] }}</h2>
                    <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-6">Upon successful completion of the ED-AIPST diploma, participants will be able to:</p>
                    <ul class="space-y-3">
                        @foreach ($d['audience']['items'] as $li)
                            <li class="flex gap-2 text-[15px] md:text-[16px] text-gray-700 leading-relaxed">
                                <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                <span>{{ $li }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    @endif

    {{-- Program Learning Outcomes --}}
    @if (! empty($d['outcomes']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-5">{{ $d['outcomes']['heading'] }}</h2>
                @if (! empty($d['outcomes']['intro']))
                    <p class="max-w-[900px] mx-auto text-[15px] md:text-[16px] text-gray-700 text-center leading-relaxed mb-12">{{ $d['outcomes']['intro'] }}</p>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($d['outcomes']['cards'] as $c)
                        <div class="bg-[#f6f8fb] rounded-lg shadow-sm p-6">
                            @if (! empty($c['image']))
                                <img src="{{ $c['image'] }}" alt="{{ $c['title'] }}" class="w-16 h-16 object-contain mx-auto mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[16px] md:text-[18px] font-bold text-[#14166e] text-center mb-3">{{ $c['title'] }}</h3>
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
            </div>
        </section>
    @endif

    {{-- Program Structure & Modules --}}
    @if (! empty($d['modules']))
        <section class="bg-[#f6f8fb] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-3">{{ $d['modules']['heading'] }}</h2>
                @if (! empty($d['modules']['subheading']))
                    <p class="text-[16px] md:text-[18px] font-semibold text-[#14166e] text-center mb-12">{{ $d['modules']['subheading'] }}</p>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($d['modules']['cards'] as $c)
                        <div class="bg-white rounded-lg p-5">
                            @if (! empty($c['image']))
                                <img src="{{ $c['image'] }}" alt="{{ $c['title'] }}" class="w-14 h-14 object-contain mb-3" loading="lazy">
                            @endif
                            <h3 class="text-[15px] md:text-[16px] font-bold text-[#14166e] mb-2">{{ $c['title'] }}</h3>
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

                {{-- Capstone --}}
                @if (! empty($d['modules']['capstone']))
                    @php($cap = $d['modules']['capstone'])
                    <div class="mt-12 bg-white rounded-lg p-6 md:p-8 grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
                        @if (! empty($cap['image']))
                            <div class="md:col-span-1">
                                <img src="{{ $cap['image'] }}" alt="{{ $cap['title'] }}" class="w-full h-auto rounded-md" loading="lazy">
                            </div>
                        @endif
                        <div class="md:col-span-2">
                            <h3 class="text-[18px] md:text-[22px] font-bold text-[#14166e] mb-3">{{ $cap['title'] }}</h3>
                            @if (! empty($cap['intro']))
                                <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-4">{{ $cap['intro'] }}</p>
                            @endif
                            <ul class="space-y-2 mb-4">
                                @foreach (($cap['items'] ?? []) as $li)
                                    <li class="flex gap-2 text-[14px] md:text-[15px] text-gray-700 leading-relaxed">
                                        <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                        <span>{{ $li }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            @if (! empty($cap['closing']))
                                <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed italic">{{ $cap['closing'] }}</p>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- Program Duration & Format --}}
    @if (! empty($d['duration']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-12">{{ $d['duration']['heading'] }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($d['duration']['cards'] as $c)
                        <div class="bg-[#f6f8fb] rounded-lg shadow-sm p-6 text-center">
                            @if (! empty($c['image']))
                                <img src="{{ $c['image'] }}" alt="{{ $c['title'] }}" class="w-16 h-16 object-contain mx-auto mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[16px] md:text-[18px] font-bold text-[#14166e] mb-3">{{ $c['title'] }}</h3>
                            <ul class="space-y-2 text-left">
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
            </div>
        </section>
    @endif

    {{-- Assessment Options --}}
    @if (! empty($d['assessment']))
        <section class="bg-[#f6f8fb] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug mb-3">{{ $d['assessment']['heading'] }}</h2>
                @if (! empty($d['assessment']['intro']))
                    <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-10">{{ $d['assessment']['intro'] }}</p>
                @endif
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($d['assessment']['options'] as $o)
                            <div class="bg-white rounded-lg p-6">
                                <h3 class="text-[16px] md:text-[18px] font-bold text-[#14166e] mb-4">{{ $o['title'] }}</h3>
                                <ul class="space-y-2">
                                    @foreach (($o['items'] ?? []) as $li)
                                        <li class="flex gap-2 text-[14px] md:text-[15px] text-gray-700 leading-relaxed">
                                            <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                            <span>{{ $li }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                    @if (! empty($d['assessment']['image']))
                        <div><img src="{{ $d['assessment']['image'] }}" alt="" class="w-full h-auto rounded-md" loading="lazy"></div>
                    @endif
                </div>
                @if (! empty($d['assessment']['closing']))
                    <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mt-10">{{ $d['assessment']['closing'] }}</p>
                @endif
            </div>
        </section>
    @endif

    {{-- Accreditation --}}
    @if (! empty($d['accreditation']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-5">{{ $d['accreditation']['heading'] }}</h2>
                @if (! empty($d['accreditation']['intro']))
                    <p class="text-[15px] md:text-[16px] text-gray-700 text-center leading-relaxed mb-10">{{ $d['accreditation']['intro'] }}</p>
                @endif
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-7 gap-6">
                    @foreach ($d['accreditation']['standards'] as $s)
                        <div class="bg-[#f6f8fb] rounded-lg p-5 text-center">
                            @if (! empty($s['image']))
                                <img src="{{ $s['image'] }}" alt="{{ $s['title'] }}" class="w-16 h-16 object-contain mx-auto mb-3" loading="lazy">
                            @else
                                <div class="w-16 h-16 mx-auto mb-3 rounded-full bg-[#14166e]/10 flex items-center justify-center text-[#14166e] font-bold text-[12px]">ISO</div>
                            @endif
                            <h3 class="text-[14px] md:text-[15px] font-bold text-[#14166e] mb-2">{{ $s['title'] }}</h3>
                            <p class="text-[12px] md:text-[13px] text-gray-700 leading-relaxed">{{ $s['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Diploma & Certification Awarded --}}
    @if (! empty($d['awards']))
        <section class="bg-[#f6f8fb] py-16 md:py-20">
            <div class="max-w-[1100px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-5">{{ $d['awards']['heading'] }}</h2>
                @if (! empty($d['awards']['intro']))
                    <p class="text-[15px] md:text-[16px] text-gray-700 text-center leading-relaxed mb-10">{{ $d['awards']['intro'] }}</p>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
                    @foreach ($d['awards']['cards'] as $c)
                        <div class="bg-white rounded-lg p-6 text-center">
                            @if (! empty($c['image']))
                                <img src="{{ $c['image'] }}" alt="{{ $c['title'] }}" class="w-16 h-16 object-contain mx-auto mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[16px] md:text-[18px] font-bold text-[#14166e] mb-3">{{ $c['title'] }}</h3>
                            <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $c['text'] }}</p>
                        </div>
                    @endforeach
                </div>
                @if (! empty($d['awards']['participants_items']))
                    <div class="bg-white rounded-lg p-6 max-w-[800px] mx-auto">
                        @if (! empty($d['awards']['participants_label']))
                            <h3 class="text-[16px] md:text-[18px] font-bold text-[#14166e] mb-3">{{ $d['awards']['participants_label'] }}</h3>
                        @endif
                        <ul class="space-y-2">
                            @foreach ($d['awards']['participants_items'] as $li)
                                <li class="flex gap-2 text-[14px] md:text-[15px] text-gray-700 leading-relaxed">
                                    <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                    <span>{{ $li }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- Career Pathways --}}
    @if (! empty($d['careers']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($d['careers']['image']))
                    <div><img src="{{ $d['careers']['image'] }}" alt="" class="w-full h-auto rounded-md" loading="lazy"></div>
                @endif
                <div>
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug mb-4">{{ $d['careers']['heading'] }}</h2>
                    @if (! empty($d['careers']['intro']))
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-6">{{ $d['careers']['intro'] }}</p>
                    @endif
                    <ul class="space-y-2">
                        @foreach ($d['careers']['items'] as $li)
                            <li class="flex gap-2 text-[15px] md:text-[16px] text-gray-700 leading-relaxed">
                                <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                <span>{{ $li }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    @endif

    {{-- Program Fee & Payment Options --}}
    @if (! empty($d['fees']))
        <section class="bg-[#f6f8fb] py-16 md:py-20">
            <div class="max-w-[1100px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-5">{{ $d['fees']['heading'] }}</h2>
                @if (! empty($d['fees']['intro']))
                    <p class="text-[15px] md:text-[16px] text-gray-700 text-center leading-relaxed mb-10">{{ $d['fees']['intro'] }}</p>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach ($d['fees']['cards'] as $c)
                        <div class="bg-white rounded-lg p-6">
                            @if (! empty($c['image']))
                                <img src="{{ $c['image'] }}" alt="{{ $c['title'] }}" class="w-16 h-16 object-contain mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[16px] md:text-[18px] font-bold text-[#14166e] mb-2">{{ $c['title'] }}</h3>
                            @if (! empty($c['subtitle']))
                                <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed mb-4">{{ $c['subtitle'] }}</p>
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
            </div>
        </section>
    @endif

    {{-- Training Delivery Locations --}}
    @if (! empty($d['delivery']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1100px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-12">{{ $d['delivery']['heading'] }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach ($d['delivery']['intro_blocks'] as $b)
                        <div class="bg-[#f6f8fb] rounded-lg p-6">
                            @if (! empty($b['image']))
                                <img src="{{ $b['image'] }}" alt="{{ $b['lead'] }}" class="w-16 h-16 object-contain mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[16px] md:text-[18px] font-bold text-[#14166e] mb-3">{{ $b['lead'] }}</h3>
                            <ul class="space-y-2">
                                @foreach (($b['items'] ?? []) as $li)
                                    <li class="flex gap-2 text-[14px] md:text-[15px] text-gray-700 leading-relaxed">
                                        <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
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

    {{-- Fee Table --}}
    @if (! empty($d['fee_table']))
        <section class="bg-[#f6f8fb] py-16 md:py-20">
            <div class="max-w-[1100px] mx-auto px-4 overflow-x-auto">
                <table class="w-full border-collapse text-left text-[14px] md:text-[15px]">
                    <thead>
                        <tr class="bg-[#14166e] text-white">
                            @foreach ($d['fee_table']['headers'] as $th)
                                <th class="px-4 py-3 font-semibold border border-[#14166e]">{{ $th }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($d['fee_table']['rows'] as $row)
                            <tr class="odd:bg-white even:bg-[#f6f8fb]">
                                @foreach ($row as $cell)
                                    <td class="px-4 py-3 align-top text-gray-700 leading-relaxed border border-gray-200">{{ $cell }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    @endif

    {{-- CTA buttons --}}
    @if (! empty($d['cta']) && ! empty($d['cta']['options']))
        @php($_accents = ['#5cb85c', '#f0ad4e', '#5bc0de'])
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($d['cta']['options'] as $i => $opt)
                        <div class="relative bg-white rounded-xl shadow-md p-6 pl-8 overflow-hidden">
                            <span class="absolute left-0 top-3 bottom-3 w-1.5 rounded-r-md" style="background-color: {{ $_accents[$i % count($_accents)] }};"></span>
                            <div class="flex items-center gap-3 mb-5">
                                <span class="flex-none w-10 h-10 rounded-full bg-[#5cb85c] flex items-center justify-center text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                </span>
                                <p class="text-[15px] md:text-[16px] font-bold text-[#14166e] leading-snug">{{ $opt['label'] }}</p>
                            </div>
                            <a href="{{ $opt['cta_href'] }}" class="inline-flex items-center gap-2 bg-[#1f7a1f] hover:bg-[#176317] text-white font-semibold text-[14px] md:text-[15px] px-6 py-3 rounded-full transition-colors">
                                <span>{{ $opt['cta_label'] }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-layouts.cms>
