<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturedProperty extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'link',
        'link_text',
        'sort_order',
        'status',
    ];
}
