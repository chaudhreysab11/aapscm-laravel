

<?php
    $u   = fn (string $p): string => rtrim(url(trim($p)), '/') . '/';
    $nav = config('navigation');

    /* SVG fragments reused inside the file */
    $chevron = '<svg class="w-3 h-3 flex-shrink-0 text-[#08186A]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 18l6-6-6-6"/></svg>';
    $dot     = '<svg class="w-2 h-2 flex-shrink-0 text-[#E85D04] mt-0.5" viewBox="0 0 8 8" fill="currentColor"><circle cx="4" cy="4" r="4"/></svg>';
    $arrow   = '<svg class="w-3 h-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>';
?>


<header
    x-data="{
        openMenu: null,
        mobileOpen: false,
        mobileSection: null,
        _t: null,
        _pending: null,
        on(m) {
            clearTimeout(this._t); clearTimeout(this._pending);
            if (this.openMenu === null || this.openMenu === m) {
                this.openMenu = m;
            } else {
                this._pending = setTimeout(() => { this.openMenu = m; }, 150);
            }
        },
        off() {
            clearTimeout(this._pending);
            this._t = setTimeout(() => { this.openMenu = null; }, 280);
        },
        keep(m) { clearTimeout(this._t); clearTimeout(this._pending); this.openMenu = m; },
        mob(s)  { this.mobileSection = this.mobileSection === s ? null : s; }
    }"
    id="site-header"
    class="sticky top-0 z-[10010] bg-white [&_a]:no-underline"
    aria-label="Site header"
>

<style>
    #site-header .hdr-search-wrap {
        background-color: rgb(249 250 251) !important;
        border: 1px solid rgb(229 231 235) !important;
        border-radius: 9999px !important;
    }
    #site-header .hdr-search-wrap:focus-within {
        background-color: #ffffff !important;
        border-color: rgba(8,24,106,.5) !important;
        box-shadow: 0 0 0 2px rgba(8,24,106,.1) !important;
    }
    #site-header .hdr-search-wrap input {
        background: transparent !important;
        border: none !important;
        box-shadow: none !important;
        outline: none !important;
        color: rgb(55 65 81) !important;
        padding: 0 !important;
        margin: 0 !important;
        height: auto !important;
        min-height: 0 !important;
        font-size: 0.875rem !important;
        line-height: 1.25rem !important;
    }
    #site-header .hdr-search-wrap button {
        padding-top: 0.25rem !important;
        padding-bottom: 0.25rem !important;
        height: auto !important;
        min-height: 0 !important;
        line-height: 1.25 !important;
    }
    #site-header .hdr-search-wrap {
        padding: 0.5rem 1rem !important;
        height: auto !important;
        min-height: 0 !important;
        align-items: center !important;
    }
    #site-header .hdr-login-btn {
        background-color: transparent !important;
        border: 1px solid #08186A !important;
        color: #08186A !important;
        border-radius: 9999px !important;
        text-decoration: none !important;
    }
    #site-header .hdr-login-btn:hover {
        background-color: #08186A !important;
        color: #ffffff !important;
    }
    #site-header p {
        margin: 0 !important;
    }
</style>


<div class="hidden lg:block bg-slate-50 border-b border-gray-200">
    <div class="max-w-[1440px] mx-auto px-6">
        <div class="flex items-center justify-between h-9 gap-2">

            
            <nav class="flex items-center gap-0" aria-label="Utility navigation">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $nav['utility']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <a href="<?php echo e($u($link['path'])); ?>"
                   class="px-2.5 py-1 text-xs font-bold text-gray-500 hover:text-[#08186A] hover:bg-white rounded transition-colors whitespace-nowrap">
                    <?php echo $link['label']; ?>

                </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </nav>

            
            <div class="flex items-center gap-1">

                
                <div class="relative"
                     x-data="{ open: false, _t: null, show(){ clearTimeout(this._t); this.open = true; }, hide(){ this._t = setTimeout(() => { this.open = false; }, 220); } }"
                     @mouseenter="show()" @mouseleave="hide()">
                    <button @click="open = !open"
                            :aria-expanded="open"
                            class="flex items-center gap-1 px-2.5 py-1 text-xs font-bold text-gray-500 hover:text-[#08186A] hover:bg-white rounded transition-colors">
                        Free Student Training
                        <svg class="w-2.5 h-2.5 transition-transform duration-150" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         @mouseenter="show()" @mouseleave="hide()"
                         class="absolute right-0 top-full pt-1 w-52 z-50"
                         style="display:none">
                        <div class="bg-white rounded-xl shadow-xl border border-gray-100 py-1.5">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $nav['free_training']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <a href="<?php echo e($u($link['path'])); ?>"
                               class="block px-4 py-2 text-xs text-gray-700 hover:bg-slate-50 hover:text-[#08186A] transition-colors">
                                <?php echo e($link['label']); ?>

                            </a>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                    </div>
                </div>

                
                <div class="relative"
                     x-data="{ open: false, _t: null, show(){ clearTimeout(this._t); this.open = true; }, hide(){ this._t = setTimeout(() => { this.open = false; }, 220); } }"
                     @mouseenter="show()" @mouseleave="hide()">
                    <button @click="open = !open"
                            :aria-expanded="open"
                            class="flex items-center gap-1 px-2.5 py-1 text-xs font-bold text-gray-500 hover:text-[#08186A] hover:bg-white rounded transition-colors">
                        Exam, Tests & Training
                        <svg class="w-2.5 h-2.5 transition-transform duration-150" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         @mouseenter="show()" @mouseleave="hide()"
                         class="absolute right-0 top-full pt-1 w-48 z-50"
                         style="display:none">
                        <div class="bg-white rounded-xl shadow-xl border border-gray-100 py-1.5">
                            <a href="<?php echo e($u('/all-courses')); ?>" class="block px-4 py-2 text-xs text-gray-700 hover:bg-slate-50 hover:text-[#08186A] transition-colors">All Courses</a>
                            <a href="<?php echo e($u('/online-exam')); ?>" class="block px-4 py-2 text-xs text-gray-700 hover:bg-slate-50 hover:text-[#08186A] transition-colors">Online Exams</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-[1440px] mx-auto px-4 lg:px-6">
        <div class="flex items-center gap-3 lg:gap-5 h-[72px]">

            
            <a href="<?php echo e($u('/')); ?>" class="flex-shrink-0" aria-label="AAPSCM Home">
                <img src="/storage/cms-images/2023/04/logo.jpg"
                     alt="AAPSCM®"
                     class="h-[52px] lg:h-[68px] w-auto object-contain"
                     loading="eager">
            </a>

            
            <div class="hidden lg:flex flex-1 max-w-xl mx-4 relative"
                 x-data="{
                     q: '',
                     items: [],
                     open: false,
                     busy: false,
                     sel: -1,
                     _t: null,
                     onInput() {
                         clearTimeout(this._t);
                         this.sel = -1;
                         if (this.q.length < 2) { this.items = []; this.open = false; return; }
                         this.busy = true;
                         this._t = setTimeout(() => this.fetch(), 320);
                     },
                     async fetch() {
                         try {
                             const r = await fetch('<?php echo e(route('search.suggest')); ?>?q=' + encodeURIComponent(this.q));
                             this.items = await r.json();
                             this.open  = this.items.length > 0;
                         } catch(e) { this.items = []; this.open = false; }
                         this.busy = false;
                     },
                     nav(e) {
                         if (!this.open || !this.items.length) return;
                         if (e.key === 'ArrowDown') { e.preventDefault(); this.sel = Math.min(this.sel + 1, this.items.length - 1); }
                         if (e.key === 'ArrowUp')   { e.preventDefault(); this.sel = Math.max(this.sel - 1, -1); }
                         if (e.key === 'Enter' && this.sel >= 0) { e.preventDefault(); window.location.href = this.items[this.sel].url; }
                         if (e.key === 'Escape') { this.open = false; this.sel = -1; }
                     }
                 }"
                 @click.outside="open = false">

                <form action="<?php echo e(route('search')); ?>" method="GET" class="w-full" @submit="open = false">
                    
                    <div class="hdr-search-wrap flex items-center gap-2 w-full bg-gray-50 border border-gray-200 rounded-full px-4 py-2 focus-within:bg-white focus-within:border-[#08186A]/50 focus-within:ring-2 focus-within:ring-[#08186A]/10 transition-all duration-200 group">
                        
                        <svg x-show="!busy" class="w-4 h-4 text-gray-400 group-focus-within:text-[#08186A] transition-colors flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <svg x-show="busy" class="w-4 h-4 text-[#08186A] animate-spin flex-shrink-0" fill="none" viewBox="0 0 24 24" style="display:none">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                        </svg>

                        <input type="text" name="q"
                               x-model="q"
                               @input="onInput()"
                               @keydown="nav($event)"
                               @focus="q.length >= 2 && items.length && (open = true)"
                               placeholder="Search courses, certifications, diplomas..."
                               class="flex-1 bg-transparent text-sm text-gray-700 placeholder-gray-400 outline-none border-0 focus:ring-0 min-w-0"
                               autocomplete="off"
                               aria-label="Search AAPSCM"
                               :aria-expanded="open">

                        
                        <button x-show="q.length > 0" type="button"
                                @click="q = ''; items = []; open = false"
                                class="flex-shrink-0 text-gray-300 hover:text-gray-500 transition-colors"
                                style="display:none" aria-label="Clear">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>

                        <button type="submit"
                                class="flex-shrink-0 text-[10px] text-white bg-[#08186A] hover:bg-[#0B2F5E] rounded-full px-3 py-1 font-semibold tracking-wide transition-colors">
                            Search
                        </button>
                    </div>

                    
                    <div x-show="open && items.length"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         class="absolute left-0 right-0 top-full mt-1.5 bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden z-[10020]"
                         style="display:none">
                        <template x-for="(item, i) in items" :key="i">
                            <a :href="item.url" @click="open = false"
                               class="flex items-center gap-3 px-4 py-2.5 hover:bg-gray-50 transition-colors border-b border-gray-50 last:border-0"
                               :class="sel === i ? 'bg-slate-50' : ''">
                                <span class="flex-shrink-0 text-[9px] font-bold uppercase tracking-wide px-1.5 py-0.5 rounded-md ring-1"
                                      :class="{
                                          'bg-blue-50 text-blue-700 ring-blue-100':        item.type === 'certification',
                                          'bg-gray-100 text-gray-600 ring-gray-200':        item.type === 'page',
                                          'bg-orange-50 text-orange-700 ring-orange-100':   item.type === 'course',
                                          'bg-emerald-50 text-emerald-700 ring-emerald-100':item.type === 'post',
                                          'bg-purple-50 text-purple-700 ring-purple-100':   item.type === 'product',
                                      }"
                                      x-text="item.badge"></span>
                                <span class="text-sm text-gray-700 truncate" x-text="item.title"></span>
                            </a>
                        </template>
                        <div class="px-4 py-2.5 bg-gray-50 border-t border-gray-100">
                            <a :href="'<?php echo e(route('search')); ?>?q=' + encodeURIComponent(q)"
                               class="text-xs font-semibold text-[#08186A] hover:text-[#E85D04] transition-colors flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                                View all results for "<span x-text="q" class="italic"></span>"
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            
            <div class="hidden lg:flex items-center gap-2 flex-shrink-0 ml-auto">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e($u('/dashboard')); ?>"
                       class="hdr-login-btn text-sm font-medium text-[#08186A] hover:text-white bg-transparent hover:bg-[#08186A] border border-[#08186A] px-4 py-2 rounded-full transition-colors">
                        Dashboard
                    </a>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline">
                        <?php echo csrf_field(); ?>
                        <button type="submit"
                                class="text-sm font-medium text-gray-500 hover:text-[#08186A] px-3 py-2 rounded-full transition-colors">
                            Logout
                        </button>
                    </form>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>"
                       class="hdr-login-btn text-sm font-semibold text-[#08186A] hover:text-white bg-transparent hover:bg-[#08186A] border border-[#08186A] px-4 py-2 rounded-full transition-colors whitespace-nowrap">
                        Members Login
                    </a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <a href="<?php echo e($u('/all-courses')); ?>"
                   class="text-sm font-bold text-white hover:text-white bg-[#E85D04] hover:bg-[#c94e02] px-5 py-2 rounded-full transition-colors whitespace-nowrap shadow-sm">
                    Explore Courses
                </a>
            </div>

            
            <div class="lg:hidden flex items-center gap-1 ml-auto">
                <a href="<?php echo e(route('search')); ?>"
                   class="p-2 rounded-full text-gray-500 hover:text-[#08186A] hover:bg-gray-100 transition-colors"
                   aria-label="Search">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </a>
                <button @click="mobileOpen = !mobileOpen"
                        :aria-expanded="mobileOpen"
                        aria-label="Toggle navigation"
                        class="p-2 rounded-full text-gray-600 hover:text-[#08186A] hover:bg-gray-100 transition-colors focus:outline-none focus:ring-2 focus:ring-[#08186A]/30">
                    <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display:none">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

        </div>
    </div>
</div>


<div class="hidden lg:block bg-white border-b border-gray-200 relative">
    <div class="max-w-[1440px] mx-auto px-6">
        <nav aria-label="Main navigation">
            <ul class="flex items-center">


<li @mouseenter="on('certs')" @mouseleave="off()">
    <button role="menuitem" aria-haspopup="true" :aria-expanded="openMenu==='certs'"
            class="flex items-center gap-1 px-3.5 py-4 text-[13px] font-bold whitespace-nowrap transition-colors focus:outline-none"
            :class="openMenu==='certs' ? 'text-[#08186A] border-b-2 border-[#08186A]' : 'text-gray-700 hover:text-[#08186A] border-b-2 border-transparent'">
        Certifications
        <svg class="w-3 h-3 transition-transform duration-200" :class="openMenu==='certs'?'rotate-180':''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>
    
    <div x-show="openMenu==='certs'" @mouseenter="keep('certs')" @mouseleave="off()"
         x-transition:enter="transition ease-out duration-150"
         x-transition:enter-start="opacity-0 translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="absolute left-0 right-0 top-full z-50"
         style="display:none"
         aria-label="Certifications menu">
        <div class="bg-white border-t-2 border-[#08186A] shadow-2xl">
            <div class="max-w-[1440px] mx-auto px-6 py-6">
                <div class="flex gap-6">

                    
                    <div class="flex-shrink-0 w-44 border-r border-gray-100 pr-6">
                        <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Overview</p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $nav['cert_overview']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <a href="<?php echo e($u($link['path'])); ?>"
                           class="flex items-center gap-2 py-1.5 text-[13px] text-gray-600 hover:text-[#08186A] hover:font-semibold transition-colors rounded -mx-1 px-1"
                           role="menuitem">
                            <?php echo $chevron; ?> <?php echo e($link['label']); ?>

                        </a>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>

                    
                    <div class="grid grid-cols-3 gap-3 flex-1 min-w-0">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $nav['cert_categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <div class="border border-gray-100 rounded-xl p-4 hover:border-[#08186A]/30 hover:shadow-md transition-all duration-200 group bg-white">
                            <div class="flex items-start justify-between mb-1.5">
                                <a href="<?php echo e($u($cat['path'])); ?>"
                                   class="text-sm font-bold text-[#08186A] group-hover:text-[#E85D04] transition-colors leading-snug block"
                                   role="menuitem">
                                    <?php echo e($cat['label']); ?>

                                </a>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($cat['badge'])): ?>
                                <span class="flex-shrink-0 ml-2 text-[9px] font-bold uppercase bg-[#E85D04] text-white px-1.5 py-0.5 rounded-full tracking-wide">
                                    <?php echo e($cat['badge']); ?>

                                </span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <p class="text-[11px] text-gray-400 mb-3 leading-snug"><?php echo e($cat['description']); ?></p>
                            <div class="space-y-0.5 mb-3">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $cat['featured']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$label, $path]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <a href="<?php echo e($u($path)); ?>"
                                   class="flex items-center gap-1.5 text-[12px] text-gray-600 hover:text-[#08186A] py-0.5 transition-colors"
                                   role="menuitem">
                                    <?php echo $dot; ?> <?php echo e($label); ?>

                                </a>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </div>
                            <a href="<?php echo e($u($cat['path'])); ?>"
                               class="inline-flex items-center gap-1 text-[11px] font-semibold text-[#E85D04] hover:text-[#08186A] transition-colors"
                               role="menuitem">
                                View all <?php echo $arrow; ?>

                            </a>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</li>


<li @mouseenter="on('ai')" @mouseleave="off()">
    <button role="menuitem" aria-haspopup="true" :aria-expanded="openMenu==='ai'"
            class="flex items-center gap-1 px-3.5 py-4 text-[13px] font-bold whitespace-nowrap transition-colors focus:outline-none"
            :class="openMenu==='ai' ? 'text-[#08186A] border-b-2 border-[#08186A]' : 'text-gray-700 hover:text-[#08186A] border-b-2 border-transparent'">
        <span class="inline-flex items-center gap-1.5">
            AI Courses
            <span class="text-[9px] font-bold uppercase bg-[#E85D04] text-white px-1.5 py-0.5 rounded-full tracking-wide leading-none">New</span>
        </span>
        <svg class="w-3 h-3 transition-transform duration-200" :class="openMenu==='ai'?'rotate-180':''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>
    <div x-show="openMenu==='ai'" @mouseenter="keep('ai')" @mouseleave="off()"
         x-transition:enter="transition ease-out duration-150"
         x-transition:enter-start="opacity-0 translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="absolute left-0 right-0 top-full z-50"
         style="display:none"
         aria-label="AI Courses menu">
        <div class="bg-white border-t-2 border-[#E85D04] shadow-2xl">
            <div class="max-w-[1440px] mx-auto px-6 py-5">
                <div class="flex gap-8 max-w-xl">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Artificial Intelligence Programs</p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $nav['ai_courses']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <a href="<?php echo e($u($link['path'])); ?>"
                           class="flex items-center gap-2 py-1.5 text-sm text-gray-700 hover:text-[#08186A] hover:font-semibold transition-colors"
                           role="menuitem">
                            <?php echo $chevron; ?> <?php echo e($link['label']); ?>

                        </a>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <a href="<?php echo e($u('/artificial-intelligence-ai-courses')); ?>"
                               class="inline-flex items-center gap-1.5 text-sm font-bold text-white hover:text-white bg-[#E85D04] hover:bg-[#c94e02] px-4 py-2 rounded-full transition-colors">
                                Browse All AI Courses <?php echo $arrow; ?>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>


<li @mouseenter="on('diploma')" @mouseleave="off()">
    <button role="menuitem" aria-haspopup="true" :aria-expanded="openMenu==='diploma'"
            class="flex items-center gap-1 px-3.5 py-4 text-[13px] font-bold whitespace-nowrap transition-colors focus:outline-none"
            :class="openMenu==='diploma' ? 'text-[#08186A] border-b-2 border-[#08186A]' : 'text-gray-700 hover:text-[#08186A] border-b-2 border-transparent'">
        Executive Diplomas
        <svg class="w-3 h-3 transition-transform duration-200" :class="openMenu==='diploma'?'rotate-180':''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>
    <div x-show="openMenu==='diploma'" @mouseenter="keep('diploma')" @mouseleave="off()"
         x-transition:enter="transition ease-out duration-150"
         x-transition:enter-start="opacity-0 translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="absolute left-0 right-0 top-full z-50"
         style="display:none"
         aria-label="Executive Diplomas menu">
        <div class="bg-white border-t-2 border-[#08186A] shadow-2xl">
            <div class="max-w-[1440px] mx-auto px-6 py-5">
                <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-4">Executive Diploma Programs</p>
                <div class="grid grid-cols-2 gap-3 max-w-3xl">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $nav['executive_diplomas']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <a href="<?php echo e($u($ed['path'])); ?>"
                       class="flex gap-3 p-3 rounded-xl border border-gray-100 hover:border-[#08186A]/30 hover:shadow-md transition-all group"
                       role="menuitem">
                        <div class="flex-shrink-0 w-14 h-10 bg-[#08186A]/5 rounded-lg flex items-center justify-center">
                            <span class="text-[9px] font-bold text-[#08186A] text-center leading-tight px-1"><?php echo e($ed['code']); ?></span>
                        </div>
                        <div class="min-w-0">
                            <p class="text-[11px] font-bold text-[#08186A] group-hover:text-[#E85D04] transition-colors leading-snug"><?php echo e($ed['code']); ?></p>
                            <p class="text-[11px] text-gray-500 leading-snug mt-0.5"><?php echo e($ed['label']); ?></p>
                        </div>
                    </a>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</li>


<li @mouseenter="on('exams')" @mouseleave="off()">
    <button role="menuitem" aria-haspopup="true" :aria-expanded="openMenu==='exams'"
            class="flex items-center gap-1 px-3.5 py-4 text-[13px] font-bold whitespace-nowrap transition-colors focus:outline-none"
            :class="openMenu==='exams' ? 'text-[#08186A] border-b-2 border-[#08186A]' : 'text-gray-700 hover:text-[#08186A] border-b-2 border-transparent'">
        Exams & Learning
        <svg class="w-3 h-3 transition-transform duration-200" :class="openMenu==='exams'?'rotate-180':''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>
    <div x-show="openMenu==='exams'" @mouseenter="keep('exams')" @mouseleave="off()"
         x-transition:enter="transition ease-out duration-150"
         x-transition:enter-start="opacity-0 translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="absolute left-0 right-0 top-full z-50"
         style="display:none"
         aria-label="Exams and Learning menu">
        <div class="bg-white border-t-2 border-[#08186A] shadow-2xl">
            <div class="max-w-[1440px] mx-auto px-6 py-5">
                <div class="grid grid-cols-2 gap-8 max-w-2xl divide-x divide-gray-100">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Testing Overview</p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $nav['exams_learning']['testing']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <a href="<?php echo e($u($link['path'])); ?>"
                           class="flex items-center gap-2 py-1.5 text-sm text-gray-700 hover:text-[#08186A] hover:font-semibold transition-colors"
                           role="menuitem">
                            <?php echo $chevron; ?> <?php echo e($link['label']); ?>

                        </a>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                    <div class="pl-8">
                        <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Policies & Support</p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $nav['exams_learning']['policies']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <a href="<?php echo e($u($link['path'])); ?>"
                           class="flex items-center gap-2 py-1.5 text-sm text-gray-700 hover:text-[#08186A] hover:font-semibold transition-colors"
                           role="menuitem">
                            <?php echo $chevron; ?> <?php echo e($link['label']); ?>

                        </a>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>


<li @mouseenter="on('membership')" @mouseleave="off()">
    <button role="menuitem" aria-haspopup="true" :aria-expanded="openMenu==='membership'"
            class="flex items-center gap-1 px-3.5 py-4 text-[13px] font-bold whitespace-nowrap transition-colors focus:outline-none"
            :class="openMenu==='membership' ? 'text-[#08186A] border-b-2 border-[#08186A]' : 'text-gray-700 hover:text-[#08186A] border-b-2 border-transparent'">
        Membership
        <svg class="w-3 h-3 transition-transform duration-200" :class="openMenu==='membership'?'rotate-180':''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>
    <div x-show="openMenu==='membership'" @mouseenter="keep('membership')" @mouseleave="off()"
         x-transition:enter="transition ease-out duration-150"
         x-transition:enter-start="opacity-0 translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="absolute left-0 right-0 top-full z-50"
         style="display:none"
         aria-label="Membership menu">
        <div class="bg-white border-t-2 border-[#08186A] shadow-2xl">
            <div class="max-w-[1440px] mx-auto px-6 py-5">
                <div class="grid grid-cols-2 gap-8 max-w-2xl divide-x divide-gray-100">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Membership Types</p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $nav['membership']['types']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <a href="<?php echo e($u($link['path'])); ?>"
                           class="flex items-center gap-2 py-1.5 text-sm text-gray-700 hover:text-[#08186A] hover:font-semibold transition-colors"
                           role="menuitem">
                            <?php echo $chevron; ?> <?php echo e($link['label']); ?>

                        </a>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                    <div class="pl-8">
                        <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Membership Overview</p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $nav['membership']['overview']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <a href="<?php echo e($u($link['path'])); ?>"
                           class="flex items-center gap-2 py-1.5 text-sm text-gray-700 hover:text-[#08186A] hover:font-semibold transition-colors"
                           role="menuitem">
                            <?php echo $chevron; ?> <?php echo e($link['label']); ?>

                        </a>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>


<li @mouseenter="on('business')" @mouseleave="off()">
    <button role="menuitem" aria-haspopup="true" :aria-expanded="openMenu==='business'"
            class="flex items-center gap-1 px-3.5 py-4 text-[13px] font-bold whitespace-nowrap transition-colors focus:outline-none"
            :class="openMenu==='business' ? 'text-[#08186A] border-b-2 border-[#08186A]' : 'text-gray-700 hover:text-[#08186A] border-b-2 border-transparent'">
        For Business
        <svg class="w-3 h-3 transition-transform duration-200" :class="openMenu==='business'?'rotate-180':''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>
    <div x-show="openMenu==='business'" @mouseenter="keep('business')" @mouseleave="off()"
         x-transition:enter="transition ease-out duration-150"
         x-transition:enter-start="opacity-0 translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="absolute left-0 right-0 top-full z-50"
         style="display:none"
         aria-label="For Business menu">
        <div class="bg-white border-t-2 border-[#08186A] shadow-2xl">
            <div class="max-w-[1440px] mx-auto px-6 py-5">
                <div class="grid grid-cols-2 gap-8 max-w-2xl divide-x divide-gray-100">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Corporate Programs</p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $nav['for_business']['programs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <a href="<?php echo e($u($link['path'])); ?>"
                           class="flex items-center gap-2 py-1.5 text-sm text-gray-700 hover:text-[#08186A] hover:font-semibold transition-colors"
                           role="menuitem">
                            <?php echo $chevron; ?> <?php echo e($link['label']); ?>

                        </a>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                    <div class="pl-8">
                        <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Training & Resources</p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $nav['for_business']['training']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <a href="<?php echo e($u($link['path'])); ?>"
                           class="flex items-center gap-2 py-1.5 text-sm text-gray-700 hover:text-[#08186A] hover:font-semibold transition-colors"
                           role="menuitem">
                            <?php echo $chevron; ?> <?php echo e($link['label']); ?>

                        </a>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>


<li @mouseenter="on('resources')" @mouseleave="off()">
    <button role="menuitem" aria-haspopup="true" :aria-expanded="openMenu==='resources'"
            class="flex items-center gap-1 px-3.5 py-4 text-[13px] font-bold whitespace-nowrap transition-colors focus:outline-none"
            :class="openMenu==='resources' ? 'text-[#08186A] border-b-2 border-[#08186A]' : 'text-gray-700 hover:text-[#08186A] border-b-2 border-transparent'">
        Resources
        <svg class="w-3 h-3 transition-transform duration-200" :class="openMenu==='resources'?'rotate-180':''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>
    <div x-show="openMenu==='resources'" @mouseenter="keep('resources')" @mouseleave="off()"
         x-transition:enter="transition ease-out duration-150"
         x-transition:enter-start="opacity-0 translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="absolute left-0 right-0 top-full z-50"
         style="display:none"
         aria-label="Resources menu">
        <div class="bg-white border-t-2 border-[#08186A] shadow-2xl">
            <div class="max-w-[1440px] mx-auto px-6 py-5">
                <div class="grid grid-cols-2 gap-8 max-w-2xl divide-x divide-gray-100">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Quick Links</p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $nav['resources']['quick']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <a href="<?php echo e($u($link['path'])); ?>"
                           class="flex items-center gap-2 py-1.5 text-sm text-gray-700 hover:text-[#08186A] hover:font-semibold transition-colors"
                           role="menuitem">
                            <?php echo $chevron; ?> <?php echo e($link['label']); ?>

                        </a>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                    <div class="pl-8">
                        <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Career Tools</p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $nav['resources']['tools']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <a href="<?php echo e($u($link['path'])); ?>"
                           class="flex items-center gap-2 py-1.5 text-sm text-gray-700 hover:text-[#08186A] hover:font-semibold transition-colors"
                           role="menuitem">
                            <?php echo $chevron; ?> <?php echo e($link['label']); ?>

                        </a>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>

            </ul>
        </nav>
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
     style="display:none; max-height: calc(100vh - 72px)">

    
    <div class="px-4 pt-4 pb-3 border-b border-gray-100">
        <form action="<?php echo e(route('search')); ?>" method="GET">
            <div class="flex items-center gap-2 w-full bg-gray-50 border border-gray-200 rounded-full px-4 py-3
                        focus-within:bg-white focus-within:border-[#08186A]/50 transition-colors">
                <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" name="q"
                       placeholder="Search courses, certifications..."
                       class="flex-1 bg-transparent text-sm text-gray-700 placeholder-gray-400 outline-none border-0 focus:ring-0"
                       aria-label="Search AAPSCM">
                <button type="submit" class="flex-shrink-0 text-[#08186A]" aria-label="Submit search">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
        </form>
    </div>

    
    <div class="px-4 py-3 border-b border-gray-100">
        <a href="<?php echo e($u('/all-courses')); ?>"
           class="flex items-center justify-center gap-2 w-full text-sm font-bold text-white bg-[#E85D04] hover:bg-[#c94e02] px-5 py-3 rounded-full transition-colors">
            Explore Courses
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
    </div>

    
    <div class="px-4 py-3 border-b border-gray-100 bg-gray-50">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
            <div class="flex items-center gap-3">
                <a href="<?php echo e($u('/dashboard')); ?>"
                   class="flex-1 text-center text-sm font-semibold text-white bg-[#08186A] px-4 py-2.5 rounded-full transition-colors">
                    My Dashboard
                </a>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit"
                            class="text-sm text-gray-500 hover:text-[#08186A] px-3 py-2.5 rounded-full border border-gray-200 transition-colors">
                        Logout
                    </button>
                </form>
            </div>
        <?php else: ?>
            <a href="<?php echo e(route('login')); ?>"
               class="flex items-center justify-center w-full text-sm font-bold text-[#08186A] border-2 border-[#08186A] px-4 py-2.5 rounded-full hover:bg-[#08186A] hover:text-white transition-colors">
                Members Login
            </a>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $nav['mobile_sections']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
    <div class="border-b border-gray-100">
        <button @click="mob('<?php echo e($section['key']); ?>')"
                :aria-expanded="mobileSection === '<?php echo e($section['key']); ?>'"
                class="w-full flex items-center justify-between px-4 py-4 text-sm font-bold text-gray-800 hover:text-[#08186A] hover:bg-gray-50 transition-colors focus:outline-none">
            <?php echo e($section['label']); ?>

            <svg class="w-4 h-4 text-gray-400 transition-transform duration-200 flex-shrink-0"
                 :class="mobileSection === '<?php echo e($section['key']); ?>' ? 'rotate-180 text-[#08186A]' : ''"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
        <div x-show="mobileSection === '<?php echo e($section['key']); ?>'"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             class="bg-gray-50 px-4 pb-3"
             style="display:none">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $section['links']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <a href="<?php echo e($u($link['path'])); ?>"
               class="flex items-center gap-2.5 py-2.5 text-sm text-gray-700 hover:text-[#08186A] border-b border-gray-100 last:border-0 transition-colors">
                <svg class="w-2.5 h-2.5 text-[#E85D04] flex-shrink-0" viewBox="0 0 8 8" fill="currentColor"><circle cx="4" cy="4" r="4"/></svg>
                <?php echo e($link['label']); ?>

            </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

    
    <div class="px-4 py-4 bg-slate-50 border-t border-gray-100">
        <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">Quick Links</p>
        <div class="grid grid-cols-2 gap-1">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $nav['utility']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <a href="<?php echo e($u($link['path'])); ?>"
               class="py-2 text-sm text-gray-600 hover:text-[#08186A] transition-colors">
                <?php echo $link['label']; ?>

            </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </div>

</div>

</header>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views/components/cms/header.blade.php ENDPATH**/ ?>