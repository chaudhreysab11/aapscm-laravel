<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactInquiryRequest;
use App\Models\ContactInquiry;
use Illuminate\Http\RedirectResponse;

class ContactInquiryController extends Controller
{
    public function store(StoreContactInquiryRequest $request): RedirectResponse
    {
        $data = $request->validated();

        ContactInquiry::create([
            'name' => $data['text-600'] ?: null,
            'email' => $data['email-775'] ?: null,
            'subject' => $data['your-subject'],
            'message' => $data['your-message'],
            'status' => 'pending',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Your message has been submitted successfully. Our team will get back to you shortly.');
    }
}