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
<<<<<<< HEAD
        $courses = DB::table('courses')->pluck('id');
        $groups = DB::table('groups')->pluck('name');
        $faker = Faker::create();
        for ($i=0; $i < 5; $i++) { 
=======
        $courses = DB::table('courses')->pluck('ue');
        $groups = DB::table('groups')->pluck('name');
        $faker = Faker::create();
        for ($i=0; $i < 2; $i++) { 
>>>>>>> 6be989e2970236e87379e8558ff705391a38518f
            DB::table('courses_groups')->insert([
                'id' => $i,
                'course_id' => $faker->randomElement($courses),
                'group_id' => $faker->randomElement($groups),
            ]);
        }
    }
}
