<?php

use Illuminate\Support\Facades\Route;
use App\Models\BlogPost;




// Route::get('/', function () {
//     return view('welcome');
// });



// Route::get('/blog', function () {
//     $posts = BlogPost::whereNotNull('published_at')->latest()->get();
//     return view('blog.index', compact('posts'));
// });

Route::get('/blog', function () {
    $posts = BlogPost::whereNotNull('published_at')->latest()->get();
    return view('blog.index', compact('posts'));
})->name('blog'); 

Route::get('/blog/{slug}', function ($slug) {
    $post = BlogPost::where('slug', $slug)->firstOrFail();
    return view('blog.show', compact('post'));
});

Route::view('/', 'pages.home')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
