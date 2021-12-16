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
        for ($i=1; $i <= 2; $i++) {
            DB::table('seances')->insert([
                'id' => $i,
                'course_group' => 0,
                'start_time' => ('2021-12-16 14:45:00'),
                'end_time' => ('2021-12-16 18:00:00'),
                'local' => random_int(0,100),
            ]);
        }
    }
}