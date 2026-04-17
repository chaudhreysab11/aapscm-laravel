<?php

declare(strict_types=1);

namespace App\Http\Controllers\CMS;

use App\Exceptions\PageNotFoundException;
use App\Http\Controllers\Controller;
use App\Services\CMS\PageService;
use Illuminate\View\View;

class PageController extends Controller
{
    public function __construct(
        private readonly PageService $pageService,
    ) {}

    public function show(string $slug): View
    {
        try {
            $page = $this->pageService->getPageWithSeo($slug);
        } catch (PageNotFoundException) {
            abort(404);
        }

        $template = $page->template ?? 'default';
        $view = "cms.page.{$template}";

        if (! view()->exists($view)) {
            $view = 'cms.page.default';
        }

        return view($view, compact('page'));
    }
}
