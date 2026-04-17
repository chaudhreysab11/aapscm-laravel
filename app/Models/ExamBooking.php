<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'certification_catalog_id',
        'order_id',
        'status',
        'delivery_mode',
        'scheduled_at',
        'started_at',
        'completed_at',
        'score',
        'passed',
        'proctor_session_id',
    ];

    protected function casts(): array
    {
        return [
            'scheduled_at' => 'datetime',
            'started_at' => 'datetime',
            'completed_at' => 'datetime',
            'passed' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function certificationCatalog(): BelongsTo
    {
        return $this->belongsTo(CertificationCatalog::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
