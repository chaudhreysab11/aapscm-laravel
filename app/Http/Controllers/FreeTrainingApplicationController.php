<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreFreeTrainingApplicationRequest;
use App\Models\FreeTrainingApplication;
use App\Models\Page;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class FreeTrainingApplicationController extends Controller
{
    public function show(): View
    {
        $page = Page::where('slug', 'application-form-for-free-training-in-procurement-management')
            ->where('is_published', true)
            ->firstOrFail();

        return view('cms.page.application-form-procurement', compact('page'));
    }

    public function store(StoreFreeTrainingApplicationRequest $request): RedirectResponse
    {
        FreeTrainingApplication::create($request->validated());

        return redirect()
            ->route('free-training.form')
            ->with('success', 'Your application has been submitted successfully. We will contact you shortly.');
    }
}