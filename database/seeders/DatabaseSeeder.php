<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TeachersSeeder::class,
            StudentsSeeder::class,
            CourseSeeder::class,
            GroupsSeeder::class,
            SeanceSeeder::class,
            SeanceGroupSeeder::class,
            StudentGroupSeeder::class,
        ]);
    }
}
