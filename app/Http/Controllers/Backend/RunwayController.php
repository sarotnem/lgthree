<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Runway;

class RunwayController extends Controller
{
    public function create(Request $request)
    {
        $runway = Runway::create([
          'airport_id' => $request->airport_id,
          'designator' => $request->runway['designator'],
          'preferred_arrival' => $request->runway['preferred_arrival'],
          'preferred_departure' => $request->runway['preferred_departure'],
          'heading' => $request->runway['heading'],
          'length' => $request->runway['length'],
          'elevation' => $request->runway['elevation'],
          'ils' => $request->runway['ils'],
          'ils_frequency' => $request->runway['ils_frequency'],
          'glidepath' => $request->runway['glidepath'],
          'arrival_lat' => $request->runway['arrival_lat'],
          'arrival_lon' => $request->runway['arrival_lon'],
          'departure_lat' => $request->runway['departure_lat'],
          'departure_lon' => $request->runway['departure_lon']
        ]);

        return $runway;
    }

    public function update(Request $request, $id)
    {
        $runway = Runway::findOrFail($id);

        $runway->designator = $request->runway['designator'];
        $runway->preferred_arrival = $request->runway['preferred_arrival'];
        $runway->preferred_departure = $request->runway['preferred_departure'];
        $runway->heading = $request->runway['heading'];
        $runway->length = $request->runway['length'];
        $runway->elevation = $request->runway['elevation'];
        $runway->ils = $request->runway['ils'];
        $runway->ils_frequency = $request->runway['ils_frequency'];
        $runway->glidepath = $request->runway['glidepath'];
        $runway->arrival_lat = $request->runway['arrival_lat'];
        $runway->arrival_lon = $request->runway['arrival_lon'];
        $runway->departure_lat = $request->runway['departure_lat'];
        $runway->departure_lon = $request->runway['departure_lon'];

        $runway->save();

        return $runway;
    }

    public function destroy($id)
    {
        Runway::destroy($id);
    }
}
