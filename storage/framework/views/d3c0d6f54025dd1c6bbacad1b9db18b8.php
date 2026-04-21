

<?php
    /* ── Reusable link builder ────────────────────────────────────────────── */
    $chevron = '<svg class="w-2.5 h-2.5 text-[#0B2F5E] flex-shrink-0 mt-px" fill="none"
        stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 18l6-6-6-6"/>
    </svg>';

    // Internal URL with enforced trailing slash. Trims incidental whitespace in slug data.
    $u = fn (string $p): string => rtrim(url(trim($p)), '/') . '/';
?>

<header
    x-data="{
        openMenu: null,
        mobileOpen: false,
        mobileSection: null,
        _t: null,
        _pending: null,
        on(m)  {
            clearTimeout(this._t);
            clearTimeout(this._pending);
            if (this.openMenu === null || this.openMenu === m) {
                this.openMenu = m;
            } else {
                this._pending = setTimeout(() => { this.openMenu = m; }, 150);
            }
        },
        off()  {
            clearTimeout(this._pending);
            this._t = setTimeout(() => { this.openMenu = null; }, 280);
        },
        keep(m){ clearTimeout(this._t); clearTimeout(this._pending); this.openMenu = m; },
        mob(s) { this.mobileSection = this.mobileSection === s ? null : s; }
    }"
    class="bg-white border-b border-gray-200 shadow-sm [&_a]:no-underline"
>


<div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center py-3">

        
        <a href="<?php echo e($u('/')); ?>" class="flex-shrink-0 mr-4 lg:mr-6" aria-label="AAPSCM Home">
            <img src="/storage/cms-images/2023/04/logo.jpg"
                 alt="AAPSCM®"
                 class="h-[120px] w-auto object-contain"
                 loading="eager">
        </a>

        
        <div class="hidden lg:flex flex-col flex-1 min-w-0">

            
            <nav class="flex items-center justify-end gap-1 pb-2 mb-1 border-b border-gray-100" aria-label="Utility navigation">
                <a href="<?php echo e($u('/')); ?>"
                   class="px-1 py-1 text-sm text-gray-600 hover:text-[#0B2F5E] rounded transition-colors">Home</a>
                <a href="<?php echo e($u('/about-us')); ?>"
                   class="px-1 py-1 text-sm text-gray-600 hover:text-[#0B2F5E] rounded transition-colors">About Us</a>
                <a href="<?php echo e($u('/affiliate-partners')); ?>"
                   class="px-1 py-1 text-sm text-gray-600 hover:text-[#0B2F5E] rounded transition-colors">Affiliate Partners</a>
                <a href="<?php echo e($u('/us-charters')); ?>"
                   class="px-1 py-1 text-sm text-gray-600 hover:text-[#0B2F5E] rounded transition-colors">USA Chapters</a>
                <a href="<?php echo e($u('/aapscm-training')); ?>"
                   class="px-1 py-1 text-sm text-gray-600 hover:text-[#0B2F5E] rounded transition-colors">AAPSCM&reg; Training</a>

                
                <div class="relative"
                     x-data="{ open: false, _t: null, show(){ clearTimeout(this._t); this.open = true; }, hide(){ this._t = setTimeout(() => { this.open = false; }, 220); } }"
                     @mouseenter="show()" @mouseleave="hide()">
                    <button @click="open = !open"
                            class="flex items-center gap-0.5 px-2 py-1 text-sm text-gray-600 hover:text-[#0B2F5E] rounded transition-colors">
                        Free Student Training
                        <svg class="w-3 h-3 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                         @mouseenter="show()" @mouseleave="hide()"
                         class="absolute right-0 top-full pt-1 w-56 z-50"
                         style="display:none">
                        <div class="bg-white rounded-lg shadow-xl border border-gray-100 py-1">
                            <a href="<?php echo e($u('/procurement-management')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#0B2F5E]">Procurement Management</a>
                            <a href="<?php echo e($u('/supply-chain-management')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#0B2F5E]">Supply Chain Management</a>
                        </div>
                    </div>
                </div>

                
                <div class="relative"
                     x-data="{ open: false, _t: null, show(){ clearTimeout(this._t); this.open = true; }, hide(){ this._t = setTimeout(() => { this.open = false; }, 220); } }"
                     @mouseenter="show()" @mouseleave="hide()">
                    <button @click="open = !open"
                            class="flex items-center gap-0.5 px-2 py-1 text-sm text-gray-600 hover:text-[#0B2F5E] rounded transition-colors">
                        Exam, Tests & Training
                        <svg class="w-3 h-3 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                         @mouseenter="show()" @mouseleave="hide()"
                         class="absolute right-0 top-full pt-1 w-44 z-50"
                         style="display:none">
                        <div class="bg-white rounded-lg shadow-xl border border-gray-100 py-1">
                            <a href="<?php echo e($u('/all-courses')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#0B2F5E]">All Courses</a>
                            <a href="<?php echo e($u('/online-exam')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#0B2F5E]">Online Exams</a>
                        </div>
                    </div>
                </div>

                
                <div class="ml-3 pl-3 border-l border-gray-200 flex-shrink-0">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e($u('/dashboard')); ?>" class="bg-[#08186A] text-white text-sm mr-2 transition-colors font-medium hover:bg-white hover:text-[#08186A] px-3 py-1.5 rounded-full border border-[#08186A]">Dashboard</a>
                        <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="border border-[#08186A] bg-[#08186A] text-white text-sm font-medium px-4 py-1.5 rounded-full hover:bg-white hover:text-[#08186A] transition-colors">
                                Logout
                            </button>
                        </form>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>"
                           class="border-2 border-[#08186A] bg-[#08186A] text-white text-sm font-semibold px-5 py-1.5 rounded-full hover:bg-white hover:text-[#08186A] transition-colors whitespace-nowrap">
                            Members Login
                        </a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </nav>

            
            <nav class="relative flex items-center" aria-label="Main navigation">
                <ul class="flex items-center flex-wrap w-full" role="menubar">

            
            <li @mouseenter="on('membership')" @mouseleave="off()" role="none">
                <button
                    role="menuitem" aria-haspopup="true" :aria-expanded="openMenu==='membership'"
                    class="flex items-center gap-1 px-3 py-[14px] text-[13px] font-semibold whitespace-nowrap transition-colors"
                    :class="openMenu==='membership' ? 'text-[#0B2F5E]' : 'text-gray-700 hover:text-[#0B2F5E] '">
                    Membership & Registrations
                    <svg class="w-3 h-3 transition-transform duration-200" :class="openMenu==='membership'?'rotate-180':''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="openMenu==='membership'" @mouseenter="keep('membership')" @mouseleave="off()"
                     x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
                     class="absolute left-0 right-0 top-full pt-1 z-50"
                     style="display:none">
                  <div class="bg-white border border-gray-200 rounded-b-xl shadow-2xl" role="menu">
                    <div class="grid grid-cols-3 divide-x divide-gray-100 p-6 gap-0">
                        <div class="pr-5">
                            <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Membership Types</p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [
                                ['Professional Membership',       '/professional-membership'],
                                ['Corporate Membership',          '/corporate-membership'],
                                ['Chartered Membership',          '/chartered-professional-membership'],
                                ['Student Membership',            '/student-membership'],
                                ['Fellow Membership',             '/fellow-membership'],
                            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$l,$h]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <a href="<?php echo e($u($h)); ?>" class="flex items-center gap-2 py-1.5 text-sm text-gray-700 hover:text-[#0B2F5E] hover:font-semibold transition-colors" role="menuitem">
                                <?php echo $chevron; ?> <?php echo e($l); ?>

                            </a>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                        <div class="px-5">
                            <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Why AAPSCM</p>
                            <a href="<?php echo e($u('/why-join-aapscm')); ?>" class="flex items-start gap-2 py-1.5 text-sm text-gray-700 hover:text-[#0B2F5E] hover:font-semibold transition-colors leading-snug" role="menuitem">
                                <?php echo $chevron; ?> Why Join AAPSCM®
                            </a>
                            <a href="<?php echo e($u('/chartered-supply-chain-professional-member')); ?>" class="flex items-start gap-2 py-1.5 text-sm text-gray-700 hover:text-[#0B2F5E] hover:font-semibold transition-colors leading-snug" role="menuitem">
                                <?php echo $chevron; ?> Become a Chartered Professional/Manager
                            </a>
                        </div>
                        <div class="pl-5">
                            <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Membership Overview</p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [
                                ['Become a Member',                   '/membership'],
                                ['Professional/Manager Membership',   '/professional-membership'],
                                ['Membership FAQs',                   '/membership-faqs'],
                                ['Benefits and Resources',            '/benefits-and-resources'],
                            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$l,$h]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <a href="<?php echo e($u($h)); ?>" class="flex items-center gap-2 py-1.5 text-sm text-gray-700 hover:text-[#0B2F5E] hover:font-semibold transition-colors" role="menuitem">
                                <?php echo $chevron; ?> <?php echo e($l); ?>

                            </a>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                    </div>
                  </div>
                </div>
            </li>

            
            <li @mouseenter="on('certifications')" @mouseleave="off()" role="none">
                <button
                    role="menuitem" aria-haspopup="true" :aria-expanded="openMenu==='certifications'"
                    class="flex items-center gap-1 px-3 py-[14px] text-[13px] font-semibold whitespace-nowrap transition-colors"
                    :class="openMenu==='certifications' ? 'text-[#0B2F5E]' : 'text-gray-700 hover:text-[#0B2F5E]'">
                    Certifications
                    <svg class="w-3 h-3 transition-transform duration-200" :class="openMenu==='certifications'?'rotate-180':''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="openMenu==='certifications'" @mouseenter="keep('certifications')" @mouseleave="off()"
                     x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
                     class="absolute left-0 right-0 top-full pt-1 z-50"
                     style="display:none">
                  <div class="bg-white border border-gray-200 rounded-b-xl shadow-2xl overflow-y-auto" style="max-height: 75vh;" role="menu">
                    <?php
                        $ob = '<svg class="w-3.5 h-3.5 flex-shrink-0 mt-px" viewBox="0 0 14 14"><circle cx="7" cy="7" r="7" fill="#e85d04"/><path d="M5.5 4.5 9 7 5.5 9.5V4.5z" fill="white"/></svg>';
                    ?>
                    <div class="max-w-[1440px] mx-auto px-6 py-5">
                        <div class="flex gap-5">
                            
                            <div class="flex-shrink-0 w-44 border-r border-gray-100 pr-4">
                                <p class="font-bold text-[#0B2F5E] text-sm mb-3 leading-snug">Certification<br>Overview</p>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [
                                    ['Certification Process',    '/certification-process'],
                                    ['Certification FAQs',        '/certifications-faq'],
                                    ['Benefits and Resources',    '/benefits-and-resources'],
                                    ['Resources',                 '/benefits-and-resources'],
                                    ['4 Steps to Certification',  '/4-steps-to-verification'],
                                    ['Workshop/Training',          '/workshop-trainings'],
                                ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$l,$h]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <a href="<?php echo e($u($h)); ?>" class="block py-1.5 text-[13px] text-[#0B2F5E] hover:underline leading-snug" role="menuitem"><?php echo e($l); ?></a>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </div>
                            
                            <div class="grid grid-cols-6 gap-3 flex-1 min-w-0">
                                
                                <div>
                                    <a href="<?php echo e($u('/procurement-management-certifications')); ?>"
                                       class="block text-[11px] font-bold text-center bg-[#1e5c38] text-white px-2 py-2 rounded mb-2 hover:bg-[#174d2f] transition-colors leading-tight" role="menuitem">
                                        Procurement<br>Management
                                    </a>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [
                                        ['ACPP®',         '/acpp'],
                                        ['ACPM®',         '/american-certified-procurement-manager-acpm'],
                                        ['AC-DPA®',       '/american-certified-digital-procurement-analytics-specialist'],
                                        ['AC-SGPES®',     '/american-certified-sustainable-procurement-ethical-sourcing-professional'],
                                        ['AC-PRM®',       '/american-certified-procurement-risk-management-specialist'],
                                        ['AC-SPR®',       '/american-certified-strategic-procurement-supplier-relationship-specialist'],
                                        ['CHPP®',         '/chartered-healthcare-procurement-solutions-professional-chpp'],
                                        ['CHPM®',         '/chartered-healthcare-procurement-solutions-manager-chpm'],
                                        ['CSP-SRM®',      '/chartered-strategic-procurement-supplier-relationship-specialist'],
                                        ['ACIPDT®',       '/american-certified-it-procurement-digital-transformation-specialist'],
                                        ['AC-PSPC®',      '/american-certified-public-sector-procurement-compliance-specialist'],
                                        ['AC-GPCS®',      '/american-certified-global-procurement-cross-border-supply-specialist-ac-gpcss'],
                                        ['AC-PDS®',       '/american-certified-procurement-data-science-ai-specialist-ac-pdss'],
                                        ['AC-PLCM®',      '/american-certified-procurement-leadership-change-management-specialist'],
                                        ['AC-PARP®',      '/american-certified-procurement-automation-rpa-specialist-ac-paras-2'],
                                        ['CAIPP®',        '/chartered-ai-procurement-professional-caipp'],
                                        ['CAIPM®',        '/chartered-ai-procurement-manager-caipm'],
                                        ['CAIRPP®',       '/certified-ai-amp-rpa-procurement-professional-cairpp'],
                                        ['CAIRPM®',       '/certified-ai-rpa-procurement-manager-cairpm'],
                                        ['CIPPM®',        '/certified-international-professional-in-procurement-materials-management-cippm'],
                                        ['CIMPM®',        '/certified-international-manager-in-procurement-materials-management-cimpm'],
                                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$l,$h]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <a href="<?php echo e($u($h)); ?>" class="flex items-center gap-1.5 py-0.5 text-[12px] text-gray-700 hover:text-[#0B2F5E] transition-colors" role="menuitem"><?php echo $ob; ?> <?php echo e($l); ?></a>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </div>
                                
                                <div>
                                    <a href="<?php echo e($u('/supply-chain-management-certifications')); ?>"
                                       class="block text-[11px] font-bold text-center bg-[#1e5c38] text-white px-2 py-2 rounded mb-2 hover:bg-[#174d2f] transition-colors leading-tight" role="menuitem">
                                        Supply Chain<br>Management
                                    </a>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [
                                        ['ACSCP®',      '/the-american-certified-supply-chain-professional-acscp'],
                                        ['ACSCM®',      '/chartered-supply-chain-manager-acscm'],
                                        ['CSCT®',       '/acsct'],
                                        ['CA-SCCM®',    '/chartered-advanced-supply-chain-cybersecurity-manager-ca-sccm'],
                                        ['CSSCM®',      '/chartered-sustainable-supply-chain-manager-csscm'],
                                        ['AC-BSCP®',    '/american-certified-blockchain-for-supply-chain-professional-ac-bscp'],
                                        ['AC-DSCI®',    '/american-certified-digital-supply-chain-integration-professional-ac-dscip'],
                                        ['AC-CSCSP®',   '/american-certified-sustainable-and-circular-supply-chain-professional-ac-cscsp'],
                                        ['AC-SCCP®',    '/american-certified-supply-chain-cybersecurity-professional-ac-sccp'],
                                        ['AC-SCCM®',    '/american-certified-supply-chain-cybersecurity-manager-ac-sccm'],
                                        ['AC-SCDTP®',   '/american-certified-supply-chain-digital-transformation-professional-ac-scdtp'],
                                        ['AC-SCDTM®',   '/american-certified-supply-chain-digital-transformation-manager-ac-scdtm'],
                                        ['AC-GSRP®',    '/american-certified-global-supply-chain-risk-and-resilience-professionalac-gsrp'],
                                        ['AC-GSRM®',    '/american-certified-global-supply-chain-risk-and-resilience-manager-ac-gsrm'],
                                        ['CIPWIM®',     '/certified-international-professional-in-warehouse-inventory-management-cipwim'],
                                        ['CIMWIM®',     '/certified-international-manager-in-warehouse-inventory-management-cimwim'],
                                        ['CHSTE®',      '/chartered-healthcare-supply-chain-transformation-executive-chste'],
                                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$l,$h]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <a href="<?php echo e($u($h)); ?>" class="flex items-center gap-1.5 py-0.5 text-[12px] text-gray-700 hover:text-[#0B2F5E] transition-colors" role="menuitem"><?php echo $ob; ?> <?php echo e($l); ?></a>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </div>
                                
                                <div>
                                    <a href="<?php echo e($u('/tourism-management-certifications')); ?>"
                                       class="block text-[11px] font-bold text-center bg-[#1e5c38] text-white px-2 py-2 rounded mb-2 hover:bg-[#174d2f] transition-colors leading-tight" role="menuitem">
                                        Tourism<br>Management
                                    </a>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [
                                        ['CTM®',        '/ctm-2'],
                                        ['ACTP®',       '/american-certified-tourism-professional'],
                                        ['CSCTM®',      '/chartered-sustainable-culinary-tourism-manager-csctm'],
                                        ['A-HXP®',      '/certified-ai-powered-hospitality-experience-professional-a-hxp'],
                                        ['A-HXM®',      '/certified-ai-powered-hospitality-experience-manager-a-hxm'],
                                        ['AITP-DMS®',   '/certified-ai-enabled-travel-personalization-digital-marketing-specialist-aitp-dms'],
                                        ['AITP-DMM®',   '/certified-ai-enabled-travel-personalization-digital-marketing-manager-aitp-dmm'],
                                        ['CSHI®',       '/certified-sustainable-hospitality-innovator-cshi'],
                                        ['CDTEP®',      '/certified-digital-tourism-experience-professional-cdtep'],
                                        ['CDTEM®',      '/certified-digital-tourism-experience-manager-cdtem'],
                                        ['GEDP®',       '/certified-global-event-destination-professional-gedp'],
                                        ['GEDM®',       '/certified-global-event-destination-manager-gedm'],
                                        ['CTTP®',       '/certified-tourism-technology-professional-cttp'],
                                        ['AITA®',       '/certified-ai-driven-tourism-data-analyst-aita'],
                                        ['SDMP®',       '/certified-smart-destination-management-professional-sdmp'],
                                        ['DTTS®',       '/certified-digital-tourism-transformation-specialist-dtts'],
                                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$l,$h]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <a href="<?php echo e($u($h)); ?>" class="flex items-center gap-1.5 py-0.5 text-[12px] text-gray-700 hover:text-[#0B2F5E] transition-colors" role="menuitem"><?php echo $ob; ?> <?php echo e($l); ?></a>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </div>
                                
                                <div>
                                    <a href="<?php echo e($u('/e-commerce-certifications ')); ?>"
                                       class="block text-[11px] font-bold text-center bg-[#1e5c38] text-white px-2 py-2 rounded mb-2 hover:bg-[#174d2f] transition-colors leading-tight" role="menuitem">
                                        E-Commerce Management & Administration
                                    </a>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [
                                        ['AC-ESGP®',    '/american-certified-e-commerce-strategy-and-growth-professional-ac-esgp'],
                                        ['AC-DMUX®',    '/american-certified-digital-merchandising-and-user-experience-professional-ac-dmux'],
                                        ['CED-AI®',     '/chartered-e-commerce-data-analytics-and-ai-professional-ced-ai'],
                                        ['AC-SEEP®',    '/american-certified-ethical-practices-sustainable-e-commerce-professional-ac-seep'],
                                        ['CGCBE®',      '/chartered-global-cross-border-e-commerce-manager-cgcbe'],
                                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$l,$h]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <a href="<?php echo e($u($h)); ?>" class="flex items-center gap-1.5 py-0.5 text-[12px] text-gray-700 hover:text-[#0B2F5E] transition-colors" role="menuitem"><?php echo $ob; ?> <?php echo e($l); ?></a>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </div>
                                
                                <div>
                                    <a href="<?php echo e($u('/combined-procurement-logistics-and-supply-chain-certifications')); ?>"
                                       class="block text-[11px] font-bold text-center bg-[#1e5c38] text-white px-2 py-2 rounded mb-2 hover:bg-[#174d2f] transition-colors leading-tight" role="menuitem">
                                        Combined Procurement and Supply Chain Certifications
                                    </a>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [
                                        ['AC-GPLSCP',   '/american-certified-global-procurement-logistics-amp-supply-chain-professional-ac-gplscp'],
                                        ['CSP-SCM®',    '/chartered-strategic-procurement-supply-chain-manager-csp-scm'],
                                        ['AC-PLSCM®',   '/advanced-certified-procurement-logistics-supply-chain-manager-ac-plscm'],
                                        ['AC-SPGSCP®',  '/american-certified-sustainable-procurement-amp-green-supply-chain-professional-ac-spgscp'],
                                        ['AC-DSCPTP®',  '/american-certified-digital-supply-chain-amp-procurement-transformation-professional-ac-dscptp'],
                                        ['AC-PLTE®',    '/american-certified-procurement-logistics-transportation-expert-ac-plte'],
                                        ['AC-APSCP®',   '/american-certified-agile-procurement-amp-supply-chain-professional-ac-apscp'],
                                        ['AC-RCPPSC®',  '/american-certified-risk-amp-compliance-professional-in-procurement-amp-supply-chain-ac-rcppsc'],
                                        ['EDPLSCL®',    '/executive-diploma-in-procurement-logistics-supply-chain-leadership-edplscl'],
                                        ['CPLIMP®',     '/combined-procurement-logistics-and-supply-chain-certifications'],
                                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$l,$h]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <a href="<?php echo e($u($h)); ?>" class="flex items-center gap-1.5 py-0.5 text-[12px] text-gray-700 hover:text-[#0B2F5E] transition-colors" role="menuitem"><?php echo $ob; ?> <?php echo e($l); ?></a>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </div>
                                
                                <div>
                                    <a href="<?php echo e($u('/artificial-intelligence-ai-courses')); ?>"
                                       class="block text-[11px] font-bold text-center bg-[#1e5c38] text-white px-2 py-2 rounded mb-2 hover:bg-[#174d2f] transition-colors leading-tight" role="menuitem">
                                        Artificial Intelligence (AI) courses
                                    </a>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [
                                        ['AC-SCAI®',    '/american-certified-supply-chain-artificial-intelligence-ai-professional-ac-scai'],
                                        ['CSAI-M®',     '/chartered-supply-chain-artificial-intelligence-manager-csai-m'],
                                        ['CAIPP®',      '/chartered-ai-procurement-professional-caipp'],
                                        ['CAIPS®',      '/chartered-ai-procurement-strategist-caips'],
                                        ['CAISCA®',     '/chartered-ai-supply-chain-analyst-caisca'],
                                        ['CAIRPP®',     '/certified-ai-amp-rpa-procurement-professional-cairpp'],
                                        ['CSPEAI®',     '/chartered-sustainable-procurement-esg-ai-manager-cspeai'],
                                        ['CAISNRP®',    '/chartered-ai-supplier-negotiation-risk-professional-caisnrp'],
                                        ['CAISNRM®',    '/chartered-ai-supplier-negotiation-risk-manager-caisnrm'],
                                        ['CAIPFCM®',    '/american-certified-ai-procurement-fraud-amp-cybersecurity-manager-caipfcm'],
                                        ['CSAI®',       '/chartered-supply-chain-artificial-intelligence-analyst'],
                                        ['AC-AISCRC®',  '/american-certified-ai-supply-chain-resilience-amp-crisis-manager-ac-aiscrc'],
                                        ['AC-AIBPP®',   '/american-certified-ai-amp-blockchain-procurement-professional-ac-aibpp'],
                                        ['AC-AIPDFA®',  '/american-certified-ai-procurement-demand-amp-forecasting-analyst-ac-aipdfa'],
                                        ['AC-AIPCSR®',  '/american-certified-ai-procurement-chatbot-amp-supplier-relations-professional-ac-aipcsr'],
                                        ['CAI-SPP®',    '/chartered-ai-driven-sustainable-procurement-professional-cai-spp'],
                                        ['CAI-SPM®',    '/chartered-ai-driven-sustainable-procurement-manager-cai-spm'],
                                        ['AITP-DMP®',   '/certified-ai-enabled-travel-personalization-digital-marketing-professional-aitp-dmp'],
                                        ['AITP-DMM®',   '/certified-ai-enabled-travel-personalization-digital-marketing-manager-aitp-dmm'],
                                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$l,$h]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <a href="<?php echo e($u($h)); ?>" class="flex items-center gap-1.5 py-0.5 text-[12px] text-gray-700 hover:text-[#0B2F5E] transition-colors" role="menuitem"><?php echo $ob; ?> <?php echo e($l); ?></a>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </li>

            
            <li @mouseenter="on('testing')" @mouseleave="off()" role="none">
                <button role="menuitem" aria-haspopup="true" :aria-expanded="openMenu==='testing'"
                    class="flex items-center gap-1 px-3 py-[14px] text-[13px] font-semibold whitespace-nowrap transition-colors"
                    :class="openMenu==='testing' ? 'text-[#0B2F5E]' : 'text-gray-700 hover:text-[#0B2F5E] '">
                    Testing & Learning
                    <svg class="w-3 h-3 transition-transform duration-200" :class="openMenu==='testing'?'rotate-180':''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="openMenu==='testing'" @mouseenter="keep('testing')" @mouseleave="off()"
                     x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
                     class="absolute left-0 right-0 top-full pt-1 z-50"
                     style="display:none">
                  <div class="bg-white border border-gray-200 rounded-b-xl shadow-2xl" role="menu">
                    <div class="grid grid-cols-2 divide-x divide-gray-100 p-6">
                        <div class="pr-5">
                            <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Testing Overview</p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [
                                ['About Testing Options',         '/about-testing-options'],
                                ['Online Exams',                  '/online-exam'],
                                ['Certification/Program Match',   '/programs-match'],
                                ['In-Person Exam Proctoring',     '/exam-proctoring '],
                            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$l,$h]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <a href="<?php echo e($u($h)); ?>" class="flex items-center gap-2 py-1.5 text-sm text-gray-700 hover:text-[#0B2F5E] hover:font-semibold transition-colors" role="menuitem">
                                <?php echo $chevron; ?> <?php echo e($l); ?>

                            </a>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                        <div class="pl-5">
                            <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Policies & Support</p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [
                                ['About Exam Policies',   '/certificate-exam-policies'],
                                ['Exam Support Hotline',  '/aapscm-hotline'],
                                ['Online Courses',        '/online-courses'],
                                ['Workshop / Training',   '/workshop-trainings'],
                            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$l,$h]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <a href="<?php echo e($u($h)); ?>" class="flex items-center gap-2 py-1.5 text-sm text-gray-700 hover:text-[#0B2F5E] hover:font-semibold transition-colors" role="menuitem">
                                <?php echo $chevron; ?> <?php echo e($l); ?>

                            </a>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                    </div>
                  </div>
                </div>
            </li>

            
            <li @mouseenter="on('resources')" @mouseleave="off()" role="none">
                <button role="menuitem" aria-haspopup="true" :aria-expanded="openMenu==='resources'"
                    class="flex items-center gap-1 px-3 py-[14px] text-[13px] font-semibold whitespace-nowrap transition-colors"
                    :class="openMenu==='resources' ? 'text-[#0B2F5E]' : 'text-gray-700 hover:text-[#0B2F5E]'">
                    Resources
                    <svg class="w-3 h-3 transition-transform duration-200" :class="openMenu==='resources'?'rotate-180':''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="openMenu==='resources'" @mouseenter="keep('resources')" @mouseleave="off()"
                     x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
                     class="absolute left-0 right-0 top-full pt-1 z-50"
                     style="display:none">
                  <div class="bg-white border border-gray-200 rounded-b-xl shadow-2xl" role="menu">
                    <div class="grid grid-cols-3 divide-x divide-gray-100 p-6 gap-0">
                        <div class="pr-5">
                            <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Quick Links</p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [
                                ['Certification Process',         '/certification-process'],
                                [ 'Benefits & Resources',      '/benefits-and-resources'],
                                ['Online Store',                  '/online-courses'],
                                ['Exam FAQs',                     '/certifications-faq'],
                                ['Verify a Certificate',          '/verify-a-certificate '],
                            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$l,$h]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <a href="<?php echo e($u($h)); ?>" class="flex items-center gap-2 py-1.5 text-sm text-gray-700 hover:text-[#0B2F5E] hover:font-semibold transition-colors" role="menuitem">
                                <?php echo $chevron; ?> <?php echo e($l); ?>

                            </a>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                        <div>
                            <img src="/storage/cms-images/2023/10/Why-Join.jpg" alt="Why Join AAPSCM" class="rounded-lg w-full object-cover h-20">
                            <div class="px-5 mt-3">
                                <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Brochures & Test Questions</p>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [
                                    ['Become Authorized Training Partner', '/become-a-authorized-training-partner'],
                                    ['Purchase Brochures and Books',        '/online-courses'],
                                ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$l,$h]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <a href="<?php echo e($u($h)); ?>" class="flex items-start gap-2 py-1.5 text-sm text-gray-700 hover:text-[#0B2F5E] hover:font-semibold transition-colors leading-snug" role="menuitem">
                                    <?php echo $chevron; ?> <?php echo e($l); ?>

                                </a>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </div>
                        </div>
                        <div class="pl-5">
                            <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Career Tools</p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [
                                ['Program Match – AAPSCM', '/programs-match'],
                                ['AAPSCM® Community',       '/communities'],
                                ['USA Chapters',            '/us-charters'],
                            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$l,$h]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <a href="<?php echo e($u($h)); ?>" class="flex items-center gap-2 py-1.5 text-sm text-gray-700 hover:text-[#0B2F5E] hover:font-semibold transition-colors" role="menuitem">
                                <?php echo $chevron; ?> <?php echo e($l); ?>

                            </a>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                    </div>
                  </div>
                </div>
            </li>

            
            <li @mouseenter="on('corporate')" @mouseleave="off()" role="none">
                <button role="menuitem" aria-haspopup="true" :aria-expanded="openMenu==='corporate'"
                    class="flex items-center gap-1 px-3 py-[14px] text-[13px] font-semibold whitespace-nowrap transition-colors"
                    :class="openMenu==='corporate' ? 'text-[#0B2F5E]' : 'text-gray-700 hover:text-[#0B2F5E]'">
                    Corporate Solutions
                    <svg class="w-3 h-3 transition-transform duration-200" :class="openMenu==='corporate'?'rotate-180':''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="openMenu==='corporate'" @mouseenter="keep('corporate')" @mouseleave="off()"
                     x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
                     class="absolute left-0 right-0 top-full pt-1 z-50"
                     style="display:none">
                  <div class="bg-white border border-gray-200 rounded-b-xl shadow-2xl" role="menu">
                    <div class="grid grid-cols-2 divide-x divide-gray-100 p-6">
                        <div class="pr-5">
                            <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Corporate Programs</p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [
                                ['Corporate Membership',               '/corporate-membership'],
                                ['Become Authorized Training Partner', '/become-a-authorized-training-partner'],
                                ['Affiliate Partners',                 '/affiliate-partners'],
                                ['USA Chapters',                       '/us-charters '],
                            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$l,$h]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <a href="<?php echo e($u($h)); ?>" class="flex items-center gap-2 py-1.5 text-sm text-gray-700 hover:text-[#0B2F5E] hover:font-semibold transition-colors" role="menuitem">
                                <?php echo $chevron; ?> <?php echo e($l); ?>

                            </a>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                        <div class="pl-5">
                            <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Training & Resources</p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [
                                ['Benefits and Resources',   '/benefits-and-resources'],
                                ['Corporate Training',       '/workshop-trainings'],
                                ['Bulk Certification Seats', '/online-courses'],
                            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$l,$h]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <a href="<?php echo e($u($h)); ?>" class="flex items-center gap-2 py-1.5 text-sm text-gray-700 hover:text-[#0B2F5E] hover:font-semibold transition-colors" role="menuitem">
                                <?php echo $chevron; ?> <?php echo e($l); ?>

                            </a>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                    </div>
                  </div>
                </div>
            </li>

            
            <li @mouseenter="on('credentialing')" @mouseleave="off()" role="none">
                <button role="menuitem" aria-haspopup="true" :aria-expanded="openMenu==='credentialing'"
                    class="flex items-center gap-1 px-3 py-[14px] text-[13px] font-semibold whitespace-nowrap transition-colors"
                    :class="openMenu==='credentialing' ? 'text-[#0B2F5E]' : 'text-gray-700 hover:text-[#0B2F5E]'">
                    Credentialing
                    <svg class="w-3 h-3 transition-transform duration-200" :class="openMenu==='credentialing'?'rotate-180':''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="openMenu==='credentialing'" @mouseenter="keep('credentialing')" @mouseleave="off()"
                     x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
                     class="absolute left-0 right-0 top-full pt-1 z-50"
                     style="display:none">
                  <div class="bg-white border border-gray-200 rounded-b-xl shadow-2xl" role="menu">
                    <div class="grid grid-cols-2 divide-x divide-gray-100 p-6">
                        <div class="pr-5">
                            <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Manage Your Credential</p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [
                                ['Which Certification Is Right For You?', '/which-certification-is-right-for-you'],
                                ['Renew a Certification',                  '/request-pdes-for-certificate'],
                                ['Verify a Certification',                 '/verify-a-certificate'],
                                ['Digital Badges',                         '/digital-badges'],
                            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$l,$h]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <a href="<?php echo e($u($h)); ?>" class="flex items-center gap-2 py-1.5 text-sm text-gray-700 hover:text-[#0B2F5E] hover:font-semibold transition-colors" role="menuitem">
                                <?php echo $chevron; ?> <?php echo e($l); ?>

                            </a>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                        <div class="pl-5">
                            <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Certification Resources</p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [
                                ['Certification Process',      '/certification-process'],
                                ['4 Steps to Certification',   '/4-steps-to-verification'],
                                ['Certification FAQs',         '/certifications-faq'],
                                ['Benefits and Resources',     '/benefits-and-resources'],
                            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$l,$h]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <a href="<?php echo e($u($h)); ?>" class="flex items-center gap-2 py-1.5 text-sm text-gray-700 hover:text-[#0B2F5E] hover:font-semibold transition-colors" role="menuitem">
                                <?php echo $chevron; ?> <?php echo e($l); ?>

                            </a>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                    </div>
                  </div>
                </div>
            </li>

            
            <li @mouseenter="on('diploma')" @mouseleave="off()" role="none">
                <button role="menuitem" aria-haspopup="true" :aria-expanded="openMenu==='diploma'"
                    class="flex items-center gap-1 px-3 py-[14px] text-[13px] font-semibold whitespace-nowrap transition-colors"
                    :class="openMenu==='diploma' ? 'text-[#0B2F5E]' : 'text-gray-700 hover:text-[#0B2F5E]'">
                    Executive Diploma Programs
                    <svg class="w-3 h-3 transition-transform duration-200" :class="openMenu==='diploma'?'rotate-180':''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="openMenu==='diploma'" @mouseenter="keep('diploma')" @mouseleave="off()"
                     x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
                     class="absolute left-0 right-0 top-full pt-1 z-50"
                     style="display:none">
                  <div class="bg-white border border-gray-200 rounded-b-xl shadow-2xl" role="menu">
                    <div class="grid grid-cols-2 divide-x divide-gray-100 p-6">
                        <div class="pr-5">
                            <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Executive Diplomas</p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [
                                [ 'ED-AIPST® — AI-Driven Procurement Strategy & Transformation',          '/executive-diploma-in-ai-driven-procurement-strategy-transformation-ed-aipst'],
                                [ 'ED-SRCEAI® — AI-Powered Supplier Risk, Compliance & ESG Management',   '/executive-diploma-in-ai-powered-supplier-risk-compliance-esg-management-ed-srceai'],
                                [ 'ED-CMAAI® — AI-Integrated Contract Management & Automation',           '/executive-diploma-in-ai-integrated-contract-management-automation-ed-cmaai'],
                            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$l,$h]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <a href="<?php echo e($u($h)); ?>" class="flex items-start gap-2 py-2 text-sm text-gray-700 hover:text-[#0B2F5E] hover:font-semibold transition-colors leading-snug" role="menuitem">
                                <?php echo $chevron; ?> <?php echo $l; ?>

                            </a>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                        <div class="pl-5">
                            <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">&nbsp;</p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [
                                [ 'ED-SSNI-AI® — AI-Based Strategic Sourcing & Negotiation Intelligence',  '/executive-diploma-in-ai-based-strategic-sourcing-negotiation-intelligence-ed-ssni-ai'],
                                [ 'ED-POAAI® — AI-Driven Procurement Operations & Automation',             '/executive-diploma-in-ai-driven-procurement-operations-automation-ed-poaai'],
                            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$l,$h]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <a href="<?php echo e($u($h)); ?>" class="flex items-start gap-2 py-2 text-sm text-gray-700 hover:text-[#0B2F5E] hover:font-semibold transition-colors leading-snug" role="menuitem">
                                <?php echo $chevron; ?> <?php echo $l; ?>

                            </a>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                    </div>
                  </div>
                </div>
            </li>

            
            <li role="none">
                <a href="<?php echo e($u('/artificial-intelligence-ai-courses')); ?>"
                   role="menuitem"
                   class="block px-3 py-[14px] text-[13px] font-semibold whitespace-nowrap text-gray-700 hover:text-[#0B2F5E] transition-colors">
                    AI Courses
                </a>
            </li>

                </ul>
            </nav>
        </div>

        
        <button @click="mobileOpen = !mobileOpen"
                class="lg:hidden ml-auto text-gray-700 p-2 rounded focus:outline-none focus:ring-2 focus:ring-[#0B2F5E]"
                :aria-expanded="mobileOpen"
                aria-label="Toggle navigation">
            <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg x-show="mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display:none">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

    </div>
</div>




<div x-show="mobileOpen"
     x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0 -translate-y-2"
     x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave="transition ease-in duration-150"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="lg:hidden bg-white border-t border-gray-200 shadow-xl overflow-y-auto"
     style="display:none; max-height: calc(100vh - 64px)">

    
    <div class="px-4 pt-4 pb-3 border-b border-gray-100">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
            <a href="<?php echo e($u('/dashboard')); ?>" class="block text-sm font-semibold text-[#0B2F5E] py-2">My Dashboard</a>
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button class="text-sm text-gray-500">Logout</button>
            </form>
        <?php else: ?>
            <a href="<?php echo e(route('login')); ?>"
               class="block text-center border-2 border-[#0B2F5E] text-[#0B2F5E] font-bold px-4 py-2 rounded-lg hover:bg-[#0B2F5E] hover:text-white transition-colors">
                Members Login
            </a>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    
    <div class="px-4 py-3 border-b border-gray-100 space-y-0.5">
        <a href="<?php echo e($u('/')); ?>"                   class="block py-2 text-sm font-medium text-gray-700 hover:text-[#0B2F5E]">Home</a>
        <a href="<?php echo e($u('/about-us')); ?>"            class="block py-2 text-sm font-medium text-gray-700 hover:text-[#0B2F5E]">About Us</a>
        <a href="<?php echo e($u('/affiliate-partners')); ?>"  class="block py-2 text-sm font-medium text-gray-700 hover:text-[#0B2F5E]">Affiliate Partners</a>
        <a href="<?php echo e($u('/us-charters')); ?>"         class="block py-2 text-sm font-medium text-gray-700 hover:text-[#0B2F5E]">USA Chapters</a>
        <a href="<?php echo e($u('/aapscm-training')); ?>"     class="block py-2 text-sm font-medium text-gray-700 hover:text-[#0B2F5E]">AAPSCM® Training</a>
    </div>

    <?php
        $mobileMenus = [
            ['membership', 'Membership & Registrations', [
                ['Professional Membership',       '/professional-membership'],
                ['Corporate Membership',          '/corporate-membership'],
                ['Chartered Membership',          '/chartered-professional-membership'],
                ['Student Membership',            '/student-membership'],
                ['Fellow Membership',             '/fellow-membership'],
                ['Why Join AAPSCM®',              '/why-join-aapscm'],
                ['Become a Chartered Professional', '/chartered-supply-chain-professional-member'],
                ['Membership FAQs',               '/membership-faqs'],
                ['Benefits and Resources',        '/benefits-and-resources'],
            ]],
            ['certifications', 'Certifications', [
                ['Certification Process',         '/certification-process'],
                ['Certification FAQs',            '/certifications-faq'],
                ['Procurement Management Certs',  '/procurement-management-certifications'],
                ['Supply Chain Management Certs', '/supply-chain-management-certifications'],
                ['Tourism Management Certs',      '/tourism-management-certifications'],
                ['E-Commerce Certifications',     '/e-commerce-certifications'],
                ['Combined Procurement & SC',     '/combined-procurement-logistics-and-supply-chain-certifications'],
                ['AI Certifications',             '/artificial-intelligence-ai-courses'],
                ['All Certifications',            '/certifications-for-professionals'],
            ]],
            ['testing', 'Testing & Learning', [
                ['About Testing Options',         '/about-testing-options'],
                ['Online Exams',                  '/online-exam'],
                ['Certification/Program Match',   '/programs-match'],
                ['In-Person Exam Proctoring',     '/exam-proctoring'],
                ['About Exam Policies',           '/certificate-exam-policies'],
                ['Exam Support Hotline',          '/aapscm-hotline'],
            ]],
            ['resources', 'Resources', [
                ['Why Join AAPSCM®',              '/why-join-aapscm'],
                ['Become Authorized Training Partner', '/become-a-authorized-training-partner'],
                ['Purchase Brochures and Books',  '/online-courses'],
                ['Program Match',                 '/programs-match'],
                ['AAPSCM® Community',             '/communities'],
            ]],
            ['corporate', 'Corporate Solutions', [
                ['Corporate Membership',          '/corporate-membership'],
                ['Become Authorized Training Partner', '/become-a-authorized-training-partner'],
                ['USA Chapters',                  '/us-charters'],
                ['Benefits and Resources',        '/benefits-and-resources'],
                ['Affiliate Partners',            '/affiliate-partners'],
            ]],
            ['credentialing', 'Credentialing', [
                ['Which Certification Is Right For You?', '/which-certification-is-right-for-you'],
                ['Renew a Certification',         '/request-pdes-for-certificate'],
                ['Verify a Certification',        '/verify-a-certificate'],
                ['Digital Badges',                '/digital-badges'],
            ]],
            ['diploma', 'Executive Diploma Programs', [
                ['ED-AIPST® — AI-Driven Procurement Strategy',    '/executive-diploma-in-ai-driven-procurement-strategy-transformation-ed-aipst'],
                ['ED-SRCEAI® — AI-Powered Supplier Risk & ESG',   '/executive-diploma-in-ai-powered-supplier-risk-compliance-esg-management-ed-srceai'],
                ['ED-CMAAI® — AI-Integrated Contract Management', '/executive-diploma-in-ai-integrated-contract-management-automation-ed-cmaai'],
                ['ED-SSNI-AI® — Strategic Sourcing & Negotiation','/executive-diploma-in-ai-based-strategic-sourcing-negotiation-intelligence-ed-ssni-ai'],
                ['ED-POAAI® — Procurement Operations & Automation','/executive-diploma-in-ai-driven-procurement-operations-automation-ed-poaai'],
            ]],
        ];
    ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $mobileMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$key, $label, $links]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
    <div class="border-b border-gray-100">
        <button @click="mob('<?php echo e($key); ?>')"
                class="w-full flex items-center justify-between px-4 py-4 text-sm font-bold text-gray-800 hover:text-[#0B2F5E] hover:bg-gray-50 transition-colors"
                :aria-expanded="mobileSection === '<?php echo e($key); ?>'">
            <?php echo e($label); ?>

            <svg class="w-4 h-4 text-gray-400 transition-transform duration-200 flex-shrink-0"
                 :class="mobileSection === '<?php echo e($key); ?>' ? 'rotate-180 text-[#0B2F5E]' : ''"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
        <div x-show="mobileSection === '<?php echo e($key); ?>'"
             x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             class="bg-gray-50 px-4 pb-3"
             style="display:none">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$l, $h]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <a href="<?php echo e($u($h)); ?>" class="flex items-center gap-2 py-2 text-sm text-gray-700 hover:text-[#0B2F5E] border-b border-gray-200 last:border-0">
                <svg class="w-2.5 h-2.5 text-[#0B2F5E] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 18l6-6-6-6"/>
                </svg>
                <?php echo e($l); ?>

            </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

    
    <div class="px-4 py-4">
        <a href="<?php echo e($u('/artificial-intelligence-ai-courses')); ?>"
           class="block text-sm font-bold text-gray-800 hover:text-[#0B2F5E]">
            Artificial Intelligence (AI) Courses
        </a>
    </div>

</div>

</header>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views/components/cms/header.blade.php ENDPATH**/ ?>