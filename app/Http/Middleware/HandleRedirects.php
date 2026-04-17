<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class HandleRedirects
{
    public function handle(Request $request, Closure $next): Response
    {
        $path = $request->getPathInfo();

        /** @var array<string, array{id: int, from_path: string, to_path: string, http_code: int}> $redirectMap */
        $redirectMap = Cache::remember('redirect_map', 300, function (): array {
            return DB::table('redirects')
                ->where('is_active', true)
                ->get(['id', 'from_path', 'to_path', 'http_code'])
                ->mapWithKeys(function (object $row): array {
                    return [$row->from_path => (array) $row];
                })
                ->all();
        });

        if (array_key_exists($path, $redirectMap)) {
            $redirect = $redirectMap[$path];

            DB::statement('UPDATE redirects SET hit_count = hit_count + 1 WHERE id = ?', [$redirect['id']]);

            // Bust the cache so the incremented hit_count is fresh next time
            Cache::forget('redirect_map');

            return redirect($redirect['to_path'], (int) $redirect['http_code']);
        }

        return $next($request);
    }
}
