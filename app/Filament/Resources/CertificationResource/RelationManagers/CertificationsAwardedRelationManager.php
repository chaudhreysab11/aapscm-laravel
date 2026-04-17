<?php

declare(strict_types=1);

namespace App\Filament\Resources\CertificationResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class CertificationsAwardedRelationManager extends RelationManager
{
    protected static string $relationship = 'awardedCertifications';

    protected static ?string $title = 'Awarded Certificates';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('certificate_number')->searchable(),
                Tables\Columns\TextColumn::make('user.name')->label('Recipient')->searchable(),
                Tables\Columns\TextColumn::make('status')->badge()
                    ->color(fn (string $state) => match ($state) {
                        'active'  => 'success',
                        'expired' => 'warning',
                        'revoked' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('issued_at')->dateTime()->sortable(),
                Tables\Columns\TextColumn::make('expires_at')->dateTime()->sortable()->placeholder('No expiry'),
            ])
            ->defaultSort('issued_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(['active' => 'Active', 'expired' => 'Expired', 'revoked' => 'Revoked']),
            ])
            // Read-only — awarded certificates are managed in Module 6 (Exam & Certification Process)
            ->headerActions([])
            ->actions([])
            ->bulkActions([]);
    }
}
