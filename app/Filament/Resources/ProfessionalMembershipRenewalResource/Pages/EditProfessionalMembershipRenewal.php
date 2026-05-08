<?php

declare(strict_types=1);

namespace App\Filament\Resources\ProfessionalMembershipRenewalResource\Pages;

use App\Filament\Resources\ProfessionalMembershipRenewalResource;
use App\Filament\Resources\Support\EditSubmissionRecord;

class EditProfessionalMembershipRenewal extends EditSubmissionRecord
{
    protected static string $resource = ProfessionalMembershipRenewalResource::class;
}