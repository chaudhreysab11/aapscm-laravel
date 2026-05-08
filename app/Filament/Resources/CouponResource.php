<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\CouponResource\Pages;
use App\Models\Coupon;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class CouponResource extends Resource
{
    protected static ?string $model = Coupon::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-ticket';

    protected static string|\UnitEnum|null $navigationGroup = 'Payments';

    protected static ?string $navigationLabel = 'Coupons';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'code';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Coupon details')->schema([
                TextInput::make('code')
                    ->required()
                    ->maxLength(50)
                    ->unique(table: 'coupons', column: 'code', ignoreRecord: true)
                    ->dehydrateStateUsing(fn (string $state): string => Str::upper(trim($state)))
                    ->helperText('Codes are stored in uppercase and matched case-insensitively.'),
                Select::make('type')
                    ->options([
                        'fixed' => 'Fixed amount',
                        'percentage' => 'Percentage',
                    ])
                    ->required(),
                TextInput::make('value')
                    ->required()
                    ->numeric()
                    ->minValue(0.01)
                    ->helperText('Percentage coupons should use a value between 0.01 and 100.'),
                TextInput::make('minimum_order_amount')
                    ->numeric()
                    ->minValue(0)
                    ->nullable(),
                TextInput::make('usage_limit')
                    ->integer()
                    ->minValue(1)
                    ->nullable(),
                DateTimePicker::make('expires_at')->nullable(),
                Toggle::make('is_active')->default(true),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => Str::headline($state))
                    ->sortable(),
                Tables\Columns\TextColumn::make('value')
                    ->label('Value')
                    ->formatStateUsing(function (Coupon $record): string {
                        $value = number_format((float) $record->value, 2, '.', '');

                        return $record->type === 'percentage' ? $value . '%' : 'USD ' . $value;
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('minimum_order_amount')
                    ->label('Minimum order')
                    ->formatStateUsing(fn (?string $state): string => $state === null ? 'None' : 'USD ' . number_format((float) $state, 2, '.', ''))
                    ->toggleable(),
                Tables\Columns\TextColumn::make('usage_display')
                    ->label('Usage')
                    ->state(function (Coupon $record): string {
                        $used = $record->orders()->whereNotIn('status', ['cancelled'])->count();

                        return $record->usage_limit === null ? (string) $used : $used . ' / ' . $record->usage_limit;
                    }),
                Tables\Columns\IconColumn::make('is_active')->label('Active')->boolean(),
                Tables\Columns\TextColumn::make('expires_at')->dateTime()->sortable()->placeholder('No expiry'),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('updated_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('type')->options([
                    'fixed' => 'Fixed amount',
                    'percentage' => 'Percentage',
                ]),
                Tables\Filters\SelectFilter::make('is_active')
                    ->label('Status')
                    ->options([
                        '1' => 'Active',
                        '0' => 'Inactive',
                    ]),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCoupons::route('/'),
            'create' => Pages\CreateCoupon::route('/create'),
            'edit' => Pages\EditCoupon::route('/{record}/edit'),
        ];
    }
}
