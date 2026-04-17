<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MembershipTier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'code',
        'description',
        'annual_price',
        'monthly_price',
        'benefits',
        'is_active',
        'sort_order',
        'source_id',
    ];

    protected function casts(): array
    {
        return [
            'benefits' => 'array',
            'annual_price' => 'decimal:2',
            'monthly_price' => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }

    // ─── Relationships ──────────────────────────────────────────────────────────

    public function userMemberships(): HasMany
    {
        return $this->hasMany(UserMembership::class);
    }

    public function activeMemberships(): HasMany
    {
        return $this->hasMany(UserMembership::class)->where('status', 'active');
    }
}
