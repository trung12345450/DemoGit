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
            DB::table('issues')->insert([
                'computer_id' => $faker->name,
                'reported_by' => $faker->name,
                'reported_date' => $faker->date,
                'description' => $faker->paragraph,
                'urgency' => 'High',
                'status' => 'Open'
            ]);
        }
    }
}
