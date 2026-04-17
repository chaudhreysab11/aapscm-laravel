{{--
    AAPSCM Site Footer
    ─────────────────────────────────────────────────────────────────────
    Section 1 (dark) : 4-column link grid
    Section 2 (white): Logo + social icons | SC office info | TX office info
    Section 3 (dark) : Copyright bar
--}}

@php
$socialLinks = [
    ['https://www.facebook.com/AAPSCM',                      'Facebook',  'M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z'],
    ['https://www.instagram.com/aapscmofficial/',             'Instagram', 'M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01'],
    ['https://www.linkedin.com/company/american-association-of-procurement-supply-chain-and-tourism-management', 'LinkedIn',  'M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z M4 6a2 2 0 100-4 2 2 0 000 4z'],
    ['https://www.youtube.com/channel/UCXKKFd2yJW-nMBxy9-RF6WQ', 'YouTube', 'M22.54 6.42a2.78 2.78 0 00-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 00-1.95 1.96A29 29 0 001 12a29 29 0 00.46 5.58a2.78 2.78 0 001.95 1.96C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 001.95-1.96A29 29 0 0023 12a29 29 0 00-.46-5.58zM9.75 15.02V8.98L15.5 12l-5.75 3.02z'],
    ['https://www.tiktok.com/@aapscm',                       'TikTok',    'M9 12a4 4 0 104 4V4a5 5 0 005 5'],
    ['https://twitter.com/aapscm',                           'X (Twitter)', 'M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.741l7.73-8.835L1.254 2.25H8.08l4.213 5.567zm-1.161 17.52h1.833L7.084 4.126H5.117z'],
];
@endphp

{{-- ═══════════════════════════════════════════════════════════════════
     SECTION 1 — Dark link grid
═══════════════════════════════════════════════════════════════════════ --}}
<div class="bg-[#1a1a2e] text-white [&_a]:no-underline">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 lg:gap-10">

            {{-- Quick Links --}}
            <div>
                <h4 class="text-white font-bold text-[15px] mb-4">Quick Links</h4>
                <ul class="space-y-2 text-sm">
                    @foreach([
                        ['Home',                                   '/'],
                        ['About Us',                              '/about-us'],
                        ['Contact Us',                            '/contact-us'],
                        ['User Dashboard',                        '/dashboard'],
                        ['Non-Profit Activities, Charity &amp; Donations', '/non-profit-activities-donation'],
                        ['Videos',                                '/certificate-video'],
                        ['Donation',                              '/donations'],
                        ['Certification Programs',                '/certifications-for-professionals'],
                        ['Apply for Certification',               '/membership'],
                        ['Become a Student Member',               '/student-membership'],
                        ['Membership FAQs',                       '/membership-faqs'],
                    ] as [$l, $h])
                    <li><a href="{{ url($h) }}" class="text-white no-underline hover:text-yellow-400 transition-colors leading-snug">{!! $l !!}</a></li>
                    @endforeach
                </ul>
            </div>

            {{-- Organization --}}
            <div>
                <h4 class="text-white font-bold text-[15px] mb-4">Organization</h4>
                <ul class="space-y-2 text-sm">
                    @foreach([
                        ['AAPSCM® Leadership',          '/board-of-directors'],
                        ['Affiliates/Partners',          '/affiliate-partners'],
                        ['Jobseeker',                    '/career-center'],
                        ['Career Center/Job Seeker',     '/career-center'],
                        ['Privacy Policy/Legal Terms',   '/privacy-policy-legal'],
                    ] as [$l, $h])
                    <li><a href="{{ url($h) }}" class="text-white no-underline hover:text-yellow-400 transition-colors">{{ $l }}</a></li>
                    @endforeach
                </ul>
            </div>

            {{-- Career Center --}}
            <div>
                <h4 class="text-white font-bold text-[15px] mb-4">Career Center / Job Seeker</h4>
                <ul class="space-y-2 text-sm">
                    @foreach([
                        ['Job Listing',          '/job-listing'],
                        ['Post Resume',          '/post-resume'],
                        ['Resume Evaluation',    '/resume-evaluation'],
                        ['View Job Seekers',     '/view-job-seekers'],
                        ['Job Opportunities',    '/post-job-opportunities'],
                        ['Member Services',      '/member-services'],
                    ] as [$l, $h])
                    <li><a href="{{ url($h) }}" class="text-white no-underline hover:text-yellow-400 transition-colors">{{ $l }}</a></li>
                    @endforeach
                </ul>
            </div>

            {{-- Certifications quick access --}}
            <div>
                <h4 class="text-white font-bold text-[15px] mb-4">Certifications</h4>
                <ul class="space-y-2 text-sm">
                    @foreach([
                        ['Procurement Management',     '/procurement-management-certifications'],
                        ['Supply Chain Management',    '/supply-chain-management-certifications'],
                        ['Tourism Management',         '/tourism-management-certifications'],
                        ['E-Commerce Management',      '/e-commerce-certifications'],
                        ['Combined P&amp;SC',          '/combined-procurement-logistics-and-supply-chain-certifications'],
                        ['AI Courses',                 '/artificial-intelligence-ai-courses'],
                        ['Certification Process',      '/certification-process'],
                        ['Verify a Certification',     '/verify-a-certificate'],
                        ['Digital Badges',             '/digital-badges'],
                    ] as [$l, $h])
                    <li><a href="{{ url($h) }}" class="text-white no-underline hover:text-yellow-400 transition-colors">{!! $l !!}</a></li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════════════════════════
     SECTION 2 — White info band
═══════════════════════════════════════════════════════════════════════ --}}
<div class="bg-white border-t border-gray-200 [&_a]:no-underline">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 items-start">

            {{-- Logo + social --}}
            <div>
                <a href="{{ url('/') }}" class="inline-block mb-5 no-underline" aria-label="AAPSCM Home">
                    <img src="https://aapscm.org/wp-content/uploads/2023/04/logo.jpg"
                         alt="AAPSCM® — American Association of Procurement, Supply Chain &amp; Tourism Management"
                         class="h-[150px] w-auto object-contain"
                         loading="lazy">
                </a>
                <p class="text-sm font-semibold text-gray-700 mb-3">Follow us:</p>
                <div class="flex items-center gap-2 flex-wrap">
                    @foreach($socialLinks as [$href, $label, $path])
                    <a href="{{ $href }}"
                       target="_blank" rel="noopener noreferrer"
                       aria-label="{{ $label }}"
                       class="w-9 h-9 rounded-full bg-[#1a1a2e] flex items-center justify-center hover:bg-[#0B2F5E] transition-colors no-underline">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            @if($label === 'Facebook')
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/>
                            @elseif($label === 'Instagram')
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                            @elseif($label === 'LinkedIn')
                                <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"/>
                                <rect x="2" y="9" width="4" height="12"/>
                                <circle cx="4" cy="4" r="2"/>
                            @elseif($label === 'YouTube')
                                <path d="M22.54 6.42a2.78 2.78 0 00-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 00-1.95 1.96A29 29 0 001 12a29 29 0 00.46 5.58 2.78 2.78 0 001.95 1.96C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 001.95-1.96A29 29 0 0023 12a29 29 0 00-.46-5.58z"/>
                                <polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"/>
                            @elseif($label === 'TikTok')
                                <path d="M9 12a4 4 0 104 4V4a5 5 0 005 5"/>
                            @else{{-- X/Twitter --}}
                                <path d="M4 4l16 16M4 20L20 4"/>
                            @endif
                        </svg>
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- SC Office --}}
            <div>
                <h4 class="font-bold text-gray-800 text-[15px] mb-3">More Information</h4>
                <p class="font-semibold text-gray-800 text-sm mb-2">Spartanburg, SC Chapter &amp; Center</p>
                <div class="space-y-2 text-sm text-gray-600">
                    <p class="leading-snug">
                        <span class="font-medium">Venture X</span> Downtown Columbia Building, 18th Floor,
                        Columbia, SC 29201 USA
                    </p>
                    <p>Mailstop: 450 Ganton Ct. Blythewood SC 29016</p>
                    <p class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-[#0B2F5E] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <a href="tel:+18039982189" class="no-underline hover:text-[#0B2F5E] transition-colors">+1-(803)998-2189</a>
                    </p>
                </div>

                {{-- ICE badge --}}
                <div class="mt-5">
                    <img src="https://aapscm.org/wp-content/uploads/2023/04/Image.jpg"
                         alt="Proud Member of the Institute for Credentialing Excellence"
                         class="w-48 h-auto object-contain"
                         loading="lazy">
                </div>
            </div>

            {{-- TX Office --}}
            <div>
                <h4 class="font-bold text-[#0B2F5E] text-[15px] mb-3">Dallas, Texas Office and Conference Center</h4>
                <div class="space-y-2 text-sm text-gray-600">
                    <p class="leading-snug">
                        2540 Walnut Hill Ln, Dallas, TX 75229. Building 2B
                        (inside Parker U. Campus)
                    </p>
                    <p class="leading-snug">
                        Mailstop: 2701 Little Elm Pkwy Ste 100 Little Elm, TX 75068
                    </p>
                    <p class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-[#0B2F5E] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <a href="tel:+14699915228" class="no-underline hover:text-[#0B2F5E] transition-colors">+1-469-991-5228</a>
                    </p>
                    <p class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-[#0B2F5E] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 5h12M6 19h12M6 12h.01M12 12h.01M18 12h.01M4 8h16a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1V9a1 1 0 011-1z"/>
                        </svg>
                        Fax: +1-(605)608-3078
                    </p>
                    <p class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-[#0B2F5E] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <a href="mailto:info@aapscm.org" class="no-underline hover:text-[#0B2F5E] transition-colors">info@aapscm.org</a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════════════════════════
     SECTION 3 — Copyright bar
═══════════════════════════════════════════════════════════════════════ --}}
<div class="bg-[#1a1a2e] border-t border-gray-800">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 py-4 flex flex-col sm:flex-row items-center justify-between gap-2 text-xs text-gray-400">
        <p>&copy;{{ date('Y') }} AAPSCM<sup>®</sup>. All rights reserved.</p>
        <p>American Association of Procurement, Supply Chain &amp; Tourism Management</p>
    </div>
</div>
