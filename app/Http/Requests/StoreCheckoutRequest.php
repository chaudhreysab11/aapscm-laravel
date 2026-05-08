<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCheckoutRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'gateway' => 'stripe',
        ]);
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'allergic_to_peanuts' => ['nullable', 'boolean'],
            'billing_name' => ['nullable', 'string', 'max:255'],
            'billing_first_name' => ['required_without:billing_name', 'string', 'max:100'],
            'billing_last_name' => ['required_without:billing_name', 'string', 'max:100'],
            'billing_email' => ['required', 'email', 'max:255'],
            'billing_company' => ['nullable', 'string', 'max:255'],
            'billing_address' => ['required', 'string', 'max:500'],
            'billing_address_line_2' => ['nullable', 'string', 'max:500'],
            'billing_city' => ['required', 'string', 'max:150'],
            'billing_state' => ['required', 'string', 'max:150'],
            'billing_postcode' => ['required', 'string', 'max:50'],
            'billing_country' => ['required', 'string', 'max:100'],
            'billing_phone' => ['required', 'string', 'max:50'],
            'create_account' => ['nullable', 'boolean'],
            'gateway' => ['required', Rule::in(['stripe'])],
            'notes' => ['nullable', 'string', 'max:2000'],
        ];
    }
}
