<?php

declare(strict_types=1);

namespace App\Http\Requests\CMS;

use App\Models\Page;
use Illuminate\Foundation\Http\FormRequest;

class StorePageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return (bool) $this->user()?->can('create', Page::class);
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'alpha_dash', 'unique:pages,slug'],
            'content' => ['required', 'string'],
            'template' => ['nullable', 'string'],
            'is_published' => ['boolean'],
            'show_in_nav' => ['boolean'],
            'sort_order' => ['nullable', 'integer'],
            'parent_id' => ['nullable', 'integer', 'exists:pages,id'],
        ];
    }
}
