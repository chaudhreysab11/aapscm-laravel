<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\Page;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class StorePdesCertificateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $declarations = collect($this->all())
            ->filter(static fn (mixed $value, string $key): bool => str_starts_with($key, 'declaration_') && (string) $value === '1')
            ->keys()
            ->values()
            ->all();

        $this->merge([
            'declarations' => $declarations,
        ]);
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'certification' => ['required', 'string', 'max:255'],
            'certification_number' => ['nullable', 'string', 'max:255'],
            'activity_type' => ['required', 'string', 'max:255'],
            'course_name' => ['required', 'string', 'max:255'],
            'provider' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'course_date' => ['required', 'date'],
            'pdes_earned' => ['required', 'integer', 'min:1', 'max:999'],
            'category' => ['required', 'string', 'max:255'],
            'certificate' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png,doc,docx', 'max:10240'],
            'additional_docs' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png,doc,docx', 'max:10240'],
            'declarations' => ['required', 'array', 'min:1'],
        ];
    }

    /**
     * @return array<int, callable(Validator): void>
     */
    public function after(): array
    {
        return [
            function (Validator $validator): void {
                $page = Page::query()
                    ->where('slug', 'request-pdes-for-certificate')
                    ->where('is_published', true)
                    ->first();

                $expectedDeclarationCount = count(data_get($page?->page_data, 'form.declarations', []));

                if ($expectedDeclarationCount > 0 && count($this->input('declarations', [])) !== $expectedDeclarationCount) {
                    $validator->errors()->add('declarations', 'Please confirm each declaration before submitting your PDES request.');
                }
            },
        ];
    }
}
