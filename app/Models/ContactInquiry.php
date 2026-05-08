<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInquiry extends Model
{
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'status',
    ];
}
