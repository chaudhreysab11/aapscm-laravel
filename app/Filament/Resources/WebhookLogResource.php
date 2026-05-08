<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\WebhookLogResource\Pages;
use App\Models\WebhookLog;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

class WebhookLogResource extends Resource
{
    protected static ?string $model = WebhookLog::class;

    protected static string|\UnitEnum|null $navigationGroup = 'Payments';

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-signal';

    protected static ?string $navigationLabel = 'Webhook Logs';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'event_id';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Webhook summary')->schema([
                TextInput::make('provider')->disabled(),
                TextInput::make('event_type')->disabled(),
                TextInput::make('event_id')->disabled(),
                TextInput::make('status')->disabled(),
                TextInput::make('processed_at')->disabled(),
                TextInput::make('created_at')->disabled(),
                TextInput::make('updated_at')->disabled(),
                TextInput::make('error_message')->disabled()->columnSpanFull(),
            ])->columns(3),
            Section::make('Payload')->schema([
                Placeholder::make('payload_display')
                    ->label('Payload')
                    ->content(fn (?WebhookLog $record): HtmlString => self::jsonBlock($record?->payload))
                    ->columnSpanFull(),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('provider')->badge()->sortable(),
                Tables\Columns\TextColumn::make('event_type')->searchable()->wrap(),
                Tables\Columns\TextColumn::make('event_id')->searchable()->toggleable(),
                Tables\Columns\TextColumn::make('status')->badge()->sortable()
                    ->color(fn (string $state): string => match ($state) {
                        'processed' => 'success',
                        'failed' => 'danger',
                        'received' => 'warning',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('error_message')->limit(50)->tooltip(fn (WebhookLog $record): ?string => $record->error_message),
                Tables\Columns\TextColumn::make('processed_at')->dateTime()->sortable()->placeholder('Not processed'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('provider')->options([
                    'stripe' => 'Stripe',
                    'paypal' => 'PayPal',
                ]),
                Tables\Filters\SelectFilter::make('status')->options([
                    'received' => 'Received',
                    'processed' => 'Processed',
                    'failed' => 'Failed',
                    'ignored' => 'Ignored',
                ]),
            ])
            ->actions([
                EditAction::make()->label('Review'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWebhookLogs::route('/'),
            'edit' => Pages\EditWebhookLog::route('/{record}/edit'),
        ];
    }

    private static function jsonBlock(mixed $value): HtmlString
    {
        $json = json_encode($value ?? new \stdClass(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        return new HtmlString('<pre style="white-space: pre-wrap; font-size: 12px;">' . e($json ?: '{}') . '</pre>');
    }
}
