<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'label' => $this->label,
            'image' => $this->image,
            'image_url' => config('app.url') .'/'. str_replace('public', 'storage', $this->image_url),
            'actions' => [
                ['label' => 'Edit', 'href' => route('categories.edit', $this), 'type' => 'get'],
                ['label' => 'Delete', 'href' => route('categories.destroy', $this), 'type' => 'get']
            ]
        ];
    }
}
