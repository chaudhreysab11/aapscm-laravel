<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    private mixed $publicPrice = null;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['public_price'] = $this->record->publicPrice?->price;

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->publicPrice = $data['public_price'] ?? null;
        unset($data['public_price']);

        return $data;
    }

    protected function afterSave(): void
    {
        ProductResource::persistPublicPrice($this->record, $this->publicPrice);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
