<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class MedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('medicines')->insert([
                'name' => $faker->name,
                'brand' => $faker->text,
                'dosage' => $faker->text,
                'form' => $faker->text,
                'price' => $faker->randomNumber,
                'stock' => $faker->randomNumber
            ]);
        }
    }
}
