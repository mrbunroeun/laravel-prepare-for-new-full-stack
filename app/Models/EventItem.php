<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventItem extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'link',
        'link_text',
        'facebook_url',
        'whatsapp_url',
        'telegram_url',
        'sort_order',
        'status',
    ];
}
