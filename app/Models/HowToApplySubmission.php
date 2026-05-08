<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HowToApplySubmission extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'cv_path',
        'message',
        'status',
    ];
}
