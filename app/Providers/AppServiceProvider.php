<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // View::share('name', 'Masud');

        View::composer('front-end.includes.menu', function($view)
        {
            $publishedCategories = Category::where('publicationStatus', 1)->get();
            $view->with('publishedCategories',$publishedCategories);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
