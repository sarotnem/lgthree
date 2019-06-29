<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;
use App\Airport;
use App\Taf;
use Carbon\Carbon;
use DB;
use Exception;

class getTafs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:tafs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will get the TAFs for all LG** airports';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $url = 'http://aviationweather.gov/adds/dataserver_current/httpparam?dataSource=tafs&requestType=retrieve&format=xml&stationString=~GR&mostRecentForEachStation=true&hoursBeforeNow=24';

        $client = new Client();

        $result = $client->get($url)->getBody();

        $xml = simplexml_load_string($result);

        $json = json_encode($xml->data, true);

        $jsonDecoded = json_decode($json);

        $tafsAll = collect($jsonDecoded->TAF);

        $airports = Airport::select('id', 'icao', 'weather_station')->orderBy('icao', 'asc')->get();

        try {
            foreach ($airports as $airport) {
                if (!$airport->weather_station) {
                    $tafFromApi = $tafsAll->where('station_id', '=', $airport->icao)->first();
                } else {
                    $tafFromApi = $tafsAll->where('station_id', '=', $airport->weather_station)->first();
                }

                if (!$tafFromApi) {
                    continue;
                }

                $tafRecord = Taf::where('airport_id', '=', $airport->id)->first();

                if ($tafRecord->raw_text != $tafFromApi->raw_text) {
                    $tafRecord->raw_text = $tafFromApi->raw_text;
                    $tafRecord->save();
                    echo 'Updated TAF for: '.$airport->icao."\n";
                }
            }
        } catch (Exception $e) {
            $this->error($e->getMessage());
            echo 'For Airport: '.$airport->icao."\n";
        }

        $this->info('Tafs fetched!');
    }
}
