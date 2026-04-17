<?php

declare(strict_types=1);

namespace App\Providers;

use App\Contracts\PaymentGatewayContract;
use App\Events\PagePublished;
use App\Events\PageUnpublished;
use App\Listeners\LogPagePublished;
use App\Listeners\LogPageUnpublished;
use App\Models\CertificationCatalog;
use App\Models\Page;
use App\Observers\PageObserver;
use Illuminate\Support\Facades\Route;
use App\Policies\PagePolicy;
use App\Repositories\Contracts\PageRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\PageRepository;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;
use App\Services\MembershipService;
use App\Services\Payment\StripeGateway;
use App\Services\PricingService;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(PageRepositoryInterface::class, PageRepository::class);

        $this->app->singleton(PaymentGatewayContract::class, StripeGateway::class);
        $this->app->singleton(MembershipService::class);
        $this->app->singleton(PricingService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Page::observe(PageObserver::class);

        Gate::policy(Page::class, PagePolicy::class);

        // Resolve {certification} route parameter by slug (not id).
        // Active scope is applied so inactive/soft-deleted certs return 404.
        Route::bind('certification', fn (string $slug) =>
            CertificationCatalog::active()->where('slug', $slug)->firstOrFail()
        );

        Event::listen(PagePublished::class, [LogPagePublished::class, 'handle']);
        Event::listen(PageUnpublished::class, [LogPageUnpublished::class, 'handle']);
    }
}
