<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\HtmlString;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static string|\UnitEnum|null $navigationGroup = 'Payments';

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationLabel = 'Orders';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'order_number';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Order summary')->schema([
                TextInput::make('order_number')->disabled(),
                TextInput::make('status')->disabled(),
                TextInput::make('payment_status')->disabled(),
                TextInput::make('payment_method')->disabled(),
                TextInput::make('currency')->disabled(),
                TextInput::make('total')->disabled(),
                TextInput::make('subtotal')->disabled(),
                TextInput::make('tax')->disabled(),
                TextInput::make('discount')->disabled(),
                TextInput::make('coupon_code')->disabled(),
                TextInput::make('coupon_type')->disabled(),
                TextInput::make('coupon_value')->disabled(),
                TextInput::make('payment_intent_id')->label('Gateway reference')->disabled()->columnSpanFull(),
                TextInput::make('source_id')->label('Source ID')->disabled(),
                TextInput::make('created_at')->disabled(),
                TextInput::make('updated_at')->disabled(),
            ])->columns(3),
            Section::make('Buyer')->schema([
                TextInput::make('billing_name')->disabled(),
                TextInput::make('billing_email')->disabled(),
                Placeholder::make('linked_user_display')
                    ->label('Linked user')
                    ->content(fn (?Order $record): string => $record?->user?->email ?? 'Guest checkout'),
                Placeholder::make('checkout_type_display')
                    ->label('Checkout type')
                    ->content(fn (?Order $record): string => $record?->user_id ? 'Authenticated user' : 'Guest'),
            ])->columns(2),
            Section::make('Line items')->schema([
                Placeholder::make('line_items_display')
                    ->label('Items')
                    ->content(fn (?Order $record): HtmlString => new HtmlString(self::lineItemsMarkup($record)))
                    ->columnSpanFull(),
            ]),
            Section::make('Order notes')->schema([
                Placeholder::make('notes_display')
                    ->label('Notes payload')
                    ->content(fn (?Order $record): HtmlString => self::jsonBlock($record?->notes))
                    ->columnSpanFull(),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_number')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('billing_name')->label('Buyer')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('billing_email')->label('Buyer email')->searchable()->toggleable(),
                Tables\Columns\IconColumn::make('user_id')->label('Guest')->boolean()->state(fn (Order $record): bool => $record->user_id === null),
                Tables\Columns\TextColumn::make('payment_method')->badge()->sortable(),
                Tables\Columns\TextColumn::make('payment_status')->badge()->sortable()
                    ->color(fn (string $state): string => match ($state) {
                        'paid' => 'success',
                        'failed' => 'danger',
                        'refunded' => 'warning',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('status')->badge()->sortable()
                    ->color(fn (string $state): string => match ($state) {
                        'completed' => 'success',
                        'cancelled' => 'danger',
                        'processing' => 'info',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('total')->money(fn (Order $record): string => $record->currency)->sortable(),
                Tables\Columns\TextColumn::make('payment_intent_id')->label('Gateway reference')->searchable()->toggleable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('payment_method')->options([
                    'stripe' => 'Stripe',
                    'paypal' => 'PayPal',
                ]),
                Tables\Filters\SelectFilter::make('payment_status')->options([
                    'unpaid' => 'Unpaid',
                    'paid' => 'Paid',
                    'failed' => 'Failed',
                    'refunded' => 'Refunded',
                ]),
                Tables\Filters\SelectFilter::make('status')->options([
                    'pending' => 'Pending',
                    'processing' => 'Processing',
                    'completed' => 'Completed',
                    'cancelled' => 'Cancelled',
                ]),
                Tables\Filters\TernaryFilter::make('user_id')
                    ->label('Authenticated buyer')
                    ->nullable()
                    ->queries(
                        true: fn (Builder $query): Builder => $query->whereNotNull('user_id'),
                        false: fn (Builder $query): Builder => $query->whereNull('user_id'),
                        blank: fn (Builder $query): Builder => $query,
                    ),
            ])
            ->actions([
                EditAction::make()->label('Review'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['user', 'items.product']);
    }

    private static function lineItemsMarkup(?Order $record): string
    {
        $items = $record?->items ?? collect();

        if ($items->isEmpty()) {
            return '<div>No line items found.</div>';
        }

        $rows = $items->map(function ($item): string {
            $name = e($item->product?->name ?? 'Order item');
            $quantity = (int) $item->quantity;
            $type = e((string) $item->item_type);
            $unitPrice = e(number_format((float) $item->unit_price, 2, '.', ''));
            $lineTotal = e(number_format((float) $item->total_price, 2, '.', ''));

            return "<li><strong>{$name}</strong> ({$type}) x {$quantity} — unit {$unitPrice}, total {$lineTotal}</li>";
        })->implode('');

        return '<ul style="padding-left: 18px; list-style: disc;">' . $rows . '</ul>';
    }

    private static function jsonBlock(mixed $value): HtmlString
    {
        $decoded = is_string($value) ? json_decode($value, true) : $value;
        $json = json_encode($decoded ?? new \stdClass(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        return new HtmlString('<pre style="white-space: pre-wrap; font-size: 12px;">' . e($json ?: '{}') . '</pre>');
    }
}
