<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class PresencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seances = DB::table('seances')->pluck('id');
        $students = DB::table('students')->pluck('id');
        $faker = Faker::create();
        for ($i=0; $i < 5 && !$students->isEmpty(); $i++) {
            $randomStudent = $faker->randomElement($students);
            // Avoid unique keys constraint
            // (It's easy to guess the Collection key as seances and students tables use
            // auto increment IDs ; so, the Collection key = the seance/student ID)
            $students->forget(intval($randomStudent));
            DB::table('presences')->insert([
                'id' => $i,
                'seance_id' => $faker->randomElement($seances),
                'student_id' => $randomStudent,
                'is_present' => $faker->boolean,
            ]);
        }
    }
}