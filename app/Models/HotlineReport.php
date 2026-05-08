<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HotlineReport extends Model
{
    protected $fillable = [
        'user_id',
        'anonymous_requested',
        'first_name',
        'last_name',
        'email',
        'phone',
        'date_of_birth',
        'incident_summary',
        'incident_business_address',
        'terms_accepted',
        'account_created',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'anonymous_requested' => 'boolean',
            'terms_accepted' => 'boolean',
            'account_created' => 'boolean',
            'date_of_birth' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
