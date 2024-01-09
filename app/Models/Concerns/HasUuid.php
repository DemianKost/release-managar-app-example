<?php

declare(strict_types=1);;

namespace App\Models\Concerns;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

trait HasUuid
{
    /**
     * @return void
     */
    public static function bootHasUuid(): void
    {
        static::creating(
            callback: fn (Model $model) => $model->uuid = Str::uuid()->toString()
        );
    }
}