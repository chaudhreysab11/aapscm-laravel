<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfessionalMembershipRenewalRequest;
use App\Models\Product;
use App\Models\ProfessionalMembershipRenewal;
use Illuminate\Http\RedirectResponse;

class ProfessionalMembershipRenewalController extends Controller
{
    public function store(StoreProfessionalMembershipRenewalRequest $request): RedirectResponse
    {
        $data = $request->validated();

        ProfessionalMembershipRenewal::create([
            'full_name' => $data['text-195'],
            'membership_id' => $data['text-825'],
            'email' => $data['email-655'],
            'phone' => $data['tel-101'],
            'country' => $data['text-384'],
            'current_job_title' => $data['text-944'],
            'company_name' => $data['text-585'],
            'industry_sector' => $data['radio-592'],
            'payment_method' => $data['radio-346'],
            'street_address' => $data['text-839'],
            'city' => $data['text-992'],
            'state_province' => $data['text-883'],
            'postal_code' => $data['text-776'],
            'terms_accepted' => (bool) ($data['acceptance-46'] ?? false),
            'status' => 'pending',
        ]);

        if (in_array($data['radio-346'], ['Credit/Debit Card', 'PayPal'], true)) {
            $sourceId = Product::query()
                ->where('slug', 'professional-membership-renewal')
                ->value('source_id');

            if ($sourceId !== null) {
                return redirect()
                    ->route('checkout.show', ['add-to-cart' => $sourceId])
                    ->with('success', 'Your renewal details were saved. Complete checkout to finish your membership renewal.');
            }
        }

        return redirect()
            ->back()
            ->with('success', 'Your renewal details were submitted successfully. Our team will contact you with the next steps.');
    }
}
