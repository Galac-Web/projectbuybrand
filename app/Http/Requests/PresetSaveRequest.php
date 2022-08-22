<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PresetSaveRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->hasAllPermissions('preset.create', 'preset.update');
    }

    public function rules()
    {
        return [
            'name'   => 'required|string',
            'slug'   => 'nullable|string|unique:presets,slug',
            'module' => 'required|string',
            'tags.*' => 'exists:tags,id',
        ];
    }
}
