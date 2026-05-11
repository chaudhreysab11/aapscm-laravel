<div class="bg-white rounded-lg p-6 md:p-7 shadow-[rgba(100,100,111,0.12)_0px_4px_14px_0px] flex flex-col text-center">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($card['image'])): ?>
        <div class="mb-4">
            <img src="<?php echo e($card['image']); ?>" alt="" class="w-16 h-16 mx-auto object-contain" />
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($card['heading_html'])): ?>
        <h3 class="text-[18px] md:text-[19px] font-semibold text-[#14166e] mb-3">
            <?php echo $card['heading_html']; ?>

        </h3>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($card['text_html'])): ?>
        <div class="text-[14.5px] text-gray-700 leading-relaxed mb-5">
            <?php echo $card['text_html']; ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($card['cta_label'])): ?>
        <div class="mt-auto pt-2">
            <a href="<?php echo e($card['cta_href'] ?: '#'); ?>"
               class="inline-block bg-[#5cb85c] hover:bg-[#4cae4c] text-white font-semibold text-[14px] px-5 py-2.5 rounded-full transition">
                <?php echo e($card['cta_label']); ?>

            </a>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views\cms\page\_partials\cscp-text-card.blade.php ENDPATH**/ ?>