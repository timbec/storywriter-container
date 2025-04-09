<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// added by copilot. 
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'body',
        'cover_image',
        'published_at',
    ];
}
