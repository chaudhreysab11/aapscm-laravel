<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\PartnerInquiryResource\Pages;
use App\Filament\Resources\Support\SubmissionResource;
use App\Models\PartnerInquiry;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class PartnerInquiryResource extends SubmissionResource
{
    protected static ?string $model = PartnerInquiry::class;

    protected static ?string $navigationLabel = 'Partner Inquiries';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Partner inquiry')->schema([
                TextInput::make('username')->disabled(),
                TextInput::make('first_name')->disabled(),
                TextInput::make('last_name')->disabled(),
                TextInput::make('email')->disabled(),
                TextInput::make('role')->disabled(),
                TextInput::make('organization')->disabled(),
                TextInput::make('partner_type')->disabled(),
                TextInput::make('city')->disabled(),
                TextInput::make('country')->disabled(),
                Placeholder::make('user_display')->label('Linked user')->content(fn (?PartnerInquiry $record): string => $record?->user?->email ?? 'Not linked'),
                Toggle::make('account_created')->disabled(),
                Textarea::make('assistance_request')->disabled()->rows(6)->columnSpanFull(),
                Select::make('status')->options(static::statusOptions())->required(),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')->label('First name')->searchable(),
                Tables\Columns\TextColumn::make('last_name')->label('Last name')->searchable(),
                Tables\Columns\TextColumn::make('organization')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('status')->badge()->color(fn (?string $state): string => static::statusColor($state))->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('partner_type'),
                Tables\Filters\SelectFilter::make('status')->options(static::statusOptions()),
            ])
            ->actions([
                EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPartnerInquiries::route('/'),
            'edit' => Pages\EditPartnerInquiry::route('/{record}/edit'),
        ];
    }
}
