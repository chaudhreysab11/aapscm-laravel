<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHowToApplySubmissionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if (trim((string) $this->input('textarea-276')) === 'Message*') {
            $this->merge(['textarea-276' => '']);
        }
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        return [
            'text-782' => ['required', 'string', 'max:255'],
            'email-543' => ['required', 'email', 'max:255'],
            'tel-26' => ['required', 'string', 'max:50'],
            'UploadCV' => ['required', 'file', 'max:10240'],
            'textarea-276' => ['required', 'string', 'max:5000'],
        ];
    }
}
