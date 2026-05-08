<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\CvSubmissionResource\Pages;
use App\Filament\Resources\Support\SubmissionResource;
use App\Models\CvSubmission;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class CvSubmissionResource extends SubmissionResource
{
    protected static ?string $model = CvSubmission::class;

    protected static ?string $navigationLabel = 'CV Submissions';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Submission')->schema([
                TextInput::make('full_name')->disabled(),
                TextInput::make('email')->disabled(),
                TextInput::make('phone')->disabled(),
                TextInput::make('headline')->disabled(),
                TextInput::make('linkedin_url')->disabled(),
                Placeholder::make('job_listing_display')->label('Job listing')->content(fn (?CvSubmission $record): string => $record?->jobListing?->title ?? 'Not linked'),
                Placeholder::make('cv_file_path_display')->label('CV file path')->content(fn (?CvSubmission $record): string => $record?->cv_file_path ?? 'Not provided'),
                Textarea::make('cover_letter')->disabled()->rows(6)->columnSpanFull(),
                Placeholder::make('form_payload_display')
                    ->label('Additional payload')
                    ->content(fn (?CvSubmission $record) => static::jsonBlock($record?->form_payload ?? []))
                    ->columnSpanFull(),
                Select::make('status')->options(static::statusOptions())->required(),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('headline')->searchable()->toggleable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
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
            'index' => Pages\ListCvSubmissions::route('/'),
            'edit' => Pages\EditCvSubmission::route('/{record}/edit'),
        ];
    }
}
