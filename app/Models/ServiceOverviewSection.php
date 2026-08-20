<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOverviewSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'page',
        'image',
        'alt_text',
        'title_line1',
        'title_line2',
        'title_line3',
        'description',
    ];
}
