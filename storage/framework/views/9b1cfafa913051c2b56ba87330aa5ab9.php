<?php if (isset($component)) { $__componentOriginal288ea5d25d70c122916f984b00a622d8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal288ea5d25d70c122916f984b00a622d8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.auth-portal','data' => ['eyebrow' => 'AAPSCM® Email Verification','title' => 'Verify Email','compact' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.auth-portal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => 'AAPSCM® Email Verification','title' => 'Verify Email','compact' => true]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>


    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status') == 'verification-link-sent'): ?>
        <div class="mt-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-[14px] text-emerald-800 dark:border-emerald-900/50 dark:bg-emerald-950/40 dark:text-emerald-200">
            A new verification link has been sent to your email address.
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="mt-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <form method="POST" action="<?php echo e(route('verification.send')); ?>">
            <?php echo csrf_field(); ?>

            <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-full bg-[#0b2f5e] px-6 py-3 text-[13px] font-semibold uppercase tracking-[0.12em] text-white transition hover:bg-[#174a86]">
                <?php if (isset($component)) { $__componentOriginal56804098dcf376a0e2227cb77b6cd00a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56804098dcf376a0e2227cb77b6cd00a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.icon','data' => ['name' => 'mail','class' => 'h-4 w-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'mail','class' => 'h-4 w-4']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal56804098dcf376a0e2227cb77b6cd00a)): ?>
<?php $attributes = $__attributesOriginal56804098dcf376a0e2227cb77b6cd00a; ?>
<?php unset($__attributesOriginal56804098dcf376a0e2227cb77b6cd00a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal56804098dcf376a0e2227cb77b6cd00a)): ?>
<?php $component = $__componentOriginal56804098dcf376a0e2227cb77b6cd00a; ?>
<?php unset($__componentOriginal56804098dcf376a0e2227cb77b6cd00a); ?>
<?php endif; ?>
                Resend Verification
            </button>
        </form>

        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>

            <button type="submit" class="text-[14px] font-semibold text-slate-600 transition hover:text-slate-900 dark:text-slate-300 dark:hover:text-white">
                Log Out
            </button>
        </form>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal288ea5d25d70c122916f984b00a622d8)): ?>
<?php $attributes = $__attributesOriginal288ea5d25d70c122916f984b00a622d8; ?>
<?php unset($__attributesOriginal288ea5d25d70c122916f984b00a622d8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal288ea5d25d70c122916f984b00a622d8)): ?>
<?php $component = $__componentOriginal288ea5d25d70c122916f984b00a622d8; ?>
<?php unset($__componentOriginal288ea5d25d70c122916f984b00a622d8); ?>
<?php endif; ?>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views/auth/verify-email.blade.php ENDPATH**/ ?>