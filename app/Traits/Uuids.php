<?php

namespace App\Traits;

use Webpatser\Uuid\Uuid;

/**
 * Trait Uuids
 *
 * Generate uuid field
 *
 * @package App\Traits
 */
trait Uuids
{
    /**
     * Boot function from laravel.
     */
    protected static function boot()
    {
        parent::boot();

        $callback = function ($model) {
            // Generate a version 4, truly random, UUID
            $model->{$model->getKeyName()} = $model->{$model->getKeyName()} ?? Uuid::generate(4)->string;
        };

        static::creating($callback);
    }
}
