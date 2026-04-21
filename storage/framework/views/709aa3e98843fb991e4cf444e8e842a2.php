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

    <section class="relative bg-[#0B2F5E] py-12 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0B2F5E] to-[#14166e] opacity-90"></div>
        <div class="relative max-w-[1100px] mx-auto px-4 text-center">
            <h1 class="text-[26px] md:text-[36px] font-bold text-white">Your Cart</h1>
        </div>
    </section>

    <section class="bg-[#f6f8fb] py-12">
        <div class="max-w-[900px] mx-auto px-4">

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
                <div class="mb-6 rounded-lg bg-green-50 border border-green-200 p-4 text-green-800 text-[14px]">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
                <div class="mb-6 rounded-lg bg-red-50 border border-red-200 p-4 text-red-800 text-[14px]">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($items->isEmpty()): ?>
                <div class="bg-white rounded-xl shadow-sm p-8 text-center">
                    <p class="text-gray-700 text-[15px] mb-6">Your cart is currently empty.</p>
                    <a href="/" class="inline-block bg-[#f0b323] text-[#0B2F5E] font-semibold px-6 py-3 rounded-lg hover:opacity-90">
                        Continue Browsing
                    </a>
                </div>
            <?php else: ?>
                <div class="bg-white rounded-xl shadow-sm p-6 md:p-8 mb-6">
                    <table class="w-full text-[14px] text-gray-700">
                        <thead class="text-left text-gray-500 border-b">
                            <tr>
                                <th class="py-2">Item</th>
                                <th class="py-2 text-center">Qty</th>
                                <th class="py-2 text-right">Unit Price</th>
                                <th class="py-2 text-right">Line Total</th>
                                <th class="py-2 text-right">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <tr class="border-b last:border-0 align-middle">
                                    <td class="py-3"><?php echo e($line['product']->name); ?></td>
                                    <td class="py-3 text-center">
                                        <form method="POST" action="<?php echo e(route('cart.update', $line['product']->id)); ?>" class="inline-flex items-center gap-2">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PATCH'); ?>
                                            <input type="number" name="quantity" min="0" max="99" value="<?php echo e($line['quantity']); ?>"
                                                   class="w-16 border border-gray-300 rounded px-2 py-1 text-center" />
                                            <button type="submit" class="text-[12px] text-[#14166e] underline">Update</button>
                                        </form>
                                    </td>
                                    <td class="py-3 text-right"><?php echo e($line['currency']); ?> <?php echo e($line['unit_price']); ?></td>
                                    <td class="py-3 text-right font-medium"><?php echo e($line['currency']); ?> <?php echo e($line['line_total']); ?></td>
                                    <td class="py-3 text-right">
                                        <form method="POST" action="<?php echo e(route('cart.remove', $line['product']->id)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="text-[12px] text-red-600 hover:underline">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="pt-4 text-right font-semibold text-[#14166e]">Subtotal</td>
                                <td class="pt-4 text-right font-bold text-[#14166e]"><?php echo e($items->first()['currency'] ?? 'USD'); ?> <?php echo e($subtotal); ?></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="flex justify-end">
                    <a href="/checkout/" class="inline-block bg-[#f0b323] text-[#0B2F5E] font-semibold px-6 py-3 rounded-lg hover:opacity-90">
                        Proceed to Checkout
                    </a>
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
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views/cms/page/cart.blade.php ENDPATH**/ ?>