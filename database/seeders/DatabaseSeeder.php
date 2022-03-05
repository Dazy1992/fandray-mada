<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call(UserstableSeeder::class);

    //   for($i = 1; $i <= 9; $i++){
        //    DB::table('groups')->insert([
          //      'name'=>"Groupe $i"
         //   ]);
         //   for($j = 1; $j <= 9; $j++ ){
         //       DB::table('users')->insert([
         //           'name'=> "User{$j}Groupe{$i}",
          //          'email'=> "User{$j}Groupe{$i}@local.dev",
          //          'password'=> bcrypt(0000),
           //         'group_id'=> $i,
          //      ]);
        //    }
     //   }
    }
}
