<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\PostController as AdminPostController;

Route::get('/', fn() => view('home', ['posts' => Post::scopeShownAtHome()]))->name('home');
Route::get('/join', fn() => view('join'))->name('join');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/events', function () {
    $events = [
        (object)[
            'title' => 'ملتقى الهندسة الحديثة',
            'image_url' => '/images/image.png',
            'date' => '15 نوفمبر 2025',
            'time' => '10:00 صباحاً',
            'location' => 'قاعة مركز قطر للعلوم',
            'description' => 'فعالية تجمع نخبة من المهندسين لعرض أحدث الابتكارات في مجال البناء والتكنولوجيا المستدامة.',

        ],
        (object)[
            'title' => 'ورشة التصميم المستدام',
            // 'image_url' => '/images/image.png',
            'date' => '20 نوفمبر 2025',
            'time' => '3:00 مساءً',
            'location' => 'الدوحة، مبنى النقابة',
            'description' => 'ورشة عملية حول مبادئ التصميم المستدام وطرق دمج الحلول البيئية في المشاريع الحديثة.',

        ],
        (object)[
            'title' => 'المنتدى الهندسي السنوي',
            'image_url' => '/images/image.png',
            'date' => '25 ديسمبر 2025',
            'time' => '5:00 مساءً',
            'location' => 'جامعة قطر',
        ],
    ];

    return view('events', compact('events'));

})->name('events');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('posts', AdminPostController::class);
    Route::delete('/imageDestroy/{post}', [AdminPostController::class, 'imageDestroy'])
    ->name('imageDestroy');
});





