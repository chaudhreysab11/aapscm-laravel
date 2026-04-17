<?php

declare(strict_types=1);

namespace App\Http\Requests\CMS;

use App\Models\Page;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return (bool) $this->user()?->can('update', $this->route('page'));
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        $routePage = $this->route('page');
        $pageId = $routePage instanceof Page ? $routePage->id : (int) $routePage;

        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'alpha_dash', Rule::unique('pages', 'slug')->ignore($pageId)],
            'content' => ['required', 'string'],
            'template' => ['nullable', 'string'],
            'is_published' => ['boolean'],
            'show_in_nav' => ['boolean'],
            'sort_order' => ['nullable', 'integer'],
            'parent_id' => ['nullable', 'integer', 'exists:pages,id'],
        ];
    }
}
