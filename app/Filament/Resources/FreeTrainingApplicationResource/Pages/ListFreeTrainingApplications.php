<?php

declare(strict_types=1);

namespace App\Filament\Resources\FreeTrainingApplicationResource\Pages;

use App\Filament\Resources\FreeTrainingApplicationResource;
use App\Filament\Resources\Support\ListSubmissionRecords;

class ListFreeTrainingApplications extends ListSubmissionRecords
{
    protected static string $resource = FreeTrainingApplicationResource::class;
}