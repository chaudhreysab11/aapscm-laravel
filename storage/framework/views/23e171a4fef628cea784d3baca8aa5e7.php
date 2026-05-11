<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'name',
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
    'name',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php switch($name):
    case ('shield'): ?>
        <svg <?php echo e($attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.8'])); ?> aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3l7 3v5c0 4.5-3 8.6-7 10-4-1.4-7-5.5-7-10V6l7-3Z"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="m9.5 11.5 1.7 1.7 3.3-3.7"/>
        </svg>
        <?php break; ?>
    <?php case ('user'): ?>
        <svg <?php echo e($attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.8'])); ?> aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 19a7 7 0 0 1 14 0"/>
        </svg>
        <?php break; ?>
    <?php case ('user-plus'): ?>
        <svg <?php echo e($attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.8'])); ?> aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19a7.5 7.5 0 0 1 9-6.98"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 8v6m3-3h-6"/>
        </svg>
        <?php break; ?>
    <?php case ('mail'): ?>
        <svg <?php echo e($attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.8'])); ?> aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16v12H4z"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="m4 8 8 6 8-6"/>
        </svg>
        <?php break; ?>
    <?php case ('lock'): ?>
        <svg <?php echo e($attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.8'])); ?> aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 10V7a5 5 0 0 1 10 0v3"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 10h14v10H5z"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14v2.5"/>
        </svg>
        <?php break; ?>
    <?php case ('key'): ?>
        <svg <?php echo e($attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.8'])); ?> aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 7a4 4 0 1 1-7.75 1.5L3 12.75V16h3.25l1.5-1.5H10v-2.25l1.25-1.25A4 4 0 0 1 15 7Z"/>
        </svg>
        <?php break; ?>
    <?php case ('receipt'): ?>
        <svg <?php echo e($attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.8'])); ?> aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 3h10v18l-2-1.5-3 1.5-3-1.5L7 21V3Z"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.5 8h5M9.5 12h5M9.5 16h3"/>
        </svg>
        <?php break; ?>
    <?php case ('invoice'): ?>
        <svg <?php echo e($attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.8'])); ?> aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 3h10v18l-2-1.5-3 1.5-3-1.5L7 21V3Z"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.5 8h5M9.5 12h5M9.5 16h5"/>
        </svg>
        <?php break; ?>
    <?php case ('clipboard'): ?>
        <svg <?php echo e($attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.8'])); ?> aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 4h6l1 2h2v14H6V6h2l1-2Z"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 4h6v3H9z"/>
        </svg>
        <?php break; ?>
    <?php case ('membership'): ?>
    <?php case ('academic-cap'): ?>
    <?php case ('training'): ?>
        <svg <?php echo e($attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.8'])); ?> aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="m3 9 9-4 9 4-9 4-9-4Z"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 11.5V15c0 1.2 2.2 3 5 3s5-1.8 5-3v-3.5"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 10v6"/>
        </svg>
        <?php break; ?>
    <?php case ('profile'): ?>
        <svg <?php echo e($attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.8'])); ?> aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 19a7 7 0 0 1 14 0"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7v4M17 9h4"/>
        </svg>
        <?php break; ?>
    <?php case ('card'): ?>
        <svg <?php echo e($attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.8'])); ?> aria-hidden="true">
            <rect x="3" y="5" width="18" height="14" rx="2"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 15h3"/>
        </svg>
        <?php break; ?>
    <?php case ('badge'): ?>
        <svg <?php echo e($attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.8'])); ?> aria-hidden="true">
            <circle cx="12" cy="8" r="4"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.5 12.5 7 21l5-3 5 3-1.5-8.5"/>
        </svg>
        <?php break; ?>
    <?php case ('logout'): ?>
        <svg <?php echo e($attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.8'])); ?> aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 17l5-5-5-5"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H4"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M20 4v16"/>
        </svg>
        <?php break; ?>
    <?php case ('check-circle'): ?>
        <svg <?php echo e($attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.8'])); ?> aria-hidden="true">
            <circle cx="12" cy="12" r="9"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.5 12.5 2.2 2.2 4.8-5.2"/>
        </svg>
        <?php break; ?>
    <?php case ('clock'): ?>
        <svg <?php echo e($attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.8'])); ?> aria-hidden="true">
            <circle cx="12" cy="12" r="9"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5V12l3 1.8"/>
        </svg>
        <?php break; ?>
    <?php case ('building'): ?>
        <svg <?php echo e($attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.8'])); ?> aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 21V7l8-4 8 4v14"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 21v-4h6v4M8 10h.01M12 10h.01M16 10h.01M8 14h.01M12 14h.01M16 14h.01"/>
        </svg>
        <?php break; ?>
    <?php case ('globe'): ?>
        <svg <?php echo e($attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.8'])); ?> aria-hidden="true">
            <circle cx="12" cy="12" r="9"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12h18M12 3a15 15 0 0 1 0 18M12 3a15 15 0 0 0 0 18"/>
        </svg>
        <?php break; ?>
    <?php case ('map-pin'): ?>
    <?php case ('location'): ?>
        <svg <?php echo e($attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.8'])); ?> aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s6-5.6 6-11a6 6 0 1 0-12 0c0 5.4 6 11 6 11Z"/>
            <circle cx="12" cy="10" r="2.5"/>
        </svg>
        <?php break; ?>
    <?php case ('phone'): ?>
        <svg <?php echo e($attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.8'])); ?> aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.5 4h3l1.2 4.2-1.8 1.8a15.5 15.5 0 0 0 5.1 5.1l1.8-1.8L20 14.5v3A2.5 2.5 0 0 1 17.5 20C10.6 20 5 14.4 5 7.5A2.5 2.5 0 0 1 7.5 5"/>
        </svg>
        <?php break; ?>
    <?php case ('note'): ?>
        <svg <?php echo e($attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.8'])); ?> aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 4h10l3 3v13H7z"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 4v4h4M10 12h6M10 16h4"/>
        </svg>
        <?php break; ?>
    <?php case ('calendar'): ?>
        <svg <?php echo e($attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.8'])); ?> aria-hidden="true">
            <rect x="4" y="5" width="16" height="15" rx="2"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 3v4M16 3v4M4 10h16"/>
        </svg>
        <?php break; ?>
    <?php case ('document'): ?>
        <svg <?php echo e($attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.8'])); ?> aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 3h7l4 4v14H7z"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M14 3v5h5M10 13h6M10 17h6"/>
        </svg>
        <?php break; ?>
    <?php case ('cart'): ?>
        <svg <?php echo e($attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.8'])); ?> aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h2l2 11h10l2-8H6"/>
            <circle cx="10" cy="19" r="1.5"/>
            <circle cx="17" cy="19" r="1.5"/>
        </svg>
        <?php break; ?>
    <?php case ('warning'): ?>
        <svg <?php echo e($attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.8'])); ?> aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4 3 20h18L12 4Z"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4.5M12 17h.01"/>
        </svg>
        <?php break; ?>
    <?php default: ?>
        <svg <?php echo e($attributes->merge(['viewBox' => '0 0 24 24', 'fill' => 'none', 'stroke' => 'currentColor', 'stroke-width' => '1.8'])); ?> aria-hidden="true">
            <circle cx="12" cy="12" r="9"/>
        </svg>
<?php endswitch; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views\components\ui\icon.blade.php ENDPATH**/ ?>