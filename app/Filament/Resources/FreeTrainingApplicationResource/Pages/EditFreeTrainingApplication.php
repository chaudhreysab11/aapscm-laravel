<?php

declare(strict_types=1);

namespace App\Filament\Resources\FreeTrainingApplicationResource\Pages;

use App\Filament\Resources\FreeTrainingApplicationResource;
use App\Filament\Resources\Support\EditSubmissionRecord;

class EditFreeTrainingApplication extends EditSubmissionRecord
{
    protected static string $resource = FreeTrainingApplicationResource::class;
}