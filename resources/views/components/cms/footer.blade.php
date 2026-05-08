{{--
    AAPSCM Footer — Light Professional + Dark Trust Bar
    ────────────────────────────────────────────────────────────────────────
    Section 1 : Brand + CTA          bg-[#F8FAFC]  — logo, description, 2 buttons
    Section 2 : Pathway Cards         bg-white      — 4 guided cards (always visible)
    Section 3 : Contact Bar + Panels  bg-[#08186A]  — office summary + 2 Alpine panels
                 Panel A : Full Office Details        (x-show="offices")
                 Panel B : Full Site Directory        (x-show="directory")
    Section 4 : Bottom Trust Bar      bg-[#0B1220]  — ICE badge | copyright | social

    All original labels, URLs, phone, fax, email, social, logo, ICE badge preserved.
    Data  : config/footer.php | Tailwind CSS v3 | Alpine.js v3
--}}

@php
    $u  = fn (string $p): string => rtrim(url(trim($p)), '/') . '/';
    $ft = config('footer');

    $socialSvg = [
        'facebook'  => '<path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/>',
        'instagram' => '<rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>',
        'linkedin'  => '<path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/>',
        'youtube'   => '<path d="M22.54 6.42a2.78 2.78 0 00-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 00-1.95 1.96A29 29 0 001 12a29 29 0 00.46 5.58 2.78 2.78 0 001.95 1.96C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 001.95-1.96A29 29 0 0023 12a29 29 0 00-.46-5.58z"/><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"/>',
        'tiktok'    => '<path d="M9 12a4 4 0 104 4V4a5 5 0 005 5"/>',
        'x'         => '<path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.741l7.73-8.835L1.254 2.25H8.08l4.213 5.567zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>',
    ];

    // Full site directory — every original link preserved, grouped for the expandable panel.
    $directory = [
        [
            'title' => 'Quick Links',
            'links' => [
                ['label' => 'Home',                                           'path' => '/'],
                ['label' => 'About Us',                                       'path' => '/about-us'],
                ['label' => 'Contact Us',                                     'path' => '/contact-us'],
                ['label' => 'User Dashboard',                                 'path' => '/dashboard'],
                ['label' => 'Non-Profit Activities, Charity &amp; Donations', 'path' => '/non-profit-activities-donation'],
                ['label' => 'Videos',                                         'path' => '/certificate-video'],
                ['label' => 'Donation',                                       'path' => '/donations'],
                ['label' => 'Certification Programs',                         'path' => '/certifications-for-professionals'],
                ['label' => 'Apply for Certification',                        'path' => '/membership'],
                ['label' => 'Become a Student Member',                        'path' => '/student-membership'],
                ['label' => 'Membership FAQs',                                'path' => '/membership-faqs'],
            ],
        ],
        [
            'title' => 'Certifications',
            'links' => [
                ['label' => 'Procurement Management',  'path' => '/procurement-management-certifications'],
                ['label' => 'Supply Chain Management', 'path' => '/supply-chain-management-certifications'],
                ['label' => 'Tourism Management',      'path' => '/tourism-management-certifications'],
                ['label' => 'E-Commerce Management',   'path' => '/e-commerce-certifications'],
                ['label' => 'Combined P&amp;SC',       'path' => '/combined-procurement-logistics-and-supply-chain-certifications'],
                ['label' => 'AI Courses',              'path' => '/artificial-intelligence-ai-courses'],
                ['label' => 'Certification Process',   'path' => '/certification-process'],
                ['label' => 'Verify a Certification',  'path' => '/verify-a-certificate'],
                ['label' => 'Digital Badges',          'path' => '/digital-badges'],
            ],
        ],
        [
            'title' => 'Organization',
            'links' => [
                ['label' => 'AAPSCM® Leadership',        'path' => '/board-of-directors'],
                ['label' => 'Affiliates/Partners',        'path' => '/affiliate-partners'],
                ['label' => 'Career Center/Job Seeker',   'path' => '/career-center'],
                ['label' => 'Privacy Policy/Legal Terms', 'path' => '/privacy-policy-legal'],
            ],
        ],
        [
            'title' => 'Career Center',
            'links' => [
                ['label' => 'Job Listing',       'path' => '/job-listing'],
                ['label' => 'Post Resume',        'path' => '/post-resume'],
                ['label' => 'Resume Evaluation',  'path' => '/resume-evaluation'],
                ['label' => 'View Job Seekers',   'path' => '/view-job-seekers'],
                ['label' => 'Job Opportunities',  'path' => '/post-job-opportunities'],
                ['label' => 'Member Services',    'path' => '/member-services'],
            ],
        ],
    ];
@endphp

<footer class="[&_a]:no-underline [&_p]:m-0" aria-label="Site footer">

{{-- ════════════════════════════════════════════════════════════════════════
     SECTION 1 — Brand + CTA
     Light background. Logo on the left, description below, buttons on right.
════════════════════════════════════════════════════════════════════════ --}}
<div class="bg-[#E8EDF4] border-b border-[#D4DCE9]">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-10 py-10">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-8">

            {{-- Logo + description --}}
            <div class="flex flex-col items-center md:items-start gap-3 md:max-w-[520px]">
                <a href="{{ $u('/') }}" aria-label="AAPSCM Home">
                    <img src="{{ $ft['brand']['logo_src'] }}"
                         alt="{{ $ft['brand']['logo_alt'] }}"
                         class="h-[80px] w-auto object-contain"
                         loading="lazy">
                </a>
                <p class="text-[14px] text-[#6B7280] leading-relaxed text-center md:text-left">
                    {{ $ft['brand']['description'] }}
                </p>
            </div>

            {{-- CTA buttons --}}
            <div class="flex flex-col sm:flex-row items-center gap-3 flex-shrink-0">
                @foreach($ft['cta']['buttons'] as $btn)
                    @if($btn['style'] === 'primary')
                    <a href="{{ $u($btn['path']) }}"
                       class="inline-flex items-center justify-center gap-2 bg-[#08186A]
                              hover:bg-[#0B2F5E] text-white font-semibold text-sm px-7 py-3
                              rounded-full transition-colors whitespace-nowrap w-full sm:w-auto">
                        {{ $btn['label'] }}
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5-5 5M6 12h12"/>
                        </svg>
                    </a>
                    @else
                    <a href="{{ $u($btn['path']) }}"
                       class="inline-flex items-center justify-center border border-[#08186A]
                              text-[#08186A] hover:bg-[#08186A] hover:text-white font-semibold
                              text-sm px-7 py-3 rounded-full transition-colors whitespace-nowrap
                              w-full sm:w-auto">
                        {{ $btn['label'] }}
                    </a>
                    @endif
                @endforeach
            </div>

        </div>
    </div>
</div>

{{-- ════════════════════════════════════════════════════════════════════════
     SECTION 2 — Pathway Cards
     4 guided cards replacing the traditional link-list sitemap.
     Secondary links inside each card are always visible (not hidden).
════════════════════════════════════════════════════════════════════════ --}}
<div class="bg-white border-b border-[#E5E7EB]">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-10 py-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

            {{-- Card 1: Explore Certifications --}}
            <div class="border border-[#E5E7EB] rounded-2xl p-6 flex flex-col
                        hover:border-[#08186A]/20 hover:shadow-md transition-all duration-200">
                <h3 class="text-[#111827] font-bold text-[15px] leading-snug mb-2">
                    Explore Certifications
                </h3>
                <p class="text-[#6B7280] text-[13px] leading-relaxed mb-5 flex-1">
                    Find programs in procurement, supply chain, tourism, e-commerce, and AI.
                </p>
                <a href="{{ $u('/certifications-for-professionals') }}"
                   class="inline-flex items-center gap-1.5 text-[#08186A] font-semibold
                          text-[13px] hover:text-[#E85D04] transition-colors self-start">
                    View Certifications
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5"
                         stroke-linecap="round" stroke-linejoin="round"
                         viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M13 7l5 5-5 5"/>
                    </svg>
                </a>
                <ul class="mt-4 pt-4 border-t border-[#F3F4F6] space-y-1.5"
                    aria-label="Certifications sub-links">
                    <li>
                        <a href="{{ $u('/procurement-management-certifications') }}"
                           class="text-[12px] text-[#6B7280] hover:text-[#E85D04] transition-colors
                                  leading-snug block">
                            Procurement Management
                        </a>
                    </li>
                    <li>
                        <a href="{{ $u('/supply-chain-management-certifications') }}"
                           class="text-[12px] text-[#6B7280] hover:text-[#E85D04] transition-colors
                                  leading-snug block">
                            Supply Chain Management
                        </a>
                    </li>
                    <li>
                        <a href="{{ $u('/artificial-intelligence-ai-courses') }}"
                           class="text-[12px] text-[#6B7280] hover:text-[#E85D04] transition-colors
                                  leading-snug block">
                            AI Courses
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Card 2: Membership & Registration --}}
            <div class="border border-[#E5E7EB] rounded-2xl p-6 flex flex-col
                        hover:border-[#08186A]/20 hover:shadow-md transition-all duration-200">
                <h3 class="text-[#111827] font-bold text-[15px] leading-snug mb-2">
                    Membership &amp; Registration
                </h3>
                <p class="text-[#6B7280] text-[13px] leading-relaxed mb-5 flex-1">
                    Join AAPSCM, apply for certification, or manage your professional membership pathway.
                </p>
                <a href="{{ $u('/membership') }}"
                   class="inline-flex items-center gap-1.5 text-[#08186A] font-semibold
                          text-[13px] hover:text-[#E85D04] transition-colors self-start">
                    Membership Options
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5"
                         stroke-linecap="round" stroke-linejoin="round"
                         viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M13 7l5 5-5 5"/>
                    </svg>
                </a>
                <ul class="mt-4 pt-4 border-t border-[#F3F4F6] space-y-1.5"
                    aria-label="Membership sub-links">
                    <li>
                        <a href="{{ $u('/student-membership') }}"
                           class="text-[12px] text-[#6B7280] hover:text-[#E85D04] transition-colors
                                  leading-snug block">
                            Become a Student Member
                        </a>
                    </li>
                    <li>
                        <a href="{{ $u('/membership-faqs') }}"
                           class="text-[12px] text-[#6B7280] hover:text-[#E85D04] transition-colors
                                  leading-snug block">
                            Membership FAQs
                        </a>
                    </li>
                    <li>
                        <a href="{{ $u('/membership') }}"
                           class="text-[12px] text-[#6B7280] hover:text-[#E85D04] transition-colors
                                  leading-snug block">
                            Apply for Certification
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Card 3: Exams & Credentialing --}}
            <div class="border border-[#E5E7EB] rounded-2xl p-6 flex flex-col
                        hover:border-[#08186A]/20 hover:shadow-md transition-all duration-200">
                <h3 class="text-[#111827] font-bold text-[15px] leading-snug mb-2">
                    Exams &amp; Credentialing
                </h3>
                <p class="text-[#6B7280] text-[13px] leading-relaxed mb-5 flex-1">
                    Verify certificates, access digital badges, and review credentialing resources.
                </p>
                <a href="{{ $u('/verify-a-certificate') }}"
                   class="inline-flex items-center gap-1.5 text-[#08186A] font-semibold
                          text-[13px] hover:text-[#E85D04] transition-colors self-start">
                    Credential Services
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5"
                         stroke-linecap="round" stroke-linejoin="round"
                         viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M13 7l5 5-5 5"/>
                    </svg>
                </a>
                <ul class="mt-4 pt-4 border-t border-[#F3F4F6] space-y-1.5"
                    aria-label="Credentialing sub-links">
                    <li>
                        <a href="{{ $u('/certification-process') }}"
                           class="text-[12px] text-[#6B7280] hover:text-[#E85D04] transition-colors
                                  leading-snug block">
                            Certification Process
                        </a>
                    </li>
                    <li>
                        <a href="{{ $u('/digital-badges') }}"
                           class="text-[12px] text-[#6B7280] hover:text-[#E85D04] transition-colors
                                  leading-snug block">
                            Digital Badges
                        </a>
                    </li>
                    <li>
                        <a href="{{ $u('/verify-a-certificate') }}"
                           class="text-[12px] text-[#6B7280] hover:text-[#E85D04] transition-colors
                                  leading-snug block">
                            Verify a Certification
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Card 4: Career Center --}}
            <div class="border border-[#E5E7EB] rounded-2xl p-6 flex flex-col
                        hover:border-[#08186A]/20 hover:shadow-md transition-all duration-200">
                <h3 class="text-[#111827] font-bold text-[15px] leading-snug mb-2">
                    Career Center
                </h3>
                <p class="text-[#6B7280] text-[13px] leading-relaxed mb-5 flex-1">
                    Access job listings, resume services, job seeker tools, and member career support.
                </p>
                <a href="{{ $u('/career-center') }}"
                   class="inline-flex items-center gap-1.5 text-[#08186A] font-semibold
                          text-[13px] hover:text-[#E85D04] transition-colors self-start">
                    Career Resources
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5"
                         stroke-linecap="round" stroke-linejoin="round"
                         viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M13 7l5 5-5 5"/>
                    </svg>
                </a>
                <ul class="mt-4 pt-4 border-t border-[#F3F4F6] space-y-1.5"
                    aria-label="Career Center sub-links">
                    <li>
                        <a href="{{ $u('/job-listing') }}"
                           class="text-[12px] text-[#6B7280] hover:text-[#E85D04] transition-colors
                                  leading-snug block">
                            Job Listing
                        </a>
                    </li>
                    <li>
                        <a href="{{ $u('/post-resume') }}"
                           class="text-[12px] text-[#6B7280] hover:text-[#E85D04] transition-colors
                                  leading-snug block">
                            Post Resume
                        </a>
                    </li>
                    <li>
                        <a href="{{ $u('/member-services') }}"
                           class="text-[12px] text-[#6B7280] hover:text-[#E85D04] transition-colors
                                  leading-snug block">
                            Member Services
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>

{{-- ════════════════════════════════════════════════════════════════════════
     SECTION 3 — Contact Bar + Expandable Panels
     Navy background. Office summaries left, action buttons right.
     Two Alpine.js panels expand below the bar on demand.
     Clicking one button collapses the other to keep the UI focused.
════════════════════════════════════════════════════════════════════════ --}}
<div x-data="{ offices: false, directory: false }" class="bg-[#08186A]">

    {{-- ── Contact Summary Bar ────────────────────────────────────────────── --}}
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-10 py-8">
        <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-8">

            {{-- Office summaries --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 flex-1">

                @foreach($ft['offices'] as $office)
                <div>
                    @if($office['section'])
                    <p class="text-[9px] font-bold uppercase tracking-widest text-[#E85D04] mb-1">
                        {{ $office['section'] }}
                    </p>
                    @endif
                    <h4 class="text-white font-bold text-[13.5px] leading-snug mb-2">
                        {{ $office['heading'] }}
                    </h4>
                    <div class="space-y-1 text-[12.5px]">
                        <p class="text-blue-200/60">{{ $office['city_summary'] }}</p>
                        @foreach($office['phones'] as $phone)
                        <a href="{{ $phone['href'] }}"
                           class="block text-blue-200 hover:text-white transition-colors">
                            {{ $phone['display'] }}
                        </a>
                        @endforeach
                        @if($office['email'])
                        <a href="{{ $office['email']['href'] }}"
                           class="block text-blue-200 hover:text-white transition-colors">
                            {{ $office['email']['display'] }}
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach

            </div>

            {{-- Expand action buttons --}}
            <div class="flex flex-row lg:flex-col gap-3 flex-shrink-0">

                <button @click="offices = !offices; directory = false"
                        :aria-expanded="offices.toString()"
                        class="inline-flex items-center justify-center gap-2 border border-white/25
                               hover:border-white/60 hover:bg-white/[0.07] text-white font-semibold
                               text-[12.5px] px-5 py-2.5 rounded-full transition-colors
                               whitespace-nowrap focus:outline-none focus:ring-2
                               focus:ring-white/30">
                    <span x-text="offices ? 'Hide office details' : 'View full office details'">
                        View full office details
                    </span>
                    <svg class="w-3.5 h-3.5 transition-transform duration-200 flex-shrink-0"
                         :class="{ 'rotate-180': offices }"
                         fill="none" stroke="currentColor" stroke-width="2.5"
                         stroke-linecap="round" stroke-linejoin="round"
                         viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <button @click="directory = !directory; offices = false"
                        :aria-expanded="directory.toString()"
                        class="inline-flex items-center justify-center gap-2 border border-white/25
                               hover:border-white/60 hover:bg-white/[0.07] text-white font-semibold
                               text-[12.5px] px-5 py-2.5 rounded-full transition-colors
                               whitespace-nowrap focus:outline-none focus:ring-2
                               focus:ring-white/30">
                    <span x-text="directory ? 'Hide site directory' : 'View full site directory'">
                        View full site directory
                    </span>
                    <svg class="w-3.5 h-3.5 transition-transform duration-200 flex-shrink-0"
                         :class="{ 'rotate-180': directory }"
                         fill="none" stroke="currentColor" stroke-width="2.5"
                         stroke-linecap="round" stroke-linejoin="round"
                         viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

            </div>

        </div>
    </div>

    {{-- ── Panel A — Full Office Details ──────────────────────────────────── --}}
    <div x-show="offices" style="display:none"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="border-t border-white/[0.10]">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-10 py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                @foreach($ft['offices'] as $office)
                <address class="not-italic bg-white/[0.06] border border-white/[0.12]
                                rounded-2xl p-6 space-y-4">

                    @if($office['section'])
                    <p class="text-[9px] font-bold uppercase tracking-widest text-[#E85D04]">
                        {{ $office['section'] }}
                    </p>
                    @endif

                    <h4 class="text-white font-bold text-[14px] leading-snug">
                        {{ $office['heading'] }}
                    </h4>

                    <dl class="space-y-3 text-[12.5px]">

                        <div>
                            <dt class="text-[9px] font-semibold uppercase tracking-wider
                                       text-white/35 mb-0.5">
                                Address
                            </dt>
                            <dd class="text-blue-100/75 leading-snug">{{ $office['address'] }}</dd>
                        </div>

                        <div>
                            <dt class="text-[9px] font-semibold uppercase tracking-wider
                                       text-white/35 mb-0.5">
                                Mailstop
                            </dt>
                            <dd class="text-blue-100/75 leading-snug">{{ $office['mailstop'] }}</dd>
                        </div>

                        @foreach($office['phones'] as $phone)
                        <div>
                            <dt class="text-[9px] font-semibold uppercase tracking-wider
                                       text-white/35 mb-0.5">
                                Phone
                            </dt>
                            <dd>
                                <a href="{{ $phone['href'] }}"
                                   class="text-blue-200 hover:text-white transition-colors">
                                    {{ $phone['display'] }}
                                </a>
                            </dd>
                        </div>
                        @endforeach

                        @if($office['fax'])
                        <div>
                            <dt class="text-[9px] font-semibold uppercase tracking-wider
                                       text-white/35 mb-0.5">
                                Fax
                            </dt>
                            <dd class="text-blue-100/75">{{ $office['fax'] }}</dd>
                        </div>
                        @endif

                        @if($office['email'])
                        <div>
                            <dt class="text-[9px] font-semibold uppercase tracking-wider
                                       text-white/35 mb-0.5">
                                Email
                            </dt>
                            <dd>
                                <a href="{{ $office['email']['href'] }}"
                                   class="text-blue-200 hover:text-white transition-colors">
                                    {{ $office['email']['display'] }}
                                </a>
                            </dd>
                        </div>
                        @endif

                    </dl>
                </address>
                @endforeach

            </div>
        </div>
    </div>

    {{-- ── Panel B — Full Site Directory ───────────────────────────────────── --}}
    <div x-show="directory" style="display:none"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="border-t border-white/[0.10]">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-10 py-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-8">

                @foreach($directory as $group)
                <div>
                    <h5 class="flex items-center gap-2 text-[10px] font-bold uppercase
                               tracking-[0.12em] text-white mb-3">
                        <span class="block w-3 h-0.5 rounded-full bg-[#E85D04]"
                              aria-hidden="true"></span>
                        {{ $group['title'] }}
                    </h5>
                    <nav aria-label="{{ $group['title'] }} directory links">
                        <ul class="space-y-1.5">
                            @foreach($group['links'] as $link)
                            <li>
                                <a href="{{ $u($link['path']) }}"
                                   class="text-[12px] text-blue-200/55 hover:text-white
                                          transition-colors leading-snug block">
                                    {!! $link['label'] !!}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
                @endforeach

            </div>
        </div>
    </div>

</div>

{{-- ════════════════════════════════════════════════════════════════════════
     SECTION 4 — Bottom Trust Bar
     Three-column: ICE badge | copyright | social icons
════════════════════════════════════════════════════════════════════════ --}}
<div class="bg-[#0B1220]">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-10 py-5">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">

            {{-- ICE badge --}}
            <div class="flex items-center gap-3 flex-shrink-0
                        justify-center md:justify-start">
                <img src="{{ $ft['brand']['ice_badge']['src'] }}"
                     alt="{{ $ft['brand']['ice_badge']['alt'] }}"
                     class="w-[92px] h-auto object-contain"
                     loading="lazy">
                <div>
                    <p class="text-[9px] font-bold uppercase tracking-widest
                               text-gray-600 mb-0">
                        Accreditation
                    </p>
                    <p class="text-[11px] text-gray-400 leading-snug max-w-[190px]">
                        {{ $ft['brand']['ice_badge']['alt'] }}
                    </p>
                </div>
            </div>

            {{-- Copyright --}}
            <div class="text-center text-[11px] text-gray-600 space-y-0.5">
                <p>&copy;{{ date('Y') }} AAPSCM<sup>®</sup>. All rights reserved.</p>
                <p>American Association of Procurement, Supply Chain &amp; Tourism Management</p>
                <a href="{{ $u('/privacy-policy-legal') }}"
                   class="text-gray-500 hover:text-gray-300 transition-colors">
                    Privacy Policy / Legal Terms
                </a>
            </div>

            {{-- Social icons --}}
            <div class="flex flex-wrap justify-center md:justify-end
                        gap-2 flex-shrink-0">
                @foreach($ft['social'] as $s)
                <a href="{{ $s['href'] }}" target="_blank" rel="noopener noreferrer"
                   aria-label="{{ $s['label'] }}"
                   class="w-8 h-8 rounded-full bg-white/[0.07] hover:bg-[#E85D04]
                          flex items-center justify-center transition-colors duration-200
                          focus:outline-none focus:ring-2 focus:ring-[#E85D04]/40">
                    <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor"
                         stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"
                         viewBox="0 0 24 24" aria-hidden="true">
                        {!! $socialSvg[$s['icon']] !!}
                    </svg>
                </a>
                @endforeach
            </div>

        </div>
    </div>
</div>

</footer>
