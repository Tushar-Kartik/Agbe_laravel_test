<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class city_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('city')->insert([
            ['city_name' => 'Biratnagar', 'state_id' => 1],
            ['city_name' => 'Dharan', 'state_id' => 1],
            ['city_name' => 'Janakpur', 'state_id' => 2],
            ['city_name' => 'Birgunj', 'state_id' => 2],
            ['city_name' => 'Lucknow', 'state_id' => 3],
            ['city_name' => 'Kanpur', 'state_id' => 3],
            ['city_name' => 'Patna', 'state_id' => 4],
            ['city_name' => 'Gaya', 'state_id' => 4],
        ]);
    }
}
