<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MigrationFlag extends Model
{
    protected $table = 'migration_flags';

    protected $fillable = [
        'importer',
        'source_table',
        'source_id',
        'field_name',
        'original_value',
        'flag_reason',
        'resolved',
    ];

    protected function casts(): array
    {
        return [
            'resolved' => 'boolean',
        ];
    }
}
