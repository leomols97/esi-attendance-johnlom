<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class SeanceGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seances = DB::table('seances')->pluck('id');
        $groups = DB::table('groups')->pluck('id');
        $faker = Faker::create();
        for ($i=0; $i < 2; $i++) { 
            DB::table('seance_groups')->insert([
                'id' => random_int(0,10000),
                'seance_id' => $faker->randomElement($seances),
                'group_id' => $faker->randomElement($groups),
            ]);
        }
    }
}