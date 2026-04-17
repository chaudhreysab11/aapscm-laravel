<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property Carbon|null $starts_at
 * @property Carbon|null $expires_at
 * @property Carbon|null $grace_period_ends_at
 * @property Carbon|null $cancelled_at
 * @property MembershipTier|null $tier
 * @property User $user
 */
class UserMembership extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'membership_tier_id',
        'order_id',
        'status',
        'billing_cycle',
        'starts_at',
        'expires_at',
        'grace_period_ends_at',
        'cancelled_at',
        'cancellation_reason',
        'auto_renew',
        'source_id',
    ];

    protected function casts(): array
    {
        return [
            'starts_at' => 'datetime',
            'expires_at' => 'datetime',
            'grace_period_ends_at' => 'datetime',
            'cancelled_at' => 'datetime',
            'auto_renew' => 'boolean',
        ];
    }

    // ─── Relationships ──────────────────────────────────────────────────────────

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tier(): BelongsTo
    {
        return $this->belongsTo(MembershipTier::class, 'membership_tier_id');
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    // ─── Helpers ────────────────────────────────────────────────────────────────

    public function isActive(): bool
    {
        return $this->status === 'active'
            && $this->expires_at !== null
            && $this->expires_at->isFuture();
    }

    public function isInGracePeriod(): bool
    {
        return $this->status === 'grace'
            && $this->grace_period_ends_at !== null
            && $this->grace_period_ends_at->isFuture();
    }
}
