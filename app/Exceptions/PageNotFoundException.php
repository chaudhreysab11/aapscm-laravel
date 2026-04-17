<?php

declare(strict_types=1);

namespace App\Exceptions;

use App\Models\Page;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PageNotFoundException extends ModelNotFoundException
{
    public static function forSlug(string $slug): self
    {
        $exception = new self("Page not found for slug: [{$slug}]");
        $exception->setModel(Page::class);

        return $exception;
    }
}
