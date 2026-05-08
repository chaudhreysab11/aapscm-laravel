<?php

declare(strict_types=1);

namespace App\Filament\Resources\ProfessionalMembershipRenewalResource\Pages;

use App\Filament\Resources\ProfessionalMembershipRenewalResource;
use App\Filament\Resources\Support\ListSubmissionRecords;

class ListProfessionalMembershipRenewals extends ListSubmissionRecords
{
    protected static string $resource = ProfessionalMembershipRenewalResource::class;
}