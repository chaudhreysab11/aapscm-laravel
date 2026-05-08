<?php

declare(strict_types=1);

namespace App\Filament\Resources\PdesCertificateRequestResource\Pages;

use App\Filament\Resources\PdesCertificateRequestResource;
use App\Filament\Resources\Support\EditSubmissionRecord;

class EditPdesCertificateRequest extends EditSubmissionRecord
{
    protected static string $resource = PdesCertificateRequestResource::class;
}