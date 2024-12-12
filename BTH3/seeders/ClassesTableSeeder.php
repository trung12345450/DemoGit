<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i < 10; $i++) {
            DB::table('classes')->insert([
                'grade_level' => 'Pre-K',
                'room_number' => $faker->randomDigit
            ]);
        }
    }
}
