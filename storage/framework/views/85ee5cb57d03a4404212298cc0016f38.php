
<?php
    $heading = $data['heading'] ?? '';
    $content = $data['content'] ?? '';
    $width   = $data['width'] ?? 'normal';

    $wrapClass = match($width) {
        'narrow' => 'max-w-2xl mx-auto',
        'wide'   => 'max-w-none',
        default  => 'max-w-4xl mx-auto',
    };
?>

<section class="py-12">
    <div class="<?php echo e($wrapClass); ?> px-4 sm:px-6 lg:px-8">

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($heading): ?>
            <h2 class="text-3xl font-bold text-[#0B2F5E] mb-6"><?php echo e($heading); ?></h2>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="
            text-gray-700 leading-relaxed
            [&_h2]:text-2xl [&_h2]:font-bold [&_h2]:text-[#0B2F5E] [&_h2]:mt-8 [&_h2]:mb-4
            [&_h3]:text-xl  [&_h3]:font-semibold [&_h3]:text-[#0B2F5E] [&_h3]:mt-6 [&_h3]:mb-3
            [&_h4]:text-lg  [&_h4]:font-semibold [&_h4]:mt-4 [&_h4]:mb-2
            [&_p]:mb-4 [&_p]:leading-7
            [&_ul]:list-disc [&_ul]:pl-6 [&_ul]:mb-4 [&_ul_li]:mb-1
            [&_ol]:list-decimal [&_ol]:pl-6 [&_ol]:mb-4 [&_ol_li]:mb-1
            [&_a]:text-blue-700 [&_a]:underline [&_a:hover]:text-yellow-600
            [&_blockquote]:border-l-4 [&_blockquote]:border-yellow-400 [&_blockquote]:pl-4 [&_blockquote]:italic [&_blockquote]:text-gray-600 [&_blockquote]:my-6
            [&_strong]:font-semibold
            [&_table]:w-full [&_table]:border-collapse [&_table]:mb-6
            [&_th]:bg-[#0B2F5E] [&_th]:text-white [&_th]:px-4 [&_th]:py-2 [&_th]:text-left
            [&_td]:border [&_td]:border-gray-200 [&_td]:px-4 [&_td]:py-2
            [&_tr:nth-child(even)_td]:bg-gray-50
            [&_img]:rounded-lg [&_img]:max-w-full [&_img]:my-4
            [&_hr]:border-gray-200 [&_hr]:my-8
        ">
            <?php echo $content; ?>

        </div>

    </div>
</section>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views/components/blocks/rich-text.blade.php ENDPATH**/ ?>