<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class CourseGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = DB::table('courses')->pluck('ue');
        $groups = DB::table('groups')->pluck('name');
        $faker = Faker::create();
        for ($i=0; $i < 2; $i++) { 
            DB::table('courses_groups')->insert([
                'id' => $i,
                'course_id' => $faker->randomElement($courses),
                'group_id' => $faker->randomElement($groups),
            ]);
        }
    }
}
