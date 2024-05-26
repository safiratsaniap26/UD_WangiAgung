<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            
            'name' => 'Administrator',
            'username'	=> 'kelompok2',
            'email'	=> 'admin@exampole.com',
            'password'	=> bcrypt('kelompok2_wangiagung'),
        ]);
    }
}
