<x-layouts.cms>
    <x-cms.seo-head :page="$page" />
    <x-cms.eltdf-title-bar :title="$page->title" :breadcrumbs="[['label' => $page->title]]" />

    @php($d = $page->page_data ?? [])

    {{-- Hero --}}
    @if (! empty($d['hero']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    @if (! empty($d['hero']['heading']))
                        <h2 class="text-[24px] md:text-[30px] font-bold text-[#14166e] leading-snug mb-5">{{ $d['hero']['heading'] }}</h2>
                    @endif
                    @if (! empty($d['hero']['tagline']))
                        <p class="text-[16px] md:text-[18px] text-[#5cb85c] font-semibold mb-4">{{ $d['hero']['tagline'] }}</p>
                    @endif
                    @foreach (($d['hero']['paragraphs'] ?? []) as $p)
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-4">{{ $p }}</p>
                    @endforeach
                </div>
                @if (! empty($d['hero']['image']))
                    <div><img src="{{ $d['hero']['image'] }}" alt="{{ $d['hero']['heading'] ?? '' }}" class="w-full h-auto rounded-md" loading="lazy"></div>
                @endif
            </div>
        </section>
    @endif

    {{-- Charters band --}}
    @if (! empty($d['charters']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($d['charters']['image']))
                    <div><img src="{{ $d['charters']['image'] }}" alt="" class="w-full h-auto rounded-md" loading="lazy"></div>
                @endif
                <div>
                    @foreach (($d['charters']['paragraphs'] ?? []) as $p)
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-4">{{ $p }}</p>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Why Go For --}}
    @if (! empty($d['why_go']))
        <section class="bg-[#14166e] py-16 md:py-20 text-white">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="text-[26px] md:text-[34px] font-bold uppercase leading-snug mb-6">{{ $d['why_go']['heading'] }}</h2>
                    @foreach (($d['why_go']['paragraphs'] ?? []) as $p)
                        <p class="text-[15px] md:text-[16px] leading-relaxed mb-4 text-white/90">{{ $p }}</p>
                    @endforeach
                </div>
                @if (! empty($d['why_go']['image']))
                    <div><img src="{{ $d['why_go']['image'] }}" alt="" class="w-full h-auto rounded-md" loading="lazy"></div>
                @endif
            </div>
        </section>
    @endif

    {{-- Core Responsibilities --}}
    @if (! empty($d['core_responsibilities']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                @if (! empty($d['core_responsibilities']['heading_top']))
                    <h2 class="text-[24px] md:text-[30px] font-bold text-[#14166e] leading-snug mb-5">{{ $d['core_responsibilities']['heading_top'] }}</h2>
                @endif
                @if (! empty($d['core_responsibilities']['intro']))
                    <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-12">{{ $d['core_responsibilities']['intro'] }}</p>
                @endif
                @if (! empty($d['core_responsibilities']['heading']))
                    <h3 class="text-[22px] md:text-[26px] font-bold text-[#14166e] uppercase text-center mb-10">{{ $d['core_responsibilities']['heading'] }}</h3>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($d['core_responsibilities']['items'] as $item)
                        <div class="bg-[#f5f7fa] rounded-lg p-7 relative">
                            <div class="text-[36px] md:text-[44px] font-bold text-[#5cb85c] leading-none mb-3">{{ $item['number'] }}</div>
                            <h4 class="text-[17px] md:text-[19px] font-bold text-[#14166e] mb-3">{{ $item['title'] }}</h4>
                            <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $item['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- About Exam --}}
    @if (! empty($d['about_exam']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-6">{{ $d['about_exam']['heading'] }}</h2>
                @if (! empty($d['about_exam']['intro']))
                    <p class="max-w-[1100px] mx-auto text-[15px] md:text-[16px] text-gray-700 text-center leading-relaxed mb-10">{{ $d['about_exam']['intro'] }}</p>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
                    @if (! empty($d['about_exam']['image']))
                        <div><img src="{{ $d['about_exam']['image'] }}" alt="" class="w-full h-auto rounded-md" loading="lazy"></div>
                    @endif
                    <div>
                        @if (! empty($d['about_exam']['list_heading']))
                            <h3 class="text-[20px] md:text-[22px] font-bold text-[#14166e] mb-4">{{ $d['about_exam']['list_heading'] }}</h3>
                        @endif
                        <ul class="space-y-2">
                            @foreach ($d['about_exam']['bullets'] as $b)
                                <li class="flex gap-3">
                                    <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                    <span class="text-[15px] md:text-[16px] text-gray-700">{{ $b }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @if (! empty($d['about_exam']['closing']))
                    <p class="max-w-[1100px] mx-auto text-[15px] md:text-[16px] text-gray-700 leading-relaxed mt-10">{{ $d['about_exam']['closing'] }}</p>
                @endif
                @if (! empty($d['about_exam']['topics_heading']))
                    <h3 class="text-[20px] md:text-[22px] font-bold text-[#14166e] mt-10 mb-5">{{ $d['about_exam']['topics_heading'] }}</h3>
                @endif
                @if (! empty($d['about_exam']['topics']))
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-2">
                        @foreach ($d['about_exam']['topics'] as $t)
                            <li class="flex gap-3">
                                <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                <span class="text-[15px] md:text-[16px] text-gray-700">{{ $t }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </section>
    @endif

    {{-- Who Benefit --}}
    @if (! empty($d['who_benefit']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-6">{{ $d['who_benefit']['heading'] }}</h2>
                @if (! empty($d['who_benefit']['intro']))
                    <p class="max-w-[1100px] mx-auto text-[15px] md:text-[16px] text-gray-700 text-center leading-relaxed mb-12">{{ $d['who_benefit']['intro'] }}</p>
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

    {{-- Why You Benefit --}}
    @if (! empty($d['why_you_benefit']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="text-[24px] md:text-[30px] font-bold text-[#14166e] leading-snug mb-5">{{ $d['why_you_benefit']['heading'] }}</h2>
                    @foreach (($d['why_you_benefit']['paragraphs'] ?? []) as $p)
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-4">{{ $p }}</p>
                    @endforeach
                </div>
                @if (! empty($d['why_you_benefit']['image']))
                    <div><img src="{{ $d['why_you_benefit']['image'] }}" alt="" class="w-full h-auto rounded-md" loading="lazy"></div>
                @endif
            </div>
        </section>
    @endif

    {{-- Market Share --}}
    @if (! empty($d['market_share']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug mb-6">{{ $d['market_share']['heading'] }}</h2>
                @foreach (($d['market_share']['paragraphs'] ?? []) as $p)
                    <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-4">{{ $p }}</p>
                @endforeach
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

    {{-- Training --}}
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
