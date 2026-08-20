<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceFeaturedProperty extends Model
{
    protected $table = 'service_featured_properties';

    protected $fillable = [
        'page',
        'grade',
        'title',
        'subtitle',
        'description',
        'status',
        'image',
        'detail_images',
        'link',
        'link_text',
        'sort_order',
        'publish_status',
    ];

    protected $casts = [
        'detail_images' => 'array',
        'sort_order' => 'integer',
    ];
}
