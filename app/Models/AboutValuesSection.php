<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutValuesSection extends Model
{
    protected $fillable = [
        'page',
        'cards',
    ];

    protected $casts = [
        'cards' => 'array',
    ];
}