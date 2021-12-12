<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class StudentGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = DB::table('students')->pluck('id');
        $groups = DB::table('groups')->pluck('name');
        $faker = Faker::create();
        for ($i=0; $i < 2; $i++) { 
            DB::table('student_groups')->insert([
                'student_id' => $students[$i],
                'group_name' => $faker->randomElement($groups),
            ]);
        }
    }
}