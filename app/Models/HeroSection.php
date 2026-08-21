<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $fillable = [
        'page',
        'tagline_html',
        'show_tagline',
        'tagline_box1',
        'tagline_box1_style',
        'tagline_box2',
        'tagline_box2_style',
        'headline',
        'image',
        'show_bullets',
        'bullets',
        'buttons',
    ];

    protected $casts = [
        'show_tagline' => 'boolean',
        'show_bullets' => 'boolean',
        'bullets' => 'array',
        'buttons' => 'array',
    ];
}
