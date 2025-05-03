<?php

use Illuminate\Support\Facades\Route;
use App\Models\BlogPost;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Api\StoryController;

use App\Models\Story;



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

Route::post('/story', [StoryController::class, 'generate']);

Route::get('/storywriter/{any?}', function () {
    return File::get(public_path('storywriter/index.html'));
})->where('any', '.*');
Route::view('/storybook', 'pages.storywriter')->name('storybook');

Route::post('/generate-story', [StoryController::class, 'generate']);
Route::get('/stories/{id}', [StoryController::class, 'show']);

Route::get('/stories', function () {
    $stories = Story::latest()->paginate(10);
    return view('stories.index', compact('stories'));
});