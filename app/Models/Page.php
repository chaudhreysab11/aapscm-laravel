<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'blocks',
        'page_data',
        'excerpt',
        'status',
        'template',
        'meta_title',
        'meta_description',
        'seo_title',
        'seo_description',
        'seo_canonical',
        'show_in_nav',
        'source_id',
        'is_published',
        'sort_order',
        'parent_id',
        'membership_tier_id',
    ];

    protected function casts(): array
    {
        return [
            'show_in_nav' => 'boolean',
            'is_published' => 'boolean',
            'blocks' => 'array',
            'page_data' => 'array',
        ];
    }

    // -------------------------------------------------------------------------
    // Relations
    // -------------------------------------------------------------------------

    public function seoMeta(): MorphOne
    {
        return $this->morphOne(SeoMeta::class, 'seoable');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Page::class, 'parent_id');
    }

    public function membershipTier(): BelongsTo
    {
        return $this->belongsTo(MembershipTier::class);
    }

    // -------------------------------------------------------------------------
    // Scopes
    // -------------------------------------------------------------------------

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function scopeNavVisible(Builder $query): Builder
    {
        return $query->where('show_in_nav', true);
    }

    public function scopeByTemplate(Builder $query, string $template): Builder
    {
        return $query->where('template', $template);
    }

    // -------------------------------------------------------------------------
    // Accessors
    // -------------------------------------------------------------------------

    public function getEffectiveSeoTitleAttribute(): string
    {
        /** @var SeoMeta|null $seoMeta */
        $seoMeta = $this->seoMeta;

        // @phpstan-ignore nullsafe.neverNull
        return $seoMeta?->seo_title
            ?? $this->seo_title
            ?? $this->title;
    }

    public function getEffectiveSeoDescriptionAttribute(): string
    {
        /** @var SeoMeta|null $seoMeta */
        $seoMeta = $this->seoMeta;

        // @phpstan-ignore nullsafe.neverNull
        return $seoMeta?->seo_description
            ?? $this->seo_description
            ?? $this->meta_description
            ?? '';
    }

    // -------------------------------------------------------------------------
    // Legacy helper
    // -------------------------------------------------------------------------

    public function isPublished(): bool
    {
        return (bool) $this->is_published;
    }
}
