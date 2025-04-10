<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;



class BlogPost extends Model
{

    protected $fillable = [
        'title',
        'excerpt',
        'cover_image',
        'body',
        'published_at',
    ];
    
    protected static function booted(): void
{
    static::creating(function ($post) {
        $post->slug = Str::slug($post->title);
    });
}
    
}
