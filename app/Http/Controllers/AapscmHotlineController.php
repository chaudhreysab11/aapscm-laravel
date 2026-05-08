<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreAapscmHotlineRequest;
use App\Models\HotlineReport;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;

class AapscmHotlineController extends Controller
{
    public function store(StoreAapscmHotlineRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $name = trim(implode(' ', array_filter([
            $data['first_name'] ?? null,
            $data['last_name'] ?? null,
        ])));

        if ($name === '') {
            $name = $data['user_email'];
        }

        $existingUser = User::query()->where('email', $data['user_email'])->first();
        $user = $existingUser;

        if (! $user instanceof User) {
            $user = User::create([
                'name' => $name,
                'email' => $data['user_email'],
                'email_verified_at' => now(),
                'password' => $data['user_pass'],
                'password_initialized_at' => now(),
                'phone' => $data['number_box_1634974669'] ?: null,
                'profile_payload' => array_filter([
                    'first_name' => $data['first_name'] ?: null,
                    'last_name' => $data['last_name'] ?: null,
                    'date_of_birth' => $data['date_box_1634974714'] ?: null,
                    'source' => 'aapscm-hotline',
                ]),
            ]);

            event(new Registered($user));
        }

        HotlineReport::create([
            'user_id' => $user->id,
            'anonymous_requested' => ($data['radio_1634974481'] ?? null) === 'Yes',
            'first_name' => $data['first_name'] ?: null,
            'last_name' => $data['last_name'] ?: null,
            'email' => $data['user_email'],
            'phone' => $data['number_box_1634974669'] ?: null,
            'date_of_birth' => $data['date_box_1634974714'] ?: null,
            'incident_summary' => $data['textarea_1634974759'] ?: null,
            'incident_business_address' => $data['textarea_1634974811'] ?: null,
            'terms_accepted' => ! empty($data['check_box_1634974900']),
            'account_created' => $existingUser === null,
            'status' => 'pending',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Your hotline report has been submitted successfully. Our team will review it confidentially.');
    }
}
