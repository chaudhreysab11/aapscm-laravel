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
                        <h2 class="text-[22px] md:text-[28px] font-bold text-[#14166e] uppercase leading-snug mb-6">{{ $d['hero']['heading'] }}</h2>
                    @endif
                    @foreach (($d['hero']['paragraphs'] ?? []) as $p)
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-4">{{ $p }}</p>
                    @endforeach
                </div>
                @if (! empty($d['hero']['image']))
                    <div><img src="{{ $d['hero']['image'] }}" alt="" class="w-full h-auto rounded-md" loading="lazy"></div>
                @endif
            </div>
        </section>
    @endif

    {{-- Why Choose --}}
    @if (! empty($d['why_choose']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-12">{{ $d['why_choose']['heading'] }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($d['why_choose']['items'] as $c)
                        <div class="bg-white rounded-lg shadow-sm p-6 text-center">
                            @if (! empty($c['image']))
                                <img src="{{ $c['image'] }}" alt="{{ $c['title'] }}" class="w-16 h-16 object-contain mx-auto mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[16px] md:text-[18px] font-bold text-[#14166e] mb-3">{{ $c['title'] }}</h3>
                            <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $c['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Why AAPSCM --}}
    @if (! empty($d['why_aapscm']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="text-center max-w-[1000px] mx-auto mb-12">
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug mb-4">{{ $d['why_aapscm']['heading'] }}</h2>
                    @if (! empty($d['why_aapscm']['subheading']))
                        <h3 class="text-[18px] md:text-[22px] font-bold text-[#14166e] mb-4">{{ $d['why_aapscm']['subheading'] }}</h3>
                    @endif
                    @if (! empty($d['why_aapscm']['paragraph']))
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $d['why_aapscm']['paragraph'] }}</p>
                    @endif
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach ($d['why_aapscm']['items'] as $c)
                        <div class="bg-[#f5f7fa] rounded-lg p-6 flex gap-5">
                            @if (! empty($c['image']))
                                <img src="{{ $c['image'] }}" alt="{{ $c['title'] }}" class="w-14 h-14 object-contain flex-shrink-0" loading="lazy">
                            @endif
                            <div>
                                <h4 class="text-[16px] md:text-[18px] font-bold text-[#14166e] mb-2">{{ $c['title'] }}</h4>
                                <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $c['text'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Objectives --}}
    @if (! empty($d['objectives']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1100px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-5">{{ $d['objectives']['heading'] }}</h2>
                @if (! empty($d['objectives']['intro']))
                    <p class="text-[15px] md:text-[16px] text-gray-700 text-center leading-relaxed mb-10">{{ $d['objectives']['intro'] }}</p>
                @endif
                <ul class="space-y-4 max-w-[950px] mx-auto">
                    @foreach ($d['objectives']['items'] as $li)
                        <li class="flex gap-3 text-[15px] md:text-[16px] text-gray-700 leading-relaxed">
                            <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                            <span>{{ $li }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif

    {{-- Who Should Enroll --}}
    @if (! empty($d['who_should_enroll']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($d['who_should_enroll']['image']))
                    <div><img src="{{ $d['who_should_enroll']['image'] }}" alt="" class="w-full h-auto rounded-md" loading="lazy"></div>
                @endif
                <div>
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug mb-4">{{ $d['who_should_enroll']['heading'] }}</h2>
                    @if (! empty($d['who_should_enroll']['intro']))
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-6">{{ $d['who_should_enroll']['intro'] }}</p>
                    @endif
                    <ul class="space-y-3">
                        @foreach ($d['who_should_enroll']['items'] as $li)
                            <li class="flex gap-3">
                                <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                <span class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $li }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    @endif

    {{-- Career Path --}}
    @if (! empty($d['careers']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-5">{{ $d['careers']['heading'] }}</h2>
                @if (! empty($d['careers']['intro']))
                    <p class="max-w-[1000px] mx-auto text-[15px] md:text-[16px] text-gray-700 text-center leading-relaxed mb-12">{{ $d['careers']['intro'] }}</p>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($d['careers']['items'] as $c)
                        <div class="bg-white rounded-lg p-6 text-center shadow-sm">
                            @if (! empty($c['image']))
                                <img src="{{ $c['image'] }}" alt="{{ $c['title'] }}" class="w-16 h-16 object-contain mx-auto mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[16px] md:text-[18px] font-bold text-[#14166e] mb-2">{{ $c['title'] }}</h3>
                            <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $c['text'] }}</p>
                        </div>
                    @endforeach
                </div>
                @if (! empty($d['careers']['salary']))
                    <div class="mt-12 max-w-[900px] mx-auto bg-[#f0f3f9] border border-[#14166e]/20 rounded-lg p-6 text-center">
                        <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-3">{{ $d['careers']['salary']['title'] }}</h3>
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $d['careers']['salary']['text'] }}</p>
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- Modules --}}
    @if (! empty($d['modules']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-12">{{ $d['modules']['heading'] }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach ($d['modules']['items'] as $c)
                        <div class="bg-[#f5f7fa] rounded-lg p-6">
                            @if (! empty($c['image']))
                                <img src="{{ $c['image'] }}" alt="{{ $c['title'] }}" class="w-16 h-16 object-contain mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[16px] md:text-[18px] font-bold text-[#14166e] mb-3">{{ $c['title'] }}</h3>
                            <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $c['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Exam Details --}}
    @if (! empty($d['exam_details']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($d['exam_details']['image']))
                    <div><img src="{{ $d['exam_details']['image'] }}" alt="" class="w-full h-auto rounded-md" loading="lazy"></div>
                @endif
                <div>
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug mb-6">{{ $d['exam_details']['heading'] }}</h2>
                    @foreach (($d['exam_details']['groups'] ?? []) as $g)
                        <ul class="space-y-3 mb-6 last:mb-0">
                            @foreach ($g['items'] as $li)
                                <li class="flex gap-3">
                                    <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                    <span class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $li }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Why AI --}}
    @if (! empty($d['why_ai']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug mb-6">{{ $d['why_ai']['heading'] }}</h2>
                    <ul class="space-y-3">
                        @foreach ($d['why_ai']['items'] as $li)
                            <li class="flex gap-3">
                                <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                <span class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $li }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @if (! empty($d['why_ai']['image']))
                    <div><img src="{{ $d['why_ai']['image'] }}" alt="" class="w-full h-auto rounded-md" loading="lazy"></div>
                @endif
            </div>
        </section>
    @endif

    {{-- Enroll --}}
    @if (! empty($d['enroll']))
        <section class="bg-[#14166e] py-16 md:py-20 text-white">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h2 class="text-[26px] md:text-[34px] font-bold uppercase leading-snug mb-8">{{ $d['enroll']['heading'] }}</h2>
                <ul class="space-y-3 inline-block text-left">
                    @foreach (($d['enroll']['items'] ?? []) as $li)
                        <li class="flex gap-3">
                            <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                            <span class="text-[15px] md:text-[17px] text-white/95">{{ $li }}</span>
                        </li>
                    @endforeach
                </ul>
                @if (! empty($d['enroll']['contact']))
                    <p class="text-[15px] md:text-[17px] text-white/90 mt-6">{{ $d['enroll']['contact'] }}</p>
                @endif
                @if (! empty($d['enroll']['flyer_href']))
                    <div class="mt-8">
                        <a href="{{ $d['enroll']['flyer_href'] }}" target="_blank" rel="noopener" class="inline-block bg-[#5cb85c] hover:bg-[#4cae4c] text-white font-semibold text-[15px] px-8 py-3 rounded-full transition">{{ $d['enroll']['flyer_label'] ?? 'Download Flyer' }}</a>
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
