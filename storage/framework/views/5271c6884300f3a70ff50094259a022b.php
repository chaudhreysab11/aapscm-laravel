<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Visual Editor — <?php echo e($page->title); ?></title>

    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/visual-editor.js']); ?>

    <style>
        /* ── Editor chrome ──────────────────────────────────────── */
        html, body { margin: 0; padding: 0; height: 100%; overflow: hidden; background: #1a1a2e; }

        /* ── Override GrapesJS defaults to match our dark theme ─── */
        .gjs-one-bg { background-color: #1e2235; }
        .gjs-two-bg { background-color: #252a3d; }
        .gjs-three-bg { background-color: #2d3451; }
        .gjs-four-color { color: #a5b4fc; }
        .gjs-four-color-h:hover { color: #a5b4fc; }

        /* Block manager */
        .gjs-block { border-color: #374151 !important; background: #1e2235 !important; color: #d1d5db !important; }
        .gjs-block:hover { border-color: #6366f1 !important; }
        .gjs-block__label { color: #9ca3af !important; font-size: 11px !important; }
        .gjs-block-category .gjs-title { color: #6366f1 !important; font-weight: 600 !important; font-size: 11px !important; text-transform: uppercase !important; letter-spacing: 0.05em !important; background: transparent !important; border-bottom: 1px solid #374151 !important; }

        /* Canvas border */
        .gjs-cv-canvas { background: #0f1117 !important; }

        /* Selected element highlight */
        .gjs-selected { outline: 2px solid #6366f1 !important; }
        .gjs-hovered { outline: 1px dashed #6366f1 !important; }

        /* Toolbar */
        .gjs-toolbar { background: #4f46e5 !important; border-radius: 6px !important; }
        .gjs-toolbar-item { color: white !important; }

        /* Layer manager */
        .gjs-layer { border-bottom: 1px solid #374151 !important; color: #d1d5db !important; }
        .gjs-layer__title { color: #d1d5db !important; }
        .gjs-layer--selected { background: #312e81 !important; }

        /* Style manager */
        .gjs-sm-sector { border-bottom: 1px solid #374151 !important; }
        .gjs-sm-sector-title { color: #a5b4fc !important; background: transparent !important; }
        .gjs-sm-label { color: #9ca3af !important; }
        .gjs-sm-field { background: #252a3d !important; border-color: #374151 !important; color: #d1d5db !important; }

        /* Traits */
        .gjs-trt-trait { border-bottom: 1px solid #374151 !important; }
        .gjs-field { background: #252a3d !important; border-color: #374151 !important; color: #d1d5db !important; }
        .gjs-field input, .gjs-field select { color: #d1d5db !important; background: transparent !important; }

        /* Active tab */
        .active-tab { background-color: #4f46e5 !important; color: white !important; }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #1e2235; }
        ::-webkit-scrollbar-thumb { background: #374151; border-radius: 3px; }
    </style>
</head>
<body>


<div class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between px-4 h-12 bg-[#0f1117] border-b border-gray-800">

    
    <div class="flex items-center gap-3">
        <a href="<?php echo e(url('/admin/pages')); ?>"
           class="flex items-center gap-1.5 text-gray-400 hover:text-white text-sm transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Admin
        </a>
        <span class="text-gray-700">|</span>
        <span class="text-sm text-gray-300 font-medium truncate max-w-[240px]"><?php echo e($page->title); ?></span>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($page->template === 'gjs'): ?>
            <span class="text-xs bg-indigo-600 text-white px-2 py-0.5 rounded">Block Builder</span>
        <?php else: ?>
            <span class="text-xs bg-gray-600 text-white px-2 py-0.5 rounded"><?php echo e($page->template); ?></span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    
    <div class="flex items-center gap-1 bg-gray-800 rounded-lg p-1">
        <button data-device="desktop"
                class="flex items-center gap-1.5 px-3 py-1 rounded text-sm bg-white text-gray-900 transition-colors"
                title="Desktop">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
        </button>
        <button data-device="tablet"
                class="flex items-center gap-1.5 px-3 py-1 rounded text-sm text-gray-400 transition-colors"
                title="Tablet">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
            </svg>
        </button>
        <button data-device="mobile"
                class="flex items-center gap-1.5 px-3 py-1 rounded text-sm text-gray-400 transition-colors"
                title="Mobile">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
            </svg>
        </button>
    </div>

    
    <div class="flex items-center gap-2">

        
        <button id="btn-undo"
                title="Undo (Ctrl+Z)"
                class="p-1.5 text-gray-400 hover:text-white rounded transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/>
            </svg>
        </button>
        <button id="btn-redo"
                title="Redo (Ctrl+Y)"
                class="p-1.5 text-gray-400 hover:text-white rounded transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 10H11a8 8 0 00-8 8v2M21 10l-6 6m6-6l-6-6"/>
            </svg>
        </button>

        <span class="text-gray-700">|</span>

        
        <span id="save-status" class="text-sm text-gray-400"></span>

        
        <a id="btn-preview"
           href="<?php echo e(route('page.show', ['slug' => $page->slug])); ?>"
           target="_blank"
           class="flex items-center gap-1.5 px-3 py-1.5 text-sm text-gray-300 hover:text-white border border-gray-600 rounded-lg hover:border-gray-400 transition-colors">
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            </svg>
            Preview
        </a>

        
        <button id="btn-save"
                class="flex items-center gap-1.5 px-4 py-1.5 text-sm font-semibold bg-indigo-600 text-white rounded-lg hover:bg-indigo-500 transition-colors">
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
            </svg>
            Save
        </button>

    </div>
</div>


<div class="flex h-full pt-12">

    
    <div class="w-56 flex-shrink-0 bg-[#1e2235] border-r border-gray-800 flex flex-col overflow-hidden">

        
        <div class="flex border-b border-gray-800">
            <button data-panel-tab="blocks"
                    class="active-tab flex-1 py-2 text-xs font-semibold text-center uppercase tracking-widest transition-colors">
                Blocks
            </button>
            <button data-panel-tab="layers"
                    class="flex-1 py-2 text-xs font-semibold text-center uppercase tracking-widest text-gray-400 hover:text-white transition-colors">
                Layers
            </button>
        </div>

        
        <div id="blocks-panel" data-panel="blocks" class="flex-1 overflow-y-auto"></div>

        
        <div id="layers-panel" data-panel="layers" class="hidden flex-1 overflow-y-auto"></div>

    </div>

    
    <div class="flex-1 overflow-hidden">
        <div id="gjs" class="w-full h-full"></div>
    </div>

    
    <div class="w-56 flex-shrink-0 bg-[#1e2235] border-l border-gray-800 flex flex-col overflow-hidden">

        
        <div class="flex border-b border-gray-800">
            <button data-panel-tab="styles"
                    class="active-tab flex-1 py-2 text-xs font-semibold text-center uppercase tracking-widest transition-colors">
                Style
            </button>
            <button data-panel-tab="traits"
                    class="flex-1 py-2 text-xs font-semibold text-center uppercase tracking-widest text-gray-400 hover:text-white transition-colors">
                Settings
            </button>
        </div>

        
        <div id="style-panel" data-panel="styles" class="flex-1 overflow-y-auto"></div>

        
        <div id="traits-panel" data-panel="traits" class="hidden flex-1 overflow-y-auto p-3">
            <p class="text-xs text-gray-500 mb-3">Click an element to see its settings.</p>
            <div id="traits-container"></div>
        </div>

    </div>

</div>


<script>
window.BUILDER_CONFIG = {
    pageId:      <?php echo e($page->id); ?>,
    pageContent: <?php echo json_encode($page->content ?? '', 15, 512) ?>,
    gjsData:     <?php echo json_encode(data_get($page->blocks ?? [], 'gjs', null) ?? new stdClass()) ?>,
    savePath:    '<?php echo e(route('builder.save', $page)); ?>',
    csrfToken:   '<?php echo e(csrf_token()); ?>',
    appCssUrl:   '<?php echo e(Vite::asset('resources/css/app.css')); ?>',
};
</script>

</body>
</html>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views\admin\visual-editor.blade.php ENDPATH**/ ?>