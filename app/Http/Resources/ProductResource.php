<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'image' => $this->featured_image,
            'image_url' => config('app.url') .'/'. str_replace('public', 'storage', $this->featured_image_url),
            'name' => $this->name,
            'description' => $this->description,
            'category' => $this->category->label,
            'initial_price' => $this->initial_price,
            'actions' => [
                ['label' => 'Show', 'href' => route('products.show', $this), 'type' => 'get'],
                ['label' => 'Edit', 'href' => route('products.edit', $this), 'type' => 'get'],
            ]
        ];
    }
}
