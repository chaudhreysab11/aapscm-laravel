<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <?php ($documentTitle = trim($__env->yieldPushContent('title'))); ?>
    <?php ($siteIcon = asset('storage/cms-images/2025/06/1.png')); ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" type="image/png" href="<?php echo e($siteIcon); ?>">
    <link rel="apple-touch-icon" href="<?php echo e($siteIcon); ?>">
    <meta name="msapplication-TileImage" content="<?php echo e($siteIcon); ?>">
    <title><?php echo e($documentTitle !== '' ? $documentTitle : config('app.name', 'AAPSCM')); ?></title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700&display=swap" rel="stylesheet" />

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <?php echo $__env->yieldPushContent('head'); ?>
</head>
<?php ($bodyClass = trim('font-sans antialiased bg-white text-gray-800 ' . $__env->yieldPushContent('body-class'))); ?>
<body class="<?php echo e($bodyClass); ?>">

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

    <main id="main-content">
        <?php echo e($slot); ?>

    </main>

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

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views\components\layouts\cms.blade.php ENDPATH**/ ?>