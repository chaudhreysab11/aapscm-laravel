<?php

declare(strict_types=1);

namespace App\Filament\Resources\HowToApplySubmissionResource\Pages;

use App\Filament\Resources\HowToApplySubmissionResource;
use App\Filament\Resources\Support\ListSubmissionRecords;

class ListHowToApplySubmissions extends ListSubmissionRecords
{
    protected static string $resource = HowToApplySubmissionResource::class;
}