<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Models\Post;
use App\Models\Event;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\IsAdmin;
use App\Models\Setting;
use Illuminate\Support\Str;


Route::get('/', fn() => view('home', ['posts' => Post::scopeShownAtHome()]))->name('home');
Route::get('/events', fn() => view('events', ['events' => Event::scopeShown()]))->name('events');
Route::get('/join', fn() => view('join'))->name('join');
// Route::get('/career', fn() => view('career'))->name('career');
Route::get('/career', function () {
    $dir = public_path('library');
    $files = collect(scandir($dir))
        ->filter(fn($file) => Str::endsWith($file, '.pdf'))
        ->map(function ($file) {
            $name = basename($file, '.pdf'); // "filename - author"
            $parts = explode(' - ', $name);

            return [
                'title' => $parts[0] ?? 'Unknown Title',
                'author' => $parts[1] ?? '-',
                'path' => asset('library/' . $file),
            ];
        });

    return view('career', ['files' => $files]);
})->name('career');
Route::get('/about', fn() => view('about', ['content' => Setting::get(app()->getLocale() == "ar" ? "about_us_content" : "about_us_content_en")]))->name('about');
Route::get('/newsletter', fn() => view('newsletter'))->name('newsletter');
Route::get('/profile', fn() => view('profile'))->name('profile');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Language route
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['ar', 'en'])) {
        session(['locale' => $locale]); // The middleware will sret the this value as the App locale
        // app()->setLocale($locale);
    }

    return redirect()->back();
})->name('lang.switch');


// Login routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin routes (protected by is_admin)
Route::middleware([
    'auth',
    IsAdmin::class,
])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');

    Route::post('/setProfilePdf', [SettingController::class, 'uploadProfilePdf'])
        ->name('setProfilePdf');
    Route::post('/setNewsletterPdf', [SettingController::class, 'uploadNewsletterPdf'])
        ->name('setNewsletterPdf');
    Route::post('/changePassword', [AuthController::class, 'changePassword'])
        ->name('changePassword');

    Route::get('/aboutus', [SettingController::class, 'editAboutUs'])->name('aboutus');
    Route::post('/aboutus', [SettingController::class, 'updateAboutUs'])->name('aboutus.update');


    Route::resource('posts', AdminPostController::class);
    Route::delete('/imageDestroy/{post}', [AdminPostController::class, 'imageDestroy'])
        ->name('imageDestroy');

    Route::resource('events', AdminEventController::class);
});
