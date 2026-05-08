<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePartnerInquiryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        return [
            'user_login' => ['nullable', 'string', 'max:255'],
            'first_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'user_email' => ['required', 'email', 'max:255'],
            'user_pass' => ['required', 'string', 'min:8', 'max:255'],
            'role' => ['nullable', 'string', 'max:20'],
            'city' => ['nullable', 'string', 'max:20'],
            'country' => ['nullable', 'string', 'size:2'],
            'organization' => ['nullable', 'string', 'max:255'],
            'partner_type' => ['required', 'string', Rule::in(['Academic Partner', 'Delivery Partner'])],
            'assist' => ['nullable', 'string', 'max:4000'],
        ];
    }
}
