<?php

declare(strict_types=1);

namespace App\Filament\Resources\PdesCertificateRequestResource\Pages;

use App\Filament\Resources\PdesCertificateRequestResource;
use App\Filament\Resources\Support\ListSubmissionRecords;

class ListPdesCertificateRequests extends ListSubmissionRecords
{
    protected static string $resource = PdesCertificateRequestResource::class;
}