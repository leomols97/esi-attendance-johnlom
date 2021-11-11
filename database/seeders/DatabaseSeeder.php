<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            SeancesSeeder::class,
            CourseGroupsSeeder::class,
            StudentGroupsSeeder::class,
        ]);

    }
}
