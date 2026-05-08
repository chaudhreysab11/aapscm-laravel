<x-layouts.cms>
    <x-cms.seo-head :page="$page" />

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    @php
        $data         = $page->page_data ?? [];
        $intro        = $data['intro'] ?? [];
        $highlights   = $data['highlights'] ?? [];
        $howTo        = $data['how_to_become'] ?? [];
        $whyBecome    = $data['why_become'] ?? [];
        $recognition  = $data['recognition'] ?? [];
        $certProcess  = $data['certification_process'] ?? [];
        $network      = $data['network'] ?? [];
        $saveMoney    = $data['save_money'] ?? [];
        $featureBoxes = $data['feature_boxes'] ?? [];
        $specCerts    = $data['specialized_certs'] ?? [];
        $sixChapters  = $data['six_chapters'] ?? [];
        $globalBox    = $data['going_global_box'] ?? [];
        $charityBox   = $data['charity_box'] ?? [];
        $testHeading  = $data['testimonial_heading'] ?? [];
        $testimonials = $data['testimonials'] ?? [];
        $companies    = $data['companies_carousel'] ?? [];
        $cta          = $data['become_member_cta'] ?? [];
    @endphp

    {{-- Intro: Professional Membership Benefits --}}
    @if (! empty($intro))
    <section class="bg-white py-14">
        <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            <div>
                <h3 class="text-[26px] md:text-[34px] font-bold text-[#14166e] mb-5">{!! $intro['heading_html'] ?? '' !!}</h3>
                @if (! empty($intro['subheading_1']))
                <h5 class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-4">{{ $intro['subheading_1'] }}</h5>
                @endif
                @if (! empty($intro['subheading_2_html']))
                <h5 class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{!! $intro['subheading_2_html'] !!}</h5>
                @endif
            </div>
            @if (! empty($intro['image']))
            <div>
                <img src="{{ $intro['image'] }}" alt="Professional Membership Benefits" class="w-full h-auto rounded-md" />
            </div>
            @else
            <div class="hidden md:block"></div>
            @endif
        </div>
    </section>
    @endif

    {{-- Three highlight columns: Suitable for / Criteria / Cost --}}
    @if (! empty($highlights))
    <section class="bg-[#f6f8fb] py-12">
        <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-3 gap-6">
            @foreach ($highlights as $h)
            <div class="bg-white rounded-md shadow-sm p-6">
                @if (! empty($h['icon_image']))
                <img src="{{ $h['icon_image'] }}" alt="" class="w-[64px] h-[64px] mb-4" />
                @endif
                <h3 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-2">{{ $h['title'] ?? '' }}</h3>
                <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{!! $h['description_html'] ?? '' !!}</p>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    {{-- How to Become a Professional Member --}}
    @if (! empty($howTo))
    <section class="bg-white py-14">
        <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            @if (! empty($howTo['image']))
            <div>
                <img src="{{ $howTo['image'] }}" alt="How to become a professional member" class="w-full h-auto rounded-md" />
            </div>
            @else
            <div class="hidden md:block"></div>
            @endif
            <div>
                <h3 class="text-[26px] md:text-[34px] font-bold text-[#14166e] mb-6">{!! $howTo['heading_html'] ?? '' !!}</h3>
                @if (! empty($howTo['steps']))
                <div class="space-y-5 mb-6">
                    @foreach ($howTo['steps'] as $step)
                    <div class="flex items-start gap-4">
                        @if (! empty($step['icon_image']))
                        <img src="{{ $step['icon_image'] }}" alt="" class="w-[48px] h-[48px] shrink-0" />
                        @else
                        <div class="w-[48px] h-[48px] shrink-0 rounded bg-[#f0b323]/20 flex items-center justify-center">
                            <span class="text-[#14166e] font-bold">{{ $loop->iteration }}</span>
                        </div>
                        @endif
                        <div>
                            <h3 class="text-[16px] md:text-[18px] font-bold text-[#14166e] mb-1">{{ $step['title'] ?? '' }}</h3>
                            <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $step['description'] ?? '' }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
                @if (! empty($howTo['button_text']))
                @isset($ctaProduct)
                <x-add-to-cart-button :product="$ctaProduct" :label="$howTo['button_text']" />
                @else
                <a href="{{ $howTo['button_url'] ?? '#' }}" class="inline-block bg-[#f0b323] hover:bg-yellow-500 text-[#14166e] font-bold text-[14px] px-6 py-3 rounded transition">
                    {{ $howTo['button_text'] }}
                </a>
                @endisset
                @endif
            </div>
        </div>
    </section>
    @endif

    {{-- Why become a professional member --}}
    @if (! empty($whyBecome))
    <section class="bg-[#f6f8fb] py-14">
        <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            <div>
                <h3 class="text-[26px] md:text-[34px] font-bold text-[#14166e] mb-5">{!! $whyBecome['heading_html'] ?? '' !!}</h3>
                <h5 class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{!! $whyBecome['text_html'] ?? '' !!}</h5>
            </div>
            @if (! empty($whyBecome['image']))
            <div>
                <img src="{{ $whyBecome['image'] }}" alt="Why become a professional member" class="w-full h-auto rounded-md" />
            </div>
            @endif
        </div>
    </section>
    @endif

    {{-- Professional Recognition --}}
    @if (! empty($recognition))
    <section class="bg-white py-14">
        <div class="max-w-[1100px] mx-auto px-4 text-center">
            @if (! empty($recognition['eyebrow']))
            <h3 class="text-[18px] md:text-[20px] font-semibold text-[#f0b323] mb-2 uppercase tracking-wide">{{ $recognition['eyebrow'] }}</h3>
            @endif
            <h3 class="text-[26px] md:text-[34px] font-bold text-[#14166e] mb-5">{!! $recognition['heading_html'] ?? '' !!}</h3>
            <h5 class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed max-w-4xl mx-auto">{{ $recognition['text'] ?? '' }}</h5>
        </div>
    </section>
    @endif

    {{-- AAPSCM® Certification Process --}}
    @if (! empty($certProcess))
    <section class="bg-[#0B2F5E] py-14">
        <div class="max-w-[1200px] mx-auto px-4">
            <h2 class="text-[24px] md:text-[32px] font-bold text-white text-center mb-10">{{ $certProcess['heading'] ?? '' }}</h2>
            @if (! empty($certProcess['steps']))
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5">
                @foreach ($certProcess['steps'] as $s)
                <div class="bg-white rounded-md shadow-sm p-6 flex flex-col">
                    <h2 class="text-[34px] font-bold text-[#f0b323] mb-2">{{ $s['number'] ?? '' }}</h2>
                    <h2 class="text-[16px] md:text-[18px] font-bold text-[#14166e] mb-3">{{ $s['title'] ?? '' }}</h2>
                    <p class="text-[14px] text-gray-700 leading-relaxed mb-4 flex-1">{{ $s['text'] ?? '' }}</p>
                    @if (! empty($s['button_text']))
                    <a href="{{ $s['button_url'] ?? '#' }}" class="inline-flex items-center gap-2 text-[#14166e] font-bold text-[13px] hover:text-[#f0b323] transition">
                        <span>{{ $s['button_text'] }}</span>
                        <span aria-hidden="true">→</span>
                    </a>
                    @endif
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    @endif

    {{-- Join the professional network --}}
    @if (! empty($network))
    <section class="bg-white py-14">
        <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            @if (! empty($network['image']))
            <div>
                <img src="{{ $network['image'] }}" alt="Join the professional network" class="w-full h-auto rounded-md" />
            </div>
            @else
            <div class="hidden md:block"></div>
            @endif
            <div>
                <h3 class="text-[26px] md:text-[34px] font-bold text-[#14166e] mb-5">{!! $network['heading_html'] ?? '' !!}</h3>
                <h5 class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{!! $network['text_html'] ?? '' !!}</h5>
            </div>
        </div>
    </section>
    @endif

    {{-- Save yourself some money --}}
    @if (! empty($saveMoney))
    <section class="bg-[#f6f8fb] py-14">
        <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            <div>
                <h3 class="text-[26px] md:text-[34px] font-bold text-[#14166e] mb-5">{!! $saveMoney['heading_html'] ?? '' !!}</h3>
                <h5 class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed whitespace-pre-line">{{ $saveMoney['text'] ?? '' }}</h5>
            </div>
            @if (! empty($saveMoney['image']))
            <div>
                <img src="{{ $saveMoney['image'] }}" alt="" class="w-full h-auto rounded-md" />
            </div>
            @else
            <div class="hidden md:block"></div>
            @endif
        </div>
    </section>
    @endif

    {{-- Feature boxes: Going Global / Charity Events --}}
    @if (! empty($featureBoxes))
    <section class="bg-white py-12">
        <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 gap-6">
            @foreach ($featureBoxes as $fb)
            <div class="bg-[#f6f8fb] rounded-md p-8">
                <div class="w-[56px] h-[56px] rounded-full bg-[#f0b323]/20 flex items-center justify-center mb-4">
                    <span class="text-[24px] text-[#14166e]" aria-hidden="true">
                        @if (($fb['icon'] ?? '') === 'globe') ◍ @else ◐ @endif
                    </span>
                </div>
                <h2 class="text-[20px] md:text-[22px] font-bold text-[#14166e] mb-2">{{ $fb['title'] ?? '' }}</h2>
                <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $fb['text'] ?? '' }}</p>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    {{-- Hidden-on-desktop info row from source: Specialized Certs / Six Chapters / Going Global / Charity --}}
    <section class="bg-[#f6f8fb] py-12">
        <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @if (! empty($specCerts))
            <div class="bg-white rounded-md shadow-sm p-6">
                <h3 class="text-[16px] md:text-[18px] font-bold text-[#14166e] mb-4">{{ $specCerts['title'] ?? '' }}</h3>
                <ul class="space-y-2">
                    @foreach (($specCerts['items'] ?? []) as $it)
                    <li class="text-[13px] md:text-[14px]">
                        <a href="{{ $it['url'] }}" class="text-[#14166e] hover:text-[#f0b323] font-semibold leading-snug block">{{ $it['title'] }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (! empty($sixChapters))
            <div class="bg-white rounded-md shadow-sm p-6">
                <h3 class="text-[16px] md:text-[18px] font-bold text-[#14166e] mb-2">{{ $sixChapters['title'] ?? '' }}</h3>
                @if (! empty($sixChapters['description']))
                <p class="text-[13px] text-gray-700 mb-3 leading-relaxed">{{ $sixChapters['description'] }}</p>
                @endif
                <ul class="space-y-2">
                    @foreach (($sixChapters['items'] ?? []) as $it)
                    <li class="text-[13px] md:text-[14px]">
                        <a href="{{ $it['url'] }}" class="text-[#14166e] hover:text-[#f0b323] font-semibold leading-snug block">{{ $it['title'] }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (! empty($globalBox))
            <div class="bg-white rounded-md shadow-sm p-6">
                <h3 class="text-[16px] md:text-[18px] font-bold text-[#14166e] mb-2">{{ $globalBox['title'] ?? '' }}</h3>
                <p class="text-[13px] md:text-[14px] text-gray-700 leading-relaxed">{!! $globalBox['text_html'] ?? '' !!}</p>
            </div>
            @endif

            @if (! empty($charityBox))
            <div class="bg-white rounded-md shadow-sm p-6">
                <h3 class="text-[16px] md:text-[18px] font-bold text-[#14166e] mb-2">{{ $charityBox['title'] ?? '' }}</h3>
                <p class="text-[13px] md:text-[14px] text-gray-700 leading-relaxed">{{ $charityBox['text'] ?? '' }}</p>
            </div>
            @endif
        </div>
    </section>

    {{-- Testimonial heading --}}
    @if (! empty($testHeading))
    <section class="bg-white pt-14 pb-6">
        <div class="max-w-[1100px] mx-auto px-4 text-center">
            @if (! empty($testHeading['eyebrow']))
            <h3 class="text-[16px] md:text-[18px] font-semibold text-[#f0b323] mb-2 uppercase tracking-wide">{{ $testHeading['eyebrow'] }}</h3>
            @endif
            <h3 class="text-[26px] md:text-[34px] font-bold text-[#14166e]">{{ $testHeading['heading'] ?? '' }}</h3>
        </div>
    </section>
    @endif

    {{-- Testimonials grid --}}
    @if (! empty($testimonials))
    <section class="bg-white pb-14">
        <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($testimonials as $t)
            <div class="bg-[#f6f8fb] rounded-md p-6 shadow-sm">
                <div class="text-[#f0b323] text-[22px] mb-2" aria-hidden="true">“</div>
                <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed mb-4">{{ $t['text'] ?? '' }}</p>
                @if (! empty($t['name']))
                <cite class="not-italic text-[14px] font-bold text-[#14166e] block">— {{ $t['name'] }}</cite>
                @endif
            </div>
            @endforeach
        </div>
    </section>
    @endif

    {{-- Companies Hiring Our Members carousel (static grid here) --}}
    @if (! empty($companies))
    <section class="bg-[#f6f8fb] py-14">
        <div class="max-w-[1200px] mx-auto px-4">
            <h2 class="text-[24px] md:text-[32px] font-bold text-[#14166e] text-center mb-8">{{ $companies['heading'] ?? '' }}</h2>
            @if (! empty($companies['images']))
            <div class="flex flex-wrap justify-center items-center gap-6">
                @foreach ($companies['images'] as $imgUrl)
                <img src="{{ $imgUrl }}" alt="Hiring company" class="w-[100px] h-[100px] object-contain" />
                @endforeach
            </div>
            @endif
        </div>
    </section>
    @endif

    {{-- Become a Member today CTA + form --}}
    @if (! empty($cta))
    <section class="bg-[#0B2F5E] py-14">
        <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            <div>
                @if (! empty($cta['image']))
                <img src="{{ $cta['image'] }}" alt="" class="w-full max-w-[500px] h-auto mb-6" />
                @endif
                <h3 class="text-[26px] md:text-[34px] font-bold text-white mb-5">{{ $cta['heading'] ?? '' }}</h3>
                @if (! empty($cta['button_text']))
                <a href="{{ $cta['button_url'] ?? '#' }}" class="inline-block bg-[#f0b323] hover:bg-yellow-500 text-[#14166e] font-bold text-[14px] px-6 py-3 rounded transition">
                    {{ $cta['button_text'] }}
                </a>
                @endif
            </div>
            <div>
                <form method="post" action="#" class="bg-white rounded-md p-6 shadow-md space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="pm-fname" class="block text-[13px] font-semibold text-[#14166e] mb-1">First name*</label>
                            <input id="pm-fname" type="text" name="first_name" class="w-full border border-gray-300 rounded px-3 py-2 text-[14px] focus:outline-none focus:border-[#f0b323]" />
                        </div>
                        <div>
                            <label for="pm-lname" class="block text-[13px] font-semibold text-[#14166e] mb-1">Last name*</label>
                            <input id="pm-lname" type="text" name="last_name" class="w-full border border-gray-300 rounded px-3 py-2 text-[14px] focus:outline-none focus:border-[#f0b323]" />
                        </div>
                    </div>
                    <div>
                        <label for="pm-email" class="block text-[13px] font-semibold text-[#14166e] mb-1">Email</label>
                        <input id="pm-email" type="email" name="email" required placeholder="Email" class="w-full border border-gray-300 rounded px-3 py-2 text-[14px] focus:outline-none focus:border-[#f0b323]" />
                    </div>
                    <button type="submit" class="bg-[#f0b323] hover:bg-yellow-500 text-[#14166e] font-bold text-[14px] px-6 py-3 rounded transition w-full">SIGN UP</button>
                </form>
            </div>
        </div>
    </section>
    @endif
</x-layouts.cms>
