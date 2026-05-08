<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfessionalMembershipRenewal extends Model
{
    protected $fillable = [
        'full_name',
        'membership_id',
        'email',
        'phone',
        'country',
        'current_job_title',
        'company_name',
        'industry_sector',
        'payment_method',
        'street_address',
        'city',
        'state_province',
        'postal_code',
        'terms_accepted',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'terms_accepted' => 'boolean',
        ];
    }
}
