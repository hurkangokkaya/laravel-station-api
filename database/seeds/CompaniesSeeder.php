<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Company::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Company::create([
                'parent_company_id' => $faker->randomElement($array = array(1,2,3,4,5)),
                'name' => $faker->word,
            ]);
        }
    }
}
