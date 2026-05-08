<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\UserMembershipResource\Pages;
use App\Models\MembershipTier;
use App\Models\UserMembership;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class UserMembershipResource extends Resource
{
    protected static ?string $model = UserMembership::class;

    protected static string | \UnitEnum | null $navigationGroup = 'Memberships';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-identification';

    protected static ?string $navigationLabel = 'User Memberships';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Membership context')->schema([
                Placeholder::make('user_display')
                    ->label('Member')
                    ->content(fn (?UserMembership $record): string => $record?->user?->name ?? 'Unknown user'),
                Placeholder::make('user_email_display')
                    ->label('Member email')
                    ->content(fn (?UserMembership $record): string => $record?->user?->email ?? 'No email'),
                Placeholder::make('tier_display')
                    ->label('Membership tier')
                    ->content(fn (?UserMembership $record): string => $record?->tier?->name ?? 'No tier'),
                Placeholder::make('linked_order_display')
                    ->label('Linked order')
                    ->content(fn (?UserMembership $record): string => $record?->order?->order_number ?? 'Manual / unknown'),
                TextInput::make('billing_cycle')->disabled(),
                TextInput::make('source_id')->label('Source ID')->disabled(),
            ])->columns(3),
            Section::make('Lifecycle')->schema([
                TextInput::make('status')->disabled(),
                TextInput::make('starts_at')->disabled(),
                TextInput::make('expires_at')->disabled(),
                TextInput::make('grace_period_ends_at')->disabled(),
                TextInput::make('cancelled_at')->disabled(),
                Placeholder::make('auto_renew_display')
                    ->label('Auto renew')
                    ->content(fn (?UserMembership $record): string => $record?->auto_renew ? 'Enabled' : 'Disabled'),
                TextInput::make('cancellation_reason')->disabled()->columnSpanFull(),
                TextInput::make('created_at')->disabled(),
                TextInput::make('updated_at')->disabled(),
            ])->columns(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Member')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('user.email')->label('Email')->searchable()->toggleable(),
                Tables\Columns\TextColumn::make('tier.name')->label('Tier')->sortable(),
                Tables\Columns\TextColumn::make('status')->badge()->sortable()
                    ->color(fn (string $state): string => self::statusColor($state)),
                Tables\Columns\TextColumn::make('billing_cycle')->badge()->sortable(),
                Tables\Columns\IconColumn::make('auto_renew')->label('Auto renew')->boolean(),
                Tables\Columns\TextColumn::make('starts_at')->dateTime()->sortable(),
                Tables\Columns\TextColumn::make('expires_at')->dateTime()->sortable(),
                Tables\Columns\TextColumn::make('order.order_number')->label('Order')->toggleable(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('expires_at', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')->options([
                    'pending' => 'Pending',
                    'active' => 'Active',
                    'grace' => 'Grace',
                    'expired' => 'Expired',
                    'cancelled' => 'Cancelled',
                ]),
                Tables\Filters\SelectFilter::make('billing_cycle')->options([
                    'annual' => 'Annual',
                    'monthly' => 'Monthly',
                ]),
                Tables\Filters\SelectFilter::make('membership_tier_id')
                    ->label('Tier')
                    ->options(fn (): array => MembershipTier::query()->orderBy('sort_order')->pluck('name', 'id')->all()),
                Tables\Filters\Filter::make('expiring_soon')
                    ->label('Expiring in 30 days')
                    ->query(fn (Builder $query): Builder => $query->whereBetween('expires_at', [now(), now()->addDays(30)])),
            ])
            ->actions([
                EditAction::make()->label('Review'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUserMemberships::route('/'),
            'edit' => Pages\EditUserMembership::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['user', 'tier', 'order']);
    }

    private static function statusColor(string $state): string
    {
        return match ($state) {
            'active' => 'success',
            'grace' => 'warning',
            'expired', 'cancelled' => 'danger',
            default => 'gray',
        };
    }
}