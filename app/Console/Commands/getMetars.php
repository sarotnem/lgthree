<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Airport;
use App\Metar;
use App\MetarCloud;
use Carbon\Carbon;
use DB;
use Exception;

use App\Events\WeatherChanged;

class getMetars extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:metars';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will get the METARs for all LG** airports';

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
        $url = 'http://aviationweather.gov/adds/dataserver_current/httpparam?dataSource=metars&requestType=retrieve&format=xml&stationString=~GR&mostRecentForEachStation=true&hoursBeforeNow=24';

        $client = new Client();

        $result = $client->get($url)->getBody();

        $xml = simplexml_load_string($result);

        $json = json_encode($xml->data, true);

        $jsonDecoded = json_decode($json);

        $metarsAll = collect($jsonDecoded->METAR);

        $airports = Airport::select('id', 'icao', 'weather_station')->orderBy('icao', 'asc')->get();

        try {
            foreach ($airports as $airport) {
                //GET METAR FROM THE API
                if (!$airport->weather_station) {
                    $metarFromApi = $metarsAll->where('station_id', '=', $airport->icao)->first();
                } else {
                    $metarFromApi = $metarsAll->where('station_id', '=', $airport->weather_station)->first();
                }

                if (!$metarFromApi) {
                    continue;
                }

                //ADD METAR TO THE DATABASE
                $metarRecord = Metar::where('airport_id', '=', $airport->id)->first();

                if ($metarRecord->raw_text != $metarFromApi->raw_text) {
                    $metarRecord->raw_text = $metarFromApi->raw_text;
                    $metarRecord->observation_time = Carbon::createFromTimestamp(strtotime($metarFromApi->observation_time))->toDateTimeString();
                    $metarRecord->temperature = $metarFromApi->temp_c;
                    $metarRecord->dewpoint = $metarFromApi->dewpoint_c;
                    $metarRecord->barometer = round($metarFromApi->altim_in_hg*33.8637526);

                    if (isset($metarFromApi->visibility_statute_mi)) {
                        $metarRecord->visibility = $metarFromApi->visibility_statute_mi*1609.344;
                    }

                    //WINDS
                    if (isset($metarFromApi->wind_dir_degrees)) {
                        $metarRecord->wind_direction = $metarFromApi->wind_dir_degrees;
                    }
                    if (isset($metarFromApi->wind_speed_kt)) {
                        $metarRecord->wind_speed = $metarFromApi->wind_speed_kt;
                    }
                    if (isset($metarFromApi->wind_gust_kt)) {
                        $metarRecord->wind_gust = $metarFromApi->wind_gust_kt;
                    }

                    if ($metarRecord->wind_direction == 0) {
                        if ($metarRecord->wind_speed == 0) {
                            $metarRecord->wind_calm = true;
                            $metarRecord->wind_variable = null;
                        } else {
                            $metarRecord->wind_variable = true;
                            $metarRecord->wind_calm = null;
                        }
                    } else {
                        $metarRecord->wind_calm = null;
                        $metarRecord->wind_variable = null;
                    }

                    $metarRecord->save();

                    echo 'Updated METAR for: '.$airport->icao."\n";

                    MetarCloud::where('metar_id', '=', $metarRecord->id)->delete();

                    if (!isset($metarFromApi->sky_condition)) {
                        MetarCloud::create([
                  'metar_id' => $metarRecord->id,
                  'cover' => 'none',
                  'base' => 0
                ]);
                    } else {
                        if (count((array)$metarFromApi->sky_condition) == 1) {
                            if ($metarFromApi->sky_condition->{'@attributes'}->sky_cover == 'CAVOK') {
                                MetarCloud::create([
                          'metar_id' => $metarRecord->id,
                          'cover' => 'CAVOK',
                          'base' => -1
                        ]);
                            } elseif ($metarFromApi->sky_condition->{'@attributes'}->sky_cover == 'CLR') {
                                MetarCloud::create([
                          'metar_id' => $metarRecord->id,
                          'cover' => 'CLR',
                          'base' => -1
                        ]);
                            } else {
                                MetarCloud::create([
                          'metar_id' => $metarRecord->id,
                          'cover' => $metarFromApi->sky_condition->{'@attributes'}->sky_cover,
                          'base' => $metarFromApi->sky_condition->{'@attributes'}->cloud_base_ft_agl
                        ]);
                            }
                        } else {
                            foreach ($metarFromApi->sky_condition as $condition) {
                                MetarCloud::create([
                        'metar_id' => $metarRecord->id,
                        'cover' => $condition->{'@attributes'}->sky_cover,
                        'base' => $condition->{'@attributes'}->cloud_base_ft_agl
                      ]);
                            }
                        }
                    }

                    event(new WeatherChanged($airport));
                } else {
                    echo 'METAR has not changed for: '.$airport->icao."\n";
                }
            }
        } catch (Exception $e) {
            $this->error($e->getMessage());
            echo 'For Airport: '.$airport->icao."\n";
        }

        $this->info('Metars fetched!');
    }
}
