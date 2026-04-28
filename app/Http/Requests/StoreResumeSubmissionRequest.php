<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreResumeSubmissionRequest extends FormRequest
{
    private const SALARY_UNITS = ['Per Hour', 'Per Year'];

    private const EDUCATION_LEVELS = [
        'High School or Equivalent',
        'Certification',
        'Vocational-HS Degree',
        'Vocational-Degree',
        'Some College Coursework Complete',
        'Associate\'s Degree',
        'Bachelor\'s Degree',
        'Master\'s Degree',
        'Doctorate',
        'Professional',
    ];

    private const CAREER_LEVELS = [
        'Student (High School)',
        'Student (Undergraduate/Graduate)',
        'Entry Level',
        'Experienced',
        'Manager',
        'Executive',
        'Senior Executive',
    ];

    private const INDUSTRIES = [
        'Advertising & Marketing',
        'Communication',
        'Construction',
        'Education',
        'Engineering & Research',
        'Finance /Banking insurance',
        'Food Service',
        'Government',
        'Hospital/ Health Service',
        'Lodging/Entertainment',
        'Manufacturing',
        'None',
        'Other',
        'Publishing',
        'Religious Affiliation',
        'Retail',
        'Service',
        'Transportation',
        'Utilities',
        'Wholesale / Distribution',
    ];

    private const YEARS = [
        '1 Year',
        '2 Year(s)',
        '3 Year(s)',
        '4 Year(s)',
        '5 Year(s)',
        '6 Year(s)',
        '7 Year(s)',
        '8 Year(s)',
        '9 Year(s)',
        '10+ Year(s)',
    ];

    private const JOB_STATUSES = [
        'Full-Time (40 hrs/week)',
        'Part-Time (< 40 hrs/week)',
        'Per Diem (per project)',
    ];

    private const JOB_PREFERENCES = [
        'Employee',
        'Intern',
        'Temporary/Contract/Project',
        'Seasonal',
    ];

    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        return [
            'headline' => ['nullable', 'string', 'max:255'],
            'objective' => ['nullable', 'string', 'max:500'],
            'desired_salary' => ['nullable', 'numeric', 'min:0', 'max:999999999.99'],
            'salary_unit' => ['nullable', Rule::in(self::SALARY_UNITS)],
            'education_level' => ['nullable', Rule::in(self::EDUCATION_LEVELS)],
            'career_level' => ['nullable', Rule::in(self::CAREER_LEVELS)],
            'industry_experience' => ['nullable', Rule::in(self::INDUSTRIES)],
            'years_of_experience' => ['nullable', Rule::in(self::YEARS)],
            'job_statuses' => ['nullable', 'array'],
            'job_statuses.*' => [Rule::in(self::JOB_STATUSES)],
            'job_preferences' => ['nullable', 'array'],
            'job_preferences.*' => [Rule::in(self::JOB_PREFERENCES)],
            'willing_to_relocate' => ['nullable', 'boolean'],
            'employment_history' => ['nullable', 'array', 'max:3'],
            'employment_history.*.company_name' => ['nullable', 'string', 'max:255'],
            'employment_history.*.start_date' => ['nullable', 'string', 'max:20'],
            'employment_history.*.end_date' => ['nullable', 'string', 'max:20'],
            'employment_history.*.job_title' => ['nullable', 'string', 'max:255'],
            'employment_history.*.responsibilities' => ['nullable', 'string', 'max:500'],
            'city' => ['nullable', 'string', 'max:120'],
            'state' => ['nullable', 'string', 'max:120'],
            'zip' => ['nullable', 'string', 'max:40'],
            'us_region' => ['nullable', 'string', 'max:120'],
        ];
    }
}
