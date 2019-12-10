<?php

namespace App\Providers;

use App\Category;
use App\City;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('frontend.*', function ($view) {
            $view->with('search_cities', City::all());
            $view->with('categories_all', Category::all());
        });

        view()->composer('frontend.*', function ($view) {
            $view->with('search_categories', Category::all());
        });


    }
}
