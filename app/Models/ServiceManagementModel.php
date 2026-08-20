<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceManagementModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'page',
        'title_line1',
        'title_line2',
        'title_line3',
        'models',
    ];

    protected $casts = [
        'models' => 'array',
    ];
}
