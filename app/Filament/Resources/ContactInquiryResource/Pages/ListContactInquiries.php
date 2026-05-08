<?php

declare(strict_types=1);

namespace App\Filament\Resources\ContactInquiryResource\Pages;

use App\Filament\Resources\ContactInquiryResource;
use App\Filament\Resources\Support\ListSubmissionRecords;

class ListContactInquiries extends ListSubmissionRecords
{
    protected static string $resource = ContactInquiryResource::class;
}