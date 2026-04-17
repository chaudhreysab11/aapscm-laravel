<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\CertificationResource\Pages;
use App\Filament\Resources\CertificationResource\RelationManagers;
use App\Models\CertificationCatalog;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class CertificationResource extends Resource
{
    protected static ?string $model = CertificationCatalog::class;

    protected static string|\UnitEnum|null $navigationGroup = 'Certifications';

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Tabs::make()->tabs([

                Tabs\Tab::make('Core Details')->schema([
                    TextInput::make('title')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn ($state, callable $set) =>
                            $set('slug', Str::slug($state))
                        ),

                    TextInput::make('acronym')
                        ->maxLength(20)
                        ->helperText('Short identifier, e.g. CSCP, CLTD. Required for meta titles and badge display.')
                        ->afterStateUpdated(fn ($state, callable $set) =>
                            $set('acronym', strtoupper((string) $state))
                        )
                        ->live(onBlur: true),

                    TextInput::make('slug')
                        ->required()
                        ->maxLength(255)
                        ->unique(table: 'certification_catalog', column: 'slug', ignorable: fn ($record) => $record)
                        ->helperText('⚠ Changing a slug breaks the live URL. Ensure a 301 redirect is in place before saving.'),

                    Select::make('credential_type')
                        ->options([
                            'supply_chain'   => 'Supply Chain',
                            'logistics'      => 'Logistics',
                            'procurement'    => 'Procurement',
                            'operations'     => 'Operations',
                            'leadership'     => 'Leadership',
                            'sustainability' => 'Sustainability',
                            'other'          => 'Other',
                        ])
                        ->nullable()
                        ->searchable(),

                    TextInput::make('certifying_body')
                        ->default('AAPSCM')
                        ->maxLength(100),

                    Toggle::make('is_active')
                        ->default(true),

                    TextInput::make('sort_order')
                        ->numeric()
                        ->default(0)
                        ->minValue(0),

                    TextInput::make('pdu_credits')
                        ->numeric()
                        ->minValue(0)
                        ->default(0),

                    FileUpload::make('badge_image')
                        ->image()
                        ->disk('public')
                        ->directory('certifications/badges')
                        ->nullable(),

                    FileUpload::make('og_image')
                        ->image()
                        ->disk('public')
                        ->directory('certifications/og')
                        ->nullable()
                        ->helperText('Open Graph image for social sharing (1200×630 recommended). Separate from badge.'),

                    TextInput::make('source_id')
                        ->numeric()
                        ->disabled()
                        ->helperText('WordPress post ID — do not edit.'),
                ]),

                Tabs\Tab::make('Content')->schema([
                    RichEditor::make('description')
                        ->nullable()
                        ->columnSpanFull(),

                    RichEditor::make('eligibility_requirements')
                        ->nullable()
                        ->columnSpanFull(),

                    RichEditor::make('exam_details')
                        ->nullable()
                        ->columnSpanFull(),
                ]),

                Tabs\Tab::make('SEO')->schema([
                    TextInput::make('meta_title')
                        ->maxLength(160)
                        ->nullable()
                        ->helperText('Leave blank to auto-generate: "{title} ({acronym}) Certification | AAPSCM"'),

                    Textarea::make('meta_description')
                        ->maxLength(320)
                        ->nullable()
                        ->helperText('Leave blank to auto-generate from the first 155 characters of description.'),

                    TextInput::make('canonical_url')
                        ->url()
                        ->maxLength(255)
                        ->nullable()
                        ->helperText('Leave blank to use the default /certification/{slug} URL.'),
                ]),

            ])->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('acronym')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('credential_type')->sortable(),
                Tables\Columns\TextColumn::make('pdu_credits')->sortable(),
                Tables\Columns\IconColumn::make('is_active')->boolean()->sortable(),
                Tables\Columns\TextColumn::make('sort_order')->sortable(),
                Tables\Columns\TextColumn::make('source_id')->label('WP ID')->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->defaultSort('sort_order')
            ->filters([
                Tables\Filters\SelectFilter::make('credential_type')
                    ->options([
                        'supply_chain'   => 'Supply Chain',
                        'logistics'      => 'Logistics',
                        'procurement'    => 'Procurement',
                        'operations'     => 'Operations',
                        'leadership'     => 'Leadership',
                        'sustainability' => 'Sustainability',
                        'other'          => 'Other',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active'),
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
                RestoreAction::make(),
                ForceDeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\CertificationsAwardedRelationManager::class,
            RelationManagers\ProductsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListCertifications::route('/'),
            'create' => Pages\CreateCertification::route('/create'),
            'edit'   => Pages\EditCertification::route('/{record}/edit'),
        ];
    }
}
