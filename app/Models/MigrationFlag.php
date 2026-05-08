<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MigrationFlag extends Model
{
    protected $table = 'migration_flags';

    protected $fillable = [
        'importer',
        'source_table',
        'source_file',
        'source_id',
        'source_row_number',
        'source_key',
        'severity',
        'field_name',
        'original_value',
        'flag_reason',
        'raw_payload',
        'resolved',
        'resolution_notes',
        'resolved_at',
        'resolved_by',
    ];

    protected function casts(): array
    {
        return [
            'raw_payload' => 'array',
            'resolved' => 'boolean',
            'resolved_at' => 'datetime',
        ];
    }
}
