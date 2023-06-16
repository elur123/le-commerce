<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    const PENDING = 1;
    const APPROVED = 2;
    const DECLINED = 3; 

    protected $fillable = ['label'];

    public $timestamps = false;
}
