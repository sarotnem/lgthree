<?php

use Illuminate\Database\Seeder;
use App\Airport;

class MetarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $airports = Airport::select('id')->orderBy('id', 'asc')->get();

        foreach ($airports as $airport) {
            DB::table('metars')->insert([
          'airport_id' => $airport->id,
          'raw_text' => '-',
          'wind_direction' => 0,
          'wind_speed' => 0
        ]);
        }
    }
}
