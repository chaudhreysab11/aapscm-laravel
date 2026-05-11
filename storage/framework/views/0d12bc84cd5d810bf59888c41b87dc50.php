<?php if (isset($component)) { $__componentOriginal5086ef090eb71f16e25e96f093fced46 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5086ef090eb71f16e25e96f093fced46 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms.exact-mirror-page','data' => ['page' => $page,'wrapperClass' => 'aapscm-training-virtual-certified-ai-enabled-travel-personalization-digital-marketing-professional-aitp-dmp-live-mirror']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms.exact-mirror-page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['page' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($page),'wrapperClass' => 'aapscm-training-virtual-certified-ai-enabled-travel-personalization-digital-marketing-professional-aitp-dmp-live-mirror']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5086ef090eb71f16e25e96f093fced46)): ?>
<?php $attributes = $__attributesOriginal5086ef090eb71f16e25e96f093fced46; ?>
<?php unset($__attributesOriginal5086ef090eb71f16e25e96f093fced46); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5086ef090eb71f16e25e96f093fced46)): ?>
<?php $component = $__componentOriginal5086ef090eb71f16e25e96f093fced46; ?>
<?php unset($__componentOriginal5086ef090eb71f16e25e96f093fced46); ?>
<?php endif; ?>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views\cms\page\aapscm-training-virtual-certified-ai-enabled-travel-personalization-digital-marketing-professional-aitp-dmp.blade.php ENDPATH**/ ?>