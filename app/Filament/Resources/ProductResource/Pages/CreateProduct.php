<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    private mixed $publicPrice = null;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->publicPrice = $data['public_price'] ?? null;
        unset($data['public_price']);

        return $data;
    }

    protected function afterCreate(): void
    {
        ProductResource::persistPublicPrice($this->record, $this->publicPrice);
    }
}
