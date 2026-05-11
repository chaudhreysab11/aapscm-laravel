<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'title',
    'breadcrumbs' => [],
    'height' => 240,
    'titleTag' => 'h2',
    'backgroundColor' => '#14166e',
    'backgroundImage' => null,
    'titleImageSrc' => null,
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
    'title',
    'breadcrumbs' => [],
    'height' => 240,
    'titleTag' => 'h2',
    'backgroundColor' => '#14166e',
    'backgroundImage' => null,
    'titleImageSrc' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $holderClasses = 'eltdf-title-holder eltdf-standard-with-breadcrumbs-type eltdf-title-va-header-bottom flex items-center';
    if ($backgroundImage || $titleImageSrc) {
        $holderClasses .= ' eltdf-has-bg-image';
    }

    $resolvedTitleImage = $titleImageSrc ?? $backgroundImage;

    $holderStyle = collect([
        "background-color: {$backgroundColor}",
        $backgroundImage ? "background-image: url('{$backgroundImage}')" : null,
        $backgroundImage ? 'background-position: 50% 0' : null,
        $backgroundImage ? 'background-repeat: no-repeat' : null,
    ])->filter()->implode('; ');
?>

<div class="<?php echo e($holderClasses); ?>" style="<?php echo e($holderStyle); ?>;">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($resolvedTitleImage): ?>
        <div class="eltdf-title-image">
            <img itemprop="image" src="<?php echo e($resolvedTitleImage); ?>" alt="<?php echo e($title); ?>">
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="eltdf-title-wrapper flex items-center" style="height: <?php echo e($height); ?>px;">
        <div class="eltdf-title-inner">
            <div class="eltdf-grid" style="max-width: 1300px; margin: 0 auto; padding: 0 16px;">
                <div class="eltdf-title-info">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($titleTag === 'h1'): ?>
                        <h1 class="eltdf-page-title entry-title" style="color: #fff; font-size: 45px; line-height: 1.2; font-weight: 700; margin: 0 0 8px; text-align: left;">
                            <?php echo e($title); ?>

                        </h1>
                    <?php else: ?>
                        <h2 class="eltdf-page-title entry-title" style="color: #fff; font-size: 45px; line-height: 1.2; font-weight: 700; margin: 0 0 8px; text-align: left;">
                            <?php echo e($title); ?>

                        </h2>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($breadcrumbs)): ?>
                        <div class="eltdf-breadcrumbs-info">
                            <div itemprop="breadcrumb" class="eltdf-breadcrumbs" style="color: rgba(255, 255, 255, 0.82); font-size: 13px; line-height: 1.6; text-align: left;">
                                <a itemprop="url" href="<?php echo e(url('/')); ?>" style="color: inherit; text-decoration: none;">Home</a>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <span class="eltdf-delimiter">&nbsp; / &nbsp;</span>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($crumb['url']) && ! $loop->last): ?>
                                        <a itemprop="url" href="<?php echo e($crumb['url']); ?>" style="color: inherit; text-decoration: none;"><?php echo e($crumb['label']); ?></a>
                                    <?php else: ?>
                                        <span class="eltdf-current" style="color: #fff;"><?php echo e($crumb['label']); ?></span>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views\components\cms\eltdf-title-bar.blade.php ENDPATH**/ ?>