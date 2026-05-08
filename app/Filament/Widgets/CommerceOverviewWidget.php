<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\WebhookLog;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CommerceOverviewWidget extends StatsOverviewWidget
{
    protected static bool $isLazy = false;

    protected static ?int $sort = 1;

    protected ?string $heading = 'Commerce Overview';

    protected ?string $description = 'Current payment and webhook workload.';

    protected function getStats(): array
    {
        $paidOrders = Order::query()->where('payment_status', 'paid')->count();
        $unpaidOrders = Order::query()->where('payment_status', 'unpaid')->count();
        $paidRevenue = (float) Order::query()->where('payment_status', 'paid')->sum('total');
        $openWebhooks = WebhookLog::query()->whereIn('status', ['received', 'failed'])->count();

        return [
            Stat::make('Paid orders', number_format($paidOrders))
                ->description('Completed payment records')
                ->color('success')
                ->icon('heroicon-o-banknotes'),
            Stat::make('Unpaid orders', number_format($unpaidOrders))
                ->description('Awaiting payment confirmation')
                ->color('warning')
                ->icon('heroicon-o-clock'),
            Stat::make('Paid revenue', '$' . number_format($paidRevenue, 2, '.', ','))
                ->description('Across paid orders only')
                ->color('info')
                ->icon('heroicon-o-currency-dollar'),
            Stat::make('Open webhook issues', number_format($openWebhooks))
                ->description('Received or failed webhook logs')
                ->color($openWebhooks > 0 ? 'danger' : 'success')
                ->icon('heroicon-o-signal'),
        ];
    }
}