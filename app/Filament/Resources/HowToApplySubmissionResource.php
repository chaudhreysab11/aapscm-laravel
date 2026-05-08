<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\HowToApplySubmissionResource\Pages;
use App\Filament\Resources\Support\SubmissionResource;
use App\Models\HowToApplySubmission;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class HowToApplySubmissionResource extends SubmissionResource
{
    protected static ?string $model = HowToApplySubmission::class;

    protected static ?string $navigationLabel = 'How To Apply Submissions';

    protected static ?int $navigationSort = 7;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Submission')->schema([
                TextInput::make('name')->disabled(),
                TextInput::make('email')->disabled(),
                TextInput::make('phone')->disabled(),
                Placeholder::make('cv_path_display')->label('CV path')->content(fn (?HowToApplySubmission $record): string => $record?->cv_path ?? 'Not provided'),
                Textarea::make('message')->disabled()->rows(8)->columnSpanFull(),
                Select::make('status')->options(static::statusOptions())->required(),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('phone')->searchable(),
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
            'index' => Pages\ListHowToApplySubmissions::route('/'),
            'edit' => Pages\EditHowToApplySubmission::route('/{record}/edit'),
        ];
    }
}
