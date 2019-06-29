<?php

use Illuminate\Database\Seeder;
use App\Airport;

class TafsTableSeeder extends Seeder
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
            DB::table('tafs')->insert([
        'airport_id' => $airport->id,
        'raw_text' => '-'
      ]);
        }
    }
}
