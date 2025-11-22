<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $view->with('lang', app()->getLocale());  // This variable can be used in all of the views
        });

        Carbon::setLocale(app()->getLocale()); // whenever App::setLocale('ar') or App::setLocale('en') is called Carbon local will change
    }
}
