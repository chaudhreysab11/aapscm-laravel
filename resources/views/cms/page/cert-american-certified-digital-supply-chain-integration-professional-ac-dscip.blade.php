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
                        <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug mb-5">{{ $d['hero']['heading'] }}</h2>
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

    {{-- Why Choose --}}
    @if (! empty($d['why_choose']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-4">{{ $d['why_choose']['heading'] }}</h2>
                @if (! empty($d['why_choose']['intro']))
                    <p class="max-w-[1100px] mx-auto text-[15px] md:text-[16px] text-gray-700 text-center leading-relaxed mb-12">{{ $d['why_choose']['intro'] }}</p>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach ($d['why_choose']['items'] as $c)
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

    {{-- What You'll Learn --}}
    @if (! empty($d['what_youll_learn']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-12">{{ $d['what_youll_learn']['heading'] }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($d['what_youll_learn']['items'] as $c)
                        <div class="bg-[#f5f7fa] rounded-lg p-7 text-center">
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

    {{-- Who Should Enroll --}}
    @if (! empty($d['who_enroll']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-4">{{ $d['who_enroll']['heading'] }}</h2>
                @if (! empty($d['who_enroll']['intro']))
                    <p class="max-w-[1100px] mx-auto text-[15px] md:text-[16px] text-gray-700 text-center leading-relaxed mb-12">{{ $d['who_enroll']['intro'] }}</p>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach ($d['who_enroll']['items'] as $c)
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

    {{-- Program Highlights --}}
    @if (! empty($d['program_highlights']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-12">{{ $d['program_highlights']['heading'] }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($d['program_highlights']['items'] as $c)
                        <div class="bg-[#f5f7fa] rounded-lg p-7 text-center">
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

    {{-- Why Essential / Key Benefits --}}
    @if (! empty($d['why_right']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="max-w-[1100px] mx-auto text-center mb-12">
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug mb-5">{{ $d['why_right']['heading'] }}</h2>
                    @foreach (($d['why_right']['paragraphs'] ?? []) as $p)
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-4">{{ $p }}</p>
                    @endforeach
                </div>
                @if (! empty($d['why_right']['features_heading']))
                    <h3 class="text-[22px] md:text-[28px] font-bold text-[#14166e] uppercase text-center mb-10">{{ $d['why_right']['features_heading'] }}</h3>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach (($d['why_right']['items'] ?? []) as $c)
                        <div class="bg-white rounded-lg shadow-sm p-6 text-center">
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

    {{-- How to Get Started --}}
    @if (! empty($d['how_to_start']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-12">{{ $d['how_to_start']['heading'] }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($d['how_to_start']['items'] as $c)
                        <div class="bg-[#f5f7fa] rounded-lg p-7 text-center">
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

    {{-- Closing navy band --}}
    @if (! empty($d['closing']))
        <section class="bg-[#14166e] py-16 md:py-20 text-white">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                @if (! empty($d['closing']['heading']))
                    <h2 class="text-[26px] md:text-[34px] font-bold uppercase leading-snug mb-5">{{ $d['closing']['heading'] }}</h2>
                @endif
                @if (! empty($d['closing']['paragraph']))
                    <p class="text-[15px] md:text-[16px] leading-relaxed mb-10 text-white/90">{{ $d['closing']['paragraph'] }}</p>
                @endif
                @if (! empty($d['closing']['heading2']))
                    <h3 class="text-[22px] md:text-[28px] font-bold uppercase leading-snug mb-5">{{ $d['closing']['heading2'] }}</h3>
                @endif
                @if (! empty($d['closing']['paragraph2']))
                    <p class="text-[15px] md:text-[16px] leading-relaxed text-white/90">{{ $d['closing']['paragraph2'] }}</p>
                @endif
            </div>
        </section>
    @endif

    {{-- Exam Details + Flyer --}}
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
                @if (! empty($d['exam_details']['flyer_href']))
                    <div class="mt-10 text-center">
                        <a href="{{ $d['exam_details']['flyer_href'] }}" target="_blank" rel="noopener" class="inline-block bg-[#5cb85c] hover:bg-[#4cae4c] text-white font-semibold text-[15px] px-8 py-3 rounded-full transition">{{ $d['exam_details']['flyer_label'] ?? 'Download Flyer' }}</a>
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- Training Options --}}
    @if (! empty($d['training_options']['options']))
        <section class="bg-[#f5f7fa] py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($d['training_options']['options'] as $opt)
                        <div class="bg-white rounded-lg p-6 md:p-8 shadow-[rgba(100,100,111,0.12)_0px_4px_14px_0px] flex flex-col">
                            <div class="flex items-start gap-4 mb-6">
                                @if (! empty($d['training_options']['check_icon']))
                                    <img src="{{ $d['training_options']['check_icon'] }}" alt="" class="w-10 h-10 object-contain flex-shrink-0">
                                @endif
                                <p class="flex-1 text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $opt['text'] }}</p>
                            </div>
                            <div class="mt-auto">
                                <a href="{{ $opt['cta_href'] ?? '#' }}" class="inline-block bg-[#5cb85c] hover:bg-[#4cae4c] text-white font-semibold text-[15px] px-6 py-3 rounded-full transition">{{ $opt['cta_label'] ?? 'Purchase and Pay' }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

</x-layouts.cms>
