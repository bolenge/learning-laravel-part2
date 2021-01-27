<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        for ($i=1; $i < 11; $i++) { 
            DB::table('users')->insert([
                'name' => 'Nom'.$i,
                'email' => 'email'.$i.'@ptech.com',
                'password' => \bcrypt('password'.$i),
                'admin' => \rand(0,1),
            ]);
        }
    }
}
