
<?php
    $heading          = $data['heading'] ?? '';
    $subheading       = $data['subheading'] ?? '';
    $ctaLabel         = $data['cta_label'] ?? '';
    $ctaUrl           = $data['cta_url'] ?? '';
    $secondaryLabel   = $data['secondary_cta_label'] ?? '';
    $secondaryUrl     = $data['secondary_cta_url'] ?? '';
    $bgColor          = $data['background_color'] ?? 'blue';
    $bgImage          = $data['background_image'] ?? '';

    $bgClasses = match($bgColor) {
        'dark'  => 'bg-gray-900 text-white',
        'white' => 'bg-white text-gray-900',
        'gray'  => 'bg-gray-100 text-gray-900',
        default => 'bg-[#0B2F5E] text-white',
    };
    $btnSecondaryClasses = match($bgColor) {
        'white', 'gray' => 'border-[#0B2F5E] text-[#0B2F5E] hover:bg-[#0B2F5E] hover:text-white',
        default         => 'border-white text-white hover:bg-white hover:text-[#0B2F5E]',
    };
?>

<section
    class="relative <?php echo e($bgClasses); ?> py-20 lg:py-28 overflow-hidden"
    <?php if($bgImage): ?> style="background-image: url('<?php echo e($bgImage); ?>'); background-size: cover; background-position: center;" <?php endif; ?>
>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($bgImage): ?>
        <div class="absolute inset-0 bg-[#0B2F5E]/70"></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($heading): ?>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight">
                <?php echo nl2br(e($heading)); ?>

            </h1>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($subheading): ?>
            <p class="mt-6 text-lg sm:text-xl leading-relaxed max-w-3xl mx-auto opacity-90">
                <?php echo e($subheading); ?>

            </p>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ctaLabel || $secondaryLabel): ?>
            <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ctaLabel && $ctaUrl): ?>
                    <a href="<?php echo e($ctaUrl); ?>"
                       class="inline-block bg-yellow-400 text-gray-900 font-bold px-8 py-3 rounded-lg hover:bg-yellow-300 transition-colors shadow-lg">
                        <?php echo e($ctaLabel); ?>

                    </a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($secondaryLabel && $secondaryUrl): ?>
                    <a href="<?php echo e($secondaryUrl); ?>"
                       class="inline-block border-2 <?php echo e($btnSecondaryClasses); ?> font-semibold px-8 py-3 rounded-lg transition-colors">
                        <?php echo e($secondaryLabel); ?>

                    </a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    </div>
</section>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views\components\blocks\hero.blade.php ENDPATH**/ ?>