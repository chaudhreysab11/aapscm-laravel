<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'stock',
        'sku',
        'category',
        'type',
        'certification_catalog_id',
        'membership_tier_id',
        'is_active',
        'image',
        'source_id',
        'migration_review_status',
        'migration_notes',
        'migration_payload',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'migration_payload' => 'array',
        ];
    }

    // ─── Relationships ──────────────────────────────────────────────────────────

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function certificationCatalog(): BelongsTo
    {
        return $this->belongsTo(CertificationCatalog::class);
    }

    public function membershipTier(): BelongsTo
    {
        return $this->belongsTo(MembershipTier::class);
    }

    public function prices(): HasMany
    {
        return $this->hasMany(ProductPrice::class);
    }

    public function publicPrice(): HasOne
    {
        return $this->hasOne(ProductPrice::class)
            ->whereNull('membership_tier_id')
            ->latestOfMany();
    }

    public function isTrainingProduct(): bool
    {
        return $this->type === 'training';
    }

    public function isMembershipProduct(): bool
    {
        return $this->type === 'membership';
    }

    public function isMembershipRenewalProduct(): bool
    {
        $name = strtolower($this->name);
        $slug = strtolower($this->slug);

        return $this->isMembershipProduct()
            && (str_contains($name, 'renewal') || str_contains($slug, 'renewal'));
    }
}
