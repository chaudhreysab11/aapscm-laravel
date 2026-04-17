<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\CommunityResource\Pages;
use App\Models\Community;
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
use Illuminate\Support\Str;

class CommunityResource extends Resource
{
    protected static ?string $model = Community::class;

    protected static string|\UnitEnum|null $navigationGroup = 'CMS';

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-globe-alt';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Community Details')
                ->schema([
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(function (\Filament\Schemas\Components\Utilities\Set $set, ?string $state, ?Community $record): void {
                            if ($record !== null) {
                                return;
                            }
                            $set('slug', Str::slug($state ?? ''));
                        }),

                    TextInput::make('slug')
                        ->required()
                        ->unique(table: 'communities', column: 'slug', ignoreRecord: true)
                        ->disabled(fn (?Community $record): bool => $record !== null)
                        ->dehydrated()
                        ->maxLength(255),

                    Select::make('community_type')
                        ->label('Community type')
                        ->options([
                            'regional'         => 'Regional',
                            'special_interest' => 'Special Interest',
                            'industry'         => 'Industry',
                            'chapter'          => 'Chapter',
                        ])
                        ->default('regional')
                        ->required(),

                    TextInput::make('region')
                        ->label('Region')
                        ->maxLength(255),

                    TextInput::make('sort_order')
                        ->label('Display order')
                        ->numeric()
                        ->default(0),

                    Toggle::make('is_active')
                        ->label('Active')
                        ->default(true),

                    Textarea::make('community_description')
                        ->label('Description')
                        ->rows(3)
                        ->columnSpanFull(),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),

                Tables\Columns\TextColumn::make('community_type')
                    ->label('Type')
                    ->badge(),

                Tables\Columns\TextColumn::make('region')
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),

                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->filters([
                Tables\Filters\SelectFilter::make('community_type')
                    ->label('Type')
                    ->options([
                        'regional'         => 'Regional',
                        'special_interest' => 'Special Interest',
                        'industry'         => 'Industry',
                        'chapter'          => 'Chapter',
                    ]),

                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListCommunities::route('/'),
            'create' => Pages\CreateCommunity::route('/create'),
            'edit'   => Pages\EditCommunity::route('/{record}/edit'),
        ];
    }
}
