<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PdesCertificateRequest extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'certification',
        'certification_number',
        'activity_type',
        'course_name',
        'provider',
        'location',
        'course_date',
        'pdes_earned',
        'category',
        'certificate_path',
        'additional_documents_path',
        'declarations',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'course_date' => 'date',
            'pdes_earned' => 'integer',
            'declarations' => 'array',
        ];
    }
}
