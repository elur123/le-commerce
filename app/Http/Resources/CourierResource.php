<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourierResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'contact_no' => $this->contact_no,
            'email' => $this->email,
            'logo_name' => $this->logo_name,
            'logo_url' => str_replace('public', 'storage', $this->logo_url),
            'actions' => [
                ['label' => 'Edit', 'href' => route('couriers.edit', $this), 'type' => 'get'],
            ]
        ];
    }
}
