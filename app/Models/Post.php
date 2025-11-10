<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'title_en',
        'image',
        'body',
        'body_en',
        'is_shown',
        'order_at_home',
    ];

    public static function scopeShownAtHome()
    {
        return Post::where('is_shown', true)
            ->orderBy('order_at_home')->latest()
            ->take(5)
            ->get();
    }
}
