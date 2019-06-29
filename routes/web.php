<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/', 'PagesController@home')->name('home');

    Route::get('home', function () {
        return redirect()->route('home');
    });

    Route::get('airports/{airportICAO}', 'AirportController@show')->name('airport.show');

    Route::get('airports/{icao}/charts/{name}', 'AirportController@showChart')->name('frontend.chart.show');

    Route::post('favorite/{airport}', 'AirportController@favoriteAirport')->name('airport.favorite');

    Route::post('unfavorite/{airport}', 'AirportController@unfavoriteAirport')->name('airport.unfavorite');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Backend', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'PagesController@dashboard')->name('backend.dashboard');

    Route::resource('airports', 'AirportController');

    Route::get('airports/{id}/charts/{name}', 'ChartController@show')->name('backend.chart.show');

    Route::get('test/metar/{icao}', 'TestController@testMetar')->name('test.metar');

    Route::post('test/metar/{icao}', 'TestController@changeMetar')->name('test.metar');

    Route::resource('users', 'UserController');

    Route::group(['prefix' => 'ajax'], function () {
        Route::post('charts/create', 'ChartController@create')->name('ajax.charts.add');
        Route::put('charts/{name}', 'ChartController@update')->name('ajax.charts.update');
        Route::delete('charts/{name}', 'ChartController@destroy')->name('ajax.charts.destroy');

        Route::post('runways/create', 'RunwayController@create')->name('ajax.runways.add');
        Route::put('runways/{id}', 'RunwayController@update')->name('ajax.runways.update');
        Route::delete('runways/{id}', 'RunwayController@destroy')->name('ajax.runways.destroy');

        Route::post('sids/create', 'SidController@create')->name('ajax.sids.add');
        Route::put('sids/{id}', 'SidController@update')->name('ajax.sids.update');
        Route::delete('sids/{id}', 'SidController@destroy')->name('ajax.sids.destroy');

        Route::post('stars/create', 'StarController@create')->name('ajax.stars.add');
        Route::put('stars/{id}', 'StarController@update')->name('ajax.stars.update');
        Route::delete('stars/{id}', 'StarController@destroy')->name('ajax.stars.destroy');
    });
});
