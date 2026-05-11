<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['page']));

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

foreach (array_filter((['page']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>



<?php $__env->startPush('title'); ?><?php echo e($page->effective_seo_title); ?><?php $__env->stopPush(); ?>

<?php $__env->startPush('head'); ?>
    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($page->effective_seo_description): ?>
        <meta name="description" content="<?php echo e($page->effective_seo_description); ?>">
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($page->seoMeta?->robots): ?>
        <meta name="robots" content="<?php echo e($page->seoMeta->robots); ?>">
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($page->seoMeta?->canonical_url): ?>
        <link rel="canonical" href="<?php echo e($page->seoMeta->canonical_url); ?>">
    <?php else: ?>
        <link rel="canonical" href="<?php echo e(url()->current()); ?>">
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <meta property="og:type"        content="website">
    <meta property="og:url"         content="<?php echo e(url()->current()); ?>">
    <meta property="og:title"       content="<?php echo e($page->seoMeta?->og_title ?? $page->effective_seo_title); ?>">
    <meta property="og:description" content="<?php echo e($page->seoMeta?->og_description ?? $page->effective_seo_description); ?>">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($page->seoMeta?->og_image): ?>
        <meta property="og:image" content="<?php echo e($page->seoMeta->og_image); ?>">
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="<?php echo e($page->seoMeta?->og_title ?? $page->effective_seo_title); ?>">
    <meta name="twitter:description" content="<?php echo e($page->seoMeta?->og_description ?? $page->effective_seo_description); ?>">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($page->seoMeta?->og_image): ?>
        <meta name="twitter:image" content="<?php echo e($page->seoMeta->og_image); ?>">
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views\components\cms\seo-head.blade.php ENDPATH**/ ?>