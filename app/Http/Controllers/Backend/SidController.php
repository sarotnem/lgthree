<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sid;

class SidController extends Controller
{
    public function create(Request $request)
    {
        $sid = Sid::create([
          'airport_id' => $request->airport_id,
          'point' => $request->sid['point'],
          'runway' => $request->sid['runway'],
          'name' => $request->sid['name'],
          'initial_flight_level' => $request->sid['initial_flight_level'],
          'release_flight_level' => $request->sid['release_flight_level']
        ]);

        return $sid;
    }

    public function update(Request $request, $id)
    {
        $sid = Sid::findOrFail($id);

        $sid->name = $request->sid['name'];
        $sid->initial_flight_level = $request->sid['initial_flight_level'];
        $sid->release_flight_level = $request->sid['release_flight_level'];

        $sid->save();
    }

    public function destroy($id)
    {
        Sid::findOrFail($id)->delete();
    }
}
