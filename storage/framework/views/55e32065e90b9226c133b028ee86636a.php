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


    <?php $__env->startPush('title'); ?>Cart — <?php $__env->stopPush(); ?>

    <?php
        $resolveProductImage = static function (?string $image): ?string {
            if (! is_string($image) || trim($image) === '') {
                return null;
            }

            $image = trim($image);

            if (str_starts_with($image, 'http://') || str_starts_with($image, 'https://') || str_starts_with($image, '/')) {
                return $image;
            }

            return asset('storage/' . ltrim($image, '/'));
        };
    ?>

    
    <section class="relative overflow-hidden bg-[radial-gradient(circle_at_top_left,_#1f4d8a,_#0b2f5e_55%,_#071f40)] py-10 text-white">
        <div class="absolute inset-0 opacity-20 [background-image:linear-gradient(rgba(255,255,255,0.2)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.12)_1px,transparent_1px)] [background-size:32px_32px]"></div>
        <div class="relative mx-auto max-w-[1180px] px-4">
            <p class="text-[12px] font-semibold uppercase tracking-[0.28em] text-[#f0b323]">AAPSCM Store</p>
            <h1 class="mt-2 text-[34px] font-bold leading-tight">Cart</h1>
            <nav class="mt-2 flex items-center gap-2 text-[13px] text-white/70">
                <a href="<?php echo e(route('home')); ?>" class="transition-colors hover:text-white">Home</a>
                <span>/</span>
                <span>Cart</span>
            </nav>
        </div>
    </section>

    <section class="bg-[#f4f7fb] py-[60px]">
        <div class="mx-auto max-w-[1180px] px-4">

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
                <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-[14px] text-emerald-800">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
                <div class="mb-6 rounded-2xl border border-rose-200 bg-rose-50 px-5 py-4 text-[14px] text-rose-800">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
                <div class="mb-6 rounded-2xl border border-rose-200 bg-rose-50 px-5 py-4 text-[14px] text-rose-800">
                    <strong>Please correct the following:</strong>
                    <ul class="mt-2 list-disc space-y-1 pl-5">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <li><?php echo e($error); ?></li>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($items->isEmpty()): ?>
                <div class="rounded-2xl border border-slate-200 bg-white p-8 text-center shadow-sm">
                    <p class="text-[16px] text-slate-600">Your cart is currently empty.</p>
                    <a href="<?php echo e(route('home')); ?>" class="mt-6 inline-flex items-center justify-center gap-2 rounded-full border border-[#0b2f5e] px-6 py-3 text-[13px] font-semibold uppercase tracking-[0.12em] text-[#0b2f5e] transition hover:bg-[#0b2f5e] hover:text-white">
                        Return to shop
                    </a>
                </div>
            <?php else: ?>
                <div class="grid gap-8 lg:grid-cols-[minmax(0,1fr)_320px] lg:items-start">
                    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-left text-[14px] text-slate-600">
                                <thead class="border-b border-slate-200 bg-slate-50 text-[13px] font-semibold uppercase tracking-[0.08em] text-slate-700">
                                    <tr>
                                        <th class="w-[70px] px-4 py-4 text-center"></th>
                                        <th class="w-[110px] px-4 py-4 text-center"></th>
                                        <th class="px-4 py-4">Product</th>
                                        <th class="w-[150px] px-4 py-4 text-right">Price</th>
                                        <th class="w-[160px] px-4 py-4 text-right">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                        <?php ($productImage = $resolveProductImage($line['product']->image)); ?>
                                        <tr class="border-b border-slate-100 align-middle last:border-b-0">
                                            <td class="px-4 py-5 text-center">
                                                <form method="POST" action="<?php echo e(route('cart.remove', $line['product']->id)); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="inline-flex h-9 w-9 items-center justify-center rounded-full text-slate-400 transition hover:bg-rose-50 hover:text-rose-600" aria-label="Remove <?php echo e($line['product']->name); ?> from cart">
                                                        &times;
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="py-5">
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($productImage): ?>
                                                    <img src="<?php echo e($productImage); ?>" alt="<?php echo e($line['product']->name); ?>" class="mx-auto h-[86px] w-[86px] rounded-xl object-cover" loading="lazy" />
                                                <?php else: ?>
                                                    <div class="mx-auto flex h-[86px] w-[86px] items-center justify-center rounded-xl border border-slate-200 bg-slate-50 text-[11px] uppercase tracking-[0.08em] text-slate-400">
                                                        No image
                                                    </div>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </td>
                                            <td class="px-4 py-5 font-semibold text-slate-900">
                                                <div><?php echo e($line['product']->name); ?></div>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($line['meta']['selected_option'] ?? null)): ?>
                                                    <div class="mt-1 text-[12px] font-normal text-slate-500">
                                                        Selected option: <?php echo e($line['meta']['selected_option']); ?>

                                                    </div>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </td>
                                            <td class="px-4 py-5 text-right"><?php echo e($line['currency']); ?> <?php echo e($line['unit_price']); ?></td>
                                            <td class="px-4 py-5 text-right font-semibold text-slate-900"><?php echo e($line['currency']); ?> <?php echo e($line['line_total']); ?></td>
                                        </tr>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                    <tr class="border-t border-slate-200 bg-slate-50">
                                        <td colspan="5" class="px-4 py-4">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($appliedCoupon): ?>
                                                <div class="flex flex-col gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-4 text-[14px] text-emerald-900 md:flex-row md:items-center md:justify-between">
                                                    <div>
                                                        <p class="font-semibold">Coupon <?php echo e($appliedCoupon['code']); ?> applied</p>
                                                        <p class="text-[13px] text-emerald-700">Discount: <?php echo e($items->first()['currency'] ?? 'USD'); ?> <?php echo e($appliedCoupon['discount']); ?></p>
                                                    </div>
                                                    <form method="POST" action="<?php echo e(route('cart.coupon.remove')); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="inline-flex h-10 items-center justify-center rounded-full border border-slate-300 bg-white px-5 text-[12px] font-semibold uppercase tracking-[0.08em] text-slate-700 transition hover:bg-slate-100">
                                                            Remove coupon
                                                        </button>
                                                    </form>
                                                </div>
                                            <?php else: ?>
                                                <form method="POST" action="<?php echo e(route('cart.coupon.apply')); ?>" class="flex max-w-[520px] flex-col gap-3 md:flex-row md:items-center">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="text" name="coupon_code" value="<?php echo e(old('coupon_code')); ?>" placeholder="Coupon code" class="h-11 flex-1 rounded-xl border border-slate-200 bg-white px-4 text-[13px] text-slate-700 placeholder:text-slate-400 focus:border-[#0b2f5e] focus:outline-none focus:ring-2 focus:ring-[#0b2f5e]/10" />
                                                    <button type="submit" class="inline-flex h-11 items-center justify-center rounded-full bg-[#0b2f5e] px-5 text-[12px] font-semibold uppercase tracking-[0.08em] text-white transition hover:bg-[#174a86]">
                                                        Apply coupon
                                                    </button>
                                                </form>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <aside class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                        <h2 class="mb-5 text-[22px] font-bold leading-none text-slate-900">Cart totals</h2>

                        <div class="border-y border-slate-100 py-4">
                            <div class="flex items-center justify-between gap-4 text-[15px] text-slate-600">
                                <span class="font-semibold text-slate-900">Subtotal</span>
                                <span><?php echo e($items->first()['currency'] ?? 'USD'); ?> <?php echo e($totals['subtotal']); ?></span>
                            </div>
                        </div>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($appliedCoupon): ?>
                            <div class="border-b border-slate-100 py-4">
                                <div class="flex items-center justify-between gap-4 text-[15px] text-slate-600">
                                    <span class="font-semibold text-slate-900">Coupon (<?php echo e($appliedCoupon['code']); ?>)</span>
                                    <span>-<?php echo e($items->first()['currency'] ?? 'USD'); ?> <?php echo e($totals['discount']); ?></span>
                                </div>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <div class="border-b border-slate-100 py-4">
                            <div class="flex items-center justify-between gap-4 text-[17px] font-bold text-slate-900">
                                <span>Total</span>
                                <span><?php echo e($items->first()['currency'] ?? 'USD'); ?> <?php echo e($totals['total']); ?></span>
                            </div>
                        </div>

                        <a href="<?php echo e(route('checkout.show')); ?>" class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded-full bg-[#0b2f5e] px-6 py-4 text-[13px] font-semibold uppercase tracking-[0.12em] text-white transition hover:bg-[#174a86]">
                            Proceed to checkout
                        </a>
                    </aside>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

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
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views\cms\page\cart.blade.php ENDPATH**/ ?>