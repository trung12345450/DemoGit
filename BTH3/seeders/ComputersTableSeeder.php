<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i < 10; $i++) {
            DB::table('computers')->insert([
                'computer_name' => $faker->name,
                'model' => $faker->name,
                'operating_system' => $faker->word,
                'processor' => $faker->word,
                'memory' => $faker->randomDigit
            ]);
        }
    }
}
