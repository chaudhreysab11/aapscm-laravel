<?php

declare(strict_types=1);

namespace App\Filament\Resources\UserMembershipResource\Pages;

use App\Actions\Admin\ApplyMembershipCorrectionAction;
use App\Filament\Resources\UserMembershipResource;
use App\Models\UserMembership;
use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Pages\EditRecord;

class EditUserMembership extends EditRecord
{
    protected static string $resource = UserMembershipResource::class;

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
            Action::make('activateMembership')
                ->label('Activate')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->form([
                    Textarea::make('correction_reason')
                        ->required()
                        ->rows(4)
                        ->maxLength(1000),
                ])
                ->visible(fn (): bool => $this->record->status !== 'active')
                ->action(function (array $data): void {
                    /** @var UserMembership $membership */
                    $membership = $this->record->loadMissing(['user', 'tier']);

                    app(ApplyMembershipCorrectionAction::class)->activate(
                        membership: $membership,
                        reason: (string) $data['correction_reason'],
                        actor: auth()->user(),
                    );

                    $this->record->refresh();
                }),
            Action::make('placeMembershipInGrace')
                ->label('Move To Grace')
                ->icon('heroicon-o-exclamation-circle')
                ->color('warning')
                ->visible(fn (): bool => $this->record->status === 'active')
                ->form([
                    DateTimePicker::make('grace_period_ends_at')
                        ->required(),
                    Textarea::make('correction_reason')
                        ->required()
                        ->rows(4)
                        ->maxLength(1000),
                ])
                ->action(function (array $data): void {
                    /** @var UserMembership $membership */
                    $membership = $this->record;

                    app(ApplyMembershipCorrectionAction::class)->placeInGrace(
                        membership: $membership,
                        gracePeriodEndsAt: Carbon::parse((string) $data['grace_period_ends_at']),
                        reason: (string) $data['correction_reason'],
                        actor: auth()->user(),
                    );

                    $this->record->refresh();
                }),
            Action::make('adjustMembershipExpiry')
                ->label('Adjust Expiry')
                ->icon('heroicon-o-calendar-days')
                ->color('info')
                ->visible(fn (): bool => in_array($this->record->status, ['active', 'grace'], true))
                ->form([
                    DateTimePicker::make('expires_at')
                        ->required(),
                    Textarea::make('correction_reason')
                        ->required()
                        ->rows(4)
                        ->maxLength(1000),
                ])
                ->action(function (array $data): void {
                    /** @var UserMembership $membership */
                    $membership = $this->record;

                    app(ApplyMembershipCorrectionAction::class)->adjustExpiry(
                        membership: $membership,
                        expiresAt: Carbon::parse((string) $data['expires_at']),
                        reason: (string) $data['correction_reason'],
                        actor: auth()->user(),
                    );

                    $this->record->refresh();
                }),
            Action::make('expireMembership')
                ->label('Expire')
                ->icon('heroicon-o-x-circle')
                ->color('danger')
                ->form([
                    Textarea::make('correction_reason')
                        ->required()
                        ->rows(4)
                        ->maxLength(1000),
                ])
                ->visible(fn (): bool => in_array($this->record->status, ['pending', 'active', 'grace'], true))
                ->action(function (array $data): void {
                    /** @var UserMembership $membership */
                    $membership = $this->record->loadMissing(['user', 'tier']);

                    app(ApplyMembershipCorrectionAction::class)->expire(
                        membership: $membership,
                        reason: (string) $data['correction_reason'],
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