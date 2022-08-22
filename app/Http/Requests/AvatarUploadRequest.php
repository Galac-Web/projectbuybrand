<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvatarUploadRequest extends FormRequest
{
    private $minWidth = 100;
    private $minHeight = 100;

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'crop' => 'required|image|dimensions:min_width='.$this->minWidth.',min_height='.$this->minHeight,
        ];
    }

    public function messages()
    {
        return [
            'crop.dimensions' => 'Минимальный размер изображения '.$this->minWidth.'x'.$this->minHeight.'px',
        ];
    }
}
