<x-layouts.cms>
    <x-cms.seo-head :page="$page" />
    <x-cms.eltdf-title-bar :title="$page->title" :breadcrumbs="[['label' => $page->title]]" />

    @php($d = $page->page_data ?? [])

    {{-- Hero --}}
    @if (! empty($d['hero']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($d['hero']['image']))
                    <div><img src="{{ $d['hero']['image'] }}" alt="{{ $d['hero']['heading'] ?? '' }}" class="w-full h-auto rounded-md" loading="lazy"></div>
                @endif
                <div>
                    @if (! empty($d['hero']['heading']))
                        <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug mb-3">{{ $d['hero']['heading'] }}</h2>
                    @endif
                    @if (! empty($d['hero']['tagline']))
                        <p class="text-[18px] md:text-[20px] text-[#5cb85c] font-semibold mb-5">{{ $d['hero']['tagline'] }}</p>
                    @endif
                    @foreach (($d['hero']['paragraphs'] ?? []) as $p)
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-4">{{ $p }}</p>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Challenges --}}
    @if (! empty($d['challenges']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach ($d['challenges']['items'] as $c)
                        <div class="bg-white rounded-lg shadow-sm p-6 text-center">
                            @if (! empty($c['image']))
                                <img src="{{ $c['image'] }}" alt="{{ $c['title'] }}" class="w-16 h-16 object-contain mx-auto mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[17px] md:text-[19px] font-bold text-[#14166e] mb-3">{{ $c['title'] }}</h3>
                            <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $c['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Solutions intro + cards --}}
    @if (! empty($d['solutions']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                @if (! empty($d['solutions']['intro']))
                    <p class="max-w-[1100px] mx-auto text-[15px] md:text-[16px] text-gray-700 text-center leading-relaxed mb-12">{{ $d['solutions']['intro'] }}</p>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($d['solutions']['items'] as $s)
                        <div class="bg-[#f5f7fa] rounded-lg p-7 text-center">
                            @if (! empty($s['image']))
                                <img src="{{ $s['image'] }}" alt="{{ $s['title'] }}" class="w-16 h-16 object-contain mx-auto mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-3">{{ $s['title'] }}</h3>
                            <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $s['text'] }}</p>
                        </div>
                    @endforeach
                </div>
                @if (! empty($d['solutions']['closing']))
                    <p class="max-w-[1100px] mx-auto text-[15px] md:text-[16px] text-gray-700 text-center leading-relaxed mt-10">{{ $d['solutions']['closing'] }}</p>
                @endif
            </div>
        </section>
    @endif

    {{-- Importance / Key Features --}}
    @if (! empty($d['importance']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-6">{{ $d['importance']['heading'] }}</h2>
                @if (! empty($d['importance']['intro']))
                    <p class="max-w-[1100px] mx-auto text-[15px] md:text-[16px] text-gray-700 text-center leading-relaxed mb-12">{{ $d['importance']['intro'] }}</p>
                @endif
                @if (! empty($d['importance']['features_heading']))
                    <h3 class="text-[22px] md:text-[26px] font-bold text-[#14166e] uppercase text-center mb-10">{{ $d['importance']['features_heading'] }}</h3>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($d['importance']['features'] as $f)
                        <div class="bg-white rounded-lg shadow-sm p-7">
                            @if (! empty($f['image']))
                                <img src="{{ $f['image'] }}" alt="{{ $f['title'] }}" class="w-14 h-14 object-contain mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-4">{{ $f['title'] }}</h3>
                            <ul class="space-y-2">
                                @foreach (($f['bullets'] ?? []) as $b)
                                    <li class="flex gap-3">
                                        <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                        <span class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $b }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Benefits --}}
    @if (! empty($d['benefits']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-12">{{ $d['benefits']['heading'] }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($d['benefits']['items'] as $b)
                        <div class="bg-[#f5f7fa] rounded-lg p-7 text-center">
                            @if (! empty($b['image']))
                                <img src="{{ $b['image'] }}" alt="{{ $b['title'] }}" class="w-16 h-16 object-contain mx-auto mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-3">{{ $b['title'] }}</h3>
                            <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $b['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Technology Examples --}}
    @if (! empty($d['technologies']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-12">{{ $d['technologies']['heading'] }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($d['technologies']['items'] as $t)
                        <div class="bg-white rounded-lg shadow-sm p-7">
                            <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-3">{{ $t['title'] }}</h3>
                            <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $t['text'] }}</p>
                        </div>
                    @endforeach
                </div>
                @if (! empty($d['technologies']['closing']))
                    <p class="max-w-[1100px] mx-auto text-[15px] md:text-[16px] text-gray-700 text-center leading-relaxed mt-10">{{ $d['technologies']['closing'] }}</p>
                @endif
            </div>
        </section>
    @endif

    {{-- Why Go (navy) --}}
    @if (! empty($d['why_go']))
        <section class="bg-[#14166e] py-16 md:py-20 text-white">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h2 class="text-[26px] md:text-[34px] font-bold uppercase leading-snug mb-8">{{ $d['why_go']['heading'] }}</h2>
                @foreach (($d['why_go']['paragraphs'] ?? []) as $p)
                    <p class="text-[15px] md:text-[16px] leading-relaxed mb-4 text-white/90">{{ $p }}</p>
                @endforeach
                @if (! empty($d['why_go']['cta_href']))
                    <div class="mt-8">
                        <a href="{{ $d['why_go']['cta_href'] }}" class="inline-block bg-[#5cb85c] hover:bg-[#4cae4c] text-white font-semibold text-[15px] px-8 py-3 rounded-full transition">{{ $d['why_go']['cta_label'] ?? 'Buy Exam Now' }}</a>
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- About Exam --}}
    @if (! empty($d['about_exam']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($d['about_exam']['image']))
                    <div><img src="{{ $d['about_exam']['image'] }}" alt="" class="w-full h-auto rounded-md" loading="lazy"></div>
                @endif
                <div>
                    <h2 class="text-[24px] md:text-[30px] font-bold text-[#14166e] leading-snug mb-5">{{ $d['about_exam']['heading'] }}</h2>
                    @foreach (($d['about_exam']['paragraphs'] ?? []) as $p)
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-4">{{ $p }}</p>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Exam Topics --}}
    @if (! empty($d['exam_topics']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($d['exam_topics']['items'] as $t)
                        <div class="bg-white rounded-lg shadow-sm p-7">
                            @if (! empty($t['image']))
                                <img src="{{ $t['image'] }}" alt="{{ $t['title'] }}" class="w-14 h-14 object-contain mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-3">{{ $t['title'] }}</h3>
                            <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $t['text'] }}</p>
                        </div>
                    @endforeach
                </div>
                @if (! empty($d['exam_topics']['closing']))
                    <p class="max-w-[1100px] mx-auto text-[15px] md:text-[16px] text-gray-700 text-center leading-relaxed mt-10">{{ $d['exam_topics']['closing'] }}</p>
                @endif
            </div>
        </section>
    @endif

    {{-- Exam Details --}}
    @if (! empty($d['exam_details']['rows']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1000px] mx-auto px-4">
                <div class="overflow-hidden border border-gray-200 rounded-lg bg-white">
                    <table class="w-full text-left border-collapse">
                        <tbody>
                            @foreach ($d['exam_details']['rows'] as $row)
                                <tr class="border-b border-gray-200 last:border-0">
                                    <th class="bg-[#f0f3f9] text-[#14166e] font-semibold align-top px-5 py-4 w-[35%] text-[15px] md:text-[16px]">{{ $row['label'] }}</th>
                                    <td class="px-5 py-4 text-[15px] md:text-[16px] text-gray-700">{{ $row['value'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    @endif

    {{-- Training --}}
    @if (! empty($d['training_options']['options']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($d['training_options']['options'] as $o)
                    <div class="bg-white rounded-lg shadow-sm p-8 flex flex-col">
                        <div class="flex gap-4 mb-6">
                            @if (! empty($d['training_options']['check_icon']))
                                <img src="{{ $d['training_options']['check_icon'] }}" alt="" class="w-6 h-6 mt-1 object-contain">
                            @endif
                            <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $o['text'] }}</p>
                        </div>
                        <div class="mt-auto">
                            <a href="{{ $o['cta_href'] }}" class="inline-block bg-[#5cb85c] hover:bg-[#4cae4c] text-white font-semibold text-[15px] px-8 py-3 rounded-full transition">{{ $o['cta_label'] }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

</x-layouts.cms>
