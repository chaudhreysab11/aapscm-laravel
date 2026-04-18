<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'image',
    'heading',
    'headingUrl' => null,
    'body' => null,
    'buttonLabel',
    'buttonUrl',
]));

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

foreach (array_filter(([
    'image',
    'heading',
    'headingUrl' => null,
    'body' => null,
    'buttonLabel',
    'buttonUrl',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>


<div class="flex flex-col items-start gap-4 px-4 py-4">
    <img
        src="<?php echo e($image); ?>"
        alt=""
        loading="lazy"
        class="w-full max-w-[512px] h-auto"
    />

    <h2 class="text-[28px] leading-tight font-semibold text-[#14166e]">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($headingUrl): ?>
            <a href="<?php echo e($headingUrl); ?>" class="hover:underline"><?php echo e($heading); ?></a>
        <?php else: ?>
            <?php echo e($heading); ?>

        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </h2>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($body): ?>
        <div class="text-[15px] leading-relaxed text-gray-700">
            <?php echo $body; ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <a
        href="<?php echo e($buttonUrl); ?>"
        class="inline-block px-5 py-2 bg-[#14166e] text-white text-sm rounded hover:bg-[#0f1159] transition-colors"
    >
        <?php echo e($buttonLabel); ?>

    </a>
</div>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views/components/cms/teaser-card.blade.php ENDPATH**/ ?>