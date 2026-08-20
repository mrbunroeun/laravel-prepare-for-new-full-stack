<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutStorySection extends Model
{
    protected $fillable = [
        'page',
        'tagline',
        'headline',
        'paragraphs',
        'image_left',
        'image_top_right',
        'image_bottom_right',
    ];

    protected $casts = [
        'paragraphs' => 'array',
    ];
}