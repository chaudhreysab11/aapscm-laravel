<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PartnerInquiry extends Model
{
    protected $fillable = [
        'user_id',
        'username',
        'first_name',
        'last_name',
        'email',
        'role',
        'city',
        'country',
        'organization',
        'partner_type',
        'assistance_request',
        'account_created',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'account_created' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
