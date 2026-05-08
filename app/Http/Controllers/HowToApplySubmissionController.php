<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreHowToApplySubmissionRequest;
use App\Models\HowToApplySubmission;
use Illuminate\Http\RedirectResponse;

class HowToApplySubmissionController extends Controller
{
    public function store(StoreHowToApplySubmissionRequest $request): RedirectResponse
    {
        $data = $request->validated();

        HowToApplySubmission::create([
            'name' => $data['text-782'],
            'email' => $data['email-543'],
            'phone' => $data['tel-26'],
            'cv_path' => $request->file('UploadCV')?->store('how-to-apply/cv', 'public'),
            'message' => $data['textarea-276'],
            'status' => 'pending',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Your application details have been submitted successfully. We will review them and contact you shortly.');
    }
}
