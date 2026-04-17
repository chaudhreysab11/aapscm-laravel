<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnforceTrailingSlash
{
    private const EXCLUDED_PREFIXES = [
        '/api',
        '/admin',
        '/webhook',
        '/storage',
        '/livewire',
        // Visual page builder — admin-only tool, no SEO trailing-slash needed
        '/cms-builder',
        // Auth & member portal routes — no trailing slash needed
        '/login',
        '/logout',
        '/register',
        '/dashboard',
        '/profile',
        '/account',
        '/forgot-password',
        '/reset-password',
        '/verify-email',
        '/confirm-password',
        '/email',
        '/password',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        $path = $request->getPathInfo();

        if ($path === '/') {
            return $next($request);
        }

        // Skip paths with a file extension (e.g. /favicon.ico, /robots.txt)
        if (str_contains(basename($path), '.')) {
            return $next($request);
        }

        // Skip excluded prefixes
        foreach (self::EXCLUDED_PREFIXES as $prefix) {
            if (str_starts_with($path, $prefix)) {
                return $next($request);
            }
        }

        if (! str_ends_with($path, '/')) {
            $url = $path . '/';
            $qs = $request->getQueryString();
            if ($qs !== null && $qs !== '') {
                $url .= '?' . $qs;
            }

            return redirect($url, 301);
        }

        // Path already has a trailing slash.
        // Strip it internally before routing to prevent Symfony's canonical-URL
        // redirect (/path/ → /path 301), which would otherwise cause an infinite
        // redirect loop with the "add trailing slash" branch above.
        // HandleRedirects runs before this middleware and has already seen the
        // trailing-slash path, so redirect-map lookups remain correct.
        $strippedPath = rtrim($path, '/');
        $qs = $request->getQueryString();
        $newUri = $strippedPath . ($qs ? '?' . $qs : '');

        // Mutate the server bag on the current request so Symfony's route
        // matcher sees the slash-free path.  We clear the cached pathInfo /
        // requestUri properties so they are recomputed from the new REQUEST_URI.
        $request->server->set('REQUEST_URI', $newUri);
        $request->server->set('PATH_INFO', $strippedPath);

        // Clear Symfony's internal path-info cache via reflection.
        static $pathRef = null;
        static $uriRef = null;
        if ($pathRef === null) {
            $pathRef = new \ReflectionProperty(\Symfony\Component\HttpFoundation\Request::class, 'pathInfo');
            $uriRef = new \ReflectionProperty(\Symfony\Component\HttpFoundation\Request::class, 'requestUri');
        }
        $pathRef->setValue($request, null);
        $uriRef->setValue($request, null);

        return $next($request);
    }
}
