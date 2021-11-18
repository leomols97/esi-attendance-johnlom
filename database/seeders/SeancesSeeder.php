<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class SeancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        $courses = DB::table('courses')->pluck('id');
=======
        $courses = DB::table('courses')->pluck('ue');
>>>>>>> 6be989e2970236e87379e8558ff705391a38518f
        $faker = Faker::create();
        for ($i=0; $i < 2; $i++) { 
            DB::table('seances')->insert([
                'id' => $i,
                'start_time' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),
                'end_time' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),
                'course_id' => $faker->randomElement($courses),
                'local' => random_int(0,100),
            ]);
        }
    }
}
