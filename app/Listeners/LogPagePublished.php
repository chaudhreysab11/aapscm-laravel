<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\PagePublished;

class LogPagePublished
{
    public function handle(PagePublished $event): void
    {
        activity()
            ->on($event->page)
            ->log('published');
    }
}
