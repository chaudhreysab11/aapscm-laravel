<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\PageUnpublished;

class LogPageUnpublished
{
    public function handle(PageUnpublished $event): void
    {
        activity()
            ->on($event->page)
            ->log('unpublished');
    }
}
