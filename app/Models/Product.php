<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class Product extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'merchant_id',
        'name',
        'description',
        'category_id',
        'initial_price',
        'featured_image',
        'featured_image_url',
    ];

    /**
     * 
     * Scope functions
     */
    public function scopeFilter($query, $keyword)
    {
        if (! $keyword) {
            return $query;
        }

        $attributes = [
            'products.name',
            'products.description'
        ];

        $attributes = implode(', ', $attributes);

        return $query->whereRaw("
                (CONCAT_WS(' ', {$attributes}) like '%{$keyword}%')
            ");
    }

    /**
     * 
     * Relationship functions
     */
    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function store()
    {
        return $this->belongsToMany(Store::class, 'store_products', 'product_id', 'store_id');
    }
}
