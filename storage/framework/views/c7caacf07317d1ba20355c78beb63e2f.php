<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['certification']));

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

foreach (array_filter((['certification']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<a href="<?php echo e(route('certifications.show', $certification->slug)); ?>"
   class="group flex flex-col bg-white border border-gray-200 rounded-xl p-5 hover:border-[#0B2F5E] hover:shadow-md transition-all duration-150">

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($certification->badge_image): ?>
        <img src="<?php echo e(asset('storage/' . $certification->badge_image)); ?>"
             alt="<?php echo e($certification->title); ?> badge"
             class="w-16 h-16 object-contain mb-4">
    <?php else: ?>
        <div class="w-16 h-16 rounded-full bg-[#0B2F5E] flex items-center justify-center mb-4">
            <span class="text-white font-bold text-sm"><?php echo e($certification->acronym ?? '?'); ?></span>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div class="flex items-center gap-2 mb-1">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($certification->acronym): ?>
            <span class="text-xs font-semibold text-[#1e5c38] uppercase tracking-wide">
                <?php echo e($certification->acronym); ?>

            </span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($certification->credential_type): ?>
            <span class="text-xs text-gray-400 capitalize">
                <?php echo e(str_replace('_', ' ', $certification->credential_type)); ?>

            </span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    
    <h3 class="text-sm font-semibold text-gray-900 leading-snug mb-2 group-hover:text-[#0B2F5E]">
        <?php echo e($certification->title); ?>

    </h3>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($certification->pdu_credits > 0): ?>
        <p class="mt-auto text-xs text-gray-500 pt-3 border-t border-gray-100">
            <?php echo e($certification->pdu_credits); ?> PDU credits
        </p>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</a>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views/components/certification/card.blade.php ENDPATH**/ ?>