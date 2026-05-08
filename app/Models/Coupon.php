<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'type',
        'value',
        'is_active',
        'expires_at',
        'usage_limit',
        'minimum_order_amount',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'expires_at' => 'datetime',
            'usage_limit' => 'integer',
            'value' => 'decimal:2',
            'minimum_order_amount' => 'decimal:2',
        ];
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
