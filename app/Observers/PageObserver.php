<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;

class PageObserver
{
    public function created(Page $page): void
    {
        $this->log($page, 'created');
    }

    public function updated(Page $page): void
    {
        $this->log($page, 'updated');
    }

    public function deleted(Page $page): void
    {
        $this->log($page, 'deleted');
    }

    private function log(Page $page, string $event): void
    {
        $user = auth()->user();
        $logger = activity()
            ->performedOn($page)
            ->withProperties(['event' => $event]);

        if ($user instanceof Model) {
            $logger = $logger->causedBy($user);
        }

        $logger->log($event);
    }
}
