<?php

declare(strict_types=1);

namespace App\Filament\Resources\CertificationResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';

    protected static ?string $title = 'Linked Products';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('type')->badge(),
                Tables\Columns\TextColumn::make('sku'),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'exam_voucher' => 'Exam Voucher',
                        'training'     => 'Training',
                        'digital'      => 'Digital',
                        'bundle'       => 'Bundle',
                    ]),
            ])
            // Read-only — products are managed in Module 5 (E-Commerce)
            ->headerActions([])
            ->actions([
                Tables\Actions\Action::make('edit')
                    ->url(fn ($record) => route('filament.admin.resources.products.edit', $record))
                    ->icon('heroicon-o-pencil')
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([]);
    }
}
