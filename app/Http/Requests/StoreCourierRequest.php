<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use App\Models\Courier;
class StoreCourierRequest extends FormRequest
{
    
    public function rules(): array
    {
        return [
            'image' => ['required', File::image()],
            'name' => ['required', 'string', 'max:255',  Rule::unique(Courier::class)],
            'email' => ['required', 'email', Rule::unique(Courier::class)],
            'address' => ['required', 'string', 'max:1040'],
            'contact_no' => ['required', 'string', 'max:12']
        ];
    }
}
