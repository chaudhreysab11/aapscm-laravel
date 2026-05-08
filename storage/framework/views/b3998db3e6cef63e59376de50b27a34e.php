<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'title' => 'Member Dashboard',
    'subtitle' => null,
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
    'title' => 'Member Dashboard',
    'subtitle' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(trim(($title ?: config('app.name', 'AAPSCM')) . ' | AAPSCM')); ?></title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700&display=swap" rel="stylesheet" />

        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>
    <body class="min-h-screen bg-[#f6f8fb] font-sans text-slate-900 antialiased">

        <?php if (isset($component)) { $__componentOriginal87f80cf932c7b197496c80015d9ece55 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal87f80cf932c7b197496c80015d9ece55 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal87f80cf932c7b197496c80015d9ece55)): ?>
<?php $attributes = $__attributesOriginal87f80cf932c7b197496c80015d9ece55; ?>
<?php unset($__attributesOriginal87f80cf932c7b197496c80015d9ece55); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal87f80cf932c7b197496c80015d9ece55)): ?>
<?php $component = $__componentOriginal87f80cf932c7b197496c80015d9ece55; ?>
<?php unset($__componentOriginal87f80cf932c7b197496c80015d9ece55); ?>
<?php endif; ?>

        <div class="border-b border-slate-200/80 bg-white/90 backdrop-blur">
            <div class="mx-auto max-w-[1320px] px-4 py-5 sm:px-6 lg:px-8">
                <nav class="mb-3 flex items-center gap-2 text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-400">
                    <a href="<?php echo e(route('home')); ?>" class="transition-colors hover:text-[#0b2f5e]">Home</a>
                    <span>/</span>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($title !== 'Member Dashboard'): ?>
                            <a href="<?php echo e(route('dashboard')); ?>" class="transition-colors hover:text-[#0b2f5e]">Member Portal</a>
                            <span>/</span>
                            <span class="text-slate-600"><?php echo e($title); ?></span>
                        <?php else: ?>
                            <span class="text-slate-600">Member Portal</span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </nav>
                <div class="flex flex-col gap-4 rounded-[28px] border border-slate-200 bg-[#fbfcfe] px-5 py-5 shadow-sm sm:px-6">
                    <div>
                        <div class="inline-flex items-center gap-2 rounded-full border border-[#0b2f5e]/10 bg-white px-3 py-2 text-[11px] font-semibold uppercase tracking-[0.18em] text-[#0b2f5e]">
                            <?php if (isset($component)) { $__componentOriginal56804098dcf376a0e2227cb77b6cd00a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56804098dcf376a0e2227cb77b6cd00a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.icon','data' => ['name' => 'shield','class' => 'h-3.5 w-3.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'shield','class' => 'h-3.5 w-3.5']); ?>
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
                            Member Portal
                        </div>
                        <h1 class="mt-3 text-[24px] font-semibold leading-tight text-slate-950 sm:text-[30px]"><?php echo e($title); ?></h1>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($subtitle && $subtitle !== $title): ?>
                            <p class="mt-1 text-[13px] font-medium uppercase tracking-[0.14em] text-slate-400"><?php echo e($subtitle); ?></p>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="mx-auto max-w-[1320px] px-4 py-8 sm:px-6 lg:grid lg:grid-cols-[260px_minmax(0,1fr)] lg:gap-6 lg:px-8">
            <aside class="mb-8 lg:mb-0">
                <?php echo e($sidebar ?? ''); ?>

            </aside>

            <main>
                <?php echo e($slot); ?>

            </main>
        </div>

        <footer>
            <?php if (isset($component)) { $__componentOriginal9514080823ce99c4c350e6554a577721 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9514080823ce99c4c350e6554a577721 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9514080823ce99c4c350e6554a577721)): ?>
<?php $attributes = $__attributesOriginal9514080823ce99c4c350e6554a577721; ?>
<?php unset($__attributesOriginal9514080823ce99c4c350e6554a577721); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9514080823ce99c4c350e6554a577721)): ?>
<?php $component = $__componentOriginal9514080823ce99c4c350e6554a577721; ?>
<?php unset($__componentOriginal9514080823ce99c4c350e6554a577721); ?>
<?php endif; ?>
        </footer>
    </body>
</html>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views/components/layouts/member-portal.blade.php ENDPATH**/ ?>