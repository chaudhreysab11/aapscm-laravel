

<?php
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
?>

<footer class="[&_a]:no-underline [&_p]:m-0" aria-label="Site footer">


<div class="bg-[#E8EDF4] border-b border-[#D4DCE9]">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-10 py-10">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-8">

            
            <div class="flex flex-col items-center md:items-start gap-3 md:max-w-[520px]">
                <a href="<?php echo e($u('/')); ?>" aria-label="AAPSCM Home">
                    <img src="<?php echo e($ft['brand']['logo_src']); ?>"
                         alt="<?php echo e($ft['brand']['logo_alt']); ?>"
                         class="h-[80px] w-auto object-contain"
                         loading="lazy">
                </a>
                <p class="text-[14px] text-[#6B7280] leading-relaxed text-center md:text-left">
                    <?php echo e($ft['brand']['description']); ?>

                </p>
            </div>

            
            <div class="flex flex-col sm:flex-row items-center gap-3 flex-shrink-0">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $ft['cta']['buttons']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $btn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($btn['style'] === 'primary'): ?>
                    <a href="<?php echo e($u($btn['path'])); ?>"
                       class="inline-flex items-center justify-center gap-2 bg-[#08186A]
                              hover:bg-[#0B2F5E] text-white font-semibold text-sm px-7 py-3
                              rounded-full transition-colors whitespace-nowrap w-full sm:w-auto">
                        <?php echo e($btn['label']); ?>

                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5-5 5M6 12h12"/>
                        </svg>
                    </a>
                    <?php else: ?>
                    <a href="<?php echo e($u($btn['path'])); ?>"
                       class="inline-flex items-center justify-center border border-[#08186A]
                              text-[#08186A] hover:bg-[#08186A] hover:text-white font-semibold
                              text-sm px-7 py-3 rounded-full transition-colors whitespace-nowrap
                              w-full sm:w-auto">
                        <?php echo e($btn['label']); ?>

                    </a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>

        </div>
    </div>
</div>


<div class="bg-white border-b border-[#E5E7EB]">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-10 py-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

            
            <div class="border border-[#E5E7EB] rounded-2xl p-6 flex flex-col
                        hover:border-[#08186A]/20 hover:shadow-md transition-all duration-200">
                <h3 class="text-[#111827] font-bold text-[15px] leading-snug mb-2">
                    Explore Certifications
                </h3>
                <p class="text-[#6B7280] text-[13px] leading-relaxed mb-5 flex-1">
                    Find programs in procurement, supply chain, tourism, e-commerce, and AI.
                </p>
                <a href="<?php echo e($u('/certifications-for-professionals')); ?>"
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
                        <a href="<?php echo e($u('/procurement-management-certifications')); ?>"
                           class="text-[12px] text-[#6B7280] hover:text-[#E85D04] transition-colors
                                  leading-snug block">
                            Procurement Management
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e($u('/supply-chain-management-certifications')); ?>"
                           class="text-[12px] text-[#6B7280] hover:text-[#E85D04] transition-colors
                                  leading-snug block">
                            Supply Chain Management
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e($u('/artificial-intelligence-ai-courses')); ?>"
                           class="text-[12px] text-[#6B7280] hover:text-[#E85D04] transition-colors
                                  leading-snug block">
                            AI Courses
                        </a>
                    </li>
                </ul>
            </div>

            
            <div class="border border-[#E5E7EB] rounded-2xl p-6 flex flex-col
                        hover:border-[#08186A]/20 hover:shadow-md transition-all duration-200">
                <h3 class="text-[#111827] font-bold text-[15px] leading-snug mb-2">
                    Membership &amp; Registration
                </h3>
                <p class="text-[#6B7280] text-[13px] leading-relaxed mb-5 flex-1">
                    Join AAPSCM, apply for certification, or manage your professional membership pathway.
                </p>
                <a href="<?php echo e($u('/membership')); ?>"
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
                        <a href="<?php echo e($u('/student-membership')); ?>"
                           class="text-[12px] text-[#6B7280] hover:text-[#E85D04] transition-colors
                                  leading-snug block">
                            Become a Student Member
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e($u('/membership-faqs')); ?>"
                           class="text-[12px] text-[#6B7280] hover:text-[#E85D04] transition-colors
                                  leading-snug block">
                            Membership FAQs
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e($u('/membership')); ?>"
                           class="text-[12px] text-[#6B7280] hover:text-[#E85D04] transition-colors
                                  leading-snug block">
                            Apply for Certification
                        </a>
                    </li>
                </ul>
            </div>

            
            <div class="border border-[#E5E7EB] rounded-2xl p-6 flex flex-col
                        hover:border-[#08186A]/20 hover:shadow-md transition-all duration-200">
                <h3 class="text-[#111827] font-bold text-[15px] leading-snug mb-2">
                    Exams &amp; Credentialing
                </h3>
                <p class="text-[#6B7280] text-[13px] leading-relaxed mb-5 flex-1">
                    Verify certificates, access digital badges, and review credentialing resources.
                </p>
                <a href="<?php echo e($u('/verify-a-certificate')); ?>"
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
                        <a href="<?php echo e($u('/certification-process')); ?>"
                           class="text-[12px] text-[#6B7280] hover:text-[#E85D04] transition-colors
                                  leading-snug block">
                            Certification Process
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e($u('/digital-badges')); ?>"
                           class="text-[12px] text-[#6B7280] hover:text-[#E85D04] transition-colors
                                  leading-snug block">
                            Digital Badges
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e($u('/verify-a-certificate')); ?>"
                           class="text-[12px] text-[#6B7280] hover:text-[#E85D04] transition-colors
                                  leading-snug block">
                            Verify a Certification
                        </a>
                    </li>
                </ul>
            </div>

            
            <div class="border border-[#E5E7EB] rounded-2xl p-6 flex flex-col
                        hover:border-[#08186A]/20 hover:shadow-md transition-all duration-200">
                <h3 class="text-[#111827] font-bold text-[15px] leading-snug mb-2">
                    Career Center
                </h3>
                <p class="text-[#6B7280] text-[13px] leading-relaxed mb-5 flex-1">
                    Access job listings, resume services, job seeker tools, and member career support.
                </p>
                <a href="<?php echo e($u('/career-center')); ?>"
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
                        <a href="<?php echo e($u('/job-listing')); ?>"
                           class="text-[12px] text-[#6B7280] hover:text-[#E85D04] transition-colors
                                  leading-snug block">
                            Job Listing
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e($u('/post-resume')); ?>"
                           class="text-[12px] text-[#6B7280] hover:text-[#E85D04] transition-colors
                                  leading-snug block">
                            Post Resume
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e($u('/member-services')); ?>"
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


<div x-data="{ offices: false, directory: false }" class="bg-[#08186A]">

    
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-10 py-8">
        <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-8">

            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 flex-1">

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $ft['offices']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $office): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($office['section']): ?>
                    <p class="text-[9px] font-bold uppercase tracking-widest text-[#E85D04] mb-1">
                        <?php echo e($office['section']); ?>

                    </p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <h4 class="text-white font-bold text-[13.5px] leading-snug mb-2">
                        <?php echo e($office['heading']); ?>

                    </h4>
                    <div class="space-y-1 text-[12.5px]">
                        <p class="text-blue-200/60"><?php echo e($office['city_summary']); ?></p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $office['phones']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <a href="<?php echo e($phone['href']); ?>"
                           class="block text-blue-200 hover:text-white transition-colors">
                            <?php echo e($phone['display']); ?>

                        </a>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($office['email']): ?>
                        <a href="<?php echo e($office['email']['href']); ?>"
                           class="block text-blue-200 hover:text-white transition-colors">
                            <?php echo e($office['email']['display']); ?>

                        </a>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

            </div>

            
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

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $ft['offices']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $office): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <address class="not-italic bg-white/[0.06] border border-white/[0.12]
                                rounded-2xl p-6 space-y-4">

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($office['section']): ?>
                    <p class="text-[9px] font-bold uppercase tracking-widest text-[#E85D04]">
                        <?php echo e($office['section']); ?>

                    </p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <h4 class="text-white font-bold text-[14px] leading-snug">
                        <?php echo e($office['heading']); ?>

                    </h4>

                    <dl class="space-y-3 text-[12.5px]">

                        <div>
                            <dt class="text-[9px] font-semibold uppercase tracking-wider
                                       text-white/35 mb-0.5">
                                Address
                            </dt>
                            <dd class="text-blue-100/75 leading-snug"><?php echo e($office['address']); ?></dd>
                        </div>

                        <div>
                            <dt class="text-[9px] font-semibold uppercase tracking-wider
                                       text-white/35 mb-0.5">
                                Mailstop
                            </dt>
                            <dd class="text-blue-100/75 leading-snug"><?php echo e($office['mailstop']); ?></dd>
                        </div>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $office['phones']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <div>
                            <dt class="text-[9px] font-semibold uppercase tracking-wider
                                       text-white/35 mb-0.5">
                                Phone
                            </dt>
                            <dd>
                                <a href="<?php echo e($phone['href']); ?>"
                                   class="text-blue-200 hover:text-white transition-colors">
                                    <?php echo e($phone['display']); ?>

                                </a>
                            </dd>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($office['fax']): ?>
                        <div>
                            <dt class="text-[9px] font-semibold uppercase tracking-wider
                                       text-white/35 mb-0.5">
                                Fax
                            </dt>
                            <dd class="text-blue-100/75"><?php echo e($office['fax']); ?></dd>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($office['email']): ?>
                        <div>
                            <dt class="text-[9px] font-semibold uppercase tracking-wider
                                       text-white/35 mb-0.5">
                                Email
                            </dt>
                            <dd>
                                <a href="<?php echo e($office['email']['href']); ?>"
                                   class="text-blue-200 hover:text-white transition-colors">
                                    <?php echo e($office['email']['display']); ?>

                                </a>
                            </dd>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    </dl>
                </address>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

            </div>
        </div>
    </div>

    
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

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $directory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div>
                    <h5 class="flex items-center gap-2 text-[10px] font-bold uppercase
                               tracking-[0.12em] text-white mb-3">
                        <span class="block w-3 h-0.5 rounded-full bg-[#E85D04]"
                              aria-hidden="true"></span>
                        <?php echo e($group['title']); ?>

                    </h5>
                    <nav aria-label="<?php echo e($group['title']); ?> directory links">
                        <ul class="space-y-1.5">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $group['links']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <li>
                                <a href="<?php echo e($u($link['path'])); ?>"
                                   class="text-[12px] text-blue-200/55 hover:text-white
                                          transition-colors leading-snug block">
                                    <?php echo $link['label']; ?>

                                </a>
                            </li>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </ul>
                    </nav>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

            </div>
        </div>
    </div>

</div>


<div class="bg-[#0B1220]">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-10 py-5">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">

            
            <div class="flex items-center gap-3 flex-shrink-0
                        justify-center md:justify-start">
                <img src="<?php echo e($ft['brand']['ice_badge']['src']); ?>"
                     alt="<?php echo e($ft['brand']['ice_badge']['alt']); ?>"
                     class="w-[92px] h-auto object-contain"
                     loading="lazy">
                <div>
                    <p class="text-[9px] font-bold uppercase tracking-widest
                               text-gray-600 mb-0">
                        Accreditation
                    </p>
                    <p class="text-[11px] text-gray-400 leading-snug max-w-[190px]">
                        <?php echo e($ft['brand']['ice_badge']['alt']); ?>

                    </p>
                </div>
            </div>

            
            <div class="text-center text-[11px] text-gray-600 space-y-0.5">
                <p>&copy;<?php echo e(date('Y')); ?> AAPSCM<sup>®</sup>. All rights reserved.</p>
                <p>American Association of Procurement, Supply Chain &amp; Tourism Management</p>
                <a href="<?php echo e($u('/privacy-policy-legal')); ?>"
                   class="text-gray-500 hover:text-gray-300 transition-colors">
                    Privacy Policy / Legal Terms
                </a>
            </div>

            
            <div class="flex flex-wrap justify-center md:justify-end
                        gap-2 flex-shrink-0">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $ft['social']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <a href="<?php echo e($s['href']); ?>" target="_blank" rel="noopener noreferrer"
                   aria-label="<?php echo e($s['label']); ?>"
                   class="w-8 h-8 rounded-full bg-white/[0.07] hover:bg-[#E85D04]
                          flex items-center justify-center transition-colors duration-200
                          focus:outline-none focus:ring-2 focus:ring-[#E85D04]/40">
                    <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor"
                         stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"
                         viewBox="0 0 24 24" aria-hidden="true">
                        <?php echo $socialSvg[$s['icon']]; ?>

                    </svg>
                </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>

        </div>
    </div>
</div>

</footer>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views/components/cms/footer.blade.php ENDPATH**/ ?>