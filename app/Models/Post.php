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

    public function scopeShownAtHome($query)
    {
        return $query->where('is_shown', true)
                    ->orderBy('order_at_home');
    }
}
