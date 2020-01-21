<?php

namespace App\Providers;

use App\Agent;
use App\Category;
use App\City;
use App\Country;
use App\Destination;
use App\Employer;
use App\Industry;
use App\Nationality;
use App\Visa;
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
            $view->with('search_categories', Category::all());
        });

        view()->composer(['frontend.*', 'auth.register'], function ($view) {
            $view->with('countries', Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), ''));
        });

        view()->composer('*', function ($view) {
            $view->with('nationalities', Nationality::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), ''));
        });



        view()->composer('*', function ($view) {
            $view->with('destinations', Destination::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), ''));
        });


        view()->composer('*', function ($view) {
            $view->with('expected_industries', Industry::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), ''));
        });

        view()->composer('auth.register', function ($view) {
            $view->with('agents', Agent::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), ''));
        });

        view()->composer('auth.register', function ($view) {
            $view->with('employers', Employer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), ''));
        });

        view()->composer('auth.register', function ($view) {
            $view->with('industries', Industry::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), ''));
        });

        // Header Search


        view()->composer('*', function ($view) {
            $view->with('search_destinations', Destination::all()->pluck('name', 'id'));
            $view->with('search_countries', Country::all()->pluck('name', 'id'));
            $view->with('search_visas', Visa::all()->pluck('name', 'id'));
            $view->with('search_cities', City::where('country_id','!=',105)->orderBy('name')->pluck('name', 'id'));
            $view->with('search_industries',Industry::all()->pluck('name', 'id'));
            $view->with('search_areas',City::where('country_id',105)->orderBy('name')->pluck('name', 'id'));

        });
     //Search Result
        view()->composer('frontend.search', function ($view) {
            $view->with('search_cities', City::all());
            $view->with('categories_all', Category::all());

        });


    }
}
