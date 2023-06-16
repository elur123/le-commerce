<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentValidation extends Model
{
    use HasFactory;

    protected $fillable = [
        'merchant_id',
        'document',
        'document_url',
        'notes',
        'status_id'
    ];

    /**
     * 
     * Relationship functions
     */

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
