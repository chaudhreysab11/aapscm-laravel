<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['product', 'label' => 'Add to Cart', 'redirect' => null]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['product', 'label' => 'Add to Cart', 'redirect' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<form method="POST" action="<?php echo e(route('cart.add', $product->id)); ?>" class="inline-block">
    <?php echo csrf_field(); ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($redirect): ?>
        <input type="hidden" name="redirect_to" value="<?php echo e($redirect); ?>" />
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <input type="hidden" name="quantity" value="1" />
    <button type="submit"
            class="inline-block bg-[#f0b323] text-[#0B2F5E] font-semibold px-6 py-3 rounded-lg hover:opacity-90">
        <?php echo e($label); ?>

    </button>
</form>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views/components/add-to-cart-button.blade.php ENDPATH**/ ?>