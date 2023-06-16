<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasUuid
{
    public static function bootHasUuid()
    {
        static::creating(function ($model) {
            $model->uuid = str_replace('-', '', Str::uuid());
        });
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
