<?php

use Illuminate\Support\Facades\Route;
use App\Models\BlogPost;
use Illuminate\Support\Facades\File;



Route::get('/blog', function () {
    $posts = BlogPost::whereNotNull('published_at')->latest()->get();
    return view('blog.index', compact('posts'));
})->name('blog'); 

Route::get('/blog/{slug}', function ($slug) {
    $post = BlogPost::where('slug', $slug)->firstOrFail();
    return view('blog.show', compact('post'));
});

use App\Http\Controllers\Api\StoryController;

Route::post('/story', [StoryController::class, 'generate']);


Route::view('/', 'pages.home')->name('home');
Route::get('/storywriter/{any?}', function () {
    return File::get(public_path('storywriter/index.html'));
})->where('any', '.*');
Route::view('/storybook', 'pages.storywriter')->name('storybook');
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
