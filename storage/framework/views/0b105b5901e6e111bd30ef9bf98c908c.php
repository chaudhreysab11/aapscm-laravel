<?php if (isset($component)) { $__componentOriginal00ce34961daebfc98d189b81b763d86d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal00ce34961daebfc98d189b81b763d86d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.member-portal','data' => ['title' => 'Orders','subtitle' => 'Orders']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.member-portal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Orders','subtitle' => 'Orders']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.member.section-card','data' => ['eyebrow' => 'Commerce','title' => 'Orders','description' => 'Your attached order history','icon' => 'receipt']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('member.section-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => 'Commerce','title' => 'Orders','description' => 'Your attached order history','icon' => 'receipt']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($orders->isNotEmpty()): ?>
                <div class="overflow-hidden rounded-3xl border border-slate-200">
                    <table class="min-w-full divide-y divide-slate-200 text-left text-[14px]">
                        <thead class="bg-slate-50 text-slate-500">
                            <tr>
                                <th class="px-4 py-3 font-semibold">Order</th>
                                <th class="px-4 py-3 font-semibold">Placed</th>
                                <th class="px-4 py-3 font-semibold">Payment</th>
                                <th class="px-4 py-3 font-semibold">Total</th>
                                <th class="px-4 py-3 font-semibold">Access</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 bg-white text-slate-700">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <tr>
                                    <td class="px-4 py-4 font-semibold text-slate-950"><?php echo e($order->order_number); ?></td>
                                    <td class="px-4 py-4"><?php echo e($order->created_at?->format('M d, Y') ?? 'N/A'); ?></td>
                                    <td class="px-4 py-4">
                                        <?php if (isset($component)) { $__componentOriginald271113ca69d52f8dbc84ae4f8468e44 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald271113ca69d52f8dbc84ae4f8468e44 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.status-pill','data' => ['label' => \Illuminate\Support\Str::headline((string) $order->payment_status),'tone' => match ($order->payment_status) { 'paid' => 'success', 'refunded' => 'neutral', 'failed', 'cancelled' => 'danger', default => 'warning' }]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.status-pill'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(\Illuminate\Support\Str::headline((string) $order->payment_status)),'tone' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(match ($order->payment_status) { 'paid' => 'success', 'refunded' => 'neutral', 'failed', 'cancelled' => 'danger', default => 'warning' })]); ?>
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
                                    </td>
                                    <td class="px-4 py-4"><?php echo e($order->currency); ?> <?php echo e(number_format((float) $order->total, 2)); ?></td>
                                    <td class="px-4 py-4">
                                        <div class="flex flex-wrap gap-2">
                                            <a href="<?php echo e(route('order.receipt', ['order' => $order->id])); ?>" class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-3 py-1.5 text-[12px] font-semibold text-slate-700 transition hover:bg-slate-200"><?php if (isset($component)) { $__componentOriginal56804098dcf376a0e2227cb77b6cd00a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56804098dcf376a0e2227cb77b6cd00a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.icon','data' => ['name' => 'receipt','class' => 'h-3.5 w-3.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'receipt','class' => 'h-3.5 w-3.5']); ?>
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
<?php endif; ?>Receipt</a>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($order->payment_status === 'paid' && $order->status === 'completed'): ?>
                                                <a href="<?php echo e(route('order.invoice', ['order' => $order->id])); ?>" class="inline-flex items-center gap-2 rounded-full bg-[#0b2f5e] px-3 py-1.5 text-[12px] font-semibold text-white transition hover:bg-[#174a86]"><?php if (isset($component)) { $__componentOriginal56804098dcf376a0e2227cb77b6cd00a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56804098dcf376a0e2227cb77b6cd00a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.icon','data' => ['name' => 'invoice','class' => 'h-3.5 w-3.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'invoice','class' => 'h-3.5 w-3.5']); ?>
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
<?php endif; ?>Invoice</a>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <?php if (isset($component)) { $__componentOriginalcecb9b5a69eff3fa908bb7d695130e1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcecb9b5a69eff3fa908bb7d695130e1f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.member.empty-state','data' => ['title' => 'No orders have been recorded','message' => 'Order history will appear here once linked to your account.','icon' => 'receipt']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('member.empty-state'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'No orders have been recorded','message' => 'Order history will appear here once linked to your account.','icon' => 'receipt']); ?>
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
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views/member/orders.blade.php ENDPATH**/ ?>