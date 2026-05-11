<?php if (isset($component)) { $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.public','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.public'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>


<?php
    $badgeClasses = [
        'blue'   => 'bg-blue-50 text-blue-700 ring-blue-100',
        'gray'   => 'bg-gray-100 text-gray-600 ring-gray-200',
        'orange' => 'bg-orange-50 text-orange-700 ring-orange-100',
        'green'  => 'bg-emerald-50 text-emerald-700 ring-emerald-100',
        'purple' => 'bg-purple-50 text-purple-700 ring-purple-100',
    ];

    $typeFilters = [
        ['key' => 'all',           'label' => 'All Results',     'count_key' => 'all'],
        ['key' => 'certification', 'label' => 'Certifications',  'count_key' => 'certification'],
        ['key' => 'page',          'label' => 'Resources',       'count_key' => 'page'],
        ['key' => 'course',        'label' => 'Courses',         'count_key' => 'course'],
        ['key' => 'post',          'label' => 'Articles',        'count_key' => 'post'],
        ['key' => 'product',       'label' => 'Store',           'count_key' => 'product'],
    ];

    $suggestUrl = route('search.suggest');
?>

<div class="min-h-screen bg-gray-50">

    
    <div class="bg-[#08186A] border-b border-[#0B2F5E]">
        <div class="max-w-4xl mx-auto px-4 py-10 lg:py-14">

            <h1 class="text-white text-2xl lg:text-3xl font-bold mb-2 text-center">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($q): ?>
                    Results for <span class="text-[#E85D04]">"<?php echo e($q); ?>"</span>
                <?php else: ?>
                    Search AAPSCM
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </h1>
            <p class="text-blue-200 text-sm text-center mb-6">
                Search certifications, courses, executive diplomas, resources and more
            </p>

            
            <div x-data="{
                    q: '<?php echo e(addslashes($q)); ?>',
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
                            const r = await fetch('<?php echo e($suggestUrl); ?>?q=' + encodeURIComponent(this.q));
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

                <form action="<?php echo e(route('search')); ?>" method="GET" class="relative" @submit="open = false">
                    <div class="flex items-center gap-3 bg-white rounded-2xl px-5 py-4 shadow-lg ring-1 ring-white/10 focus-within:ring-2 focus-within:ring-[#E85D04]/60 transition-all">
                        
                        <div class="flex-shrink-0">
                            <svg x-show="!busy" class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <svg x-show="busy" class="w-5 h-5 text-[#08186A] animate-spin" fill="none" viewBox="0 0 24 24" style="display:none">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                            </svg>
                        </div>

                        <input
                            type="text"
                            name="q"
                            x-model="q"
                            @input="onInput()"
                            @keydown="nav($event)"
                            @focus="q.length >= 2 && items.length && (open = true)"
                            placeholder="Search courses, certifications, diplomas..."
                            class="flex-1 text-gray-800 text-base placeholder-gray-400 outline-none border-0 focus:ring-0 bg-transparent"
                            autocomplete="off"
                            aria-label="Search"
                            :aria-expanded="open"
                            autofocus
                        >

                        
                        <button x-show="q.length > 0" type="button" @click="q = ''; items = []; open = false; $el.closest('form').querySelector('input').focus()"
                                class="flex-shrink-0 text-gray-300 hover:text-gray-500 transition-colors"
                                style="display:none"
                                aria-label="Clear search">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>

                        <button type="submit"
                                class="flex-shrink-0 bg-[#08186A] hover:bg-[#0B2F5E] text-white text-sm font-semibold px-5 py-2 rounded-xl transition-colors">
                            Search
                        </button>
                    </div>

                    
                    <div x-show="open && items.length"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         class="absolute left-0 right-0 top-full mt-2 bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden z-50"
                         style="display:none">
                        <template x-for="(item, i) in items" :key="i">
                            <a :href="item.url"
                               @click="open = false"
                               class="flex items-center gap-3 px-5 py-3 hover:bg-gray-50 transition-colors border-b border-gray-50 last:border-0 cursor-pointer"
                               :class="sel === i ? 'bg-slate-50' : ''">
                                <span class="flex-shrink-0 text-[9px] font-bold uppercase tracking-wide px-2 py-0.5 rounded-md ring-1"
                                      :class="{
                                          'bg-blue-50 text-blue-700 ring-blue-100':     item.type === 'certification',
                                          'bg-gray-100 text-gray-600 ring-gray-200':    item.type === 'page',
                                          'bg-orange-50 text-orange-700 ring-orange-100': item.type === 'course',
                                          'bg-emerald-50 text-emerald-700 ring-emerald-100': item.type === 'post',
                                          'bg-purple-50 text-purple-700 ring-purple-100':  item.type === 'product',
                                      }"
                                      x-text="item.badge"></span>
                                <span class="text-sm text-gray-700 truncate font-medium" x-text="item.title"></span>
                            </a>
                        </template>
                        <div class="px-5 py-3 bg-gray-50 border-t border-gray-100">
                            <a :href="'<?php echo e(route('search')); ?>?q=' + encodeURIComponent(q)"
                               class="text-xs font-semibold text-[#08186A] hover:text-[#E85D04] transition-colors flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                                View all results for "<span x-text="q" class="italic"></span>"
                            </a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    
    <div class="max-w-4xl mx-auto px-4 py-8">

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(strlen($q) > 0 && strlen($q) < 2): ?>
            
            <div class="text-center py-10 text-gray-500 text-sm">
                Please enter at least 2 characters to search.
            </div>

        <?php elseif($q && $counts['all'] === 0): ?>
            
            <div class="text-center py-16">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4">
                    <svg class="w-7 h-7 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <h2 class="text-lg font-bold text-gray-700 mb-1">No results found for "<?php echo e($q); ?>"</h2>
                <p class="text-sm text-gray-500 mb-6 max-w-xs mx-auto">Try different keywords, check your spelling, or browse a category below.</p>
                <div class="flex flex-wrap justify-center gap-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [
                        ['Browse Certifications', '/certifications-for-professionals/'],
                        ['AI Courses',            '/artificial-intelligence-ai-courses/'],
                        ['Executive Diplomas',    '/executive-diploma-in-ai-driven-procurement-strategy-transformation-ed-aipst/'],
                        ['Online Store',          '/online-courses/'],
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$label, $href]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <a href="<?php echo e($href); ?>"
                       class="text-sm font-semibold text-[#08186A] border border-[#08186A]/30 hover:bg-[#08186A] hover:text-white px-4 py-2 rounded-full transition-colors">
                        <?php echo e($label); ?>

                    </a>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            </div>

        <?php elseif($q): ?>
            
            <div class="flex items-center gap-2 flex-wrap mb-5">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $typeFilters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <?php $cnt = $counts[$filter['count_key']] ?? 0; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($cnt > 0 || $filter['key'] === 'all'): ?>
                <a href="<?php echo e(route('search', ['q' => $q, 'type' => $filter['key']])); ?>"
                   class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-sm font-medium transition-all
                          <?php echo e($type === $filter['key']
                                ? 'bg-[#08186A] text-white shadow-sm'
                                : 'bg-white text-gray-600 border border-gray-200 hover:border-[#08186A]/40 hover:text-[#08186A]'); ?>">
                    <?php echo e($filter['label']); ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($cnt > 0): ?>
                    <span class="text-[11px] font-bold px-1.5 py-px rounded-full
                                 <?php echo e($type === $filter['key'] ? 'bg-white/20 text-white' : 'bg-gray-100 text-gray-500'); ?>">
                        <?php echo e($cnt); ?>

                    </span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>

            
            <p class="text-xs text-gray-400 mb-4 font-medium uppercase tracking-wide">
                <?php echo e($results->count()); ?> <?php echo e(Str::plural('result', $results->count())); ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($type !== 'all'): ?> in <?php echo e(collect($typeFilters)->firstWhere('key', $type)['label'] ?? $type); ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </p>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($results->isEmpty()): ?>
                <div class="text-center py-10 text-gray-500 text-sm">
                    No <?php echo e(collect($typeFilters)->firstWhere('key', $type)['label'] ?? $type); ?> results for "<?php echo e($q); ?>".
                    <a href="<?php echo e(route('search', ['q' => $q])); ?>" class="text-[#08186A] font-semibold hover:underline ml-1">View all results</a>
                </div>
            <?php else: ?>
                <div class="space-y-2.5">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <?php $badge = $badgeClasses[$r['color']] ?? $badgeClasses['gray']; ?>
                    <a href="<?php echo e($r['url']); ?>"
                       class="group flex items-start gap-4 bg-white border border-gray-100 rounded-2xl p-4 lg:p-5
                              hover:border-[#08186A]/25 hover:shadow-md transition-all duration-150">

                        
                        <div class="flex-shrink-0 pt-0.5">
                            <span class="inline-block text-[9px] font-bold uppercase tracking-wider px-2 py-1 rounded-lg ring-1 <?php echo e($badge); ?>">
                                <?php echo e($r['badge']); ?>

                            </span>
                        </div>

                        
                        <div class="flex-1 min-w-0">
                            <h2 class="text-sm font-semibold text-gray-800 group-hover:text-[#08186A] transition-colors leading-snug">
                                <?php echo e($r['title']); ?>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($r['meta'])): ?>
                                    <span class="text-xs font-normal text-gray-400 ml-1.5">· <?php echo e($r['meta']); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </h2>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($r['excerpt'])): ?>
                            <p class="text-xs text-gray-500 mt-1.5 leading-relaxed line-clamp-2">
                                <?php echo e($r['excerpt']); ?>

                            </p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        
                        <div class="flex-shrink-0 mt-0.5 opacity-0 group-hover:opacity-100 transition-opacity">
                            <svg class="w-4 h-4 text-[#08186A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </a>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php else: ?>
            
            <div class="mt-4">
                <p class="text-sm font-semibold text-gray-500 uppercase tracking-widest mb-4">Popular Categories</p>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [
                        ['Procurement Certifications', '/procurement-management-certifications/', 'blue'],
                        ['Supply Chain Certifications','/supply-chain-management-certifications/', 'blue'],
                        ['AI Courses',                 '/artificial-intelligence-ai-courses/',    'orange'],
                        ['Tourism Management',         '/tourism-management-certifications/',     'green'],
                        ['Executive Diplomas',         '/executive-diploma-in-ai-driven-procurement-strategy-transformation-ed-aipst/', 'purple'],
                        ['Online Exams',               '/online-exam/',                           'gray'],
                        ['Membership',                 '/membership/',                            'gray'],
                        ['Verify Certificate',         '/verify-a-certificate/',                  'gray'],
                        ['Online Store',               '/online-courses/',                        'orange'],
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$label, $href, $color]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <?php $cls = $badgeClasses[$color] ?? $badgeClasses['gray']; ?>
                    <a href="<?php echo e($href); ?>"
                       class="flex items-center gap-3 bg-white border border-gray-100 rounded-xl px-4 py-3.5
                              hover:border-[#08186A]/30 hover:shadow-sm transition-all group">
                        <span class="inline-block text-[9px] font-bold uppercase tracking-wide px-1.5 py-0.5 rounded-md ring-1 flex-shrink-0 <?php echo e($cls); ?>">
                            <?php echo e($color === 'blue' ? 'Cert' : ($color === 'orange' ? 'Course' : ($color === 'green' ? 'Tourism' : ($color === 'purple' ? 'Diploma' : 'Link')))); ?>

                        </span>
                        <span class="text-sm text-gray-700 font-medium group-hover:text-[#08186A] transition-colors leading-snug">
                            <?php echo e($label); ?>

                        </span>
                    </a>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    </div>
</div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd)): ?>
<?php $attributes = $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd; ?>
<?php unset($__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd)): ?>
<?php $component = $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd; ?>
<?php unset($__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd); ?>
<?php endif; ?>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views\search\index.blade.php ENDPATH**/ ?>