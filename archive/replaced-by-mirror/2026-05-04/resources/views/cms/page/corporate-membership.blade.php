<x-layouts.cms>
    <x-cms.seo-head :page="$page" />

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    @php
        $data            = $page->page_data ?? [];
        $hero            = $data['hero'] ?? [];
        $importanceIcon  = $data['importance_icon'] ?? null;
        $importance      = $data['importance'] ?? [];
        $conclusion      = $data['conclusion'] ?? '';
        $trainingEyebrow = $data['training_eyebrow'] ?? '';
        $advantages      = $data['advantages'] ?? [];
        $corpIntro       = $data['corporate_intro'] ?? [];
        $corpAdvIntro    = $data['corporate_advantages_intro'] ?? [];
        $aapscmAdv       = $data['aapscm_advantages'] ?? [];
        $fee             = $data['fee'] ?? [];
        $whoJoin         = $data['who_should_join'] ?? [];
        $cta             = $data['cta'] ?? [];
        $appForm         = $data['application_form'] ?? [];
        $training        = $data['training'] ?? [];
        $trainingAdv     = $data['training_advantages'] ?? [];
    @endphp

    {{-- Hero: 3 columns: image | text+button | image --}}
    @if (! empty($hero))
    <section class="bg-white py-14">
        <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-3 gap-8 items-center">
            @if (! empty($hero['image_left']))
            <div class="flex justify-center">
                <img src="{{ $hero['image_left'] }}" alt="" class="w-full max-w-[437px] h-auto rounded-md" />
            </div>
            @endif
            <div class="text-center md:text-left">
                @if (! empty($hero['eyebrow']))
                <h4 class="text-[18px] md:text-[20px] font-semibold text-[#f0b323] mb-3">{{ $hero['eyebrow'] }}</h4>
                @endif
                <h2 class="text-[24px] md:text-[30px] font-bold text-[#14166e] mb-4 leading-snug">{{ $hero['heading'] ?? '' }}</h2>
                @if (! empty($hero['subheading']))
                <h4 class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-6">{{ $hero['subheading'] }}</h4>
                @endif
                @if (! empty($hero['button_text']))
                <a href="{{ $hero['button_url'] ?? '#' }}" class="inline-block bg-[#f0b323] hover:bg-yellow-500 text-[#14166e] font-bold text-[15px] px-7 py-3 rounded transition">
                    {{ $hero['button_text'] }}
                </a>
                @endif
            </div>
            @if (! empty($hero['image_right']))
            <div class="flex justify-center">
                <img src="{{ $hero['image_right'] }}" alt="" class="w-full max-w-[476px] h-auto rounded-md" />
            </div>
            @endif
        </div>
    </section>
    @endif

    {{-- Importance items: 3-column grid of icon cards --}}
    @if (! empty($importance))
    <section class="bg-[#f6f8fb] py-14">
        <div class="max-w-[1200px] mx-auto px-4 grid sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach ($importance as $item)
            <div class="bg-white rounded-lg p-6 shadow-sm text-center">
                @if (! empty($importanceIcon))
                <img src="{{ $importanceIcon }}" alt="" class="w-[80px] h-[80px] mx-auto mb-4" />
                @endif
                <h2 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-3">{{ $item['title'] ?? '' }}</h2>
                <h4 class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $item['text'] ?? '' }}</h4>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    {{-- Conclusion --}}
    @if (! empty($conclusion))
    <section class="bg-white py-12">
        <div class="max-w-[1100px] mx-auto px-4 text-center">
            <h4 class="text-[16px] md:text-[18px] text-gray-800 leading-relaxed whitespace-pre-line">{{ $conclusion }}</h4>
        </div>
    </section>
    @endif

    {{-- Training Opportunities eyebrow --}}
    @if (! empty($trainingEyebrow))
    <section class="bg-[#0B2F5E] py-8">
        <div class="max-w-[1200px] mx-auto px-4 text-center">
            <h4 class="text-[22px] md:text-[28px] font-bold text-white">{{ $trainingEyebrow }}</h4>
        </div>
    </section>
    @endif

    {{-- Advantages heading + intro --}}
    @if (! empty($advantages))
    <section class="bg-white pt-14 pb-6">
        <div class="max-w-[1100px] mx-auto px-4 text-center">
            <h2 class="text-[24px] md:text-[32px] font-bold text-[#14166e] mb-4 leading-snug">{{ $advantages['heading'] ?? '' }}</h2>
            @if (! empty($advantages['subheading']))
            <h4 class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed max-w-4xl mx-auto">{{ $advantages['subheading'] }}</h4>
            @endif
        </div>
    </section>

    {{-- Advantages items: 2-column alternating grid --}}
    <section class="bg-white pb-14">
        <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-10">
            @foreach ($advantages['items'] ?? [] as $item)
            <div class="bg-[#f6f8fb] rounded-lg p-6">
                <div class="text-[42px] md:text-[52px] font-bold text-[#f0b323] leading-none mb-3">{{ $item['number'] ?? '' }}</div>
                <h2 class="text-[20px] md:text-[22px] font-bold text-[#14166e] mb-3">{{ $item['title'] ?? '' }}</h2>
                @if (! empty($item['text']))
                <h4 class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed mb-4">{{ $item['text'] }}</h4>
                @endif
                @if (! empty($item['features']))
                <ul class="space-y-2">
                    @foreach ($item['features'] as $f)
                    <li class="flex items-start gap-2">
                        <svg class="w-[16px] h-[16px] text-[#14166e] mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-[14px] text-gray-700 leading-relaxed">{!! $f !!}</span>
                    </li>
                    @endforeach
                </ul>
                @endif
                @if (! empty($item['footer']))
                <h4 class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed mt-4 italic">{{ $item['footer'] }}</h4>
                @endif
            </div>
            @endforeach
        </div>
    </section>
    @endif

    {{-- Corporate Membership with AAPSCM intro --}}
    @if (! empty($corpIntro))
    <section class="bg-[#0B2F5E] py-14">
        <div class="max-w-[1100px] mx-auto px-4 text-center">
            <h2 class="text-[26px] md:text-[34px] font-bold text-white mb-3">{{ $corpIntro['heading'] ?? '' }}</h2>
            @if (! empty($corpIntro['tagline']))
            <h4 class="text-[18px] md:text-[20px] font-semibold text-[#f0b323] mb-5">{{ $corpIntro['tagline'] }}</h4>
            @endif
            @if (! empty($corpIntro['text']))
            <h4 class="text-[15px] md:text-[16px] text-gray-200 leading-relaxed max-w-4xl mx-auto">{{ $corpIntro['text'] }}</h4>
            @endif
        </div>
    </section>
    @endif

    {{-- Corporate Advantages of Joining AAPSCM intro --}}
    @if (! empty($corpAdvIntro))
    <section class="bg-white py-12">
        <div class="max-w-[1100px] mx-auto px-4 text-center">
            <h2 class="text-[24px] md:text-[30px] font-bold text-[#14166e] mb-4">{{ $corpAdvIntro['heading'] ?? '' }}</h2>
            @if (! empty($corpAdvIntro['text']))
            <h4 class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed max-w-4xl mx-auto">{{ $corpAdvIntro['text'] }}</h4>
            @endif
        </div>
    </section>
    @endif

    {{-- AAPSCM advantage cards --}}
    @if (! empty($aapscmAdv))
    <section class="bg-[#f6f8fb] py-14">
        <div class="max-w-[1200px] mx-auto px-4 grid sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($aapscmAdv as $card)
            <div class="bg-white rounded-lg p-6 shadow-sm">
                <h2 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-3">{{ $card['title'] ?? '' }}</h2>
                @if (! empty($card['subtitle']))
                <h4 class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed mb-4 whitespace-pre-line">{{ $card['subtitle'] }}</h4>
                @endif
                @if (! empty($card['features']))
                <ul class="space-y-2 mb-4">
                    @foreach ($card['features'] as $f)
                    <li class="flex items-start gap-2">
                        <svg class="w-[16px] h-[16px] text-[#f0b323] mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-[14px] text-gray-700 leading-relaxed">{!! $f !!}</span>
                    </li>
                    @endforeach
                </ul>
                @endif
                @if (! empty($card['sub_heading']))
                <h4 class="text-[14px] md:text-[15px] font-semibold text-[#14166e] mt-4 mb-2">{{ $card['sub_heading'] }}</h4>
                @endif
                @if (! empty($card['sub_features']))
                <ul class="space-y-2">
                    @foreach ($card['sub_features'] as $f)
                    <li class="flex items-start gap-2">
                        <svg class="w-[16px] h-[16px] text-[#f0b323] mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-[14px] text-gray-700 leading-relaxed">{{ $f }}</span>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
            @endforeach
        </div>
    </section>
    @endif

    {{-- Fee section --}}
    @if (! empty($fee))
    <section class="bg-white py-14">
        <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            <div class="bg-[#0B2F5E] text-white rounded-lg p-8 text-center">
                <h2 class="text-[22px] md:text-[28px] font-bold mb-2">{{ $fee['heading'] ?? '' }}</h2>
                @isset($ctaProduct)
                <div class="mt-4">
                    <x-add-to-cart-button :product="$ctaProduct" label="Join Now" />
                </div>
                @endisset
            </div>
            <div>
                @if (! empty($fee['subtitle']))
                <h4 class="text-[16px] md:text-[18px] font-semibold text-[#14166e] mb-4">{{ $fee['subtitle'] }}</h4>
                @endif
                @if (! empty($fee['includes']))
                <ul class="space-y-2 mb-5">
                    @foreach ($fee['includes'] as $f)
                    <li class="flex items-start gap-2">
                        <svg class="w-[18px] h-[18px] text-[#f0b323] mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-[15px] text-gray-700 leading-relaxed">{{ $f }}</span>
                    </li>
                    @endforeach
                </ul>
                @endif
                @if (! empty($fee['roi_note']))
                <p class="text-[14px] md:text-[15px] text-[#14166e] font-semibold leading-relaxed">{{ $fee['roi_note'] }}</p>
                @endif
            </div>
        </div>
    </section>
    @endif

    {{-- Who Should Join --}}
    @if (! empty($whoJoin))
    <section class="bg-[#f6f8fb] py-14">
        <div class="max-w-[1100px] mx-auto px-4">
            <h2 class="text-[24px] md:text-[30px] font-bold text-[#14166e] mb-3 text-center">{{ $whoJoin['heading'] ?? '' }}</h2>
            @if (! empty($whoJoin['subtitle']))
            <h4 class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-6 text-center">{{ $whoJoin['subtitle'] }}</h4>
            @endif
            @if (! empty($whoJoin['items']))
            <ul class="grid sm:grid-cols-2 gap-3 max-w-3xl mx-auto">
                @foreach ($whoJoin['items'] as $f)
                <li class="flex items-start gap-2 bg-white rounded p-4 shadow-sm">
                    <svg class="w-[18px] h-[18px] text-[#f0b323] mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-[15px] text-gray-700 leading-relaxed">{{ $f }}</span>
                </li>
                @endforeach
            </ul>
            @endif
        </div>
    </section>
    @endif

    {{-- CTA --}}
    @if (! empty($cta))
    <section class="bg-[#0B2F5E] py-14">
        <div class="max-w-[1100px] mx-auto px-4 text-center">
            <h3 class="text-[24px] md:text-[32px] font-bold text-white mb-4">{{ $cta['heading'] ?? '' }}</h3>
            @if (! empty($cta['text']))
            <p class="text-[15px] md:text-[16px] text-gray-200 leading-relaxed mb-6 max-w-3xl mx-auto">{{ $cta['text'] }}</p>
            @endif
            <ul class="flex flex-wrap justify-center gap-x-8 gap-y-3 text-white text-[14px] md:text-[15px] mb-3">
                @if (! empty($cta['email']))
                <li>Email: <a href="mailto:{{ $cta['email'] }}" class="text-[#f0b323] hover:underline">{{ $cta['email'] }}</a></li>
                @endif
                @if (! empty($cta['phone']))
                <li>Phone (USA): {{ $cta['phone'] }}</li>
                @endif
            </ul>
            @if (! empty($cta['mena']))
            <p class="text-[14px] md:text-[15px] text-gray-200"><span class="font-bold">For MENA Region Contact</span>: {{ str_replace('For MENA Region Contact: ', '', $cta['mena']) }}</p>
            @endif
        </div>
    </section>
    @endif

    {{-- Application form --}}
    @if (! empty($appForm))
    <section id="application-fm" class="bg-white py-14">
        <div class="max-w-[1100px] mx-auto px-4">
            <h2 class="text-[24px] md:text-[32px] font-bold text-[#14166e] mb-2 text-center">{{ $appForm['heading'] ?? '' }}</h2>
            @if (! empty($appForm['subtitle']))
            <h4 class="text-[15px] md:text-[18px] text-gray-700 mb-8 text-center">{{ $appForm['subtitle'] }}</h4>
            @endif
            <form action="#application-fm" method="post" class="bg-[#f6f8fb] rounded-lg p-6 md:p-8 grid md:grid-cols-2 gap-5">
                @csrf
                @foreach ($appForm['fields'] ?? [] as $field)
                <div>
                    <label class="block text-[14px] font-semibold text-[#14166e] mb-1">{{ $field['label'] }}</label>
                    <input type="{{ $field['type'] }}" name="{{ $field['name'] }}" class="w-full border border-gray-300 rounded px-3 py-2 text-[14px] focus:outline-none focus:border-[#14166e]" />
                </div>
                @endforeach
                @if (! empty($appForm['industry_sectors']))
                <div class="md:col-span-2">
                    <label class="block text-[14px] font-semibold text-[#14166e] mb-2">Industry Sector</label>
                    <div class="flex flex-wrap gap-4">
                        @foreach ($appForm['industry_sectors'] as $s)
                        <label class="flex items-center gap-2 text-[14px] text-gray-700">
                            <input type="checkbox" name="industry_sector[]" value="{{ $s }}" class="rounded border-gray-300" />
                            <span>{{ $s }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>
                @endif
                <div class="md:col-span-2 text-center pt-3">
                    <button type="submit" class="inline-block bg-[#f0b323] hover:bg-yellow-500 text-[#14166e] font-bold text-[15px] px-8 py-3 rounded transition">
                        {{ $appForm['submit_label'] ?? 'Submit' }}
                    </button>
                </div>
            </form>
        </div>
    </section>
    @endif

    {{-- Training Opportunities --}}
    @if (! empty($training))
    <section class="bg-[#f6f8fb] py-14">
        <div class="max-w-[1100px] mx-auto px-4 text-center">
            <h2 class="text-[24px] md:text-[32px] font-bold text-[#14166e] mb-3">{{ $training['heading'] ?? '' }}</h2>
            @if (! empty($training['subtitle']))
            <p class="text-[16px] md:text-[18px] text-[#f0b323] font-semibold mb-5">{{ $training['subtitle'] }}</p>
            @endif
            @if (! empty($training['text']))
            <div class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed max-w-4xl mx-auto whitespace-pre-line">{{ $training['text'] }}</div>
            @endif
        </div>
    </section>
    @endif

    {{-- Training Advantages --}}
    @if (! empty($trainingAdv))
    <section class="bg-white py-14">
        <div class="max-w-[1100px] mx-auto px-4">
            <h2 class="text-[24px] md:text-[30px] font-bold text-[#14166e] mb-6 text-center">{{ $trainingAdv['heading'] ?? '' }}</h2>
            @if (! empty($trainingAdv['items']))
            <ul class="grid sm:grid-cols-2 gap-3 max-w-3xl mx-auto">
                @foreach ($trainingAdv['items'] as $f)
                <li class="flex items-start gap-2 bg-[#f6f8fb] rounded p-4">
                    <svg class="w-[18px] h-[18px] text-[#f0b323] mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-[15px] text-gray-700 leading-relaxed">{{ $f }}</span>
                </li>
                @endforeach
            </ul>
            @endif
        </div>
    </section>
    @endif
</x-layouts.cms>
