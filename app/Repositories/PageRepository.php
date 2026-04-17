<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Page;
use App\Repositories\Contracts\PageRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PageRepository extends BaseRepository implements PageRepositoryInterface
{
    public function __construct(Page $model)
    {
        parent::__construct($model);
    }

    public function findBySlug(string $slug): ?Page
    {
        return Page::where('slug', $slug)->first();
    }

    public function findPublished(): Collection
    {
        return Page::published()->get();
    }

    public function findNavTree(): Collection
    {
        return Page::published()
            ->navVisible()
            ->orderBy('sort_order')
            ->with('children')
            ->get();
    }

    public function findChildren(int $parentId): Collection
    {
        return Page::where('parent_id', $parentId)->orderBy('sort_order')->get();
    }

    public function findById(int $id): ?Page
    {
        return Page::find($id);
    }
}
