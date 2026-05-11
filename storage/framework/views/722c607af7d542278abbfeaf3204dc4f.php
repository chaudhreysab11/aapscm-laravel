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


    <?php $__env->startPush('title'); ?>Complete Payment — <?php $__env->stopPush(); ?>

    <?php $__env->startPush('head'); ?>
        <script src="https://js.stripe.com/v3/"></script>
    <?php $__env->stopPush(); ?>

    
    <section class="relative overflow-hidden bg-[radial-gradient(circle_at_top_left,_#1f4d8a,_#0b2f5e_55%,_#071f40)] py-10 text-white">
        <div class="absolute inset-0 opacity-20 [background-image:linear-gradient(rgba(255,255,255,0.2)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.12)_1px,transparent_1px)] [background-size:32px_32px]"></div>
        <div class="relative mx-auto max-w-[1180px] px-4">
            <p class="text-[12px] font-semibold uppercase tracking-[0.28em] text-[#f0b323]">AAPSCM Store</p>
            <h1 class="mt-2 text-[34px] font-bold leading-tight">Complete Payment</h1>
            <nav class="mt-2 flex items-center gap-2 text-[13px] text-white/70">
                <a href="<?php echo e(route('home')); ?>" class="transition-colors hover:text-white">Home</a>
                <span>/</span>
                <a href="<?php echo e(route('checkout.show')); ?>" class="transition-colors hover:text-white">Checkout</a>
                <span>/</span>
                <span>Complete Payment</span>
            </nav>
        </div>
    </section>

    <section class="bg-[#f4f7fb] py-[60px]">
        <div class="mx-auto max-w-[1180px] px-4">
            <div class="mb-8 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <div class="grid gap-6 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <h2 class="text-[26px] font-bold leading-none text-slate-900">Pay securely with Stripe</h2>
                        <p class="mt-3 max-w-[820px] text-[15px] leading-7 text-slate-500">Enter your card details below to confirm payment for order <?php echo e($order->order_number); ?>. Your order will be marked complete only after Stripe confirms the payment and the server finalizes it.</p>
                    </div>
                    <a href="<?php echo e($cancelUrl); ?>" class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-6 py-3 text-[12px] font-semibold uppercase tracking-[0.12em] text-slate-700 transition hover:bg-slate-100">
                        Cancel payment
                    </a>
                </div>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($publishableKey === ''): ?>
                <div class="rounded-2xl border border-rose-200 bg-rose-50 px-5 py-4 text-[14px] text-rose-800">
                    Stripe is not configured yet. Set STRIPE_KEY and STRIPE_SECRET before using the live card flow.
                </div>
            <?php else: ?>
                <div class="grid gap-10 lg:grid-cols-[minmax(0,1fr)_360px] lg:items-start">
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                        <form id="stripe-payment-form" class="space-y-6">
                            <div>
                                <label for="payment-element" class="mb-3 block text-[13px] font-semibold uppercase tracking-[0.12em] text-slate-500">Card details</label>
                                <div id="payment-element" class="rounded-xl border border-slate-200 px-4 py-4"></div>
                            </div>

                            <div id="stripe-payment-error" class="hidden rounded-2xl border border-rose-200 bg-rose-50 px-5 py-4 text-[14px] text-rose-800"></div>

                            <button id="stripe-submit" type="submit" class="inline-flex items-center justify-center gap-2 rounded-full bg-[#0b2f5e] px-8 py-4 text-[13px] font-semibold uppercase tracking-[0.12em] text-white transition hover:bg-[#174a86] disabled:opacity-60">
                                <?php if (isset($component)) { $__componentOriginal56804098dcf376a0e2227cb77b6cd00a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56804098dcf376a0e2227cb77b6cd00a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.icon','data' => ['name' => 'card','class' => 'h-4 w-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'card','class' => 'h-4 w-4']); ?>
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
                                Pay <?php echo e($order->currency); ?> <?php echo e(number_format((float) $order->total, 2, '.', '')); ?>

                            </button>
                        </form>
                    </div>

                    <aside class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                        <h2 class="mb-5 text-[20px] font-bold leading-none text-slate-900">Order summary</h2>

                        <table class="min-w-full text-left text-[14px] text-slate-600">
                            <thead class="border-b border-slate-200 text-[13px] font-semibold uppercase tracking-[0.08em] text-slate-700">
                                <tr>
                                    <th class="py-3 pr-4">Product</th>
                                    <th class="py-3 text-right">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <tr class="border-b border-slate-100 align-top last:border-b-0">
                                        <td class="py-4 pr-4 text-slate-800"><?php echo e($item->product?->name ?? 'Order item'); ?> <strong>&times; <?php echo e($item->quantity); ?></strong></td>
                                        <td class="py-4 text-right font-medium"><?php echo e($order->currency); ?> <?php echo e(number_format((float) $item->total_price, 2, '.', '')); ?></td>
                                    </tr>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </tbody>
                            <tfoot>
                                <tr class="border-t border-slate-200">
                                    <th class="py-4 pr-4 text-left font-bold text-slate-900">Total</th>
                                    <td class="py-4 text-right text-[18px] font-bold text-slate-900"><?php echo e($order->currency); ?> <?php echo e(number_format((float) $order->total, 2, '.', '')); ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </aside>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($publishableKey !== ''): ?>
        <?php $__env->startPush('scripts'); ?>
            <script>
                document.addEventListener('DOMContentLoaded', async () => {
                    const form = document.getElementById('stripe-payment-form');
                    const errorBox = document.getElementById('stripe-payment-error');
                    const submitButton = document.getElementById('stripe-submit');

                    if (!form || !window.Stripe) {
                        return;
                    }

                    const stripe = window.Stripe(<?php echo json_encode($publishableKey, 15, 512) ?>);
                    const elements = stripe.elements({ clientSecret: <?php echo json_encode($clientSecret, 15, 512) ?> });
                    const paymentElement = elements.create('payment');
                    paymentElement.mount('#payment-element');

                    form.addEventListener('submit', async (event) => {
                        event.preventDefault();
                        submitButton.disabled = true;
                        errorBox.classList.add('hidden');
                        errorBox.textContent = '';

                        const { error } = await stripe.confirmPayment({
                            elements,
                            confirmParams: {
                                return_url: <?php echo json_encode($returnUrl, 15, 512) ?>,
                            },
                        });

                        if (error) {
                            errorBox.textContent = error.message || 'Payment could not be confirmed. Please check your details and try again.';
                            errorBox.classList.remove('hidden');
                            submitButton.disabled = false;
                        }
                    });
                });
            </script>
        <?php $__env->stopPush(); ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

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
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views\cms\page\payment-stripe.blade.php ENDPATH**/ ?>