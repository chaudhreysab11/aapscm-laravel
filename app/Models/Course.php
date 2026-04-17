<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'delivery_format',
        'description',
        'content',
        'level',
        'duration_hours',
        'location',
        'starts_at',
        'ends_at',
        'max_seats',
        'enrolled_count',
        'certification_catalog_id',
        'is_published',
        'thumbnail',
        'source_id',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'starts_at' => 'datetime',
            'ends_at' => 'datetime',
        ];
    }

    // ─── Relationships ──────────────────────────────────────────────────────────

    public function certificationCatalog(): BelongsTo
    {
        return $this->belongsTo(CertificationCatalog::class);
    }

    public function enrollments(): HasMany
    {
        return $this->hasMany(CourseEnrollment::class);
    }

    // ─── Helpers ────────────────────────────────────────────────────────────────

    public function hasAvailableSeats(): bool
    {
        if ($this->max_seats === null) {
            return true;
        }

        return $this->enrolled_count < $this->max_seats;
    }
}
