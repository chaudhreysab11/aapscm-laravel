<?php

declare(strict_types=1);

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditOrder extends EditRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('downloadInvoicePdf')
                ->label('Download Invoice PDF')
                ->icon('heroicon-o-arrow-down-tray')
                ->url(fn (): string => route('order.invoice.pdf', ['order' => $this->record]))
                ->openUrlInNewTab()
                ->visible(fn (): bool => $this->record->payment_status === 'paid' && $this->record->status === 'completed'),
        ];
    }

    protected function getFormActions(): array
    {
        return [];
    }
}