<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AirportsTableSeeder::class);
        $this->call(RunwaysTableSeeder::class);
        $this->call(SidTableSeeder::class);
        $this->call(StarsTableSeeder::class);
        $this->call(SectorsTableSeeder::class);
        $this->call(ChartsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MetarsTableSeeder::class);
        $this->call(TafsTableSeeder::class);
    }
}
