<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\CertificationCatalog;
use App\Models\Course;
use App\Models\Page;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SearchController extends Controller
{
    private const MIN_QUERY_LENGTH = 2;
    private const SUGGEST_LIMIT    = 8;
    private const PER_TYPE_LIMIT   = 30;

    // ─── Public actions ──────────────────────────────────────────────────────────

    public function index(Request $request): View
    {
        $q    = trim($request->input('q', ''));
        $type = trim($request->input('type', 'all'));

        [$results, $counts] = strlen($q) >= self::MIN_QUERY_LENGTH
            ? $this->search($q, $type, self::PER_TYPE_LIMIT)
            : [collect(), $this->emptyCounts()];

        return view('search.index', compact('q', 'type', 'results', 'counts'));
    }

    /**
     * Lightweight autocomplete endpoint — returns up to SUGGEST_LIMIT items as JSON.
     * Deliberately searches fewer columns and a lower row limit for speed.
     */
    public function suggest(Request $request): JsonResponse
    {
        $q = trim($request->input('q', ''));

        if (strlen($q) < self::MIN_QUERY_LENGTH) {
            return response()->json([]);
        }

        [$results] = $this->search($q, 'all', self::SUGGEST_LIMIT);

        return response()->json(
            $results->take(self::SUGGEST_LIMIT)->map(fn (array $r) => [
                'title' => $r['title'],
                'url'   => $r['url'],
                'type'  => $r['type'],
                'badge' => $r['badge'],
            ])->values()
        );
    }

    // ─── Core search logic ────────────────────────────────────────────────────────

    /**
     * Runs all model queries and returns [Collection $results, array $counts].
     * Results are ordered: certifications first (most relevant), then pages,
     * courses, posts, products.
     */
    private function search(string $q, string $type, int $limit): array
    {
        $like = '%' . $q . '%';

        $certs    = $this->searchCertifications($like, $limit);
        $pages    = $this->searchPages($like, $limit);
        $courses  = $this->searchCourses($like, $limit);
        $posts    = $this->searchPosts($like, $limit);
        $products = $this->searchProducts($like, $limit);

        $counts = [
            'all'           => 0,
            'certification' => $certs->count(),
            'page'          => $pages->count(),
            'course'        => $courses->count(),
            'post'          => $posts->count(),
            'product'       => $products->count(),
        ];
        $counts['all'] = $counts['certification'] + $counts['page']
                       + $counts['course']         + $counts['post']
                       + $counts['product'];

        $all = $certs->concat($pages)->concat($courses)->concat($posts)->concat($products);

        $results = $type !== 'all'
            ? $all->filter(fn (array $r) => $r['type'] === $type)->values()
            : $all;

        return [$results, $counts];
    }

    // ─── Per-model queries ────────────────────────────────────────────────────────

    private function searchCertifications(string $like, int $limit): Collection
    {
        return CertificationCatalog::where('is_active', true)
            ->where(fn ($q) => $q
                ->where('title', 'like', $like)
                ->orWhere('acronym', 'like', $like)
                ->orWhere('description', 'like', $like)
            )
            ->orderBy('sort_order')
            ->orderBy('title')
            ->limit($limit)
            ->get()
            ->map(fn (CertificationCatalog $c) => [
                'type'    => 'certification',
                'title'   => $c->title,
                'meta'    => $c->acronym ?: null,
                'excerpt' => $c->description ? Str::limit(strip_tags($c->description), 160) : null,
                'url'     => $this->u($c->slug),
                'badge'   => $c->credential_type ? ucfirst($c->credential_type) : 'Certification',
                'color'   => 'blue',
            ]);
    }

    private function searchPages(string $like, int $limit): Collection
    {
        return Page::where('is_published', true)
            ->whereNull('membership_tier_id')     // exclude members-only pages
            ->where(fn ($q) => $q
                ->where('title', 'like', $like)
                ->orWhere('excerpt', 'like', $like)
                ->orWhere('meta_description', 'like', $like)
                ->orWhere('seo_description', 'like', $like)
            )
            ->limit($limit)
            ->get()
            ->map(fn (Page $p) => [
                'type'    => 'page',
                'title'   => $p->title,
                'meta'    => null,
                'excerpt' => $p->excerpt
                    ?: Str::limit(strip_tags((string) ($p->meta_description ?: $p->seo_description)), 160),
                'url'     => $this->u($p->slug),
                'badge'   => 'Resource',
                'color'   => 'gray',
            ]);
    }

    private function searchCourses(string $like, int $limit): Collection
    {
        return Course::where('is_published', true)
            ->where(fn ($q) => $q
                ->where('title', 'like', $like)
                ->orWhere('description', 'like', $like)
            )
            ->limit($limit)
            ->get()
            ->map(fn (Course $c) => [
                'type'    => 'course',
                'title'   => $c->title,
                'meta'    => $c->level ?: ($c->delivery_format ?: null),
                'excerpt' => $c->description ? Str::limit(strip_tags($c->description), 160) : null,
                'url'     => $this->u('all-courses'),
                'badge'   => 'Course',
                'color'   => 'orange',
            ]);
    }

    private function searchPosts(string $like, int $limit): Collection
    {
        return Post::where('status', 'published')
            ->where('published_at', '<=', now())
            ->where(fn ($q) => $q
                ->where('title', 'like', $like)
                ->orWhere('excerpt', 'like', $like)
            )
            ->orderByDesc('published_at')
            ->limit($limit)
            ->get()
            ->map(fn (Post $p) => [
                'type'    => 'post',
                'title'   => $p->title,
                'meta'    => $p->published_at?->format('M j, Y'),
                'excerpt' => $p->excerpt ? Str::limit(strip_tags($p->excerpt), 160) : null,
                'url'     => $this->u($p->slug),
                'badge'   => $p->type === 'news' ? 'News' : 'Article',
                'color'   => 'green',
            ]);
    }

    private function searchProducts(string $like, int $limit): Collection
    {
        return Product::where('is_active', true)
            ->where(fn ($q) => $q
                ->where('name', 'like', $like)
                ->orWhere('description', 'like', $like)
            )
            ->limit($limit)
            ->get()
            ->map(fn (Product $p) => [
                'type'    => 'product',
                'title'   => $p->name,
                'meta'    => $p->category ?: null,
                'excerpt' => $p->description ? Str::limit(strip_tags($p->description), 160) : null,
                'url'     => $this->u('online-courses'),
                'badge'   => 'Store',
                'color'   => 'purple',
            ]);
    }

    // ─── Helpers ─────────────────────────────────────────────────────────────────

    /** Builds an absolute URL with a trailing slash, trimming stray whitespace. */
    private function u(string $path): string
    {
        return rtrim(url(trim($path)), '/') . '/';
    }

    private function emptyCounts(): array
    {
        return ['all' => 0, 'certification' => 0, 'page' => 0, 'course' => 0, 'post' => 0, 'product' => 0];
    }
}
