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
        $coursesGroups = DB::table('courses_groups')->pluck('id');
        $faker = Faker::create();
        for ($i=0; $i < 2; $i++) {
            DB::table('seances')->insert([
                'id' => $i,
                'course_group' => $faker->randomElement($coursesGroups),
                'start_time' => ('2021-12-03 08:15:00'),
                'end_time' => ('2021-12-03 10:15:00'),
                'local' => random_int(0,100),
            ]);
        }
    }
}
