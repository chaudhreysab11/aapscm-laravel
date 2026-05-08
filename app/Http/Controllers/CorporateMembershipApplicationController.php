<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreCorporateMembershipApplicationRequest;
use App\Models\CorporateMembershipApplication;
use Illuminate\Http\RedirectResponse;

class CorporateMembershipApplicationController extends Controller
{
    public function store(StoreCorporateMembershipApplicationRequest $request): RedirectResponse
    {
        $data = $request->validated();

        CorporateMembershipApplication::create([
            'organization_name' => $data['text-726'] ?: null,
            'legal_business_name' => $data['text-565'] ?: null,
            'business_registration_number' => $data['number-586'] ?: null,
            'year_established' => $data['date-484'] ?: null,
            'industry_sectors' => $data['checkbox-122'] ?? [],
            'employee_count' => $data['number-475'] ?? null,
            'company_website' => $data['text-174'] ?: null,
            'head_office_address' => $data['text-81'] ?: null,
            'country_of_registration' => $data['text-834'] ?: null,
            'branches_offices' => $data['text-25'] ?: null,
            'status' => 'pending',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Your corporate membership application has been submitted successfully. Our team will contact you after review.');
    }
}
