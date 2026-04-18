<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $hero        = $page->page_data['hero']             ?? [];
        $whyJoin     = $page->page_data['why_join']         ?? [];
        $tiers       = $page->page_data['tiers']            ?? [];
        $deliver     = $page->page_data['deliver_trust']    ?? [];
        $invite      = $page->page_data['affiliate_invite'] ?? [];
        $advCards    = $page->page_data['advantage_cards']  ?? [];
        $advIntro    = $page->page_data['advantages_intro'] ?? [];
        $keyBenefits = $page->page_data['key_benefits']     ?? [];
        $ideal       = $page->page_data['ideal_candidates'] ?? [];
        $apply       = $page->page_data['apply_cta']        ?? [];
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- Hero (2-col) --}}
    <section class="bg-white py-16">
        <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            <div>
                <h3 class="text-[24px] md:text-[30px] font-medium text-gray-700 leading-tight mb-2">
                    Gain a Competitive <span class="font-semibold text-[#14166e]">Edge</span>
                </h3>
                <h3 class="text-[26px] md:text-[34px] font-semibold text-[#14166e] leading-tight mb-6">
                    {{ $hero['heading'] ?? '' }}
                </h3>
                @if (! empty($hero['body']))
                    <p class="text-[16px] text-gray-700 leading-relaxed mb-6">
                        The <b>AAPSCM® Authorized Training Partner program</b> equips you with the tools and resources to distinguish yourself in a competitive market. Benefits include access to <b>AAPSCM®</b> licensed and approved training content, high-quality instructional support, and comprehensive marketing and sales assistance. Effective January 31, 2021, the <b>AAPSCM®</b> Authorized Partner Program was extended to other countries and regions outside the US.
                    </p>
                @endif
                <div class="flex flex-wrap gap-4">
                    @if (! empty($hero['brochure_url']))
                        <a href="{{ $hero['brochure_url'] }}" class="inline-flex items-center bg-[#14166e] text-white text-[14px] font-semibold px-5 py-2 rounded hover:bg-[#1f2099]">
                            {{ $hero['brochure_label'] ?? 'REVIEWATP Brochure' }}
                        </a>
                    @endif
                    @if (! empty($hero['apply_url']))
                        <a href="{{ $hero['apply_url'] }}" class="inline-flex items-center bg-white border-2 border-[#14166e] text-[#14166e] text-[14px] font-semibold px-5 py-2 rounded hover:bg-[#14166e] hover:text-white">
                            {{ $hero['apply_label'] ?? 'CLICK HERE TO APPLY' }}
                        </a>
                    @endif
                </div>
            </div>
            @if (! empty($hero['image']))
                <div class="flex justify-center">
                    <img src="{{ $hero['image'] }}" alt="" class="max-w-full h-auto">
                </div>
            @endif
        </div>
    </section>

    {{-- Why Join --}}
    <section class="bg-[#f6f8fb] py-16">
        <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            @if (! empty($whyJoin['image']))
                <div class="flex justify-center">
                    <img src="{{ $whyJoin['image'] }}" alt="" class="max-w-full h-auto">
                </div>
            @endif
            <div>
                <h3 class="text-[26px] md:text-[34px] font-semibold text-[#14166e] leading-tight mb-6">
                    Why <span class="font-bold">Join</span>?
                </h3>
                @foreach (($whyJoin['items'] ?? []) as $item)
                    <div class="mb-6">
                        <h3 class="text-[18px] md:text-[20px] font-semibold text-[#14166e] mb-2">{{ $item['title'] }}</h3>
                        <p class="text-[15px] text-gray-700 leading-relaxed">{{ $item['body'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Tiers (Options That Fit Your Business Model) --}}
    <section class="bg-white py-16">
        <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 gap-10">
            <div>
                @if (! empty($tiers['image']))
                    <img src="{{ $tiers['image'] }}" alt="" class="max-w-full h-auto mb-6 md:hidden">
                @endif
                <h3 class="text-[26px] md:text-[34px] font-semibold text-[#14166e] leading-tight mb-3">
                    Options That Fit Your Business <span class="font-bold">Model</span>
                </h3>
                <h3 class="text-[16px] md:text-[18px] font-medium text-gray-700 mb-6">
                    The <b class="text-[#14166e]">AAPSCM®</b> Authorized Training Partner program offers two distinct tiers to align with your organization's needs:
                </h3>
                <div class="space-y-6">
                    @foreach (($tiers['items'] ?? []) as $tier)
                        <div class="bg-[#f6f8fb] border-l-4 border-[#14166e] rounded p-5">
                            <h3 class="text-[18px] font-semibold text-[#14166e] mb-3">{{ $tier['title'] }}</h3>
                            <ul class="space-y-2">
                                @foreach ($tier['features'] as $f)
                                    <li class="flex gap-3 text-[15px] text-gray-700">
                                        <span class="text-[#14166e] shrink-0 mt-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" class="w-4 h-4"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                        </span>
                                        <span>{!! nl2br(e($f)) !!}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="hidden md:flex justify-center items-start"></div>
        </div>
    </section>

    {{-- Deliver Trust --}}
    <section class="bg-[#fef5ef] py-16">
        <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-start">
            <div></div>
            <div>
                <h3 class="text-[26px] md:text-[34px] font-semibold text-[#14166e] leading-tight mb-4">
                    Deliver Training Your Students Can <span class="font-bold">Trust</span>
                </h3>
                <p class="text-[15px] text-gray-700 leading-relaxed mb-6">
                    As an <b class="text-[#14166e]">AAPSCM®</b> Authorized Training Partner, you'll provide verified, vetted exam prep using AAPSCM®-developed course content and test bank materials—ensuring that your students receive the highest quality instruction. Your team will also benefit from the backing of AAPSCM®, which offers:
                </p>
                <ul class="space-y-3 mb-6">
                    @foreach (($deliver['items'] ?? []) as $line)
                        <li class="flex gap-3 text-[15px] text-gray-700">
                            <span class="text-[#14166e] shrink-0 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" class="w-4 h-4"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            </span>
                            <span>{{ $line }}</span>
                        </li>
                    @endforeach
                </ul>
                @if (! empty($deliver['closing']))
                    <p class="text-[15px] text-gray-700 leading-relaxed italic">
                        By partnering with <b class="text-[#14166e]">AAPSCM®</b>, you'll stand out in the market, uphold the highest training standards, and empower students to excel in their professional journeys.
                    </p>
                @endif
            </div>
        </div>
    </section>

    {{-- Affiliate invite --}}
    <section class="bg-white py-14">
        <div class="max-w-[1000px] mx-auto px-4">
            <h3 class="text-[26px] md:text-[34px] font-semibold text-[#14166e] leading-tight mb-4 text-center">
                Join the Affiliate Partner <span class="font-bold">Program</span>
            </h3>
            <p class="text-[15px] text-gray-700 leading-relaxed text-center">
                Become an AAPSCM® Affiliate Partner in your region and earn full accreditation for your territory. By joining now, you'll receive comprehensive support to build regional leadership, execute effective marketing strategies, and leverage our logo and trademarks. As part of our Spartanburg SC Charter, you can offer tailored solutions that address your customers' unique course needs, powered by our course materials and test bank resources. If you're ready to begin, please email
                <a href="/cdn-cgi/l/email-protection" class="__cf_email__ text-[#14166e] underline" data-cfemail="{{ $invite['email_cfmail'] ?? '' }}">[email&#160;protected]</a>
                and we'll schedule a Zoom meeting to get you started.
            </p>
        </div>
    </section>

    {{-- 5-card advantage grid --}}
    <section class="bg-[#f6f8fb] py-14">
        <div class="max-w-[1200px] mx-auto px-4 grid sm:grid-cols-2 md:grid-cols-3 gap-6 mb-6">
            @foreach (array_slice($advCards, 0, 3) as $card)
                <div class="bg-white rounded-lg p-6 text-center shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px]">
                    <img src="{{ $card['image'] }}" alt="" class="w-[100px] h-auto object-contain mx-auto mb-4">
                    <h2 class="text-[18px] font-semibold text-[#14166e] mb-3">{{ $card['title'] }}</h2>
                    <p class="text-[14px] text-gray-700 leading-relaxed">{{ $card['body'] }}</p>
                </div>
            @endforeach
        </div>
        <div class="max-w-[900px] mx-auto px-4 grid sm:grid-cols-2 gap-6">
            @foreach (array_slice($advCards, 3, 2) as $card)
                <div class="bg-white rounded-lg p-6 text-center shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px]">
                    <img src="{{ $card['image'] }}" alt="" class="w-[100px] h-auto object-contain mx-auto mb-4">
                    <h2 class="text-[18px] font-semibold text-[#14166e] mb-3">{{ $card['title'] }}</h2>
                    <p class="text-[14px] text-gray-700 leading-relaxed">{{ $card['body'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Advantages intro + fee boxes --}}
    <section class="bg-white py-16">
        <div class="max-w-[1100px] mx-auto px-4">
            <h3 class="text-[26px] md:text-[34px] font-semibold text-[#14166e] leading-tight mb-3 text-center">
                Affiliate Training Partner <span class="font-bold">Advantages with AAPSCM®</span>
            </h3>
            <h3 class="text-[18px] md:text-[22px] font-medium text-gray-700 mb-6 text-center">
                {{ $advIntro['subheading'] ?? '' }}
            </h3>
            <p class="text-[15px] text-gray-700 leading-relaxed mb-4">
                <span>Partnering with the </span><b>American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®)</b><span> as an </span><b>Affiliate Training Partner</b><span> provides your organization with the authority, resources, and international credibility to offer our globally recognized certifications, trainings, and exams directly within your institution or network.</span>
            </p>
            <p class="text-[15px] text-gray-700 leading-relaxed mb-8">
                Whether you are a university, professional training firm, consulting agency, or SME, this partnership enables you to build professional capacity in your region while generating sustainable income.
            </p>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-[#f6f8fb] rounded-lg p-6 border-l-4 border-[#14166e]">
                    <h2 class="text-[18px] md:text-[20px] font-semibold text-[#14166e] mb-3">
                        {{ $advIntro['why_box']['heading'] ?? '' }}
                    </h2>
                    <p class="text-[15px] text-gray-700 leading-relaxed">{{ $advIntro['why_box']['body'] ?? '' }}</p>
                </div>
                <div class="bg-[#14166e] text-white rounded-lg p-6">
                    <h2 class="text-[18px] md:text-[20px] font-semibold mb-3">
                        {{ $advIntro['fee_box']['heading'] ?? '' }}
                    </h2>
                    <p class="text-[15px] leading-relaxed opacity-95">{{ $advIntro['fee_box']['body'] ?? '' }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Key Benefits 9-card grid --}}
    <section class="bg-[#f6f8fb] py-16">
        <div class="max-w-[1200px] mx-auto px-4">
            <h3 class="text-[26px] md:text-[34px] font-semibold text-[#14166e] leading-tight mb-10 text-center">
                {{ $keyBenefits['heading_pre'] ?? '' }} <span class="font-bold">{{ $keyBenefits['heading_accent'] ?? '' }}</span>
            </h3>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6 mb-6">
                @foreach (($keyBenefits['cards'] ?? []) as $card)
                    <div class="bg-white rounded-lg p-6 shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px] flex gap-4">
                        <img src="{{ $card['image'] }}" alt="" class="w-[60px] h-[60px] object-contain shrink-0">
                        <div>
                            <h3 class="text-[16px] font-semibold text-[#14166e] mb-2 leading-snug">{{ $card['title'] }}</h3>
                            <p class="text-[13px] text-gray-700 leading-relaxed">{{ $card['body'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            @if (! empty($keyBenefits['bottom_card']))
                <div class="max-w-[400px] mx-auto">
                    <div class="bg-white rounded-lg p-6 shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px] flex gap-4">
                        <img src="{{ $keyBenefits['bottom_card']['image'] }}" alt="" class="w-[60px] h-[60px] object-contain shrink-0">
                        <div>
                            <h3 class="text-[16px] font-semibold text-[#14166e] mb-2 leading-snug">{{ $keyBenefits['bottom_card']['title'] }}</h3>
                            <p class="text-[13px] text-gray-700 leading-relaxed">{{ $keyBenefits['bottom_card']['body'] }}</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    {{-- Ideal Candidates --}}
    <section class="bg-white py-16">
        <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            @if (! empty($ideal['image']))
                <div class="flex justify-center">
                    <img src="{{ $ideal['image'] }}" alt="" class="max-w-full h-auto">
                </div>
            @endif
            <div>
                <h3 class="text-[26px] md:text-[34px] font-semibold text-[#14166e] leading-tight mb-6">
                    Ideal Candidates for <span class="font-bold">Affiliate Training Partnership</span>
                </h3>
                <ul class="space-y-3">
                    @foreach (($ideal['items'] ?? []) as $line)
                        <li class="flex gap-3 text-[15px] text-gray-700">
                            <span class="text-[#14166e] shrink-0 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" class="w-4 h-4"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            </span>
                            <span>{{ $line }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    {{-- Apply CTA --}}
    <section class="bg-[#14166e] text-white py-16">
        <div class="max-w-[900px] mx-auto px-4 text-center">
            <h3 class="text-[26px] md:text-[34px] font-semibold leading-tight mb-6">
                Apply Today and Start Delivering <span class="font-bold">AAPSCM Certifications</span>
            </h3>
            <p class="text-[15px] leading-relaxed opacity-95 mb-8">{{ $apply['body'] ?? '' }}</p>
            <ul class="flex flex-wrap justify-center gap-x-8 gap-y-3 text-[15px]">
                <li><b>Email</b>: <a href="/cdn-cgi/l/email-protection" class="__cf_email__ underline" data-cfemail="{{ $apply['email_cfmail'] ?? '' }}">[email&#160;protected]</a></li>
                <li><b>USA</b>: {{ $apply['phones'] ?? '' }}</li>
            </ul>
        </div>
    </section>

</x-layouts.cms>
