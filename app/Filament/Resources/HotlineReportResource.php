<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\HotlineReportResource\Pages;
use App\Filament\Resources\Support\SubmissionResource;
use App\Models\HotlineReport;
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

class HotlineReportResource extends SubmissionResource
{
    protected static ?string $model = HotlineReport::class;

    protected static ?string $navigationLabel = 'Hotline Reports';

    protected static ?int $navigationSort = 8;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Reporter')->schema([
                Placeholder::make('user_display')->label('Linked user')->content(fn (?HotlineReport $record): string => $record?->user?->email ?? 'Not linked'),
                Toggle::make('anonymous_requested')->disabled(),
                Toggle::make('account_created')->disabled(),
                Toggle::make('terms_accepted')->disabled(),
                TextInput::make('first_name')->disabled(),
                TextInput::make('last_name')->disabled(),
                TextInput::make('email')->disabled(),
                TextInput::make('phone')->disabled(),
                DatePicker::make('date_of_birth')->disabled(),
            ])->columns(2),
            Section::make('Report')->schema([
                Textarea::make('incident_summary')->disabled()->rows(6)->columnSpanFull(),
                Textarea::make('incident_business_address')->disabled()->rows(4)->columnSpanFull(),
                Select::make('status')->options(static::statusOptions())->required(),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('email')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('first_name')->searchable(),
                Tables\Columns\IconColumn::make('anonymous_requested')->boolean()->label('Anonymous'),
                Tables\Columns\TextColumn::make('status')->badge()->color(fn (?string $state): string => static::statusColor($state))->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\TernaryFilter::make('anonymous_requested')->label('Anonymous request'),
                Tables\Filters\SelectFilter::make('status')->options(static::statusOptions()),
            ])
            ->actions([
                EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHotlineReports::route('/'),
            'edit' => Pages\EditHotlineReport::route('/{record}/edit'),
        ];
    }
}
