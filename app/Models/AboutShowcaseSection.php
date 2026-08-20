<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutShowcaseSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'page',
        'image_1',
        'image_2',
        'image_3',
        'alt_1',
        'alt_2',
        'alt_3',
    ];
}