<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\FellowMembershipApplication;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreFellowMembershipApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $tierKeys = array_keys(FellowMembershipApplication::tiers());

        return [
            'membership_tier'        => ['required', Rule::in($tierKeys)],

            // Personal
            'full_name'              => ['required', 'string', 'max:255'],
            'date_of_birth'          => ['required', 'date', 'before:today'],
            'nationality'            => ['required', 'string', 'max:100'],

            // Contact
            'email'                  => ['required', 'email', 'max:255'],
            'phone'                  => ['required', 'string', 'max:50'],
            'address'                => ['required', 'string', 'max:255'],

            // Professional
            'current_employer'       => ['required', 'string', 'max:255'],
            'job_title'              => ['required', 'string', 'max:255'],
            'industry_sector'        => ['required', 'string', 'max:150'],
            'years_experience'       => ['required', 'string', 'max:30'],

            // Qualifications
            'highest_qualification'  => ['required', 'string', 'max:150'],
            'degree_name'            => ['required', 'string', 'max:255'],
            'institution'            => ['required', 'string', 'max:255'],
            'year_completed'         => ['required', 'date'],

            // Statement
            'personal_statement'     => ['required', 'string', 'max:5000'],

            // File uploads
            'cv'                     => ['required', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
            'identity'               => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'],
            'supporting_documents'   => ['nullable', 'file', 'mimes:pdf,doc,docx,jpg,jpeg,png,zip', 'max:10240'],
            'payment_proof'          => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'],

            // Declaration
            'declaration_agreed'     => ['accepted'],
        ];
    }

    public function messages(): array
    {
        return [
            'declaration_agreed.accepted' => 'You must agree to the declaration to submit the form.',
        ];
    }
}
