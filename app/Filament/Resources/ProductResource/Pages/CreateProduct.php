<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    private mixed $publicPrice = null;

    private string $publicPriceCurrency = 'USD';

    private bool $publicPriceIsActive = true;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->publicPrice = $data['public_price'] ?? null;
        $this->publicPriceCurrency = (string) ($data['public_price_currency'] ?? 'USD');
        $this->publicPriceIsActive = (bool) ($data['public_price_is_active'] ?? true);
        unset($data['public_price']);
        unset($data['public_price_currency']);
        unset($data['public_price_is_active']);

        return $data;
    }

    protected function afterCreate(): void
    {
        ProductResource::persistPublicPrice($this->record, $this->publicPrice, $this->publicPriceCurrency, $this->publicPriceIsActive);
    }
}
