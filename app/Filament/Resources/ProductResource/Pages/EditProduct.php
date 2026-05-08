<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    private mixed $publicPrice = null;

    private string $publicPriceCurrency = 'USD';

    private bool $publicPriceIsActive = true;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['public_price'] = $this->record->publicPrice?->price;
        $data['public_price_currency'] = $this->record->publicPrice?->currency ?? 'USD';
        $data['public_price_is_active'] = $this->record->publicPrice?->is_active ?? true;

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->publicPrice = $data['public_price'] ?? null;
        $this->publicPriceCurrency = (string) ($data['public_price_currency'] ?? 'USD');
        $this->publicPriceIsActive = (bool) ($data['public_price_is_active'] ?? true);
        unset($data['public_price']);
        unset($data['public_price_currency']);
        unset($data['public_price_is_active']);

        return $data;
    }

    protected function afterSave(): void
    {
        ProductResource::persistPublicPrice($this->record, $this->publicPrice, $this->publicPriceCurrency, $this->publicPriceIsActive);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
