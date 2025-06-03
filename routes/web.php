<?php

use Illuminate\Support\Facades\Route;
use App\Models\BlogPost;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Api\StoryController;

use App\Models\Story;
use App\Http\Controllers\StorybookLoginController;


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

// Redirect default auth middleware to storybook login if using storybook guard
Route::get('/login', fn () => redirect('/storybook/login'))->name('login');


Route::middleware('auth:storybook')->group(function () {
    Route::view('/storybook', 'pages.storywriter')->name('storybook');
});

Route::get('/storybook/login', [StorybookLoginController::class, 'show'])->name('storybook.login');
Route::post('/storybook/login', [StorybookLoginController::class, 'login'])->name('storybook.login.submit');
Route::get('/storybook/logout', [StorybookLoginController::class, 'logout'])->name('storybook.logout');





Route::get('/stories', function () {
    $stories = Story::latest()->paginate(10);
    return view('stories.index', compact('stories'));
});

Route::get('/stories/{id}', [StoryController::class, 'show']);
