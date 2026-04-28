<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $intro          = $page->page_data['intro']           ?? [];
        $introBand      = $page->page_data['intro_band']      ?? [];
        $whyCert        = $page->page_data['why_cert']        ?? [];
        $whyMatters     = $page->page_data['why_matters']     ?? [];
        $outcomes       = $page->page_data['learning_outcomes'] ?? [];
        $topics         = $page->page_data['topics']          ?? [];
        $trainingHeader = $page->page_data['training_header'] ?? [];
        $trainers       = $page->page_data['trainers']        ?? [];
        $schedule       = $page->page_data['schedule']        ?? [];
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- SECTION — Intro band: heading + subheading + paragraphs + check-row badges + footer --}}
    @if (! empty($introBand))
        <section class="bg-white py-14">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h2 class="text-[24px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug mb-3">
                    {{ $introBand['heading'] }}
                </h2>
                @if (! empty($introBand['subheading']))
                    <h3 class="text-[18px] md:text-[22px] font-semibold text-gray-700 mb-6">
                        {{ $introBand['subheading'] }}
                    </h3>
                @endif
                @foreach (($introBand['paragraphs'] ?? []) as $p)
                    <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-3 max-w-[820px] mx-auto">
                        {{ $p }}
                    </p>
                @endforeach
                @if (! empty($introBand['badges']))
                    <ul class="flex flex-wrap justify-center gap-x-6 gap-y-2 mt-6">
                        @foreach ($introBand['badges'] as $b)
                            <li class="flex items-center gap-2 text-[15px] md:text-[16px] font-semibold text-[#14166e]">
                                <span class="text-[#5cb85c] font-bold">&#10003;</span>
                                <span>{{ $b }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
                @if (! empty($introBand['footer']))
                    <p class="mt-6 text-[16px] md:text-[18px] font-bold text-[#14166e]">
                        {{ $introBand['footer'] }}
                    </p>
                @endif
            </div>
        </section>
    @endif

    {{-- SECTION 3 — Topics and Description: 2-col (text + bullets left, image right) --}}
    @if (! empty($topics))
        <section class="bg-white py-14 " style="background-image: url('{{ asset('storage/cms-images/2026/03/slider-img.jpg') }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="text-[26px] md:text-[32px] font-bold text-white uppercase mb-5 leading-snug">
                        {{ $topics['heading'] }}
                    </h2>
                    @if (! empty($topics['intro']))
                        <p class="text-[15px] md:text-[16px] text-white leading-relaxed mb-5">
                            {{ $topics['intro'] }}
                        </p>
                    @endif
                    <ul class="space-y-3 text-[15px] md:text-[16px] text-white leading-relaxed mb-5">
                        @foreach (($topics['items'] ?? []) as $item)
                            <li class="flex gap-3">
                                <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                <span>{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                    @if (! empty($topics['closing']))
                        <p class="text-[15px] md:text-[16px] text-white leading-relaxed">
                            {{ $topics['closing'] }}
                        </p>
                    @endif
                </div>
                @if (! empty($topics['image']))
                    <div class="flex justify-center">
                        <img src="{{ $topics['image'] }}" alt="{{ $topics['heading'] ?? '' }}"
                             class="w-full max-w-[520px] h-auto rounded-lg shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px]" />
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- SECTION — Why ... Matters: 2-col image left + heading/intro/items_a/middle/items_b right --}}
    @if (! empty($whyMatters))
        <section class="bg-[#f5f7fa] py-14">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($whyMatters['image']))
                    <div class="flex justify-center">
                        <img src="{{ $whyMatters['image'] }}" alt="{{ $whyMatters['heading'] ?? '' }}"
                             class="w-full max-w-[520px] h-auto rounded-lg shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px]" />
                    </div>
                @endif
                <div>
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase mb-5 leading-snug">
                        {{ $whyMatters['heading'] }}
                    </h2>
                    @if (! empty($whyMatters['intro']))
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-4">
                            {{ $whyMatters['intro'] }}
                        </p>
                    @endif
                    @if (! empty($whyMatters['items_a']))
                        <ul class="space-y-3 text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-5">
                            @foreach ($whyMatters['items_a'] as $li)
                                <li class="flex gap-3">
                                    <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                    <span>{{ $li }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    @if (! empty($whyMatters['middle']))
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-4">
                            {{ $whyMatters['middle'] }}
                        </p>
                    @endif
                    @if (! empty($whyMatters['items_b']))
                        <ul class="space-y-3 text-[15px] md:text-[16px] text-gray-700 leading-relaxed">
                            @foreach ($whyMatters['items_b'] as $li)
                                <li class="flex gap-3">
                                    <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                    <span>{{ $li }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- SECTION — Learning Outcomes: 3-card grid (image + heading + subheading + intro + items) --}}
    @if (! empty($outcomes['cards']))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($outcomes['cards'] as $c)
                    <div class="bg-[#f5f7fa] rounded-lg p-6 shadow-[rgba(100,100,111,0.12)_0px_4px_18px_0px]">
                        @if (! empty($c['image']))
                            <div class="mb-4">
                                <img src="{{ $c['image'] }}" alt="{{ $c['heading'] ?? '' }}"
                                     class="w-auto max-w-[100px] h-auto" />
                            </div>
                        @endif
                        <h3 class="text-[18px] md:text-[22px] font-bold text-[#14166e] leading-snug mb-1">
                            {{ $c['heading'] }}
                        </h3>
                        @if (! empty($c['subheading']))
                            <p class="text-[14px] md:text-[15px] font-semibold text-gray-600 mb-3">
                                {{ $c['subheading'] }}
                            </p>
                        @endif
                        @if (! empty($c['intro']))
                            <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-3">
                                {{ $c['intro'] }}
                            </p>
                        @endif
                        @if (! empty($c['items']))
                            <ul class="space-y-2 text-[14px] md:text-[15px] text-gray-700 leading-relaxed">
                                @foreach ($c['items'] as $li)
                                    <li class="flex gap-3">
                                        <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                        <span>{{ $li }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- SECTION 1 — Intro: heading + description centered on white --}}
    @if (! empty($intro))
        <section class="bg-white py-14">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h2 class="text-[24px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug mb-6">
                    {{ $intro['heading'] }}
                </h2>
                @if (! empty($intro['body']))
                    <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">
                        {{ $intro['body'] }}
                    </p>
                @endif
            </div>
        </section>
    @endif

    {{-- SECTION 2 — Why go for ACPP Certification: 2-col (image left, heading+text right) --}}
    @if (! empty($whyCert))
        <section class="bg-[#f5f7fa] py-14">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($whyCert['image']))
                    <div class="flex justify-center">
                        <img src="{{ $whyCert['image'] }}" alt="{{ $whyCert['heading'] ?? '' }}"
                             class="w-full max-w-[520px] h-auto rounded-lg shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px]" />
                    </div>
                @endif
                <div>
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase mb-5 leading-snug">
                        {{ $whyCert['heading'] }}
                    </h2>
                    <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">
                        {{ $whyCert['body'] }}
                    </p>
                </div>
            </div>
        </section>
    @endif

    {{-- SECTION 4 — Training header: navy full-bleed band --}}
    @if (! empty($trainingHeader['heading']))
        <section class="bg-[#14166e] py-14 text-white">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h2 class="text-[24px] md:text-[32px] lg:text-[36px] font-bold uppercase leading-snug">
                    {{ $trainingHeader['heading'] }}
                </h2>
            </div>
        </section>
    @endif

    {{-- SECTION 5 — Trainer tabs: navy sidebar (avatar + Time/Fees/Address) + white bio/badges pane --}}
    @if (! empty($trainers))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4" x-data="{ active: 0 }">
                {{-- Tab buttons --}}
                <div class="flex flex-wrap gap-0 border-b border-gray-200 mb-8">
                    @foreach ($trainers as $i => $trainer)
                        <button type="button"
                                @click="active = {{ $i }}"
                                :class="active === {{ $i }} ? 'bg-[#14166e] text-white' : 'bg-white text-[#14166e] hover:bg-[#f5f7fa]'"
                                class="px-6 md:px-8 py-3 text-[14px] md:text-[15px] font-semibold uppercase tracking-wide border border-gray-200 border-b-0 -mb-px transition">
                            {{ $trainer['tab_label'] ?? $trainer['name'] ?? 'Trainer' }}
                        </button>
                    @endforeach
                </div>

                {{-- Tab panes --}}
                @foreach ($trainers as $i => $trainer)
                    @php $addr = $trainer['info']['address'] ?? []; @endphp
                    <div x-show="active === {{ $i }}" x-cloak class="grid grid-cols-1 md:grid-cols-[300px_1fr] gap-0 border border-gray-200 rounded-lg overflow-hidden shadow-[rgba(100,100,111,0.12)_0px_4px_18px_0px]">
                        {{-- Left sidebar: navy --}}
                        <div class="bg-[#14166e] text-white p-8 space-y-6">
                            @if (! empty($trainer['avatar']))
                                <div class="flex justify-center">
                                    <img src="{{ $trainer['avatar'] }}" alt="{{ $trainer['name'] ?? '' }}"
                                         class="w-[180px] h-[180px] rounded-full object-cover border-4 border-white/20 shadow-[rgba(0,0,0,0.25)_0px_6px_18px_0px]" />
                                </div>
                            @endif

                            <div class="space-y-1">
                                <div class="flex items-center gap-2 text-[15px] font-bold uppercase tracking-wide">
                                    <svg class="w-4 h-4 text-[#5cb85c]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-13a.75.75 0 00-1.5 0v5c0 .2.08.39.22.53l3 3a.75.75 0 101.06-1.06L10.75 9.69V5z" clip-rule="evenodd" /></svg>
                                    <span>Time</span>
                                </div>
                                <p class="text-[15px] text-gray-100 pl-6">{{ $trainer['info']['time'] ?? '' }}</p>
                            </div>

                            <div class="space-y-1">
                                <div class="flex items-center gap-2 text-[15px] font-bold uppercase tracking-wide">
                                    <svg class="w-4 h-4 text-[#5cb85c]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 12.93V15a1 1 0 11-2 0v-.07A4 4 0 016 11a1 1 0 112 0 2 2 0 104 0c0-.78-.42-1.17-1.65-1.53C8.64 9.04 6 8.28 6 5.5 6 3.84 7.2 2.57 9 2.14V2a1 1 0 112 0v.14A4 4 0 0114 5a1 1 0 11-2 0 2 2 0 10-4 0c0 .78.42 1.17 1.65 1.53 1.71.43 4.35 1.19 4.35 3.97 0 1.66-1.2 2.93-3 3.36z" /></svg>
                                    <span>Fees</span>
                                </div>
                                <p class="text-[18px] text-[#5cb85c] font-bold pl-6">{{ $trainer['info']['fees'] ?? '' }}</p>
                            </div>

                            <div class="space-y-1">
                                <div class="flex items-center gap-2 text-[15px] font-bold uppercase tracking-wide">
                                    <svg class="w-4 h-4 text-[#5cb85c]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M10 2a6 6 0 016 6c0 4.5-6 10-6 10S4 12.5 4 8a6 6 0 016-6zm0 8a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" /></svg>
                                    <span>Address</span>
                                </div>
                                <div class="text-[14px] text-gray-100 leading-relaxed pl-6 space-y-1">
                                    @if (! empty($addr['org']))    <p class="font-semibold">{{ $addr['org'] }}</p> @endif
                                    @if (! empty($addr['street'])) <p>{{ $addr['street'] }}</p>                   @endif
                                    @if (! empty($addr['phone']))  <p><a href="tel:{{ preg_replace('/[^+\d]/', '', $addr['phone']) }}" class="hover:text-[#5cb85c]">{{ $addr['phone'] }}</a></p> @endif
                                    @if (! empty($addr['email']))  <p><a href="mailto:{{ $addr['email'] }}" class="hover:text-[#5cb85c]">{{ $addr['email'] }}</a></p> @endif
                                    @if (! empty($addr['fax']))    <p>{{ $addr['fax'] }}</p>                     @endif
                                </div>
                            </div>
                        </div>

                        {{-- Right content: white --}}
                        <div class="bg-white p-8">
                            @if (! empty($trainer['name']))
                                <h3 class="text-[20px] md:text-[24px] font-bold text-[#14166e] leading-snug mb-4">
                                    {{ $trainer['name'] }}
                                </h3>
                            @endif
                            @if (! empty($trainer['bio']))
                                <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-5">
                                    {{ $trainer['bio'] }}
                                </p>
                            @endif
                            @if (! empty($trainer['badges']))
                                <ul class="space-y-3 text-[15px] md:text-[16px] text-gray-700 leading-relaxed">
                                    @foreach ($trainer['badges'] as $badge)
                                        <li class="flex gap-3">
                                            <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                            <span><span class="font-semibold text-[#14166e]">{{ $badge['title'] }}:</span> {{ $badge['text'] }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            @if (! empty($trainer['closing']))
                                <p class="mt-5 text-[15px] md:text-[16px] text-gray-700 leading-relaxed">
                                    {{ $trainer['closing'] }}
                                </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- SECTION 7 — Schedule date picker: dropdown + green CTA --}}
    @if (! empty($schedule))
        <section class="bg-white py-14">
            <div class="max-w-[720px] mx-auto px-4 text-center">
                <h2 class="text-[24px] md:text-[30px] font-bold text-[#14166e] uppercase mb-8">
                    {{ $schedule['label'] ?? '' }} Schedule
                </h2>
                <form class="space-y-6" onsubmit="event.preventDefault(); if (this.date.value) window.location.href = '{{ $schedule['cta_href'] ?? '#' }}';">
                    <label class="block text-left">
                        <span class="sr-only">{{ $schedule['placeholder'] ?? 'Choose an option' }}</span>
                        <select name="date"
                                class="w-full rounded-full border border-gray-300 bg-white px-6 py-3 text-[15px] text-gray-700 focus:outline-none focus:border-[#14166e] focus:ring-2 focus:ring-[#14166e]/20">
                            <option value="">{{ $schedule['placeholder'] ?? 'Choose an option' }}</option>
                            @foreach (($schedule['options'] ?? []) as $opt)
                                <option value="{{ $opt }}">{{ $opt }}</option>
                            @endforeach
                        </select>
                    </label>
                    <button type="submit"
                            class="inline-block bg-[#5cb85c] hover:bg-[#4cae4c] text-white font-semibold text-[15px] px-10 py-3 rounded-full uppercase tracking-wide transition">
                        {{ $schedule['cta_label'] ?? 'Schedule Training' }}
                    </button>
                </form>
            </div>
        </section>
    @endif

</x-layouts.cms>
