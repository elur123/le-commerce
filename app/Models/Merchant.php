<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;


use App\Models\Role;
class Merchant extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'mobile_no',
        'logo',
        'logo_url',
        'is_validated',
    ];

    protected $casts = [
        'is_validated' => 'boolean',
    ];

    /**
     * 
     * Scope functions
     */

    public function scopeMerchant(Builder $query)
    {
        return $query->whereHas('user', function($query) {

            $query->where('users.role_id', Role::IS_USER);
        });
    }

    /**
     * 
     * Relationship functions
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function step()
    {
        return $this->hasOne(MerchantStep::class, 'merchant_id');
    }

    public function documents()
    {
        return $this->hasMany(DocumentValidation::class, 'merchant_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'merchant_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'merchant_id');
    }
}
