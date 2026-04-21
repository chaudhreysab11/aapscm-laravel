<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreFreeTrainingApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name'                => ['required', 'string', 'max:255'],
            'email'                    => ['required', 'email', 'max:255'],
            'date_of_birth'            => ['nullable', 'date', 'before:today'],
            'phone'                    => ['nullable', 'string', 'max:50'],
            'gender'                   => ['nullable', Rule::in(['male', 'female', 'other', 'prefer_not_to_say'])],
            'college_university'       => ['nullable', 'string', 'max:255'],
            'program_of_study'         => ['nullable', 'string', 'max:255'],
            'year_of_study'            => ['nullable', Rule::in(['freshman', 'sophomore', 'junior', 'senior', 'graduate'])],
            'expected_graduation'      => ['nullable', 'date'],
            'program_choices'          => ['nullable', 'array'],
            'program_choices.*'        => [Rule::in(['procurement_management', 'supply_chain_management', 'hospitality_tourism_management'])],
            'interest_reason'          => ['nullable', 'string', 'max:2000'],
            'has_prior_training'       => ['nullable', 'boolean'],
            'prior_training_details'   => ['nullable', 'string', 'max:2000'],
            'career_aspirations'       => ['nullable', 'string', 'max:2000'],
            'available_all_sessions'   => ['nullable', 'boolean'],
            'availability_explanation' => ['nullable', 'string', 'max:1000'],
            'preferred_schedule'       => ['required', Rule::in(['weekdays', 'weekends', 'flexible'])],
            'preferred_training_type'  => ['required', Rule::in(['virtual_instructor_led', 'self_paced'])],
            'wants_student_membership' => ['nullable', 'boolean'],
            'signature_name'           => ['required', 'string', 'max:255'],
            'signature_date'           => ['required', 'date'],
        ];
    }
}