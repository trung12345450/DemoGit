<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class ComputersTableSeeder extends Seeder
{

    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 50) as $index) {
            DB::table('computers')->insert([
                'computer_name' => $faker->lastName,
                'model' => $faker->word,
                'operating_system' => $faker->word,
                'processor' => $faker->word,
                'memory' =>$faker->numberBetween(1,10),
                'available'=>true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
