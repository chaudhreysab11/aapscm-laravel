<?php

declare(strict_types=1);

namespace App\Filament\Resources\HotlineReportResource\Pages;

use App\Filament\Resources\HotlineReportResource;
use App\Filament\Resources\Support\ListSubmissionRecords;

class ListHotlineReports extends ListSubmissionRecords
{
    protected static string $resource = HotlineReportResource::class;
}