<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Airport;
use Cache;
use Auth;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['frontend.partials.sidebar', 'backend.partials.sidebar'], function ($view) {
            $airports = Cache::remember('airports', 60, function () {
                return Airport::with('sector')->orderBy('icao')->get();
            });

            $airportsByFir = $airports->groupBy('sector.name')->sortKeys();

            $view->with('airportsByFir', $airportsByFir);
        });

        view()->composer('frontend.partials.aside', function ($view) {
            $userFavorites = Auth::user()->favorites;

            $view->with('favorites', $userFavorites);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
