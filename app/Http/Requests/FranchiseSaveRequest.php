<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FranchiseSaveRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->hasAllPermissions('franchise.create', 'franchise.update');
    }

    public function rules(): array
    {
        return [
            // 'points' => 'nullable|array',
            // 'points.*.city' => 'required|string',
            // 'points.*.count' => 'required|integer',
            // 'points.*.geo_lat' => 'required',
            // 'points.*.geo_lon' => 'required',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_active' => $this->boolean('is_active'),
        ]);
    }
}
