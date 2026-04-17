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

    <?php if (isset($component)) { $__componentOriginal85fffcd3d2a4151f4bcd147cbc3f9ec7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal85fffcd3d2a4151f4bcd147cbc3f9ec7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.certification.seo-head','data' => ['title' => 'Professional Certifications &amp; Credentials | AAPSCM','description' => 'Browse AAPSCM\'s full catalog of professional supply chain certifications and credentials. Advance your career with globally recognised qualifications.','canonical' => route('certifications.index')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('certification.seo-head'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Professional Certifications &amp; Credentials | AAPSCM','description' => 'Browse AAPSCM\'s full catalog of professional supply chain certifications and credentials. Advance your career with globally recognised qualifications.','canonical' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('certifications.index'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal85fffcd3d2a4151f4bcd147cbc3f9ec7)): ?>
<?php $attributes = $__attributesOriginal85fffcd3d2a4151f4bcd147cbc3f9ec7; ?>
<?php unset($__attributesOriginal85fffcd3d2a4151f4bcd147cbc3f9ec7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal85fffcd3d2a4151f4bcd147cbc3f9ec7)): ?>
<?php $component = $__componentOriginal85fffcd3d2a4151f4bcd147cbc3f9ec7; ?>
<?php unset($__componentOriginal85fffcd3d2a4151f4bcd147cbc3f9ec7); ?>
<?php endif; ?>

    
    <div class="bg-[#0B2F5E] text-white py-14">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl lg:text-5xl font-bold mb-4">Professional Certifications</h1>
            <p class="text-white/70 text-lg max-w-2xl mx-auto">
                World-class supply chain credentials that employers recognise and value.
            </p>
        </div>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($credentialTypes->isNotEmpty()): ?>
        <div class="bg-white border-b border-gray-200 sticky top-0 z-20">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 overflow-x-auto">
                <div class="flex items-center gap-1 py-3 whitespace-nowrap">
                    <a href="<?php echo e(route('certifications.index')); ?>"
                       class="px-4 py-1.5 rounded-full text-sm font-medium transition-colors duration-150
                           <?php echo e(is_null($activeType)
                               ? 'bg-[#0B2F5E] text-white'
                               : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100'); ?>">
                        All
                    </a>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $credentialTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <a href="<?php echo e(route('certifications.index', ['type' => $type])); ?>"
                           class="px-4 py-1.5 rounded-full text-sm font-medium capitalize transition-colors duration-150
                               <?php echo e($activeType === $type
                                   ? 'bg-[#0B2F5E] text-white'
                                   : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100'); ?>">
                            <?php echo e(str_replace('_', ' ', $type)); ?>

                        </a>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($certifications->isEmpty()): ?>
            <div class="text-center py-24">
                <p class="text-gray-500 text-lg">No certifications found for the selected filter.</p>
                <a href="<?php echo e(route('certifications.index')); ?>"
                   class="mt-4 inline-block text-sm text-[#0B2F5E] underline underline-offset-4">
                    View all certifications
                </a>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $certifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginaldff61cc3a1a31e86cecb904a40356841 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldff61cc3a1a31e86cecb904a40356841 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.certification.card','data' => ['certification' => $certification]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('certification.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['certification' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($certification)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldff61cc3a1a31e86cecb904a40356841)): ?>
<?php $attributes = $__attributesOriginaldff61cc3a1a31e86cecb904a40356841; ?>
<?php unset($__attributesOriginaldff61cc3a1a31e86cecb904a40356841); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldff61cc3a1a31e86cecb904a40356841)): ?>
<?php $component = $__componentOriginaldff61cc3a1a31e86cecb904a40356841; ?>
<?php unset($__componentOriginaldff61cc3a1a31e86cecb904a40356841); ?>
<?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($certifications->hasPages()): ?>
                <div class="mt-12 flex justify-center">
                    <?php echo e($certifications->links()); ?>

                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

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
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views/certifications/index.blade.php ENDPATH**/ ?>