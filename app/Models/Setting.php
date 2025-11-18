<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];


    public static function get($key, $default = null) {
        return cache()->rememberForever("setting_$key", function () use ($key, $default) {
            return static::where('key', $key)->value('value') ?? $default;
        });
    }

    public static function set($key, $value) {
        cache()->forget("setting_$key");
        // Cache::forget("setting_$key");

        return static::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }
}
