<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyChooseUsSection extends Model
{
    protected $fillable = [
        'page',
        'heading_line_1',
        'heading_line_2',
        'text_align',
        'items',
    ];

    protected $casts = [
        'items' => 'array',
    ];
}
