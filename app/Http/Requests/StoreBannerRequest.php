<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StoreBannerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'sub_title' => ['required', 'string', 'max:1040'],
            'image' => ['required', File::image()],
            'is_display' => ['required', 'boolean']
        ];
    }
}
