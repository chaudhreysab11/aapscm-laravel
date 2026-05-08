<x-layouts.cms>
    <x-cms.seo-head :page="$page" />
    <x-cms.eltdf-title-bar :title="$page->title" :breadcrumbs="[['label' => $page->title]]" />

    @php($d = $page->page_data ?? [])

    {{-- Hero / Why Choose --}}
    @if (! empty($d['hero']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($d['hero']['image']))
                    <div><img src="{{ $d['hero']['image'] }}" alt="{{ $d['hero']['heading'] ?? '' }}" class="w-full h-auto rounded-md" loading="lazy"></div>
                @endif
                <div>
                    @if (! empty($d['hero']['heading']))
                        <h2 class="text-[24px] md:text-[30px] font-bold text-[#14166e] leading-snug mb-5">{{ $d['hero']['heading'] }}</h2>
                    @endif
                    @foreach (($d['hero']['paragraphs'] ?? []) as $p)
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-4">{{ $p }}</p>
                    @endforeach
                </div>
            </div>
            @if (! empty($d['hero']['image_bottom']) || ! empty($d['hero']['paragraph_bottom']))
                <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center mt-10">
                    @if (! empty($d['hero']['image_bottom']))
                        <div class="md:order-2"><img src="{{ $d['hero']['image_bottom'] }}" alt="" class="w-full h-auto rounded-md" loading="lazy"></div>
                    @endif
                    @if (! empty($d['hero']['paragraph_bottom']))
                        <div class="md:order-1"><p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $d['hero']['paragraph_bottom'] }}</p></div>
                    @endif
                </div>
            @endif
        </section>
    @endif

    {{-- Why Different --}}
    @if (! empty($d['why_different']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-4">{{ $d['why_different']['heading'] }}</h2>
                @if (! empty($d['why_different']['intro']))
                    <p class="max-w-[1000px] mx-auto text-[15px] md:text-[16px] text-gray-700 text-center leading-relaxed mb-6">{{ $d['why_different']['intro'] }}</p>
                @endif
                @if (! empty($d['why_different']['intro2']))
                    <p class="max-w-[1000px] mx-auto text-[15px] md:text-[16px] text-gray-700 text-center leading-relaxed mb-10 font-semibold">{{ $d['why_different']['intro2'] }}</p>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($d['why_different']['items'] as $it)
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <div class="flex gap-3 items-start mb-3">
                                @if (! empty($it['icon']))
                                    <img src="{{ $it['icon'] }}" alt="" class="w-6 h-6 mt-[2px] object-contain shrink-0">
                                @else
                                    <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                @endif
                                <h3 class="text-[17px] md:text-[19px] font-bold text-[#14166e]">{{ $it['title'] }}</h3>
                            </div>
                            <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $it['text'] }}</p>
                        </div>
                    @endforeach
                </div>
                @if (! empty($d['why_different']['closing']))
                    <p class="max-w-[1000px] mx-auto text-[15px] md:text-[16px] text-gray-700 text-center leading-relaxed mt-10">{{ $d['why_different']['closing'] }}</p>
                @endif
            </div>
        </section>
    @endif

    {{-- About Exam --}}
    @if (! empty($d['about_exam']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="text-[24px] md:text-[30px] font-bold text-[#14166e] leading-snug mb-5">{{ $d['about_exam']['heading'] }}</h2>
                    @if (! empty($d['about_exam']['paragraph']))
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-5">{{ $d['about_exam']['paragraph'] }}</p>
                    @endif
                    @if (! empty($d['about_exam']['format_heading']))
                        <p class="text-[16px] md:text-[18px] font-bold text-[#14166e] mb-3">{{ $d['about_exam']['format_heading'] }}</p>
                    @endif
                    @if (! empty($d['about_exam']['format_bullets']))
                        <ul class="space-y-2">
                            @foreach ($d['about_exam']['format_bullets'] as $b)
                                <li class="flex gap-3">
                                    <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                    <span class="text-[15px] md:text-[16px] text-gray-700">{!! $b !!}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                @if (! empty($d['about_exam']['image']))
                    <div><img src="{{ $d['about_exam']['image'] }}" alt="" class="w-full h-auto rounded-md" loading="lazy"></div>
                @endif
            </div>
        </section>
    @endif

    {{-- Foundational Topics --}}
    @if (! empty($d['foundational_topics']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-4">{{ $d['foundational_topics']['heading'] }}</h2>
                @if (! empty($d['foundational_topics']['intro']))
                    <p class="max-w-[1000px] mx-auto text-[15px] md:text-[16px] text-gray-700 text-center leading-relaxed mb-12">{{ $d['foundational_topics']['intro'] }}</p>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach ($d['foundational_topics']['items'] as $t)
                        <div class="bg-white rounded-lg shadow-sm p-7">
                            @if (! empty($t['image']))
                                <img src="{{ $t['image'] }}" alt="{{ $t['title'] }}" class="w-14 h-14 object-contain mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-4">{{ $t['title'] }}</h3>
                            <ul class="space-y-2">
                                @foreach (($t['bullets'] ?? []) as $b)
                                    <li class="flex gap-3">
                                        <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                        <span class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{!! $b !!}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Prep Resources --}}
    @if (! empty($d['prep_resources']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-4">{{ $d['prep_resources']['heading'] }}</h2>
                @if (! empty($d['prep_resources']['intro']))
                    <p class="max-w-[1000px] mx-auto text-[15px] md:text-[16px] text-gray-700 text-center leading-relaxed mb-10">{{ $d['prep_resources']['intro'] }}</p>
                @endif
                <ul class="max-w-[1000px] mx-auto grid grid-cols-1 md:grid-cols-2 gap-5">
                    @foreach ($d['prep_resources']['items'] as $item)
                        <li class="flex gap-3 bg-[#f5f7fa] rounded-md shadow-sm px-5 py-4">
                            @if (! empty($d['prep_resources']['check_icon']))
                                <img src="{{ $d['prep_resources']['check_icon'] }}" alt="" class="w-5 h-5 mt-[3px] object-contain shrink-0">
                            @else
                                <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                            @endif
                            <span class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif

    {{-- Why Take Exam --}}
    @if (! empty($d['why_take_exam']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($d['why_take_exam']['image']))
                    <div><img src="{{ $d['why_take_exam']['image'] }}" alt="" class="w-full h-auto rounded-md" loading="lazy"></div>
                @endif
                <div>
                    <h2 class="text-[24px] md:text-[30px] font-bold text-[#14166e] leading-snug mb-5">{{ $d['why_take_exam']['heading'] }}</h2>
                    @if (! empty($d['why_take_exam']['intro']))
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-5">{{ $d['why_take_exam']['intro'] }}</p>
                    @endif
                    @if (! empty($d['why_take_exam']['bullets']))
                        <ul class="space-y-2 mb-5">
                            @foreach ($d['why_take_exam']['bullets'] as $b)
                                <li class="flex gap-3">
                                    <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                    <span class="text-[15px] md:text-[16px] text-gray-700">{{ $b }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    @if (! empty($d['why_take_exam']['closing']))
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $d['why_take_exam']['closing'] }}</p>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- Certification Journey --}}
    @if (! empty($d['certification_journey']))
        <section class="bg-[#14166e] py-14 md:py-16 text-white">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <p class="text-[16px] md:text-[18px] leading-relaxed">{{ $d['certification_journey'] }}</p>
            </div>
        </section>
    @endif

    {{-- Who Benefit --}}
    @if (! empty($d['who_benefit']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                @if (! empty($d['who_benefit']['eyebrow']))
                    <p class="text-center text-[14px] md:text-[15px] uppercase tracking-wider text-[#5cb85c] font-semibold mb-3">{{ $d['who_benefit']['eyebrow'] }}</p>
                @endif
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-4">{{ $d['who_benefit']['heading'] }}</h2>
                @if (! empty($d['who_benefit']['intro']))
                    <p class="max-w-[1000px] mx-auto text-[15px] md:text-[16px] text-gray-700 text-center leading-relaxed mb-10">{{ $d['who_benefit']['intro'] }}</p>
                @endif
                @if (! empty($d['who_benefit']['subheading']))
                    <h3 class="text-[20px] md:text-[24px] font-bold text-[#14166e] text-center mb-10">{{ $d['who_benefit']['subheading'] }}</h3>
                @endif
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($d['who_benefit']['items'] as $c)
                        <div class="bg-[#f5f7fa] rounded-lg p-7">
                            @if (! empty($c['image']))
                                <img src="{{ $c['image'] }}" alt="{{ $c['title'] }}" class="w-16 h-16 object-contain mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-3">{{ $c['title'] }}</h3>
                            <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $c['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Why Right For You --}}
    @if (! empty($d['why_right_for_you']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug mb-6">{{ $d['why_right_for_you']['heading'] }}</h2>
                @foreach (($d['why_right_for_you']['paragraphs'] ?? []) as $p)
                    <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-4">{{ $p }}</p>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Why Benefit (source cards) --}}
    @if (! empty($d['why_benefit']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-6">{{ $d['why_benefit']['heading'] }}</h2>
                @if (! empty($d['why_benefit']['intro']))
                    <p class="max-w-[1000px] mx-auto text-[15px] md:text-[16px] text-gray-700 text-center leading-relaxed mb-12">{{ $d['why_benefit']['intro'] }}</p>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach ($d['why_benefit']['sources'] as $s)
                        <div class="bg-[#f5f7fa] rounded-lg p-7">
                            @if (! empty($s['image']))
                                <img src="{{ $s['image'] }}" alt="{{ $s['title'] }}" class="w-16 h-16 object-contain mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-3">{{ $s['title'] }}</h3>
                            <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $s['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Exam Details --}}
    @if (! empty($d['exam_details']['rows']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
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
                @if (! empty($d['exam_details']['flyer_href']))
                    <div class="text-center mt-8">
                        <a href="{{ $d['exam_details']['flyer_href'] }}" target="_blank" rel="noopener" class="inline-block bg-[#5cb85c] hover:bg-[#4cae4c] text-white font-semibold text-[15px] px-8 py-3 rounded-full transition">{{ $d['exam_details']['flyer_label'] ?? 'Download Flyer' }}</a>
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- Training Options --}}
    @if (! empty($d['training_options']['options']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($d['training_options']['options'] as $o)
                    <div class="bg-[#f5f7fa] rounded-lg shadow-sm p-8 flex flex-col">
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
