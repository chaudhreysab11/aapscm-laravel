<?php

declare(strict_types=1);

namespace App\Filament\Resources\FellowMembershipApplicationResource\Pages;

use App\Filament\Resources\FellowMembershipApplicationResource;
use App\Filament\Resources\Support\ListSubmissionRecords;

class ListFellowMembershipApplications extends ListSubmissionRecords
{
    protected static string $resource = FellowMembershipApplicationResource::class;
}