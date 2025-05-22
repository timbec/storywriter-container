<?php

use Illuminate\Support\Facades\Route;
use App\Models\BlogPost;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Api\StoryController;

use App\Models\Story;
use App\Livewire\StorybookLogin;


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


Route::middleware('auth')->group(function () {
    Route::get('/storybook', fn () => view('storywriter.dashboard'))->name('storywriter.dashboard');
});

// Route for login to storybook
Route::get('/storybook/login', StorybookLogin::class)->name('storywriter.login');


Route::get('/storywriter/{any?}', function () {
    return File::get(public_path('storywriter/index.html'));
})->where('any', '.*');
Route::view('/storybook', 'pages.storywriter')->name('storybook');


Route::get('/stories', function () {
    $stories = Story::latest()->paginate(10);
    return view('stories.index', compact('stories'));
});

Route::get('/stories/{id}', [StoryController::class, 'show']);
