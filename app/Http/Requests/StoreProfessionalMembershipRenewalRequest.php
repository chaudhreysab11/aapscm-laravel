<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProfessionalMembershipRenewalRequest extends FormRequest
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
            'text-195' => ['required', 'string', 'max:255'],
            'text-825' => ['required', 'string', 'max:255'],
            'email-655' => ['required', 'email', 'max:255'],
            'tel-101' => ['required', 'string', 'max:50'],
            'text-384' => ['required', 'string', 'max:255'],
            'text-944' => ['required', 'string', 'max:255'],
            'text-585' => ['required', 'string', 'max:255'],
            'radio-592' => ['required', 'string', Rule::in(['Procurement & Supply Chain', 'E-Commerce', 'Tourism & Hospitality', 'Other:'])],
            'radio-346' => ['required', 'string', Rule::in(['Credit/Debit Card', 'PayPal', 'Bank Transfer'])],
            'text-839' => ['required', 'string', 'max:255'],
            'text-992' => ['required', 'string', 'max:255'],
            'text-883' => ['required', 'string', 'max:255'],
            'text-776' => ['required', 'string', 'max:255'],
            'acceptance-46' => ['accepted'],
        ];
    }
}
