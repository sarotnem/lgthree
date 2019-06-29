<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Airport;
use Session;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airports = Airport::orderBy('icao')->get();
        return view('backend.airports.index', compact('airports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $airport = Airport::where('id', '=', $id)->with(['runways', 'sids', 'stars', 'charts'])->firstOrFail();

        return view('backend.airports.edit', compact('airport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $airport = Airport::find($id);

        $airport->icao = $request->icao;
        $airport->iata = $request->iata;
        $airport->name = $request->name;
        $airport->city = $request->city;
        $airport->lat = $request->lat;
        $airport->lon = $request->lon;
        $airport->elevation = $request->elevation;
        $airport->transition_altitude = $request->transition_altitude;
        $airport->msa = $request->msa;
        $airport->weather_station = $request->weather_station;
        $airport->maps_zoom = $request->maps_zoom;
        $airport->vfr_overview = $request->vfr_overview;
        $airport->procedures = $request->procedures;
        $airport->sector_id = $request->sector_id;

        $airport->save();

        Session::flash('airport-saved', 'METAR has changed succesfully');

        return redirect()->route('airports.edit', $airport->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(404);
    }
}
