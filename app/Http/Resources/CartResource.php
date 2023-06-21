<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\StoreProductResource;
class CartResource extends JsonResource
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
            'store_product_id' => $this->store_product_id,
            'price' => number_format($this->price, 2, '.', ','),
            'quantity' => $this->quantity,
            'sub_total' => number_format($this->sub_total, 2, '.', ','),
            'details' => new StoreProductResource($this->whenLoaded('storeProduct'))
        ];
    }
}
