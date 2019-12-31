<?php

namespace App\Providers;

use App\Category;
use App\City;
use App\Country;
use App\Destination;
use App\Nationality;
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

        view()->composer('*', function ($view) {
            $view->with('countries', Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), ''));
        });

        view()->composer('*', function ($view) {
            $view->with('nationalities', Nationality::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), ''));
        });


        view()->composer('*', function ($view) {
            $view->with('destination_countries', Destination::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), ''));
        });



    }
}
