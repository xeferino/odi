<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Tags\Tag;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $tags = Tag::ordered()->get();
        View::share('categories', $tags);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
