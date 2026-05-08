<?php if (isset($component)) { $__componentOriginal00ce34961daebfc98d189b81b763d86d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal00ce34961daebfc98d189b81b763d86d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.member-portal','data' => ['title' => 'Profile','subtitle' => 'Profile']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.member-portal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Profile','subtitle' => 'Profile']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

     <?php $__env->slot('sidebar', null, []); ?> 
        <?php if (isset($component)) { $__componentOriginal045cf4da59ba09f546a14c8bea6c081a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal045cf4da59ba09f546a14c8bea6c081a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.member.sidebar','data' => ['member' => $member,'active' => $activeSection]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('member.sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['member' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($member),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($activeSection)]); ?>
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
        <?php if (isset($component)) { $__componentOriginal06849e541fc42158be44f0b8928bab13 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal06849e541fc42158be44f0b8928bab13 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.member.section-card','data' => ['eyebrow' => 'Account','title' => 'Profile','description' => 'Identity and contact','icon' => 'profile']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('member.section-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => 'Account','title' => 'Profile','description' => 'Identity and contact','icon' => 'profile']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

             <?php $__env->slot('actions', null, []); ?> 
                <a href="<?php echo e(route('profile.edit')); ?>" class="inline-flex items-center justify-center gap-2 rounded-full border border-slate-200 px-4 py-2 text-[13px] font-semibold uppercase tracking-[0.12em] text-slate-700 transition hover:bg-slate-100"><?php if (isset($component)) { $__componentOriginal56804098dcf376a0e2227cb77b6cd00a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56804098dcf376a0e2227cb77b6cd00a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.icon','data' => ['name' => 'profile','class' => 'h-4 w-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'profile','class' => 'h-4 w-4']); ?>
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
<?php endif; ?>Manage Profile</a>
             <?php $__env->endSlot(); ?>

            <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                <div class="rounded-2xl bg-slate-50 p-5">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Account Name</p>
                    <p class="mt-3 text-[18px] font-semibold text-slate-950"><?php echo e($member->name); ?></p>
                </div>
                <div class="rounded-2xl bg-slate-50 p-5">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Email Verification</p>
                    <p class="mt-3 text-[18px] font-semibold text-slate-950"><?php echo e($member->hasVerifiedEmail() ? 'Verified' : 'Pending verification'); ?></p>
                </div>
                <div class="rounded-2xl bg-slate-50 p-5">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Account Status</p>
                    <p class="mt-3 text-[18px] font-semibold text-slate-950"><?php echo e($member->is_active ? 'Active' : 'Inactive'); ?></p>
                </div>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($profileItems !== []): ?>
                <div class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $profileItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <div class="rounded-2xl border border-slate-200 bg-white p-5">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400"><?php echo e($label); ?></p>
                            <p class="mt-3 text-[18px] font-semibold text-slate-950"><?php echo e($value); ?></p>
                        </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            <?php else: ?>
                <div class="mt-6">
                    <?php if (isset($component)) { $__componentOriginalcecb9b5a69eff3fa908bb7d695130e1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcecb9b5a69eff3fa908bb7d695130e1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.member.empty-state','data' => ['title' => 'Minimal profile details on file','message' => 'Add more profile details from account settings.','actionLabel' => 'Manage Profile','actionHref' => route('profile.edit'),'icon' => 'profile']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('member.empty-state'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Minimal profile details on file','message' => 'Add more profile details from account settings.','actionLabel' => 'Manage Profile','actionHref' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('profile.edit')),'icon' => 'profile']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcecb9b5a69eff3fa908bb7d695130e1f)): ?>
<?php $attributes = $__attributesOriginalcecb9b5a69eff3fa908bb7d695130e1f; ?>
<?php unset($__attributesOriginalcecb9b5a69eff3fa908bb7d695130e1f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcecb9b5a69eff3fa908bb7d695130e1f)): ?>
<?php $component = $__componentOriginalcecb9b5a69eff3fa908bb7d695130e1f; ?>
<?php unset($__componentOriginalcecb9b5a69eff3fa908bb7d695130e1f); ?>
<?php endif; ?>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal06849e541fc42158be44f0b8928bab13)): ?>
<?php $attributes = $__attributesOriginal06849e541fc42158be44f0b8928bab13; ?>
<?php unset($__attributesOriginal06849e541fc42158be44f0b8928bab13); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal06849e541fc42158be44f0b8928bab13)): ?>
<?php $component = $__componentOriginal06849e541fc42158be44f0b8928bab13; ?>
<?php unset($__componentOriginal06849e541fc42158be44f0b8928bab13); ?>
<?php endif; ?>
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
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views/member/profile.blade.php ENDPATH**/ ?>