<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAapscmHotlineRequest extends FormRequest
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
            'radio_1634974481' => ['nullable', 'string', Rule::in(['Yes', 'No'])],
            'first_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'user_email' => ['required', 'email', 'max:255'],
            'number_box_1634974669' => ['nullable', 'string', 'max:50'],
            'date_box_1634974714' => ['nullable', 'date'],
            'user_pass' => ['required', 'string', 'min:8', 'max:255'],
            'textarea_1634974759' => ['nullable', 'string', 'max:5000'],
            'textarea_1634974811' => ['nullable', 'string', 'max:5000'],
            'check_box_1634974900' => ['required', 'array', 'min:1'],
            'check_box_1634974900.*' => ['string'],
        ];
    }
}
