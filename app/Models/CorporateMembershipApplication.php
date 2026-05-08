<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CorporateMembershipApplication extends Model
{
    protected $fillable = [
        'organization_name',
        'legal_business_name',
        'business_registration_number',
        'year_established',
        'industry_sectors',
        'employee_count',
        'company_website',
        'head_office_address',
        'country_of_registration',
        'branches_offices',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'industry_sectors' => 'array',
            'year_established' => 'date',
        ];
    }
}
