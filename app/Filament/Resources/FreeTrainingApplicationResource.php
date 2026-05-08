<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\FreeTrainingApplicationResource\Pages;
use App\Filament\Resources\Support\SubmissionResource;
use App\Models\FreeTrainingApplication;
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

class FreeTrainingApplicationResource extends SubmissionResource
{
    protected static ?string $model = FreeTrainingApplication::class;

    protected static ?string $navigationLabel = 'Free Training Applications';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Applicant')->schema([
                TextInput::make('full_name')->disabled(),
                TextInput::make('email')->disabled(),
                TextInput::make('phone')->disabled(),
                TextInput::make('gender')->disabled(),
                DatePicker::make('date_of_birth')->disabled(),
                TextInput::make('college_university')->disabled(),
                TextInput::make('program_of_study')->disabled(),
                TextInput::make('year_of_study')->disabled(),
                DatePicker::make('expected_graduation')->disabled(),
                Placeholder::make('program_choices_display')
                    ->label('Program choices')
                    ->content(fn (?FreeTrainingApplication $record): string => implode(', ', $record?->program_choices ?? []))
                    ->columnSpanFull(),
            ])->columns(2),
            Section::make('Application details')->schema([
                Textarea::make('interest_reason')->disabled()->rows(4)->columnSpanFull(),
                Toggle::make('has_prior_training')->disabled(),
                Textarea::make('prior_training_details')->disabled()->rows(4)->columnSpanFull(),
                Textarea::make('career_aspirations')->disabled()->rows(4)->columnSpanFull(),
                Toggle::make('available_all_sessions')->disabled(),
                Textarea::make('availability_explanation')->disabled()->rows(4)->columnSpanFull(),
                TextInput::make('preferred_schedule')->disabled(),
                TextInput::make('preferred_training_type')->disabled(),
                Toggle::make('wants_student_membership')->disabled(),
                TextInput::make('signature_name')->disabled(),
                DatePicker::make('signature_date')->disabled(),
                Select::make('status')->options(static::statusOptions())->required(),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('email')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('preferred_training_type')->label('Track')->sortable(),
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
            'index' => Pages\ListFreeTrainingApplications::route('/'),
            'edit' => Pages\EditFreeTrainingApplication::route('/{record}/edit'),
        ];
    }
}
