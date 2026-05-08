<?php

declare(strict_types=1);

namespace App\Filament\Resources\CorporateMembershipApplicationResource\Pages;

use App\Filament\Resources\CorporateMembershipApplicationResource;
use App\Filament\Resources\Support\ListSubmissionRecords;

class ListCorporateMembershipApplications extends ListSubmissionRecords
{
    protected static string $resource = CorporateMembershipApplicationResource::class;
}