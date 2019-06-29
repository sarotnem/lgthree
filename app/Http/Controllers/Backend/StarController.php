<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Star;

class StarController extends Controller
{
    public function create(Request $request)
    {
        $star = Star::create([
        'airport_id' => $request->airport_id,
        'point' => $request->star['point'],
        'runway' => $request->star['runway'],
        'name' => $request->star['name'],
        'entry_flight_level' => $request->star['entry_flight_level'],
      ]);

        return $star;
    }

    public function update(Request $request, $id)
    {
        $star = Star::findOrFail($id);

        $star->name = $request->star['name'];
        $star->entry_flight_level = $request->star['entry_flight_level'];

        $star->save();
    }

    public function destroy($id)
    {
        Star::findOrFail($id)->delete();
    }
}
