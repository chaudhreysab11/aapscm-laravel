<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\ContactInquiryResource\Pages;
use App\Filament\Resources\Support\SubmissionResource;
use App\Models\ContactInquiry;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class ContactInquiryResource extends SubmissionResource
{
    protected static ?string $model = ContactInquiry::class;

    protected static ?string $navigationLabel = 'Contact Inquiries';

    protected static ?int $navigationSort = 6;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Inquiry')->schema([
                TextInput::make('name')->disabled(),
                TextInput::make('email')->disabled(),
                TextInput::make('subject')->disabled()->columnSpanFull(),
                Textarea::make('message')->disabled()->rows(8)->columnSpanFull(),
                Select::make('status')->options(static::statusOptions())->required(),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('subject')->searchable()->limit(50),
                Tables\Columns\TextColumn::make('status')->badge()->color(fn (?string $state): string => static::statusColor($state))->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')->options(static::statusOptions()),
            ])
            ->actions([
                EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactInquiries::route('/'),
            'edit' => Pages\EditContactInquiry::route('/{record}/edit'),
        ];
    }
}
