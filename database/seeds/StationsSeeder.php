<?php

use Illuminate\Database\Seeder;
use App\Station;

class StationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Station::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Station::create([
                'name' => $faker->word,
                'lat' => $faker->latitude,
                'long' => $faker->longitude,
                'company_id' => $faker->randomElement($array = array(1,2,3)),
            ]);
        }
    }
}
