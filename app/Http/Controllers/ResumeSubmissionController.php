<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\CareerCenter\SubmitResumeAction;
use App\Http\Requests\StoreResumeSubmissionRequest;
use Illuminate\Http\RedirectResponse;

class ResumeSubmissionController extends Controller
{
    public function store(StoreResumeSubmissionRequest $request, SubmitResumeAction $action): RedirectResponse
    {
        $action->execute($request->user(), $request->validated());

        return redirect()
            ->route('cms.page', ['slug' => 'post-resume'])
            ->with('success', 'Your resume has been submitted successfully. Our team will review it shortly.');
    }
}
