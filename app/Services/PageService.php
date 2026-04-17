<?php

namespace App\Services;

use App\Models\Page;
use App\Repositories\Contracts\PageRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class PageService
{
    public function __construct(private PageRepositoryInterface $pageRepository) {}

    public function getAllPages(): Collection
    {
        return $this->pageRepository->all();
    }

    public function getPublishedPages(): Collection
    {
        return $this->pageRepository->findPublished();
    }

    public function findPage(int $id): ?Page
    {
        /** @var Page|null */
        return $this->pageRepository->find($id);
    }

    public function findBySlug(string $slug): ?Page
    {
        return $this->pageRepository->findBySlug($slug);
    }

    public function createPage(array $data): Page
    {
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        /** @var Page */
        return $this->pageRepository->create($data);
    }

    public function updatePage(int $id, array $data): bool
    {
        return $this->pageRepository->update($id, $data);
    }

    public function deletePage(int $id): bool
    {
        return $this->pageRepository->delete($id);
    }
}
