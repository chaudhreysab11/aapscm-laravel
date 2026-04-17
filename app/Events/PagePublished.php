<?php

declare(strict_types=1);

namespace App\Events;

use App\Models\Page;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PagePublished
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public readonly Page $page,
    ) {}
}
