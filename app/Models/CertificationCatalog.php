<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CertificationCatalog extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'certification_catalog';

    protected $fillable = [
        'title',
        'acronym',
        'certifying_body',
        'slug',
        'credential_type',
        'sort_order',
        'description',
        'eligibility_requirements',
        'exam_details',
        'pdu_credits',
        'badge_image',
        'og_image',
        'is_active',
        'meta_title',
        'meta_description',
        'canonical_url',
        'source_id',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'pdu_credits' => 'integer',
            'sort_order' => 'integer',
        ];
    }

    // ─── Scopes ─────────────────────────────────────────────────────────────────

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('title');
    }

    public function scopeByCredentialType(Builder $query, string $type): Builder
    {
        return $query->where('credential_type', $type);
    }

    // ─── Relationships ──────────────────────────────────────────────────────────

    public function awardedCertifications(): HasMany
    {
        return $this->hasMany(CertificationAwarded::class);
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    public function examBookings(): HasMany
    {
        return $this->hasMany(ExamBooking::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function seoMeta(): ?SeoMeta
    {
        return $this->morphOne(SeoMeta::class, 'seoable')->getResults();
    }
}
