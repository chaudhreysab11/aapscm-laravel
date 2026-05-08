<?php if (isset($component)) { $__componentOriginal00ce34961daebfc98d189b81b763d86d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal00ce34961daebfc98d189b81b763d86d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.member-portal','data' => ['title' => 'Membership Profile','subtitle' => 'Membership']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.member-portal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Membership Profile','subtitle' => 'Membership']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.member.section-card','data' => ['eyebrow' => 'Membership','title' => 'Membership Profile','description' => 'Current membership record','icon' => 'membership']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('member.section-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => 'Membership','title' => 'Membership Profile','description' => 'Current membership record','icon' => 'membership']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($membership): ?>
                <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                    <div class="rounded-2xl bg-slate-50 p-5">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Tier</p>
                        <p class="mt-3 text-[20px] font-semibold text-slate-950"><?php echo e($membership->tier?->name ?? 'Membership'); ?></p>
                    </div>
                    <div class="rounded-2xl bg-slate-50 p-5">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Status</p>
                        <p class="mt-3 text-[20px] font-semibold text-slate-950"><?php echo e(\Illuminate\Support\Str::headline($membership->status)); ?></p>
                    </div>
                    <div class="rounded-2xl bg-slate-50 p-5">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Billing Cycle</p>
                        <p class="mt-3 text-[20px] font-semibold text-slate-950"><?php echo e(\Illuminate\Support\Str::headline((string) $membership->billing_cycle)); ?></p>
                    </div>
                    <div class="rounded-2xl bg-slate-50 p-5">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Expires</p>
                        <p class="mt-3 text-[20px] font-semibold text-slate-950"><?php echo e($membership->expires_at?->format('M d, Y') ?? 'Not set'); ?></p>
                    </div>
                </div>

                <div class="mt-6 grid gap-4 md:grid-cols-2">
                    <?php if (isset($component)) { $__componentOriginalaafb98a34ea7acb8d8015ad76462c951 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaafb98a34ea7acb8d8015ad76462c951 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.meta-row','data' => ['icon' => 'calendar','label' => 'Member Since','value' => $memberSince ? \Illuminate\Support\Carbon::parse($memberSince)->format('M d, Y') : 'Not available','class' => 'rounded-2xl border border-slate-200 bg-white p-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.meta-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'calendar','label' => 'Member Since','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($memberSince ? \Illuminate\Support\Carbon::parse($memberSince)->format('M d, Y') : 'Not available'),'class' => 'rounded-2xl border border-slate-200 bg-white p-5']); ?>
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
                    <div class="rounded-2xl border border-slate-200 bg-white p-5">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Renewal</p>
                        <div class="mt-3">
                            <?php if (isset($component)) { $__componentOriginald271113ca69d52f8dbc84ae4f8468e44 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald271113ca69d52f8dbc84ae4f8468e44 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.status-pill','data' => ['label' => $membership->expires_at && $membership->expires_at->isFuture() ? 'In good standing' : 'Needs review','tone' => $membership->expires_at && $membership->expires_at->isFuture() ? 'success' : 'warning']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.status-pill'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($membership->expires_at && $membership->expires_at->isFuture() ? 'In good standing' : 'Needs review'),'tone' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($membership->expires_at && $membership->expires_at->isFuture() ? 'success' : 'warning')]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald271113ca69d52f8dbc84ae4f8468e44)): ?>
<?php $attributes = $__attributesOriginald271113ca69d52f8dbc84ae4f8468e44; ?>
<?php unset($__attributesOriginald271113ca69d52f8dbc84ae4f8468e44); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald271113ca69d52f8dbc84ae4f8468e44)): ?>
<?php $component = $__componentOriginald271113ca69d52f8dbc84ae4f8468e44; ?>
<?php unset($__componentOriginald271113ca69d52f8dbc84ae4f8468e44); ?>
<?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <?php if (isset($component)) { $__componentOriginalcecb9b5a69eff3fa908bb7d695130e1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcecb9b5a69eff3fa908bb7d695130e1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.member.empty-state','data' => ['title' => 'No membership profile attached','message' => 'No active or migrated membership record is attached yet.','icon' => 'membership']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('member.empty-state'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'No membership profile attached','message' => 'No active or migrated membership record is attached yet.','icon' => 'membership']); ?>
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
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views/member/membership.blade.php ENDPATH**/ ?>