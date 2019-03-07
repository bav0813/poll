<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table ( 'candidates' )->insert ( [ //,
                'name' => $faker->name ,
            ] );
        }
    }
}
