<?php

declare(strict_types=1);

namespace App\Filament\Resources\Support;

use Filament\Resources\Resource;
use Illuminate\Support\HtmlString;

abstract class SubmissionResource extends Resource
{
    protected static string|\UnitEnum|null $navigationGroup = 'Form Submissions';

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-inbox-stack';

    protected static function statusOptions(): array
    {
        return [
            'pending' => 'Pending',
            'reviewed' => 'Reviewed',
            'approved' => 'Approved',
            'rejected' => 'Rejected',
            'completed' => 'Completed',
        ];
    }

    protected static function statusColor(?string $state): string
    {
        return match ($state) {
            'approved', 'completed' => 'success',
            'rejected' => 'danger',
            'reviewed' => 'info',
            default => 'warning',
        };
    }

    protected static function jsonBlock(mixed $value): HtmlString
    {
        $json = json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        return new HtmlString('<pre style="white-space: pre-wrap; font-size: 12px;">' . e($json ?: '{}') . '</pre>');
    }
}