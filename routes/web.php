<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Event;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\IsAdmin;

Route::get('/', fn() => view('home', ['posts' => Post::scopeShownAtHome()]))->name('home');
Route::get('/join', fn() => view('join'))->name('join');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/events', fn() => view('events', ['events' => Event::scopeShown()]))->name('events');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Login routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin routes (protected by is_admin)
Route::middleware(['auth', IsAdmin::class,
])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
    
    Route::resource('posts', AdminPostController::class);
    Route::delete('/imageDestroy/{post}', [AdminPostController::class, 'imageDestroy'])
    ->name('imageDestroy');

    Route::resource('events', AdminEventController::class);
});





