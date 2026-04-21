<?php

use App\Http\Controllers\Admin\PageBuilderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CmsPageController;
use App\Http\Controllers\FellowMembershipApplicationController;
use App\Http\Controllers\FreeTrainingApplicationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebhookController;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => app(CmsPageController::class)('home'))->name('home');

// Certifications listing is a CMS page (seeded from live WP snapshot).
Route::get('/certifications-for-professionals', fn () => app(CmsPageController::class)('certifications-for-professionals'))
    ->name('certifications.index');

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
Route::middleware([Authenticate::class])
    ->prefix('cms-builder')
    ->name('builder.')
    ->group(function () {
        Route::get('/{page}', [PageBuilderController::class, 'edit'])->name('edit');
        Route::post('/{page}', [PageBuilderController::class, 'save'])->name('save');
    });

// ── Free Training Application Form ───────────────────────────────────────────
Route::get('/application-form-for-free-training-in-procurement-management/', [FreeTrainingApplicationController::class, 'show'])
    ->name('free-training.form');
Route::post('/application-form-for-free-training-in-procurement-management/', [FreeTrainingApplicationController::class, 'store'])
    ->name('free-training.submit');

// ── Fellow Membership Application Form ───────────────────────────────────────
Route::get('/fellow-membership-form/', [FellowMembershipApplicationController::class, 'show'])
    ->name('fellow-membership-form.form');
Route::post('/fellow-membership-form/', [FellowMembershipApplicationController::class, 'store'])
    ->name('fellow-membership-form.submit');

// ── Checkout & Payments ──────────────────────────────────────────────────────
// ── Checkout & Payments ───────────────────────────────────────────────────────────────────────
Route::get('/cart/', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/{product}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{product}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout/', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout/', [CheckoutController::class, 'store'])->name('checkout.store');

Route::post('/payment/{order}/start', [PaymentController::class, 'start'])->name('payment.start');
Route::get('/payment/{order}/success', [PaymentController::class, 'success'])
    ->middleware('signed')
    ->name('payment.success');
Route::get('/payment/{order}/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');

// Guest-friendly receipt. Signed URLs from PaymentController::success grant
// time-limited access; OrderPolicy handles owner / session-bound guest access.
Route::get('/order/{order}/receipt', [OrderController::class, 'receipt'])->name('order.receipt');

// ── Payment provider webhooks (CSRF-exempt; see bootstrap/app.php) ───────────
Route::post('/webhooks/stripe', [WebhookController::class, 'stripe'])->name('webhooks.stripe');
Route::post('/webhooks/paypal', [WebhookController::class, 'paypal'])->name('webhooks.paypal');

require __DIR__ . '/auth.php';
