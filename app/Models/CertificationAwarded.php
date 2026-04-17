<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property Carbon|null $issued_at
 * @property Carbon|null $expires_at
 * @property Carbon|null $revoked_at
 */
class CertificationAwarded extends Model
{
    use HasFactory;

    protected $table = 'certifications_awarded';

    protected $fillable = [
        'user_id',
        'certification_catalog_id',
        'certificate_number',
        'verification_token',
        'issued_at',
        'expires_at',
        'revoked_at',
        'revoke_reason',
        'status',
        'badge_url',
        'source_id',
    ];

    protected function casts(): array
    {
        return [
            'issued_at' => 'datetime',
            'expires_at' => 'datetime',
            'revoked_at' => 'datetime',
        ];
    }

    // ─── Relationships ──────────────────────────────────────────────────────────

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function catalogEntry(): BelongsTo
    {
        return $this->belongsTo(CertificationCatalog::class, 'certification_catalog_id');
    }

    // ─── Helpers ────────────────────────────────────────────────────────────────

    public function isActive(): bool
    {
        return $this->status === 'active'
            && ($this->expires_at === null || $this->expires_at->isFuture());
    }
}
