<?php

use Illuminate\Support\Facades\Route;
use App\Models\BlogPost;



Route::get('/blog', function () {
    $posts = BlogPost::whereNotNull('published_at')->latest()->get();
    return view('blog.index', compact('posts'));
})->name('blog'); 

Route::get('/blog/{slug}', function ($slug) {
    $post = BlogPost::where('slug', $slug)->firstOrFail();
    return view('blog.show', compact('post'));
});

// Route::get('/storywriter/{any}', fn () => view('storywriter'))->where('any', '.*');


Route::view('/', 'pages.home')->name('home');
Route::view('/storywriter', 'pages.storywriter')->name('storywriter');
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
