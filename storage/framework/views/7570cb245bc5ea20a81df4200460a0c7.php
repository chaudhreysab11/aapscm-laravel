<?php if (isset($component)) { $__componentOriginal00ce34961daebfc98d189b81b763d86d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal00ce34961daebfc98d189b81b763d86d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.member-portal','data' => ['title' => 'Account Settings','subtitle' => 'Account details, security, and lifecycle settings']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.member-portal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Account Settings','subtitle' => 'Account details, security, and lifecycle settings']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

     <?php $__env->slot('sidebar', null, []); ?> 
        <?php if (isset($component)) { $__componentOriginal045cf4da59ba09f546a14c8bea6c081a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal045cf4da59ba09f546a14c8bea6c081a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.member.sidebar','data' => ['member' => $user,'active' => 'profile']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('member.sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['member' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user),'active' => 'profile']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal045cf4da59ba09f546a14c8bea6c081a)): ?>
<?php $attributes = $__attributesOriginal045cf4da59ba09f546a14c8bea6c081a; ?>
<?php unset($__attributesOriginal045cf4da59ba09f546a14c8bea6c081a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal045cf4da59ba09f546a14c8bea6c081a)): ?>
<?php $component = $__componentOriginal045cf4da59ba09f546a14c8bea6c081a; ?>
<?php unset($__componentOriginal045cf4da59ba09f546a14c8bea6c081a); ?>
<?php endif; ?>
     <?php $__env->endSlot(); ?>

    <div class="space-y-8">
        <div class="grid gap-4 xl:grid-cols-3">
            <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                <?php if (isset($component)) { $__componentOriginalaafb98a34ea7acb8d8015ad76462c951 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaafb98a34ea7acb8d8015ad76462c951 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.meta-row','data' => ['icon' => 'user','label' => 'Account Name','value' => $user->name]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.meta-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'user','label' => 'Account Name','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user->name)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalaafb98a34ea7acb8d8015ad76462c951)): ?>
<?php $attributes = $__attributesOriginalaafb98a34ea7acb8d8015ad76462c951; ?>
<?php unset($__attributesOriginalaafb98a34ea7acb8d8015ad76462c951); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaafb98a34ea7acb8d8015ad76462c951)): ?>
<?php $component = $__componentOriginalaafb98a34ea7acb8d8015ad76462c951; ?>
<?php unset($__componentOriginalaafb98a34ea7acb8d8015ad76462c951); ?>
<?php endif; ?>
            </div>
            <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                <?php if (isset($component)) { $__componentOriginalaafb98a34ea7acb8d8015ad76462c951 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaafb98a34ea7acb8d8015ad76462c951 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.meta-row','data' => ['icon' => 'mail','label' => 'Email Status','value' => $user->hasVerifiedEmail() ? 'Verified' : 'Verification pending']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.meta-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'mail','label' => 'Email Status','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user->hasVerifiedEmail() ? 'Verified' : 'Verification pending')]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalaafb98a34ea7acb8d8015ad76462c951)): ?>
<?php $attributes = $__attributesOriginalaafb98a34ea7acb8d8015ad76462c951; ?>
<?php unset($__attributesOriginalaafb98a34ea7acb8d8015ad76462c951); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaafb98a34ea7acb8d8015ad76462c951)): ?>
<?php $component = $__componentOriginalaafb98a34ea7acb8d8015ad76462c951; ?>
<?php unset($__componentOriginalaafb98a34ea7acb8d8015ad76462c951); ?>
<?php endif; ?>
            </div>
            <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                <?php if (isset($component)) { $__componentOriginalaafb98a34ea7acb8d8015ad76462c951 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaafb98a34ea7acb8d8015ad76462c951 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.meta-row','data' => ['icon' => 'shield','label' => 'Member Profile','value' => 'Account Settings']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.meta-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'shield','label' => 'Member Profile','value' => 'Account Settings']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalaafb98a34ea7acb8d8015ad76462c951)): ?>
<?php $attributes = $__attributesOriginalaafb98a34ea7acb8d8015ad76462c951; ?>
<?php unset($__attributesOriginalaafb98a34ea7acb8d8015ad76462c951); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaafb98a34ea7acb8d8015ad76462c951)): ?>
<?php $component = $__componentOriginalaafb98a34ea7acb8d8015ad76462c951; ?>
<?php unset($__componentOriginalaafb98a34ea7acb8d8015ad76462c951); ?>
<?php endif; ?>
            </div>
        </div>

        <div class="grid gap-6 xl:grid-cols-[1.15fr_0.85fr]">
            <div class="space-y-6">
                <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm md:p-8 dark:border-slate-800 dark:bg-slate-900">
                    <div class="mb-6 flex items-center gap-3 border-b border-slate-200 pb-4 dark:border-slate-800">
                        <span class="inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-[#edf3fb] text-[#0b2f5e] dark:bg-slate-800 dark:text-slate-100">
                            <?php if (isset($component)) { $__componentOriginal56804098dcf376a0e2227cb77b6cd00a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56804098dcf376a0e2227cb77b6cd00a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.icon','data' => ['name' => 'profile','class' => 'h-5 w-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'profile','class' => 'h-5 w-5']); ?>
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
                        </span>
                        <div>
                            <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Profile</p>
                            <p class="text-[18px] font-semibold text-slate-950 dark:text-slate-100">Contact information</p>
                        </div>
                    </div>
                    <?php echo $__env->make('profile.partials.update-profile-information-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>

                <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm md:p-8 dark:border-slate-800 dark:bg-slate-900">
                    <div class="mb-6 flex items-center gap-3 border-b border-slate-200 pb-4 dark:border-slate-800">
                        <span class="inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-[#edf3fb] text-[#0b2f5e] dark:bg-slate-800 dark:text-slate-100">
                            <?php if (isset($component)) { $__componentOriginal56804098dcf376a0e2227cb77b6cd00a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56804098dcf376a0e2227cb77b6cd00a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.icon','data' => ['name' => 'lock','class' => 'h-5 w-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'lock','class' => 'h-5 w-5']); ?>
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
                        </span>
                        <div>
                            <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Security</p>
                            <p class="text-[18px] font-semibold text-slate-950 dark:text-slate-100">Update password</p>
                        </div>
                    </div>
                    <?php echo $__env->make('profile.partials.update-password-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>

            <div class="rounded-[28px] border border-rose-200 bg-rose-50/80 p-6 shadow-sm md:p-8 dark:border-rose-900/40 dark:bg-rose-950/20">
                <div class="mb-6 flex items-center gap-3 border-b border-rose-200 pb-4 dark:border-rose-900/40">
                    <span class="inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-white text-rose-700 dark:bg-rose-950/50 dark:text-rose-200">
                        <?php if (isset($component)) { $__componentOriginal56804098dcf376a0e2227cb77b6cd00a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56804098dcf376a0e2227cb77b6cd00a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.icon','data' => ['name' => 'warning','class' => 'h-5 w-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'warning','class' => 'h-5 w-5']); ?>
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
                    </span>
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-rose-500">Account Lifecycle</p>
                        <p class="text-[18px] font-semibold text-rose-950 dark:text-rose-100">Delete account</p>
                    </div>
                </div>
                <?php echo $__env->make('profile.partials.delete-user-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal00ce34961daebfc98d189b81b763d86d)): ?>
<?php $attributes = $__attributesOriginal00ce34961daebfc98d189b81b763d86d; ?>
<?php unset($__attributesOriginal00ce34961daebfc98d189b81b763d86d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal00ce34961daebfc98d189b81b763d86d)): ?>
<?php $component = $__componentOriginal00ce34961daebfc98d189b81b763d86d; ?>
<?php unset($__componentOriginal00ce34961daebfc98d189b81b763d86d); ?>
<?php endif; ?>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views\profile\edit.blade.php ENDPATH**/ ?>