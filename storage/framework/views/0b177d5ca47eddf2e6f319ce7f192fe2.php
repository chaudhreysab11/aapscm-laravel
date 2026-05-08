<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'icon' => 'check-circle',
    'label',
    'tone' => 'neutral',
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
    'icon' => 'check-circle',
    'label',
    'tone' => 'neutral',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $tones = [
        'neutral' => 'border-slate-200 bg-slate-100 text-slate-700 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-200',
        'slate' => 'border-slate-200 bg-slate-100 text-slate-700 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-200',
        'success' => 'border-emerald-200 bg-emerald-100 text-emerald-700 dark:border-emerald-900/50 dark:bg-emerald-950/40 dark:text-emerald-200',
        'emerald' => 'border-emerald-200 bg-emerald-100 text-emerald-700 dark:border-emerald-900/50 dark:bg-emerald-950/40 dark:text-emerald-200',
        'warning' => 'border-amber-200 bg-amber-100 text-amber-700 dark:border-amber-900/50 dark:bg-amber-950/40 dark:text-amber-200',
        'amber' => 'border-amber-200 bg-amber-100 text-amber-700 dark:border-amber-900/50 dark:bg-amber-950/40 dark:text-amber-200',
        'danger' => 'border-rose-200 bg-rose-100 text-rose-700 dark:border-rose-900/50 dark:bg-rose-950/40 dark:text-rose-200',
        'rose' => 'border-rose-200 bg-rose-100 text-rose-700 dark:border-rose-900/50 dark:bg-rose-950/40 dark:text-rose-200',
        'brand' => 'border-sky-200 bg-sky-100 text-sky-700 dark:border-sky-900/50 dark:bg-sky-950/40 dark:text-sky-200',
        'blue' => 'border-sky-200 bg-sky-100 text-sky-700 dark:border-sky-900/50 dark:bg-sky-950/40 dark:text-sky-200',
    ];
?>

<span <?php echo e($attributes->merge(['class' => 'inline-flex items-center gap-2 rounded-full border px-3 py-1.5 text-[11px] font-semibold uppercase tracking-[0.14em] ' . ($tones[$tone] ?? $tones['neutral'])])); ?>>
    <?php if (isset($component)) { $__componentOriginal56804098dcf376a0e2227cb77b6cd00a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56804098dcf376a0e2227cb77b6cd00a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.icon','data' => ['name' => $icon,'class' => 'h-3.5 w-3.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($icon),'class' => 'h-3.5 w-3.5']); ?>
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
    <span><?php echo e($label); ?></span>
</span>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views/components/ui/status-pill.blade.php ENDPATH**/ ?>