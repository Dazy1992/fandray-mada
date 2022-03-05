<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++){
            DB::table('users')->insert([
                'name'=>"Exelle$i",
                'email'=>"exelle$i@gmail.com",
                'password'=>bcrypt('0000')
            ]);
        }
    }
}
