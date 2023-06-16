<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use App\Models\Category;

class StoreCategoryRequest extends FormRequest
{
   
    public function rules(): array
    {
        return [
            'label' => ['required', 'string', 'max:255',  Rule::unique(Category::class)],
            'image' => ['required', File::image()],
        ];
    }
}
