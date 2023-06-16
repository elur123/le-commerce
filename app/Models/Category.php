<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'image',
        'image_url',
    ];

    public $timestamps = false;
    


    public function scopeFilter($query, $keyword)
    {
        if (! $keyword) {
            return $query;
        }

        $attributes = [
            'categories.label',
        ];

        $attributes = implode(', ', $attributes);

        return $query->whereRaw("
                (CONCAT_WS(' ', {$attributes}) like '%{$keyword}%')
            ");
    }
}
