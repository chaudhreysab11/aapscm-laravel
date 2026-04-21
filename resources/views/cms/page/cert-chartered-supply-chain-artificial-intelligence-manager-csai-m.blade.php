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
                    <div><img src="{{ $d['hero']['image'] }}" alt="{{ $d['hero']['heading'] ?? '' }}" class="w-full h-auto rounded-md" loading="lazy"></div>
                @endif
            </div>
        </section>
    @endif

    {{-- Audience --}}
    @if (! empty($d['audience']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($d['audience']['image']))
                    <div><img src="{{ $d['audience']['image'] }}" alt="" class="w-full h-auto rounded-md" loading="lazy"></div>
                @endif
                <div class="space-y-8">
                    @foreach (($d['audience']['blocks'] ?? []) as $b)
                        <div>
                            <h3 class="text-[20px] md:text-[24px] font-bold text-[#14166e] uppercase mb-4">{{ $b['heading'] }}</h3>
                            @if (! empty($b['intro']))
                                <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-4">{{ $b['intro'] }}</p>
                            @endif
                            <ul class="space-y-3">
                                @foreach ($b['items'] as $li)
                                    <li class="flex gap-3">
                                        <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                        <span class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $li }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Objectives --}}
    @if (! empty($d['objectives']))
        <section class="bg-white py-16 md:py-20">
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

    {{-- Outcomes --}}
    @if (! empty($d['outcomes']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($d['outcomes']['image']))
                    <div><img src="{{ $d['outcomes']['image'] }}" alt="" class="w-full h-auto rounded-md" loading="lazy"></div>
                @endif
                <div>
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug mb-4">{{ $d['outcomes']['heading'] }}</h2>
                    @if (! empty($d['outcomes']['intro']))
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-6">{{ $d['outcomes']['intro'] }}</p>
                    @endif
                    <ul class="space-y-3">
                        @foreach ($d['outcomes']['items'] as $li)
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

    {{-- Modules --}}
    @if (! empty($d['modules']['items']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($d['modules']['items'] as $c)
                        <div class="bg-[#f5f7fa] rounded-lg p-6">
                            @if (! empty($c['image']))
                                <img src="{{ $c['image'] }}" alt="{{ $c['title'] }}" class="w-16 h-16 object-contain mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[17px] md:text-[19px] font-bold text-[#14166e] mb-3">{{ $c['title'] }}</h3>
                            <ul class="space-y-2">
                                @foreach (($c['bullets'] ?? []) as $b)
                                    <li class="flex gap-2 text-[14px] md:text-[15px] text-gray-700 leading-relaxed">
                                        <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                        <span>{{ $b }}</span>
                                    </li>
                                @endforeach
                            </ul>
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

    {{-- Differentiators --}}
    @if (! empty($d['differentiators']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10">
                <div>
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug mb-5">{{ $d['differentiators']['heading'] }}</h2>
                    @if (! empty($d['differentiators']['intro']))
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-6">{{ $d['differentiators']['intro'] }}</p>
                    @endif
                    @if (! empty($d['differentiators']['subheading']))
                        <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-4">{{ $d['differentiators']['subheading'] }}</h3>
                    @endif
                    @if (! empty($d['differentiators']['closing']))
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mt-6 italic">{{ $d['differentiators']['closing'] }}</p>
                    @endif
                    @if (! empty($d['differentiators']['closing2']))
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mt-3 italic">{{ $d['differentiators']['closing2'] }}</p>
                    @endif
                </div>
                <div class="space-y-5">
                    @foreach ($d['differentiators']['items'] as $c)
                        <div class="bg-[#f5f7fa] rounded-lg p-5">
                            <h4 class="text-[16px] md:text-[18px] font-bold text-[#14166e] mb-2">{{ $c['title'] }}</h4>
                            <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $c['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Career Paths --}}
    @if (! empty($d['careers']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-5">{{ $d['careers']['heading'] }}</h2>
                @if (! empty($d['careers']['intro']))
                    <p class="max-w-[1000px] mx-auto text-[15px] md:text-[16px] text-gray-700 text-center leading-relaxed mb-12">{{ $d['careers']['intro'] }}</p>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($d['careers']['items'] as $c)
                        <div class="bg-white rounded-lg shadow-sm p-6 text-center">
                            @if (! empty($c['image']))
                                <img src="{{ $c['image'] }}" alt="{{ $c['title'] }}" class="w-16 h-16 object-contain mx-auto mb-4" loading="lazy">
                            @endif
                            <h3 class="text-[16px] md:text-[18px] font-bold text-[#14166e]">{{ $c['title'] }}</h3>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Stats --}}
    @if (! empty($d['stats']['items']))
        <section class="bg-[#14166e] py-16 md:py-20 text-white">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($d['stats']['items'] as $s)
                        <div class="text-center px-4">
                            <p class="text-[16px] md:text-[18px] leading-relaxed text-white/95">{{ $s['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Credential --}}
    @if (! empty($d['credential']['items']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($d['credential']['items'] as $c)
                        <div class="bg-[#f5f7fa] rounded-lg p-6 text-center">
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
