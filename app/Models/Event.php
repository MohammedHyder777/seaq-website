<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'title_en',
        'desc',
        'desc_en',
        'image',
        'location',
        'location_en',
        'location_url',
        'date',
        'time',
        'is_shown',
    ];

    protected $casts = [
        'is_shown' => 'boolean',
        'date' => 'date',
        'time' => 'datetime:H:i',
    ];

    // Scope for public display
    public static function scopeShown()
    {
        // return Event::where('is_shown', true)->order_by('date')->get();
        return Event::where('is_shown', true)
            ->orderBy('date', 'desc')->latest()
            ->orderBy('time', 'desc')->latest()
            ->take(7)
            ->get();
    }
}

