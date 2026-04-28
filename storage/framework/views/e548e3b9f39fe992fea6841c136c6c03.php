<?php
    $data = $page->page_data ?? [];
    $hero = $data['hero'] ?? [];
    $panel = $data['content_panel'] ?? [];
    $menuItems = $panel['menu_items'] ?? [];
    $heroImages = $hero['images'] ?? [];
    $currentPath = '/' . trim(request()->path(), '/') . '/';
?>

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

    <style>
        .view-job-seekers-summary {
            list-style: none;
        }

        .view-job-seekers-summary::-webkit-details-marker {
            display: none;
        }

        .view-job-seekers-summary:hover,
        .view-job-seekers-summary:focus {
            background: #195b13;
            color: #ffffff;
        }

        .view-job-seekers-summary:hover a,
        .view-job-seekers-summary:focus a {
            color: #ffffff;
        }

        details[open] .view-job-seekers-plus {
            transform: rotate(45deg);
        }
    </style>

    <section class="bg-white">
        <div class="mx-auto grid min-h-[650px] max-w-[1200px] grid-cols-1 items-center gap-10 px-4 py-12 md:grid-cols-[49.908%_50%]"
             style="background-color: <?php echo e($hero['background_color'] ?? '#DEDEDE'); ?>;">
            <div class="order-2 flex flex-col items-start justify-center md:order-1">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($heroImages[0]['src'])): ?>
                    <img src="<?php echo e($heroImages[0]['src']); ?>"
                         alt=""
                         class="w-full max-w-[130px]"
                         loading="lazy">
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($hero['heading'])): ?>
                    <h1 class="mt-[30px] font-[stratos] text-[20px] font-bold uppercase text-[#313CBF] md:text-[3.3rem]">
                        <?php echo e($hero['heading']); ?>

                    </h1>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <div class="order-1 flex justify-center md:order-2">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($heroImages[1]['src'])): ?>
                    <img src="<?php echo e($heroImages[1]['src']); ?>"
                         alt=""
                         class="w-full max-w-[374px] rounded-[10px] shadow-[0_0_4px_rgba(0,0,0,0.5)]"
                         loading="lazy">
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>

    <section class="my-[50px]">
        <div class="mx-auto grid max-w-[1200px] grid-cols-1 gap-8 px-4 md:grid-cols-[33%_66%]">
            <div>
                <nav class="overflow-hidden rounded-[5px] border-2 border-[#195B13] bg-white" aria-label="View Job Seekers Page Menu">
                    <ul class="divide-y-2 divide-[#195B13]">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <li>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($item['children'])): ?>
                                    <details>
                                        <summary class="view-job-seekers-summary flex cursor-pointer items-center justify-between px-5 py-[19px] text-[16px] font-medium text-[#202124] transition-colors">
                                            <a href="<?php echo e($item['href']); ?>" class="pr-4 text-inherit">
                                                <?php echo e($item['text']); ?>

                                            </a>
                                            <span class="view-job-seekers-plus text-[24px] leading-none text-[#195B13] transition-transform">+</span>
                                        </summary>

                                        <ul class="border-t-2 border-[#195B13] bg-[#f6f8fb]">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $item['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                                <?php
                                                    $isActive = ($child['href'] ?? '') === $currentPath;
                                                ?>
                                                <li class="border-b border-[#d9e2ec] last:border-b-0">
                                                    <a href="<?php echo e($child['href']); ?>"
                                                       class="block px-7 py-4 text-[16px] font-medium transition-colors <?php echo e($isActive ? 'bg-[#195B13] text-white' : 'text-[#202124] hover:bg-[#195B13] hover:text-white'); ?>">
                                                        <?php echo e($child['text']); ?>

                                                    </a>
                                                </li>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                        </ul>
                                    </details>
                                <?php else: ?>
                                    <a href="<?php echo e($item['href']); ?>"
                                       class="block px-5 py-[19px] text-[16px] font-medium text-[#202124] transition-colors hover:bg-[#195B13] hover:text-white">
                                        <?php echo e($item['text']); ?>

                                    </a>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </li>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </ul>
                </nav>
            </div>

            
        </div>
    </section>
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
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views/cms/page/view-job-seekers.blade.php ENDPATH**/ ?>