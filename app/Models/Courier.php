<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'contact_no',
        'email',
        'logo_name',
        'logo_url',
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
            'couriers.name',
            'couriers.email'
        ];

        $attributes = implode(', ', $attributes);

        return $query->whereRaw("
                (CONCAT_WS(' ', {$attributes}) like '%{$keyword}%')
            ");
    }
}
