<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;



class BlogPost extends Model
{


    protected $fillable = [
        'title',
        'author_id',
        'excerpt',
        'cover_image',
        'slug',
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
