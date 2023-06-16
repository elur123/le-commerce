<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
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
            'title' => $this->title,
            'sub_title' => $this->sub_title,
            'is_display' => $this->is_display ? 'True' : 'False',
            'image' => $this->image_name,
            'image_url' => config('app.url') .'/'. str_replace('public', 'storage', $this->image_url),
            'actions' => [
                ['label' => 'Show', 'href' => route('settings.banners.show', $this), 'type' => 'get'],
                ['label' => 'Edit', 'href' => route('settings.banners.edit', $this), 'type' => 'get'],
            ]
        ];
    }
}
