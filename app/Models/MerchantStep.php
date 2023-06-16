<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantStep extends Model
{
    use HasFactory;

    const INFORMATION = 1;
    const DOCUMENTATION = 2;
    const VALIDATION = 3;

    protected $fillable = ['merchant_id', 'step'];

    public $timestamps = false;
}
