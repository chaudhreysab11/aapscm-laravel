
<a href="<?php echo e($card['href'] ?? '#'); ?>"
   class="block bg-white rounded-lg shadow-[rgba(100,100,111,0.12)_0px_4px_14px_0px] overflow-hidden hover:-translate-y-1 transition-transform group">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($card['image'])): ?>
        <img src="<?php echo e($card['image']); ?>" alt="<?php echo e($card['title'] ?? ''); ?>"
             class="w-full h-[200px] object-cover" loading="lazy">
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <div class="p-5">
        <h2 class="text-[15px] md:text-[17px] font-semibold text-[#14166e] leading-snug group-hover:text-[#1e2199] transition-colors">
            <?php echo e($card['title'] ?? ''); ?>

            <svg class="inline-block w-4 h-4 ml-1 align-baseline" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
        </h2>
    </div>
</a>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views\cms\partials\aapscm-training-card.blade.php ENDPATH**/ ?>