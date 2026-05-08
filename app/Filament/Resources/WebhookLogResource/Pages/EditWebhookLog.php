<?php

declare(strict_types=1);

namespace App\Filament\Resources\WebhookLogResource\Pages;

use App\Filament\Resources\WebhookLogResource;
use Filament\Resources\Pages\EditRecord;

class EditWebhookLog extends EditRecord
{
    protected static string $resource = WebhookLogResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function getFormActions(): array
    {
        return [];
    }
}