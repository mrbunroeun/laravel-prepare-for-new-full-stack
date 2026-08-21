<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsightDetailSection extends Model
{
    protected $fillable = [
        'page',
        'banner_title',
        'image_left',
        'image_right',
        'body_paragraphs',
        'feature_image',
        'feature_paragraphs',
    ];

    protected $casts = [
        'body_paragraphs'    => 'array',
        'feature_paragraphs' => 'array',
    ];
}
