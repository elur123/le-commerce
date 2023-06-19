<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'product_id',
        'inventory',
        'price',
        'is_available',
    ];

    public $timestamps = false;

    protected $casts = [
        'is_available' => 'boolean',
    ];

    /**
     * 
     * Relationship functions
     */

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
}
