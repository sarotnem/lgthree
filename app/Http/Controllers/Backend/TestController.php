<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Airport;
use App\Events\WeatherChanged;
use Session;

class TestController extends Controller
{
    public function testMetar($icao)
    {
        $airport = Airport::where('icao', '=', $icao)->with('metar')->first();

        return view('backend.pages.testmetar', compact('airport'));
    }

    public function changeMetar(Request $request, $icao)
    {
        $airport = Airport::where('icao', '=', $icao)->with('metar')->first();

        $metar = $airport->metar;

        $metar->raw_text = $request->raw_text;
        $metar->observation_time = $request->observation_time;
        $metar->wind_direction = $request->wind_direction;
        $metar->wind_speed = $request->wind_speed;
        $metar->wind_gust = $request->wind_gust;
        $metar->wind_variable = $request->wind_variable;
        $metar->wind_calm = $request->wind_calm;

        $metar->save();

        event(new WeatherChanged($airport));
        Session::flash('metar-changed', 'METAR has changed succesfully');

        return back();
    }
}
