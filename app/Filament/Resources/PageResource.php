<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\MembershipTier;
use App\Models\Page;
use App\Services\CMS\PageService;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static string|\UnitEnum|null $navigationGroup = 'CMS';

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

    protected static ?int $navigationSort = 1;

    // -------------------------------------------------------------------------
    // Reusable block definitions
    // -------------------------------------------------------------------------

    /** @return Block[] */
    private static function allBlocks(): array
    {
        return [
            Block::make('hero')
                ->label('Hero Banner')
                ->icon('heroicon-o-photo')
                ->schema([
                    TextInput::make('heading')
                        ->label('Heading')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('subheading')
                        ->label('Sub-heading')
                        ->maxLength(255),
                    TextInput::make('cta_label')
                        ->label('Button label'),
                    TextInput::make('cta_url')
                        ->label('Button URL')
                        ->url(),
                    TextInput::make('secondary_cta_label')
                        ->label('Secondary button label'),
                    TextInput::make('secondary_cta_url')
                        ->label('Secondary button URL')
                        ->url(),
                    Select::make('background_color')
                        ->label('Background color')
                        ->options([
                            'blue'  => 'Brand Blue',
                            'dark'  => 'Dark',
                            'white' => 'White',
                            'gray'  => 'Gray',
                        ])
                        ->default('blue'),
                    TextInput::make('background_image')
                        ->label('Background image URL')
                        ->url()
                        ->helperText('Optional. Paste a /storage/... URL from the media library.'),
                ])
                ->columns(2),

            Block::make('rich_text')
                ->label('Rich Text')
                ->icon('heroicon-o-bars-3-bottom-left')
                ->schema([
                    TextInput::make('heading')
                        ->label('Section heading (optional)')
                        ->maxLength(255),
                    RichEditor::make('content')
                        ->label('Content')
                        ->required()
                        ->columnSpanFull(),
                    Select::make('width')
                        ->label('Content width')
                        ->options([
                            'narrow' => 'Narrow (prose)',
                            'normal' => 'Normal',
                            'wide'   => 'Full-width',
                        ])
                        ->default('normal'),
                ])
                ->columns(2),

            Block::make('text_image')
                ->label('Text + Image')
                ->icon('heroicon-o-squares-2x2')
                ->schema([
                    TextInput::make('heading')
                        ->label('Heading')
                        ->maxLength(255),
                    RichEditor::make('text')
                        ->label('Text')
                        ->required()
                        ->columnSpanFull(),
                    TextInput::make('image_url')
                        ->label('Image URL')
                        ->url()
                        ->helperText('Paste a /storage/cms-images/... URL.'),
                    TextInput::make('image_alt')
                        ->label('Image alt text'),
                    Select::make('image_position')
                        ->label('Image position')
                        ->options([
                            'right' => 'Image on right',
                            'left'  => 'Image on left',
                        ])
                        ->default('right'),
                    TextInput::make('cta_label')
                        ->label('Button label'),
                    TextInput::make('cta_url')
                        ->label('Button URL')
                        ->url(),
                ])
                ->columns(2),

            Block::make('cards')
                ->label('Cards Grid')
                ->icon('heroicon-o-rectangle-group')
                ->schema([
                    TextInput::make('heading')
                        ->label('Section heading')
                        ->maxLength(255),
                    Textarea::make('intro')
                        ->label('Section intro text')
                        ->rows(2)
                        ->columnSpanFull(),
                    Select::make('columns')
                        ->label('Columns')
                        ->options([
                            '2' => '2 columns',
                            '3' => '3 columns',
                            '4' => '4 columns',
                        ])
                        ->default('3'),
                    Builder::make('items')
                        ->label('Cards')
                        ->columnSpanFull()
                        ->blocks([
                            Block::make('card')
                                ->label('Card')
                                ->schema([
                                    TextInput::make('title')
                                        ->label('Title')
                                        ->required(),
                                    Textarea::make('description')
                                        ->label('Description')
                                        ->rows(2),
                                    TextInput::make('image_url')
                                        ->label('Image URL')
                                        ->url(),
                                    TextInput::make('icon')
                                        ->label('Heroicon name (optional)')
                                        ->helperText('e.g. heroicon-o-star'),
                                    TextInput::make('link_url')
                                        ->label('Link URL')
                                        ->url(),
                                    TextInput::make('link_label')
                                        ->label('Link label'),
                                ])
                                ->columns(2),
                        ]),
                ])
                ->columns(2),

            Block::make('cta_banner')
                ->label('Call to Action Banner')
                ->icon('heroicon-o-megaphone')
                ->schema([
                    TextInput::make('heading')
                        ->label('Heading')
                        ->required()
                        ->maxLength(255),
                    Textarea::make('text')
                        ->label('Supporting text')
                        ->rows(2)
                        ->columnSpanFull(),
                    TextInput::make('primary_label')
                        ->label('Primary button label'),
                    TextInput::make('primary_url')
                        ->label('Primary button URL')
                        ->url(),
                    TextInput::make('secondary_label')
                        ->label('Secondary button label'),
                    TextInput::make('secondary_url')
                        ->label('Secondary button URL')
                        ->url(),
                    Select::make('background_color')
                        ->label('Background color')
                        ->options([
                            'blue'  => 'Brand Blue',
                            'dark'  => 'Dark',
                            'white' => 'White',
                            'gray'  => 'Light Gray',
                        ])
                        ->default('blue'),
                    Select::make('alignment')
                        ->label('Content alignment')
                        ->options([
                            'center' => 'Center',
                            'left'   => 'Left',
                        ])
                        ->default('center'),
                ])
                ->columns(2),

            Block::make('two_columns')
                ->label('Two Columns')
                ->icon('heroicon-o-view-columns')
                ->schema([
                    TextInput::make('heading')
                        ->label('Section heading (optional)')
                        ->maxLength(255)
                        ->columnSpanFull(),
                    RichEditor::make('left_content')
                        ->label('Left column'),
                    RichEditor::make('right_content')
                        ->label('Right column'),
                ])
                ->columns(2),

            Block::make('accordion')
                ->label('Accordion / FAQ')
                ->icon('heroicon-o-chevron-down')
                ->schema([
                    TextInput::make('heading')
                        ->label('Section heading')
                        ->maxLength(255)
                        ->columnSpanFull(),
                    Builder::make('items')
                        ->label('FAQ items')
                        ->columnSpanFull()
                        ->blocks([
                            Block::make('item')
                                ->label('FAQ Item')
                                ->schema([
                                    TextInput::make('question')
                                        ->label('Question')
                                        ->required(),
                                    RichEditor::make('answer')
                                        ->label('Answer')
                                        ->required()
                                        ->columnSpanFull(),
                                ]),
                        ]),
                ]),

            Block::make('html')
                ->label('Custom HTML')
                ->icon('heroicon-o-code-bracket')
                ->schema([
                    Textarea::make('content')
                        ->label('HTML code')
                        ->required()
                        ->rows(10)
                        ->columnSpanFull(),
                ]),
        ];
    }

    // -------------------------------------------------------------------------
    // Form
    // -------------------------------------------------------------------------

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Tabs::make()->tabs([

                // â”€â”€ Content tab â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€
                Tabs\Tab::make('Content')->schema([
                    Section::make('Page Details')
                        ->schema([
                            TextInput::make('title')
                                ->required()
                                ->maxLength(255)
                                ->live(onBlur: true)
                                ->afterStateUpdated(function (Set $set, Get $get, ?string $state, ?Page $record): void {
                                    // Only auto-generate slug during creation (no record yet)
                                    if ($record !== null) {
                                        return;
                                    }
                                    $set('slug', Str::slug($state ?? ''));
                                })
                                ->columnSpan(2),

                            TextInput::make('slug')
                                ->required()
                                ->unique(table: 'pages', column: 'slug', ignoreRecord: true)
                                ->disabled(fn (?Page $record): bool => $record !== null)
                                ->dehydrated()
                                ->helperText('Generated from title on creation. Read-only after save.')
                                ->columnSpan(2),

                            TextInput::make('excerpt')
                                ->label('Excerpt / sub-heading')
                                ->maxLength(300)
                                ->columnSpan(2),

                            Select::make('template')
                                ->options(config('cms.templates'))
                                ->default('standard_content')
                                ->live()
                                ->required()
                                ->disabled(fn (?Page $record): bool => $record !== null)
                                ->dehydrated()
                                ->helperText('Template cannot be changed after page creation.'),

                            Select::make('parent_id')
                                ->label('Parent Page')
                                ->options(function (?Page $record): array {
                                    $query = Page::query()->select(['id', 'title']);
                                    if ($record?->id !== null) {
                                        $query->where('id', '!=', $record->id);
                                    }

                                    return $query->orderBy('title')->pluck('title', 'id')->toArray();
                                })
                                ->searchable()
                                ->nullable()
                                ->placeholder('None (top-level)'),
                        ])
                        ->columns(2),

                    // â”€â”€ Block builder (all templates except person_profile) â”€â”€â”€
                    Section::make('Page Blocks')
                        ->schema([
                            Builder::make('blocks')
                                ->columnSpanFull()
                                ->collapsible()
                                ->cloneable()
                                ->blocks(self::allBlocks()),
                        ])
                        ->visible(fn (Get $get): bool => $get('template') !== 'person_profile'),

                    // â”€â”€ TF-05: Person profile fields â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€
                    Section::make('Person Profile')
                        ->description('Structured data for this person\'s profile page.')
                        ->schema([
                            TextInput::make('page_data.person_name')
                                ->label('Full name')
                                ->maxLength(255),
                            TextInput::make('page_data.role')
                                ->label('Title / Role')
                                ->maxLength(255),
                            TextInput::make('page_data.linkedin_url')
                                ->label('LinkedIn URL')
                                ->url()
                                ->maxLength(500),
                            TextInput::make('page_data.avatar_image')
                                ->label('Avatar image URL')
                                ->url()
                                ->maxLength(500)
                                ->helperText('Paste a /storage/... URL.'),
                            RichEditor::make('page_data.bio')
                                ->label('Biography')
                                ->columnSpanFull(),
                        ])
                        ->columns(2)
                        ->visible(fn (Get $get): bool => $get('template') === 'person_profile'),

                    // â”€â”€ TF-04: Sidebar guide items â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€
                    Section::make('Sidebar Navigation')
                        ->description('Links shown in the right-hand guide sidebar.')
                        ->schema([
                            Repeater::make('page_data.sidebar_items')
                                ->label('Sidebar items')
                                ->schema([
                                    TextInput::make('label')
                                        ->label('Label')
                                        ->required(),
                                    TextInput::make('url')
                                        ->label('URL')
                                        ->required(),
                                ])
                                ->columns(2)
                                ->columnSpanFull()
                                ->defaultItems(0),
                        ])
                        ->visible(fn (Get $get): bool => $get('template') === 'sidebar_guide'),

                    // â”€â”€ TF-07: Communities settings â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€
                    Section::make('Community Page Settings')
                        ->description('Configure the communities listing section of this page.')
                        ->schema([
                            Select::make('page_data.filter_type')
                                ->label('Filter by community type')
                                ->options([
                                    ''                 => 'All types',
                                    'regional'         => 'Regional',
                                    'special_interest' => 'Special Interest',
                                    'industry'         => 'Industry',
                                    'chapter'          => 'Chapter',
                                ])
                                ->default('')
                                ->nullable(),
                            TextInput::make('page_data.communities_heading')
                                ->label('Section heading')
                                ->maxLength(255),
                        ])
                        ->columns(2)
                        ->visible(fn (Get $get): bool => $get('template') === 'communities'),
                ]),

                // â”€â”€ Settings tab â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€
                Tabs\Tab::make('Settings')->schema([
                    Section::make('Publishing')
                        ->schema([
                            Toggle::make('is_published')
                                ->label('Published')
                                ->default(false),

                            Toggle::make('show_in_nav')
                                ->label('Show in navigation')
                                ->default(false),

                            TextInput::make('sort_order')
                                ->numeric()
                                ->default(0),
                        ])
                        ->columns(3),

                    // â”€â”€ TF-06: Membership gate â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€
                    Section::make('Access Control')
                        ->description('Restrict this page to authenticated members of a specific tier. Leave blank for public access.')
                        ->schema([
                            Select::make('membership_tier_id')
                                ->label('Required membership tier')
                                ->options(
                                    fn (): array => MembershipTier::query()
                                        ->orderBy('name')
                                        ->pluck('name', 'id')
                                        ->toArray()
                                )
                                ->searchable()
                                ->nullable()
                                ->placeholder('Public (no restriction)'),
                        ])
                        ->visible(fn (Get $get): bool => $get('template') === 'membership_tier'),
                ]),

                // â”€â”€ SEO tab â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€
                Tabs\Tab::make('SEO')->schema([
                    Section::make('Search Engine Optimisation')
                        ->schema([
                            TextInput::make('seo_title')
                                ->label('SEO title')
                                ->maxLength(60)
                                ->helperText('Defaults to page title if empty.'),

                            TextInput::make('seo_canonical')
                                ->label('Canonical URL')
                                ->url()
                                ->maxLength(500),

                            Textarea::make('seo_description')
                                ->label('Meta description')
                                ->maxLength(160)
                                ->rows(3)
                                ->columnSpanFull(),
                        ])
                        ->columns(2),
                ]),
            ])
            ->columnSpanFull(),
        ]);
    }

    // -------------------------------------------------------------------------
    // Table
    // -------------------------------------------------------------------------

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),

                Tables\Columns\TextColumn::make('template')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => config("cms.templates.{$state}", $state)),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),

                Tables\Columns\IconColumn::make('show_in_nav')
                    ->label('In nav')
                    ->boolean(),

                Tables\Columns\TextColumn::make('sort_order')
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('template')
                    ->options(config('cms.templates')),

                Tables\Filters\SelectFilter::make('is_published')
                    ->label('Published status')
                    ->options([
                        '1' => 'Published',
                        '0' => 'Unpublished',
                    ]),
            ])
            ->actions([
                EditAction::make(),

                Action::make('view_live')
                    ->label('View')
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->color('gray')
                    ->url(fn (Page $record): string => route('cms.page', $record->slug))
                    ->openUrlInNewTab()
                    ->visible(fn (Page $record): bool => $record->is_published),

                Action::make('publish')
                    ->label('Publish')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn (Page $record): bool => ! $record->is_published
                        && (bool) auth()->user()?->can('publish', $record))
                    ->action(fn (Page $record) => app(PageService::class)->publishPage($record)),

                Action::make('unpublish')
                    ->label('Unpublish')
                    ->icon('heroicon-o-x-circle')
                    ->color('warning')
                    ->requiresConfirmation()
                    ->visible(fn (Page $record): bool => $record->is_published
                        && (bool) auth()->user()?->can('publish', $record))
                    ->action(fn (Page $record) => app(PageService::class)->unpublishPage($record)),

                DeleteAction::make()
                    ->visible(fn (Page $record): bool => (bool) auth()->user()?->can('delete', $record)),
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit'   => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
