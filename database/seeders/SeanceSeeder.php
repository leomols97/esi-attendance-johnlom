<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class SeanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = DB::table('courses')->pluck('id');
        $teachers = DB::table('teachers')->pluck('id');
        $faker = Faker::create();
        for ($i=0; $i < 2; $i++) { 
            DB::table('seances')->insert([
                'id' => random_int(0,10000),
                'start_time' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),
                'end_time' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),
                'course_id' => $faker->randomElement($courses),
                'teacher_id' => $faker->randomElement($teachers),
            ]);
        }
    }
}