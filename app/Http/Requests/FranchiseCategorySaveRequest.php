<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FranchiseCategorySaveRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->hasAllPermissions('franchise.create', 'franchise.update');
    }

    public function rules(): array
    {
        return [
            'parent_id'   => 'nullable|exists:franchises_categories,id',
            'name'        => 'required|string',
            'description' => 'nullable',
            'sort'        => 'integer',
        ];
    }
}
