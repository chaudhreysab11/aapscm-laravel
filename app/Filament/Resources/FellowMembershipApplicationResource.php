<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\FellowMembershipApplicationResource\Pages;
use App\Filament\Resources\Support\SubmissionResource;
use App\Models\FellowMembershipApplication;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class FellowMembershipApplicationResource extends SubmissionResource
{
    protected static ?string $model = FellowMembershipApplication::class;

    protected static ?string $navigationLabel = 'Fellow Membership Applications';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Applicant')->schema([
                TextInput::make('membership_tier')->disabled(),
                TextInput::make('full_name')->disabled(),
                DatePicker::make('date_of_birth')->disabled(),
                TextInput::make('nationality')->disabled(),
                TextInput::make('email')->disabled(),
                TextInput::make('phone')->disabled(),
                TextInput::make('address')->disabled()->columnSpanFull(),
                TextInput::make('current_employer')->disabled(),
                TextInput::make('job_title')->disabled(),
                TextInput::make('industry_sector')->disabled(),
                TextInput::make('years_experience')->disabled(),
            ])->columns(2),
            Section::make('Qualifications')->schema([
                TextInput::make('highest_qualification')->disabled(),
                TextInput::make('degree_name')->disabled(),
                TextInput::make('institution')->disabled(),
                DatePicker::make('year_completed')->disabled(),
                Textarea::make('personal_statement')->disabled()->rows(5)->columnSpanFull(),
                Placeholder::make('cv_path_display')->label('CV path')->content(fn (?FellowMembershipApplication $record): string => $record?->cv_path ?? 'Not provided'),
                Placeholder::make('identity_path_display')->label('Identity document path')->content(fn (?FellowMembershipApplication $record): string => $record?->identity_path ?? 'Not provided'),
                Placeholder::make('supporting_documents_path_display')->label('Supporting documents path')->content(fn (?FellowMembershipApplication $record): string => $record?->supporting_documents_path ?? 'Not provided'),
                Placeholder::make('payment_proof_path_display')->label('Payment proof path')->content(fn (?FellowMembershipApplication $record): string => $record?->payment_proof_path ?? 'Not provided'),
                Toggle::make('declaration_agreed')->disabled(),
                Select::make('status')->options(static::statusOptions())->required(),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('membership_tier')->label('Tier')->sortable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('status')->badge()->color(fn (?string $state): string => static::statusColor($state))->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('membership_tier')->options(array_map(fn (array $tier): string => $tier['label'], FellowMembershipApplication::tiers())),
                Tables\Filters\SelectFilter::make('status')->options(static::statusOptions()),
            ])
            ->actions([
                EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFellowMembershipApplications::route('/'),
            'edit' => Pages\EditFellowMembershipApplication::route('/{record}/edit'),
        ];
    }
}
