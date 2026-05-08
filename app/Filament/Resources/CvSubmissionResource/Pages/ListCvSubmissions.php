<?php

declare(strict_types=1);

namespace App\Filament\Resources\CvSubmissionResource\Pages;

use App\Filament\Resources\CvSubmissionResource;
use App\Filament\Resources\Support\ListSubmissionRecords;

class ListCvSubmissions extends ListSubmissionRecords
{
    protected static string $resource = CvSubmissionResource::class;
}