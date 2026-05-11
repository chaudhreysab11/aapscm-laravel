<?php

declare(strict_types=1);

namespace App\Providers;

use App\Contracts\PaymentGatewayContract;
use App\Events\OrderPaid;
use App\Events\PagePublished;
use App\Events\PageUnpublished;
use App\Listeners\ActivateMembershipOnOrderPaid;
use App\Listeners\EnrollUserInCourseOnOrderPaid;
use App\Listeners\LogPagePublished;
use App\Listeners\LogPageUnpublished;
use App\Models\Order;
use App\Models\Page;
use App\Models\User;
use App\Observers\PageObserver;
use App\Observers\UserObserver;
use App\Policies\OrderPolicy;
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
use App\Support\Security\PhpCompatibleEncrypter;
use Illuminate\Encryption\MissingAppKeyException;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

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

        $this->registerPhpCompatibleEncrypter();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Page::observe(PageObserver::class);
        User::observe(UserObserver::class);

        Gate::policy(Page::class, PagePolicy::class);
        Gate::policy(Order::class, OrderPolicy::class);

        Event::listen(PagePublished::class, [LogPagePublished::class, 'handle']);
        Event::listen(PageUnpublished::class, [LogPageUnpublished::class, 'handle']);

        Event::listen(OrderPaid::class, [ActivateMembershipOnOrderPaid::class, 'handle']);
        Event::listen(OrderPaid::class, [EnrollUserInCourseOnOrderPaid::class, 'handle']);
    }

    private function registerPhpCompatibleEncrypter(): void
    {
        $this->app->forgetInstance('encrypter');

        $this->app->singleton('encrypter', function ($app): PhpCompatibleEncrypter {
            $config = $app->make('config')->get('app');

            return (new PhpCompatibleEncrypter($this->parseEncryptionKey($config), $config['cipher']))
                ->previousKeys(array_map(
                    fn (string $key): string => $this->parseEncryptionKey(['key' => $key]),
                    $config['previous_keys'] ?? [],
                ));
        });
    }

    /** @param array<string, mixed> $config */
    private function parseEncryptionKey(array $config): string
    {
        $key = $config['key'] ?? null;

        if (empty($key)) {
            throw new MissingAppKeyException;
        }

        if (Str::startsWith($key, $prefix = 'base64:')) {
            return base64_decode(Str::after($key, $prefix));
        }

        return (string) $key;
    }
}
