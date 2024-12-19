<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class issuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('issues')->insert([
                'computer_id' =>$faker->numberBetween(1,10),
                'reported_by'=>$faker->name,
                'reported_date'=>$faker->date(),    
                'description' =>$faker ->text(),
                'urgency' => $faker->randomElement(['low', 'high', 'medium']),
                'status' => $faker->randomElement(['open','in progress','resolved']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
