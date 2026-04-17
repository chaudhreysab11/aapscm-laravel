<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Override to preserve trailing slashes in test URLs.
     *
     * Laravel's default implementation calls url()->to() which strips trailing
     * slashes via trim().  Our EnforceTrailingSlash middleware and SEO URLs
     * depend on trailing slashes being intact when the request reaches the
     * middleware stack.
     */
    protected function prepareUrlForRequest($uri): string
    {
        if (str_starts_with($uri, '/')) {
            return rtrim($this->app->make('url')->to('/'), '/') . $uri;
        }

        return $uri;
    }

    /**
     * Disable Vite manifest check for all tests — the test environment does
     * not run `npm run build`, so @vite() directives would otherwise throw
     * a 500 when a view is rendered.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite();
    }
}
