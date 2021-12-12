<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'id' => 1,
            'first_name' => "Mathieu",
            'last_name' => "Letest",
        ]);
        DB::table('students')->insert([
            'id' => 2,
            'first_name' => "Guillaume",
            'last_name' => "Retest",
        ]);
    }
}
