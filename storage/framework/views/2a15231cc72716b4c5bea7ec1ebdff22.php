<?php
    /** @var \App\Models\Page $page */
    $data = $page->page_data ?? [];
    $form = $data['form'] ?? [];
    $labels = $form['labels'] ?? [];
    $separator = $form['separator'] ?? 'OR';
    $submitLabel = $form['submit'] ?? 'Verify';

    $submitted = $submitted ?? false;
    $awarded = $awarded ?? null;
    $submittedValues = $submittedValues ?? [
        'first_name' => '',
        'last_name' => '',
        'certificate_number' => '',
    ];
?>

<?php if (isset($component)) { $__componentOriginal4180a3ac5a0c6c95fc9bdc464e812410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4180a3ac5a0c6c95fc9bdc464e812410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.cms','data' => ['page' => $page]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.cms'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['page' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($page)]); ?>
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

    <div class="eltdf-container eltdf-default-page-template" style="padding: 56px 0 64px; background: #fff;">
        <div class="eltdf-container-inner clearfix" style="max-width: 808px; margin: 0 auto; padding: 0 20px;">
            <div class="eltdf-grid-row eltdf-grid-medium-gutter">
                <div class="eltdf-page-content-holder eltdf-grid-col-12">
                    <form id="verify-certificate-form"
                        method="post"
                        action="/verify-a-certificate/"
                        style="width: 100%; max-width: 425.6px; padding: 40px; border-radius: 5px; box-shadow: rgba(0, 0, 0, 0.16) 0 1px 4px; background: transparent;">
                        <?php echo csrf_field(); ?>

                        <label style="display: block; font-size: 15px; line-height: 24px; margin-bottom: 4px;"><b><?php echo e($labels['first_name'] ?? 'First Name:'); ?></b></label>
                        <input type="text" name="first_name"
                            value="<?php echo e(old('first_name', $submittedValues['first_name'] ?? '')); ?>"
                            style="display: block; width: 100%; margin-bottom: 12px; padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 0;" />

                        <p style="width: 100%; text-align: center; margin: 4px 0;"><?php echo e($separator); ?></p>

                        <label style="display: block; font-size: 15px; line-height: 24px; margin-bottom: 4px;"><b><?php echo e($labels['last_name'] ?? 'Last Name:'); ?></b></label>
                        <input type="text" name="last_name"
                            value="<?php echo e(old('last_name', $submittedValues['last_name'] ?? '')); ?>"
                            style="display: block; width: 100%; margin-bottom: 12px; padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 0;" />

                        <label style="display: block; font-size: 15px; line-height: 24px; margin-bottom: 4px;"><b><?php echo e($labels['certificate_number'] ?? 'Certificate Number:'); ?></b></label>
                        <input type="text" name="certificate_number" required
                            value="<?php echo e(old('certificate_number', $submittedValues['certificate_number'] ?? '')); ?>"
                            style="display: block; width: 100%; margin-bottom: 16px; padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 0;" />

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['certificate_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p style="color: #dc2626; font-size: 14px; margin: 0 0 12px;"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <button type="submit" name="verify_certificate"
                            style="background-color: #08186A; color: #fff; font-family: 'Poppins', sans-serif; font-size: 15px; font-weight: 500; border: 0; border-radius: 30px; padding: 12px 30px; width: 120px; cursor: pointer;">
                            <?php echo e($submitLabel); ?>

                        </button>
                    </form>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($submitted): ?>
                        <div class="certificate-result" style="width: 100%; max-width: 768px; margin-top: 32px;">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($awarded): ?>
                                <div style="border: 1px solid #e5e7eb; border-radius: 6px; padding: 20px;">
                                    <h3 style="color: #14166e; font-size: 18px; font-weight: 600; margin: 0 0 12px;">Certificate Verified</h3>
                                    <dl style="font-size: 14px; color: #374151; margin: 0;">
                                        <div style="display: flex; margin-bottom: 8px;">
                                            <dt style="width: 176px; font-weight: 500;">Certificate Number:</dt>
                                            <dd><?php echo e($awarded->certificate_number); ?></dd>
                                        </div>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($awarded->user): ?>
                                            <div style="display: flex; margin-bottom: 8px;">
                                                <dt style="width: 176px; font-weight: 500;">Holder:</dt>
                                                <dd><?php echo e($awarded->user->name); ?></dd>
                                            </div>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($awarded->catalogEntry): ?>
                                            <div style="display: flex; margin-bottom: 8px;">
                                                <dt style="width: 176px; font-weight: 500;">Certification:</dt>
                                                <dd><?php echo e($awarded->catalogEntry->name ?? $awarded->catalogEntry->title ?? ''); ?></dd>
                                            </div>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($awarded->issued_at): ?>
                                            <div style="display: flex; margin-bottom: 8px;">
                                                <dt style="width: 176px; font-weight: 500;">Issued:</dt>
                                                <dd><?php echo e($awarded->issued_at->format('M j, Y')); ?></dd>
                                            </div>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($awarded->expires_at): ?>
                                            <div style="display: flex; margin-bottom: 8px;">
                                                <dt style="width: 176px; font-weight: 500;">Expires:</dt>
                                                <dd><?php echo e($awarded->expires_at->format('M j, Y')); ?></dd>
                                            </div>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <div style="display: flex;">
                                            <dt style="width: 176px; font-weight: 500;">Status:</dt>
                                            <dd>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($awarded->isActive()): ?>
                                                    <span style="color: #15803d; font-weight: 500;">Active</span>
                                                <?php else: ?>
                                                    <span style="color: #b91c1c; font-weight: 500;">Inactive</span>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                            <?php else: ?>
                                <div style="border: 1px solid #fecaca; background: #fef2f2; border-radius: 6px; padding: 20px;">
                                    <p style="color: #b91c1c; font-weight: 500; margin: 0;">No certificate found matching the supplied details.</p>
                                    <p style="font-size: 14px; color: #374151; margin: 8px 0 0;">Please double-check the certificate number and try again.</p>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>
    </div>
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
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views\cms\page\verify-a-certificate-live.blade.php ENDPATH**/ ?>