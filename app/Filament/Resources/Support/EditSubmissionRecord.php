<?php

declare(strict_types=1);

namespace App\Filament\Resources\Support;

use Filament\Resources\Pages\EditRecord;

abstract class EditSubmissionRecord extends EditRecord
{
    protected function getHeaderActions(): array
    {
        return [];
    }
}