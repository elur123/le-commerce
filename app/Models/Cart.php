<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'store_product_id',
        'price',
        'quantity',
        'sub_total',
    ];

    public $timestamps = false;

    /**
     * 
     * Relationship functions
     */

    public function storeProduct()
    {
        return $this->belongsTo(StoreProduct::class, 'store_product_id');
    }
}
