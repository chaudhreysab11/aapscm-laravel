<?php

declare(strict_types=1);

namespace App\Filament\Resources\CvSubmissionResource\Pages;

use App\Filament\Resources\CvSubmissionResource;
use App\Filament\Resources\Support\EditSubmissionRecord;

class EditCvSubmission extends EditSubmissionRecord
{
    protected static string $resource = CvSubmissionResource::class;
}