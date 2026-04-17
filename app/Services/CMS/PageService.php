<?php

declare(strict_types=1);

namespace App\Services\CMS;

use App\Events\PagePublished;
use App\Events\PageUnpublished;
use App\Exceptions\PageNotFoundException;
use App\Models\Page;
use App\Repositories\Contracts\PageRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class PageService
{
    public function __construct(
        private readonly PageRepositoryInterface $repository,
    ) {}

    /**
     * @throws PageNotFoundException
     */
    public function getPublishedPage(string $slug): Page
    {
        $page = $this->repository->findBySlug($slug);

        if ($page === null || ! $page->is_published) {
            throw PageNotFoundException::forSlug($slug);
        }

        return $page;
    }

    /**
     * @throws PageNotFoundException
     */
    public function getPageWithSeo(string $slug): Page
    {
        $page = $this->repository->findBySlug($slug);

        if ($page === null || ! $page->is_published) {
            throw PageNotFoundException::forSlug($slug);
        }

        $page->load('seoMeta');

        return $page;
    }

    public function getNavigationTree(): Collection
    {
        return $this->repository->findNavTree();
    }

    public function publishPage(Page $page): void
    {
        $page->is_published = true;
        $page->save();

        event(new PagePublished($page));

        $this->auditLog($page, 'published');
    }

    public function unpublishPage(Page $page): void
    {
        $page->is_published = false;
        $page->save();

        event(new PageUnpublished($page));

        $this->auditLog($page, 'unpublished');
    }

    private function auditLog(Page $page, string $action): void
    {
        $user = auth()->user();
        $logger = activity()->performedOn($page);

        if ($user instanceof Model) {
            $logger = $logger->causedBy($user);
        }

        $logger->log($action);
    }
}
