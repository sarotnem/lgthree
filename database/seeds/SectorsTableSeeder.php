<?php

use Illuminate\Database\Seeder;

class SectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sectors')->insert([
            'name' => 'Athens East',
        ]);
        DB::table('sectors')->insert([
            'name' => 'Athens West',
        ]);
        DB::table('sectors')->insert([
            'name' => 'Makedonia',
        ]);
    }
}
