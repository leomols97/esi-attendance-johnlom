<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Http\Models\FileModel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
            for ($i=0; $i < 10; $i++) {
                # code...

                DB::table('students')->insert([
                    'id' => 52006,
                    'last_name' => "Dyck",
                    'first_name' => "Olivier",
                ]);

                DB::table('students')->insert([
                    'id' => 53212,
                    'last_name' => "Mols",
                    'first_name' => "Léopold",
                ]);
                DB::table('prof')->insert([
                    'id' => random_int(10000, 99999),
                    'last_name' => Str::random(20),
                    'first_name' => Str::random(20),
                ]);

                DB::table('Seance')->insert([
                    'date' => date(\Carbon\Carbon::createFromDate(rand(2000, 2022), rand(0, 12), rand(0, 28))->toDateString()),
                    'hour' => \Carbon\Carbon::createFromTime(rand(0,24), rand(0, 60), rand(0, 60))->toTimeString(),
                    'local' => strtoupper(Str::random(5)),
                    'cours' => strtoupper(Str::random(5)),
                    'prof' => strtoupper(Str::random(5)),
                ]);

            DB::table('Présences')->insert([
                'Student' => Integer::rand(10000, 99999),
                'Present' => Integer::rand(1, 2),
            ]);
        }
    }
}
