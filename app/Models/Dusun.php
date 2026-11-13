<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    protected $fillable = [
        'name',
        'kadus',
        'kk',
        'pilar',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];
}

