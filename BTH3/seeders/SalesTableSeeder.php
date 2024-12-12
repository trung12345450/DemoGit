<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i < 20; $i++) {
            DB::table('sales')->insert([
                'medicine_id' => 1,
                'quantity' => $faker->randomNumber,
                'sale_date' => $faker->date,
                'customer_phone' => $faker->randomNumber
            ]);
        }
    }
}
