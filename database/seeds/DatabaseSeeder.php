<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
         DB::table('users')->insert([
               'name'=>"Shovon Bhowmick",
               "email"=>"shovon2464@gmail.com",
               "password"=>Hash::make('123456'),
               "role"=>"admin",
               ]);

    }
}


