<?php if (isset($component)) { $__componentOriginal4180a3ac5a0c6c95fc9bdc464e812410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4180a3ac5a0c6c95fc9bdc464e812410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.cms','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.cms'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>


    <?php if (isset($component)) { $__componentOriginalf6d9d7e5c5672b8fcc13ff4976c1f9bd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf6d9d7e5c5672b8fcc13ff4976c1f9bd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms.seo-head','data' => ['page' => $page]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms.seo-head'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['page' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($page)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf6d9d7e5c5672b8fcc13ff4976c1f9bd)): ?>
<?php $attributes = $__attributesOriginalf6d9d7e5c5672b8fcc13ff4976c1f9bd; ?>
<?php unset($__attributesOriginalf6d9d7e5c5672b8fcc13ff4976c1f9bd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf6d9d7e5c5672b8fcc13ff4976c1f9bd)): ?>
<?php $component = $__componentOriginalf6d9d7e5c5672b8fcc13ff4976c1f9bd; ?>
<?php unset($__componentOriginalf6d9d7e5c5672b8fcc13ff4976c1f9bd); ?>
<?php endif; ?>

    <?php
        $intro          = $page->page_data['intro']           ?? [];
        $whyCert        = $page->page_data['why_cert']        ?? [];
        $topics         = $page->page_data['topics']          ?? [];
        $modules        = $page->page_data['modules']         ?? [];
        $trainingHeader = $page->page_data['training_header'] ?? [];
        $trainers       = $page->page_data['trainers']        ?? [];
        $schedule       = $page->page_data['schedule']        ?? [];
    ?>

    <?php if (isset($component)) { $__componentOriginalf7954dd292a0bbaf9ed6312af9465f42 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf7954dd292a0bbaf9ed6312af9465f42 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms.eltdf-title-bar','data' => ['title' => $page->title,'breadcrumbs' => [['label' => $page->title]]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms.eltdf-title-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($page->title),'breadcrumbs' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([['label' => $page->title]])]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf7954dd292a0bbaf9ed6312af9465f42)): ?>
<?php $attributes = $__attributesOriginalf7954dd292a0bbaf9ed6312af9465f42; ?>
<?php unset($__attributesOriginalf7954dd292a0bbaf9ed6312af9465f42); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf7954dd292a0bbaf9ed6312af9465f42)): ?>
<?php $component = $__componentOriginalf7954dd292a0bbaf9ed6312af9465f42; ?>
<?php unset($__componentOriginalf7954dd292a0bbaf9ed6312af9465f42); ?>
<?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($intro)): ?>
        <section class="bg-white py-14">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h2 class="text-[24px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug mb-6">
                    <?php echo e($intro['heading']); ?>

                </h2>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($intro['body'])): ?>
                    <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">
                        <?php echo e($intro['body']); ?>

                    </p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($whyCert)): ?>
        <section class="bg-[#f5f7fa] py-14">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($whyCert['image'])): ?>
                    <div class="flex justify-center">
                        <img src="<?php echo e($whyCert['image']); ?>" alt="<?php echo e($whyCert['heading'] ?? ''); ?>"
                             class="w-full max-w-[520px] h-auto rounded-lg shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px]" />
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <div>
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase mb-5 leading-snug">
                        <?php echo e($whyCert['heading']); ?>

                    </h2>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($whyCert['body_paragraphs'])): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $whyCert['body_paragraphs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $para): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-4 last:mb-0"><?php echo e($para); ?></p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <?php elseif(! empty($whyCert['body'])): ?>
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">
                            <?php echo e($whyCert['body']); ?>

                        </p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($topics)): ?>
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase mb-5 leading-snug">
                        <?php echo e($topics['heading']); ?>

                    </h2>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($topics['intro'])): ?>
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-5">
                            <?php echo e($topics['intro']); ?>

                        </p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <ul class="space-y-3 text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-5">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ($topics['items'] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <li class="flex gap-3">
                                <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                <span><?php echo e($item); ?></span>
                            </li>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </ul>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($topics['closing'])): ?>
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">
                            <?php echo e($topics['closing']); ?>

                        </p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($topics['image'])): ?>
                    <div class="flex justify-center">
                        <img src="<?php echo e($topics['image']); ?>" alt="<?php echo e($topics['heading'] ?? ''); ?>"
                             class="w-full max-w-[520px] h-auto rounded-lg shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px]" />
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($modules) && ! empty($modules['items'])): ?>
        <section class="bg-[#14166e] py-14 text-white">
            <div class="max-w-[1200px] mx-auto px-4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($modules['heading'])): ?>
                    <h2 class="text-[24px] md:text-[32px] font-bold uppercase leading-snug text-center mb-4">
                        <?php echo e($modules['heading']); ?>

                    </h2>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($modules['intro'])): ?>
                    <p class="text-[15px] md:text-[16px] text-gray-100 leading-relaxed text-center max-w-[900px] mx-auto mb-10">
                        <?php echo e($modules['intro']); ?>

                    </p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $modules['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <div class="bg-white text-gray-700 rounded-lg p-6 shadow-[rgba(0,0,0,0.18)_0px_6px_18px_0px] flex flex-col">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($item['icon'])): ?>
                                <img src="<?php echo e($item['icon']); ?>" alt="" class="w-12 h-12 mb-4" />
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <h3 class="text-[16px] md:text-[18px] font-bold text-[#14166e] mb-2 leading-snug">
                                <?php echo e($item['title']); ?>

                            </h3>
                            <p class="text-[14px] md:text-[15px] leading-relaxed"><?php echo e($item['desc']); ?></p>
                        </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($trainingHeader['heading'])): ?>
        <section class="bg-[#14166e] py-14 text-white">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h2 class="text-[24px] md:text-[32px] lg:text-[36px] font-bold uppercase leading-snug">
                    <?php echo e($trainingHeader['heading']); ?>

                </h2>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($trainers)): ?>
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4" x-data="{ active: 0 }">
                
                <div class="flex flex-wrap gap-0 border-b border-gray-200 mb-8">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $trainers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $trainer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <button type="button"
                                @click="active = <?php echo e($i); ?>"
                                :class="active === <?php echo e($i); ?> ? 'bg-[#14166e] text-white' : 'bg-white text-[#14166e] hover:bg-[#f5f7fa]'"
                                class="px-6 md:px-8 py-3 text-[14px] md:text-[15px] font-semibold uppercase tracking-wide border border-gray-200 border-b-0 -mb-px transition">
                            <?php echo e($trainer['tab_label'] ?? $trainer['name'] ?? 'Trainer'); ?>

                        </button>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $trainers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $trainer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <?php $addr = $trainer['info']['address'] ?? []; ?>
                    <div x-show="active === <?php echo e($i); ?>" x-cloak class="grid grid-cols-1 md:grid-cols-[300px_1fr] gap-0 border border-gray-200 rounded-lg overflow-hidden shadow-[rgba(100,100,111,0.12)_0px_4px_18px_0px]">
                        
                        <div class="bg-[#14166e] text-white p-8 space-y-6">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($trainer['avatar'])): ?>
                                <div class="flex justify-center">
                                    <img src="<?php echo e($trainer['avatar']); ?>" alt="<?php echo e($trainer['name'] ?? ''); ?>"
                                         class="w-[180px] h-[180px] rounded-full object-cover border-4 border-white/20 shadow-[rgba(0,0,0,0.25)_0px_6px_18px_0px]" />
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            <div class="space-y-1">
                                <div class="flex items-center gap-2 text-[15px] font-bold uppercase tracking-wide">
                                    <svg class="w-4 h-4 text-[#5cb85c]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-13a.75.75 0 00-1.5 0v5c0 .2.08.39.22.53l3 3a.75.75 0 101.06-1.06L10.75 9.69V5z" clip-rule="evenodd" /></svg>
                                    <span>Time</span>
                                </div>
                                <p class="text-[15px] text-gray-100 pl-6"><?php echo e($trainer['info']['time'] ?? ''); ?></p>
                            </div>

                            <div class="space-y-1">
                                <div class="flex items-center gap-2 text-[15px] font-bold uppercase tracking-wide">
                                    <svg class="w-4 h-4 text-[#5cb85c]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 12.93V15a1 1 0 11-2 0v-.07A4 4 0 016 11a1 1 0 112 0 2 2 0 104 0c0-.78-.42-1.17-1.65-1.53C8.64 9.04 6 8.28 6 5.5 6 3.84 7.2 2.57 9 2.14V2a1 1 0 112 0v.14A4 4 0 0114 5a1 1 0 11-2 0 2 2 0 10-4 0c0 .78.42 1.17 1.65 1.53 1.71.43 4.35 1.19 4.35 3.97 0 1.66-1.2 2.93-3 3.36z" /></svg>
                                    <span>Fees</span>
                                </div>
                                <p class="text-[18px] text-[#5cb85c] font-bold pl-6"><?php echo e($trainer['info']['fees'] ?? ''); ?></p>
                            </div>

                            <div class="space-y-1">
                                <div class="flex items-center gap-2 text-[15px] font-bold uppercase tracking-wide">
                                    <svg class="w-4 h-4 text-[#5cb85c]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M10 2a6 6 0 016 6c0 4.5-6 10-6 10S4 12.5 4 8a6 6 0 016-6zm0 8a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" /></svg>
                                    <span>Address</span>
                                </div>
                                <div class="text-[14px] text-gray-100 leading-relaxed pl-6 space-y-1">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($addr['org'])): ?>    <p class="font-semibold"><?php echo e($addr['org']); ?></p> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($addr['street'])): ?> <p><?php echo e($addr['street']); ?></p>                   <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($addr['phone'])): ?>  <p><a href="tel:<?php echo e(preg_replace('/[^+\d]/', '', $addr['phone'])); ?>" class="hover:text-[#5cb85c]"><?php echo e($addr['phone']); ?></a></p> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($addr['email'])): ?>  <p><a href="mailto:<?php echo e($addr['email']); ?>" class="hover:text-[#5cb85c]"><?php echo e($addr['email']); ?></a></p> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($addr['fax'])): ?>    <p><?php echo e($addr['fax']); ?></p>                     <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </div>
                        </div>

                        
                        <div class="bg-white p-8">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($trainer['name'])): ?>
                                <h3 class="text-[20px] md:text-[24px] font-bold text-[#14166e] leading-snug mb-4">
                                    <?php echo e($trainer['name']); ?>

                                </h3>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($trainer['bio'])): ?>
                                <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-5">
                                    <?php echo e($trainer['bio']); ?>

                                </p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($trainer['badges'])): ?>
                                <ul class="space-y-3 text-[15px] md:text-[16px] text-gray-700 leading-relaxed">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $trainer['badges']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $badge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                        <li class="flex gap-3">
                                            <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                            <span><span class="font-semibold text-[#14166e]"><?php echo e($badge['title']); ?>:</span> <?php echo e($badge['text']); ?></span>
                                        </li>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </ul>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($trainer['closing'])): ?>
                                <p class="mt-5 text-[15px] md:text-[16px] text-gray-700 leading-relaxed">
                                    <?php echo e($trainer['closing']); ?>

                                </p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($schedule)): ?>
        <section class="bg-white py-14">
            <div class="max-w-[720px] mx-auto px-4 text-center">
                <h2 class="text-[24px] md:text-[30px] font-bold text-[#14166e] uppercase mb-8">
                    <?php echo e($schedule['label'] ?? ''); ?> Schedule
                </h2>
                <form class="space-y-6" onsubmit="event.preventDefault(); if (this.date.value) window.location.href = '<?php echo e($schedule['cta_href'] ?? '#'); ?>';">
                    <label class="block text-left">
                        <span class="sr-only"><?php echo e($schedule['placeholder'] ?? 'Choose an option'); ?></span>
                        <select name="date"
                                class="w-full rounded-full border border-gray-300 bg-white px-6 py-3 text-[15px] text-gray-700 focus:outline-none focus:border-[#14166e] focus:ring-2 focus:ring-[#14166e]/20">
                            <option value=""><?php echo e($schedule['placeholder'] ?? 'Choose an option'); ?></option>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ($schedule['options'] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <option value="<?php echo e($opt); ?>"><?php echo e($opt); ?></option>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </select>
                    </label>
                    <button type="submit"
                            class="inline-block bg-[#5cb85c] hover:bg-[#4cae4c] text-white font-semibold text-[15px] px-10 py-3 rounded-full uppercase tracking-wide transition">
                        <?php echo e($schedule['cta_label'] ?? 'Schedule Training'); ?>

                    </button>
                </form>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4180a3ac5a0c6c95fc9bdc464e812410)): ?>
<?php $attributes = $__attributesOriginal4180a3ac5a0c6c95fc9bdc464e812410; ?>
<?php unset($__attributesOriginal4180a3ac5a0c6c95fc9bdc464e812410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4180a3ac5a0c6c95fc9bdc464e812410)): ?>
<?php $component = $__componentOriginal4180a3ac5a0c6c95fc9bdc464e812410; ?>
<?php unset($__componentOriginal4180a3ac5a0c6c95fc9bdc464e812410); ?>
<?php endif; ?>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views/cms/page/aapscm-training-virtual-american-certified-sustainable-and-circular-supply-chain-professional-ac-cscsp.blade.php ENDPATH**/ ?>