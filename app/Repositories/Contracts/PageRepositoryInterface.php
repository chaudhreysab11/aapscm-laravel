<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use App\Models\Page;
use Illuminate\Database\Eloquent\Collection;

interface PageRepositoryInterface extends RepositoryInterface
{
    public function findBySlug(string $slug): ?Page;

    public function findPublished(): Collection;

    public function findNavTree(): Collection;

    public function findChildren(int $parentId): Collection;

    public function findById(int $id): ?Page;
}
