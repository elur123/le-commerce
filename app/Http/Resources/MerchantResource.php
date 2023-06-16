<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MerchantResource extends JsonResource
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
            'name' => $this->user->name,
            'company_name' => $this->name,
            'address' =>  $this->address,
            'mobile_number' => $this->mobile_no,
            'products' => $this->products,
            'total_product' => count($this->products),
            'actions' => [
                ['label' => 'Show', 'href' => route('merchants.show', $this), 'type' => 'get'],
                [
                    'label' => $this->is_validated ? 'Mark as unverified' : 'Mark as verified', 
                    'href' => route('merchants.status-update', ['merchant' => $this, 'status' => $this->is_validated ? 0 : 1]),
                    'type' => 'put'
                ],
                
            ]
        ];
    }
}
