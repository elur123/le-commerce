<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'merchant_id',
        'name',
        'address',
        'mobile_no',
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
            'stores.name'
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

    public function products()
    {
        return $this->belongsToMany(Product::class, 'store_products', 'store_id', 'product_id')->withPivot('id','inventory', 'price', 'is_available');
    }
}
