<x-layouts.cms>
    <x-cms.seo-head :page="$page" />
    <x-cms.eltdf-title-bar :title="$page->title" :breadcrumbs="[['label' => $page->title]]" />

    @php($d = $page->page_data ?? [])

    {{-- Intro --}}
    @if (! empty($d['intro']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    @if (! empty($d['intro']['title_heading']))
                        <h2 class="text-[24px] md:text-[30px] font-bold text-[#14166e] uppercase leading-snug mb-4">{{ $d['intro']['title_heading'] }}</h2>
                    @endif
                    @if (! empty($d['intro']['what_heading']))
                        <h3 class="text-[22px] md:text-[26px] font-bold text-[#14166e] mb-5">{{ $d['intro']['what_heading'] }}</h3>
                    @endif
                    @foreach (($d['intro']['paragraphs'] ?? []) as $p)
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-4">{{ $p }}</p>
                    @endforeach
                </div>
                @if (! empty($d['intro']['image']))
                    <div><img src="{{ $d['intro']['image'] }}" alt="{{ $d['intro']['title_heading'] ?? '' }}" class="w-full h-auto" loading="lazy"></div>
                @endif
            </div>
        </section>
    @endif

    {{-- Key Features --}}
    @if (! empty($d['key_features']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                @if (! empty($d['key_features']['heading']))
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-12">{{ $d['key_features']['heading'] }}</h2>
                @endif
                @foreach (($d['key_features']['groups'] ?? []) as $g)
                    <div class="mb-12 last:mb-0">
                        @if (! empty($g['subheading']))
                            <h3 class="text-[20px] md:text-[22px] font-bold text-[#14166e] mb-6">{{ $g['subheading'] }}</h3>
                        @endif
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            @foreach (($g['cards'] ?? []) as $c)
                                <div class="bg-white rounded-lg shadow-sm p-7 text-center">
                                    @if (! empty($c['image']))
                                        <img src="{{ $c['image'] }}" alt="{{ $c['title'] }}" class="w-16 h-16 object-contain mx-auto mb-4" loading="lazy">
                                    @endif
                                    <h4 class="text-[17px] md:text-[19px] font-bold text-[#14166e] mb-3">{{ $c['title'] }}</h4>
                                    <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $c['text'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Why Choose --}}
    @if (! empty($d['why_choose']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-12">{{ $d['why_choose']['heading'] }}</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($d['why_choose']['items'] as $c)
                        <div class="bg-[#f5f7fa] rounded-lg p-7 text-center">
                            @if (! empty($c['image']))
                                <img src="{{ $c['image'] }}" alt="{{ $c['title'] }}" class="w-16 h-16 object-contain mx-auto mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-3">{{ $c['title'] }}</h3>
                            <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $c['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Technologies --}}
    @if (! empty($d['technologies']))
        <section class="bg-[#14166e] py-16 md:py-20 text-white">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[34px] font-bold uppercase text-center mb-4">{{ $d['technologies']['heading'] }}</h2>
                @if (! empty($d['technologies']['intro']))
                    <p class="text-[15px] md:text-[16px] text-center mb-12 leading-relaxed">{{ $d['technologies']['intro'] }}</p>
                @endif
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($d['technologies']['items'] as $c)
                        <div class="bg-white text-gray-800 rounded-lg p-6 text-center">
                            @if (! empty($c['image']))
                                <img src="{{ $c['image'] }}" alt="{{ $c['title'] }}" class="w-16 h-16 object-contain mx-auto mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-3">{{ $c['title'] }}</h3>
                            <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $c['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Future Trends --}}
    @if (! empty($d['future_trends']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-4">{{ $d['future_trends']['heading'] }}</h2>
                @if (! empty($d['future_trends']['intro']))
                    <p class="text-[15px] md:text-[16px] text-gray-700 text-center mb-12 leading-relaxed">{{ $d['future_trends']['intro'] }}</p>
                @endif
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach ($d['future_trends']['items'] as $c)
                        <div class="text-center px-4">
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

    {{-- Challenges --}}
    @if (! empty($d['challenges']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-4">{{ $d['challenges']['heading'] }}</h2>
                @if (! empty($d['challenges']['intro']))
                    <p class="text-[15px] md:text-[16px] text-gray-700 text-center mb-12 leading-relaxed">{{ $d['challenges']['intro'] }}</p>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($d['challenges']['items'] as $c)
                        <div class="bg-white rounded-lg shadow-sm p-7 text-center">
                            @if (! empty($c['image']))
                                <img src="{{ $c['image'] }}" alt="{{ $c['title'] }}" class="w-16 h-16 object-contain mx-auto mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-3">{{ $c['title'] }}</h3>
                            <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $c['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- KPIs --}}
    @if (! empty($d['kpis']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-4">{{ $d['kpis']['heading'] }}</h2>
                @if (! empty($d['kpis']['intro']))
                    <p class="text-[15px] md:text-[16px] text-gray-700 text-center mb-12 leading-relaxed">{{ $d['kpis']['intro'] }}</p>
                @endif
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($d['kpis']['items'] as $c)
                        <div class="bg-[#f5f7fa] rounded-lg p-7 text-center">
                            @if (! empty($c['icon']))
                                <img src="{{ $c['icon'] }}" alt="{{ $c['title'] }}" class="w-14 h-14 object-contain mx-auto mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-3">{{ $c['title'] }}</h3>
                            <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $c['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Core Competencies --}}
    @if (! empty($d['core_competencies']))
        <section class="bg-[#14166e] py-16 md:py-20 text-white">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[34px] font-bold uppercase text-center mb-12">{{ $d['core_competencies']['heading'] }}</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($d['core_competencies']['items'] as $c)
                        <div class="bg-white text-gray-800 rounded-lg p-6 text-center">
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

    {{-- Transform --}}
    @if (! empty($d['transform']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($d['transform']['image']))
                    <div><img src="{{ $d['transform']['image'] }}" alt="{{ $d['transform']['heading'] ?? '' }}" class="w-full h-auto rounded-md" loading="lazy"></div>
                @endif
                <div>
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug mb-6">{{ $d['transform']['heading'] }}</h2>
                    @foreach (($d['transform']['paragraphs'] ?? []) as $p)
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-4">{{ $p }}</p>
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
