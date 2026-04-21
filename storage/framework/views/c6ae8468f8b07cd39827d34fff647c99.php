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


    <?php $__env->startPush('title'); ?>Order Receipt — <?php $__env->stopPush(); ?>

    <section class="relative bg-[#0B2F5E] py-12 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0B2F5E] to-[#14166e] opacity-90"></div>
        <div class="relative max-w-[1100px] mx-auto px-4 text-center">
            <h1 class="text-[26px] md:text-[36px] font-bold text-white">Thank You for Your Order</h1>
            <p class="text-white/80 mt-2 text-[14px]">Order #<?php echo e($order->order_number); ?></p>
        </div>
    </section>

    <section class="bg-[#f6f8fb] py-12">
        <div class="max-w-[900px] mx-auto px-4">

            <div class="bg-white rounded-xl shadow-sm p-6 md:p-8 mb-6">
                <h2 class="text-[20px] font-semibold text-[#14166e] mb-4">Order Summary</h2>

                <table class="w-full text-[14px] text-gray-700 mb-6">
                    <thead class="text-left text-gray-500 border-b">
                        <tr>
                            <th class="py-2">Item</th>
                            <th class="py-2 text-center">Qty</th>
                            <th class="py-2 text-right">Unit Price</th>
                            <th class="py-2 text-right">Line Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <tr class="border-b last:border-0">
                                <td class="py-3"><?php echo e($item->product?->name ?? 'Item'); ?></td>
                                <td class="py-3 text-center"><?php echo e($item->quantity); ?></td>
                                <td class="py-3 text-right"><?php echo e($order->currency); ?> <?php echo e(number_format((float) $item->unit_price, 2)); ?></td>
                                <td class="py-3 text-right font-medium"><?php echo e($order->currency); ?> <?php echo e(number_format((float) $item->total_price, 2)); ?></td>
                            </tr>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="pt-4 text-right font-semibold text-[#14166e]">Total Paid</td>
                            <td class="pt-4 text-right font-bold text-[#14166e]"><?php echo e($order->currency); ?> <?php echo e(number_format((float) $order->total, 2)); ?></td>
                        </tr>
                    </tfoot>
                </table>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-[14px] text-gray-700">
                    <div>
                        <h3 class="font-semibold text-[#14166e] mb-2">Billing</h3>
                        <p><?php echo e($order->billing_name); ?></p>
                        <p class="text-gray-500"><?php echo e($order->billing_email); ?></p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-[#14166e] mb-2">Payment</h3>
                        <p>Method: <span class="capitalize"><?php echo e($order->payment_method); ?></span></p>
                        <p>Status: <span class="capitalize"><?php echo e($order->payment_status); ?></span></p>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <a href="/" class="inline-block bg-[#f0b323] text-[#0B2F5E] font-semibold px-6 py-3 rounded-lg hover:opacity-90">
                    Return Home
                </a>
            </div>

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
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views/cms/page/order-receipt.blade.php ENDPATH**/ ?>