<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'billing_email',
        'billing_name',
        'order_number',
        'status',
        'payment_method',
        'payment_intent_id',
        'payment_status',
        'currency',
        'subtotal',
        'tax',
        'discount',
        'coupon_id',
        'coupon_code',
        'coupon_type',
        'coupon_value',
        'total',
        'notes',
        'source_id',
    ];

    protected function casts(): array
    {
        return [
            'subtotal' => 'decimal:2',
            'tax' => 'decimal:2',
            'discount' => 'decimal:2',
            'coupon_value' => 'decimal:2',
            'total' => 'decimal:2',
        ];
    }

    // ─── Relationships ──────────────────────────────────────────────────────────

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function coupon(): BelongsTo
    {
        return $this->belongsTo(Coupon::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    // ─── Helpers ────────────────────────────────────────────────────────────────

    public function isPaid(): bool
    {
        return $this->payment_status === 'paid';
    }

    /**
     * Scope: orders matching a billing email (e.g. for guest order lookup
     * or attaching orphan orders when a user later registers).
     */
    public function scopeForEmail($query, string $email)
    {
        return $query->where('billing_email', $email);
    }
}
