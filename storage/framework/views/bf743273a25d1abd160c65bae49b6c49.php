<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'icon',
    'iconWidth' => 92,
    'iconHeight' => 79,
    'body',
    'shadow' => false,
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
    'icon',
    'iconWidth' => 92,
    'iconHeight' => 79,
    'body',
    'shadow' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>


<div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
    'flex items-start gap-4 px-5 py-5',
    'bg-white rounded-md shadow-[0_7px_29px_rgba(100,100,111,0.2)]' => $shadow,
]); ?>">
    <figure class="shrink-0">
        <img
            src="<?php echo e($icon); ?>"
            width="<?php echo e($iconWidth); ?>"
            height="<?php echo e($iconHeight); ?>"
            alt=""
            loading="lazy"
        />
    </figure>
    <div class="text-[15px] leading-relaxed text-gray-700">
        <?php echo $body; ?>

    </div>
</div>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views/components/cms/image-box.blade.php ENDPATH**/ ?>