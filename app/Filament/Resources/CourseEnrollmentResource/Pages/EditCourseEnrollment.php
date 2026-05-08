<?php

declare(strict_types=1);

namespace App\Filament\Resources\CourseEnrollmentResource\Pages;

use App\Actions\Admin\ApplyCourseEnrollmentCorrectionAction;
use App\Filament\Resources\CourseEnrollmentResource;
use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Pages\EditRecord;

class EditCourseEnrollment extends EditRecord
{
    protected static string $resource = CourseEnrollmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('reviewOrder')
                ->label('Review Order')
                ->icon('heroicon-o-credit-card')
                ->url(fn (): ?string => $this->record->order
                    ? route('filament.admin.resources.orders.edit', ['record' => $this->record->order])
                    : null)
                ->openUrlInNewTab()
                ->visible(fn (): bool => $this->record->order !== null),
            Action::make('correctEnrollment')
                ->label('Apply Correction')
                ->icon('heroicon-o-pencil-square')
                ->color('warning')
                ->form([
                    Select::make('status')
                        ->required()
                        ->options([
                            'enrolled' => 'Enrolled',
                            'in_progress' => 'In progress',
                            'completed' => 'Completed',
                            'cancelled' => 'Cancelled',
                        ]),
                    DateTimePicker::make('completed_at'),
                    DateTimePicker::make('cancelled_at'),
                    Textarea::make('correction_reason')
                        ->required()
                        ->rows(4)
                        ->maxLength(1000),
                ])
                ->action(function (array $data): void {
                    app(ApplyCourseEnrollmentCorrectionAction::class)->execute(
                        enrollment: $this->record,
                        status: (string) $data['status'],
                        reason: (string) $data['correction_reason'],
                        completedAt: filled($data['completed_at'] ?? null) ? Carbon::parse((string) $data['completed_at']) : null,
                        cancelledAt: filled($data['cancelled_at'] ?? null) ? Carbon::parse((string) $data['cancelled_at']) : null,
                        actor: auth()->user(),
                    );

                    $this->record->refresh();
                }),
        ];
    }

    protected function getFormActions(): array
    {
        return [];
    }
}