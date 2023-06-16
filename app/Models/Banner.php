<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sub_title',
        'image_name',
        'image_url',
        'is_display',
    ];

    public function scopeFilter($query, $keyword)
    {
        if (! $keyword) {
            return $query;
        }

        $attributes = [
            'banners.name',
        ];

        $attributes = implode(', ', $attributes);

        return $query->whereRaw("
                (CONCAT_WS(' ', {$attributes}) like '%{$keyword}%')
            ");
    }
}
