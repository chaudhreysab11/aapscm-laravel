<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageBuilderController extends Controller
{
    /**
     * Show the GrapesJS visual editor for a CMS page.
     */
    public function edit(Page $page): View
    {
        abort_unless(
            auth()->check() && auth()->user()->hasRole(['admin', 'staff']),
            403,
            'Insufficient permissions to use the visual editor.'
        );

        return view('admin.visual-editor', compact('page'));
    }

    /**
     * Save the GrapesJS output back to the page.
     *
     * Expects JSON body: { html: string, gjs_data: object }
     */
    public function save(Request $request, Page $page): JsonResponse
    {
        abort_unless(
            auth()->check() && auth()->user()->hasRole(['admin', 'staff']),
            403,
            'Insufficient permissions to save the page.'
        );

        $validated = $request->validate([
            'html'     => ['required', 'string'],
            'css'      => ['nullable', 'string'],
            'gjs_data' => ['required', 'array'],
        ]);

        // Store the raw HTML as page content (rendered on frontend)
        // Store GrapesJS project JSON for re-editing and the generated CSS
        // for faithful preview rendering.
        $page->update([
            'content'  => $validated['html'],
            'blocks'   => [
                'gjs' => $validated['gjs_data'],
                'css' => $validated['css'] ?? '',
            ],
            'template' => 'gjs',
        ]);

        return response()->json([
            'success'  => true,
            'preview'  => route('page.show', ['slug' => $page->slug]),
        ]);
    }
}
