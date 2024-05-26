<?php

// use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            
            'name' => 'Administrator',
            'username'	=> 'kelompok2',
            'email'	=> 'admin@exampole.com',
            'password'	=> bcrypt('kelompok2_wangiagung'),
        ]);
    }
}
