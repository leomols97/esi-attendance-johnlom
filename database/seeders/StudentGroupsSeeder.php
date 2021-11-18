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
<<<<<<< HEAD
        for ($i=0; $i < 100; $i++) { 
=======
        for ($i=0; $i < 2; $i++) { 
>>>>>>> 6be989e2970236e87379e8558ff705391a38518f
            DB::table('student_groups')->insert([
                'id' => $i,
                'student_id' => $faker->randomElement($students),
                'group_name' => $faker->randomElement($groups),
            ]);
        }
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 6be989e2970236e87379e8558ff705391a38518f
