<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\CorporateMembershipApplicationResource\Pages;
use App\Filament\Resources\Support\SubmissionResource;
use App\Models\CorporateMembershipApplication;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class CorporateMembershipApplicationResource extends SubmissionResource
{
    protected static ?string $model = CorporateMembershipApplication::class;

    protected static ?string $navigationLabel = 'Corporate Membership Applications';

    protected static ?int $navigationSort = 9;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Application')->schema([
                TextInput::make('organization_name')->disabled(),
                TextInput::make('legal_business_name')->disabled(),
                TextInput::make('business_registration_number')->disabled(),
                DatePicker::make('year_established')->disabled(),
                Placeholder::make('industry_sectors_display')
                    ->label('Industry sectors')
                    ->content(fn (?CorporateMembershipApplication $record): string => implode(', ', $record?->industry_sectors ?? []))
                    ->columnSpanFull(),
                TextInput::make('employee_count')->disabled(),
                TextInput::make('company_website')->disabled(),
                TextInput::make('head_office_address')->disabled()->columnSpanFull(),
                TextInput::make('country_of_registration')->disabled(),
                TextInput::make('branches_offices')->disabled(),
                Select::make('status')->options(static::statusOptions())->required(),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('organization_name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('country_of_registration')->label('Country')->sortable(),
                Tables\Columns\TextColumn::make('employee_count')->label('Employees')->sortable(),
                Tables\Columns\TextColumn::make('status')->badge()->color(fn (?string $state): string => static::statusColor($state))->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')->options(static::statusOptions()),
            ])
            ->actions([
                EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCorporateMembershipApplications::route('/'),
            'edit' => Pages\EditCorporateMembershipApplication::route('/{record}/edit'),
        ];
    }
}
