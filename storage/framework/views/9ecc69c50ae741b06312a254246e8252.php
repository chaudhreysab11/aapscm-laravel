
<?php
    $heading       = $data['heading'] ?? '';
    $text          = $data['text'] ?? '';
    $imageUrl      = $data['image_url'] ?? '';
    $imageAlt      = $data['image_alt'] ?? ($heading ?: 'Section image');
    $imagePosition = $data['image_position'] ?? 'right';
    $ctaLabel      = $data['cta_label'] ?? '';
    $ctaUrl        = $data['cta_url'] ?? '';
?>

<section class="py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center <?php echo e($imagePosition === 'left' ? 'lg:[&>*:first-child]:order-2' : ''); ?>">

            
            <div class="order-2 lg:order-none">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($heading): ?>
                    <h2 class="text-3xl font-bold text-[#0B2F5E] mb-4"><?php echo e($heading); ?></h2>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <div class="
                    text-gray-700 leading-relaxed
                    [&_h3]:text-xl [&_h3]:font-semibold [&_h3]:text-[#0B2F5E] [&_h3]:mt-4 [&_h3]:mb-2
                    [&_p]:mb-4 [&_p]:leading-7
                    [&_ul]:list-disc [&_ul]:pl-6 [&_ul]:mb-4 [&_ul_li]:mb-1
                    [&_ol]:list-decimal [&_ol]:pl-6 [&_ol]:mb-4
                    [&_a]:text-blue-700 [&_a]:underline [&_a:hover]:text-yellow-600
                    [&_strong]:font-semibold
                ">
                    <?php echo $text; ?>

                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ctaLabel && $ctaUrl): ?>
                    <div class="mt-6">
                        <a href="<?php echo e($ctaUrl); ?>"
                           class="inline-block bg-[#0B2F5E] text-white font-semibold px-6 py-3 rounded-lg hover:bg-[#0a2550] transition-colors">
                            <?php echo e($ctaLabel); ?>

                        </a>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($imageUrl): ?>
                <div class="<?php echo e($imagePosition === 'left' ? 'order-1 lg:order-none' : 'order-1 lg:order-none'); ?>">
                    <img src="<?php echo e($imageUrl); ?>"
                         alt="<?php echo e($imageAlt); ?>"
                         class="w-full rounded-xl shadow-lg object-cover"
                         loading="lazy">
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        </div>
    </div>
</section>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views\components\blocks\text-image.blade.php ENDPATH**/ ?>