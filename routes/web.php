<?php

use App\Http\Controllers\Admin\PageBuilderController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\CmsPageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => app(CmsPageController::class)('home'))->name('home');

// ── Certification Catalog (Module 2) ─────────────────────────────────────────
// Both routes are fully public. The {certification} parameter is resolved via
// route model binding on the slug column (registered in AppServiceProvider).
// Inactive and soft-deleted certifications resolve to 404 via scopeActive.
Route::get('/certifications-for-professionals', [CertificationController::class, 'index'])
    ->name('certifications.index');
Route::get('/certification/{certification}', [CertificationController::class, 'show'])
    ->name('certifications.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ── Visual Page Builder (GrapesJS) ───────────────────────────────────────────
// Uses Filament's own Authenticate middleware so it shares the same auth
// session as the Filament admin panel (no redirect loop with guest middleware).
// EnforceTrailingSlash excludes /cms-builder, so no 301 redirect on the path.
Route::middleware([\Filament\Http\Middleware\Authenticate::class])
    ->prefix('cms-builder')
    ->name('builder.')
    ->group(function () {
        Route::get('/{page}', [PageBuilderController::class, 'edit'])->name('edit');
        Route::post('/{page}', [PageBuilderController::class, 'save'])->name('save');
    });

require __DIR__ . '/auth.php';
