<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 2; $i++) { 
            DB::table('courses')->insert([
                'id' => random_int(0,10000),
                'name' => Str::random(10),
                'ue' => Str::random(10),
            ]);
        }
    }
}