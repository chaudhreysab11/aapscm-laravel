<?php

declare(strict_types=1);

use App\Http\Controllers\CmsPageController;
use Illuminate\Support\Facades\Route;

/*
 * CMS catch-all route — MUST be registered last so it does not shadow
 * named module routes (dashboard, api, admin, etc.).
 */
Route::get('/{slug}/', CmsPageController::class)->name('cms.page');
