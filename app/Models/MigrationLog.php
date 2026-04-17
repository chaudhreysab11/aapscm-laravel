<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MigrationLog extends Model
{
    protected $table = 'migration_logs';

    protected $fillable = [
        'importer',
        'source_table',
        'source_id',
        'target_id',
        'status',
        'notes',
    ];
}
