<?php

declare(strict_types=1);

namespace App\Filament\Resources\CorporateMembershipApplicationResource\Pages;

use App\Filament\Resources\CorporateMembershipApplicationResource;
use App\Filament\Resources\Support\EditSubmissionRecord;

class EditCorporateMembershipApplication extends EditSubmissionRecord
{
    protected static string $resource = CorporateMembershipApplicationResource::class;
}