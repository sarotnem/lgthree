<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;
use App\Airport;
use App\Notam;

class getNotams extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:notams';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will get the NOTAMs for all LG** airports';

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
        $airports = Airport::select('id', 'icao')->get();

        $icaoString = array_map('array_pop', $airports->toArray());
        $icaoString = implode(',', $icaoString);

        Notam::truncate();

        $url = 'http://api.vateud.net/notams/'.$icaoString.'.json';

        $client = new Client();

        $result = $client->get($url)->getBody()->getContents();

        $notamsAll = collect(json_decode($result));

        foreach ($airports as $airport) {
            $notamsFromApi = $notamsAll->where('icao', '=', $airport->icao);

            foreach ($notamsFromApi as $notam) {
                Notam::create([
              'airport_id' => $airport->id,
              'raw_text' => $notam->raw,
              'message' => $notam->message
            ]);
            }

            echo 'NOTAMS fetched for: '.$airport->icao."\n";
        }

        $this->info('Notams fetched!');
    }
}
