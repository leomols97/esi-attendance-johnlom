<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class StudentGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $students = DB::table('students')->pluck('id');
        $groups = DB::table('groups')->pluck('id');
        $faker = Faker::create();
        for ($i=0; $i < 2; $i++) { 
            DB::table('student_groups')->insert([
                'id' => random_int(0,10000),
                'student_id' => $faker->randomElement($students),
                'group_id' => $faker->randomElement($groups),
            ]);
        }
    }
}