<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCorporateMembershipApplicationRequest extends FormRequest
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
            'text-726' => ['nullable', 'string', 'max:255'],
            'text-565' => ['nullable', 'string', 'max:255'],
            'number-586' => ['nullable', 'string', 'max:100'],
            'date-484' => ['nullable', 'date'],
            'checkbox-122' => ['nullable', 'array'],
            'checkbox-122.*' => ['string', 'max:100'],
            'number-475' => ['nullable', 'integer', 'min:0'],
            'text-174' => ['nullable', 'url', 'max:255'],
            'text-81' => ['nullable', 'string', 'max:255'],
            'text-834' => ['nullable', 'string', 'max:255'],
            'text-25' => ['nullable', 'string', 'max:255'],
        ];
    }
}
