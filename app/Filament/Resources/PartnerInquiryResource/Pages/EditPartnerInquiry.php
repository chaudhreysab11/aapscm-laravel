<?php

declare(strict_types=1);

namespace App\Filament\Resources\PartnerInquiryResource\Pages;

use App\Filament\Resources\PartnerInquiryResource;
use App\Filament\Resources\Support\EditSubmissionRecord;

class EditPartnerInquiry extends EditSubmissionRecord
{
    protected static string $resource = PartnerInquiryResource::class;
}