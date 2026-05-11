<?php

declare(strict_types=1);

use Database\Seeders\Support\UrlRewriter;

it('adds trailing slashes to extensionless internal URLs without fragments', function () {
    expect(UrlRewriter::local('https://aapscm.org/about-us'))->toBe('/about-us/');
});

it('does not add a trailing slash before a URL fragment', function () {
    expect(UrlRewriter::local('https://aapscm.org/popup#elementor-action'))->toBe('/popup#elementor-action');
});
