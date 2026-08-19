<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicesSection extends Model
{
    protected $fillable = [
        'page',
        'section_title',
        'image_url',
        'cards',
    ];

    protected $casts = [
        'cards' => 'array',
    ];
}
