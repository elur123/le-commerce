<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use App\Models\Courier;
class EditCourierRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255',  Rule::unique(Courier::class)->ignore($this->courier->id)],
            'email' => ['required', 'email', Rule::unique(Courier::class)->ignore($this->courier->id)],
            'address' => ['required', 'string', 'max:1040'],
            'contact_no' => ['required', 'string', 'max:12']
        ];
    }
}
