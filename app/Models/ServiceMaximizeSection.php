<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceMaximizeSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'page',
        'title',
        'image',
        'alt_text',
        'paragraphs',
    ];

    protected $casts = [
        'paragraphs' => 'array',
    ];
}
