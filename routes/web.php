<?php

use App\Http\Controllers\Admin\PageBuilderController;
use App\Http\Controllers\AapscmHotlineController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactInquiryController;
use App\Http\Controllers\CorporateMembershipApplicationController;
use App\Http\Controllers\CmsPageController;
use App\Http\Controllers\FellowMembershipApplicationController;
use App\Http\Controllers\FreeTrainingApplicationController;
use App\Http\Controllers\HowToApplySubmissionController;
use App\Http\Controllers\MemberDashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PartnerInquiryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PdesCertificateRequestController;
use App\Http\Controllers\ProfessionalMembershipRenewalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResumeSubmissionController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WebhookController;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

// ── Site-wide search ─────────────────────────────────────────────────────────
// Registered before the CMS catch-all so /search is never treated as a CMS slug.
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/search/suggest', [SearchController::class, 'suggest'])
    ->name('search.suggest')
    ->middleware('throttle:60,1');   // 60 requests / minute per IP

Route::get('/', fn () => app(CmsPageController::class)('home'))->name('home');

// Certifications listing is a CMS page (seeded from live WP snapshot).
Route::get('/certifications-for-professionals', fn () => app(CmsPageController::class)('certifications-for-professionals'))
    ->name('certifications.index');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/my-account/', fn () => redirect()->route('dashboard'))->name('member.account.redirect');
    Route::get('/dashboard', [MemberDashboardController::class, 'overview'])->name('dashboard');
    Route::get('/dashboard/membership', [MemberDashboardController::class, 'membership'])->name('member.membership');
    Route::get('/dashboard/orders', [MemberDashboardController::class, 'orders'])->name('member.orders');
    Route::get('/dashboard/profile', [MemberDashboardController::class, 'profile'])->name('member.profile');
    Route::get('/dashboard/training', [MemberDashboardController::class, 'training'])->name('member.training');
});

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

// ── Post Resume (auth-gated submission; GET handled by CmsPageController) ───
Route::post('/post-resume/', [ResumeSubmissionController::class, 'store'])
    ->middleware('auth')
    ->name('post-resume.submit');

// ── Verify a Certificate (form POST handler; GET handled by CmsPageController) ─
Route::post('/verify-a-certificate/', [\App\Http\Controllers\VerifyCertificateController::class, 'lookup'])
    ->name('verify-a-certificate.lookup');

// ── Public inquiry forms ────────────────────────────────────────────────────
Route::post('/contact-us/', [ContactInquiryController::class, 'store'])
    ->name('contact-us.submit');
Route::post('/how-to-apply/', [HowToApplySubmissionController::class, 'store'])
    ->name('how-to-apply.submit');
Route::post('/aapscm-hotline/', [AapscmHotlineController::class, 'store'])
    ->name('aapscm-hotline.submit');
Route::post('/corporate-membership/', [CorporateMembershipApplicationController::class, 'store'])
    ->name('corporate-membership.submit');
Route::post('/professional-membership-renewal/', [ProfessionalMembershipRenewalController::class, 'store'])
    ->name('professional-membership-renewal.submit');
Route::post('/become-a-partner/', [PartnerInquiryController::class, 'store'])
    ->name('become-a-partner.submit');
Route::post('/request-pdes-for-certificate/', [PdesCertificateRequestController::class, 'store'])
    ->name('request-pdes.submit');

// ── Checkout & Payments ──────────────────────────────────────────────────────
// ── Checkout & Payments ───────────────────────────────────────────────────────────────────────
Route::get('/cart/', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/{product}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/coupon/', [CartController::class, 'applyCoupon'])->name('cart.coupon.apply');
Route::delete('/cart/coupon/', [CartController::class, 'removeCoupon'])->name('cart.coupon.remove');

Route::get('/checkout/', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout/', [CheckoutController::class, 'store'])->name('checkout.store');

Route::match(['get', 'post'], '/payment/{order}/start', [PaymentController::class, 'start'])->name('payment.start');
Route::get('/payment/{order}/success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment/{order}/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');

// Guest-friendly receipt. Signed URLs from PaymentController::success grant
// time-limited access; OrderPolicy handles owner / session-bound guest access.
Route::get('/order/{order}/receipt', [OrderController::class, 'receipt'])->name('order.receipt');
Route::get('/order/{order}/invoice', [OrderController::class, 'invoice'])->name('order.invoice');
Route::get('/order/{order}/invoice/pdf', [OrderController::class, 'invoicePdf'])->name('order.invoice.pdf');

// ── Payment provider webhooks (CSRF-exempt; see bootstrap/app.php) ───────────
Route::post('/webhooks/stripe', [WebhookController::class, 'stripe'])->name('webhooks.stripe');
Route::post('/webhooks/paypal', [WebhookController::class, 'paypal'])->name('webhooks.paypal');

require __DIR__ . '/auth.php';
