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

    
    <section class="bg-gradient-to-br from-[#0B2F5E] to-[#1a4a8a] text-white py-20 sm:py-28">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl sm:text-5xl font-extrabold leading-tight mb-6">
                <?php echo e($page->title); ?>

            </h1>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($page->excerpt): ?>
                <p class="text-xl text-blue-100 leading-relaxed max-w-2xl mx-auto">
                    <?php echo e($page->excerpt); ?>

                </p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?php echo e(url('/membership')); ?>"
                   class="bg-yellow-400 text-[#0B2F5E] font-bold px-8 py-3 rounded-full text-base hover:bg-yellow-300 transition-colors shadow-lg">
                    Become a Member
                </a>
                <a href="<?php echo e(url('/certification')); ?>"
                   class="border-2 border-white text-white font-semibold px-8 py-3 rounded-full text-base hover:bg-white hover:text-[#0B2F5E] transition-colors">
                    View Certifications
                </a>
            </div>
        </div>
    </section>

    
    <article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        
        <div class="
            text-gray-700 leading-relaxed
            [&_h2]:text-2xl [&_h2]:font-bold [&_h2]:text-[#0B2F5E] [&_h2]:mt-8 [&_h2]:mb-4 [&_h2]:text-center
            [&_h3]:text-xl  [&_h3]:font-semibold [&_h3]:text-[#0B2F5E] [&_h3]:mt-6 [&_h3]:mb-3
            [&_p]:mb-4 [&_p]:leading-7
            [&_ul]:list-disc [&_ul]:pl-6 [&_ul]:mb-4 [&_ul_li]:mb-1
            [&_ol]:list-decimal [&_ol]:pl-6 [&_ol]:mb-4 [&_ol_li]:mb-1
            [&_a]:text-blue-700 [&_a]:underline [&_a:hover]:text-yellow-600
            [&_blockquote]:border-l-4 [&_blockquote]:border-yellow-400 [&_blockquote]:pl-4 [&_blockquote]:italic [&_blockquote]:text-gray-600 [&_blockquote]:my-6
            [&_table]:w-full [&_table]:border-collapse [&_table]:mb-6
            [&_th]:bg-[#0B2F5E] [&_th]:text-white [&_th]:px-4 [&_th]:py-2 [&_th]:text-left
            [&_td]:border [&_td]:border-gray-200 [&_td]:px-4 [&_td]:py-2
            [&_tr:nth-child(even)_td]:bg-gray-50
            [&_img]:rounded-lg [&_img]:max-w-full [&_img]:my-4
            [&_hr]:border-gray-200 [&_hr]:my-8
        ">
            <?php echo $page->content; ?>

        </div>
    </article>

    
    <section class="bg-yellow-50 border-t border-yellow-200 py-14">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-bold text-[#0B2F5E] mb-3">Ready to Advance Your Career?</h2>
            <p class="text-gray-600 mb-6">
                Join a growing network of supply chain professionals with AAPSCM membership and certification.
            </p>
            <a href="<?php echo e(url('/membership')); ?>"
               class="inline-block bg-[#0B2F5E] text-white font-bold px-8 py-3 rounded-full hover:bg-[#0a2750] transition-colors shadow">
                Become a Member
            </a>
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
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views\cms\page\landing.blade.php ENDPATH**/ ?>