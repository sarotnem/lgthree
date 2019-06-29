<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment('local')) {
            DB::table('users')->insert([
                'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('secret'),
            'isAdmin' => 1,
                ]);
        }
    }
}
