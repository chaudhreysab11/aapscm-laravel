<?php

declare(strict_types=1);

namespace App\Filament\Resources\PartnerInquiryResource\Pages;

use App\Filament\Resources\PartnerInquiryResource;
use App\Filament\Resources\Support\ListSubmissionRecords;

class ListPartnerInquiries extends ListSubmissionRecords
{
    protected static string $resource = PartnerInquiryResource::class;
}