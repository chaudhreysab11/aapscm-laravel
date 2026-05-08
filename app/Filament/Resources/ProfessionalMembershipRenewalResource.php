<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\ProfessionalMembershipRenewalResource\Pages;
use App\Filament\Resources\Support\SubmissionResource;
use App\Models\ProfessionalMembershipRenewal;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class ProfessionalMembershipRenewalResource extends SubmissionResource
{
    protected static ?string $model = ProfessionalMembershipRenewal::class;

    protected static ?string $navigationLabel = 'Professional Membership Renewals';

    protected static ?int $navigationSort = 10;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Member')->schema([
                TextInput::make('full_name')->disabled(),
                TextInput::make('membership_id')->disabled(),
                TextInput::make('email')->disabled(),
                TextInput::make('phone')->disabled(),
                TextInput::make('country')->disabled(),
                TextInput::make('current_job_title')->disabled(),
                TextInput::make('company_name')->disabled(),
                TextInput::make('industry_sector')->disabled(),
                TextInput::make('payment_method')->disabled(),
            ])->columns(2),
            Section::make('Billing address')->schema([
                TextInput::make('street_address')->disabled()->columnSpanFull(),
                TextInput::make('city')->disabled(),
                TextInput::make('state_province')->disabled(),
                TextInput::make('postal_code')->disabled(),
                Toggle::make('terms_accepted')->disabled(),
                Select::make('status')->options(static::statusOptions())->required(),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('membership_id')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('payment_method')->sortable(),
                Tables\Columns\TextColumn::make('status')->badge()->color(fn (?string $state): string => static::statusColor($state))->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('payment_method')->options([
                    'Credit/Debit Card' => 'Credit/Debit Card',
                    'PayPal' => 'PayPal',
                    'Bank Transfer' => 'Bank Transfer',
                ]),
                Tables\Filters\SelectFilter::make('status')->options(static::statusOptions()),
            ])
            ->actions([
                EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProfessionalMembershipRenewals::route('/'),
            'edit' => Pages\EditProfessionalMembershipRenewal::route('/{record}/edit'),
        ];
    }
}
