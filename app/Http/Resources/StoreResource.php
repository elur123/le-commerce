<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
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
            'mobile_no' => $this->mobile_no,
            'total_product' => $this->products->count(),
            'actions' => [
                ['label' => 'Show', 'href' => route('stores.show', $this), 'type' => 'get'],
                ['label' => 'Edit', 'href' => route('stores.edit', $this), 'type' => 'get']
            ]
        ];
    }
}
