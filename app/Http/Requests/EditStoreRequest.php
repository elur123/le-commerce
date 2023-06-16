<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use App\Models\Store;
class EditStoreRequest extends FormRequest
{
    
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255',  Rule::unique(Store::class)->ignore($this->store->id)],
            'address' => ['required', 'string', 'max:1024'],
            'mobile_no' => ['required'],
        ];
    }
}
