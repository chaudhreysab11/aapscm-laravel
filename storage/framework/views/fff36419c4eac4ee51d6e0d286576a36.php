
<?php
    $heading        = $data['heading'] ?? '';
    $text           = $data['text'] ?? '';
    $primaryLabel   = $data['primary_label'] ?? '';
    $primaryUrl     = $data['primary_url'] ?? '';
    $secondaryLabel = $data['secondary_label'] ?? '';
    $secondaryUrl   = $data['secondary_url'] ?? '';
    $bgColor        = $data['background_color'] ?? 'blue';
    $alignment      = $data['alignment'] ?? 'center';

    [$bgClass, $textClass, $subTextClass] = match($bgColor) {
        'dark'  => ['bg-gray-900', 'text-white', 'text-gray-300'],
        'white' => ['bg-white', 'text-gray-900', 'text-gray-600'],
        'gray'  => ['bg-gray-100', 'text-gray-900', 'text-gray-600'],
        default => ['bg-[#0B2F5E]', 'text-white', 'text-blue-200'],
    };

    $secondaryBtnClass = match($bgColor) {
        'white', 'gray' => 'border-gray-900 text-gray-900 hover:bg-gray-900 hover:text-white',
        default         => 'border-white text-white hover:bg-white hover:text-[#0B2F5E]',
    };

    $alignClass = $alignment === 'left' ? 'text-left' : 'text-center items-center';
?>

<section class="<?php echo e($bgClass); ?> py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col <?php echo e($alignClass); ?> gap-6">

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($heading): ?>
                <h2 class="text-3xl sm:text-4xl font-bold <?php echo e($textClass); ?> leading-tight">
                    <?php echo e($heading); ?>

                </h2>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($text): ?>
                <p class="<?php echo e($subTextClass); ?> text-lg leading-relaxed max-w-2xl">
                    <?php echo e($text); ?>

                </p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($primaryLabel || $secondaryLabel): ?>
                <div class="flex flex-col sm:flex-row gap-4 <?php echo e($alignment === 'center' ? 'justify-center' : ''); ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($primaryLabel && $primaryUrl): ?>
                        <a href="<?php echo e($primaryUrl); ?>"
                           class="inline-block bg-yellow-400 text-gray-900 font-bold px-8 py-3 rounded-lg hover:bg-yellow-300 transition-colors shadow-md">
                            <?php echo e($primaryLabel); ?>

                        </a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($secondaryLabel && $secondaryUrl): ?>
                        <a href="<?php echo e($secondaryUrl); ?>"
                           class="inline-block border-2 <?php echo e($secondaryBtnClass); ?> font-semibold px-8 py-3 rounded-lg transition-colors">
                            <?php echo e($secondaryLabel); ?>

                        </a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        </div>
    </div>
</section>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views/components/blocks/cta-banner.blade.php ENDPATH**/ ?>