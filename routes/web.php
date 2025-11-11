<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Event;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\EventController as AdminEventController;

Route::get('/', fn() => view('home', ['posts' => Post::scopeShownAtHome()]))->name('home');
Route::get('/join', fn() => view('join'))->name('join');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/events', fn() => view('events', ['events' => Event::scopeShown()]))->name('events');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('posts', AdminPostController::class);
    Route::delete('/imageDestroy/{post}', [AdminPostController::class, 'imageDestroy'])
    ->name('imageDestroy');

    Route::resource('events', AdminEventController::class);
});





