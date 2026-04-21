<x-layouts.cms>
    <x-cms.seo-head :page="$page" />
    <x-cms.eltdf-title-bar :title="$page->title" :breadcrumbs="[['label' => $page->title]]" />

    @php($d = $page->page_data ?? [])

    {{-- Intro / Overview --}}
    @if (! empty($d['intro']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    @if (! empty($d['intro']['title_heading']))
                        <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug mb-6">{{ $d['intro']['title_heading'] }}</h2>
                    @endif
                    @if (! empty($d['intro']['paragraph']))
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $d['intro']['paragraph'] }}</p>
                    @endif
                </div>
                @if (! empty($d['intro']['image']))
                    <div><img src="{{ $d['intro']['image'] }}" alt="{{ $d['intro']['title_heading'] ?? '' }}" class="w-full h-auto" loading="lazy"></div>
                @endif
            </div>
        </section>
    @endif

    {{-- Who Should Enroll --}}
    @if (! empty($d['who_should_enroll']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                @if (! empty($d['who_should_enroll']['heading']))
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-4">{{ $d['who_should_enroll']['heading'] }}</h2>
                @endif
                @if (! empty($d['who_should_enroll']['intro']))
                    <p class="text-[15px] md:text-[16px] text-gray-700 text-center mb-10">{{ $d['who_should_enroll']['intro'] }}</p>
                @endif
                <ul class="max-w-[1000px] mx-auto grid grid-cols-1 md:grid-cols-2 gap-5">
                    @foreach ($d['who_should_enroll']['items'] as $item)
                        <li class="flex gap-3 bg-white rounded-md shadow-sm px-5 py-4">
                            @if (! empty($d['who_should_enroll']['check_icon']))
                                <img src="{{ $d['who_should_enroll']['check_icon'] }}" alt="" class="w-5 h-5 mt-[3px] object-contain shrink-0">
                            @else
                                <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                            @endif
                            <span class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $item['text'] }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif

    {{-- Program Highlights --}}
    @if (! empty($d['program_highlights']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-12">{{ $d['program_highlights']['heading'] }}</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($d['program_highlights']['items'] as $c)
                        <div class="bg-[#f5f7fa] rounded-lg p-7 text-center">
                            @if (! empty($c['image']))
                                <img src="{{ $c['image'] }}" alt="{{ $c['title'] }}" class="w-20 h-20 object-contain mx-auto mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-3">{{ $c['title'] }}</h3>
                            <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $c['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Key Learning Outcomes --}}
    @if (! empty($d['key_learning_outcomes']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-4">{{ $d['key_learning_outcomes']['heading'] }}</h2>
                @if (! empty($d['key_learning_outcomes']['intro']))
                    <p class="text-[15px] md:text-[16px] text-gray-700 text-center mb-10">{{ $d['key_learning_outcomes']['intro'] }}</p>
                @endif
                <ul class="max-w-[1000px] mx-auto grid grid-cols-1 md:grid-cols-2 gap-5">
                    @foreach ($d['key_learning_outcomes']['items'] as $item)
                        <li class="flex gap-3 bg-white rounded-md shadow-sm px-5 py-4">
                            @if (! empty($d['key_learning_outcomes']['check_icon']))
                                <img src="{{ $d['key_learning_outcomes']['check_icon'] }}" alt="" class="w-5 h-5 mt-[3px] object-contain shrink-0">
                            @else
                                <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                            @endif
                            <span class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $item['text'] }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif

    {{-- Program Structure & Modules --}}
    @if (! empty($d['program_structure']))
        <section class="bg-[#14166e] py-16 md:py-20 text-white">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[34px] font-bold uppercase text-center mb-12">{{ $d['program_structure']['heading'] }}</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($d['program_structure']['modules'] as $m)
                        <div class="bg-white text-gray-800 rounded-lg p-6 text-center">
                            @if (! empty($m['image']))
                                <img src="{{ $m['image'] }}" alt="{{ $m['title'] }}" class="w-16 h-16 object-contain mx-auto mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[16px] md:text-[18px] font-bold text-[#14166e] mb-3">{{ $m['title'] }}</h3>
                            <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $m['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Certification and Career Pathways --}}
    @if (! empty($d['career_pathways']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($d['career_pathways']['image']))
                    <div><img src="{{ $d['career_pathways']['image'] }}" alt="{{ $d['career_pathways']['heading'] ?? '' }}" class="w-full h-auto" loading="lazy"></div>
                @endif
                <div>
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug mb-5">{{ $d['career_pathways']['heading'] }}</h2>
                    @if (! empty($d['career_pathways']['intro']))
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-5">{{ $d['career_pathways']['intro'] }}</p>
                    @endif
                    @if (! empty($d['career_pathways']['roles']))
                        <ul class="space-y-2 mb-6">
                            @foreach ($d['career_pathways']['roles'] as $role)
                                <li class="flex gap-3">
                                    <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                    <span class="text-[15px] md:text-[16px] text-gray-700">{{ $role }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    @if (! empty($d['career_pathways']['cta_label']))
                        <a href="{{ $d['career_pathways']['cta_href'] ?? '#enroll-now' }}" class="inline-block bg-[#5cb85c] hover:bg-[#4cae4c] text-white font-semibold text-[15px] px-8 py-3 rounded-full transition">{{ $d['career_pathways']['cta_label'] }}</a>
                    @endif
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
        <section id="enroll-now" class="bg-white py-16 md:py-20">
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
