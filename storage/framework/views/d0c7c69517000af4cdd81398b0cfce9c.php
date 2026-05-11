<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'email' => null,
    'cfemail' => null,
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
    'email' => null,
    'cfemail' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $resolvedEmail = is_string($email) && $email !== '' ? $email : null;

    if ($resolvedEmail === null && is_string($cfemail) && $cfemail !== '' && strlen($cfemail) >= 4 && strlen($cfemail) % 2 === 0) {
        $key = hexdec(substr($cfemail, 0, 2));
        $decoded = '';

        for ($i = 2, $len = strlen($cfemail); $i < $len; $i += 2) {
            $decoded .= chr(hexdec(substr($cfemail, $i, 2)) ^ $key);
        }

        $resolvedEmail = $decoded !== '' ? $decoded : null;
    }
?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($resolvedEmail): ?>
    <a <?php echo e($attributes->merge(['href' => 'mailto:' . $resolvedEmail])); ?>><?php echo e($resolvedEmail); ?></a>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views\components\cms\cf-email.blade.php ENDPATH**/ ?>