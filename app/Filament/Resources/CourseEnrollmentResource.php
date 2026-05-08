<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\CourseEnrollmentResource\Pages;
use App\Models\CourseEnrollment;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class CourseEnrollmentResource extends Resource
{
    protected static ?string $model = CourseEnrollment::class;

    protected static string | \UnitEnum | null $navigationGroup = 'Training';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationLabel = 'Course Enrollments';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Enrollment context')->schema([
                Placeholder::make('user_display')
                    ->label('User')
                    ->content(fn (?CourseEnrollment $record): string => $record?->user?->name ?? 'Unknown user'),
                Placeholder::make('user_email_display')
                    ->label('User email')
                    ->content(fn (?CourseEnrollment $record): string => $record?->user?->email ?? 'No email'),
                Placeholder::make('course_display')
                    ->label('Course')
                    ->content(fn (?CourseEnrollment $record): string => $record?->course?->title ?? 'Unknown course'),
                Placeholder::make('delivery_format_display')
                    ->label('Delivery format')
                    ->content(fn (?CourseEnrollment $record): string => $record?->course?->delivery_format ?? 'Not set'),
                Placeholder::make('linked_order_display')
                    ->label('Linked order')
                    ->content(fn (?CourseEnrollment $record): string => $record?->order?->order_number ?? 'Manual / unknown'),
            ])->columns(3),
            Section::make('Enrollment lifecycle')->schema([
                Select::make('status')
                    ->required()
                    ->disabled()
                    ->options([
                        'enrolled' => 'Enrolled',
                        'in_progress' => 'In progress',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ]),
                DateTimePicker::make('enrolled_at')->required()->disabled(),
                DateTimePicker::make('completed_at')->disabled(),
                DateTimePicker::make('cancelled_at')->disabled(),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('User')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('user.email')->label('Email')->searchable()->toggleable(),
                Tables\Columns\TextColumn::make('course.title')->label('Course')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('course.delivery_format')->label('Format')->badge()->toggleable(),
                Tables\Columns\TextColumn::make('status')->badge()->sortable()
                    ->color(fn (string $state): string => self::statusColor($state)),
                Tables\Columns\TextColumn::make('enrolled_at')->dateTime()->sortable(),
                Tables\Columns\TextColumn::make('completed_at')->dateTime()->sortable()->placeholder('Not completed'),
                Tables\Columns\TextColumn::make('order.order_number')->label('Order')->toggleable(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('enrolled_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')->options([
                    'enrolled' => 'Enrolled',
                    'in_progress' => 'In progress',
                    'completed' => 'Completed',
                    'cancelled' => 'Cancelled',
                ]),
                Tables\Filters\TernaryFilter::make('order_id')
                    ->label('Linked to order')
                    ->nullable()
                    ->queries(
                        true: fn (Builder $query): Builder => $query->whereNotNull('order_id'),
                        false: fn (Builder $query): Builder => $query->whereNull('order_id'),
                        blank: fn (Builder $query): Builder => $query,
                    ),
            ])
            ->actions([
                EditAction::make()->label('Manage'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourseEnrollments::route('/'),
            'edit' => Pages\EditCourseEnrollment::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['user', 'course', 'order']);
    }

    private static function statusColor(string $state): string
    {
        return match ($state) {
            'completed' => 'success',
            'in_progress' => 'info',
            'cancelled' => 'danger',
            default => 'gray',
        };
    }
}