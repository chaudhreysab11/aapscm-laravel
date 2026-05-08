<?php

declare(strict_types=1);

namespace App\Filament\Resources\ProductResource\RelationManagers;

use App\Models\MembershipTier;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ProductPricesRelationManager extends RelationManager
{
    protected static string $relationship = 'prices';

    protected static ?string $title = 'Tier Pricing';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('membership_tier_id')
                ->label('Membership tier')
                ->required()
                ->options(fn (): array => MembershipTier::query()->orderBy('sort_order')->pluck('name', 'id')->all()),
            TextInput::make('price')
                ->required()
                ->numeric()
                ->prefix('$'),
            TextInput::make('currency')
                ->required()
                ->default('USD')
                ->maxLength(3),
            Toggle::make('is_active')
                ->label('Active')
                ->default(true),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query): Builder => $query->whereNotNull('membership_tier_id')->with('membershipTier'))
            ->columns([
                Tables\Columns\TextColumn::make('membershipTier.name')->label('Tier')->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->money(fn ($record): string => $record->currency)
                    ->sortable(),
                Tables\Columns\TextColumn::make('currency')->sortable(),
                Tables\Columns\IconColumn::make('is_active')->label('Active')->boolean(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}