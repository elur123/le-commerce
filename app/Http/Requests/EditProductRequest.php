<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use App\Models\Product;
class EditProductRequest extends FormRequest
{
   
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255',  Rule::unique(Product::class)->ignore($this->product->id)],
            'description' => ['required', 'string'],
            'category' => ['required'],
            'images' => ['required'],
        ];
    }
}
