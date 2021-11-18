<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
<<<<<<< HEAD
        for ($i=0; $i < 5; $i++) { 
=======
        for ($i=0; $i < 2; $i++) { 
>>>>>>> 6be989e2970236e87379e8558ff705391a38518f
            DB::table('groups')->insert([
                'name' => Str::random(10),
            ]);
        }
    }
}
