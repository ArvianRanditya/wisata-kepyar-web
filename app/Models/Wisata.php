<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $fillable = [
        'name',
        'category',
        'price',
        'image',
        'description',
        'highlights',
        'duration',
        'best_time',
        'activities',
    ];

    protected $casts = [
        'highlights' => 'array',
    ];
}
