<?php

declare(strict_types=1);

namespace App\Filament\Resources\CertificationResource\Pages;

use App\Filament\Resources\CertificationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditCertification extends EditRecord
{
    protected static string $resource = CertificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            RestoreAction::make(),
        ];
    }

    protected function beforeSave(): void
    {
        // Warn when slug is changed — a slug change breaks the live URL and
        // requires a 301 redirect to be in place before deploying.
        if ($this->record->isDirty('slug')) {
            Notification::make()
                ->warning()
                ->title('Slug changed')
                ->body('Changing a certification slug breaks the live URL. Ensure a 301 redirect is configured before this change reaches production. Notify the SEO Agent.')
                ->persistent()
                ->send();
        }
    }
}
