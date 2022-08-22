<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaSaveRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->hasAllPermissions('media.create', 'media.update');
    }

    public function rules(): array
    {
        return [
            'title'        => 'required|string',
            'subtitle'     => 'nullable|string',
            'description'  => 'nullable|string',
            'type_id'      => 'required|exists:media_types,id',
            'tags.*'       => 'exists:tags,id',
            'persons.*'    => 'exists:persons,id',
            'franchises.*' => 'exists:franchises,id',
            'is_active'    => 'boolean',
            'preview'      => 'image',
            'video.*'      => 'nullable|string',
            'related.*'    => 'exists:media,id',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_active' => $this->boolean('is_active'),
        ]);
    }
}
