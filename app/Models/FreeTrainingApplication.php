<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FreeTrainingApplication extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'date_of_birth',
        'phone',
        'gender',
        'college_university',
        'program_of_study',
        'year_of_study',
        'expected_graduation',
        'program_choices',
        'interest_reason',
        'has_prior_training',
        'prior_training_details',
        'career_aspirations',
        'available_all_sessions',
        'availability_explanation',
        'preferred_schedule',
        'preferred_training_type',
        'wants_student_membership',
        'signature_name',
        'signature_date',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'program_choices'        => 'array',
            'date_of_birth'          => 'date',
            'expected_graduation'    => 'date',
            'signature_date'         => 'date',
            'has_prior_training'     => 'boolean',
            'available_all_sessions' => 'boolean',
            'wants_student_membership' => 'boolean',
        ];
    }
}