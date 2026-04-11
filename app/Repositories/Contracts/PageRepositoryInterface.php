<?php

namespace App\Repositories\Contracts;

use App\Models\Page;
use Illuminate\Database\Eloquent\Collection;

interface PageRepositoryInterface extends RepositoryInterface
{
    public function findBySlug(string $slug): ?Page;

    public function getPublished(): Collection;
}
