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
}
