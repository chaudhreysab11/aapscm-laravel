<?php

declare(strict_types=1);

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use App\Models\Page;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPage extends EditRecord
{
    protected static string $resource = PageResource::class;

    /**
     * Sanitise form data before Filament hydrates any field.
     *
     * person_profile pages use `page_data` (structured fields) instead of
     * the block builder. Reset `blocks` to [] for those pages so the Builder
     * component doesn't crash on an unexpected value.
     *
     * Ensure `page_data` is always an array for nested Filament field hydration.
     */
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $template = $data['template'] ?? 'standard_content';

        if ($template === 'person_profile') {
            $data['blocks'] = [];
        }

        if (! is_array($data['page_data'] ?? null)) {
            $data['page_data'] = [];
        }

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->visible(fn (): bool => ($this->record instanceof Page)
                    && (bool) auth()->user()?->can('delete', $this->record)),
        ];
    }
}
