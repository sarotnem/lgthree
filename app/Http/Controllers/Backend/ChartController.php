<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Chart;
use App\Airport;
use Storage;
use Response;

class ChartController extends Controller
{
    public function show($id, $name)
    {
        $icao = Airport::whereId($id)->select('icao')->firstOrFail()->icao;
        $filename = $name;
        $path = storage_path('app/charts/'.$icao.'/'.$filename);

        return Response::make(file_get_contents($path), 200, [
              'Content-Type' => 'application/pdf',
              'Content-Disposition' => 'inline; filename="'.$filename.'"'
              ]);
    }

    public function create(Request $request)
    {
        $file = $request->file('file');

        $chart = new Chart();

        $chart->airport_id = $request->airport_id;
        $chart->name = getFileOriginalName($file);
        $chart->extension = getFileOriginalExtension($file);
        $chart->runway = null;
        $chart->tags = null;

        $chart->save();

        $airport_icao = Airport::where('id', '=', $request->airport_id)->first()->icao;

        Storage::putFileAs('/charts/'.$airport_icao, $file, $file->getClientOriginalName());

        return $chart;
    }

    public function update(Request $request, $name)
    {
        $chart = Chart::whereId($request->chart['id'])->with('airport')->first();

        if ($chart->name != $request->chart['name']) {
            $icao = $chart->airport->icao;

            $oldPath = 'charts/'.$icao.'/'.$chart->full_filename;

            $newPath = 'charts/'.$icao.'/'.$request->chart['name'].'.'.$chart->extension;

            Storage::move($oldPath, $newPath);
        }

        $chart->name = $request->chart['name'];
        $chart->runway = $request->chart['runway'];
        $chart->tags = $request->chart['tags'];

        $chart->save();

        return $chart;
    }

    public function destroy($id)
    {
        $chart = Chart::findOrFail($id);
        $airport_icao = Airport::where('id', '=', $chart->airport_id)->first()->icao;

        Storage::delete('/charts/'.$airport_icao.'/'.$chart->name.'.'.$chart->extension);
        $chart->delete();
    }
}
