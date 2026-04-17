<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PduRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'certification_awarded_id',
        'pdu_credits_requested',
        'status',
        'activity_description',
        'supporting_document',
        'reviewed_at',
        'reviewed_by',
        'reviewer_notes',
    ];

    protected function casts(): array
    {
        return [
            'reviewed_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function certificationAwarded(): BelongsTo
    {
        return $this->belongsTo(CertificationAwarded::class, 'certification_awarded_id');
    }

    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }
}
