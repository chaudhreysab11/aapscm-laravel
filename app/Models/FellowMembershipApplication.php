<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FellowMembershipApplication extends Model
{
    protected $fillable = [
        'membership_tier',
        'full_name',
        'date_of_birth',
        'nationality',
        'email',
        'phone',
        'address',
        'current_employer',
        'job_title',
        'industry_sector',
        'years_experience',
        'highest_qualification',
        'degree_name',
        'institution',
        'year_completed',
        'personal_statement',
        'cv_path',
        'identity_path',
        'supporting_documents_path',
        'payment_proof_path',
        'declaration_agreed',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'date_of_birth'       => 'date',
            'year_completed'      => 'date',
            'declaration_agreed'  => 'boolean',
        ];
    }

    /**
     * Membership tier slug → display label + price.
     */
    public static function tiers(): array
    {
        return [
            'grand_fellow'             => ['label' => 'Grand Fellow',                       'price' => '$1,999.99'],
            'specialist_fellow'        => ['label' => 'Specialist Fellow',                  'price' => '$850'],
            'professional_fellow'      => ['label' => 'Professional Fellow',                'price' => '$1,200'],
            'academic_fellow'          => ['label' => 'Academic Fellow Membership',         'price' => '$950'],
            'corporate_fellow'         => ['label' => 'Corporate Fellow Membership',        'price' => '$2,500'],
            'emerging_leader_fellow'   => ['label' => 'Emerging Leader Fellow Membership',  'price' => '$850'],
            'international_fellow'     => ['label' => 'International Fellow Membership',    'price' => '$1,499.99'],
        ];
    }
}
