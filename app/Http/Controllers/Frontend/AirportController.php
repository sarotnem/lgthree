<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Airport;
use Auth;
use Response;

class AirportController extends Controller
{
    public function show($airportICAO)
    {
        $airport = Airport::whereIcao($airportICAO)->with(['metar', 'metar.clouds', 'taf', 'notams', 'runways', 'sids', 'stars', 'charts'])->firstOrFail();

        $airport->getActiveRunways();

        return view('frontend.pages.airport', compact('airport'));
    }

    public function showChart($icao, $name)
    {
        $filename = $name;
        $path = storage_path('app/charts/'.$icao.'/'.$filename);

        return Response::make(file_get_contents($path), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="'.$filename.'"'
                ]);
    }

    public function favoriteAirport(Airport $airport)
    {
        Auth::user()->favorites()->attach($airport->id);
    }

    public function unfavoriteAirport(Airport $airport)
    {
        Auth::user()->favorites()->detach($airport->id);
    }
}
