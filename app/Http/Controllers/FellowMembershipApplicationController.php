<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreFellowMembershipApplicationRequest;
use App\Models\FellowMembershipApplication;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FellowMembershipApplicationController extends Controller
{
    public function show(): View
    {
        $page = Page::where('slug', 'fellow-membership-form')
            ->where('is_published', true)
            ->firstOrFail();

        $tiers = FellowMembershipApplication::tiers();

        return view('cms.page.fellow-membership-form', compact('page', 'tiers'));
    }

    public function store(StoreFellowMembershipApplicationRequest $request): RedirectResponse
    {
        $data = $request->validated();

        // Move uploads to public storage and persist their paths.
        $data['cv_path']       = $request->file('cv')->store('fellow-applications/cv', 'public');
        $data['identity_path'] = $request->file('identity')->store('fellow-applications/identity', 'public');
        $data['payment_proof_path'] = $request->file('payment_proof')->store('fellow-applications/payment-proof', 'public');

        if ($request->hasFile('supporting_documents')) {
            $data['supporting_documents_path'] = $request->file('supporting_documents')
                ->store('fellow-applications/supporting', 'public');
        }

        // Drop the raw UploadedFile entries before mass-assignment.
        unset($data['cv'], $data['identity'], $data['supporting_documents'], $data['payment_proof']);

        FellowMembershipApplication::create($data);

        return redirect()
            ->route('fellow-membership-form.form')
            ->with('success', 'Your fellow membership application has been submitted successfully. Our team will review it and contact you shortly.');
    }
}
