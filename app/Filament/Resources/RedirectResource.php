<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\RedirectResource\Pages;
use App\Models\Redirect;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class RedirectResource extends Resource
{
    protected static ?string $model = Redirect::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-arrow-right-circle';

    protected static string|\UnitEnum|null $navigationGroup = 'CMS';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Redirect Details')
                ->schema([
                    TextInput::make('from_path')
                        ->label('From path')
                        ->required()
                        ->unique(table: 'redirects', column: 'from_path', ignoreRecord: true)
                        ->placeholder('/old-page-slug')
                        ->helperText('Must start with /'),

                    TextInput::make('to_path')
                        ->label('To path')
                        ->required()
                        ->placeholder('/new-page-slug'),

                    Select::make('http_code')
                        ->label('HTTP code')
                        ->options([
                            '301' => '301 — Permanent',
                            '302' => '302 — Temporary',
                        ])
                        ->default('301')
                        ->required(),

                    Toggle::make('is_active')
                        ->label('Active')
                        ->default(true),

                    Textarea::make('notes')
                        ->rows(3)
                        ->nullable()
                        ->columnSpan(2),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('from_path')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('to_path')
                    ->searchable(),

                Tables\Columns\TextColumn::make('http_code')
                    ->badge()
                    ->color(fn (string $state): string => $state === '301' ? 'success' : 'warning'),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),

                Tables\Columns\TextColumn::make('hit_count')
                    ->label('Hits')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('is_active')
                    ->label('Status')
                    ->options([
                        '1' => 'Active',
                        '0' => 'Inactive',
                    ]),

                Tables\Filters\SelectFilter::make('http_code')
                    ->label('HTTP code')
                    ->options([
                        '301' => '301 Permanent',
                        '302' => '302 Temporary',
                    ]),
            ])
            ->actions([
                EditAction::make(),

                Action::make('toggle_active')
                    ->label(fn (Redirect $record): string => $record->is_active ? 'Deactivate' : 'Activate')
                    ->icon(fn (Redirect $record): string => $record->is_active ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                    ->color(fn (Redirect $record): string => $record->is_active ? 'warning' : 'success')
                    ->action(fn (Redirect $record) => $record->update(['is_active' => ! $record->is_active])),

                DeleteAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRedirects::route('/'),
            'create' => Pages\CreateRedirect::route('/create'),
            'edit' => Pages\EditRedirect::route('/{record}/edit'),
        ];
    }
}
