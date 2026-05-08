<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\PdesCertificateRequestResource\Pages;
use App\Filament\Resources\Support\SubmissionResource;
use App\Models\PdesCertificateRequest;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class PdesCertificateRequestResource extends SubmissionResource
{
    protected static ?string $model = PdesCertificateRequest::class;

    protected static ?string $navigationLabel = 'PDES Certificate Requests';

    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Request')->schema([
                TextInput::make('full_name')->disabled(),
                TextInput::make('email')->disabled(),
                TextInput::make('phone')->disabled(),
                TextInput::make('certification')->disabled(),
                TextInput::make('certification_number')->disabled(),
                TextInput::make('activity_type')->disabled(),
                TextInput::make('course_name')->disabled(),
                TextInput::make('provider')->disabled(),
                TextInput::make('location')->disabled(),
                DatePicker::make('course_date')->disabled(),
                TextInput::make('pdes_earned')->disabled(),
                TextInput::make('category')->disabled(),
                Placeholder::make('certificate_path_display')->label('Certificate path')->content(fn (?PdesCertificateRequest $record): string => $record?->certificate_path ?? 'Not provided'),
                Placeholder::make('additional_documents_path_display')->label('Additional documents path')->content(fn (?PdesCertificateRequest $record): string => $record?->additional_documents_path ?? 'Not provided'),
                Placeholder::make('declarations_display')
                    ->label('Declarations')
                    ->content(fn (?PdesCertificateRequest $record): string => implode(', ', $record?->declarations ?? []))
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
                Tables\Columns\TextColumn::make('certification')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('activity_type')->label('Activity')->toggleable(),
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
            'index' => Pages\ListPdesCertificateRequests::route('/'),
            'edit' => Pages\EditPdesCertificateRequest::route('/{record}/edit'),
        ];
    }
}
