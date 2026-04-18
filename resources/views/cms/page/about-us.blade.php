@php
    $data = $page->page_data ?? [];

    $whoWeAre       = $data['who_we_are']               ?? [];
    $whyStandApart  = $data['why_stand_apart']          ?? [];
    $aboutUs        = $data['about_us']                 ?? [];
    $responsibilities = $data['responsibilities']       ?? [];
    $chaptersTransitionHeading = $data['chapters_transition_heading'] ?? null;
    $mission        = $data['mission']                  ?? [];
    $vision         = $data['vision']                   ?? [];
    $chapterFunctions = $data['chapter_functions']      ?? [];
    $goals          = $data['goals']                    ?? [];
    $objectives     = $data['objectives']               ?? [];
    $headquarteredBodyHtml = $data['headquartered_body_html'] ?? null;
    $becomeAMember  = $data['become_a_member']          ?? [];
    $advocacyLeadIn = $data['advocacy_lead_in']         ?? null;
    $accreditations = $data['accreditations']           ?? [];
    $teasers        = $data['teasers']                  ?? [];
    $closing        = $data['closing']                  ?? [];

    $chapterFunctionCards = $chapterFunctions['cards'] ?? [];
    $objectiveCards = $objectives['cards'] ?? [];
    $accreditationLogos = $accreditations['logos'] ?? [];
@endphp

<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    {{-- Theme title band (Qode/Eltdf parity, #202124, 240px) --}}
    <x-cms.eltdf-title-bar
        title="About us"
        :breadcrumbs="[['label' => 'About us']]"
    />

    {{-- §1  Who are We? --------------------------------------------------- --}}
    <section class="py-16">
        <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            <div>
                @if (! empty($whoWeAre['image']))
                    <img
                        src="{{ $whoWeAre['image'] }}"
                        alt=""
                        class="md:hidden w-full max-w-[540px] mx-auto mb-6"
                    />
                @endif
                <h3 class="text-[30px] leading-tight text-[#202124] mb-4">
                    {!! $whoWeAre['heading'] ?? 'Who are <strong>We?</strong>' !!}
                </h3>
                <div class="text-[15px] leading-relaxed text-gray-700">
                    {!! $whoWeAre['body_html'] ?? '' !!}
                </div>
            </div>
            <div class="hidden md:block">
                @if (! empty($whoWeAre['image']))
                    <img
                        src="{{ $whoWeAre['image'] }}"
                        alt=""
                        class="w-full max-w-[540px] mx-auto"
                    />
                @endif
            </div>
        </div>
    </section>

    {{-- §2  Why We Stand Apart -------------------------------------------- --}}
    <section class="py-16">
        <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            <div class="grid grid-cols-2 gap-4">
                @if (! empty($whyStandApart['image_pair'][0]))
                    <x-cms.reveal animation="fadeInDown">
                        <img src="{{ $whyStandApart['image_pair'][0] }}" alt="" class="w-full h-auto" />
                    </x-cms.reveal>
                @endif
                @if (! empty($whyStandApart['image_pair'][1]))
                    <x-cms.reveal animation="fadeInUp">
                        <img src="{{ $whyStandApart['image_pair'][1] }}" alt="" class="w-full h-auto" />
                    </x-cms.reveal>
                @endif
            </div>
            <div>
                <h3 class="text-[30px] leading-tight text-[#202124] mb-4">
                    {!! $whyStandApart['heading'] ?? 'Why We <strong>Stand Apart</strong>' !!}
                </h3>
                <div class="text-[15px] leading-relaxed text-gray-700">
                    {!! $whyStandApart['body_html'] ?? '' !!}
                </div>
            </div>
        </div>
    </section>

    {{-- §3  About Us ----------------------------------------------------- --}}
    <section class="py-16 bg-[#E5F0F945]">
        <div class="max-w-[1100px] mx-auto px-4">
            <h3 class="text-[30px] leading-tight text-[#202124] mb-6">
                {!! $aboutUs['heading'] ?? 'About <strong>Us</strong>' !!}
            </h3>
            <div class="text-[15px] leading-relaxed text-gray-700 space-y-4 text-justify">
                {!! $aboutUs['body_html'] ?? '' !!}
            </div>
        </div>
        <div class="max-w-[1100px] mx-auto px-4 py-2 grid md:grid-cols-2 gap-10">
            <div>
                @if (! empty($responsibilities['image']))
                    <img src="{{ $responsibilities['image'] }}" alt="" class="w-full h-auto" />
                @endif
            </div>
            <div>
                @if (! empty($responsibilities['items']))
                    <ul class="space-y-3 mb-6">
                        @foreach ($responsibilities['items'] as $item)
                            <li class="flex gap-3 text-[15px] text-gray-700">
                                <span class="shrink-0 mt-1 text-[#005B1C]" aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512" fill="currentColor"><path d="M504 256c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zM227.3 387.3l184-184c6.2-6.2 6.2-16.4 0-22.6l-22.6-22.6c-6.2-6.2-16.4-6.2-22.6 0L216 308.1l-70.1-70.1c-6.2-6.2-16.4-6.2-22.6 0l-22.6 22.6c-6.2 6.2-6.2 16.4 0 22.6l104 104c6.2 6.3 16.4 6.3 22.6 0z"/></svg>
                                </span>
                                <span>{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif

                @if (! empty($responsibilities['ansi_body_html']))
                    <div class="text-[15px] leading-relaxed text-gray-700 mb-6">
                        {!! $responsibilities['ansi_body_html'] !!}
                    </div>
                @endif

                <div class="grid grid-cols-2 gap-4">
                    @foreach (['chapters_col_a', 'chapters_col_b'] as $colKey)
                        <ul class="space-y-2">
                            @foreach (($responsibilities[$colKey] ?? []) as $chapter)
                                <li class="flex gap-2 text-[15px] text-gray-700">
                                    <span class="shrink-0 mt-1 text-[#005B1C]" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 512 512" fill="currentColor"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm140.2 246.9l-135.5 135.5c-9.4 9.4-24.6 9.4-33.9 0l-17-17c-9.4-9.4-9.4-24.6 0-33.9l87.3-87.3H112c-13.3 0-24-10.7-24-24v-24c0-13.3 10.7-24 24-24h185.1l-87.3-87.3c-9.4-9.4-9.4-24.6 0-33.9l17-17c9.4-9.4 24.6-9.4 33.9 0L396.2 221c9.4 9.4 9.4 24.6 0 33.9z"/></svg>
                                    </span>
                                    @if (! empty($chapter['url']))
                                        <a href="{{ $chapter['url'] }}" class="hover:text-[#508433]">{{ $chapter['label'] }}</a>
                                    @else
                                        <span>{{ $chapter['label'] }}</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- §5  Chapters transition heading ----------------------------------- --}}
    @if ($chaptersTransitionHeading)
        <section class="py-12">
            <div class="max-w-[1100px] mx-auto px-4">
                <h3 class="text-[24px] leading-snug text-[#202124] font-poppins font-thin text-justify">
                    {{ $chaptersTransitionHeading }}
                </h3>
            </div>
        </section>
    @endif

    {{-- §6  Mission / Vision --------------------------------------------- --}}
    <section class="py-16">
        <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-6">
            @if (! empty($mission))
                <x-cms.icon-card
                    :icon="$mission['icon']"
                    :iconWidth="49"
                    :iconHeight="49"
                    :title="$mission['heading']"
                    :body="$mission['body']"
                />
            @endif
            @if (! empty($vision))
                <x-cms.icon-card
                    :icon="$vision['icon']"
                    :iconWidth="49"
                    :iconHeight="49"
                    :title="$vision['heading']"
                    :body="$vision['body']"
                />
            @endif
        </div>
    </section>

    {{-- §7/§8  Chapter Functions intro + 7 cards (3+3+1 centered) -------- --}}
    @if (! empty($chapterFunctions['intro_heading']))
        <section class="pt-12 pb-6">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h3 class="text-[26px] leading-tight text-[#202124] font-medium">
                    {!! $chapterFunctions['intro_heading'] !!}
                </h3>
            </div>
        </section>
    @endif

    @if (! empty($chapterFunctionCards))
        <section class="pb-16">
            <div class="max-w-[1100px] mx-auto px-4 space-y-8">
                {{-- Row A + B: groups of 3 --}}
                @foreach (array_chunk(array_slice($chapterFunctionCards, 0, 6), 3) as $row)
                    <div class="grid md:grid-cols-3 gap-6">
                        @foreach ($row as $card)
                            <x-cms.icon-card
                                :icon="$card['icon']"
                                :title="$card['title']"
                                :body="$card['body']"
                                :cta="$card['cta'] ?? null"
                                shadow
                            />
                        @endforeach
                    </div>
                @endforeach

                {{-- Row C: 7th card centered --}}
                @if (count($chapterFunctionCards) > 6)
                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="hidden md:block"></div>
                        @php($card = $chapterFunctionCards[6])
                        <x-cms.icon-card
                            :icon="$card['icon']"
                            :title="$card['title']"
                            :body="$card['body']"
                            :cta="$card['cta'] ?? null"
                            shadow
                        />
                        <div class="hidden md:block"></div>
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- §9  Goals (intro + image-box grid, 2+2+1 centered) --------------- --}}
    @if (! empty($goals['heading']))
        <section class="pt-12 pb-6">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h3 class="text-[26px] leading-tight text-[#202124] font-medium">
                    {!! $goals['heading'] !!}
                </h3>
            </div>
        </section>
    @endif

    @if (! empty($goals['items']))
        <section class="pb-16">
            <div class="max-w-[1100px] mx-auto px-4 space-y-6">
                @php($goalIcon = $goals['icon'] ?? '/storage/cms-images/2024/12/check.png')
                @php($goalItems = $goals['items'])

                {{-- Rows of 2 --}}
                @foreach (array_chunk(array_slice($goalItems, 0, 4), 2) as $row)
                    <div class="grid md:grid-cols-2 gap-4">
                        @foreach ($row as $item)
                            <x-cms.image-box
                                :icon="$goalIcon"
                                :body="'<p><b>' . e($item['title']) . '</b>: ' . e($item['body']) . '</p>'"
                                shadow
                            />
                        @endforeach
                    </div>
                @endforeach

                {{-- 5th item centered --}}
                @if (count($goalItems) > 4)
                    <div class="grid md:grid-cols-3 gap-4">
                        <div class="hidden md:block"></div>
                        @php($item = $goalItems[4])
                        <x-cms.image-box
                            :icon="$goalIcon"
                            :body="'<p><b>' . e($item['title']) . '</b>: ' . e($item['body']) . '</p>'"
                            shadow
                        />
                        <div class="hidden md:block"></div>
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- §10  Our Objectives intro ----------------------------------------- --}}
    @if (! empty($objectives['heading']))
        <section class="pt-12 pb-6 bg-[#fef5ef]">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h3 class="text-[26px] leading-tight text-[#202124] font-medium mb-4">
                    {!! $objectives['heading'] !!}
                </h3>
                @if (! empty($objectives['intro_html']))
                    <div class="text-[15px] leading-relaxed text-gray-700 max-w-3xl mx-auto">
                        {!! $objectives['intro_html'] !!}
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- §11  Objectives cards (2×3 + 1 centered) -------------------------- --}}
    @if (! empty($objectiveCards))
        <section class="pt-6 pb-16 bg-[#fef5ef]">
            <div class="max-w-[1100px] mx-auto px-4 space-y-6">
                @foreach (array_chunk(array_slice($objectiveCards, 0, 6), 2) as $row)
                    <div class="grid md:grid-cols-2 gap-6">
                        @foreach ($row as $card)
                            <x-cms.icon-card
                                :icon="$card['icon']"
                                :title="$card['title']"
                                :bullets="$card['bullets'] ?? []"
                                shadow
                            />
                        @endforeach
                    </div>
                @endforeach

                @if (count($objectiveCards) > 6)
                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="hidden md:block"></div>
                        @php($card = $objectiveCards[6])
                        <x-cms.icon-card
                            :icon="$card['icon']"
                            :title="$card['title']"
                            :bullets="$card['bullets'] ?? []"
                            shadow
                        />
                        <div class="hidden md:block"></div>
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- §12  Headquartered lead-in ---------------------------------------- --}}
    @if ($headquarteredBodyHtml)
        <section class="py-10 bg-[#fef5ef]">
            <div class="max-w-[1100px] mx-auto px-4 text-[15px] leading-relaxed text-gray-700 text-center">
                {!! $headquarteredBodyHtml !!}
            </div>
        </section>
    @endif

    {{-- §13  Become a Member --------------------------------------------- --}}
    @if (! empty($becomeAMember))
        <section class="py-16 bg-[#fef5ef]">
            <div class="max-w-[1100px] mx-auto px-4">
                <div class="grid md:grid-cols-2 gap-10 items-center">
                    <div>
                        @if (! empty($becomeAMember['image']))
                            <img src="{{ $becomeAMember['image'] }}" alt="" class="w-full h-auto" />
                        @endif
                    </div>
                    <div>
                        <h3 class="text-[30px] leading-tight text-[#202124] mb-2">
                            {!! $becomeAMember['heading'] !!}
                        </h3>
                        @if (! empty($becomeAMember['subheading']))
                            <h3 class="text-[22px] leading-snug text-[#202124] font-medium mb-4">
                                {{ $becomeAMember['subheading'] }}
                            </h3>
                        @endif
                        <div class="text-[15px] leading-relaxed text-gray-700 space-y-4">
                            {!! $becomeAMember['body_html'] ?? '' !!}
                        </div>
                    </div>
                </div>

                @if (! empty($becomeAMember['footer_html']) || ! empty($becomeAMember['button_url']))
                    <div class="mt-10 text-center max-w-4xl mx-auto">
                        @if (! empty($becomeAMember['footer_html']))
                            <div class="text-[15px] leading-relaxed text-gray-700 space-y-4 mb-6">
                                {!! $becomeAMember['footer_html'] !!}
                            </div>
                        @endif
                        @if (! empty($becomeAMember['button_url']))
                            <a
                                href="{{ $becomeAMember['button_url'] }}"
                                class="inline-block px-6 py-3 bg-[#202124] text-white rounded hover:bg-[#0f1159] transition-colors"
                            >
                                {{ $becomeAMember['button_label'] ?? 'Become a Member Today' }}
                            </a>
                        @endif
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- §14  Advocacy lead-in --------------------------------------------- --}}
    @if ($advocacyLeadIn)
        <section class="py-10">
            <div class="max-w-[1100px] mx-auto px-4 text-[17px] leading-relaxed text-gray-700 text-center">
                {!! $advocacyLeadIn !!}
            </div>
        </section>
    @endif

    {{-- §15  Accreditations and Alignment --------------------------------- --}}
    @if (! empty($accreditations))
        <section class="py-16">
            <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-10">
                <div>
                    <h3 class="text-[30px] leading-tight text-[#202124] mb-4">
                        {!! $accreditations['heading'] ?? 'Accreditations and <strong>Alignment</strong>' !!}
                    </h3>
                    <div class="text-[15px] leading-relaxed text-gray-700 space-y-4">
                        {!! $accreditations['body_html'] ?? '' !!}
                    </div>
                </div>
                <div class="space-y-6">
                    @foreach (array_chunk($accreditationLogos, 3) as $row)
                        <div class="grid grid-cols-3 gap-4">
                            @foreach ($row as $logo)
                                <div class="flex flex-col items-center text-center">
                                    <img src="{{ $logo['image'] }}" alt="{{ $logo['label'] ?? '' }}" class="w-full h-auto mb-2" />
                                    @if (! empty($logo['label']))
                                        <p class="text-[13px] leading-tight text-[#202124] font-medium">{{ $logo['label'] }}</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- §16  CAREERS / BOARD MEMBERS -------------------------------------- --}}
    @if (! empty($teasers))
        <section class="py-16">
            <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-10">
                @foreach ($teasers as $teaser)
                    <x-cms.reveal animation="fadeInUp">
                        <x-cms.teaser-card
                            :image="$teaser['image']"
                            :heading="$teaser['heading']"
                            :headingUrl="$teaser['heading_url'] ?? null"
                            :body="$teaser['body_html'] ?? null"
                            :buttonLabel="$teaser['button_label']"
                            :buttonUrl="$teaser['button_url']"
                        />
                    </x-cms.reveal>
                @endforeach
            </div>
        </section>
    @endif

    {{-- §17  Globally Trusted closing ------------------------------------- --}}
    @if (! empty($closing))
        <section class="py-16">
            <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
                <div class="grid grid-cols-2 gap-4">
                    @if (! empty($closing['image_pair'][0]))
                        <x-cms.reveal animation="fadeInDown">
                            <img src="{{ $closing['image_pair'][0] }}" alt="" class="w-full h-auto" />
                        </x-cms.reveal>
                    @endif
                    @if (! empty($closing['image_pair'][1]))
                        <x-cms.reveal animation="fadeInUp">
                            <img src="{{ $closing['image_pair'][1] }}" alt="" class="w-full h-auto" />
                        </x-cms.reveal>
                    @endif
                </div>
                <div>
                    <h3 class="text-[30px] leading-tight text-[#202124] mb-4">
                        {!! $closing['heading'] ?? 'Globally Trusted and <strong>Mission-Driven</strong>' !!}
                    </h3>
                    <div class="text-[15px] leading-relaxed text-gray-700">
                        {!! $closing['body_html'] ?? '' !!}
                    </div>
                </div>
            </div>
        </section>
    @endif

</x-layouts.cms>
