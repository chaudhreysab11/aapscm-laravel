<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactInquiryRequest extends FormRequest
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
            'text-600' => ['nullable', 'string', 'max:255'],
            'email-775' => ['nullable', 'email', 'max:255'],
            'your-subject' => ['required', 'string', 'max:255'],
            'your-message' => ['required', 'string', 'max:5000'],
        ];
    }
}