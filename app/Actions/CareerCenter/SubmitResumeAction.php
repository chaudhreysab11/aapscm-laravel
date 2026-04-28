<?php

declare(strict_types=1);

namespace App\Actions\CareerCenter;

use App\Models\CvSubmission;
use App\Models\User;

class SubmitResumeAction
{
    /**
     * @param  array<string, mixed>  $data
     */
    public function execute(User $user, array $data): CvSubmission
    {
        $employmentHistory = array_values(array_filter(
            $data['employment_history'] ?? [],
            static fn (array $job): bool => collect($job)
                ->filter(static fn ($value) => is_string($value) ? trim($value) !== '' : ! is_null($value))
                ->isNotEmpty(),
        ));

        return CvSubmission::create([
            'user_id' => $user->id,
            'full_name' => $user->name,
            'email' => $user->email,
            'headline' => $data['headline'],
            'phone' => $user->phone,
            'linkedin_url' => null,
            'cv_file_path' => null,
            'cover_letter' => $data['objective'],
            'form_payload' => [
                'desired_salary' => $data['desired_salary'] ?? null,
                'salary_unit' => $data['salary_unit'] ?? null,
                'education_level' => $data['education_level'] ?? null,
                'career_level' => $data['career_level'] ?? null,
                'industry_experience' => $data['industry_experience'] ?? null,
                'years_of_experience' => $data['years_of_experience'] ?? null,
                'job_statuses' => $data['job_statuses'] ?? [],
                'job_preferences' => $data['job_preferences'] ?? [],
                'willing_to_relocate' => (bool) ($data['willing_to_relocate'] ?? false),
                'employment_history' => $employmentHistory,
                'city' => $data['city'] ?? null,
                'state' => $data['state'] ?? null,
                'zip' => $data['zip'] ?? null,
                'us_region' => $data['us_region'] ?? null,
            ],
            'job_listing_id' => null,
            'status' => 'received',
        ]);
    }
}
