<x-layouts.cms>
    <x-cms.seo-head :page="$page" />
    <x-cms.eltdf-title-bar :title="$page->title" :breadcrumbs="[['label' => $page->title]]" />

    @php($d = $page->page_data ?? [])

    {{-- Intro --}}
    @if (! empty($d['intro']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug mb-5">{{ $d['intro']['heading'] }}</h2>
                    <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $d['intro']['paragraph'] }}</p>
                </div>
                @if (! empty($d['intro']['image']))
                    <div><img src="{{ $d['intro']['image'] }}" alt="{{ $d['intro']['heading'] }}" class="w-full h-auto"></div>
                @endif
            </div>
        </section>
    @endif

    {{-- Core Components --}}
    @if (! empty($d['core_components']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-12">{{ $d['core_components']['heading'] }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    @foreach ($d['core_components']['cards'] as $c)
                        <div class="bg-white rounded-lg shadow-sm p-8">
                            @if (! empty($c['image']))
                                <img src="{{ $c['image'] }}" alt="{{ $c['title'] }}" class="w-20 h-20 object-contain mb-5">
                            @endif
                            <h3 class="text-[20px] md:text-[22px] font-bold text-[#14166e] mb-4">{{ $c['title'] }}</h3>
                            @if (! empty($c['definition']))
                                <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-3">{{ $c['definition'] }}</p>
                            @endif
                            @if (! empty($c['key_label']))
                                <p class="text-[15px] md:text-[16px] text-gray-800 font-semibold mb-3">{{ $c['key_label'] }}</p>
                            @endif
                            @if (! empty($c['key_items']))
                                <ul class="space-y-3">
                                    @foreach ($c['key_items'] as $li)
                                        <li class="flex gap-3">
                                            <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                            <span class="text-[15px] md:text-[16px] text-gray-700">{{ $li }}</span>
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

    {{-- Importance --}}
    @if (! empty($d['importance']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-12">{{ $d['importance']['heading'] }}</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($d['importance']['cards'] as $c)
                        <div class="text-center px-4">
                            @if (! empty($c['icon']))
                                <img src="{{ $c['icon'] }}" alt="{{ $c['title'] }}" class="w-20 h-20 object-contain mx-auto mb-5">
                            @endif
                            <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-3">{{ $c['title'] }}</h3>
                            <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $c['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Key Functions --}}
    @if (! empty($d['key_functions']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-12">{{ $d['key_functions']['heading'] }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($d['key_functions']['groups'] as $g)
                        <div class="bg-white rounded-lg shadow-sm p-7">
                            <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-4">{{ $g['title'] }}</h3>
                            <ul class="space-y-3">
                                @foreach ($g['items'] as $li)
                                    <li class="flex gap-3">
                                        <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                        <span class="text-[15px] md:text-[16px] text-gray-700">{{ $li }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Technologies --}}
    @if (! empty($d['technologies']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-12">{{ $d['technologies']['heading'] }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($d['technologies']['cards'] as $c)
                        <div class="bg-[#f5f7fa] rounded-lg p-7 text-center">
                            @if (! empty($c['image']))
                                <img src="{{ $c['image'] }}" alt="{{ $c['title'] }}" class="w-16 h-16 object-contain mx-auto mb-4">
                            @endif
                            <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-4">{{ $c['title'] }}</h3>
                            <ul class="space-y-2 text-left">
                                @foreach ($c['items'] as $li)
                                    <li class="flex gap-3">
                                        <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                        <span class="text-[15px] md:text-[16px] text-gray-700">{{ $li }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Frameworks --}}
    @if (! empty($d['frameworks']))
        <section class="bg-[#14166e] py-16 md:py-20 text-white">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[34px] font-bold uppercase text-center mb-12">{{ $d['frameworks']['heading'] }}</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach ($d['frameworks']['cards'] as $c)
                        <div class="bg-white text-gray-800 rounded-lg p-6 text-center">
                            @if (! empty($c['image']))
                                <img src="{{ $c['image'] }}" alt="{{ $c['title'] }}" class="w-16 h-16 object-contain mx-auto mb-4">
                            @endif
                            <h3 class="text-[18px] md:text-[19px] font-bold text-[#14166e] mb-3">{{ $c['title'] }}</h3>
                            <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $c['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Challenges --}}
    @if (! empty($d['challenges']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-12">{{ $d['challenges']['heading'] }}</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach ($d['challenges']['cards'] as $c)
                        <div class="text-center px-4">
                            @if (! empty($c['icon']))
                                <img src="{{ $c['icon'] }}" alt="{{ $c['title'] }}" class="w-16 h-16 object-contain mx-auto mb-4">
                            @endif
                            <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-3">{{ $c['title'] }}</h3>
                            <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $c['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Skills --}}
    @if (! empty($d['skills']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-12">{{ $d['skills']['heading'] }}</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($d['skills']['cards'] as $c)
                        <div class="bg-white rounded-lg shadow-sm p-7 text-center">
                            @if (! empty($c['icon']))
                                <img src="{{ $c['icon'] }}" alt="{{ $c['title'] }}" class="w-16 h-16 object-contain mx-auto mb-4">
                            @endif
                            <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-3">{{ $c['title'] }}</h3>
                            <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $c['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Trends --}}
    @if (! empty($d['trends']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-12">{{ $d['trends']['heading'] }}</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach ($d['trends']['cards'] as $c)
                        <div class="text-center px-4">
                            @if (! empty($c['icon']))
                                <img src="{{ $c['icon'] }}" alt="{{ $c['title'] }}" class="w-16 h-16 object-contain mx-auto mb-4">
                            @endif
                            <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-3">{{ $c['title'] }}</h3>
                            <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $c['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- KPIs --}}
    @if (! empty($d['kpis']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($d['kpis']['image']))
                    <div><img src="{{ $d['kpis']['image'] }}" alt="{{ $d['kpis']['heading'] }}" class="w-full h-auto"></div>
                @endif
                <div>
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug mb-6">{{ $d['kpis']['heading'] }}</h2>
                    <div class="space-y-5">
                        @foreach ($d['kpis']['items'] as $k)
                            <div>
                                <h3 class="text-[17px] md:text-[18px] font-bold text-[#14166e] mb-1">{{ $k['title'] }}</h3>
                                <ul class="space-y-1">
                                    <li class="flex gap-3">
                                        <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                        <span class="text-[15px] md:text-[16px] text-gray-700">{{ $k['text'] }}</span>
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Future --}}
    @if (! empty($d['future']))
        <section class="bg-[#14166e] py-16 md:py-20 text-white">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[34px] font-bold uppercase text-center mb-12">{{ $d['future']['heading'] }}</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach ($d['future']['cards'] as $c)
                        <div class="bg-white text-gray-800 rounded-lg p-6 text-center">
                            @if (! empty($c['icon']))
                                <img src="{{ $c['icon'] }}" alt="{{ $c['title'] }}" class="w-16 h-16 object-contain mx-auto mb-4">
                            @endif
                            <h3 class="text-[18px] md:text-[19px] font-bold text-[#14166e] mb-3">{{ $c['title'] }}</h3>
                            <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $c['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Exam Details --}}
    @if (! empty($d['exam_details']['rows']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1000px] mx-auto px-4">
                <div class="overflow-hidden border border-gray-200 rounded-lg">
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
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($d['training_options']['options'] as $o)
                    <div class="bg-white rounded-lg shadow-sm p-8 flex flex-col">
                        <div class="flex gap-4 mb-6">
                            @if (! empty($d['training_options']['check_icon']))
                                <img src="{{ $d['training_options']['check_icon'] }}" alt="" class="w-8 h-8 object-contain shrink-0">
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
