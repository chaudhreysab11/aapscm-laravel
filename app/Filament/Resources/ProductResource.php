<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use App\Models\ProductPrice;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static string|\UnitEnum|null $navigationGroup = 'Shop';

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state ?? ''))),

            TextInput::make('slug')
                ->required()
                ->maxLength(255)
                ->unique(ignoreRecord: true),

            TextInput::make('sku')
                ->maxLength(255)
                ->unique(ignoreRecord: true),

            Textarea::make('description')
                ->columnSpanFull(),

            TextInput::make('public_price')
                ->label('Public Price')
                ->numeric()
                ->prefix('$'),

            TextInput::make('public_price_currency')
                ->label('Public Price Currency')
                ->default('USD')
                ->maxLength(3),

            Toggle::make('public_price_is_active')
                ->label('Public Price Active')
                ->default(true),

            TextInput::make('stock')
                ->required()
                ->numeric()
                ->default(0),

            Toggle::make('is_active')
                ->default(true),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ProductPricesRelationManager::class,
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('sku')
                    ->searchable(),

                Tables\Columns\TextColumn::make('source_id')
                    ->label('WP ID')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->sortable(),

                Tables\Columns\TextColumn::make('migration_review_status')
                    ->label('Migration Review')
                    ->badge()
                    ->placeholder('approved')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('publicPrice.price')
                    ->label('Public Price')
                    ->state(fn (Product $record): string => $record->publicPrice instanceof ProductPrice
                        ? $record->publicPrice->currency . ' ' . number_format((float) $record->publicPrice->price, 2, '.', '')
                        : 'No price'),

                Tables\Columns\IconColumn::make('publicPrice.is_active')
                    ->label('Public Price Active')
                    ->boolean()
                    ->state(fn (Product $record): bool => $record->publicPrice?->is_active ?? false),

                Tables\Columns\TextColumn::make('stock')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with('publicPrice');
    }

    public static function persistPublicPrice(Product $product, mixed $price, ?string $currency = 'USD', bool $isActive = true): void
    {
        $publicPrice = $product->prices()
            ->whereNull('membership_tier_id')
            ->latest('id')
            ->first();

        $normalizedCurrency = strtoupper(trim((string) ($currency ?: 'USD')));

        if ($normalizedCurrency === '') {
            $normalizedCurrency = 'USD';
        }

        $normalizedPrice = is_numeric($price)
            ? number_format((float) $price, 2, '.', '')
            : ($publicPrice instanceof ProductPrice ? $publicPrice->price : null);

        if ($normalizedPrice === null) {
            return;
        }

        if ($publicPrice instanceof ProductPrice) {
            $publicPrice->fill([
                'price' => $normalizedPrice,
                'currency' => $normalizedCurrency,
                'is_active' => $isActive,
            ])->save();

            return;
        }

        $product->prices()->create([
            'membership_tier_id' => null,
            'price' => $normalizedPrice,
            'currency' => $normalizedCurrency,
            'is_active' => $isActive,
        ]);
    }
}
