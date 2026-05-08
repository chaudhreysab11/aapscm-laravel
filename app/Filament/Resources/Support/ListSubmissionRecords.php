<?php

declare(strict_types=1);

namespace App\Filament\Resources\Support;

use Filament\Resources\Pages\ListRecords;

abstract class ListSubmissionRecords extends ListRecords
{
    protected function getHeaderActions(): array
    {
        return [];
    }
}