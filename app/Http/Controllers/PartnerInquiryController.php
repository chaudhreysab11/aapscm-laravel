<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StorePartnerInquiryRequest;
use App\Models\PartnerInquiry;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;

class PartnerInquiryController extends Controller
{
    public function store(StorePartnerInquiryRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $name = trim(implode(' ', array_filter([
            $data['first_name'] ?? null,
            $data['last_name'] ?? null,
        ])));

        if ($name === '') {
            $name = $data['user_login'] ?: $data['organization'] ?: $data['user_email'];
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
                'job_title' => $data['role'] ?: null,
                'company' => $data['organization'] ?: null,
                'country' => $data['country'] ?: null,
                'profile_payload' => array_filter([
                    'username' => $data['user_login'] ?: null,
                    'first_name' => $data['first_name'] ?: null,
                    'last_name' => $data['last_name'] ?: null,
                    'city' => $data['city'] ?: null,
                    'partner_type' => $data['partner_type'],
                    'assistance_request' => $data['assist'] ?: null,
                    'source' => 'become-a-partner',
                ]),
            ]);

            event(new Registered($user));
        }

        PartnerInquiry::create([
            'user_id' => $user->id,
            'username' => $data['user_login'] ?: null,
            'first_name' => $data['first_name'] ?: null,
            'last_name' => $data['last_name'] ?: null,
            'email' => $data['user_email'],
            'role' => $data['role'] ?: null,
            'city' => $data['city'] ?: null,
            'country' => $data['country'] ?: null,
            'organization' => $data['organization'] ?: null,
            'partner_type' => $data['partner_type'],
            'assistance_request' => $data['assist'] ?: null,
            'account_created' => $existingUser === null,
            'status' => 'pending',
        ]);

        return redirect()
            ->back()
            ->with('success', $existingUser === null
                ? 'Your partnership request has been submitted successfully. We also created your account so you can continue with future portal access.'
                : 'Your partnership request has been submitted successfully. Our team will review it and contact you shortly.');
    }
}
