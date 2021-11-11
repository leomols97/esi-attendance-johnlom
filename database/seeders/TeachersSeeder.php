<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 2; $i++) { 
            DB::table('teachers')->insert([
                'id' => random_int(0,100000),
                'first_name' => Str::random(10),
                'last_name' => Str::random(10),
                'acronym' => Str::random(10),
            ]);
        }
    }
}
