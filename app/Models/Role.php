<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [ 'label' ];

    public $timestamps = false;

    const IS_ADMIN = 1;
    const IS_USER = 2;
}
